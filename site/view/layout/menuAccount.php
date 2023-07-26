<!-- menu -->
<div class="col-3">
    <div class="user-title">
        <h2>TRANG TÀI KHOẢN</h2>
        <div class="mb-3">
            <i class="fs-6 fw-bold"> Xin chào, <span><?=$_SESSION['user']['name']?></span></i>

        </div>

    </div>
    <div class="user-list-handle ">
        <ul>
            <li><a href="index.php?url=account">Thông tin tài khoản</a></li>
            <li><a href="index.php?url=account&act=myOrder">Đơn hàng của tôi</a></li>
            <li><a href="index.php?url=account&act=pass">Đổi mật khẩu</a></li>
            <li><a href="index.php?url=account&act=hisOrder">Lịch sử đơn</a></li>
            <li><a href="index.php?url=account&act=logout">Đăng xuất</a></li>
        </ul>
    </div>
</div>