@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">My Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order #{{ $order->order_id }}</li>
        </ol>
    </nav>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Order #{{ $order->order_id }}</h4>
                <span class="text-muted">{{ $order->created_at->format('F d, Y h:i A') }}</span>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6>Order Information</h6>
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
                    <p><strong>Order Status:</strong> <span class="badge bg-success">Completed</span></p>
                    <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Shipping Information</h6>
                    <p><strong>Shipping Address:</strong><br>{{ $order->shipping_address }}</p>
                    <h6 class="mt-3">Billing Information</h6>
                    <p><strong>Billing Address:</strong><br>{{ $order->billing_address }}</p>
                </div>
            </div>

            <h5 class="mb-3">Order Items</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">Album</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($item->product && $item->product->image_url)
                                        <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name ?? 'Product' }}" class="img-thumbnail me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary text-white me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-record-vinyl"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-0">{{ $item->product->name ?? 'Product no longer available' }}</h6>
                                        @if($item->product)
                                            <small class="text-muted">SKU: {{ $item->product->sku }}</small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->getSubtotal(), 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="table-light">
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                        <td><strong>${{ number_format($order->total_amount, 2) }}</strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('orders.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i> Back to Orders
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    <i class="fas fa-shopping-cart me-2"></i> Continue Shopping
                </a>
            </div>
        </div>
    </div>
@endsection
