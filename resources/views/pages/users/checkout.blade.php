@extends('layouts.user')

@section('content')
    <div class="container my-3">
        <div class="file-path" style="font-size: 15px">Home > Cart > Checkout</div>

        <div class="mt-5 content">
            <div class="row">
                <div class="col-9">
                    <h2>Checkout</h2>
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="address" class="form-label">Shipping Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter your address" required>
                        </div>

                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select id="payment_method" name="payment_method" class="form-select" required>
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Initialize Google Places API Autocomplete
        function initAutocomplete() {
            const input = document.getElementById('address');
            const autocomplete = new google.maps.places.Autocomplete(input, {
                types: ['geocode'], // 'geocode' to allow global address search
            });

            // Handle the address selection
            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                console.log(place); // Optional: Log the place object for more info
            });
        }
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places&callback=initAutocomplete"
        async defer></script>
@endpush
