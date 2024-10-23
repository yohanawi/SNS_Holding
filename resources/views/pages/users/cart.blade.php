@extends('layouts.user')

@section('content')
    <div class="container my-3">
        <div class="file-path" style="font-size: 15px">Home > Cart</div>

        <div class="mt-5 content">
            <div class="row">
                <div class="col-9">
                    <input type="checkbox" id="selectAll"> Select All ({{ $products->count() }})
                    <hr>
                    <div class="cart_items">
                        @foreach ($products as $index => $product)
                            <div class="mb-4 product_item row align-items-center">
                                <div class="col-1" style="width: 3%">
                                    <input type="checkbox" class="product-checkbox">
                                </div>
                                <div class="product_image col-2">
                                    <img src="{{ asset('images/' . $product->image) }}" alt="Product Image"
                                        class="img-fluid" style="max-width: 150px; height: 150px;">
                                </div>
                                <div class="product_details col-8">
                                    <h6>{{ $product->name }}</h6>
                                    <p>{{ $product->description }}</p>
                                    <div class="justify-between row">
                                        <div class="mt-2 col">
                                            <p>Price: ${{ number_format($product->price, 2) }}</p>
                                        </div>
                                        <div class="col text-end">
                                            <p>Quantity:
                                                <select name="quantity" class="quantity-select"
                                                    data-id="{{ $product->id }}">
                                                    <option selected>{{ $cartItems[$index]->quantity }}</option>
                                                </select>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_controls col-1 text-end">
                                    <form action="{{ route('customer.cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $cartItems[$index]->id }}">
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col">
                    <p class="fw-bold">Order Summary</p>
                    <div class="product_prices">
                        <div class="row justify-content-between">
                            <div class="col-8">
                                <p>Item Total: </p>
                                <p>Item Discount: </p>
                                <hr>
                                <p>Estimated total ({{ $products->count() }} items) </p>
                            </div>
                            <div class="col-4 text-end">
                                <p>$30.49</p> <!-- Replace with dynamic calculation if needed -->
                                <p>-$25.51</p>
                                <hr>
                                <span>$4.98</span> <!-- Replace with total -->
                            </div>
                        </div>
                        <span class="text-muted">Taxes and delivery fees</span>
                        <br />
                        <div class="d-flex justify-content-center">
                            <button class="mt-3 text-white btn btn-lg rounded-pill"
                                style="background-color: #ff6a00; font-size: 14px; padding: 10px 20px;"
                                onclick="window.location.href='{{ route('customer.chekout') }}'">
                                Checkout ({{ $products->count() }})
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Generate option tags from 1 to 99 for each product quantity select element
        document.querySelectorAll('.quantity-select').forEach(selectElement => {
            for (let i = 1; i <= 99; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.text = i;
                selectElement.appendChild(option);
            }
        });

        // Select All checkbox functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.product-checkbox').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });
    </script>
@endpush

@push('style')
    <style>
        .quantity-select {
            display: inline-block;
            padding: 0.375rem 1.75rem 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            appearance: none;
            position: relative;
            background-image: url('data:image/svg+xml;charset=UTF8,%3Csvg xmlns%3D%27http://www.w3.org/2000/svg%27 width%3D%2716%27 height%3D%2716%27 fill%3D%27none%27 stroke%3D%27%23495057%27 stroke-linecap%3D%27round%27 stroke-linejoin%3D%27round%27 stroke-width%3D%272%27 class%3D%27feather feather-chevron-down%27 viewBox%3D%270 0 24 24%27%3E%3Cpath d%3D%27M6 9l6 6 6-6%27/%3E%3C/svg%3E');
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
        }

        .quantity-select:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }
    </style>
@endpush
