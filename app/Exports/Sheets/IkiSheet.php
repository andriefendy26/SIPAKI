<?php

namespace App\Exports\Sheets;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class IkiSheet implements FromView, WithEvents, \Maatwebsite\Excel\Concerns\WithColumnWidths
{
    protected $startDate;
    protected $endDate;
    protected $data;

    /**
     * @param string|null $startDate
     * @param string|null $endDate
     * @param array $data     additional data like indikatorPekerjaan/Disiplin
     */
    public function __construct($startDate = null, $endDate = null, array $data = [])
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->data = $data;
    }

    public function view(): View
    {
        $user = Auth::user();
        $tahun = date('Y');

        // merge provided data with defaults so that view keys always exist
        $indikatorPekerjaan = collect($this->data['indikatorPekerjaan'] ?? []);
        $indikatorDisiplin = collect($this->data['indikatorDisiplin'] ?? []);

        // calculated totals (if provided)
        $subtotalPekerjaan = $this->data['subtotalPekerjaan'] ?? null;
        $subtotalDisiplin = $this->data['subtotalDisiplin'] ?? null;
        $total = $this->data['total'] ?? null;
        $jabatanPemeriksa = $this->data['jabatanPemeriksa'] ?? null;
        $namaPemeriksa = $this->data['namaPemeriksa'] ?? null;
        $nikPemeriksa = $this->data['nikPemeriksa'] ?? null;
        $tanggalTtd = $this->data['tanggalTtd'] ?? null;

        return view('exports.iki', compact(
            'user',
            'tahun',
            'indikatorPekerjaan',
            'indikatorDisiplin',
            'subtotalPekerjaan',
            'subtotalDisiplin',
            'total',
            'jabatanPemeriksa',
            'namaPemeriksa',
            'nikPemeriksa',
            'tanggalTtd'
        ));
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;
                $sheet->setTitle('IKI');

                // title row
                $sheet->getStyle('A1:G1')->applyFromArray([
                    'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'color' => ['rgb' => '0088C7']],
                    'font' => ['color' => ['rgb' => 'FFFFFF'], 'bold' => true],
                ]);

                // total nilai capaian row
                $sheet->getStyle('A2:G2')->applyFromArray([
                    'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'color' => ['rgb' => '0088C7']],
                    'font' => ['color' => ['rgb' => 'FFFFFF'], 'bold' => true],
                ]);

                // identity rows (3-6)
                $sheet->getStyle('A3:G6')->applyFromArray([
                    'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'color' => ['rgb' => '0088C7']],
                    'font' => ['color' => ['rgb' => 'FFFFFF']],
                ]);

                // header row (after spacer)
                $sheet->getStyle('A9:G9')->applyFromArray([
                    'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'color' => ['rgb' => '0088C7']],
                    'font' => ['color' => ['rgb' => 'FFFFFF'], 'bold' => true],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                ]);

                // section headers A and B
                $sheet->getStyle('A11:G11')->applyFromArray(['fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'color' => ['rgb' => 'D0E8F5']]]);
            },
        ];
    }

    /**
     * Provide column widths analogous to the Blade percentages.
     *
     * @return array
     */
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
        ];
    }
}
