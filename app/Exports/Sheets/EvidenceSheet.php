<?php 
namespace App\Exports\Sheets;

use App\Models\Evidence;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use OpenSpout\Writer\Common\Entity\Worksheet;

class EvidenceSheet implements FromView, WithEvents, WithColumnWidths
{
    public function view(): \Illuminate\Contracts\View\View
    {
        return view('exports.evidences', [], [
            'reports' => Evidence::all()
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->setTitle('Evidence');
            }
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, // ID
            'B' => 20, // Tanggal Dibuat
            'C' => 20, // Tanggal Diperbarui
            'D' => 50, // File
        ];
    }
    

}