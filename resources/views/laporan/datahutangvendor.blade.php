<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <h3 class="text-center">Laporan Data Hutang ke Vendor</h3>
    <br>

    

    <table class="table table-bordered p-1">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>INVOICE</th>
                <th>Vendor</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Hutang</th>
            </tr>
        </thead>
        <tbody>
            @if ($beli)
                @php
                    $total_hutang = 0;
                @endphp
                @foreach ($beli as $item)
                    <tr>
                        <td>{{ $item['tanggal'] }}</td>
                        <td>{{ $item['invoice'] }}</td>
                        <td>{{ $item['vendor']['name'] }}</td>
                        <td>Rp. {{ number_format($item['total'], 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item['bayar'], 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item['sisa'], 0, ',', '.') }}</td>
                    </tr>
                    @php
                        $total_hutang += $item['sisa'];
                    @endphp
                @endforeach
                <tr class="text-bold">
                    <td colspan="3" class="text-right">Total</td>
                    <td>Rp. {{ number_format($beli->sum('total'), 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($beli->sum('bayar'), 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($beli->sum('sisa'), 0, ',', '.') }}</td>
                </tr>
            @else
                <tr>
                    <td colspan="6">No data available</td>
                </tr>
            @endif
        </tbody>
    </table>
    <p><strong>Total Hutang ke Vendor : Rp. {{ number_format($total_hutang, 0, ',', '.') }}</strong></p>


     <Br><br>
    <p>{{ $title }}</p>
    <br><Br>
    <p>{{ $date }}</p>
    

</body>

</html>
