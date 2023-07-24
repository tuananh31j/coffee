<!-- MAIN CONTENT -->
<div class="main-content container my-5">

    <div class="cart-products  row gap-3 align-items-center">
        <!-- item -->
        <form action="index.php?url=order" method="post">
            <?php 
            $totalPrice = 0;
            $index = 0;
            if(isset($listCart)) {
                foreach($listCart as $index => $product){
                    $totalPrice += $product['price'];
             ?>

            <div class="cart-product-items col">
                <div class="cart-item">

                    <!-- id chi tiết sản phẩm -->
                    <input type="text" value="<?=$product['id']?>" hidden>
                    <div class="cart-product-item row align-items-center">
                        <!-- ảnh sản phẩm -->
                        <div class="col-2"><img class="w-100" src="<?=$IMAGE.'/'.$product['img']?>" alt=""></div>
                        <!-- tiêu đề sản phẩm -->
                        <div class="col-3">
                            <p><?=$product['name']?></p>
                        </div>
                        <div class="d-flex gap-3 col-6 m-3 mb-4 align-items-center">
                            <!-- giá sản phẩm -->
                            <div class="text-danger">
                                <p><?=number_format($product['price'],0,',','.')?> <span
                                        class=" text-decoration-underline">đ</span></p>
                            </div>
                            <!-- số lượng -->
                            <div>
                                <button type="button" class="border-info rounded-2">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input class="quantity border-secondary mx-2 rounded-2 p-1 ps-2" style="width: 30px;"
                                    type="text" id="quantity-<?=$index?>" value="<?=$product['quantity']?>"
                                    name="quatity">
                                <button type="button" class="border-danger rounded-2">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            <!-- size -->
                            <div>
                                <label class="mx-4" for="size">Size: <span
                                        class=" text-info fs-5 fw-bold"><?=getSizeName($product['size'])['name']?></span></label>
                                <input hidden type="text" value="<?=$product['size']?>" name="size">

                            </div>
                            <!-- nút xóa -->
                            <div class="col-1">
                                <a href="index.php?url=cart&index=<?=$index?>"><button type="button"
                                        class="bg-danger text-light p-1 border-0 rounded-2">Xóa</button></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php }} ?>
            <!-- nút thanh toán -->
            <div class="cart-total row col-3  border-top-0 border-end-0 border-bottom-0 border">
                <div class="">
                    <p>Tạm tính: <span class="text-danger fw-bold fs-3"><?=number_format($totalPrice,0,',','.')?> <i
                                class="text-decoration-underline"> đ</i></span></p>
                </div>
                <input type="submit" value="Thanh toán" class="w-50 text-light bg-danger p-2 border-0 rounded-2">
            </div>
        </form>

    </div>


</div>