<!-- MAIN CONTENT -->
<div class="main-content  container  ">
    <?php
    $countQuantity =0;
foreach($_SESSION['cart'] as $item) {
    $countQuantity += $item['quantity'];
}
?>
    <div class="cart-products  row gap-3 align-items-center">
        <!-- item -->
        <form action="index.php?url=pay" method="post">
            <div class="row gap-4">
                <div class="col ">
                    <h3 class="mb-5">Thông tin thanh toán</h3>
                    <div class="form-group my-4">
                        <label class="my-2 fw-bold" for="shop">Chọn cửa hàng gần bạn<span
                                class="text-danger">*</span></label>
                        <!-- shop -->
                        <select class="form-control" name="shop" id="shop">
                            <option value="">-Chọn cửa hàng-</option>
                            <?php foreach($listShops as $shop) {?>
                            <option value="<?=$shop['address_id']?>"><?=$shop['address']?></option>
                            <?php } ?>
                        </select>
                        <p class="text-danger"><?=isset($err['shop'])?$err['shop']:''?></p>
                    </div>
                    <!-- id customer -->
                    <div hidden class="form-group my-4">
                        <input type="text" class="form-control" name="idCus"
                            value="<?=isset($_SESSION['user'])?$_SESSION['user']['customer_id']:''?>" id="name"
                            placeholder="Nhập tên của bạn!">
                    </div>
                    <!-- name -->
                    <div class="form-group my-4">
                        <label class="my-2 fw-bold" for="name">Tên người nhận<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id='name' name="name"
                            value="<?=isset($_SESSION['user'])?$_SESSION['user']['name']:''?>" id="name"
                            placeholder="Nhập tên của bạn!">
                        <p class="text-danger"><?=isset($err['name'])?$err['name']:''?></p>
                    </div>

                    <!-- phone -->
                    <div class="form-group my-4">
                        <label class="my-2 fw-bold" for="phone">Số điện thoại<span class="text-danger">*</span></label>
                        <input type="text" id='phone' class="form-control" name="phone"
                            value="<?=isset($_SESSION['user'])?$_SESSION['user']['phone']:''?>" id="phone"
                            placeholder="Nhập số điện thoại nhận hàng!">
                        <p class="text-danger"><?=isset($err['phone'])?$err['phone']:''?></p>
                    </div>

                    <!-- email -->
                    <div class="form-group my-4">
                        <label class="my-2 fw-bold" for="email">Email<span class="text-danger">*</span></label>
                        <input type="email" id='email' class="form-control" name="email"
                            value="<?=isset($_SESSION['user'])?$_SESSION['user']['email']:''?>" id="email"
                            placeholder="Nhập email liên hệ của bạn!">
                        <p class="text-danger"><?=isset($err['email'])?$err['email']:''?></p>
                    </div>

                    <!-- Địa chỉ nhận hàng -->
                    <div class="form-group my-4">
                        <label class="my-2 fw-bold" for="address">Địa chỉ nhận hàng<span
                                class="text-danger">*</span></label>
                        <input id='address' type="text" class="form-control" name="address"
                            value="<?=isset($_SESSION['user'])?$_SESSION['user']['address']:''?>" id="address"
                            placeholder="Nhập địa chỉ của bạn!">
                        <p class="text-danger"><?=isset($err['address'])?$err['address']:''?></p>
                    </div>

                    <!-- Ghi chú -->
                    <div class="form-group mt-4">
                        <label class="my-2 fw-bold" for="note">Ghi chú</label>
                        <input type="text" class="form-control" value=""
                            style="word-wrap: break-word; padding-bottom: 108px;" name="note" id="note"
                            placeholder="Nhập nội dung bạn muốn nhắn gửi đến shop!">
                    </div>

                    <div hidden>

                        <?php 
                            $totalPrice = 0;
                            if(isset($listCart)) {
                                foreach($listCart as $index => $product){
                                    $targetPro = getProById($product['id']);
                                    $cost = getPrice($product['id'],$product['size'])['price'];
                                    $priceSale = $cost*$targetPro['sale']/100;
                                    $currentPrice = $cost - $priceSale;
                                    $curPriceFormat = number_format($currentPrice,0,',','.');
                                    $totalPrice += $currentPrice*$product['quantity'];

                            ?>
                        <?php }} ?>
                    </div>
                </div>
                <!-- đơn hàng -->
                <div class="col">
                    <h4 class="mb-5">Đơn hàng (<?=$countQuantity?> sản phẩm)</h4>
                    <div class=" border border-2 border-danger shadow rounded-2 p-4 ">
                        <iframe src="./site/view/pages/order/itemCart.php" style="width:100%; height: 340px"
                            frameborder="1"></iframe>
                        <div class="form-check p-0 mt-4">
                            <label for="" class="fw-bold">Thanh toán<span class="text-danger">*</span></label><br>
                            <div class="border border-2 rounded-2 p-4 ps-5 mt-4">
                                <input class="form-check-input" type="radio" checked name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label  " for="flexRadioDefault1">
                                    Thanh toán khi giao hàng(COD)
                                </label>
                            </div>

                        </div>
                        <!-- nút thanh toán và tổng tiền -->
                        <div style="margin-top: 50px" class="cart-total  ">
                            <div class="">
                                <p>Tổng cộng: <span
                                        class="text-danger fw-bold fs-3"><?=number_format($totalPrice,0,',','.')?>
                                        <i class="text-decoration-underline"> đ</i></span></p>
                            </div>

                            <input type="submit" value="Thanh toán" name="btn-pay"
                                class="w-50 text-light bg-danger p-2 border-0 rounded-2">

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>


</div>