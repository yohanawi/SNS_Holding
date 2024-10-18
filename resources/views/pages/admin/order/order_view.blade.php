@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow-sm">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0 h4">Order #{{ $order->id }} Details</h2>
            <a href="{{ route('admin.order') }}" class="btn btn-outline-secondary btn-sm">Back to Orders</a>
        </div>
    </div>

    <div class="container py-5">
        <div class="shadow-lg card">
            <div class="card-body">
                <h4 class="mb-4 text-center card-title fw-bold">Order Summary</h4>

                <p><strong>Customer Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
                <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
                <p><strong>Address:</strong> {{ $order->address }}, {{ $order->city }}</p>
                <p><strong>Postal Code:</strong> {{ $order->postal_code }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
                <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
                <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>

                <form action="{{ route('admin.order.update', $order->id) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="status" class="form-label"><strong>Status</strong></label>
                        <select name="status" id="status" class="form-select">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing
                            </option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered
                            </option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="mt-4 alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
