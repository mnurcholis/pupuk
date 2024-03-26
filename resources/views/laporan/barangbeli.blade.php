<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <H3 class="text-center">LAPORAN DATA BELANJA KE SUPLIER</H3>

    <Br>



    <table class="table table-bordered p-1">
        <thead>
            <tr>
                <th>Vendor</th>
                <th>Barang</th>
                <th>Quantity</th>
                <th>Harga Beli</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total = 0;
            @endphp
            @if ($beli)
                @foreach ($beli as $item)
                    <tr>
                        <td>{{ $item->beli->vendor->name }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>Rp. {{ number_format($item['harga_beli'], 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item['sub_total'], 0, ',', '.') }}</td>
                    </tr>
                    @php
                        $total += $item['sub_total'];
                    @endphp
                @endforeach
                <tr>
                    <td colspan="2" class="text-right">jumlah qty</td>
                    <td>{{ $beli->sum('qty') }}</td>
                    <td>jumlah belanja</td>
                    <td>Rp. {{ number_format($beli->sum('sub_total'), 0, ',', '.') }}</td>
                </tr>
            @else
                <tr>
                    <td colspan="5">No data available</td>
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
