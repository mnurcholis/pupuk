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
    <p>Laporan Detail Barang Beli</p>

    <table class="table table-bordered p-1">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Quantity</th>
                <th>Harga Beli</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @if ($beli)
                @foreach ($beli as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>{{ number_format($item['harga_beli'], 0, ',', '.') }}</td>
                        <td>{{ number_format($item['sub_total'], 0, ',', '.') }}</td>
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
