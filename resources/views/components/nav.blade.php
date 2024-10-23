<header class="sticky-top">
    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="{{ route('welcome') }}">
                <img src="{{ url('images/LOGO.png') }}" alt="" width="40" height="40">
                <span class="text-dark text-uppercase fw-bold font-nunito">SNS Holdings</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 d-flex justify-content-between align-items-center">
                    <!-- Left Side Items -->
                    <div class="d-flex">
                        <li class="nav-item me-3">
                            <a class="nav-link font-nunito" href="{{ route('customer.best_seller') }}">
                                <img class="me-1 dropdown-icon"
                                    src="https://img.icons8.com/?size=30&id=Dh30aX6Y8B8U&format=png&color=1A1A1A" />Best
                                Sellers
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ route('customer.shop') }}">
                                <img class="me-1 dropdown-icon"
                                    src="https://img.icons8.com/?size=30&id=88229&format=png&color=000000" />Shop
                            </a>
                        </li>

                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img class="me-1 dropdown-icon"
                                    src="https://img.icons8.com/?size=30&id=83986&format=png&color=000000" />Category
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" style="width: 900px;">
                                <div class="row">
                                    <div class="col-3">
                                        {{-- Category Items --}}
                                        @foreach ($categories as $category)
                                            <div class="category-item">
                                                <a class="dropdown-item fw-bold" href="#"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#subcategories-{{ $category->id }}"
                                                    aria-expanded="false">
                                                    {{ $category->category }}
                                                </a>
                                                <div class="collapse" id="subcategories-{{ $category->id }}">
                                                    <div class="subcategories">
                                                        @foreach ($category->subcategories as $subcategory)
                                                            <div class="mb-2 subcategory_ d-flex align-items-center">
                                                                <img src="{{ $subcategory->image }}"
                                                                    alt="{{ $subcategory->subcategory }}"
                                                                    class="subcategory-image me-2"
                                                                    style="width: 30px; height: 30px;">
                                                                <a class="dropdown-item"
                                                                    href="#">{{ $subcategory->name }}</a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-1">
                                        <div class="vl"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            {{-- Subcategory Items --}}
                                            @foreach ($categories as $category)
                                                <div class="mb-3 subcategory-item col-6">
                                                    @foreach ($category->subcategories as $subcategory)
                                                        <div class="mb-2 subcategory_ d-flex align-items-center">
                                                            <img src="{{ $subcategory->image }}"
                                                                alt="{{ $subcategory->subcategory }}"
                                                                class="subcategory-image me-2"
                                                                style="width: 30px; height: 30px;">
                                                            <a class="dropdown-item"
                                                                href="#">{{ $subcategory->name }}</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                    </div>

                    <!-- Right Side Items -->
                    <div class="d-flex align-items-center">
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img class="me-1"
                                    src="https://img.icons8.com/?size=30&id=59851&format=png&color=1A1A1A" />Support
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Support Center</a></li>
                                <li><a class="dropdown-item" href="#">Safety Center</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Privacy & Cookie Policy</a></li>
                            </ul>
                        </li>

                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ route('customer.cart') }}">
                                <img class="me-1"
                                    src="https://img.icons8.com/?size=30&id=59997&format=png&color=1A1A1A" />Cart
                                @if (isset($cartCount) && $cartCount > 0)
                                    <span class="text-white badge bg-danger ms-1">{{ $cartCount }}</span>
                                @else
                                    <span class="ms-1">0</span>
                                @endif
                            </a>
                        </li>

                        <li class="nav-item ms-3 me-5">
                            @if (Auth::check())
                                <span class="nav-link d-flex align-items-center">
                                    <img class="me-1" src="{{ url('images/user.png') }}" alt="User"
                                        width="30" height="30" />
                                    <span class="fw-bold" style="font-size: 12px;">
                                        Welcome, {{ Auth::user()->name }}<br />Your Account
                                    </span>
                                </span>
                            @else
                                <a class="nav-link d-flex align-items-center" href="#" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal5">
                                    <img class="me-1"
                                        src="https://img.icons8.com/?size=30&id=ABBSjQJK83zf&format=png&color=1A1A1A" />
                                    <span class="fw-bold" style="font-size: 12px;">
                                        Sign in / Sign up<br />Orders & Account
                                    </span>
                                </a>
                            @endif
                        </li>

                    </div>
                </ul>

                <form class="d-flex me-5" role="search" style="border-radius: 150px; border: 1px solid #000000;">
                    <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search"
                        style="border-radius: 150px;">
                    <button class="btn btn-dark" type="submit" style="border-radius: 150px;">
                        <img src="https://img.icons8.com/?size=25&id=7695&format=png&color=ffffff" />
                    </button>
                </form>
            </div>
        </div>
    </nav>

</header>

<!-- Modal 04 -->
<!-- Modal 04 -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close rotate-on-hover" data-bs-target="#exampleModalToggle2"
                    data-bs-toggle="modal"></button>
            </div>
            <div class="p-4 rounded shadow-lg modal-body bg-body-tertiary">
                <form action="" method="POST">
                    <h5 class="mx-auto text-center modal-title" id="exampleModalLabel">Sign in / Sign up</h5>

                    <!-- Email input -->
                    <div class="mt-4 mb-3">
                        <label for="emailInput" class="form-label">Enter Email</label>
                        <input type="email" class="form-control" id="emailInput" placeholder="name@example.com"
                            required>
                    </div>

                    <!-- Password input (Initially hidden) -->
                    <div class="mt-4 mb-3" id="passwordContainer" style="display: none;">
                        <label for="passwordInput" class="form-label">Enter Password</label>
                        <input type="password" class="form-control" id="passwordInput"
                            placeholder="Enter your password" required>
                    </div>

                    <!-- Sign in button -->
                    <div class="d-flex justify-content-center">
                        <button type="button" id="signInBtn" class="btn btn-warning w-50"
                            style="border-radius: 150px;">Sign
                            in</button>
                    </div>
                </form>

                <p class="my-3 text-center">Or continue with</p>

                <!-- Social buttons -->
                <div class="gap-3 d-flex justify-content-center">
                    <!-- Google Button -->
                    <a href="#" class="social-btn">
                        <img src="{{ url('images/google.png') }}" alt="" width="40" height="40">
                    </a>

                    <!-- Facebook Button -->
                    <a href="#" class="social-btn">
                        <img src="{{ url('images/facebook.png') }}" alt="" width="40" height="40">
                    </a>

                    <!-- Instagram Button -->
                    <a href="#" class="social-btn">
                        <img src="{{ url('images/instagram.png') }}" alt="" width="40" height="40">
                    </a>

                    <!-- Twitter Button -->
                    <a href="#" class="social-btn">
                        <img src="{{ url('images/twitter.png') }}" alt="" width="40" height="40">
                    </a>
                </div>

                <p class="mt-4 text-center" style="font-size: 14px">By continuing, you agree to our <a
                        href="#">Terms of Use</a>
                    and <a href="#">Privacy Policy</a>.</p>
            </div>
        </div>
    </div>
</div>

<!-- Second Modal -->
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close rotate-on-hover" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="p-4 text-center modal-body">
                <h1 class="mb-4 modal-title fs-4" id="exampleModalToggleLabel2">Enjoy these special offers after
                    signing in! Are you sure you want to leave now?</h1>

                <div class="mt-4 row g-3">
                    <div class="col">
                        <button class="btn btn-outline-secondary w-100 fw-bold text-dark" data-bs-dismiss="modal"
                            style="border-radius: 200px">Leave</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-outline-primary w-100 fw-bold text-dark"
                            data-bs-target="#exampleModal5" data-bs-toggle="modal"
                            style="border-radius: 200px">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Add this JavaScript to handle the email submission and show the password field -->
<script>
    document.getElementById('signInBtn').addEventListener('click', function() {
        var emailInput = document.getElementById('emailInput').value;

        if (emailInput) {
            // Check if the email is valid (basic validation)
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailPattern.test(emailInput)) {
                // Show the password input field
                document.getElementById('passwordContainer').style.display = 'block';
                document.getElementById('signInBtn').innerText = 'Continue';
            } else {
                alert('Please enter a valid email address.');
            }
        } else {
            alert('Please enter your email.');
        }
    });
</script>

<style>
    .vl {
        border-left: 1px solid #ddd;
        /* Vertical line styling */
        height: auto;
        /* Automatic height */
        margin: 0 15px;
        /* Spacing around the line */
    }

    .subcategory-title {
        font-weight: bold;
        /* Make subcategory titles bold */
        margin-bottom: 10px;
        /* Space below the title */
        color: #333;
        /* Darker text color */
    }

    .subcategory_ {
        padding: 5px;
        /* Spacing around subcategory items */
        transition: background-color 0.3s;
        /* Smooth transition for hover */
    }

    .subcategory_ a {
        text-decoration: none;
        /* Remove underline */
        color: #007bff;
        /* Bootstrap primary color */
    }

    .subcategory_ a:hover {
        text-decoration: underline;
        /* Underline on hover */
        color: #0056b3;
        /* Darker shade on hover */
    }
</style>
