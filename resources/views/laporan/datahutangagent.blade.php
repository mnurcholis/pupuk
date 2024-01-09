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
    <p>Laporan Data Hutang Agent</p>

    <table class="table table-bordered p-1">
        <thead>
            <tr>
                <th>INVOICE</th>
                <th>Agent</th>
                <th>Total Bayar</th>
                <th>Bayar</th>
                <th>Sisa</th>
            </tr>
        </thead>
        <tbody>
            @if ($beli)
                @foreach ($beli as $item)
                    <tr>
                        <td>{{ $item['invoice'] }}</td>
                        <td>{{ $item['agent']['name'] }}</td>
                        <td>{{ number_format($item['total'], 0, ',', '.') }}</td>
                        <td>{{ number_format($item['bayar'], 0, ',', '.') }}</td>
                        <td>{{ number_format($item['sisa'], 0, ',', '.') }}</td>
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
