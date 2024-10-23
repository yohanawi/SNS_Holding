@extends('layouts.user')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <div class="row">
                    <h4 class="fw-bold">{{ $product->product_name }}</h4>
                    <div class="col">
                        <p>Brand: <span class="text-uppercase text-primary">beast</span></p>
                    </div>
                    <div class="col text-end">
                        <span>
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span> (15 Reviews)
                        </span>
                    </div>

                </div>
            </div>
            <div class="col social text-end">
                <a href="#" class="text-decoration-none">
                    <img src="{{ url('images/social_13051733.png') }}" alt="facebook" style="width: 6%">
                </a>
                <a href="#" class="text-decoration-none">
                    <img src="{{ url('images/instagram_3938036.png') }}" alt="facebook" style="width: 6%">
                </a>
                <a href="#" class="text-decoration-none">
                    <img src="{{ url('images/social_13051741.png') }}" alt="facebook" style="width: 6%">
                </a>
                <a href="#" class="text-decoration-none">
                    <img src="{{ url('images/email_3694289.png') }}" alt="facebook" style="width: 6%">
                </a>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-5">
                <div class="text-center main_image">
                    <img id="mainImage" src="{{ asset('storage/' . $product->image01) }}" class="img-fluid"
                        alt="product main image" style="height: 500px; object-fit: cover;">
                </div>
                <div class="gap-3 mt-3 text-center sub_image">
                    <img onclick="changeMainImage(this)" src="{{ asset('storage/' . $product->image01) }}" class="img-fluid"
                        alt="product sub image" style="height: 160px; object-fit: cover;">
                    <img onclick="changeMainImage(this)" src="{{ asset('storage/' . $product->image02) }}" class="img-fluid"
                        alt="product sub image" style="height: 160px; object-fit: cover;">
                    <img onclick="changeMainImage(this)" src="{{ asset('storage/' . $product->image03) }}" class="img-fluid"
                        alt="product sub image" style="height: 160px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                    <span class="text-danger font-weight-bold fs-2">Rs. {{ $product->price }}</span>
                    <del class="text-muted ps-3">Rs. {{ $product->price }}</del>
                </div>
                <hr />
                <div>
                    <ul>
                        <li>Product : {{ $product->product_name }}</li>
                        <li>Brand: Beast</li>
                        <li>Color: {{ $product->color }}</li>
                        <li>Material: Cotton</li>
                        <li>Size Range : {{ $product->sizes }}</li>
                        <li>Quality Standards : 100% QC Passed. Export Ready.</li>
                        <li>Specialities : Tagless. Comfortable. Excellent Colorfastness. Anti-Shrink.</li>
                        <li>Warranty : 14 Day Easy Returns & Size Exchanges. Return & Exchange Policy</li>
                        <li>Delivery : Estimated 1-3 Working Days within Colombo & Suburbs. 3-5 Working Days Outstation.
                        </li>
                        <li>Payment Options : Card or Cash on Delivery at Checkout.</li>
                        <li>A Genuine Product. Made in Sri Lanka.</li>
                    </ul>
                </div>
                <div class="container mt-4">
                    <form action="{{ route('customer.cart.addToCart') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-12">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" id="selected-size" name="size" required>

                                <label class="fw-bold me-3">Sizes:</label>
                                <span class="text-muted">Choose an Option</span>
                                <div class="mt-2">
                                    @foreach (['S', 'M', 'L', 'XL', 'XXL'] as $size)
                                        <label for="size_{{ $size }}"></label>
                                        <button type="button" class="btn btn-outline-secondary btn-sm size-btn"
                                            data-size="{{ $size }}" data-product-id="{{ $product->id }}">
                                            {{ $size }}
                                        </button>
                                    @endforeach
                                </div>
                                <div id="stock-status" class="mt-3"></div>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-6 col-md-3">
                                <label class="mb-1 fw-bold">Quantity :</label>
                                <div class="rounded input-group" style="border: 1px solid #030303;">
                                    <button class="btn" type="button" onclick="decreaseQuantity()">-</button>
                                    <input type="text" id="quantity" name="quantity" class="text-center form-control"
                                        value="1" aria-label="Quantity" required>
                                    <button class="btn" type="button" onclick="increaseQuantity()">+</button>
                                </div>
                            </div>
                            <div class="gap-2 mt-4 col-2 col-md-6 d-flex justify-content-start">
                                <button class="btn btn-dark" onclick="addToCart({{ $product->id }})">Add to
                                    Cart</button>

                                <button class="btn btn-warning">Buy Now</button>
                            </div>
                        </div>
                    </form>
                    <hr />
                    <p>Category : <span class="text-primary text-capitalize"> {{ $product->category }}</span></p>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container mt-5">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-items">
                    <button class="nav-link active fs-3" data-toggle="tab" href="#menu1">Description</button>
                </li>
                <li class="nav-items">
                    <button class="nav-link fs-3" data-toggle="tab" href="#menu2">Specification</button>
                </li>
                <li class="nav-items">
                    <button class="nav-link fs-3" data-toggle="tab" href="#menu3">Reviews (15)</button>
                </li>
            </ul>

            <div class="tab-content">
                <div id="menu1" class="mt-3 tab-pane fade show active">
                    <p class="mb-5" style="margin-left: 80px; text-align:justify;"><strong>The
                            {{ $product->product_name }}</strong> is a
                        <strong>Premium Long Sleeve
                            T-Shirt</strong>
                        made with 65/35 cotton materials, fine durable stitches and export-ready production standards to
                        give you the best value
                        and comfort. The fit of the t-shirt falls between regular and slim. Relaxed on shoulders and neck,
                        slightly slimmer yet comfortable on the body. A precise tailor-made fit to suit all body types.
                        <br /> <br />
                        <strong>Care Instructions</strong>
                        <br /> <br />
                        Wash at or below 30°C. Do not bleach or use detergents containing bleach. Tumble dry at low to
                        medium temperature. Do not dry clean. Iron at medium temperature. Wash dark colours separately. We
                        recommend turning the garment inside out during laundry and drying. Do not iron on prints.
                        <br /> <br />
                        <strong>Warranty</strong>
                        <br /> <br />
                        This product is eligible for a satisfaction money-back guarantee or exchange of sizes if required.
                        Please read our Return & Exchange Policy for more information.
                        <br /> <br />
                        <strong>Payments & Delivery</strong>
                        <br /> <br />
                        We accept all major credit & debit cards, cash on delivery payments. The delivery fee is a flat-rate
                        to any location in Sri Lanka and for any number of items you order. Deliveries will usually take 1-3
                        working days within Colombo and suburbs. 3-5 working days outstation.
                        <br /> <br />
                        Deliveries are handled by third-party courier services. Delivery times mentioned may vary according
                        to the scheduling of deliveries by the courier services.
                    </p>
                </div>
                <div id="menu2" class="mt-3 tab-pane fade">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row" style="width:20%; background-color: #c7c7c7;">Weight</th>
                                <td>0.275 kg</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width:20%; background-color: #c7c7c7;">Dimensions</th>
                                <td>40 × 32 × 1 cm</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width:20%; background-color: #c7c7c7;">Size</th>
                                <td>S, M, L, XL, XXL</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="menu3" class="mt-3 tab-pane fade">
                    <p>Average Ratings</p>
                    <h3>4.93</h3>
                    <span>
                        <span class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span> <br />
                        (15 Reviews)
                    </span>

                    <div>
                        <ul>
                            <li>5 Star</li>
                            <li>4 Star</li>
                            <li>3 Star</li>
                            <li>2 Star</li>
                            <li>1 Star</li>
                        </ul>
                    </div>

                    <div class="mb-3 bg-secondary ban" style="padding-top: 5px; padding-bottom: 2px;">
                        <p class="mt-1 align-middle ms-3 fw-bolder fs-5">15 Reviews for this Product</p>
                    </div>

                    <div class="ratings">
                        <div class="row">
                            <div class="col">
                                <img src="{{ asset('storage/' . $product->image01) }}" alt="user"
                                    style="width: 10%;">
                            </div>
                            <div class="justify-start col">
                                <span class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span><br />
                                by <span class="text-primary">Yohan</span> | <span class="text-muted">April 9, 2021</span>
                                <p>Comments</p>
                            </div>
                        </div>
                    </div>

                    <div class="rating_form">
                        <form action="#">
                            <h6 class="text-uppercase">Submit your review</h6>
                            <p>Your email address will not be published. Required fileds are marked <span
                                    class="text-danger">*</span></p>

                            <p>Your rating of this product <span class="text-danger">*</span>
                                <span class="ms-3 text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </p>

                            <textarea name="comment" id="comment" rows="6" class="form-control"
                                placeholder="Write your review here... (optional)"></textarea>
                            <div class="mt-3 row">
                                <div class="col">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your name">
                                </div>
                                <div class="col">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Your email">
                                </div>
                            </div>

                            <button type="submit" class="mt-3 mb-5 btn btn-warning">Submit Review</button>
                            <button type="reset" class="mt-3 mb-5 btn btn-secondary">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .size-btn {
            width: 50px;
        }

        #stock-status {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
@endpush

@push('js')
    <script>
        document.querySelectorAll('.size-btn').forEach(button => {
            button.addEventListener('click', function() {
                const size = this.dataset.size;
                const productId = this.dataset.productId;
                const stockStatus = document.getElementById('stock-status');

                fetch(`/product/stock/${productId}/${size}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.stock !== undefined) {
                            stockStatus.innerHTML =
                                `<span class="text-success">${data.message} (Available: ${data.stock})</span>`;
                        } else {
                            stockStatus.innerHTML = `<span class="text-danger">${data.message}</span>`;
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching stock:', error);
                        stockStatus.innerHTML =
                            `<span class="text-danger">Error fetching stock status</span>`;
                    });
            });
        });

        document.querySelectorAll('.size-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Remove 'active' class from all buttons
                document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('active'));

                // Add 'active' class to the clicked button
                this.classList.add('active');

                // Store the selected size in the hidden input field
                document.getElementById('selected-size').value = this.getAttribute('data-size');
            });
        });
    </script>
@endpush
