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
                                <div class="col-1" style="width: 3%;">
                                    <input type="checkbox" class="product-checkbox" data-price="{{ $product->price }}"
                                        data-quantity="{{ $cartItems[$index]->quantity }}">
                                </div>
                                <div class="product_image col-2">
                                    <img src="{{ asset('storage/' . $product->image01) }}" alt="Product Image"
                                        class="img-fluid" style="max-width: 150px; height: 150px;">
                                </div>
                                <div class="product_details col-8">
                                    <h6>{{ $product->product_name }}</h6>
                                    <p class="card-text text-muted text-truncate" style="max-width: 200px;">
                                        {{ $product->product_details }}</p>
                                    <div class="justify-between row">
                                        <div class="col">
                                            <p>Price: ${{ number_format($product->price, 2) }}</p>
                                        </div>
                                        <div class="col text-end">
                                            <p>Quantity:
                                                <select name="quantity" class="quantity-select"
                                                    data-id="{{ $cartItems[$index]->id }}">
                                                    @for ($i = 1; $i <= 99; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ $i == $cartItems[$index]->quantity ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
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

                <!-- Order Summary -->
                <div class="col">
                    <p class="fw-bold">Order Summary</p>
                    <div class="product_prices">
                        <div class="row justify-content-between">
                            <div class="col-8">
                                <p>Item Total: </p>
                                <p>Item Discount: </p>
                                <hr>
                                <p>Estimated total (<span id="item-count">0</span> items)</p>
                            </div>
                            <div class="col-4 text-end">
                                <p id="item-total">$0.00</p>
                                <p id="item-discount">-$0.00</p>
                                <hr>
                                <span id="estimated-total">$0.00</span>
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
        // Generate options from 1 to 99 for quantity select
        document.querySelectorAll('.quantity-select').forEach(select => {
            select.addEventListener('change', function() {
                const cartItemId = this.dataset.id;
                const newQuantity = this.value;

                fetch('{{ route('customer.cart.update') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            id: cartItemId,
                            quantity: newQuantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Quantity updated successfully!');
                            location.reload(); // Optional: Refresh to update totals
                        } else {
                            alert('Failed to update quantity.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });


        document.querySelector('.btn-lg').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default redirect

            const estimatedTotal = document.getElementById('estimated-total').textContent.replace('$', '');

            fetch('{{ route('customer.cart.storeTotal') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        total_price: estimatedTotal
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = '{{ route('customer.chekout') }}'; // Redirect after saving
                    } else {
                        alert('Failed to save the total. Try again.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });


        // Select All checkbox functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.product-checkbox').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            const productCheckboxes = document.querySelectorAll('.product-checkbox');
            const quantitySelects = document.querySelectorAll('.quantity-select');

            // Elements for displaying totals
            const itemTotalEl = document.getElementById('item-total');
            const itemDiscountEl = document.getElementById('item-discount');
            const estimatedTotalEl = document.getElementById('estimated-total');
            const itemCountEl = document.getElementById('item-count');
            const checkoutCountEl = document.getElementById('checkout-count');

            const DISCOUNT_RATE = 0.1; // 10% discount

            // Function to calculate totals
            function calculateTotals() {
                let totalPrice = 0;
                let itemCount = 0;

                productCheckboxes.forEach((checkbox) => {
                    if (checkbox.checked) {
                        const quantity = parseInt(
                            checkbox.closest('.product_item').querySelector('.quantity-select')
                            .value
                        );
                        const price = parseFloat(checkbox.dataset.price);
                        totalPrice += price * quantity;
                        itemCount += quantity;
                    }
                });

                const discount = totalPrice * DISCOUNT_RATE;
                const estimatedTotal = totalPrice - discount;

                // Update the UI with calculated values
                itemTotalEl.textContent = `$${totalPrice.toFixed(2)}`;
                itemDiscountEl.textContent = `-$${discount.toFixed(2)}`;
                estimatedTotalEl.textContent = `$${estimatedTotal.toFixed(2)}`;
                itemCountEl.textContent = itemCount;
                checkoutCountEl.textContent = itemCount;
            }

            // Event listeners for checkboxes and quantity selects
            productCheckboxes.forEach((checkbox) =>
                checkbox.addEventListener('change', calculateTotals)
            );

            quantitySelects.forEach((select) =>
                select.addEventListener('change', calculateTotals)
            );

            // Initial calculation on page load
            calculateTotals();
        });
    </script>
@endpush

@push('style')
    <style>
        .quantity-select {
            display: inline-block;
            padding: 0.375rem 1.75rem 0.375rem 0.75rem;
            font-size: 1rem;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            background-image: url('data:image/svg+xml;charset=UTF8,%3Csvg...%3E');
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
