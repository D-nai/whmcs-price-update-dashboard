<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #173143; /* blue */
            font-size: 20px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f1f1f1;
            color: #3498db; /* blue */
        }

        button {
            background-color: #05294d; /* red */
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #082c66; /* darker red */
        }

        .alert {
            padding: 20px;
            background-color: #173143; /* Red */
            color: white;
            margin-bottom: 15px;
        }

        .product-name {
            max-width: 200px; /* Adjust as needed */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <title>Pricing Dashboard</title>
</head>
<body>
<h1>Pricing Dashboard</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Name</th>
        <th>Current Monthly Price</th>
        <th>Current Annual Price</th>
        <th colspan="2">Update Price</th> <!-- Reduced colspan to accommodate buttons -->
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        @php
            // Find the corresponding pricing data for the current product
            $pricing = $pricings->where('id', $product->id)->first();
        @endphp
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->type}}</td>
            <td class="product-name" title="{{$product->name}}">{{$product->name}}</td> <!-- Using ellipsis for long product names -->
            <td>${{ optional($pricing)->monthly ?? '' }}</td> <!-- Display monthly price -->
            <td>${{ optional($pricing)->annually ?? '' }}</td> <!-- Display annual price -->
            <td>
                <form method="POST" action="{{ url('update-price/'.$product->id) }}">
                @csrf    
                @method('PUT')
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="new_monthly_price" step="0.01" required>
            </td>
            <td>
                    <input type="number" name="new_annual_price" step="0.01" required>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>


</table>
</body>
</html>
