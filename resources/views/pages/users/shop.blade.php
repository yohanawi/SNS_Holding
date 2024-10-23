@extends('layouts.user')

@section('content')
    <div class="container my-5">
        <h2 class="mb-4 text-center fw-bold text-uppercase">Shop</h2>
        <div class="gap-3 row" id="product-container">
            @foreach ($products as $product)
                @include('partial.product_card', ['products' => $products])
            @endforeach
        </div>
        <div class="mt-4 d-flex justify-content-center">
            @if ($products->hasMorePages())
                <button class="btn btn-primary" id="load-more" data-next-page="{{ $products->currentPage() + 1 }}">
                    Load More
                </button>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '#load-more', function() {
            let button = $(this);
            let nextPage = button.data('next-page');

            $.ajax({
                url: "?page=" + nextPage,
                type: 'GET',
                beforeSend: function() {
                    button.text('Loading...');
                },
                success: function(data) {
                    $('#product-container').append(data);

                    // Update the button's next page data
                    let newPage = nextPage + 1;
                    button.data('next-page', newPage);

                    // Check if there are more pages to load
                    if (!data.includes('product-card')) {
                        button.hide();
                    } else {
                        button.text('Load More');
                    }
                },
                error: function() {
                    alert('Something went wrong!');
                }
            });
        });
    </script>
@endsection
