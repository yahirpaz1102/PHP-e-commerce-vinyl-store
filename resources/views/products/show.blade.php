@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Albums</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Album Image -->
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm">
                @if($product->image_url)
                    <img src="{{ $product->image_url }}" class="img-fluid rounded" alt="{{ $product->name }}">
                @else
                    <div class="bg-secondary text-white text-center p-5" style="height: 400px;">
                        <i class="fas fa-record-vinyl fa-5x mt-5"></i>
                    </div>
                @endif

                @if($product->audio_snippet_url)
                    <div class="card-body">
                        <h5 class="card-title">Listen to Preview</h5>
                        <audio controls class="audio-preview w-100">
                            <source src="{{ $product->audio_snippet_url }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                @endif
            </div>
        </div>

        <!-- Album Details -->
        <div class="col-md-7">
            <h1 class="display-5 mb-3">{{ $product->name }}</h1>

            <div class="mb-3">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $product->rating)
                        <i class="fas fa-star text-warning"></i>
                    @else
                        <i class="far fa-star text-warning"></i>
                    @endif
                @endfor
            </div>

            <div class="fs-3 fw-bold text-primary mb-4">${{ number_format($product->price, 2) }}</div>

            <div class="mb-4">
                <p class="lead">{{ $product->description }}</p>
                @if($product->full_description)
                    <div class="mt-3">
                        <h5>Album Details</h5>
                        {!! nl2br(e($product->full_description)) !!}
                    </div>
                @endif
                <hr>
                <p class="mb-1"><strong>SKU:</strong> {{ $product->sku }}</p>
            </div>

            @auth
                <form method="POST" action="{{ route('cart.add', $product->product_id) }}" class="mb-4">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" max="10">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <div class="alert alert-info">
                    Please <a href="{{ route('login') }}">login</a> to add this album to your cart.
                </div>
            @endauth
        </div>
    </div>
@endsection
