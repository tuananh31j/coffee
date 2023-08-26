<!-- MAIN CONTENT -->
<!-- banner text -->

<?php if ($banner['banner_url'] == '') { ?>
    <div class="header-banner-contact text-center">
        <p class="">LIÊN HỆ</p>
    </div>
<?php } else { ?>
    <!-- banner -->
    <div class="header-banner" style="max-height:500px; overflow-y: hidden;">
        <a href="index.php?url=proDetails&id=<?= $banner['product_id'] ?>&view=<?= getProById($banner['product_id'])['view'] + 1 ?>"><img src="<?= $IMAGE . '/' . $banner['banner_url'] ?>" alt="" class="  w-100  object-fit-cover" /></a>
    </div>
<?php } ?>
<div class="main-content container my-5">
    <main>

        <div class="row gap-3">
            <div class="col">
                <p class="text-secondary">Hailen Coffee CPG tự hào là nhà phân phối hợp lệ và độc quyền cho tất
                    cả các
                    sản
                    phẩm mang thương hiệu Highlands Coffee. Mọi thông tin liên hệ xin gửi vào form dưới đây
                    hoặc liên hệ chúng tôi theo địa chỉ.</p>
                <p>Địa chỉ:<span> Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Tp. Hà Nội</span></p>
                <p>Điện thoại: <span>012345678</span></p>
                <p>Email: <span>Hailen@gmail.com</span></p>
            </div>
            <div class="col">
                <div>
                    <form action="index.php?url=contact" method="post">
                        <div class="row mb-3">
                            <!-- họ tên -->
                            <div class="col-6">
                                <label for="name">Họ tên<span class="text-danger">*</span></label><br>
                                <input name="name" class="w-100 rounded-2 p-2 border" type="text" placeholder="Mời nhập họ tên">
                                <p class="text-danger"><?= isset($err['name']) ? $err['name'] : '' ?></p>
                            </div>
                            <div class="col-6">
                                <!-- email -->
                                <label for="email">Email<span class="text-danger">*</span></label><br>
                                <input name="email" class="w-100 rounded-2 p-2 border" type="text" placeholder="Nhập địa chỉ email">
                                <p class="text-danger"><?= isset($err['email']) ? $err['email'] : '' ?></p>
                            </div>
                        </div>
                        <!-- điện thoại -->
                        <div class="row my-3">
                            <div class="col">
                                <label for="phone">Điện thoại<span class="text-danger">*</span></label><br>
                                <input name="phone" class="w-100 rounded-2 p-2 border" type="text" placeholder="Nhập số điện thoại">
                                <p class="text-danger"><?= isset($err['phone']) ? $err['phone'] : '' ?></p>
                            </div>

                        </div>
                        <!-- nội dung -->
                        <div class="row my-3">
                            <div class="col">
                                <label for="phone">Nội dung<span class="text-danger">*</span></label><br>
                                <input name="content" class="w-100 rounded-2 p-2 border pb-5" type="text" placeholder="Nhập lời nhắn của bạn">
                                <p class="text-danger"><?= isset($err['content']) ? $err['content'] : '' ?></p>
                            </div>

                        </div>
                        <input type="submit" name="btn-send" value="Gửi tin nhắn" class="px-4 py-2 bg-danger border-0 text-light rounded-2">
                        <p class="text-danger my-3"><?= isset($noti) ? $noti : '' ?></p>

                    </form>
                </div>
            </div>
        </div>
    </main>
</div>