<?php

namespace App\Exports\Sheets;


use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ReportSheet implements FromView, WithEvents, WithColumnWidths
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
        $userId = Auth::id();

        return view('exports.reports', [
            // 'reports' => Report::with(["user",'classification', 'unit', 'evidence'])
            //             ->where('user_id', $userId)
            //             ->whereBetween('report_date', [$this->startDate, $this->endDate])
            //             ->get()
            'reports' => Report::with(["user",'classification', 'unit', 'evidence'])
                    ->where('user_id', $userId)
                    ->whereBetween('report_date', [$this->startDate, $this->endDate])
                    ->get() 
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->setTitle('Laporan Harian');
            },
        ];
    }

       public function columnWidths(): array
    {
        return [
            'A' => 15, // Tanggal
            'B' => 30, // Aktivitas
            'C' => 15, // Target
            'D' => 15, // Realisasi
            'E' => 15, // Satuan
            'F' => 15, // Nilai Capaian
            'G' => 30, // Keterangan
            'H' => 30, // Evidence
        ];
    }
}