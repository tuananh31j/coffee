<!-- MAIN CONTENT -->
<!-- banner text -->
<div class="header-banner-contact text-center">
    <p class="">CỬA HÀNG</p>
</div>
<div class="main-content container my-5">
    <div>
        <?php foreach($list as $item){?>
        <div class="">

            <div class="row gap-5 align-items-end justify-content-center ">
                <div class="col-6">
                    <p><i class="fa-solid fa-shop"></i>
                        <?php for($i = 0; $i < strlen($item['address']); $i++){ echo $item['address'][$i]; if($item['address'][$i] == ','){ break;} }?>
                    </p>
                    <p>Địa chỉ: <span><?=$item['address']?></span></p>
                    <p>Điện thoại: <span><?=$item['phone']?></span></p>
                </div>
                <div class="col-2 mb-3">

                    <a target="_blank" href="<?=$item['link']?>">Xem
                        bản đồ <i class="fa-sharp fa-solid fa-location-dot"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>
    </div>

</div>