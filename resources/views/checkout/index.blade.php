@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-4">Checkout</h1>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Shipping & Billing Information</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('checkout.process') }}">
                        @csrf

                        <div class="mb-4">
                            <h6>Shipping Address</h6>
                            <div class="mb-3">
                                <label for="shipping_address" class="form-label">Complete Address</label>
                                <textarea id="shipping_address" name="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" rows="3" required>{{ old('shipping_address') }}</textarea>
                                @error('shipping_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6>Billing Address</h6>
                            <div class="mb-3">
                                <label for="billing_address" class="form-label">Complete Address</label>
                                <textarea id="billing_address" name="billing_address" class="form-control @error('billing_address') is-invalid @enderror" rows="3" required>{{ old('billing_address') }}</textarea>
                                @error('billing_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-check-circle me-2"></i> Place Order
                            </button>
                            <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Return to Cart
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm sticky-top" style="top: 20px;">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Order Summary</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6>Items ({{ $cart->items->sum('quantity') }})</h6>
                        <ul class="list-group list-group-flush">
                            @foreach($cart->items as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <div>
                                        <span>{{ $item->product->name }}</span>
                                        <small class="d-block text-muted">Qty: {{ $item->quantity }}</small>
                                    </div>
                                    <span>${{ number_format($item->getSubtotal(), 2) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-bold">Total</span>
                        <span class="fw-bold">${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
