<table border="1">
    {{-- HEADER TABEL --}}
    <tr>
        <th>ID</th>
        <th>TANGGAL DIBUAT</th>
        <th>TANGGAL DIPERBARUI</th>
        <th>FILE</th>
    </tr>

    {{-- DATA --}}
    @foreach ($evidences as $evidence)
        <tr>
            <td>{{ $evidence->id }}</td>
            <td>{{ \Carbon\Carbon::parse($evidence->created_at)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($evidence->updated_at)->format('d/m/Y') }}</td>
            <td>
                {{ asset("http://127.0.0.1:8000/" . "storage/" . $evidence->file_path) }}
            </td>
            {{-- <td>BUKTI TERLAMPIR</td> --}}
        </tr>
    @endforeach

</table>