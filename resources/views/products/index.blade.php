<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Store Products</h1>
    <p>Prepared by: Timbal, Greggy F.</p>

    <table border="1" cellpadding="8">
        <tr>
            <th>Product Name</th>
            <th>Price (₱)</th>
            <th>Stock</th>
        </tr>

        @foreach ($products as $p)
        <tr>
            <td>{{ $p['name'] }}</td>
            <td>{{ number_format($p['price'], 2) }}</td>
            <td>{{ $p['stock'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>