<?php

namespace App\Exports\Sheets;

use App\Models\Evidence;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class EvidenceSheet implements FromView, WithEvents, WithColumnWidths
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        return view('exports.evidences', [
            'evidences' => Evidence::with('report')
                ->whereHas('report', function ($q) {
                    $q->where('user_id', auth()->id())
                      ->whereBetween('report_date', [
                          $this->startDate,
                          $this->endDate
                      ]);
                })
                ->get()
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
            'A' => 5,  // ID
            'B' => 20, // Tanggal Dibuat
            'C' => 20, // Tanggal Diperbarui
            'D' => 50, // File
        ];
    }
}