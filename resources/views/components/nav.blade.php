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
                                            <div class="category-item" data-category-id="{{ $category->id }}">
                                                <a class="dropdown-item fw-bold" href="#">
                                                    {{ $category->category }}
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-1">
                                        <div class="vl"></div>
                                    </div>
                                    <div class="col-8">
                                        {{-- Subcategories will be dynamically shown here --}}
                                        @foreach ($categories as $category)
                                            <div class="subcategories collapse" id="subcategories-{{ $category->id }}">
                                                <div class="row row-cols-8 g-3">
                                                    @foreach ($category->subcategories as $subcategory)
                                                        <div class="text-center col">
                                                            <a class="dropdown-item d-block" href="#">
                                                                <img src="{{ asset('storage/' . $subcategory->image) }}"
                                                                    alt="{{ $subcategory->subcategory }}"
                                                                    class="rounded-circle"
                                                                    style="width: 80px; height: 80px; object-fit: cover;">
                                                                <br />
                                                                {{ $subcategory->subcategory }}
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- {{ asset('storage/' . $product->image01) }} --}}
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

<script>
    document.querySelectorAll('.category-item').forEach(item => {
        item.addEventListener('mouseenter', (event) => {
            const categoryId = event.currentTarget.dataset.categoryId;

            document.querySelectorAll('.subcategories').forEach(subcat => {
                subcat.classList.remove('show');
            });

            const targetSubcategory = document.getElementById(`subcategories-${categoryId}`);
            if (targetSubcategory) {
                targetSubcategory.classList.add('show');
            }
        });
    });
</script>

<style>
    .vl {
        border-left: 1px solid #ddd;
        height: 100%;
    }

    .category-item:hover {
        background-color: #f1f1f1;
        border-radius: 5px;
    }

    #subcategory-container {
        min-height: 300px;
        background-color: #fafafa;
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow-y: auto;
        transition: all 0.3s ease;
    }

    .subcategories img {
        border: 2px solid #ddd;
        padding: 5px;
        transition: transform 0.3s ease;
    }

    .subcategories img:hover {
        transform: scale(1.1);
    }

    .subcategories a {
        font-weight: 500;
        color: #333;
        text-decoration: none;
    }

    .subcategories a:hover {
        color: #007bff;
    }
</style>
