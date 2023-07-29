<!-- MAIN CONTENT -->
<div class="main-content ">
    <main class="container">
        <!-- đường dẫn -->
        <!-- <div class="header-link m-0">
            <span><a href="">Trang chủ</a> > </span>
            <span><a href="index.php?url=product" class="text-danger">Sản phẩm</a></span>
        </div> -->
        <div class="header-banner">
            <img src="<?=$IMAGE?>/bannerpro.jpg" alt="" class="header-banner-img">
        </div>
        <div class="content-title my-5 ">
            <h2>Sản phẩm của chúng tôi</h2>
            <div class="content-fillter d-flex flex-row-reverse
                    ">
                <!-- sắp xếp -->


                <div class="dropdown mx-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        sắp xếp mặc định
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                                href="index.php?url=product&category=<?php echo isset($category)?$category:0?>&sort=az">A
                                -> Z</a></li>
                        <li><a class="dropdown-item"
                                href="index.php?url=product&category=<?php echo isset($category)?$category:0?>&sort=za">Z
                                -> A</a></li>
                        <li><a class="dropdown-item"
                                href="index.php?url=product&category=<?php echo isset($category)?$category:0?>&sort=priceup">Giá
                                tăng dần</a></li>
                        <li><a class="dropdown-item"
                                href="index.php?url=product&category=<?php echo isset($category)?$category:0?>&sort=pricedown">Giá
                                giảm dần</a></li>
                        <li><a class="dropdown-item"
                                href="index.php?url=product&category=<?php echo isset($category)?$category:0?>&sort=new">Hàng
                                mới nhất</a></li>
                        <li><a class="dropdown-item"
                                href="index.php?url=product&category=<?php echo isset($category)?$category:0?>&sort=old">Hàng
                                cũ nhất</a></li>
                    </ul>
                </div>

                <div class="price-filter">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Lọc theo giá <i class="fa-solid fa-filter"></i>
                    </button>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item"
                                href="index.php?url=product&sort=<?php echo isset($sort)?$sort:0?>&category=<?php echo isset($category)?$category:0?>&filter=down">200k
                                <i class="fa-solid fa-arrow-down"></i></a></li>
                        <li><a class="dropdown-item"
                                href="index.php?url=product&sort=<?php echo isset($sort)?$sort:0?>&category=<?php echo isset($category)?$category:0?>&filter=betweent1">20k-100k</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="index.php?url=product&sort=<?php echo isset($sort)?$sort:0?>&category=<?php echo isset($category)?$category:0?>&filter=betweent2">100k-200k</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="index.php?url=product&sort=<?php echo isset($sort)?$sort:0?>&category=<?php echo isset($category)?$category:0?>&filter=up">60k
                                <i class="fa-solid fa-arrow-up"></i></a></li>
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
                                <?php foreach($categorys as $item){ ?>
                                <a class="text-decoration-none"
                                    href="index.php?url=product&category=<?=$item['category_id']?>&sort=<?php echo isset($sort)?$sort:0?>"><button
                                        class="main-product-list-category-item nav-link" style="color: #b5313a;"
                                        id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                                        type="button" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false"><?=$item['name']?></button></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- list product -->
                    <div class="container text-center col">
                        <!-- item -->
                        <div class="row row-cols-4">
                            <?php
                        $index = 0;
                        foreach($products as $item) {
                       
                        $priceNew = $item['price'] - ($item['price']*($item['sale']/100));
                        $custumPriceOld = number_format($item['price'], 0, ",", ".");
                        $custumPriceNew = number_format($priceNew, 0, ",", ".");
                        $index++;
                        ?>
                            <!-- item child -->
                            <div class="col mb-4">
                                <div class="card h-100">
                                    <!-- ảnh -->
                                    <div class="h-100">
                                        <a href=""><img style="height: 208px; object-fit: cover;"
                                                src="<?=$IMAGE.'/'.$item['image_url']?>" class="card-img-top"
                                                alt="..."></a>
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
                                            <?php echo $custumPriceNew?> <span
                                                class="text-decoration-underline">đ</span>
                                            <?php if($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                            <span
                                                class="main-product-price-old text-decoration-line-through text-secondary"
                                                style="font-size: 10px;"><?=$custumPriceOld?></span>
                                            <?php } ?>
                                        </p>
                                        <button type="button" class="btn border-danger text-danger cart-btn"
                                            data-bs-toggle="modal"
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
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- item order -->
                                                            <div hidden>
                                                                <input type="text" name="id"
                                                                    value="<?=$item['product_id']?>">
                                                                <input type="text" name="name"
                                                                    value="<?=$item['name']?>">
                                                                <input type="text" name="img"
                                                                    value="<?=$item['image_url']?>">

                                                                <input type="text" name="price"
                                                                    value="<?=$item['price']?>">
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
                                                                            <div
                                                                                class="d-flex gap-4 my-3 ms-1 align-items-center">
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
                                                                                    <label
                                                                                        class="btn btn-outline-primary"
                                                                                        for="btnradio<?=$flag.'-'.$index?>"><?=$size['name']?></label>
                                                                                    <?php } ?>
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
                                                                                        class="border-info rounded-2">
                                                                                        <i
                                                                                            class="fa-solid fa-minus"></i>
                                                                                    </button>
                                                                                    <input
                                                                                        class="quantity border-secondary mx-2 rounded-2 p-1 ps-2"
                                                                                        style="width: 30px;" type="text"
                                                                                        id="quantity-<?=$index?>"
                                                                                        value="1" name="quantity">
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

                                                            <input type="submit"
                                                                onclick="alert('Thêm thành công vào giỏ!')"
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




                        <!-- more product -->
                        <div class="d-flex justify-content-center mt-4">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link border-danger"
                                            href="index.php?url=product&category=<?=$item['category_id']?>&sort=<?php echo isset($sort)?$sort:0?>&filter=<?php echo isset($filterType)?$filterType:0?>">1</a>
                                    </li>
                                    <?php
                               
                                $count = 1;
                                $page = 1;
                                for($i = 0; $i < sizeof($allPro); $i++ ){
                                    $count++;
                                    
                                    if($count == 12) {
                                        $page +=1;
                                        $count = 0;

                                ?>
                                    <li class="page-item "><a class="page-link border-danger"
                                            href="index.php?url=product&sort=<?php echo isset($sort)?$sort:0?>&category=<?php echo isset($category)?$category:0?>&filter=<?php echo isset($filterType)?$filterType:0?>&pagenum=<?=$page?>">
                                            <?=$page?>
                                        </a>
                                    </li>
                                    <?php }} ?>



                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>

            </div>






    </main>
</div>