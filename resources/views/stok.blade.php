<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .invoice-header img {
            max-width: 100px;
            /* Adjust the width as needed */
            height: auto;
        }

        .invoice-body {
            margin-top: 20px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .invoice-total {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="invoice">
        <div class="invoice-header">
            <div>
                <h1>{{ get_setting()->title }}</h1>
                <h1>Laporan Stok Produk</h1>
            </div>
        </div>

        <div class="invoice-body">

            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Quantity</th>
                        <th>Harga Beli</th>
                        <th>Harga jual</th>
                        <th>Sub Total</th>
                        <th>Satuan</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
        </div>
    </div>

</body>

</html>
