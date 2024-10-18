@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow-sm">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0 h4">{{ __('Orders') }}</h2>
            <small class="text-danger">{{ __('Dashboard / Orders') }}</small>
        </div>
    </div>

    <div class="container py-5">
        <div class="border-0 shadow-lg card">
            <div class="card-body">
                <h4 class="mb-4 card-title">Order Details</h4>

                @if ($orders->isEmpty())
                    <p>No orders found.</p>
                @else
                    @foreach ($orders as $order)
                        <p>{{ $order->first_name }} {{ $order->last_name }}</p>
                        <p>{{ $order->user->email ?? 'N/A' }}</p>
                        <p>{{ $order->address }}</p>
                        <p>{{ $order->postal_code }}</p>
                        <p>{{ $order->city }}</p>
                        <p>{{ $order->status }}</p>
                        <p>{{ $order->created_at->format('F d, Y') }}</p>
                        <p>{{ $order->quantity }}</p>
                        <p>${{ $order->total_price }}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
