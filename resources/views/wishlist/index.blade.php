@extends('layouts.master')



@section('content')
<div class="mx-auto container mt-4">
    <h1 class="mb-4">📝 My Wishlist</h1>

    @if($wishlists->isEmpty())
        <div class="alert alert-info">
            Your wishlist is currently empty. Start adding products you love!
        </div>
    @else
        <div class="row">
            @foreach($wishlists as $wishlist)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="" class="card-img-top" alt="">
                        <div class="card-body">
                             <h5 class="card-title">Product Name: {{ $wishlist->product->name }}</h5>
                             <p class="card-text">Product Description: {{ $wishlist->product->description ?? 'No description available.' }}</p>
                            <p class="text-muted">Price: ${{ number_format($wishlist->product->price, 2) }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="{{ route('products.index', $wishlist->product->id) }}" class="btn btn-primary btn-sm">View Product</a>
                            <form action="{{ route('wishlist.destroy', $wishlist->product_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
