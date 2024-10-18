@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow-sm">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0 h4">{{ __('Edit Product') }}</h2>
            <small class="text-danger">{{ __('Dashboard / Products / Products List / Edit Product') }}</small>
        </div>
    </div>

    <div class="container py-5">
        <div class="border-0 shadow-lg card">
            <div class="card-body">
                <div class="text-start">
                    <a href="{{ route('admin.product.show') }}" class="px-5 text-decoration-none text-dark">
                        <img src="https://img.icons8.com/?size=35&id=yiR4rPf7BGje&format=png&color=1A1A1A" alt="back btn"
                            class="mb-2"><span class="fw-bold text-uppercase back_button fs-5">Back</span>
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data" class="product-form">
                    @csrf
                    @method('PUT')
                    <div class="mb-1">
                        <div class="p-4 border-0 card">
                            <div class="row g-4">
                                <!-- Product Name -->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" id="product_name" name="product_name"
                                            class="shadow-sm form-control" placeholder="Enter product name"
                                            value="{{ old('product_name', $product->product_name) }}" required>
                                        <label for="product_name">Product Name <span class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="number" id="price" name="price" class="shadow-sm form-control"
                                            placeholder="Enter price" value="{{ old('price', $product->price) }}" required>
                                        <label for="price">Price <span class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <!-- Discount -->
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="number" id="discount" name="discount" class="shadow-sm form-control"
                                            placeholder="Enter discount %"
                                            value="{{ old('discount', $product->discount) }}">
                                        <label for="discount">Discount (%)</label>
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input id="category" name="category" class="shadow-sm form-control"
                                            value="{{ old('category', $product->category) }}" disabled>
                                        <label for="category">Category</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="mt-4 form-floating">
                                <textarea id="product_details" name="product_details" class="shadow-sm form-control" placeholder="Enter product details"
                                    style="height: 100px;" required>{{ old('product_details', $product->product_details) }}</textarea>
                                <label for="product_details">Details <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-1">
                        <div class="p-4 border-0 card">
                            <label class="form-label fs-6">Sizes and Quantity:</label>
                            <div class="row row-cols-1 row-cols-md-5 g-3">
                                @php
                                    $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
                                @endphp
                                @foreach ($sizes as $size)
                                    <div class="col">
                                        <div class="shadow-sm card border-light h-100">
                                            <div class="card-body">
                                                <div
                                                    class="form-check form-switch d-flex justify-content-between align-items-center">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="size_{{ $size }}" name="sizes[]"
                                                        value="{{ $size }}"
                                                        {{ in_array($size, json_decode($product->sizes, true)) ? 'checked' : '' }}
                                                        onchange="this.nextElementSibling.disabled = !this.checked;">
                                                    <label class="form-check-label fw-bold"
                                                        for="size_{{ $size }}">{{ $size }}</label>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control"
                                                            id="quantity_{{ $size }}"
                                                            name="quantity_{{ $size }}" placeholder="Qty"
                                                            min="1"
                                                            value="{{ old('quantity_' . $size, $quantities["quantity_$size"] ?? 0) }}"
                                                            {{ in_array($size, json_decode($product->sizes, true)) ? '' : 'disabled' }}>
                                                        <label for="quantity_{{ $size }}">Quantity</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="mb-1">
                        <div class="p-4 border-0 row">
                            <!-- Image 01 Input -->
                            <div class="mb-3 col-md-4">
                                <label for="image01" class="form-label">Image 01: <span
                                        class="text-danger">*</span></label>
                                <div class="p-3 text-center border rounded shadow-sm border-primary bg-light hover-effect">
                                    <i class="bi bi-upload text-primary" style="font-size: 2rem;"></i>
                                    <input type="file" id="image01" name="image01" class="mt-3 form-control-file">
                                    @if ($product->image01)
                                        <img src="{{ asset('storage/' . $product->image01) }}" alt="Product Image 01"
                                            class="mt-2" style="max-height: 100px;">
                                    @endif
                                </div>
                            </div>

                            <!-- Image 02 Input -->
                            <div class="mb-3 col-md-4">
                                <label for="image02" class="form-label">Image 02:</label>
                                <div
                                    class="p-3 text-center border rounded shadow-sm border-secondary bg-light hover-effect">
                                    <i class="bi bi-upload text-secondary" style="font-size: 2rem;"></i>
                                    <input type="file" id="image02" name="image02" class="mt-3 form-control-file">
                                    @if ($product->image02)
                                        <img src="{{ asset('storage/' . $product->image02) }}" alt="Product Image 02"
                                            class="mt-2" style="max-height: 100px;">
                                    @endif
                                </div>
                            </div>

                            <!-- Image 03 Input -->
                            <div class="mb-3 col-md-4">
                                <label for="image03" class="form-label">Image 03:</label>
                                <div
                                    class="p-3 text-center border rounded shadow-sm border-secondary bg-light hover-effect">
                                    <i class="bi bi-upload text-secondary" style="font-size: 2rem;"></i>
                                    <input type="file" id="image03" name="image03" class="mt-3 form-control-file">
                                    @if ($product->image03)
                                        <img src="{{ asset('storage/' . $product->image03) }}" alt="Product Image 03"
                                            class="mt-2" style="max-height: 100px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gap-3 mt-4 d-flex justify-content-center">
                        <button type="submit" class="px-5 shadow-sm btn btn-primary btn-lg rounded-pill">
                            <img src="https://img.icons8.com/?size=20&id=21866&format=png&color=1A1A1A" alt="">
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
