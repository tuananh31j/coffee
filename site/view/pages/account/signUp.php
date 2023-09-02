<div class="main-content">
    <main class="my-5 position-relative">

        <div class="row tw-border-2 tw-  align-items-center rounded-start-2 w-100 position-relative py-5" style="justify-content: center;height: 700px;background-size: cover; filter: blur(3px); background-image: url(<?= $IMAGE ?>/bnLogin.jpg);"></div>
        <div class="row  align-items-center rounded-start-2 w-100 position-relative py-5" style="justify-content: center">

            <div class="col-4 bg-secondary-subtle rounded-2 position-absolute tw-bottom-36 tw-w-[700px]" style="padding: 6px; margin-left: -12px; height: 607px;">
                <h2 class="tw-text-xl tw-font-semibold tw-text-center tw-mt-8">ĐĂNG KÝ</h2>
                <p class="tw-text-green-800 tw-text-center"><?= isset($noti) ? $noti : '' ?></p>
                <form class="tw-flex tw-flex-col tw-justify-center tw-mt-14 tw-leading-9 tw-mx-auto" action="index.php?url=signup" method="post" enctype="multipart/form-data">
                    <!-- id -->
                    <div class="tw-mx-auto" hidden>
                        <label for="validationCustom03" class="form-label tw-block">Mã khách hàng</label>
                        <input type="text" class=" tw-border-gray-700 tw-rounded tw-p-2 tw-w-80" value="" name="makh" id="validationCustom03">
                    </div>
                    <div class="tw-flex tw-gap-2 tw-mx-auto tw-h-[400px]">
                        <div class="tw-mx-auto">
                            <!-- name -->
                            <div class="">
                                <label for="validationCustom03" class="form-label tw-block">Họ và Tên<span class="text-danger">*</span></label>
                                <input type="text" class=" tw-border-gray-700 tw-rounded tw-p-2 tw-w-80" placeholder="Nhập tên của bạn" value="" name="name" id="validationCustom03">
                                <p class="text-danger"><?= isset($err['name']) ? $err['name'] : '' ?></p>
                            </div>
                            <!-- sđt -->
                            <div class="">
                                <label for="validationCustom03" class="form-label tw-block">Số điện thoại<span class="text-danger">*</span></label>
                                <input type="text" class=" tw-border-gray-700 tw-rounded tw-p-2 tw-w-80" placeholder="Nhập số điện thoại" name="phone" value="" id="validationCustom03">
                                <p class="text-danger"><?= isset($err['phone']) ? $err['phone'] : '' ?></p>
                            </div>
                            <!-- email -->
                            <div class="">
                                <label for="validationCustom03" class="form-label tw-block">Email<span class="text-danger">*</span></label>
                                <input type="text" class=" tw-border-gray-700 tw-rounded tw-p-2 tw-w-80" placeholder="Nhập địa chỉ email" name="email" value="" id="validationCustom03">
                                <p class="text-danger"><?= isset($err['email']) ? $err['email'] : '' ?></p>
                            </div>
                        </div>
                        <div class="tw-mx-auto">
                            <!-- pass -->
                            <div class="">
                                <label for="validationCustom03" class="form-label tw-block">Mật khẩu<span class="text-danger">*</span></label>
                                <input type="password" value="" name="pass" placeholder="Nhập mật khẩu" class=" tw-border-gray-700 tw-rounded tw-p-2 tw-w-80" id="validationCustom03">
                                <p class="text-danger"><?= isset($err['pass']) ? $err['pass'] : '' ?></p>
                            </div>
                            <!-- rePass -->
                            <div class="">
                                <label for="validationCustom03" class="form-label tw-block">Xác nhận mật khẩu<span class="text-danger">*</span></label>
                                <input type="password" class=" tw-border-gray-700 tw-rounded tw-p-2 tw-w-80" placeholder="Nhập lại mật khẩu" value="" name="rePass" id="validationCustom03">
                                <p class="text-danger"><?= isset($err['pass']) ? $err['pass'] : '' ?></p>
                            </div>

                        </div>
                    </div>
                    <!-- image
                        <div class="tw-mx-auto">
                            <label for="validationCustom03" class="form-label tw-block">Ảnh đại diện</label>
                            <input type="file" class=" tw-border-gray-700 tw-rounded tw-p-2 tw-w-80" value="" name="img" id="validationCustom03">
                            <p class="text-danger"><?= isset($err['img']) ? $err['img'] : '' ?></p>
                        </div> -->
                    <!-- btn -->
                    <div class="button tw-mx-auto">
                        <input type="submit" value="Đăng ký" name="btn-signup" class="tw-my-3 tw-p-2 tw-w-80 tw-mx-auto tw-text-white tw-bg-red-800 hover:tw-opacity-75 tw-border tw-rounded">
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>