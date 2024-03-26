<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<h1>LAPORAN DATA BARANG SAAT INI</h1>
<Br>

    <table class="table table-bordered p-1">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Quantity</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            @if ($users)
            @foreach ($users as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>{{ $item['satuan'] }}</td>
            </tr>
            @endforeach
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
                <p>Laporan Stok</p>
        </div>
    </div>


</body>

</html>
