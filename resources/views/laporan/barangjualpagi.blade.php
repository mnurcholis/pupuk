<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <h3 class="text-center">Laporan Detail Barang Jual Pagi</h3>
    <br>

    <table class="table table-bordered p-1">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Agent</th>

                <th>Barang</th>
                <th>Quantity</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @if ($beli)
            @foreach ($beli as $item)
            <tr>
                <td>{{ $item->jualpagi->tanggal }}</td>
                <td>{{ $item->jualpagi->agent->name }}</td>

                <td>{{ $item->product->name }}</td>
                <td>{{ $item['qty'] .' '. $item->product->satuan }}</td>

                <td>Rp. {{ number_format($item['harga_beli'], 0, ',', '.') }}</td>
                <td>Rp. {{ number_format($item['harga_jual'], 0, ',', '.') }}</td>
                <td>Rp. {{ number_format($item['sub_total'], 0, ',', '.') }}</td>

            </tr>
            @endforeach
            <tr class="text-bold">
                <td colspan="3" class="text-right">Jumlah</td>
                <td>{{ $beli->sum('qty') .' '. $item->product->satuan }}</td>
                <td>Rp. {{ number_format($beli->sum('harga_beli'), 0, ',', '.') }}</td>
                <td>Rp. {{ number_format($beli->sum('harga_jual'), 0, ',', '.') }}</td>
                <td colspan="2">Rp. {{ number_format($beli->sum('sub_total'), 0, ',', '.') }}</td>
            </tr>
            @else
            <tr>
                <td colspan="6">No data available</td>
            </tr>
            @endif
        </tbody>

    </table>
    <Br><br>
    <p>{{ $title }}</p>
    <br><Br>
    <p>{{ $date }}</p>
    

</body>

</html>
