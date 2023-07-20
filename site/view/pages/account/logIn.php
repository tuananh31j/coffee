<?php





?>
<div class="main-content">
    <main>

        <link rel="stylesheet" href="<?=$STYLE?>/login.css">

        <div class="abc">
            <div class="abc-img">
                <img src="img/Screenshot 2023-07-08 202142.png" alt="">
            </div>
            <div class="abc1">
                <h2>Đăng nhập</h2>
                <p class="text-danger"><?= isset($noti)?$noti:''?></p>

                <form method="post" action="index.php?url=login">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" placeholder="Nhập đại chỉ Email">

                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                    <div class="abc2">
                        <a href="logup.html">Đăng Ký</a>
                        <a href="#">Quên mật khẩu?</a>
                    </div>

                    <input type="submit" name="btn-login" value="Đăng nhập">
                    <p>Highlands Coffee CPG cam kết bảo mật và sẽ không bao giờ đăng </br>
                        hay chia sẻ thông tin mà chưa có được sự đồng ý của </br> bạn.</p>
                    <hr>

                </form>
            </div>
        </div>
    </main>
</div>