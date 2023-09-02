<!-- menu -->
<div class="col-3">
    <div class="tw-mb-6">
        <h2 class="tw-font-semibold tw-text-xl">TRANG TÀI KHOẢN</h2>
        <div class="">
            <i class="fs-6 "> Xin chào, <span><?= $_SESSION['user']['name'] ?></span></i>

        </div>

    </div>
    <div class="">
        <ul class="tw-leading-8">
            <li><a class="item__hover " href="index.php?url=account">Thông tin tài khoản</a></li>
            <li><a class="item__hover" href="index.php?url=account&act=myOrder">Đơn hàng của tôi</a></li>
            <li><a class="item__hover" href="index.php?url=account&act=changePass">Đổi mật khẩu</a></li>
            <li><a class="item__hover" href="index.php?url=account&act=logout">Đăng xuất</a></li>
        </ul>
    </div>
</div>