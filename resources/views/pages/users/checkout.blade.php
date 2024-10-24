@extends('layouts.user')

@section('content')
    <div class="container my-3">
        <div class="file-path" style="font-size: 15px">Home > Cart > Checkout</div>

        <div class="mt-5 content">
            <h2>Shipping Address</h2>
            <form action="{{ route('customer.checkout.shipping') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="country" class="form-label">
                                Country / Region <span class="text-danger">*</span>
                            </label>
                            <div class="row">
                                <div class="col-10">
                                    <select id="country" name="country" class="form-control">
                                        <option value="">Select Country</option>
                                    </select>
                                </div>
                                <div class="col-2 justify-items-start">
                                    <img id="flag" class="flag-img" src="" alt="Country Flag"
                                        style="display: none;">
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="f_name" class="form-label">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="f_name" name="f_name" class="form-control"
                                        placeholder="Enter First Name" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="l_name" class="form-label">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="l_name" name="l_name" class="form-control"
                                        placeholder="Enter Last Name" required>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mt-3 form-group">
                                    <label for="address" class="form-label">Address Search <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        placeholder="Enter Address" required autocomplete="off">
                                    <div id="suggestions" class="suggestions"></div>
                                </div> --}}
                        <div class="mt-3 row">
                            <div class="col">
                                <div class=" form-group">
                                    <label for="phone" class="form-label">Phone Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        placeholder="Enter Phone Number" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class=" form-group">
                                    <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                    <input type="text" id="city" name="city" class="form-control"
                                        placeholder="Enter City" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-6">
                        <div class=" form-group">
                            <label for="address_2" class="form-label">Street Address <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="address_2" name="address_2" class="form-control"
                                placeholder="Enter Street Address">
                        </div>
                        <div class="mt-3 form-group">
                            <label for="address_3" class="form-label">Apt, Suite, or Floor <span
                                    class="text-muted">(Optional)</span></label>
                            <input type="text" id="address_3" name="address_3" class="form-control"
                                placeholder="Enter Apt, Suite, or Floor">
                        </div>
                        <div class="mt-3 row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="zip_code" class="form-label">Zip / Postal Code <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="zip_code" name="zip_code" class="form-control"
                                        placeholder="Enter Zip / Postal Code" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="state" class="form-label">State / Province <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="state" name="state" class="form-control"
                                        placeholder="Enter State / Province" required>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                </div>
            </form>

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

    {{-- <script
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places&callback=initAutocomplete"
        async defer></script> --}}


    <script>
        // Fetch country data from REST Countries API
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                const countrySelect = document.getElementById("country");

                data.forEach(country => {
                    // Check if country has a name and flag
                    if (country.name.common && country.flags.png) {
                        const option = document.createElement("option");
                        option.value = country.cca2; // Country code (e.g., 'US')
                        option.textContent = country.name.common; // Display country name
                        option.dataset.flag = country.flags.png; // Store flag image URL
                        countrySelect.appendChild(option);
                    }
                });

                // Add event listener to display the flag when a country is selected
                countrySelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const flagImage = selectedOption.dataset.flag;

                    const flagImg = document.getElementById("flag");
                    if (flagImage) {
                        flagImg.src = flagImage; // Set the flag image source
                        flagImg.style.display = "inline"; // Show the flag image
                    } else {
                        flagImg.src = ""; // Clear the flag image
                        flagImg.style.display = "none"; // Hide the flag image
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching country data:', error);
            });
    </script>
@endpush

@push('style')
    <style>
        .flag-img {
            width: 30px;
            /* Adjust the size as needed */
            height: auto;
            margin-left: 10px;
        }
    </style>
@endpush
