@extends('layouts.customer')

@section('content')
    <div class="container my-3">
        <div class="file-path" style="font-size: 15px">Home > Checkout</div>

        <div class="mt-3 content">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <h5 class="mb-3">Shipping Address</h5>
                    <div class="mt-2 card">
                        <div class="info-box">
                            <ul class="list-unstyled">
                                <li class="text-end">
                                    <a href="#" class="model018 text-muted" style="font-size: 14px;">Change address
                                        &gt;</a>
                                </li>
                                <li>
                                    <div class="blue-bar">
                                        <div class="row align-items-center">
                                            <div class="col-10">
                                                <strong>{{ $shipping->first_name }} {{ $shipping->last_name }}</strong>
                                                &nbsp;&nbsp; <span>{{ $shipping->phone }}</span>
                                            </div>
                                            <div class="col-2 d-flex justify-items-end">
                                                <a href="#">
                                                    <img style="width: 20px; height: 20px;"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAplJREFUSEuVV9thpDAMHHXCVXLQSVJJspVcOoFUku3EQbZsS7YEe3zxsDXyaPSA0C4CkPoj3zmv8gJ5H322RuqT3USXm1+xnNfYhdM2januxaVXUCJCwr0LgKfHAO9wLwLWQrw2GgI8CXjWQAkJKxJ2AF8A3idLjqk3AP/uz08gJGb5C6kYVj6uQAatrxq4jvgoop/Ty6UDX8ZvMiiGs42BSrNWUZ0Bmqfnpk8A381rn/Fj0Gw94wLCjqTBs4ENQN5jYixxzRSdoLJIKNXuO0o+DbLTf0+bD/m8SIzl5LSdBzsK9wSTThqYgC2JdxPmLEfDFAEPERqD8kFYA42dfOKBwTUVisqJCQff+0JrTGjQ6hKH6RFlzAA8xbhRPVW0btEDLV8Jn0j0iPaWGPdqwrm7y4smhMBzA+qEfQPo0MA6U4IYiwKFage4gzpx6PqIq8FYufQpLNXdRkyvyQbjLu/hS1Rt0smJ8XRiWoFU081YFr96eLSjRbDlW02nIVUkxjaPJU4rQHuPmc7vfO+kHy1A+hGwksdyjW1R19gt2RMPzdqkWSREJ3RV9FY54cJ5ShBgwoaEI+hhxt5ZoI7a8V4QV/Ms7+lpI/RmVkL1zsA9dSf11XZmY5Z7oFl7l+e8+IZqP1VeMXw3J6wE7IUQ2ghJqB66U/fwpoD43anqtQwI5Sk+sbbht8Uh4dyuEcXY5P3WxTV0p+xh707cyp7uLKsEMs9lRgfcn7lT8WVCZ5pEHldkcoirrJG20zOdwSHj0h8gtYmzFBDL99sZog89MwU5qvp0tKKF/f0cg3jm6gQGJ+PJoY4s138Yk4HphWkMegS2tcvRkvZ0WhzqSv1hTJqY0yl24n+/+H261aCxZLpiuRpfwr+NS3UCv3p1KzIVr0gGAAAAAElFTkSuQmCC" /></a>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="orange-bar">{{ $shipping->street_address }}</li>
                                <li class="red-bar">
                                    {{ $shipping->city }}, {{ $shipping->state_province }} {{ $shipping->zip_code }},
                                    {{ $shipping->country }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>

                    <!-- Cart Items -->
                    @foreach ($cartItems as $cartItem)
                        <div class="cart_items">
                            <div class="product_item row align-items-center">
                                <div class="text-center col-md-2">
                                    <img src="{{ asset('storage/' . $cartItem->product->image01) }}" alt="Product Image"
                                        class="img-fluid" style="max-width: 100px; height: 100px;">
                                </div>
                                <div class="col-md-9">
                                    <h6 class="text-muted text-truncate" style="max-width: 200px;">
                                        {{ $cartItem->product->product_details }}
                                    </h6>
                                    <div class="d-flex flex-column">
                                        <div class="row">
                                            <div class="col text-end">
                                                <p>Quantity:
                                                    <input name="quantity_{{ $cartItem->product->id }}"
                                                        id="quantity_{{ $cartItem->product->id }}" class=""
                                                        value="{{ $cartItem->quantity }}" disabled>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-2 row">
                                            <div class="col">
                                                <p>Price: Rp. {{ number_format($cartItem->product->price, 2) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr>

                    <!-- Payment Method -->
                    <div class="payment-method ms-lg-5">
                        <h6>Payment Method</h6>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3 form-group">
                                    <input type="radio" id="payment_method_1" name="payment_method"
                                        class="payment_method_radio">
                                    <label for="payment_method_1">
                                        <img src="{{ asset('images/paypal.png') }}" alt="PayPal"
                                            style="max-width: 30px; height: 30px;">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-3">
                    <h5>Order Summary</h5>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col">Item(s) total:</div>
                        <div class="col text-end">Rp.
                            {{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col">Shipping:</div>
                        <div class="col text-end">Rp. 0</div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col">Sales tax:</div>
                        <div class="col text-end">Rp. 100.00</div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col">
                            <h5>Order total:</h5>
                        </div>
                        <div class="col text-end">Rp.
                            {{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity) + 100, 2) }}
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <button type="button" class="btn btn-custom" data-bs-toggle="modal"
                            data-bs-target="#orderModal">Submit order</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Confirmation Modal -->
        <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="text-center modal-body">Your order has been submitted successfully!</div>
                </div>
            </div>
        </div>
    @endsection

    @push('style')
        <style>
            .btn-custom {
                background-color: #ff6a00;
                color: #fff;
                border-radius: 50px;
            }

            .btn-custom:hover {
                background-color: #e65a00;
            }
        </style>
    @endpush

    @push('js')
        <script>
            const submitOrderButton = document.querySelector('.btn-custom');
            const orderModal = new bootstrap.Modal(document.getElementById('orderModal'));

            submitOrderButton.addEventListener('click', function() {
                orderModal.show();
                setTimeout(function() {
                    window.location.href = '/';
                }, 3000);
            });
        </script>
    @endpush
