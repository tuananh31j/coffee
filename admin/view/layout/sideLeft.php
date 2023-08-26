<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdnjs.com/libraries/Chart.js">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            prefix: 'tw-',
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="<?php echo $STYLE ?>/admin.css">

</head>

<body>
    <div class="container-fluid">
        <div class=" row ">
            <!-- THANH ĐIỀU KHIỂN -->
            <div class="col-3 " style="background-color:#b5313a;">
                <!--   -->
                <div class="dashboard-menu tw-overflow-y-scroll col-3 h-100 tw-fixed" style="margin-left:-12px;background-color:#b5313a;">
                    <h2 class="text-center pe-3 mb-4 tw-font-semibold tw-text-4xl">Hignland coffee</h2>

                    <nav class="control tw-flex tw-flex-col tw-mx-5 ">
                        <ul>
                            <!-- user -->
                            <li>
                                <div class="d-flex gap-2 align-content-center">
                                    <div class=" h-25" style="width: 42px;">
                                        <img class="w-100 rounded-circle border border-4 border-light" style="height: 42px; object-fit: cover;" src="<?= $IMAGE . '/' . $_SESSION['user']['image_url'] ?>" alt="">
                                    </div>
                                    <div class="">
                                        <p class="fw-bold m-0 tw-text-white"><?= $_SESSION['user']['name'] ?></p>
                                        <p class=" fs-6 m-0 tw-text-white"><?= $_SESSION['user']['email'] ?></p>
                                    </div>

                                </div>
                            </li>
                            <!-- Trang chủ -->
                            <a class="tw-text-white fw-bold text-decoration-none  " href="<?= $ROOT_URL ?>">
                                <li class="mt-4 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg ">
                                    <i class="hover:tw-text-white fa-solid fa-house tw-text-white"></i> Trang chủ
                                </li>
                            </a>
                            <!-- điều khiển -->
                            <a class="tw-text-white fw-bold  text-decoration-none " href="index.php">
                                <li class="mt-3 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg ">
                                    <i class="hover:tw-text-white fa-solid fa-gauge tw-text-white"></i> Thống kê
                                </li>
                            </a>
                            <!-- đơn hàng -->
                            <a class="tw-text-white fw-bold text-decoration-none " href="index.php?url=order&act=list">
                                <li class="mt-3 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg">
                                    <i class="hover:tw-text-white fa-solid fa-box tw-text-white"></i> Đơn hàng
                                </li>
                            </a>
                            <!-- Danh mục -->
                            <a class="tw-text-white fw-bold text-decoration-none " href="index.php?url=category&act=list">
                                <li class="mt-3 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg">
                                    <i class="hover:tw-text-white fa-solid fa-hashtag tw-text-white"></i> Danh mục
                                </li>
                            </a>
                            <!-- size -->
                            <a class="tw-text-white fw-bold text-decoration-none " href="index.php?url=size&act=list">
                                <li class="mt-3 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg">
                                    <i class="hover:tw-text-white fa-solid fa-ruler-combined tw-text-white"></i> Kích cỡ
                                </li>
                            </a>
                            <!-- Sản phẩm -->
                            <a class="tw-text-white fw-bold text-decoration-none " href="index.php?url=product&act=list">
                                <li class="mt-3 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg">
                                    <i class="hover:tw-text-white fa-solid fa-mug-saucer tw-text-white"></i> Sản phẩm
                                </li>
                            </a>
                            <!-- cửa hàng -->
                            <a class="tw-text-white fw-bold text-decoration-none " href="index.php?url=shop&act=list">
                                <li class="mt-3 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg">
                                    <i class="hover:tw-text-white fa-solid fa-shop tw-text-white"></i> Cửa hàng
                                </li>
                            </a>
                            <!-- khách hàng -->
                            <a class="tw-text-white fw-bold text-decoration-none " href="index.php?url=customer&act=list">
                                <li class="mt-3 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg">
                                    <i class="hover:tw-text-white fa-solid fa-people-group tw-text-white"></i> Khách hàng
                                </li>
                            </a>
                            <!-- Bình luận -->
                            <a class="tw-text-white fw-bold text-decoration-none " href="index.php?url=comment&act=list">
                                <li class="mt-3 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg">
                                    <i class="hover:tw-text-white fa-solid fa-comments tw-text-white"></i> Bình luận
                                </li>
                            </a>
                            <!-- Đánh giá -->
                            <a class="tw-text-white fw-bold text-decoration-none " href="index.php?url=feedback&act=list">
                                <li class="mt-3 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg">
                                    <i class="hover:tw-text-white fa-solid fa-message"></i> Đánh giá
                                </li>
                            </a>
                            <!-- Phản hồi -->
                            <a class="tw-text-white fw-bold text-decoration-none " href="index.php?url=contact">
                                <li class="mt-3 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg">
                                    <i class="hover:tw-text-white fa-solid fa-envelope tw-text-white"></i> Liên hệ
                                </li>
                            </a>
                            <!-- Banner -->
                            <a class="tw-text-white fw-bold text-decoration-none " href="index.php?url=banner&act=list">
                                <li class="mt-3 hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg">
                                    <i class="hover:tw-text-white fa-solid fa-mountain-sun"></i> Banner
                                </li>
                            </a>
                        </ul>
                    </nav>
                    <a class="position-relative tw-text-white fw-bold text-decoration-none hover:tw-bg-amber-950 hover:tw-text-white  hover:tw-rounded-lg tw-p-3" style="top: 3%; left: 54%;" href="index.php?url=logout"><i class="hover:tw-text-white fa-solid fa-right-from-bracket"></i>
                        Đăng xuất</a>
                </div>
            </div>