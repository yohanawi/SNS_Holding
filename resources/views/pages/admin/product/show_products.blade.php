@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow-sm">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0 h4">{{ __('Products Lists') }}</h2>
            <small class="text-danger">{{ __('Dashboard / Products / Products List') }}</small>
        </div>
    </div>

    <div class="container py-5">
        <div class="border-0 shadow-lg card">
            <div class="card-body">
                <div class="text-start">
                    <a href="{{ route('admin.product') }}" class="px-5 text-decoration-none text-dark">
                        <img src="https://img.icons8.com/?size=35&id=yiR4rPf7BGje&format=png&color=1A1A1A" alt="back btn"
                            class="mb-2"><span class="fw-bold text-uppercase back_button fs-5">Back</span>
                    </a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <div class="mt-3 row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="border-0 shadow-sm card product-card h-100 position-relative">
                                @if ($product->discount > 0)
                                    <span class="top-0 px-3 py-2 position-relative start-0 badge bg-danger rounded-0">
                                        {{ $product->discount }}% OFF
                                    </span>
                                @endif

                                <div class="overflow-hidden position-relative">
                                    <img src="{{ asset('storage/' . $product->image01) }}" class="card-img-top rounded-top"
                                        style="height: 250px; object-fit: cover;" alt="Product Image">

                                    <div class="gap-3 overlay-icons d-flex justify-content-center align-items-center">
                                        <a href="{{ route('admin.product.edit', $product->id) }}"
                                            class="shadow btn btn-light btn-lg rounded-circle">
                                            <img src="https://img.icons8.com/?size=25&id=6697&format=png&color=1A1A1A"
                                                alt="edit icon">
                                        </a>
                                    </div>
                                </div>

                                <div class="text-center card-body">
                                    <span class="mb-2 badge bg-primary">{{ $product->category }}</span>
                                    <p class="mb-3 card-text text-muted text-truncate" style="max-width: 180px;">
                                        {{ $product->product_details }}
                                    </p>
                                    <div class="gap-2 mb-3 d-flex justify-content-center align-items-center">
                                        <span class="fw-bold fs-5">${{ $product->new_price }}</span>
                                        <small class="text-decoration-line-through text-muted">
                                            ${{ $product->price }}
                                        </small>
                                    </div>
                                    <p class="mb-0 text-muted">{{ $product->sold }}+ sold</p>

                                    <form action="{{ route('admin.product.delete', $product->id) }}" method="POST"
                                        class="mt-3">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <img src="https://img.icons8.com/?size=20&id=9deX0HJ5iAFS&format=png&color=ffffff"
                                                alt="delete icon">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('admin_style')
    <style>
        .overlay-icons {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.4s ease-in-out;
            z-index: 1;
        }

        .product-card:hover .overlay-icons {
            opacity: 1;
        }

        .overlay-icons a {
            width: 50px;
            height: 50px;
            background-color: white;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .overlay-icons a:hover {
            transform: scale(1.2);
        }

        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .badge {
            font-size: 0.8rem;
        }
    </style>
@endpush
