<!DOCTYPE html>
<html>

<head>
    <title>Receipt of {{ $order->customer->first_name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div>
        <p><strong>Receipt Details:</strong></p>
        <p>Name: {{ $order->customer->first_name . ' ' . $order->customer->last_name }}</p>
        <p>Room Number: @if ($order->customer->room_number)
                #{{ $order->customer->room_number }}
            @else
                N/A
            @endempty</p>
        <p>Doctor: @if ($order->customer->doctor_name)
                Dr. {{ $order->customer->doctor_name }}
            @else
                N/A
            @endempty
        </p>
    <p>Nurse: @if ($order->customer->name_of_nurse)
                {{ $order->customer->name_of_nurse }}
            @else
                N/A
            @endempty</p>
    <p>Date and Time: {{ Carbon\Carbon::parse($order->created_at)->format('h:m a M d, Y ') }}</p>
</div>
<table>
    <thead>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th class="text-right">Price</th>
            <th class="text-right">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td class="text-right">{{ $item->product->price }}</td>
                <td class="text-right">Php {{ number_format($item->quantity * $item->product->price, 2) }} </td>
            </tr>
        @endforeach

    </tbody>
</table>
</body>

</html>
