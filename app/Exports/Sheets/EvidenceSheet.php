<?php

namespace App\Exports\Sheets;

use App\Models\Evidence;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class EvidenceSheet implements FromView, WithEvents
{
    public function view(): View
    {
        return view('exports.evidences', [
            'reports' => Evidence::all()
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->setTitle('Evidence');
            },
        ];
    }
}