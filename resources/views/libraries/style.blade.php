<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


<style>
    #Top_text {
        font-size: 13px;
    }

    #Top_text:hover {
        text-decoration: underline;
    }

    #Top_img {
        width: auto;
        height: 30px;
        margin-right: 5px;
    }

    .nav-item:hover {
        border-radius: 150px;
        background-color: #9ea8b0;
    }

    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }

    .vl {
        border-left: 1px solid rgba(0, 0, 0, 0.534);
        height: 100%;
    }

    .avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        display: block;
        margin: 0 auto;
    }

    .avatar:hover {
        transform: scale(1.05);
        cursor: pointer;
    }

    .avatar-label {
        display: block;
        margin-top: 10px;
        text-align: center;
        font-size: 16px;
    }

    .dropdown-toggle {
        display: flex;
        align-items: center;
    }

    .dropdown-icon {
        transition: transform 0.5s ease;
    }

    .dropdown-toggle:hover .dropdown-icon {
        transform: rotate(180deg);
    }

    #carousel_banner {
        height: 300px;
        object-fit: cover;
    }

    .banner-text {
        font-size: 24px;
        font-weight: bold;
    }

    .column-hover:hover {
        background-color: #444;
        transform: scale(1.01);
        transition: transform 0.3s ease;
    }

    .rounded-img {
        border-radius: 50%;
        width: 5rem;
        height: 5rem;
        object-fit: cover;
    }

    .swiper-container {
        width: 100%;
        height: auto;
    }

    .swiper-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }

    .swiper-slide {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        flex-shrink: 0;
    }

    .product-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transform: scale(1.02);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .old-price {
        color: #999;
        text-decoration: line-through;
    }

    .discount-badge {
        position: absolute;
        top: -5px;
        left: -5px;
        background-color: #ff4757;
        color: white;
        padding: 5px 10px;
        font-size: 0.9em;
    }

    .product-image {
        height: 250px;
        object-fit: cover;
    }

    .text-light {
        text-decoration: none;
    }

    .side-buttons {
        z-index: 99;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    .side-button {
        width: 25px;
    }

    .side-buttons a:hover {
        color: #ff4757;
    }

    .top_lable {
        font-size: 10px;
    }

    .social-btn:hover {
        opacity: 0.8;
        transform: scale(1.1);
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .rotate-on-hover {
        transition: transform 0.3s ease;
    }

    .rotate-on-hover:hover {
        transform: rotate(180deg);
    }


    /*feedback style*/
    .feedback-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        transition: box-shadow 0.3s;
    }

    .feedback-card:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .radio-label {
        cursor: pointer;
        padding: 15px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    input[type="radio"]:checked+.radio-label {
        background-color: #007bff;
        color: white;
    }

    .radio-label:hover {
        background-color: #f0f0f0;
    }

    .feedback-form {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .feedback-form h5 {
        margin-bottom: 20px;
        color: #495057;
    }

    .btn-group-toggle .btn {
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-group-toggle .btn:hover {
        background-color: #e2e6ea;
        border-color: #007bff;
    }

    .btn-group-toggle .btn.active {
        background-color: #007bff;
        color: white;
    }


    /*contact us*/
    .info-box {
        background-color: white;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
        display: flex;
        height: 150px;
        align-items: center;
    }

    .info-box img {
        width: 50px;
        height: 50px;
        margin-right: 15px;
    }

    .info-icon {
        background-color: #ff6a00;
        padding: 20px;
        border-radius: 50%;
        color: white;
        font-size: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .info-box p {
        margin: 0;
    }

    .info-box a {
        color: #ff6a00;
        text-decoration: none;
    }

    .info-box a:hover {
        text-decoration: underline;
    }
</style>

@stack('style')
