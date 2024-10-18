<footer class="py-4 footer bg-dark text-light">
    <div class="container">
        <div class="justify-content-between row">
            <!-- Quick Links -->
            <div class="mb-3 col-md-3">
                <h6>Company info</h6>
                <ul class="list-unstyled">
                    <li class="mt-3 mb-2" style="font-size: 14px">
                        <a href="" class="text-light">About Us</a>
                    </li>
                    <li class="mb-2" style="font-size: 14px">
                        <a href="" class="text-light">Contact us</a>
                    </li>
                    <li class="mb-2" style="font-size: 14px"><a href="#" class="text-light">Careers</a></li>
                    <li class="mb-2" style="font-size: 14px"><a href="#" class="text-light">Press</a></li>
                </ul>
            </div>

            <!-- Extra Links -->
            <div class="mb-3 col-md-3">
                <h6>Customer service</h6>
                <ul class="list-unstyled">
                    <li class="mt-3 mb-2" style="font-size: 14px">
                        <a href="#" class="text-light">Return and refund policy</a>
                    </li>
                    <li class="mb-2 " style="font-size: 14px">
                        <a href="#" class="text-light">intellectual property policy</a>
                    </li>
                    <li class="mb-2" style="font-size: 14px">
                        <a href="#" class="text-light">Shopping info</a>
                    </li>
                    <li class="mb-2" style="font-size: 14px">
                        <a href="#" class="text-light">Your recalls and product safety alerts</a>
                    </li>
                    <li class="mb-2" style="font-size: 14px">
                        <a href="#" class="text-light">Report suspicious activity</a>
                    </li>
                </ul>
            </div>

            <!-- Contact Us -->
            <div class="mb-3 col-md-3">
                <h6>Help</h6>
                <ul class="list-unstyled">
                    <li class="mt-3 mb-2" style="font-size: 14px">
                        <a href="#" class="text-light">Support center & FAQ</a>
                    </li>
                    <li class="mb-2" style="font-size: 14px">
                        <a href="#" class="text-light">Sitemap</a>
                    </li>
                    <li class="mb-2" style="font-size: 14px">
                        <a href="#" class="text-light">How to order</a>
                    </li>
                    <li class="mb-2" style="font-size: 14px">
                        <a href="#" class="text-light">How to track</a>
                    </li>
                </ul>
            </div>

            <!-- Follow Us -->
            <div class="mb-3 col-md-3">
                <h6>Connect with Us</h6>
                <ul class="list-unstyled">
                    <li class="mt-3 mb-2" style="font-size: 14px">
                        <a href="#" class="text-light"><i class="fab fa-facebook-f"></i> Facebook</a>
                    </li>
                    <li class="mb-2" style="font-size: 14px">
                        <a href="#" class="text-light"><i class="fab fa-instagram"></i> Instagram</a>
                    </li>
                    <li class="mb-2" style="font-size: 14px">
                        <a href="#" class="text-light"><i class="fab fa-tiktok"></i> TikTok</a>
                    </li>
                    <li class="mb-2" style="font-size: 14px">
                        <a href="#" class="text-light"><i class="fab fa-youtube"></i> Youtube</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h6>We accept</h6>
                <img src="{{ url('images/visa.png') }}" style="width: 5%;" alt="visa">
                <img src="{{ url('images/paypal.png') }}" style="width: 5%;" alt="paypal">
                <img src="{{ url('images/american.png') }}" style="width: 5%;" alt="american">
                <img src="{{ url('images/google-pay.png') }}" style="width: 5%;" alt="google-pay">
                <img src="{{ url('images/apple-pay.png') }}" style="width: 5%;" alt="apple-pay">
            </div>
        </div>
        <hr>
        <div class="text-center">
            &copy; <span id="year"></span> <span>{{ config('app.name', 'Laravel') }}</span> | All rights reserved!
        </div>
    </div>
</footer>
