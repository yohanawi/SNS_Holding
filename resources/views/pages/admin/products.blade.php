@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow-sm">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0 h4">{{ __('Products') }}</h2>
            <small class="text-danger">{{ __('Dashboard / Product') }}</small>
        </div>
    </div>

    <div class="container py-5">
        <div class="border-0 shadow-lg card">
            <div class=" card-body">
                <div class="text-center head">
                    <h4 class="fw-bold text-uppercase">Add New Product</h4>
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

                <form action="{{ route('admin.product.create') }}" method="POST" enctype="multipart/form-data"
                    class="product-form">
                    @csrf
                    <div class="mb-1">
                        <div class="p-4 border-0 card">
                            <div class="row g-4">
                                <!-- Product Name -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" id="product_name" name="product_name"
                                            class="shadow-sm form-control" placeholder="Enter product name" required>
                                        <label for="product_name">Product Name <span class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="number" id="price" name="price" class="shadow-sm form-control"
                                            placeholder="Enter price" required>
                                        <label for="price">Price <span class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <!-- Discount -->
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="number" id="discount" name="discount" class="shadow-sm form-control"
                                            placeholder="Enter discount %">
                                        <label for="discount">Discount (%)</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 row g-4">
                                <!-- Category -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select id="category" name="category" class="shadow-sm form-select" required>
                                            <option value="" disabled selected>Select Category</option>
                                            <option value="men">Men</option>
                                            <option value="women">Women</option>
                                            <option value="kids">Kids</option>
                                        </select>
                                        <label for="category">Category <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="mt-4 form-floating">
                                <textarea id="product_details" name="product_details" class="shadow-sm form-control" placeholder="Enter product details"
                                    style="height: 100px;" required></textarea>
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
                                                        value="{{ $size }}">
                                                    <label class="form-check-label fw-bold"
                                                        for="size_{{ $size }}">{{ $size }}</label>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control"
                                                            id="quantity_{{ $size }}"
                                                            name="quantity_{{ $size }}" placeholder="Qty"
                                                            min="1" disabled>
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
                                    <input type="file" id="image01" name="image01" class="mt-3 form-control-file"
                                        required>
                                    <small class="text-muted">Upload your first product image</small>
                                </div>
                            </div>

                            <!-- Image 02 Input -->
                            <div class="mb-3 col-md-4">
                                <label for="image02" class="form-label">Image 02:</label>
                                <div
                                    class="p-3 text-center border rounded shadow-sm border-secondary bg-light hover-effect">
                                    <i class="bi bi-upload text-secondary" style="font-size: 2rem;"></i>
                                    <input type="file" id="image02" name="image02" class="mt-3 form-control-file">
                                    <small class="text-muted">Upload a secondary product image (optional)</small>
                                </div>
                            </div>

                            <!-- Image 03 Input -->
                            <div class="mb-3 col-md-4">
                                <label for="image03" class="form-label">Image 03:</label>
                                <div
                                    class="p-3 text-center border rounded shadow-sm border-secondary bg-light hover-effect">
                                    <i class="bi bi-upload text-secondary" style="font-size: 2rem;"></i>
                                    <input type="file" id="image03" name="image03" class="mt-3 form-control-file">
                                    <small class="text-muted">Upload a third product image (optional)</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gap-3 mt-1 d-flex justify-content-center">
                        <button type="submit" class="px-5 shadow-sm btn btn-outline-success btn-sm rounded-pill">
                            Add Product
                        </button>

                        <button type="reset" class="px-5 shadow-sm btn btn-outline-secondary btn-sm rounded-pill">
                            Reset
                        </button>

                        <a href="{{ route('admin.product.show') }}"
                            class="px-5 shadow-sm btn btn-outline-info btn-sm rounded-pill">
                            View Products
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
