<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bill PDF</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
        }

        h2 {
            padding: 20px;
        }

        h4 {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .float-end {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h2>Thank You for your Order.</h2>
        </div>
        <h4>Order By: {{ $datas->user->name }}</h4>
        <table>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $data)   
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->product->name }}</td>
                    <td>${{ $data->amount }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>${{ $data->quantity * $data->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-end">
            <h4>Total Amount: ${{ $totalAmount }}</h4>
        </div>
    </div>
</body>
</html>
