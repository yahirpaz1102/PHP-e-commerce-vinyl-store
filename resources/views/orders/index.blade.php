@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
    <h1 class="mb-4">My Orders</h1>

    @if($orders->count() > 0)
        <div class="row">
            @foreach($orders as $order)
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Order #{{ $order->order_id }}</h5>
                            <span class="text-muted">{{ $order->created_at->format('F d, Y h:i A') }}</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                                    <p><strong>Status:</strong> <span class="badge bg-success">Completed</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Shipping Address:</strong><br>{{ $order->shipping_address }}</p>
                                </div>
                            </div>
                            <div class="text-end mt-3">
                                <a href="{{ route('orders.show', $order->order_id) }}" class="btn btn-primary">
                                    <i class="fas fa-eye me-2"></i> View Order Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            <h4 class="alert-heading">No orders yet!</h4>
            <p>You haven't placed any orders yet.</p>
            <hr>
            <p class="mb-0">Explore our <a href="{{ route('products.index') }}" class="alert-link">collection of vinyl albums</a> and find your next favorite record!</p>
        </div>
    @endif
@endsection
