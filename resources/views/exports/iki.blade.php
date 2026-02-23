<table border="1" style="border-collapse: collapse; font-family: Arial, sans-serif; font-size: 12px; width: 100%;">

    {{-- JUDUL --}}
    <tr style="background-color: #0088c7; color: white;">
        <td colspan="7" align="center">
            <strong>INDIKATOR KINERJA INDIVIDU (IKI) DI LINGKUNGAN PERUMDA AIR MINUM TIRTA ALAM TARAKAN</strong>
        </td>
    </tr>

    {{-- TOTAL NILAI CAPAIAN --}}
    <tr style="background-color: #0088c7; color: white;">
        <td colspan="5" style="padding: 4px;"><strong>TOTAL NILAI CAPAIAN KINERJA</strong></td>
        <td colspan="2" align="center" style="padding: 4px;">
            <strong>{{ $iki->total_nilai_capaian ?? 1 }}</strong>
        </td>
    </tr>

    {{-- IDENTITAS --}}
    <tr style="background-color: #0088c7; color: white;">
        <td style="padding: 4px;"><strong>👤</strong></td>
        <td style="padding: 4px;"><strong>NAMA</strong></td>
        <td colspan="3" style="padding: 4px;">{{ $user->name ?? '-' }}</td>
        <td colspan="1" align="center" rowspan="4" style="padding: 4px;">
            <img src="{{ app()->runningInConsole() ? public_path('logopdam.png') : asset('logopdam.png') }}"
                 alt="Logo PDAM" width="80">
        </td>
        <td align="center" rowspan="4" style="padding: 4px;">
            <strong>{{ $tahun ?? date('Y') }}</strong>
        </td>
    </tr>

    <tr style="background-color: #0088c7; color: white;">
        <td style="padding: 4px;"><strong>🪪</strong></td>
        <td style="padding: 4px;"><strong>NIK</strong></td>
        <td colspan="3" style="padding: 4px;">{{ $user->nik ?? '-' }}</td>
    </tr>

    <tr style="background-color: #0088c7; color: white;">
        <td style="padding: 4px;"><strong>💼</strong></td>
        <td style="padding: 4px;"><strong>JABATAN</strong></td>
        <td colspan="3" style="padding: 4px;">{{ $user->jabatan ?? '-' }}</td>
    </tr>

    <tr style="background-color: #0088c7; color: white;">
        <td style="padding: 4px;"><strong>🏢</strong></td>
        <td style="padding: 4px;"><strong>BAGIAN</strong></td>
        <td colspan="3" style="padding: 4px;">{{ $user->bagian ?? '-' }}</td>
    </tr>

    {{-- SPACER --}}
    <tr>
        <td colspan="7" style="padding: 2px; border: none;"></td>
    </tr>

    {{-- HEADER TABEL --}}
    <tr style="background-color: #0088c7; color: white; text-align: center;">
        <th style="padding: 6px;">NO</th>
        <th style="padding: 6px;">AKTIVITAS</th>
        <th style="padding: 6px;">TARGET</th>
        <th style="padding: 6px;">REALISASI</th>
        <th style="padding: 6px;">SATUAN</th>
        <th style="padding: 6px;">NILAI CAPAIAN</th>
        <th style="padding: 6px;">KETERANGAN</th>
    </tr>

    {{-- SECTION A: INDIKATOR PEKERJAAN --}}
    <tr style="background-color: #d0e8f5;">
        <td colspan="7" style="padding: 5px;"><strong>A. INDIKATOR PEKERJAAN</strong></td>
    </tr>


    @foreach ($indikatorPekerjaan as $i => $item)
        <tr>
            <td style="padding: 5px; text-align: center;">{{ $i + 1 }}</td>
            <td style="padding: 5px;">{{ $item['aktivitas'] }}</td>
            <td style="padding: 5px; text-align: center;">{{ $item['target'] }}</td>
            <td style="padding: 5px; text-align: center;">{{ $item['realisasi'] }}</td>
            <td style="padding: 5px; text-align: center;">{{ $item['satuan'] }}</td>
            <td style="padding: 5px; text-align: center;">{{ $item['nilai_capaian'] }}</td>
            <td style="padding: 5px;">{{ $item['keterangan'] ?? '-' }}</td>
        </tr>
    @endforeach

    {{-- SUBTOTAL PEKERJAAN --}}
    <tr style="background-color: #f0f0f0;">
        <td colspan="5" align="right" style="padding: 5px;">
            <strong>Sub Total Indikator Pekerjaan (Bobot 70%)</strong>
        </td>
        <td align="center" style="padding: 5px;"><strong>{{ $subtotalPekerjaan ?? '-' }}</strong></td>
        <td style="padding: 5px;"></td>
    </tr>

    {{-- SECTION B: INDIKATOR DISIPLIN --}}
    <tr style="background-color: #d0e8f5;">
        <td colspan="7" style="padding: 5px;"><strong>B. INDIKATOR DISIPLIN</strong></td>
    </tr>

    @foreach ($indikatorDisiplin as $i => $item)
        <tr>
            <td style="padding: 5px; text-align: center;">{{ $i + 1 }}</td>
            <td style="padding: 5px;">{{ $item['indikator'] }}</td>
            <td style="padding: 5px; text-align: center;">{{ $item['target'] }}</td>
            <td style="padding: 5px; text-align: center;">{{ $item['realisasi'] }}</td>
            <td style="padding: 5px; text-align: center;">{{ $item['satuan'] }}</td>
            <td style="padding: 5px; text-align: center;">{{ $item['nilai_capaian'] }}</td>
            <td style="padding: 5px;"></td>
        </tr>
    @endforeach

    {{-- SUBTOTAL DISIPLIN --}}
    <tr style="background-color: #f0f0f0;">
        <td colspan="5" align="right" style="padding: 5px;">
            <strong>Sub Total Indikator Disiplin (Bobot 30%)</strong>
        </td>
        <td align="center" style="padding: 5px;"><strong>{{ $subtotalDisiplin ?? '-' }}</strong></td>
        <td style="padding: 5px;"></td>
    </tr>

    {{-- TOTAL --}}
    <tr style="background-color: #ffe699;">
        <td colspan="5" align="right" style="padding: 5px;"><strong>TOTAL</strong></td>
        <td align="center" style="padding: 5px;"><strong>{{ $total ?? '-' }}</strong></td>
        <td style="padding: 5px;"></td>
    </tr>

    {{-- SPACER --}}
    <tr>
        <td colspan="7" style="padding: 6px; border: none;"></td>
    </tr>

    {{-- TANDA TANGAN --}}
    <tr>
        <td colspan="3" align="center" style="padding: 5px;">
            Diperiksa Oleh,<br>
            {{ $jabatanPemeriksa ?? 'Asisten Manajer Pengaliran dan Jaringan,' }}
        </td>
        <td colspan="4" align="center" style="padding: 5px;">
            Tarakan, {{ $tanggalTtd ?? '-' }}<br>
            Dibuat Oleh,
        </td>
    </tr>

    {{-- NAMA TTD --}}
    <tr>
        <td colspan="3" align="center" style="padding: 30px 5px 5px 5px;"><strong>{{ $namaPemeriksa ?? '-' }}</strong></td>
        <td colspan="4" align="center" style="padding: 30px 5px 5px 5px;"><strong>{{ $user->name ?? '-' }}</strong></td>
    </tr>

    {{-- NIK TTD --}}
    <tr>
        <td colspan="3" align="center" style="padding: 5px;">{{ $nikPemeriksa ?? '-' }}</td>
        <td colspan="4" align="center" style="padding: 5px;">{{ $user->nik ?? '-' }}</td>
    </tr>

</table>