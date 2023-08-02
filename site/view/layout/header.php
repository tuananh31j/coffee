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
                        <!-- logo -->
                        <div class="d-flex align-items-center gap-5">
                            <a class="navbar-brand" href="index.php"><img style="width: 60px;"
                                    src="<?=$IMAGE?>/logo.png" alt=""></a>
                            <div>
                                <!-- tra cứu đơn hàng -->
                                <form class="d-flex " role="search">
                                    <input class="form-control border-light text-light "
                                        style="font-size: 14px; width: 150px;" type="search" placeholder="#Mã đơn hàng"
                                        aria-label="Search">
                                    <button class="border-0 rounded-end-2 bg-danger text-light "
                                        style="margin-left: -20px; width: 60px; font-size: 14px;" type="submit">Tra
                                        cứu</button>
                                </form>
                            </div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>


                        <!-- tìm kiếm -->

                        <div class="collapse navbar-collapse header-logo-search" id="navbarSupportedContent">
                            <form method="post" action="index.php?url=product" class="d-flex header-logo-search-form"
                                role="search">
                                <input name="keyword" value="" class="form-control header-logo-search-input "
                                    type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                                <button name="btn-search" class=" header-logo-search-btn" type="submit"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                                <p class="text-black"><?=isset($errKw)?$errKw:''?></p>

                            </form>
                            <ul class="navbar-nav  mb-2 mb-lg-0">
                                <?php if(!isset($_SESSION['user'])){ ?>
                                <li class="nav-item d-flex gap-4 align-items-center">
                                    <!-- login -->
                                    <a style="font-size: 14px;"
                                        class="p-2 text-decoration-none rounded-2 bg-danger text-light nav-link active"
                                        aria-current="page" href="index.php?url=login">Đăng
                                        nhập</a>
                                    <!-- đăng ký -->
                                    <a style="font-size: 14px;" class=" p-2 text-decoration-none rounded-2 bg-info
                                        text-black " href=" index.php?url=signup">Đăng
                                        ký</a>
                                    <!-- giỏ hàng -->
                                    <a class=" nav-link active p-2" aria-current="page" href="index.php?url=cart"><i
                                            class="fa-solid fa-cart-shopping"></i><span
                                            class="header-count-cart"><?=isset($cartNum)?$cartNum:0?></span></a>
                                </li>
                                <?php }else{ ?>


                                <li class="nav-item d-flex align-items-center gap-4">
                                    <!-- người dùng -->
                                    <div class="nav-link active d-flex align-items-center " aria-current="page"><i
                                            class="text-light me-1 fs-6" style="width: 100px">
                                            <?php if($_SESSION['user']['role'] == 1){ ?>
                                            <a class="bg-danger p-2 text-light text-decoration-none rounded-2"
                                                href="<?=$ADMIN_URL?>">Quản trị</a>
                                            <?php }else{ ?><span> <span style="font-size: 12px;">Xin
                                                    chào! <br><?=$_SESSION['user']['name']?></span>
                                            </span>
                                            <?php } ?>
                                        </i><a href="index.php?url=account"><img class=" rounded-circle"
                                                style="height: 35px;width: 35px; object-fit:cover"
                                                src="<?=$IMAGE.'/'.$_SESSION['user']['image_url']?>" alt=""></a></div>
                                    <!-- giỏ hàng -->
                                    <a class="nav-link active p-2" aria-current="page" href="index.php?url=cart"><i
                                            class="fa-solid fa-cart-shopping"></i><span
                                            class="header-count-cart"><?=isset($cartNum)?$cartNum:0?></span></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                </nav>
            </div>
            <!-- menu -->
            <div class="container">
                <nav class="header-menu ">

                    <div class="menu ">

                        <div><a class="item__hover " href="index.php">TRANG CHỦ</a></div>
                        <div><a class="item__hover " href="">CỬA HÀNG</a></div>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle border-0 item__hover-cate"
                                style="background: none;" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                DANH MỤC
                            </a>

                            <ul class="dropdown-menu">
                                <?php foreach($categorys as $item){ ?>
                                <li><a class="dropdown-item item__hover-cate"
                                        href="index.php?url=product&category=<?=$item['category_id']?>&sort=<?php echo isset($sort)?$sort:0?>"><?=$item['name']?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div><a class="item__hover " href="index.php?url=product">SẢN PHẨM</a></div>
                        <div><a class="item__hover " href="index.php?url=contact">LIÊN HỆ</a></div>
                        <div><a class="item__hover " href="index.php?url=aboutus">GIỚI THIỆU</a></div>
                    </div>
                </nav>



            </div>

        </header>