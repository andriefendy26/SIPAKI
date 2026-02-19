<table border="1" style="font-style: ">
    {{-- JUDUL --}}
    <tr style="background-color: #0088c7; color: white;">
        <td colspan="8" align="center">
            <strong>
                LAPORAN HARIAN DI LINGKUNGAN PERUMDA AIR MINUM TIRTA ALAM TARAKAN
            </strong>
        </td>
    </tr>

    {{-- IDENTITAS --}}
    <tr style="background-color: #0088c7; color: white;">
        <td><strong>Icon Nama</strong></td>
        <td><strong>NAMA</strong></td>
        <td colspan="3">{{ $user->name ?? 'IRWAN' }}</td>
        <td colspan="1" align="center" rowspan="4">
            <img src="{{ app()->runningInConsole()
    ? public_path('logopdam.png')
    : asset('logopdam.png') }}" alt="Logo PDAM" width="80">
        </td>
        <td colspan="2" align="center" rowspan="4"><strong>JANUARI 2026</strong></td>
    </tr>

    <tr style="background-color: #0088c7; color: white;">
        <td><strong>Icon NIK</strong></td>
        <td><strong>NIK</strong></td>
        <td colspan="3">{{ $user->nik ?? '16216143' }}</td>
        {{-- <td colspan="4"></td> --}}
    </tr>

    <tr style="background-color: #0088c7; color: white;">
        <td><strong>Icon Jabatan</strong></td>
        <td><strong>JABATAN</strong></td>
        <td colspan="3">{{ $user->position ?? 'STAF PELAKSANA' }}</td>
        {{-- <td colspan="4"></td> --}}
    </tr>

    <tr style="background-color: #0088c7; color: white;">
        <td><strong>Icon Bagian</strong></td>
        <td><strong>BAGIAN</strong></td>
        <td colspan="3">{{ $user->unit->name ?? 'DISTRIBUSI' }}</td>
        {{-- <td colspan="4"></td> --}}
    </tr>
    {{-- HEADER TABEL --}}
    <tr>
        <th>TANGGAL</th>
        <th>AKTIVITAS</th>
        <th>TARGET</th>
        <th>REALISASI</th>
        <th>SATUAN</th>
        <th>NILAI CAPAIAN</th>
        <th>KLASIFIKASI</th>
        <th>EVIDENCE</th>
    </tr>

    {{-- DATA --}}
    @php
        $totalTarget = 0;
        $totalReal = 0;
    @endphp

    @foreach ($reports as $r)
        @php
            $totalTarget += $r->target;
            $totalReal += $r->realization;
        @endphp
        <tr>
            <td>{{ \Carbon\Carbon::parse($r->report_date)->format('d/m/Y') }}</td>
            <td>{{ $r->description }}</td>
            <td>{{ $r->target }}</td>
            <td>{{ $r->realization }}</td>
            <td>dokumen</td>
            <td>{{ $r->achievement }}%</td>
            <td>{{ $r->classification->name ?? '-' }}</td>
            <td>
                @if($r->evidence->count())
                    LIHAT
                @endif
            </td>
        </tr>
    @endforeach

    {{-- TOTAL --}}
    <tr>
        <td></td>
        <td><strong>JUMLAH</strong></td>
        <td>{{ $totalTarget }}</td>
        <td>{{ $totalReal }}</td>
        <td></td>
        <td>100%</td>
        <td></td>
        <td></td>
    </tr>

</table>