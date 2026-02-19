<?php

namespace App\Exports;
// namespace App\Exports\Sheets;

use App\Exports\Sheets\EvidenceSheet;
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
use App\Exports\Sheets\ReportSheet;

class ReportsExport implements WithMultipleSheets, WithStyles
{
    // public function view(): View
    // {
    //     return view('exports.reports', [
    //         'reports' => Report::with(['classification', 'unit', 'evidence'])->get()
    //     ]);
    // }
    public function sheets() : array
    {
        return [
            new ReportSheet(),
            new EvidenceSheet()
        ];
    }

     public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            'C'  => ['font' => ['size' => 16]],
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
//             'AKTIVITAS',
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