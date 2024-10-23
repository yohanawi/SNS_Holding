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
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa{{ $i <= $averageRating ? 's' : 'r' }} fa-star"></i>
                                @endfor
                            </span> ({{ $reviews->count() }} Reviews)
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
                    <img onclick="changeMainImage(this)" src="{{ asset('storage/' . $product->image03) }}"
                        class="img-fluid" alt="product sub image" style="height: 160px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                    @php
                        $new_price = $product->price - ($product->price * $product->discount) / 100;
                    @endphp
                    <span class="text-danger font-weight-bold fs-2">Rs. {{ number_format($new_price, 2) }}</span>
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
                    <button class="nav-link fs-3" data-toggle="tab" href="#menu3">Reviews
                        ({{ $reviews->count() }})</button>
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
                    <h3 class="text-left">{{ $averageRating }}</h3>
                    <span>
                        <span class="text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $i <= $averageRating ? 's' : 'r' }} fa-star"></i>
                            @endfor
                        </span>
                        ({{ $reviews->count() }} Reviews)
                    </span>

                    <div class="mt-2">
                        <ul class="list-unstyled">
                            @foreach ($ratingCounts as $star => $count)
                                <li class="row">
                                    <div class="col-5 d-flex justify-content-start align-items-center">
                                        <span>{{ $star }} Star</span>
                                        <div style="flex-grow: 1; margin: 0 10px;">
                                            <div class="progress" style="width: 100%;">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $reviews->count() > 0 ? ($count / $reviews->count()) * 100 : 0 }}%;"
                                                    aria-valuenow="{{ $count }}" aria-valuemin="0"
                                                    aria-valuemax="{{ $reviews->count() }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col"><span class="text-start">{{ $count }}</span></div>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="mb-3 bg-secondary ban" style="padding-top: 5px; padding-bottom: 2px;">
                        <p class="mt-1 align-middle ms-3 fw-bolder fs-5">{{ $reviews->count() }} Reviews for this Product
                        </p>
                    </div>

                    <div id="reviewCarousel" class="mt-4 carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse($reviews->chunk(5) as $index => $reviewChunk)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="text-center row justify-content-center">
                                        @foreach ($reviewChunk as $review)
                                            <div class="mx-2 mt-1 border col-md-2">
                                                <img src="{{ asset('storage/' . $product->image01) }}" alt="user"
                                                    class="mb-2 img-fluid rounded-circle"
                                                    style="width: 80px; height: 80px;"><br />
                                                <span class="text-warning">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="fa{{ $i <= $review->rating ? 's' : 'r' }} fa-star"></i>
                                                    @endfor
                                                </span>
                                                <br />
                                                <strong class="mt-2 d-block">{{ $review->name }}</strong>
                                                <span
                                                    class="text-muted">{{ $review->created_at->format('F j, Y') }}</span>
                                                <p class="mt-1 small">{{ $review->comment }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    <p class="text-center">No reviews yet. Be the first to review this product!</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Carousel controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="mt-5 rating_form">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('customer.review.store') }}" method="POST">
                            @csrf
                            <h6 class="text-uppercase">Submit your review</h6>
                            <p class="text-muted">Your email address will not be published. Required fields are marked
                                <span class="text-danger">*</span>
                            </p>
                            <p>Your rating of this product <span class="text-danger">*</span></p>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="rating-stars d-flex align-items-center">
                                <input type="hidden" name="rating" id="rating" value="0">
                                <span class="text-warning" id="stars">
                                    <i class="far fa-star" data-star="1"></i>
                                    <i class="far fa-star" data-star="2"></i>
                                    <i class="far fa-star" data-star="3"></i>
                                    <i class="far fa-star" data-star="4"></i>
                                    <i class="far fa-star" data-star="5"></i>
                                </span>
                            </div>

                            <textarea name="comment" id="comment" rows="2" class="mt-3 form-control"
                                placeholder="Write your review here... (optional)"></textarea>

                            <div class="mt-3 row">
                                <div class="col">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your name" required>
                                </div>
                                <div class="col">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Your email" required>
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

        .rating-stars i {
            font-size: 24px;
            cursor: pointer;
            margin-right: 5px;
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

    <script>
        const stars = document.querySelectorAll('#stars i');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const starValue = this.getAttribute('data-star');
                ratingInput.value = starValue;

                // Highlight the stars up to the selected one
                stars.forEach(s => {
                    s.classList.remove('fas', 'text-warning');
                    s.classList.add('far');
                });
                for (let i = 0; i < starValue; i++) {
                    stars[i].classList.remove('far');
                    stars[i].classList.add('fas', 'text-warning');
                }
            });
        });
    </script>
@endpush
