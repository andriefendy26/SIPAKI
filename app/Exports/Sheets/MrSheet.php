<?php

namespace App\Exports\Sheets;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class MrSheet implements FromView, WithEvents, \Maatwebsite\Excel\Concerns\WithColumnWidths
{
    protected $startDate;
    protected $endDate;
    protected $data;

    /**
     * @param string|null $startDate
     * @param string|null $endDate
     * @param array $data   optional data passed into the MR view
     */
    public function __construct($startDate = null, $endDate = null, array $data = [])
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->data = $data;
    }

    public function view(): View
    {
        // pull any arrays passed in; default to empty collections to avoid undefined variable errors
        $indikatorPekerjaan = collect($this->data['indikatorPekerjaan'] ?? []);

        return view('exports.mr', compact('indikatorPekerjaan'));
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;
                $sheet->setTitle('MR');

                // info header rows (rows 1-4) with light blue background
                $sheet->getStyle('A1:S5')->applyFromArray([
                    'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'color' => ['rgb' => 'D0E8F5']],
                ]);

                // primary header rows with dark blue background and white text
                $sheet->getStyle('A6:S7')->applyFromArray([
                    'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'color' => ['rgb' => '0088C7']],
                    'font' => ['color' => ['rgb' => 'FFFFFF'], 'bold' => true],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER],
                ]);

                // column number row
                $sheet->getStyle('A8:S8')->applyFromArray([
                    'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'color' => ['rgb' => 'D0E8F5']],
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                ]);
            },
        ];
    }

    /**
     * Define column widths to match the blade template layout.
     *
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 5,   // NO
            'B' => 20,  // KEGIATAN
            'C' => 20,  // TUJUAN KEGIATAN
            'D' => 10,  // KODE RESIKO
            'E' => 25,  // PERNYATAAN RESIKO
            'F' => 30,  // SEBAB RISIKO
            'G' => 5,   // UC / C
            'H' => 25,  // DAMPAK
            'I' => 25,  // URAIAN
            'J' => 5,   // A
            'K' => 5,   // T
            'L' => 5,   // TE
            'M' => 5,   // KE
            'N' => 5,   // E
            'O' => 7,   // TINGKAT PROBABILITAS
            'P' => 7,   // TINGKAT DAMPAK
            'Q' => 7,   // NILAI RESIKO
            'R' => 10,  // PRIORITAS RESIKO
            'S' => 20,  // PEMILIK RESIKO
        ];
    }
}
