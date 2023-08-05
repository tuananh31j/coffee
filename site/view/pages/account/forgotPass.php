<div class="wrapper" style="margin:0px auto;width:1050px;">
    <h2 style="padding: 20px;color:green">Đăng ký</h2>
    <p class="text-danger"><?=isset($noti)?$noti:''?></p>
    <form class=" g-3 needs-validation" method="post" action="index.php?url=forgotPass" enctype="multipart/form-data">


        <!-- sđt -->
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="phone" value="" id="validationCustom03">
            <p class="text-danger"><?=isset($err['phone'])?$err['phone']:''?></p>
        </div>

        <!-- email -->
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Email<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="email" value="" id="validationCustom03">
            <p class="text-danger"><?=isset($err['email'])?$err['email']:''?></p>
        </div>


        <!-- btn -->
        <div class="button">
            <input type="reset" value="Nhập lại" class="bg-info p-2 border-0 rounded-2">
            <input type="submit" value="Gửi" name="btn-submit" class="bg-success text-light p-2 border-0 rounded-2">
        </div>
    </form>
</div>