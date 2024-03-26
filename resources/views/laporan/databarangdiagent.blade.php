<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <h3 class="text-center">Laporan Data Barang di Agent...</h3>
    <br>
    @if ($beli)
        @foreach ($beli as $item => $val)
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $item + 1 }}. {{ $val->agent->name }}</li>
                <li class="list-group-item">Tanggal : {{ $val->tanggal }}</li>
                <li class="list-group-item">Invoice : {{ $val->invoice }}</li>
            </ul>
            <br>
            <table class="table table-bordered p-1">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Quantity</th>
                        <th>Harga Jual</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $jmlQty = 0;
                        $jmlHarga = 0;
                        $jmlSubtotal = 0;
                    @endphp
                    @foreach ($val->detailTransaksiJual as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item['qty'] . ' ' . $item->product->satuan }}</td>
                            <td>Rp. {{ number_format($item['harga_jual'], 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($item['sub_total'], 0, ',', '.') }}</td>
                        </tr>
                        @php
                            $jmlQty += $item['qty'];
                            $jmlHarga += $item['harga_jual'];
                            $jmlSubtotal += $item['sub_total'];
                        @endphp
                    @endforeach
                    <tr class="text-bold">
                        <td class="text-right">Jumlah</td>
                        <td>{{ $jmlQty . ' ' . $item->product->satuan }}</td>
                        <td>Rp. {{ number_format($jmlHarga, 0, ',', '.') }}</td>
                        <td colspan="2">Rp. {{ number_format($jmlSubtotal, 0, ',', '.') }}</td>
                    </tr>
                </tbody>

            </table>
        @endforeach
    @else
        No data available
    @endif
    <Br><br>
    <p>{{ $title }}</p>
    <br><Br>
    <p>{{ $date }}</p>


</body>

</html>
