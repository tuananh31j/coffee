<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="<?php echo $STYLE?>/style.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
</head>

<body>
    <div class="container-fuild">
        <!-- HEADER -->

        <header class="">
            <!-- slide text -->
            <div id="carouselExampleInterval" class="carousel slide text-center " data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="2000">
                        <p class="text-lg-center">UỐNG HIGNLAND COFFEE TẠI NHÀ!</p>
                    </div>
                    <div class="carousel-item" data-bs-interval="4000">
                        <p class="text-lg-center">GIAO HÀNG TOÀN QUỐC</p>
                    </div>
                    <div class="carousel-item" data-bs-interval="7000">
                        <P class="text-lg-center">UỐNG LÀ NGHIỀN</P>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
            <!-- header-logo -->
            <div class="header-logo">
                <nav class=" navbar navbar-expand-lg ">

                    <div class="container  header-logo-img">
                        <a class="navbar-brand" href="#"><img src="img/logo 1.svg" alt=""></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse header-logo-search" id="navbarSupportedContent">

                            <form class="d-flex header-logo-search-form" role="search">
                                <input class="form-control header-logo-search-input " type="search"
                                    placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                                <button class=" header-logo-search-btn" type="submit"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                            <ul class="navbar-nav  mb-2 mb-lg-0">
                                <!-- người dùng -->
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="login.html"><i
                                            class="fa-regular fa-user"></i></a>
                                </li>
                                <!-- giỏ hàng -->
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="cart.html"><i
                                            class="fa-solid fa-cart-shopping"></i><span
                                            class="header-count-cart">2</span></a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </nav>
            </div>
            <!-- menu -->
            <div class="container">
                <nav class="header-menu ">

                    <ul>
                        <li><a href=""><i class="fa-solid fa-house"></i></a></li>
                        <li><a href="">TRANG CHỦ</a></li>
                        <li><a href="">GIẢM GIÁ</a></li>
                        <li><a href="">SẢN PHẨM</a></li>
                        <li><a href="">LIÊN HỆ</a></li>
                        <li><a href="">GIỚI THIỆU</a></li>
                    </ul>
                </nav>



            </div>

        </header>