<!-- MAIN-CONTENT -->
<div class="main-content my-5">
    <main>

        <div class="container ">
            <?php 
                    $totalPrice = 0;
                    $list =$details;
                    if(isset($list)) {
                        foreach($list as $index => $item){
                            $targetPro = getProById($item['product_id']);
                            $cost = getPrice($item['product_id'],$item['size_id'])['price'];
                            $priceSale = $cost*$targetPro['sale']/100;
                            $currentPrice = $cost - $priceSale;
                            $curPriceFormat = number_format($currentPrice,0,',','.');
                            $totalPrice = $currentPrice*$item['quantity'];

                    ?>
            <div class="row align-items-center w-100 mt-4">
                <!-- ảnh số lượng -->
                <div class="col-3"><img class="w-100" src="<?=$IMAGE.'/'.$item['image_url']?>" alt=""> <span
                        class="position-relative text-light px-2 border border-danger rounded-circle bg-danger"
                        style="bottom: 230px; left: 200px"><?=$item['quantity']?></span></div>
                <div class="col border-2 border rounded-2 shadow ">
                    <!-- name pro -->
                    <span class="fs-5 fw-medium">
                        <?=$item['name']?>
                    </span>
                    <div class="d-flex gap-2 align-items-center">
                        <span class="fs-6 text-danger fw-bold ">
                            <!-- giá mua -->
                            <?=$curPriceFormat?> <span class="text-decoration-underline fw-normal fa-italic">đ</span>
                        </span>
                        <!-- giá cũ -->
                        <span class="text-decoration-line-through text-secondary"
                            style="font-size: 12px; font-style: italic;">
                            <?=$cost?><span class="text-decoration-underline fw-normal fa-italic">đ</span>
                        </span>
                        <!-- size -->
                        <span class="fs-6 fw-bold text-danger"><span class=" text-dark">size:
                            </span><?=getSizeName($item['size_id'])['name']?></span>
                    </div>

                </div>
            </div>
            <iframe style="height: 300px;" class="w-100"
                src="./site/view/pages/detailsPro/feedback.php?id=<?=$item['product_id']?>" frameborder="0"></iframe>
            <hr>
            <?php }} ?>

    </main>
</div>