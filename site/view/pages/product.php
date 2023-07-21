<!-- MAIN CONTENT -->
<div class="main-content ">
    <main class="container">
        <!-- đường dẫn -->
        <div class="header-link m-0">
            <span><a href="">Trang chủ</a> > </span>
            <span><a href="" class="text-danger">Sản phẩm</a></span>
        </div>
        <div class="header-banner">
            <img src="../../public/img/bannerSP.jpg" alt="" class="header-banner-img">
        </div>
        <div class="content-title my-5 ">
            <h2>Sản phẩm của chúng tôi</h2>
        </div>
        <div class="content-fillter d-flex flex-row-reverse
                    ">
            <!-- sắp xếp -->


            <div class="dropdown mx-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    sắp xếp mặc định
                </button>
                <ul class="dropdown-menu">

                    <li><a class="dropdown-item" href="#">A -> Z</a></li>
                    <li><a class="dropdown-item" href="#">Giá tăng dần</a></li>
                    <li><a class="dropdown-item" href="#">Giá giảm dần</a></li>
                    <li><a class="dropdown-item" href="#">Hàng mới nhất</a></li>
                    <li><a class="dropdown-item" href="#">Hàng cũ nhất</a></li>
                </ul>
            </div>

            <div class="price-filter">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Lọc theo giá <i class="fa-solid fa-filter"></i>
                </button>
                <ul class="dropdown-menu">

                    <li><a class="dropdown-item" href="#">500k <i class="fa-solid fa-arrow-down"></i></a></li>
                    <li><a class="dropdown-item" href="#">400k-600k</a></li>
                    <li><a class="dropdown-item" href="#">600k-800k</a></li>
                    <li><a class="dropdown-item" href="#">800k-900k</a></li>
                    <li><a class="dropdown-item" href="#">1tr <i class="fa-solid fa-arrow-up"></i></a></li>
                </ul>
            </div>



        </div>
        <!-- product -->
        <div class="main-product container mt-4">
            <div class="row">
                <!-- list danh mục -->
                <h3 class="mt-4">Danh mục</h3>
                <div class="col-2 main-product-list-category">
                    <div class="d-flex align-items-start col-2 mt-3 me-5">

                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <?php
                            foreach($categorys as $item){
                            ?>
                            <a class="text-decoration-none" href=""><button
                                    class="main-product-list-category-item nav-link" id="v-pills-profile-tab"
                                    data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile"
                                    aria-selected="false"><?=$item['name']?></button></a>

                            <?php
                            }
                            ?>



                        </div>

                    </div>

                </div>

                <!-- list product -->
                <div class="container text-center col">

                    <!-- item -->
                    <div class="row row-cols-4">
                        <?php

                         foreach($products as $item) {
                            $priceNew = $item['price'] - ($item['price']*($item['sale']/100));
                            $custumPriceOld = number_format($item['price'], 0, ",", ".");
                            $custumPriceNew = number_format($priceNew, 0, ",", ".");
                             ?>
                        <!-- item child -->
                        <div class="col mb-4">
                            <div class="card h-100">
                                <!-- ảnh -->
                                <div class="h-100">
                                    <a href=""><img src="<?=$IMAGE?>/item1.jpg" class="card-img-top" alt="..."></a>
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
                                        <?php echo $custumPriceNew?> đ
                                        <?php if($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                        <span class="main-product-price-old text-decoration-line-through text-secondary"
                                            style="font-size: 10px;"><?=$custumPriceOld?></span>
                                        <?php } ?>
                                    </p>
                                    <button type="button" class="btn border-danger text-danger cart-btn"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm vào giỏ hàng</button>
                                    <!-- form thêm vào giỏ hàng -->
                                    <form class="" action="" method="post">
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            <?=$item['name']?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- item order -->
                                                        <div class="card mb-3" style="max-width: 540px;">
                                                            <div class="row g-0">
                                                                <div class="col-md-4">
                                                                    <img src="<?=$IMAGE?>/item1.jpg"
                                                                        class="img-fluid rounded-start" alt="...">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="card-body">

                                                                        <p class="card-text text-danger fw-bold">
                                                                            <?php echo $custumPriceNew?> đ
                                                                            <?php if($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                                                            <span
                                                                                class="main-product-price-old text-decoration-line-through text-secondary"
                                                                                style="font-size: 10px;"><?=$custumPriceOld?></span>
                                                                            <?php } ?>
                                                                        </p>

                                                                        <!-- size -->
                                                                        <div
                                                                            class="d-flex gap-4 my-3 ms-1 align-items-center">
                                                                            <div>
                                                                                <span>Kích cỡ: </span>
                                                                            </div>

                                                                            <div class="btn-group" role="group"
                                                                                aria-label="Basic radio toggle button group">

                                                                                <input type="radio" class="btn-check"
                                                                                    name="btnradio" id="btnradio1"
                                                                                    autocomplete="off" checked>
                                                                                <label class="btn btn-outline-primary"
                                                                                    for="btnradio1">S</label>

                                                                                <input type="radio" class="btn-check"
                                                                                    name="btnradio" id="btnradio2"
                                                                                    autocomplete="off">
                                                                                <label class="btn btn-outline-primary"
                                                                                    for="btnradio2">M</label>

                                                                                <input type="radio" class="btn-check"
                                                                                    name="btnradio" id="btnradio3"
                                                                                    autocomplete="off">
                                                                                <label class="btn btn-outline-primary"
                                                                                    for="btnradio3">L</label>
                                                                            </div>

                                                                        </div>


                                                                        <!-- số lượng -->
                                                                        <div
                                                                            class="d-flex gap-3 my-3 align-items-center">
                                                                            <div>
                                                                                <span>Số lượng: </span>
                                                                            </div>
                                                                            <div class="d-flex">

                                                                                <button type="button"
                                                                                    class="border-info rounded-2"
                                                                                    onclick="decreaseQuantity()">
                                                                                    <i class="fa-solid fa-minus"></i>
                                                                                </button>
                                                                                <input
                                                                                    class="border-secondary mx-2 rounded-2 p-1 ps-2"
                                                                                    style="width: 30px;" type="text"
                                                                                    id="quantity" value="1">
                                                                                <button type="button"
                                                                                    class="border-danger rounded-2"
                                                                                    onclick="increaseQuantity()">
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
                                                        <button type="submit" class="btn btn-primary">Thêm vào
                                                            giỏ</button>
                                                        <button type="submit" class="btn btn-danger">Đặt ngay</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <Script>

                                </Script>
                            </div>
                        </div>
                        <?php } ?>

                    </div>




                    <!-- more product -->
                    <div class="d-flex justify-content-center mt-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="index.php?url=product">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="index.php?url=product&pagenum=2">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="index.php?url=product&pagenum=3">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>

        </div>






    </main>
</div>