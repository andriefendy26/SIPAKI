<?php

namespace App\Services;

use App\Models\Evidence;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class UserExcelExportService
{
    private array $months = [
        'januari'   => 1,  'februari' => 2,  'maret'    => 3,
        'april'     => 4,  'mei'      => 5,  'juni'     => 6,
        'juli'      => 7,  'agustus'  => 8,  'september'=> 9,
        'oktober'   => 10, 'november' => 11, 'desember' => 12,
    ];

    /**
     * Generate Excel laporan harian untuk user tertentu.
     *
     * @param  int         $userId   ID user target
     * @param  string|null $month    Nama bulan (e.g. 'januari') atau angka (e.g. '1')
     * @param  string|null $year     Tahun (e.g. '2025')
     * @return array{url: string, fileName: string}
     * @throws \Exception
     */
    public function generate(int $userId, ?string $month = null, ?string $year = null): array
    {
        $templatePath = storage_path('app/public/template/PDAMTemplate.xlsx');

        if (! file_exists($templatePath)) {
            throw new \RuntimeException('Template Excel tidak ditemukan: ' . $templatePath);
        }

        $spreadsheet            = IOFactory::load($templatePath);
        $worksheetIKI           = $spreadsheet->getSheetByName('IKI');
        $worksheetLaporanHarian = $spreadsheet->getSheetByName('LAPORAN HARIAN');
        $worksheetBulan         = $spreadsheet->getSheetByName('BULAN');
        $worksheetEvidence1     = $spreadsheet->getSheetByName('EVIDENCE 1');
        $worksheetEvidence2     = $spreadsheet->getSheetByName('EVIDENCE 2');

        // ── Lebar kolom LAPORAN HARIAN ────────────────────────────────────────
        foreach (['A'=>20,'B'=>30,'C'=>15,'D'=>15,'E'=>20,'F'=>15,'G'=>25,'H'=>20] as $col => $width) {
            $worksheetLaporanHarian->getColumnDimension($col)->setWidth($width);
        }

        // ── Rename sheet BULAN ────────────────────────────────────────────────
        $worksheetBulan->setTitle(strtoupper($month ?? 'BULAN'));

        // ── Data user ─────────────────────────────────────────────────────────
        $user = User::findOrFail($userId);

        $worksheetLaporanHarian->setCellValue('C4',  $user->name);
        $worksheetLaporanHarian->setCellValue('C6',  $user->nik);
        $worksheetLaporanHarian->setCellValue('C8',  $user->jabatan);
        $worksheetLaporanHarian->setCellValue('C10', $user->bagian);

        $worksheetIKI->setCellValue('E26', $user->name);
        $worksheetIKI->setCellValue('E27', 'NIK. ' . $user->nik);

        // ── Query laporan ─────────────────────────────────────────────────────
        $query = Report::with(['user', 'classification', 'unit', 'evidence'])
            ->where('user_id', $userId);

        if ($month) {
            $lower = strtolower($month);
            if (isset($this->months[$lower])) {
                $query->whereMonth('report_date', $this->months[$lower]);
            } elseif (is_numeric($month)) {
                $query->whereMonth('report_date', (int) $month);
            }
        }

        if ($year) {
            $query->whereYear('report_date', $year);
        }

        $laporanHarian = $query->orderBy('report_date')->get();

        // ── Isi LAPORAN HARIAN ────────────────────────────────────────────────
        $rowLaporan = 14;

        foreach ($laporanHarian as $data) {
            $worksheetLaporanHarian->setCellValue('A' . $rowLaporan, $data->report_date);
            $worksheetLaporanHarian->setCellValue('B' . $rowLaporan, $data->description);
            $worksheetLaporanHarian->setCellValue('C' . $rowLaporan, $data->target);
            $worksheetLaporanHarian->setCellValue('D' . $rowLaporan, $data->realization);
            $worksheetLaporanHarian->setCellValue('E' . $rowLaporan, $data->unit->name        ?? 'dokumen');
            $worksheetLaporanHarian->setCellValue('G' . $rowLaporan, $data->classification->name ?? 'tidak diklasifikasikan');

            // Achievement sebagai persentase
            $worksheetLaporanHarian->setCellValue('F' . $rowLaporan, $data->achievement);
            $worksheetLaporanHarian->getStyle('F' . $rowLaporan)
                ->getNumberFormat()
                ->setFormatCode('0.00%');

            // Hyperlink ke sheet evidence
            if ($data->classification_id == 1) {
                $worksheetLaporanHarian->setCellValue('H' . $rowLaporan, 'LIHAT');
                $worksheetLaporanHarian->getCell('H' . $rowLaporan)->getHyperlink()
                    ->setUrl("#'EVIDENCE 2'!A1")->setTooltip('Lihat Evidence 2');
            } elseif ($data->classification_id == 2) {
                $worksheetLaporanHarian->setCellValue('H' . $rowLaporan, 'LIHAT');
                $worksheetLaporanHarian->getCell('H' . $rowLaporan)->getHyperlink()
                    ->setUrl("#'EVIDENCE 1'!A1")->setTooltip('Lihat Evidence 1');
            }

            $rowLaporan++;
        }

        // ── Baris JUMLAH ──────────────────────────────────────────────────────
        $worksheetLaporanHarian->setCellValue('B' . $rowLaporan, 'JUMLAH');
        $worksheetLaporanHarian->setCellValue('C' . $rowLaporan, $laporanHarian->sum('target'));
        $worksheetLaporanHarian->setCellValue('D' . $rowLaporan, $laporanHarian->sum('realization'));
        $worksheetLaporanHarian->setCellValue('F' . $rowLaporan, $laporanHarian->avg('achievement'));
        $worksheetLaporanHarian->getStyle('F' . $rowLaporan)
            ->getNumberFormat()
            ->setFormatCode('0.00%');

        // ── Isi BULAN ─────────────────────────────────────────────────────────
        $worksheetBulan->setCellValue('C17', $laporanHarian->where('classification_id', 2)->sum('target'));
        $worksheetBulan->setCellValue('D17', $laporanHarian->where('classification_id', 2)->sum('realization'));
        $worksheetBulan->setCellValue('C18', $laporanHarian->where('classification_id', 1)->sum('target'));
        $worksheetBulan->setCellValue('D18', $laporanHarian->where('classification_id', 1)->sum('realization'));
        $worksheetBulan->setCellValue('E34', $user->name);
        $worksheetBulan->setCellValue('E35', 'NIK. ' . $user->nik);

        // ── Isi EVIDENCE 1 (classification_id = 2) ───────────────────────────
        $this->fillEvidenceSheet($worksheetEvidence1, $userId, 2, 'Evidence');

        // ── Isi EVIDENCE 2 (classification_id = 1) ───────────────────────────
        $this->fillEvidenceSheet($worksheetEvidence2, $userId, 1, 'Evidence2');

        // ── Strip formula external references ─────────────────────────────────
        $this->resolveExternalFormulas($spreadsheet);

        // ── Simpan file ───────────────────────────────────────────────────────
        $outputDir = storage_path('app/public/exports');
        if (! is_dir($outputDir)) {
            mkdir($outputDir, 0755, true);
        }

        $fileName       = 'laporan_harian_' . now()->format('Ymd_His') . '.xlsx';
        $outputFilePath = $outputDir . '/' . $fileName;

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->setPreCalculateFormulas(true);
        $writer->save($outputFilePath);

        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);

        if (! file_exists($outputFilePath) || filesize($outputFilePath) === 0) {
            throw new \RuntimeException('File generation failed.');
        }

        return [
            'url'      => asset('storage/exports/' . $fileName),
            'fileName' => $fileName,
            'path'     => $outputFilePath,
        ];
    }

    // ─── Private helpers ──────────────────────────────────────────────────────

    private function fillEvidenceSheet(
        \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet,
        int    $userId,
        int    $classificationId,
        string $prefix
    ): void {
        $evidences = Evidence::with('report')
            ->whereHas('report', fn ($q) => $q
                ->where('user_id', $userId)
                ->where('classification_id', $classificationId)
            )
            ->get()
            ->groupBy(fn ($item) => $item->report->report_date ?? 'Tidak ada tanggal');

        $row = 2;

        foreach ($evidences as $reportDate => $items) {
            $sheet->setCellValue('A' . $row, $reportDate);

            $colIndex = 1;

            foreach ($items as $evidence) {
                $imagePath = storage_path('app/public/' . $evidence->file_path);
                $colLetter = Coordinate::stringFromColumnIndex($colIndex + 1);

                if (file_exists($imagePath)) {
                    $drawing = new Drawing();
                    $drawing->setName($prefix . '_' . $row . '_' . $colIndex);
                    $drawing->setDescription('Evidence');
                    $drawing->setPath($imagePath);
                    $drawing->setCoordinates($colLetter . $row);
                    $drawing->setWidth(150);
                    $drawing->setHeight(120);
                    $drawing->setWorksheet($sheet);
                } else {
                    $sheet->setCellValue($colLetter . $row, $evidence->file_path);
                }

                $colIndex++;
            }

            $sheet->getRowDimension($row)->setRowHeight(120);
            $row++;
        }
    }

    private function resolveExternalFormulas(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet): void
    {
        foreach ($spreadsheet->getAllSheets() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                foreach ($row->getCellIterator() as $cell) {
                    $value = $cell->getValue();
                    if (is_string($value) && str_starts_with($value, '=') && str_contains($value, '[')) {
                        try {
                            $cell->setValue($cell->getCalculatedValue());
                        } catch (\Throwable) {
                            $cell->setValue(null);
                        }
                    }
                }
            }
        }
    }
}