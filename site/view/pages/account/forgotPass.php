<div class="main-content">
    <main class="my-5 position-relative">


        <div class="row tw-border-2 tw-  align-items-center rounded-start-2 w-100 position-relative py-5" style="justify-content: center;height: 700px;background-size: cover; filter: blur(3px); background-image: url(<?= $IMAGE ?>/bnLogin.jpg);"></div>
        <div class="row  align-items-center rounded-start-2 w-100 position-relative py-5" style="justify-content: center">

            <div class="col-4 bg-secondary-subtle rounded-2 position-absolute tw-bottom-36" style="padding: 6px; margin-left: -12px; height: 607px;">
                <h2 class="tw-text-xl tw-font-semibold tw-text-center tw-mt-8">Quên mật khẩu</h2>
                <p class="text-danger"><?= isset($noti) ? $noti : '' ?></p>
                <form class="tw-flex tw-flex-col tw-justify-center tw-mt-14 tw-leading-10" method="post" action="index.php?url=forgotPass" enctype="multipart/form-data">


                    <!-- sđt -->
                    <div class="tw-mx-auto">
                        <label for="validationCustom03" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
                        <input type="text" class="form-control tw-border-gray-700 tw-rounded tw-p-3 tw-w-80" placeholder="Nhập số điện thoại" name="phone" value="" id="validationCustom03">
                        <p class="text-danger"><?= isset($err['phone']) ? $err['phone'] : '' ?></p>
                    </div>

                    <!-- email -->
                    <div class="tw-mx-auto">
                        <label for="validationCustom03" class="form-label">Email<span class="text-danger">*</span></label>
                        <input type="text" class="form-control tw-border-gray-700 tw-rounded tw-p-3 tw-w-80" placeholder="Nhập địa chỉ email" name="email" value="" id="validationCustom03">
                        <p class="text-danger"><?= isset($err['email']) ? $err['email'] : '' ?></p>
                    </div>


                    <!-- btn -->
                    <div class="tw-mx-auto">
                        <input type="submit" value="Lấy lại mật khẩu" name="btn-submit" class="tw-my-3 tw-p-3 tw-w-80 tw-mx-auto tw-text-white tw-bg-red-800 hover:tw-opacity-75 tw-border tw-rounded">
                    </div>
                    <a class="tw-text-red-800 hover:tw-underline tw-text-center" href="index.php?url=login">Đăng nhập ngay</a>
                </form>
            </div>
        </div>
    </main>
</div>