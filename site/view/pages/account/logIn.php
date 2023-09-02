<div class="main-content">
    <main class="my-5 position-relative">

        <div class="row tw-border-2 tw-  align-items-center rounded-start-2 w-100 position-relative py-5" style="justify-content: center;height: 700px;background-size: cover; filter: blur(3px); background-image: url(<?= $IMAGE ?>/bnLogin.jpg);"></div>
        <div class="row  align-items-center rounded-start-2 w-100 position-relative py-5" style="justify-content: center">

            <div class="col-4 bg-secondary-subtle rounded-2 position-absolute tw-bottom-36" style="padding: 6px; margin-left: -12px; height: 607px;">
                <h2 class="tw-text-xl tw-font-semibold tw-text-center tw-mt-8">ĐĂNG NHẬP</h2>
                <p class="text-center text-danger"><?= isset($noti) ? $noti : '' ?></p>

                <form method="post" action="index.php?url=login" class="tw-flex tw-flex-col tw-justify-center tw-mt-14 tw-leading-9">
                    <div class="tw-mx-auto">
                        <label for="email" class="tw-block">Email<span class="text-danger">*</span></label>
                        <input type="text" id="email" name="email" class="tw-border-gray-700 tw-rounded tw-p-3 tw-w-80" placeholder="Nhập địa chỉ Email">
                        <p class="mx-2 text-danger"><?php echo isset($errEmail) ? $errEmail : '' ?></p>
                    </div>
                    <div class="tw-mx-auto">
                        <label for="password" class="tw-block">Mật khẩu<span class="text-danger">*</span></label>
                        <input type="password" id="password" class="tw-border-gray-700 tw-rounded tw-p-3 tw-w-80" name="password" placeholder="Nhập mật khẩu">
                        <p class="mx-2 text-danger"><?php echo isset($errPass) ? $errPass : '' ?></p>
                    </div>
                    <div class="tw-flex tw-justify-between tw-mx-auto tw-w-80 tw-mt-3">
                        <a class="tw-text-red-800 hover:tw-underline" href="index.php?url=signup">Đăng Ký</a>
                        <a class="tw-text-red-800 hover:tw-underline" href="index.php?url=forgotPass">Quên mật khẩu?</a>
                    </div>

                    <input type="submit" name="btn-login" class="tw-my-3 tw-p-3 tw-w-80 tw-mx-auto tw-text-white tw-bg-red-800 hover:tw-opacity-75 tw-border tw-rounded" value="Đăng nhập">
                    <p class="ms-2" style="font-size: 14px; line-height: 2;">Highlands Coffee CPG cam kết bảo mật và sẽ
                        không bao giờ
                        đăng
                        hay chia sẻ thông tin mà chưa có được sự đồng ý của bạn.</p>


                </form>
            </div>
        </div>
    </main>
</div>