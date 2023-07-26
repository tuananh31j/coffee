<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $STYLE?>/admin.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdnjs.com/libraries/Chart.js">
</head>

<body>
    <div class="container-fluid">
        <div class=" row ">
            <!-- THANH ĐIỀU KHIỂN -->
            <div class="col-3 " style="background: linear-gradient(to bottom, #f6606a, #4d0846);">
                <!-- position-fixed h-100 -->
                <div class="dashboard-menu col-3  "
                    style="margin-left:-12px;background: linear-gradient(to bottom, #f6606a, #4d0846);">
                    <h2 class="text-center pe-3 mb-4">Hignland coffee</h2>

                    <nav class="control">
                        <ul>
                            <!-- user -->
                            <li>
                                <div class="d-flex gap-2 align-content-center">
                                    <div class=" h-25" style="width: 42px;">
                                        <img class="w-100 rounded-circle" style="height: 42px; object-fit: cover;"
                                            src="<?=$IMAGE.'/'.$_SESSION['user']['image_url']?>" alt="">
                                    </div>
                                    <div class="">
                                        <p class="fw-bold m-0">Tuấn Anh</p>
                                        <p class=" fs-6 m-0">tuananh@gmail.com</p>
                                    </div>

                                </div>
                            </li>
                            <!-- Trang chủ -->
                            <a class="text-black text-decoration-none" href="<?=$ROOT_URL?>">
                                <li class="mt-4 ">
                                    <i class="fa-solid fa-house"></i> Trang chủ
                                </li>
                            </a>
                            <!-- điều khiển -->
                            <a class="text-black  text-decoration-none" href="index.php">
                                <li class="mt-3 ">
                                    <i class="fa-solid fa-gauge"></i> Thống kê
                                </li>
                            </a>
                            <!-- đơn hàng -->
                            <a class="text-black text-decoration-none" href="index.php?url=order">
                                <li class="mt-3">
                                    <i class="fa-solid fa-box"></i> Đơn hàng
                                </li>
                            </a>
                            <!-- Danh mục -->
                            <a class="text-black text-decoration-none" href="index.php?url=category">
                                <li class="mt-3">
                                    <i class="fa-solid fa-hashtag"></i> Danh mục
                                </li>
                            </a>
                            <!-- Sản phẩm -->
                            <a class="text-black text-decoration-none" href="index.php?url=product&act=list">
                                <li class="mt-3">
                                    <i class="fa-solid fa-mug-saucer"></i> Sản phẩm
                                </li>
                            </a>
                            <!-- khách hàng -->
                            <a class="text-black text-decoration-none" href="index.php?url=customer">
                                <li class="mt-3">
                                    <i class="fa-solid fa-people-group"></i> Khách hàng
                                </li>
                            </a>
                            <!-- Bình luận -->
                            <a class="text-black text-decoration-none" href="index.php?url=comment">
                                <li class="mt-3">
                                    <i class="fa-solid fa-comments"></i> Bình luận
                                </li>
                            </a>
                            <!-- Phản hồi -->
                            <a class="text-black text-decoration-none" href="index.php?url=contact">
                                <li class="mt-3">
                                    <i class="fa-solid fa-envelope"></i> Phản hồi
                                </li>
                            </a>
                        </ul>
                    </nav>
                    <a hidden class="position-relative text-black text-decoration-none" style="top: 100px; left: 200px;"
                        href="index.php?url=logout"><i class="fa-solid fa-right-from-bracket"></i>
                        Đăng xuất</a>
                </div>
            </div>