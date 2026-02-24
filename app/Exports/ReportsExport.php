<?php

namespace App\Exports;
// namespace App\Exports\Sheets;

use App\Exports\Sheets\EvidenceSheet;
use App\Exports\Sheets\ReportSheet;
use App\Exports\Sheets\IkiSheet;
use App\Exports\Sheets\MrSheet;
use App\Models\Report;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportsExport implements WithMultipleSheets
{
    protected $startDate;
    protected $endDate;
    protected $ikiData;
    protected $mrData;

    /**
     * @param string|null $startDate
     * @param string|null $endDate
     * @param array $ikiData   optional data passed into the IKI sheet (e.g. indikator arrays)
     * @param array $mrData    optional data passed into the MR sheet
     */
    public function __construct($startDate, $endDate, array $ikiData = [], array $mrData = [])
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->ikiData = $ikiData;
        $this->mrData = $mrData;
    }
    // }
    public function sheets() : array
    {
        return [
            new ReportSheet($this->startDate, $this->endDate),
            new EvidenceSheet($this->startDate, $this->endDate),
            new IkiSheet($this->startDate, $this->endDate, $this->ikiData),
            new MrSheet($this->startDate, $this->endDate, $this->mrData),
        ];
    }
}

// class ReportsExport implements  FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithEvents
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Report::with(['classification', 'unit', 'evidence'])->get();
//     }

//      public function headings(): array
//     {
//         return [
//             'TANGGAL',
//             'AKTIVITAS',T
//             'TARGET',
//             'REALISASI',
//             'SATUAN',
//             'NILAI CAPAIAN',
//             'KLASIFIKASI',
//             'EVIDENCE',
//         ];
//     }

//     public function map($report): array
//     {
//         return [
//             \Carbon\Carbon::parse($report->report_date)->format('d/m/Y'),
//             $report->description,
//             $report->target,
//             $report->realization,
//             'dokumen', // satuan default (opsional)
//             $report->achievement,
//             $report->classification->name ?? '-',
//             $report->evidence->count()
//                 ? url('storage/' . $report->evidence->first()->file_path)
//                 : '-',
//         ];
//     }

//     public function styles(Worksheet $sheet)
//     {
//         return [
//             1 => ['font' => ['bold' => true]], 
//         ];
//     }

//     public function registerEvents(): array
//     {
//         return [
//             AfterSheet::class => function (AfterSheet $event) {
//                 $event->sheet->insertNewRowBefore(1, 8);

//                 $event->sheet->setCellValue('A1', 'LAPORAN HARIAN');
//                 $event->sheet->mergeCells('A1:H1');

//                 $event->sheet->setCellValue('A3', 'NAMA');
//                 $event->sheet->setCellValue('B3', 'IRWAN');

//                 $event->sheet->setCellValue('A4', 'NIK');
//                 $event->sheet->setCellValue('B4', '16216143');

//                 $event->sheet->setCellValue('A5', 'JABATAN');
//                 $event->sheet->setCellValue('B5', 'STAF PELAKSANA');

//                 $event->sheet->setCellValue('A6', 'BAGIAN');
//                 $event->sheet->setCellValue('B6', 'DISTRIBUSI');
//             },
//         ];
//     }

// }