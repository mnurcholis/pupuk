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
    <p>Laporan Detail Barang Jual Pagi</p>

    <table class="table table-bordered p-1">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Quantity</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Sub Total</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            @if ($beli)
                @foreach ($beli as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>Rp. {{ number_format($item['harga_beli'], 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item['harga_jual'], 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item['sub_total'], 0, ',', '.') }}</td>
                        <td>{{ $item->product->satuan }}</td>
                    </tr>
                @endforeach
                <tr class="text-bold">
                    <td>Jumlah</td>
                    <td>{{ $beli->sum('qty') }}</td>
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

</body>

</html>
