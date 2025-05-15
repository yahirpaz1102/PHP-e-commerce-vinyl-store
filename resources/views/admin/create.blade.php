@extends('layouts.app')

@section('title', 'Admin - Add New Product')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Manage Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
        </ol>
    </nav>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Add New Vinyl Album</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sku" class="form-label">SKU <span class="text-danger">*</span></label>
                            <input type="text" id="sku" name="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku') }}" required maxlength="20">
                            <div class="form-text">Unique identifier for the album (max 20 characters)</div>
                            @error('sku')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Album Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required maxlength="100">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required min="0.01" step="0.01">
                            </div>
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <select id="rating" name="rating" class="form-select @error('rating') is-invalid @enderror">
                                <option value="">Select Rating</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'Star' : 'Stars' }}</option>
                                @endfor
                            </select>
                            @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Short Description <span class="text-danger">*</span></label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3" required>{{ old('description') }}</textarea>
                            <div class="form-text">Brief description displayed in the album listing</div>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="full_description" class="form-label">Full Description</label>
                            <textarea id="full_description" name="full_description" class="form-control @error('full_description') is-invalid @enderror" rows="5">{{ old('full_description') }}</textarea>
                            <div class="form-text">Detailed description including tracklist, displayed on the album detail page</div>
                            @error('full_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Album Cover Image</label>
                            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                            <div class="form-text">Recommended size: 500x500 pixels, Max size: 2MB</div>
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="audio_snippet" class="form-label">Audio Snippet</label>
                            <input type="file" id="audio_snippet" name="audio_snippet" class="form-control @error('audio_snippet') is-invalid @enderror" accept="audio/mp3,audio/wav">
                            <div class="form-text">Upload a short audio preview (MP3 or WAV, max 5MB)</div>
                            @error('audio_snippet')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-2"></i> Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
