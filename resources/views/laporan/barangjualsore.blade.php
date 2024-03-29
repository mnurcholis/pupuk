<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h3 class="text-center">Laporan Detail Barang Transaksi Sore</h3>

    <table class="table table-bordered p-1">
        <thead>
            <tr>
                <th>Agent</th>
                <th>Tanggal</th>
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
                @php
                    $omset = 0;
                    $bersih = 0;
                @endphp
                @foreach ($beli as $item)
                    <tr>
                        <td>{{ $item->jualsore->agent->name }}</td>
                        <td>{{ $item->jualsore->tanggal }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item['qty_keluar'] }}</td>
                        <td>Rp. {{ number_format($item['harga_beli'], 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item['harga_jual'], 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item['sub_total'], 0, ',', '.') }}</td>
                        <td>{{ $item->product->satuan }}</td>
                    </tr>
                    @php
                        $omset += $item['sub_total'];
                        $dan = ($item['harga_jual'] - $item['harga_beli']) * $item['qty_keluar'];
                        $bersih += $dan;
                    @endphp
                @endforeach
                <tr class="text-bold">
                    <td colspan="3" class="text-right">Jumlah</td>
                    <td>{{ $beli->sum('qty_keluar') }}</td>
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
    <p><strong>Pengmasukan Keseluhuran : Rp. {{ number_format($omset, 0, ',', '.') }}</strong></p>
    <p><strong>Pengmasukan bersih : Rp. {{ number_format($bersih, 0, ',', '.') }}</strong></p>

      <Br><br>
    <p>{{ $title }}</p>
    <br><Br>
    <p>{{ $date }}</p>

</body>

</html>
