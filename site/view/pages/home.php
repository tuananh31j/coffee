<!-- MAIN CONTENT -->
<div class="main-content">
    <link rel="stylesheet" href="<?php echo $STYLE?>/index.css">
    <div class="header-banner">
        <img width="1360px" src="<?=$IMAGE?>/bannerSP.jpg" alt="" class="header-banner-img" />
    </div>
    <div class="container">
        <!-- dịch vụ -->
        <div class="row justify-content-center align-content-center text-center my-5">
            <div class="col">
                <a href="" class="text-dark text-decoration-none"><img class="w-25" src="<?=$IMAGE?>/tk.jpg" alt="" />
                    <div>
                        <h4 class="fs-5 mt-4">Mua hàng siêu tiết kiệm</h4>
                        <p style="font-size: 14px;">Các sản phẩm luôn được bán với giá ưu đãi nhất</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="text-dark text-decoration-none"><img class="w-25" src="<?=$IMAGE?>/khuyenmai.jpg"
                        alt="" />
                    <div>
                        <h4 class="fs-5 mt-4">Khuyến mãi cực lớn</h4>
                        <p style="font-size: 14px;">Được hưởng chương trình và các khuyến mãi cực lớn</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="text-dark text-decoration-none"><img class="w-25" src="<?=$IMAGE?>/chatluong.jpg"
                        alt="" />
                    <div class="ms-3">
                        <h4 class="fs-5 mt-4 ">Chất lượng</h4>
                        <p style="font-size: 14px;">Nguyên liệu đảm bảo vệ sinh an toàn thực phẩm</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="text-dark text-decoration-none"><img class="w-25" src="<?=$IMAGE?>/thanhtoan.jpg"
                        alt="" />
                    <div>
                        <h4 class="fs-5 mt-4">Thanh toán dễ dàng</h4>
                        <p style="font-size: 14px;">Trả tiền khi nhận hàng <br><span>(COD)</span></p>
                    </div>
                </a>
            </div>

        </div>

        <!-- sản phẩm bán chạy -->
        <div class="" style="display: flex; justify-content: center; margin-top: 10px">
            <button class="product-sale-title">Đang giảm giá</button>
        </div>
        <div class="productrelate">
            <div class="row row-cols-4">
                <?php
                        $index = 0;
                        foreach($listProSale as $item) {
                       
                        $priceNew1 = $item['price'] - ($item['price']*($item['sale']/100));
                        $custumPriceOld1 = number_format($item['price'], 0, ",", ".");
                        $custumPriceNew1 = number_format($priceNew1, 0, ",", ".");
                        $index++;
                        ?>
                <!-- item child -->
                <div class="col mb-4 proSaleItem text-center">
                    <div class="card h-100">
                        <!-- ảnh -->
                        <div class="h-100">
                            <a href=""><img style="height: 208px; object-fit: cover;"
                                    src="<?=$IMAGE.'/'.$item['image_url']?>" class="card-img-top" alt="..."></a>
                            <!-- giảm giá -->
                            <?php if($item['sale']>0 && $item['sale']<=100){
                                    ?>
                            <div class="main-product-sale "><span
                                    class="bg-danger p-1 d-inline text-light"><?=$item['sale']?>%</span>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <!-- tên -->
                            <h5 class="card-title"><?=$item['name']?>
                            </h5>
                            <!-- giá -->
                            <p class="card-text text-danger fw-bold">
                                <?php echo $custumPriceNew1?> <span class="text-decoration-underline">đ</span>
                                <?php if($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                <span class="main-product-price-old text-decoration-line-through text-secondary"
                                    style="font-size: 10px;"><?=$custumPriceOld1?></span>
                                <?php } ?>
                            </p>
                            <button type="button" class="btn border-danger text-danger cart-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal-<?php echo $index?>">Đặt
                                ngay</button>
                            <!-- form thêm vào giỏ hàng -->
                            <form class="" action="index.php?url=product" method="post">
                                <div class="modal fade" id="exampleModal-<?php echo $index?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <!-- tên sản phẩm -->
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    <?=$item['name']?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- item order -->
                                                <div hidden>
                                                    <input type="text" name="id" value="<?=$item['product_id']?>">
                                                    <input type="text" name="name" value="<?=$item['name']?>">
                                                    <input type="text" name="img" value="<?=$item['image_url']?>">

                                                    <input type="text" name="price" value="<?=$item['price']?>">
                                                </div>
                                                <div class="card mb-3" style="max-width: 540px;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img src="<?=$IMAGE.'/'.$item['image_url']?>"
                                                                class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">

                                                                <p class="card-text text-danger fw-bold">
                                                                    <?php echo $custumPriceNew1?> <span
                                                                        class="text-decoration-underline">đ</span>
                                                                    <?php if($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                                                    <span
                                                                        class="main-product-price-old text-decoration-line-through text-secondary"
                                                                        style="font-size: 10px;"><?=$custumPriceOld1?></span>
                                                                    <?php } ?>
                                                                </p>

                                                                <!-- size -->
                                                                <div class="d-flex gap-4 my-3 ms-1 align-items-center">
                                                                    <div>
                                                                        <span>Kích cỡ: </span>
                                                                    </div>
                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Basic radio toggle button group">
                                                                        <?php 
                                                                                $flag = 0;
                                                                                foreach($listSize as $size) { 
                                                                                    $flag +=1;
                                                                                 ?>
                                                                        <input type="radio"
                                                                            value="<?=$size['size_id']?>"
                                                                            class="btn-check" name="size"
                                                                            id="btnradio<?=$flag.'-'.$index?>"
                                                                            autocomplete="off"
                                                                            <?php if($flag == 1) echo 'checked'?>>
                                                                        <label class="btn btn-outline-primary"
                                                                            for="btnradio<?=$flag.'-'.$index?>"><?=$size['name']?></label>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>


                                                                <!-- số lượng -->
                                                                <div class="d-flex gap-3 my-3 align-items-center">
                                                                    <div>
                                                                        <span>Số lượng: </span>
                                                                    </div>
                                                                    <div class="d-flex">

                                                                        <button type="button"
                                                                            class="border-info rounded-2">
                                                                            <i class="fa-solid fa-minus"></i>
                                                                        </button>
                                                                        <input
                                                                            class="quantity border-secondary mx-2 rounded-2 p-1 ps-2"
                                                                            style="width: 30px;" type="text"
                                                                            id="quantity-<?=$index?>" value="1"
                                                                            name="quantity">
                                                                        <button type="button"
                                                                            class="border-danger rounded-2">
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

                                                <input type="submit" onclick="alert('Thêm thành công vào giỏ!')"
                                                    value="Thêm vào giỏ" name="btn-addToCart"
                                                    class="border-0 rounded-2 bg-primary text-light p-2">
                                                <input type="submit" value="Đặt hàng"
                                                    class="border-0 rounded-2 bg-danger text-light p-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <?php } ?>
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








        <div class="product-sale my-5">
            <div class="" style="display: flex; justify-content: center; margin-top: 10px">
                <button class="product-sale-title">Sản phẩm bán chạy</button>
            </div>
            <div class="row row-cols-5">
                <?php foreach($listProNew as $index => $item){
                    $priceNew = $item['price'] - ($item['price']*($item['sale']/100));
                    $custumPriceOld = number_format($item['price'], 0, ",", ".");
                    $custumPriceNew = number_format($priceNew, 0, ",", ".");
                     ?>
                <div class="col mb-4 text-center proNewItem">
                    <div class="card h-100">
                        <!-- ảnh -->
                        <div class="h-100">
                            <a href=""><img style="height: 208px; object-fit: cover;"
                                    src="<?=$IMAGE.'/'.$item['image_url']?>" class="card-img-top" alt="..."></a>
                            <!-- giảm giá -->
                            <?php if($item['sale']>0 && $item['sale']<=100){
                                    ?>
                            <div class="main-product-sale "><span
                                    class="bg-danger p-1 d-inline text-light"><?=$item['sale']?>%</span>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <!-- tên -->
                            <h5 class="card-title"><?=$item['name']?>
                            </h5>
                            <!-- giá -->
                            <p class="card-text text-danger fw-bold">
                                <?php echo $custumPriceNew?> <span class="text-decoration-underline">đ</span>
                                <?php if($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                <span class="main-product-price-old text-decoration-line-through text-secondary"
                                    style="font-size: 10px;"><?=$custumPriceOld?></span>
                                <?php } ?>
                            </p>
                            <button type="button" class="btn border-danger text-danger cart-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal-<?php echo $index?>">Đặt
                                ngay</button>

                            <!-- form thêm vào giỏ hàng -->
                            <form class="" action="index.php?url=product" method="post">
                                <div class="modal fade" id="exampleModal-<?php echo $index?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel<?php echo $index?>" aria-hidden="true">
                                    <div class=" modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <!-- tên sản phẩm -->
                                                <h1 class="modal-title fs-5" id="exampleModalLabel<?php echo $index?>">
                                                    <?=$item['name']?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- item order -->
                                                <div hidden>
                                                    <input type="text" name="id" value="<?=$item['product_id']?>">
                                                    <input type="text" name="name" value="<?=$item['name']?>">
                                                    <input type="text" name="img" value="<?=$item['image_url']?>">

                                                    <input type="text" name="price" value="<?=$item['price']?>">
                                                </div>
                                                <div class="card mb-3" style="max-width: 540px;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img src="<?=$IMAGE.'/'.$item['image_url']?>"
                                                                class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">

                                                                <p class="card-text text-danger fw-bold">
                                                                    <?php echo $custumPriceNew?> <span
                                                                        class="text-decoration-underline">đ</span>
                                                                    <?php if($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                                                    <span
                                                                        class="main-product-price-old text-decoration-line-through text-secondary"
                                                                        style="font-size: 10px;"><?=$custumPriceOld?></span>
                                                                    <?php } ?>
                                                                </p>

                                                                <!-- size -->
                                                                <div class="d-flex gap-4 my-3 ms-1 align-items-center">
                                                                    <div>
                                                                        <span>Kích cỡ: </span>
                                                                    </div>
                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Basic radio toggle button group">
                                                                        <?php 
                                                                                $flag = 0;
                                                                                foreach($listSize as $size) { 
                                                                                    $flag +=1;
                                                                                 ?>
                                                                        <input type="radio"
                                                                            value="<?=$size['size_id']?>"
                                                                            class="btn-check" name="size"
                                                                            id="btnradio<?=$flag.'-'.$index?>"
                                                                            autocomplete="off"
                                                                            <?php if($flag == 1) echo 'checked'?>>
                                                                        <label class="btn btn-outline-primary"
                                                                            for="btnradio<?=$flag.'-'.$index?>"><?=$size['name']?></label>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>


                                                                <!-- số lượng -->
                                                                <div class="d-flex gap-3 my-3 align-items-center">
                                                                    <div>
                                                                        <span>Số lượng: </span>
                                                                    </div>
                                                                    <div class="d-flex">

                                                                        <button type="button"
                                                                            class="border-info rounded-2">
                                                                            <i class="fa-solid fa-minus"></i>
                                                                        </button>
                                                                        <input
                                                                            class="quantity border-secondary mx-2 rounded-2 p-1 ps-2"
                                                                            style="width: 30px;" type="text"
                                                                            id="quantity-<?=$index?>" value="1"
                                                                            name="quantity">
                                                                        <button type="button"
                                                                            class="border-danger rounded-2">
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
                                                <input type="submit" onclick="alert('Thêm thành công vào giỏ!')"
                                                    value="Thêm vào giỏ" name="btn-addToCart"
                                                    class="border-0 rounded-2 bg-primary text-light p-2">
                                                <input type="submit" value="Đặt hàng"
                                                    class="border-0 rounded-2 bg-danger text-light p-2">
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