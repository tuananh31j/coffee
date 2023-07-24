<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/du-an-1-nhom7/public/css/admin.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdnjs.com/libraries/Chart.js">
</head>

<body>
    <div class="container-fluid">
        <div class=" row ">
            <!-- THANH DIEU KHIEN -->
            <div class="col-3 " style="background: linear-gradient(to bottom, #f6606a, #4d0846);">
                <div class="dashboard-menu col-3  position-fixed h-100"
                    style="margin-left:-12px;background: linear-gradient(to bottom, #f6606a, #4d0846);">
                    <h2 class="text-center pe-3 mb-4">Hignland coffee</h2>

                    <nav class="control">
                        <ul>
                            <!-- user -->
                            <li>
                                <div class="d-flex gap-2 align-content-center">
                                    <div class=" h-25" style="width: 42px;">
                                        <img class="w-100 rounded-circle" style="height: 42px; object-fit: cover;"
                                            src="../img/mm.png" alt="">
                                    </div>
                                    <div class="">
                                        <p class="fw-bold m-0">Tuấn Anh</p>
                                        <p class=" fs-6 m-0">tuananh@gmail.com</p>
                                    </div>

                                </div>
                            </li>
                            <!-- điều khiển -->
                            <a class="text-black text-decoration-none" href="">
                                <li class="mt-4 ">
                                    <i class="fa-solid fa-gauge "></i> Thống kê
                                </li>
                            </a>
                            <!-- đơn hàng -->
                            <a class="text-black text-decoration-none" href="">
                                <li class="mt-3">
                                    <i class="fa-solid fa-box"></i> Đơn hàng
                                </li>
                            </a>
                            <!-- Danh mục -->
                            <a class="text-black fw-bolder" href="">
                                <li class="mt-3">
                                    <i class="fa-solid fa-hashtag"></i> Danh mục
                                </li>
                            </a>
                            <!-- Sản phẩm -->
                            <a class="text-black text-decoration-none" href="">
                                <li class="mt-3">
                                    <i class="fa-solid fa-mug-saucer"></i> Sản phẩm
                                </li>
                            </a>
                            <!-- khách hàng -->
                            <a class="text-black text-decoration-none" href="">
                                <li class="mt-3">
                                    <i class="fa-solid fa-people-group"></i> Khách hàng
                                </li>
                            </a>
                            <!-- Bình luận -->
                            <a class="text-black text-decoration-none" href="">
                                <li class="mt-3">
                                    <i class="fa-solid fa-comments"></i> Bình luận
                                </li>
                            </a>
                            <!-- Phản hồi -->
                            <a class="text-black text-decoration-none" href="">
                                <li class="mt-3">
                                    <i class="fa-solid fa-envelope"></i> Phản hồi
                                </li>
                            </a>
                        </ul>
                    </nav>
                    <a class="position-relative text-black text-decoration-none" style="top: 120px; left: 200px;"
                        href=""><i class="fa-solid fa-right-from-bracket"></i>
                        Đăng xuất</a>
                </div>
            </div>


<!-- CONTENT -->
<div class=" col ">
                <div class="container">
                    <h3 class="text-center my-5">Danh mục</h3>
                    <div class="d-flex ">
                        <!-- thêm danh mục -->
                    
                        <a href="index.php?url=add_categories" class="text-decoration-none bg-success p-1 px-2 rounded-2 text-light m-3">Thêm danh
                            mục <i class="fa-solid fa-plus"></i></a>

                        <!-- fillter -->
                        <div class="dropdown m-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-filter"></i> Sắp xếp
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">A->Z</a></li>
                                <li><a class="dropdown-item" href="#">Z->A</a></li>
                            </ul>
                        </div>
                        <!-- tìm kiếm -->
                        <div class="m-3">
                            <!-- <form action="" method="post">
                                <input class="p-1 rounded-2" type="text" name="search"
                                    placeholder="nội dung tìm kiếm...">
                                <input type="submit" name="btn-search" value="Tìm kiếm"
                                    class="p-1 border-1 text-light rounded-2 bg-black">
                            </form> -->
                        </div>
                    </div>

                    <!-- content -->
                    <div>
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#MÃ</th>
                                    <th>Tên danh mục</th>
                                    <th>Chức năng</th>
                                </tr>
                                <?php
                                    foreach ($cate as $category) {
                                        extract($category);
                                        $update_cate="index.php?url=category-update&category_id=".$category_id;
                                        $delete_cate="index.php?url=category-delete&category_id=".$category_id;
                                        echo '
                                        <tr>
                                        <td>'.$category_id.'</td>
                                        <td>'.$name.'</td>
                                        <td>
                                            <a href="'.$delete_cate.'" class="bg-danger text-light p-1 rounded-2">Xóa</a> |
                                            <a href="'.$update_cate.'" class="bg-info text-light p-1 rounded-2">Sửa</a>
                                        </td>
                                        </tr>';
                                    }
                                ?>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>



                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>
                    // tổng doanh thu
                    const totalMoney = document.getElementById('total-money');

                    let lineTotalMoney = new Chart(totalMoney, {
                        type: 'line',
                        data: {
                            labels: ['', '', '', '', '', ''],
                            datasets: [{
                                label: 'VNĐ',
                                data: [12, 19, 3, 6, 7, 2],
                                borderWidth: 4,
                                borderColer: "#b5313a",
                                hoverBorderColor: "#000",
                                hoverBorderWidth: 6,
                                backgroundColor: "#b5313a",
                                tension: 0.5,
                            }],

                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Doanh thu tháng này(VNĐ)'
                                },
                                legend: {
                                    display: false
                                }

                            }
                        }


                    });
                    // số lượng khách hàng mới
                    const userNew = document.getElementById('userNew');

                    let lineUserNew = new Chart(userNew, {
                        type: 'line',
                        data: {
                            labels: ['', '', '', '', '', ''],
                            datasets: [{
                                label: 'Số lượng',
                                data: [12, 19, 3, 6, 7, 2],
                                borderWidth: 4,
                                borderColer: "#777",
                                hoverBorderColor: "#000",
                                hoverBorderWidth: 6,
                                tension: 0.5,
                            }],
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Khách hàng mới'
                                },
                                legend: {
                                    display: false
                                }

                            }
                        }

                    });
                    // lượng đơn hàng
                    const orders = document.getElementById('orders');

                    let lineOrders = new Chart(orders, {
                        type: 'line',
                        data: {
                            labels: ['', '', '', '', '', ''],
                            datasets: [{
                                label: 'Số lượng',
                                data: [12, 19, 3, 6, 7, 2],
                                borderWidth: 4,
                                borderColer: "#777",
                                hoverBorderColor: "#000",
                                hoverBorderWidth: 6,
                                backgroundColor: "#198754",
                                tension: 0.5,

                            }],
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Đơn hàng'
                                },
                                legend: {
                                    display: false
                                }
                            }
                        }

                    });
                    // số lượng sản phẩm theo danh mục
                    const category = document.getElementById('category');

                    let barCategory = new Chart(category, {
                        type: 'bar',
                        data: {
                            labels: ['Cà phê', 'Chè', 'Trà', 'Trà sữa', 'Sữa', 'Bột cà phê'], datasets: [{
                                label: 'Số lượng',
                                data: [12, 19, 3, 6, 7, 2],
                                borderWidth: 4,
                                borderColer: "#777",
                                hoverBorderColor: "#000",
                                hoverBorderWidth: 6,
                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(165, 205, 86)',
                                    'rgb(255, 205, 00)',
                                    'rgb(255, 00, 86)',
                                    'rgb(165, 42, 42)',
                                ],
                            }],
                        },
                        options: {

                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Thống kê sản phẩm theo danh mục',

                                },
                                legend: {
                                    display: false
                                }
                            }
                        }


                    });

                </script>

            </div>