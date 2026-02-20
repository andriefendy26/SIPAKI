<?php

namespace App\Exports\Sheets;


use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ReportSheet implements FromView, WithEvents
{
  
    public function view(): View
    {
        return view('exports.reports', [
            'reports' => Report::with(['classification', 'unit', 'evidence'])
                        ->where('user_id', Auth::id())
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
}