@extends('layouts.app')

@section('title', 'Vinyl Albums')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="display-5">Vinyl Albums</h1>
            <p class="lead">Discover our collection of premium vinyl records.</p>
        </div>
        <div class="col-md-4">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sort Albums</h5>
                    <form method="GET" action="{{ route('products.index') }}">
                        <select name="sort" class="form-select" onchange="this.form.submit()">
                            <option value="">Sort by...</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="rating_low" {{ request('sort') == 'rating_low' ? 'selected' : '' }}>Rating: Low to High</option>
                            <option value="rating_high" {{ request('sort') == 'rating_high' ? 'selected' : '' }}>Rating: High to Low</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A to Z</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z to A</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                        <div class="bg-secondary text-white text-center p-5">
                            <i class="fas fa-record-vinyl fa-3x"></i>
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fs-5 fw-bold text-primary">${{ number_format($product->price, 2) }}</span>
                            <div>
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $product->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-warning"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>

                        @if($product->audio_snippet_url)
                            <audio controls class="audio-preview mb-3">
                                <source src="{{ $product->audio_snippet_url }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        @endif

                        <div class="d-grid">
                            <a href="{{ route('products.show', $product->product_id) }}" class="btn btn-outline-dark">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No vinyl albums found. Check back soon for new arrivals!
                </div>
            </div>
        @endforelse
    </div>
@endsection
