@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="bg-white shadow-sm">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0 h4">{{ __('Dashboard') }}</h2>
            <small class="text-danger">{{ __('Dashboard / ') }}</small>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container py-5">
        <div class="shadow-sm card">
            <div class="card-body row">
                <!-- Card 1 -->
                <div class="col">
                    <div class="shadow-sm card h-100 bg-primary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title" style="color: #000">Products</h5>
                                <span class="fs-1">{{ $productCount }}</span>
                            </div>
                            <a href="{{ route('admin.product.show') }}" class="text-decoration-none fs-6"
                                style="color: #000">Read More</a>
                        </div>
                    </div>
                </div>


                <!-- Card 2 -->
                <div class="col">
                    <div class="shadow-sm card h-100 bg-warning">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title" style="color: #000">Orders</h5>
                                <span class="fs-1">{{ $orderCount }}</span>
                            </div>
                            <a href="{{ route('admin.order') }}" class="text-decoration-none fs-6" style="color: #000">Read
                                More</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col">
                    <div class="shadow-sm card h-100 bg-success">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title" style="color: #000">Completed</h5>
                                <span class="fs-1">{{ $completedOrdersCount }}</span>
                            </div>
                            <a href="#" class="text-decoration-none fs-6" style="color: #000">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col">
                    <div class="shadow-sm card h-100 bg-danger">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title" style="color: #000">Messages</h5>
                                <span class="fs-1">1</span>
                            </div>
                            <a href="#" class="text-decoration-none fs-6" style="color: #000">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
