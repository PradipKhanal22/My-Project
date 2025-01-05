@extends('layouts.master')

@section('content')
    <h1>Your Purchase History</h1>

    @if($purchaseHistory->count())
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Purchased At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchaseHistory as $history)
                    <tr>
                        <td>{{ $history->product->name }}</td>
                        <td>{{ $history->quantity }}</td>
                        <td>${{ $history->price }}</td>
                        <td>{{ $history->purchased_at->format('F j, Y, g:i a') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $purchaseHistory->links() }} <!-- Paginate the purchase history if necessary -->
    @else
        <p>No purchase history found.</p>
    @endif




@endsection
