@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
    <h1 class="mb-4">Your Shopping Cart</h1>

    @if($items->count() > 0)
        <div class="card shadow-sm mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">Album</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($item->product->image_url)
                                            <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="img-thumbnail me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-secondary text-white me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-record-vinyl"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $item->product->name }}</h6>
                                            <small class="text-muted">SKU: {{ $item->product->sku }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>${{ number_format($item->product->price, 2) }}</td>
                                <td>
                                    <form method="POST" action="{{ route('cart.update', $item->item_id) }}" class="d-flex align-items-center">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="10" class="form-control form-control-sm" style="width: 70px;">
                                        <button type="submit" class="btn btn-sm btn-outline-primary ms-2">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>${{ number_format($item->getSubtotal(), 2) }}</td>
                                <td>
                                    <form method="POST" action="{{ route('cart.remove', $item->item_id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i> Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="{{ route('checkout') }}" class="btn btn-primary">
                                Proceed to Checkout
                            </a>
                            <form method="POST" action="{{ route('cart.clear') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100">
                                    Clear Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            <h4 class="alert-heading">Your cart is empty!</h4>
            <p>Looks like you haven't added any vinyl albums to your cart yet.</p>
            <hr>
            <p class="mb-0">Explore our <a href="{{ route('products.index') }}" class="alert-link">collection of vinyl albums</a> and find your next favorite record!</p>
        </div>
    @endif
@endsection
