@extends('layouts.user')

@section('content')
    <!--Hero section -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner" id="carousel_banner" style="height: 550px">
            <div class="carousel-item active">
                <img src="{{ url('images/Banner01.jpg') }}" class="d-block w-100" alt="..."
                    style="object-fit: cover; height: 550px;">
            </div>
            <div class="carousel-item">
                <img src="{{ url('images/Banner02.jpg') }}" class="d-block w-100" alt="..."
                    style="object-fit: cover; height: 550px;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid">
        <section>
            <!--Banner one -->
            <div class="mt-4 banner-01 d-flex justify-content-center position-relative align-items-center">
                <img src="Images/Cover Linkedin.png" class="img-fluid" alt="Banner Image"
                    style="max-width: 100%; height: 50px; width: 1300px;">
                <div class="text-center text-white banner-text position-absolute"
                    style="top: 50%; transform: translateY(-50%);">
                    Your Text Here
                </div>
            </div>

            <!-- Tranding products -->
            <div class="container mt-4">
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner">
                        <!-- product card -->
                        <div class="container mt-3 d-flex justify-content-center">
                            <div class="card product-card" style="width: 20rem;">
                                <div class="stock-badge">Only 2 left</div>
                                <img src="{{ url('images/Cover Linkedin.png') }}"
                                    class="object-cover card-img-top product-img" alt="Product Image"
                                    style="width:100%;  height: 250px">

                                <div class="card-body">
                                    <h6 class="card-title">Flexible Desk Lamp Clip</h6>
                                    <p class="price" style=" font-size: 1rem; color: #f76c6c;">$7.64
                                        <span class="old-price"
                                            style=" text-decoration: line-through; color: #888; margin-left: 8px;">$50.54</span>
                                        <span class="discount"
                                            style="color: #f76c6c;  font-weight: bold; margin-left: 5px;">-84%</span>
                                    </p>
                                    <p class="mb-1">47 sold</p>

                                    <div class="mb-1">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 90%;"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="mb-1">
                                        <span class="rating" style="color: gold;">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                        </span>
                                        <span>(5)</span>
                                    </div>

                                    {{-- <div class="countdown">01:20:40:46</div> --}}
                                </div>
                            </div>
                        </div>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <section>
            <!-- Banner two -->
            <div class="mt-4 banner-02 d-flex justify-content-center position-relative align-items-center">
                <img src="Images/Cover Linkedin.png" class="img-fluid" alt="Banner Image"
                    style="max-width: 100%; height: 50px; width: 1300px;">
                <div class="text-center text-white banner-text position-absolute"
                    style="top: 50%; transform: translateY(-50%);">
                    Your Text Here
                </div>
            </div>
        </section>

        <!-- offer section -->
        <section>
            <div class="container mt-5">
                <div class="gap-0 row">
                    <div class="mb-3 col-12 col-md-6 col-lg-4">
                        <div class="bg-black position-relative" style="height: 315px;">
                            <a href="#" class="d-flex justify-content-center align-items-center column-hover"
                                style="height: 100%; width: 100%; position: relative;">
                                <img src="{{ url('images/Banner03.jpg') }}" alt="Cover Image"
                                    class="img-fluid banner-grid w-100 h-100" style="object-fit: cover;">
                                <button class="btn btn-dark position-absolute"
                                    style="bottom: 20px; border-radius: 200px; width: 250px;">
                                    Shop Now
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="mb-3 col-12 col-md-6 col-lg-4">
                        <div class="bg-black position-relative" style="height: 315px;">
                            <a href="#" class="d-flex justify-content-center align-items-center column-hover"
                                style="height: 100%; width: 100%; position: relative;">
                                <img src="{{ url('images/Banner05.jpg') }}" alt="Cover Image"
                                    class="img-fluid banner-grid w-100 h-100" style="object-fit: cover;">
                                <button class="btn btn-dark position-absolute"
                                    style="bottom: 20px; border-radius: 200px; width: 250px;">
                                    Shop Now
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="mb-3 col-12 col-md-6 col-lg-4">
                        <div class="bg-black position-relative" style="height: 315px;">
                            <a href="#" class="d-flex justify-content-center align-items-center column-hover"
                                style="height: 100%; width: 100%; position: relative;">
                                <img src="{{ url('images/Banner07.jpg') }}" alt="Cover Image"
                                    class="img-fluid banner-grid w-100 h-100" style="object-fit: cover;">
                                <button class="btn btn-dark position-absolute"
                                    style="bottom: 20px; border-radius: 200px; width: 250px;">
                                    Shop Now
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5">
            <div class="container mb-5 text-center">
                <h2 class="text-uppercase">Categories</h2>
                <section>
                    <div class="mt-4">
                        <div style="--width: 5%;" id="categoryCarousel" class="carousel slide" data-bs-ride="carousel"
                            data-bs-interval="3000">
                            <div class="carousel-inner">
                                <!-- category card -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </section>
            </div>
        </section>

        <!--product card -->
        <section>
            <div class="mt-4 banner-03 d-flex justify-content-center position-relative align-items-center">
                <img src="Images/Cover Linkedin.png" class="img-fluid" alt="Banner Image"
                    style="max-width: 100%; height: 50px; width: 1300px;">
                <div class="text-center text-white banner-text position-absolute"
                    style="top: 50%; transform: translateY(-50%);">
                    Your Text Here
                </div>
            </div>
        </section>

        <section>
            <div class="container mt-5 mb-5 text-center">
                <h2 class="mb-5 fw-bold text-uppercase">Explore Your Interrests</h2>
                @if ($products->count() > 0)
                    <div class="gap-4 row justify-content-center">
                        @foreach ($products as $product)
                            @include('partial.product_card')
                        @endforeach
                    </div>
                @else
                    <p class="text-center">No products available.</p>
                @endif
            </div>
        </section>
    </div>
@endsection

@push('style')
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
            position: relative;
            transition: box-shadow 0.3s ease;
        }

        .product-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .stock-badge {
            background-color: #4e4e4e;
            color: white;
            padding: 5px 10px;
            border-radius: 12px;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 0.85rem;
        }

        .countdown {
            background-color: #ffecb3;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .rating i {
            font-size: 1.1rem;
        }
    </style>
@endpush
