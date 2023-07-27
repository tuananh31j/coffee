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
        <section class="splide" aria-label="Basic Structure Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach($listProSale as $pro){ ?>
                    <li class="splide__slide">
                        <div class="img-box">
                            <div class="col mb-4">
                                <div class="card">
                                    <img src="<?=$IMAGE.'/'.$pro['image_url']?>" class="card-img-top" alt="..." />
                                    <div class="main-product-sale">
                                        <span class="bg-danger p-1 d-inline text-light"><?=$pro['sale']?></span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title h-50">
                                        <?=$pro['name']?>
                                        </h5>
                                        <p class="card-text text-warning">
                                            234000VND
                                            <span
                                                class="main-product-price-old text-decoration-line-through text-secondary">300000VND</span>
                                        </p>
                                        <button class="main-product-btn">Thêm vào giỏ hàng</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                    
                </ul>
            </div>
        </section>
        <div class="product-sale">
            <div class="" style="display: flex; justify-content: center; margin-top: 10px">
                <button class="product-sale-title">Sản phẩm bán chạy</button>
            </div>
            <div class="row">
                <div class="col mb-4">
                    <div class="card">
                        <img src="<?=$IMAGE?>/item1.jpg" class="card-img-top" alt="..." />
                        <div class="main-product-sale">
                            <span class="bg-danger p-1 d-inline text-light">12%</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title h-50">
                                Thùng 24 Lon Cà Phê Sữa Highlands Coffee 235ml/lon
                            </h5>
                            <p class="card-text text-warning">
                                234000VND
                                <span
                                    class="main-product-price-old text-decoration-line-through text-secondary">300000VND</span>
                            </p>
                            <button class="main-product-btn">Thêm vào giỏ hàng</button>
                        </div>

                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img src="<?=$IMAGE?>/item2.jpg" class="card-img-top" alt="..." />
                        <div class="main-product-sale">
                            <span class="bg-danger p-1 d-inline text-light">12%</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title h-50">
                                Thùng 24 Lon Cà Phê Sữa Highlands Coffee 235ml/lon
                            </h5>

                            <p class="card-text text-warning">
                                234000VND
                                <span
                                    class="main-product-price-old text-decoration-line-through text-secondary">300000VND</span>
                            </p>
                            <button class="main-product-btn">Thêm vào giỏ hàng</button>
                        </div>

                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img src="<?=$IMAGE?>/item3.jpg" class="card-img-top" alt="..." />
                        <div class="main-product-sale">
                            <span class="bg-danger p-1 d-inline text-light">12%</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title h-50">
                                Thùng 24 Lon Cà Phê Sữa Highlands Coffee 235ml/lon
                            </h5>

                            <p class="card-text text-warning">
                                234000VND
                                <span
                                    class="main-product-price-old text-decoration-line-through text-secondary">300000VND</span>
                            </p>
                            <button class="main-product-btn">Thêm vào giỏ hàng</button>
                        </div>

                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img src="<?=$IMAGE?>/item5.jpg" class="card-img-top" alt="..." />
                        <div class="main-product-sale">
                            <span class="bg-danger p-1 d-inline text-light">12%</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title h-50">
                                Thùng 24 Lon Cà Phê Sữa Highlands Coffee 235ml/lon
                            </h5>
                            <p class="card-text text-warning">
                                234000VND
                                <span
                                    class="main-product-price-old text-decoration-line-through text-secondary">300000VND</span>
                            </p>
                            <button class="main-product-btn">Thêm vào giỏ hàng</button>
                        </div>

                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img src="<?=$IMAGE?>/item5.jpg" class="card-img-top" alt="..." />
                        <div class="main-product-sale">
                            <span class="bg-danger p-1 d-inline text-light">12%</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title h-50">
                                Thùng 24 Lon Cà Phê Sữa Highlands Coffee 235ml/lon
                            </h5>
                            <p class="card-text text-warning">
                                234000VND
                                <span
                                    class="main-product-price-old text-decoration-line-through text-secondary">300000VND</span>
                            </p>
                            <button class="main-product-btn">Thêm vào giỏ hàng</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="xemthem">
                <div class="top"></div>
                <h5>Xem thêm sản phẩm</h5>
                <div class="bottom"></div>
            </div>
        </div>
    </div>
</div>