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
                        <?php foreach($products as $item) { ?>
                        <div class="col mb-4">
                            <div class="card ">
                                <img src="img/item1.jpg" class="card-img-top" alt="...">
                                <div class="main-product-sale "><span
                                        class="bg-danger p-1 d-inline text-light"><?=$item['sale']?>%</span>
                                </div>
                                <div class="card-body">
                                    <!-- tên -->
                                    <h5 class="card-title h-50"><?=$item['name']?>
                                    </h5>
                                    <!-- giá -->
                                    <p class="card-text text-warning">
                                        <?php echo $item['price'] - ($item['price']*($item['sale']/100))?>VND
                                        <?php if($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                        <span
                                            class="main-product-price-old text-decoration-line-through text-secondary"><?=$item['price']?>VND</span>
                                        <?php } ?>
                                    </p>
                                    <button class="main-product-btn">Thêm vào giỏ hàng</button>
                                </div>
                                <div class="card-footer">
                                    <small class="text-body-secondary"><?=$item['create_at']?></small>
                                </div>
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