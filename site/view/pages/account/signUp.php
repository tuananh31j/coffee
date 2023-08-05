<div class="wrapper" style="margin:0px auto;width:1050px;">
    <h2 style="padding: 20px;color:green">Đăng ký</h2>
    <p class="text-danger"><?=isset($noti)?$noti:''?></p>
    <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
        <!-- id -->
        <div class="col-md-6" hidden>
            <label for="validationCustom03" class="form-label">Mã khách hàng</label>
            <input type="text" class="form-control" value="" name="makh" id="validationCustom03">
        </div>
        <!-- name -->
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Họ và Tên<span class="text-danger">*</span></label>
            <input type="text" class="form-control" value="" name="name" id="validationCustom03">
            <p class="text-danger"><?=isset($err['name'])?$err['name']:''?></p>
        </div>
        <!-- sđt -->
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="phone" value="" id="validationCustom03">
            <p class="text-danger"><?=isset($err['phone'])?$err['phone']:''?></p>
        </div>
        <!-- pass -->
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Mật khẩu<span class="text-danger">*</span></label>
            <input type="password" value="" name="pass" class="form-control" id="validationCustom03">
            <p class="text-danger"><?=isset($err['pass'])?$err['pass']:''?></p>
        </div>
        <!-- email -->
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Email<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="email" value="" id="validationCustom03">
            <p class="text-danger"><?=isset($err['email'])?$err['email']:''?></p>
        </div>
        <!-- rePass -->
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Xác nhận mật khẩu<span
                    class="text-danger">*</span></label>
            <input type="password" class="form-control" value="" name="rePass" id="validationCustom03">
            <p class="text-danger"><?=isset($err['pass'])?$err['pass']:''?></p>
        </div>

        <!-- image
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control" value="" name="img" id="validationCustom03">
            <p class="text-danger"><?=isset($err['img'])?$err['img']:''?></p>
        </div> -->
        <!-- btn -->
        <div class="button">
            <input type="reset" value="Nhập lại" class="bg-info p-2 border-0 rounded-2">
            <input type="submit" value="Đăng ký" name="btn-signup" class="bg-success text-light p-2 border-0 rounded-2">
        </div>
    </form>
</div>