@php
$risks = [
    (object)[
        'no' => 1,
        'kegiatan' => 'Pengelolaan Air Bersih',
        'tujuan_kegiatan' => 'Menjaga kualitas dan kuantitas air bersih',
        'kode_resiko' => 'R001',
        'pernyataan_resiko' => 'Kekurangan pasokan air bersih',
        'sebab_risiko' => 'Kondisi cuaca ekstrem, kerusakan infrastruktur',
        'uc_c' => 'C',
        'dampak' => 'Gangguan pelayanan air bersih di kota',
        'pengendalian' => 'Peningkatan kapasitas sumur dan pemeliharaan rutin',
        'desain_a' => 'Ada',
        'desain_t' => 'Tidak',
        'efektifitas_ke' => 'Kurang Efektif',
        'efektifitas_e' => 'Efektif',
        'probabilitas' => 'Tinggi',
        'dampak_nilai' => 'Sangat Tinggi',
        'nilai_resiko' => 'Tinggi',
        'prioritas_resiko' => 'Sangat Tinggi',
        'pemilik_resiko' => 'Manager Operasional'
    ],
    (object)[
        'no' => 2,
        'kegiatan' => 'Penyediaan Infrastruktur',
        'tujuan_kegiatan' => 'Membangun infrastruktur air bersih',
        'kode_resiko' => 'R002',
        'pernyataan_resiko' => 'Keterlambatan pembangunan infrastruktur',
        'sebab_risiko' => 'Keterlambatan pengadaan material, masalah logistik',
        'uc_c' => 'UC',
        'dampak' => 'Penurunan kualitas pelayanan',
        'pengendalian' => 'Perencanaan yang matang dan pengawasan ketat',
        'desain_a' => 'Tidak',
        'desain_t' => 'Ada',
        'efektifitas_ke' => 'Efektif',
        'efektifitas_e' => 'Kurang Efektif',
        'probabilitas' => 'Sedang',
        'dampak_nilai' => 'Sedang',
        'nilai_resiko' => 'Sedang',
        'prioritas_resiko' => 'Sedang',
        'pemilik_resiko' => 'Koordinator Teknik'
    ],
    (object)[
        'no' => 3,
        'kegiatan' => 'Penyediaan Sumber Daya Manusia',
        'tujuan_kegiatan' => 'Menambah tenaga kerja terampil',
        'kode_resiko' => 'R003',
        'pernyataan_resiko' => 'Kekurangan tenaga kerja terampil',
        'sebab_risiko' => 'Keterbatasan anggaran dan pelatihan',
        'uc_c' => 'C',
        'dampak' => 'Gangguan operasional',
        'pengendalian' => 'Pelatihan dan rekrutmen tambahan',
        'desain_a' => 'Tidak',
        'desain_t' => 'Ada',
        'efektifitas_ke' => 'Efektif',
        'efektifitas_e' => 'Kurang Efektif',
        'probabilitas' => 'Rendah',
        'dampak_nilai' => 'Rendah',
        'nilai_resiko' => 'Rendah',
        'prioritas_resiko' => 'Rendah',
        'pemilik_resiko' => 'HRD'
    ]
];
@endphp

<table border="1" style="border-collapse: collapse; font-family: Arial, sans-serif; font-size: 11px; width: 100%;">

    {{-- JUDUL --}}
    <tr style="background-color: #0088c7; color: white;">
        <td colspan="19" align="center" style="padding: 6px;">
            <strong>ANALISIS RESIKO</strong>
        </td>
    </tr>

    {{-- INFO HEADER --}}
    <tr style="background-color: #d0e8f5;">
        <td colspan="5" style="padding: 4px;"><strong>Nama Perusahaan</strong></td>
        <td colspan="14" style="padding: 4px;">: {{ $mr['nama_perusahaan'] ?? 'PERUMDA AIR MINUM TIRTA ALAM KOTA TARAKAN' }}</td>
    </tr>
    <tr style="background-color: #d0e8f5;">
        <td colspan="5" style="padding: 4px;"><strong>Pemilik Resiko</strong></td>
        <td colspan="14" style="padding: 4px;">: {{ $mr['pemilik_resiko'] ?? '-' }}</td>
    </tr>
    <tr style="background-color: #d0e8f5;">
        <td colspan="5" style="padding: 4px;"><strong>Koordinator Manajemen Risiko</strong></td>
        <td colspan="14" style="padding: 4px;">: {{ $mr['koordinator'] ?? '-' }}</td>
    </tr>
    <tr style="background-color: #d0e8f5;">
        <td colspan="5" style="padding: 4px;"><strong>Periode</strong></td>
        <td colspan="14" style="padding: 4px;">: {{ $mr['periode'] ?? '-' }}</td>
    </tr>

    {{-- SPACER --}}
    <tr>
        <td colspan="19" style="padding: 2px; border: none;"></td>
    </tr>

    {{-- HEADER BARIS 1 --}}
    <tr style="background-color: #0088c7; color: white; text-align: center;">
        <th rowspan="3" style="padding: 5px;">NO</th>
        <th rowspan="3" style="padding: 5px;">KEGIATAN</th>
        <th rowspan="3" style="padding: 5px;">TUJUAN KEGIATAN</th>
        <th rowspan="3" style="padding: 5px;">KODE RESIKO</th>
        <th rowspan="3" style="padding: 5px;">PERNYATAAN RESIKO</th>
        <th rowspan="3" style="padding: 5px;">SEBAB RISIKO</th>
        <th rowspan="3" style="padding: 5px;">UC / C</th>
        <th rowspan="3" style="padding: 5px;">DAMPAK</th>
        <th colspan="5" style="padding: 5px;">PENGENDALIAN YANG ADA</th>
        <th colspan="5" style="padding: 5px;">ANALISIS RISIKO</th>
        <th rowspan="3" style="padding: 5px;">PEMILIK RESIKO</th>
    </tr>

    {{-- HEADER BARIS 2 --}}
    <tr style="background-color: #0088c7; color: white; text-align: center;">
        <th rowspan="2" style="padding: 5px;">URAIAN</th>
        <th colspan="2" style="padding: 5px;">DESAIN</th>
        <th colspan="2" style="padding: 5px;">EFEKTIFITAS</th>
        <th rowspan="2" style="padding: 5px;">TINGKAT PROBABILITAS (P)</th>
        <th rowspan="2" style="padding: 5px;">TINGKAT DAMPAK (D)</th>
        <th rowspan="2" style="padding: 5px;">NILAI RESIKO (TR)</th>
        <th rowspan="2" style="padding: 5px;">PRIORITAS RESIKO</th>
    </tr>

    {{-- HEADER BARIS 3 --}}
    <tr style="background-color: #0088c7; color: white; text-align: center;">
        <th style="padding: 5px;">A</th>
        <th style="padding: 5px;">T</th>
        <th style="padding: 5px;">KE</th>
        <th style="padding: 5px;">E</th>
    </tr>

    {{-- NOMOR KOLOM --}}
    <tr style="background-color: #d0e8f5; text-align: center; font-weight: bold;">
        @foreach(range(1, 14) as $col)
            <td style="padding: 4px;">{{ $col }}</td>
        @endforeach
        <td style="padding: 4px;">{{ 15 }}</td>
    </tr>

    {{-- DATA --}}
    @foreach ($risks as $r)
        @php
            $prioritasColor = match(strtolower($r->prioritas_resiko ?? '')) {
                'sangat tinggi' => 'background-color:#FF0000; color:white;',
                'tinggi'        => 'background-color:#FF9900;',
                'sedang'        => 'background-color:#FFFF00;',
                'rendah'        => 'background-color:#92D050;',
                'sangat rendah' => 'background-color:#00B050; color:white;',
                default         => '',
            };
        @endphp
        <tr>
            <td style="padding: 4px; text-align: center; vertical-align: top;">{{ $r->no ?? '-' }}</td>
            <td style="padding: 4px; vertical-align: top;">{{ $r->kegiatan ?? '-' }}</td>
            <td style="padding: 4px; vertical-align: top;">{{ $r->tujuan_kegiatan ?? '-' }}</td>
            <td style="padding: 4px; text-align: center; vertical-align: top;">{{ $r->kode_resiko ?? '-' }}</td>
            <td style="padding: 4px; vertical-align: top;">{{ $r->pernyataan_resiko ?? '-' }}</td>
            <td style="padding: 4px; vertical-align: top;">{{ $r->sebab_risiko ?? '-' }}</td>
            <td style="padding: 4px; text-align: center; vertical-align: top;">{{ $r->uc_c ?? '-' }}</td>
            <td style="padding: 4px; vertical-align: top;">{{ $r->dampak ?? '-' }}</td>
            <td style="padding: 4px; vertical-align: top;">{{ $r->pengendalian ?? '-' }}</td>
            <td style="padding: 4px; text-align: center; vertical-align: top;">{{ $r->desain_a ?? '' }}</td>
            <td style="padding: 4px; text-align: center; vertical-align: top;">{{ $r->desain_t ?? '' }}</td>
            <td style="padding: 4px; text-align: center; vertical-align: top;">{{ $r->efektifitas_ke ?? '' }}</td>
            <td style="padding: 4px; text-align: center; vertical-align: top;">{{ $r->efektifitas_e ?? '' }}</td>
            <td style="padding: 4px; text-align: center; vertical-align: top;">{{ $r->probabilitas ?? '-' }}</td>
            <td style="padding: 4px; text-align: center; vertical-align: top;">{{ $r->dampak_nilai ?? '-' }}</td>
            <td style="padding: 4px; text-align: center; vertical-align: top;">{{ $r->nilai_resiko ?? '-' }}</td>
            <td style="padding: 4px; text-align: center; vertical-align: top; {{ $prioritasColor }}">
                {{ $r->prioritas_resiko ?? '-' }}
            </td>
            <td style="padding: 4px; vertical-align: top;">{{ $r->pemilik_resiko ?? '-' }}</td>
        </tr>
    @endforeach

</table>

{{-- LEGENDA --}}
<table border="0" style="font-family: Arial, sans-serif; font-size: 10px; margin-top: 8px;">
    <tr>
        <td style="padding: 3px 6px; background-color: #00B050; color: white;">Sangat Rendah</td>
        <td style="padding: 3px 6px; background-color: #92D050;">Rendah</td>
        <td style="padding: 3px 6px; background-color: #FFFF00;">Sedang</td>
        <td style="padding: 3px 6px; background-color: #FF9900;">Tinggi</td>
        <td style="padding: 3px 6px; background-color: #FF0000; color: white;">Sangat Tinggi</td>
        <td style="padding: 3px 12px;"><strong>A</strong> = Ada &nbsp; <strong>T</strong> = Tidak &nbsp;
        <strong>KE</strong> = Kurang Efektif &nbsp; <strong>E</strong> = Efektif &nbsp;
        <strong>UC</strong> = Uncontrollable &nbsp; <strong>C</strong> = Controllable</td>
    </tr>
</table>