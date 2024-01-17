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
    <p>Laporan Total</p>

    <table class="table table-bordered p-1">
        <tbody>
            <tr>
                <td>Total Barang Datang</td>
                <td>:</td>
                <td>Rp. {{ number_format($data['databeli']->sum('total'), 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Gaji</td>
                <td>:</td>
                <td>Rp.
                    {{ number_format($data['datagaji']->sum('gaji') + $data['datagaji']->sum('bonus'), 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td>Total Operasional</td>
                <td>:</td>
                <td>Rp. {{ number_format($data['dataoperasional']->sum('total'), 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Omset</td>
                <td>:</td>
                <td>Rp. {{ number_format($data['datajual']->sum('total'), 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Penghasilan Bersih</td>
                <td>:</td>
                @php
                    $total = 0;
                    foreach ($data['datajualdetail'] as $key => $value) {
                        $total += $value->qty_keluar * ($value->harga_jual - $value->harga_beli);
                    }
                @endphp
                <td>Rp.
                    {{ number_format($total, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td>Total Penghasilan Bersih - Gaji - Operasional</td>
                <td>:</td>
                @php
                    $total = 0;
                    foreach ($data['datajualdetail'] as $key => $value) {
                        $total += $value->qty_keluar * ($value->harga_jual - $value->harga_beli);
                    }
                @endphp
                <td>Rp.
                    {{ number_format($total - ($data['datagaji']->sum('gaji') + $data['datagaji']->sum('bonus') + $data['dataoperasional']->sum('total')), 0, ',', '.') }}
                </td>
            </tr>
        </tbody>

    </table>

</body>

</html>
