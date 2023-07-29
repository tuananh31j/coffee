<?php





?>
<div class="main-content">
    <main class="my-5">

        <link rel="stylesheet" href="<?=$STYLE?>/login.css">

        <div class="row  align-items-center rounded-start-2" style="justify-content: center;">
            <div class="col-4">
                <img class="w-100 h-100 rounded-start-2" src="<?=$IMAGE?>/login.jpg" alt="">
            </div>
            <div class="col-4 bg-secondary-subtle rounded-end-2 "
                style="padding: 6px; margin-left: -12px; height: 607px;">
                <h2>Đăng nhập</h2>
                <p class="text-center text-danger"><?= isset($noti)?$noti:''?></p>

                <form method="post" action="index.php?url=login">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="text" id="email" name="email" placeholder="Nhập đại chỉ Email">
                    <p class="mx-2 text-danger"><?php echo isset($errEmail)?$errEmail:'' ?></p>
                    <label for="password">Mật khẩu<span class="text-danger">*</span></label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                    <p class="mx-2 text-danger"><?php echo isset($errPass)?$errPass:'' ?></p>
                    <div class="abc2">
                        <a href="index.php?url=signup">Đăng Ký</a>
                        <a href="#">Quên mật khẩu?</a>
                    </div>

                    <input type="submit" name="btn-login" value="Đăng nhập">
                    <p class="ms-2" style="font-size: 14px; line-height: 2;">Highlands Coffee CPG cam kết bảo mật và sẽ
                        không bao giờ
                        đăng
                        hay chia sẻ thông tin mà chưa có được sự đồng ý của bạn.</p>


                </form>
            </div>
        </div>
    </main>
</div>