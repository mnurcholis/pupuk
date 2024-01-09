<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Laporan Stok</p>

    <table class="table table-bordered p-1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Gaji</th>
                <th>Bonus</th>
            </tr>
        </thead>
        <tbody>
            @if ($beli)
                @foreach ($beli as $item)
                    <tr>
                        <td>{{ $item['karyawan']['name'] }}</td>
                        <td>{{ number_format($item['gaji'], 0, ',', '.') }}</td>
                        <td>{{ number_format($item['bonus'], 0, ',', '.') }}</td>
                        <td>{{ $item['karyawan']['comcode']['code_nm'] }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">No data available</td>
                </tr>
            @endif
        </tbody>

    </table>

</body>

</html>
