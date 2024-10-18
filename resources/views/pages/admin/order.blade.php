@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow-sm">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0 h4 text-uppercase">{{ __('Orders') }}</h2>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">Back to Dashboard</a>
        </div>
    </div>

    <div class="container py-5">
        <div class="border-0 shadow-lg card">
            <div class="card-body">
                <h4 class="mb-4 text-center card-title fw-bold text-uppercase">Order Details</h4>

                @if ($orders->isEmpty())
                    <div class="text-center alert alert-info">No orders found.</div>
                @else
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            @foreach ($orders as $order)
                                <div class="mb-4 col-md-6 col-lg-4">
                                    <div class="shadow-sm card">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary">{{ $order->first_name }}
                                                {{ $order->last_name }}</h5>
                                            <h6 class="mb-2 card-subtitle text-muted">
                                                <i class="bi bi-envelope"></i>
                                                {{ $order->user->email ?? 'N/A' }}
                                            </h6>
                                            <p class="card-text">
                                                <strong>Address:</strong> {{ $order->address }}, {{ $order->city }}<br>
                                                <strong>Postal Code:</strong> {{ $order->postal_code }}
                                            </p>
                                            <p><strong>Status:</strong>
                                                <span
                                                    class="badge 
                                                    @if ($order->status == 'completed') bg-success 
                                                    @elseif ($order->status == 'cancelled') bg-danger 
                                                    @elseif ($order->status == 'pending') bg-warning 
                                                    @elseif (in_array($order->status, ['processing', 'shipped'])) bg-info 
                                                    @else bg-secondary @endif">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </p>

                                            <p>
                                                <strong>Date:</strong> {{ $order->created_at->format('F d, Y') }}
                                            </p>
                                            <p>
                                                <strong>Quantity:</strong> {{ $order->quantity }} <br>
                                                <strong>Total:</strong> ${{ number_format($order->total_price, 2) }}
                                            </p>
                                        </div>
                                        <div class="card-footer text-end">
                                            <a href="{{ route('admin.order.show', $order->id) }}"
                                                class="btn btn-outline-primary btn-sm">View Details</a>
                                            <form action="{{ route('admin.order.delete', $order->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Cancel Order</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
