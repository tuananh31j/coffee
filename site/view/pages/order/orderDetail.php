<?php
require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
require_once "../../../models/order.php";
$id = $_GET['id'];
$order = getOrderById($id);
$details = getOrderDetail($id);
$countOrder = 0;
$total = 0;
foreach($details as $item) {
    $countOrder += $item['quantity'];
    $total += $item["total_price"];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <link rel="stylesheet" href="/du-an-1-nhom7/public/css/style.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
</head>

<body>
    <div class="container">
        <!-- logo -->
        <div class="checkout-done-logo d-flex justify-content-center m-5 align-content-center"><img src="img/logo 1.svg"
                alt=""></div>
        <div class="checkout-done">

            <div class="checkout-done-infor">
                <!-- lời cảm ơn -->
                <div class="checkout-done-infor-thankyou mb-5">
                    <div><i class="fa-solid fa-circle-check"></i></div>
                    <div class="thankyou-text">
                        <h1>Cảm ơn bạn đã đặt hàng!
                    </div>
                </div>
                <div class="checkout-infor-text">
                    <div class="d-flex gap-5">
                        <div class="checkout-infor-text-left">
                            <!-- thông tin vận chuyển -->
                            <div>
                                <h4>Thông tin nhận hàng</h4>
                                <p><?=$order['customer_name']?></p>
                                <p><?=$order['email']?></p>
                                <p><?=$order['phone']?></p>
                                <p><?=$order['address']?></p>
                                <p><?=$order['create_at']?></p>

                            </div>

                        </div>

                        <div class="checkout-infor-text-right">
                            <!-- phương thức thanh toán -->
                            <div class="">
                                <h4>Phương thức thanh toán</h4>
                                <p>Thanh toán khi nhận hàng</p>
                            </div>
                            <!-- phương thức vận chuyển -->
                            <div class="mt-4">
                                <h4>Phương thức vận chuyển</h4>
                                <p>giao hàng tận nơi</p>
                            </div>
                            <!-- cửa hàng -->
                            <div class="mt-4">
                                <h4>Cửa hàng</h4>
                                <p><?=$order['shop']?></p>
                            </div>
                        </div>
                    </div>
                    <!-- quay về trang chủ -->
                    <a href="/du-an-1-nhom7/index.php" class="btn text-decoration-none bg-danger text-light my-4">Tiếp
                        tục mua sắm</a>

                </div>

            </div>
            <!-- sản phẩm đặt hàng -->
            <div class="order bg-light p-3">
                <div>
                    <p class="fw-bold">Đơn hàng #<?=$order['order_id']?> (<?=$countOrder?>)</p>
                </div>
                <hr>
                <!-- item 1 -->
                <iframe src="/du-an-1-nhom7/site/view/pages/order/itemOrder.php?id=<?php echo $id?>"
                    style="width:100%; height: 200px" frameborder="0"></iframe>

                <hr>

                <!-- chi tiết số tiền thanh toán -->
                <div class="order-pricing">
                    <!-- tổng các mặt hàng -->
                    <div class="order-pricing-total">
                        <div><span>Tạm tính</span></div>
                        <div><span><?=number_format($total,0,',','.')?> <span
                                    class="text-decoration-underline">đ</span></span></div>
                    </div>

                    <!-- phí vận chuyển -->
                    <div class="order-pricing-shiping">
                        <div><span>Phí vận chuyển</span></div>
                        <div><span>25.000</span> <span class="text-decoration-underline">đ</span></div>
                    </div>
                    <hr>

                    <!-- tổng thể -->
                    <div class="order-pricing-final">
                        <div><span>Tổng cộng</span></div>
                        <div><span><?=number_format($total + 25000,0,',','.')?></span> <span
                                class="text-decoration-underline">đ</span></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>