<!-- MAIN CONTENT -->
<div class="main-content">
    <link rel="stylesheet" href="<?php echo $STYLE ?>/index.css">
    <!-- banner -->
    <div class="header-banner" style="max-height:500px; overflow-y: hidden;">
        <a href="index.php?url=proDetails&id=<?= $banner['product_id'] ?>&view=<?= getProById($banner['product_id'])['view'] + 1 ?>"><img src="<?= $IMAGE . '/' . $banner['banner_url'] ?>" alt="" class="  w-100  object-fit-cover" /></a>
    </div>
    <div class="container">
        <!-- dịch vụ -->
        <div class="row justify-content-center align-content-center text-center my-5">
            <div class="col">
                <a href="" class="text-dark text-decoration-none"><img class="w-25" src="<?= $IMAGE ?>/tk.jpg" alt="" />
                    <div>
                        <h4 class="fs-5 mt-4">Mua hàng siêu tiết kiệm</h4>
                        <p style="font-size: 14px;">Các sản phẩm luôn được bán với giá ưu đãi nhất</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="text-dark text-decoration-none"><img class="w-25" src="<?= $IMAGE ?>/khuyenmai.jpg" alt="" />
                    <div>
                        <h4 class="fs-5 mt-4">Khuyến mãi cực lớn</h4>
                        <p style="font-size: 14px;">Được hưởng chương trình và các khuyến mãi cực lớn</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="text-dark text-decoration-none"><img class="w-25" src="<?= $IMAGE ?>/chatluong.jpg" alt="" />
                    <div class="ms-3">
                        <h4 class="fs-5 mt-4 ">Chất lượng</h4>
                        <p style="font-size: 14px;">Nguyên liệu đảm bảo vệ sinh an toàn thực phẩm</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="text-dark text-decoration-none"><img class="w-25" src="<?= $IMAGE ?>/thanhtoan.jpg" alt="" />
                    <div>
                        <h4 class="fs-5 mt-4">Thanh toán dễ dàng</h4>
                        <p style="font-size: 14px;">Trả tiền khi nhận hàng <br><span>(COD)</span></p>
                    </div>
                </a>
            </div>

        </div>

        <!-- sản phẩm giảm giá-->
        <div class="" style="display: flex; justify-content: center; margin-top: 10px">
            <button class="product-sale-title">Đang giảm giá</button>

        </div>
        <div class="productrelate">
            <div class="row row-cols-4">
                <?php
                $index = 0;
                foreach ($listProSale as $item) {

                    $priceNew1 = $item['price'] - ($item['price'] * ($item['sale'] / 100));
                    $custumPriceOld1 = number_format($item['price'], 0, ",", ".");
                    $custumPriceNew1 = number_format($priceNew1, 0, ",", ".");
                    $index += 2;
                ?>
                    <!-- item child -->
                    <div class="col mb-4 proSaleItem text-center position-relative">
                        <div class="card h-100">
                            <!-- ảnh -->
                            <div class="h-100">
                                <a href="index.php?url=proDetails&id=<?= $item['product_id'] ?>&view=<?= $item['view'] + 1 ?>"><img style="height: 100%; object-fit: cover;" src="<?= $IMAGE . '/' . $item['image_url'] ?>" class="card-img-top" alt="..."></a>
                                <!-- giảm giá -->
                                <?php if ($item['sale'] > 0 && $item['sale'] <= 100) {
                                ?>
                                    <div class="main-product-sale "><span class="bg-danger p-1 d-inline text-light"><?= $item['sale'] ?>%</span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="card-body">
                                <!-- tên -->
                                <div class="name-product">
                                    <h6 style="font-size: 14px;" class="card-title fw-bold"><?= $item['name'] ?>
                                </div>
                                </h6>
                                <!-- giá -->
                                <p class="card-text text-danger fw-bold">
                                    <?php echo $custumPriceNew1 ?> <span class="text-decoration-underline">đ</span>
                                    <?php if ($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                        <span class="main-product-price-old text-decoration-line-through text-secondary" style="font-size: 10px;"><?= $custumPriceOld1 ?></span>
                                    <?php } ?>
                                </p>
                                <?php
                                $idPro = $item['product_id'];
                                $item = getProFeedback($idPro);
                                $countFB =  getFeedbackCountById($idPro);
                                if ($item == []) {
                                    $item = getProNoFeedback($idPro);
                                }
                                if (isset($_GET['view']) && $_GET['view'] > 0) {
                                    $view = $_GET['view'];
                                    updateView($idPro, $view);
                                }

                                $target = $item;
                                ?>
                                <!-- điểm đánh giá trung bình -->
                                <div class="content-right-whitlist d-flex align-items-center gap-1 mb-2 justify-content-center">
                                    <span class="star-rating fs-3" data-rating="<?= isset($target['avg_star']) ? $target['avg_star'] : 0 ?>">
                                    </span><span class=" fs-6">(<?= isset($countFB['count_fb']) ? $countFB['count_fb'] : 0 ?>)</span>

                                </div>
                                <button type="button" class="btn border-danger text-danger cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $index ?>">Đặt
                                    ngay</button>
                                <!-- form thêm vào giỏ hàng -->
                                <form class="" action="index.php?url=now" method="post">
                                    <div class="modal fade" id="exampleModal-<?php echo $index ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <!-- tên sản phẩm -->
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        <?= $item['name'] ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- item order -->
                                                    <div hidden>
                                                        <input type="text" name="id" value="<?= $item['product_id'] ?>">
                                                        <input type="text" name="name" value="<?= $item['name'] ?>">
                                                        <input type="text" name="img" value="<?= $item['image_url'] ?>">

                                                        <input type="text" name="price" value="<?= $item['price'] ?>">
                                                    </div>
                                                    <div class="card mb-3" style="max-width: 540px;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4">
                                                                <img src="<?= $IMAGE . '/' . $item['image_url'] ?>" class="img-fluid rounded-start" alt="...">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">

                                                                    <p class="card-text text-danger fw-bold">
                                                                        <?php echo $custumPriceNew1 ?> <span class="text-decoration-underline">đ</span>
                                                                        <?php if ($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                                                            <span class="main-product-price-old text-decoration-line-through text-secondary" style="font-size: 10px;"><?= $custumPriceOld1 ?></span>
                                                                        <?php } ?>
                                                                    </p>

                                                                    <!-- size -->
                                                                    <div class="d-flex gap-4 my-3 ms-1 align-items-center">
                                                                        <div>
                                                                            <span>Kích cỡ: </span>
                                                                        </div>
                                                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                            <?php
                                                                            $flag = 0;
                                                                            foreach ($listSize as $size) {
                                                                                $flag += 1;
                                                                            ?>
                                                                                <input type="radio" value="<?= $size['size_id'] ?>" class="btn-check" name="size" id="btnradio<?= $flag . '-' . $index ?>" autocomplete="off" <?php if ($flag == 1) echo 'checked' ?>>
                                                                                <label class="btn btn-outline-primary" for="btnradio<?= $flag . '-' . $index ?>"><?= $size['name'] ?></label>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>


                                                                    <!-- số lượng -->
                                                                    <div class="d-flex gap-3 my-3 align-items-center">
                                                                        <div>
                                                                            <span>Số lượng: </span>
                                                                        </div>
                                                                        <div class="d-flex">

                                                                            <button type="button" class="border-info rounded-2">
                                                                                <i class="fa-solid fa-minus"></i>
                                                                            </button>
                                                                            <input class="quantity border-secondary mx-2 rounded-2 p-1 ps-2" style="width: 30px;" type="text" id="quantity-<?= $index ?>" value="1" name="quantity">
                                                                            <button type="button" class="border-danger rounded-2">
                                                                                <i class="fa-solid fa-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button> -->


                                                    <input type="submit" name="btn-add" value="Đặt hàng" class="border-0 rounded-2 bg-danger text-light p-2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div onclick="handleItemAll(allProSale)" class="xemthem more-btn-sale">
                    <div class="top"></div>

                    <h5>Xem thêm sản phẩm</h5>

                    <div class="bottom"></div>

                </div>
                <div onclick="handleItem(allProSale)" class="xemthem hide-btn-sale d-none">
                    <div class="top"></div>

                    <h5>Ẩn bớt</h5>

                    <div class="bottom"></div>

                </div>
            </div>
        </div>







        <!-- sản phẩm mới -->
        <div class="product-sale my-5">
            <div class="" style="display: flex; justify-content: center; margin-top: 10px">
                <button class="product-sale-title">Sản phẩm mới</button>
            </div>
            <div class="row row-cols-5">
                <?php $key = 1;
                foreach ($listProNew as $item) {
                    $priceNew = $item['price'] - ($item['price'] * ($item['sale'] / 100));
                    $custumPriceOld = number_format($item['price'], 0, ",", ".");
                    $custumPriceNew = number_format($priceNew, 0, ",", ".");
                    $key += 2;
                ?>
                    <div class="col mb-4 text-center proNewItem position-relative">
                        <div class="card h-100">
                            <!-- ảnh -->
                            <div class="h-100">
                                <a href="index.php?url=proDetails&id=<?= $item['product_id'] ?>&view=<?= $item['view'] + 1 ?>"><img style="height: 100%; object-fit: cover;" src="<?= $IMAGE . '/' . $item['image_url'] ?>" class="card-img-top" alt="..."></a>
                                <!-- giảm giá -->
                                <?php if ($item['sale'] > 0 && $item['sale'] <= 100) {
                                ?>
                                    <div class="main-product-sale "><span class="bg-danger p-1 d-inline text-light"><?= $item['sale'] ?>%</span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="card-body">
                                <!-- tên -->
                                <div class="name-product">
                                    <h6 style="font-size: 14px;" class="card-title fw-bold"><?= $item['name'] ?>
                                    </h6>
                                </div>

                                <!-- giá -->
                                <p class="card-text text-danger fw-bold">
                                    <?php echo $custumPriceNew ?> <span class="text-decoration-underline">đ</span>
                                    <?php if ($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                        <span class="main-product-price-old text-decoration-line-through text-secondary" style="font-size: 10px;"><?= $custumPriceOld ?></span>
                                    <?php } ?>
                                </p>
                                <?php

                                $id = $item['product_id'];
                                $flag = getProFeedback($id);
                                $countFB =  getFeedbackCountById($id);
                                if ($flag == []) {
                                    $flag = getProNoFeedback($id);
                                }
                                if (isset($_GET['view']) && $_GET['view'] > 0) {
                                    $view = $_GET['view'];
                                    updateView($id, $view);
                                }

                                $target = $flag;
                                ?>
                                <!-- điểm đánh giá trung bình -->
                                <div class="content-right-whitlist d-flex align-items-center gap-1 mb-2 justify-content-center">
                                    <span class="star-rating fs-3" data-rating="<?= isset($target['avg_star']) ? $target['avg_star'] : 0 ?>">
                                    </span><span class=" fs-6">(<?= isset($countFB['count_fb']) ? $countFB['count_fb'] : 0 ?>)</span>

                                </div>
                                <button type="button" class="btn border-danger text-danger cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $key ?>">Đặt
                                    ngay</button>

                                <!-- form thêm vào giỏ hàng -->
                                <form class="" action="index.php?url=now" method="post">
                                    <div class="modal fade" id="exampleModal-<?php echo $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $key ?>" aria-hidden="true">
                                        <div class=" modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <!-- tên sản phẩm -->
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel<?php echo $key ?>">
                                                        <?= $item['name'] ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- item order -->
                                                    <div hidden>
                                                        <input type="text" name="id" value="<?= $item['product_id'] ?>">
                                                        <input type="text" name="name" value="<?= $item['name'] ?>">
                                                        <input type="text" name="img" value="<?= $item['image_url'] ?>">

                                                        <input type="text" name="price" value="<?= $item['price'] ?>">
                                                    </div>
                                                    <div class="card mb-3" style="max-width: 540px;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4">
                                                                <img src="<?= $IMAGE . '/' . $item['image_url'] ?>" class="img-fluid rounded-start" alt="...">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">

                                                                    <p class="card-text text-danger fw-bold">
                                                                        <?php echo $custumPriceNew ?> <span class="text-decoration-underline">đ</span>
                                                                        <?php if ($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                                                            <span class="main-product-price-old text-decoration-line-through text-secondary" style="font-size: 10px;"><?= $custumPriceOld ?></span>
                                                                        <?php } ?>
                                                                    </p>

                                                                    <!-- size -->
                                                                    <div class="d-flex gap-4 my-3 ms-1 align-items-center">
                                                                        <div>
                                                                            <span>Kích cỡ: </span>
                                                                        </div>
                                                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                            <?php
                                                                            $flag = 0;
                                                                            foreach ($listSize as $size) {
                                                                                $flag += 1;
                                                                            ?>
                                                                                <input type="radio" value="<?= $size['size_id'] ?>" class="btn-check" name="size" id="btnradio<?= $flag . '-' . $key ?>" autocomplete="off" <?php if ($flag == 1) echo 'checked' ?>>
                                                                                <label class="btn btn-outline-primary" for="btnradio<?= $flag . '-' . $key ?>"><?= $size['name'] ?></label>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>


                                                                    <!-- số lượng -->
                                                                    <div class="d-flex gap-3 my-3 align-items-center">
                                                                        <div>
                                                                            <span>Số lượng: </span>
                                                                        </div>
                                                                        <div class="d-flex">

                                                                            <button type="button" class="border-info rounded-2">
                                                                                <i class="fa-solid fa-minus"></i>
                                                                            </button>
                                                                            <input class="quantity border-secondary mx-2 rounded-2 p-1 ps-2" style="width: 30px;" type="text" id="quantity-<?= $key ?>" value="1" name="quantity">
                                                                            <button type="button" class="border-danger rounded-2">
                                                                                <i class="fa-solid fa-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">

                                                    <input type="submit" name="btn-add" value="Đặt hàng" class="border-0 rounded-2 bg-danger text-light p-2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="xemthem more-btn-new">

                <div class="top"></div>
                <a class="text-danger text-decoration-none" href="index.php?url=product">
                    <h5>Xem thêm sản phẩm</h5>
                </a>
                <div class="bottom"></div>



            </div>

        </div>
    </div>
</div>
<script>
    // Lấy tất cả các phần tử có class "quantity"
    const quantityInputs = document.querySelectorAll('.quantity');

    // Thêm sự kiện tăng giảm số lượng cho từng phần tử
    quantityInputs.forEach(input => {
        input.nextElementSibling.addEventListener('click', function() {
            increaseQuantity(input);
        });

        input.previousElementSibling.addEventListener('click', function() {
            decreaseQuantity(input);
        });
    });

    // Hàm tăng số lượng
    function increaseQuantity(input) {
        let quantity = parseInt(input.value);
        quantity += 1;
        updateQuantity(input, quantity);
    }

    // Hàm giảm số lượng, đảm bảo số lượng không âm
    function decreaseQuantity(input) {
        let quantity = parseInt(input.value);
        if (quantity > 1) {
            quantity -= 1;
            updateQuantity(input, quantity);
        }
    }

    // Hàm cập nhật số lượng vào thẻ input
    function updateQuantity(input, quantity) {
        input.value = quantity;
    }

    //rating
    // star
    document.addEventListener("DOMContentLoaded", function() {
        const starRatingElements = document.querySelectorAll(".star-rating");

        starRatingElements.forEach(function(starRatingElement) {
            const rating = parseFloat(starRatingElement.dataset.rating);
            const fullStars = Math.floor(rating);
            const decimalPart = rating % 1;
            const halfStars = decimalPart >= 0.25 && decimalPart < 0.75 ? 1 : 0;
            const remainingStars = 5 - fullStars - halfStars;

            starRatingElement.innerHTML = getStarIcons(fullStars, halfStars, remainingStars);
        });
    });

    function getStarIcons(fullStars, halfStars, remainingStars) {
        let starIcons = "";

        for (let i = 0; i < fullStars; i++) {
            starIcons += `<span class="full-star">&#9733;</span>`;
        }

        if (halfStars === 1) {
            starIcons += `<span class="half-star">&#9733;</span>`;
        }

        for (let i = 0; i < remainingStars; i++) {
            starIcons += `<span class="empty-star">&#9733;</span>`;
        }

        return starIcons;
    }


    const banner = new Splide('.splide', {
        type: 'loop',
        perPage: 1,
    });
    banner.mount()
</script>