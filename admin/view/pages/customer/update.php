<!-- CONTENT -->
<div class="col">
    <div class="container">
        <h3 class="text-center my-5">Chỉnh sửa thông tin Khách hàng</h3>
        <img class="object-fit-cover border border-2 border-danger rounded-2 w-25 my-4 "
            src="<?=$IMAGE.'/'.$target['image_url']?>" alt="">
        <p class="text-success"><?=isset($noti)?$noti:''?></p>

        <div class="d-flex">
            <!-- thêm danh mục -->

            <a href="index.php?url=customer&act=list"
                class="text-decoration-none bg-success p-1 px-2 rounded-2 text-light ">Danh sách khách
                hàng</a>
        </div>

        <!-- content -->
        <div class="wrapper" style="margin-top: 20px; width: 100%">
            <form class="row g-3 needs-validation" action="index.php?url=customer&act=update" method="post"
                enctype="multipart/form-data">
                <!-- id -->
                <div class="col-md-6" hidden>
                    <label for="validationCustom03" class="form-label">Mã khách hàng</label>
                    <input type="text" class="form-control"
                        value="<?=isset($target['customer_id'])?$target['customer_id']:''?>" name="id"
                        id="validationCustom03" />
                    <div style="color: red"></div>
                </div>
                <!-- tên khách hàng -->
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Họ và Tên<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="<?=isset($target['name'])?$target['name']:''?>"
                        name="name" id="validationCustom03" />
                    <p class="text-danger"><?=isset($err['name'])?$err['name']:''?></p>
                    <div style="color: red"></div>
                </div>
                <!-- số điện thoại -->
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Số điện thoại<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="<?=isset($target['phone'])?$target['phone']:''?>"
                        name="phone" id="validationCustom03" />
                    <p class="text-danger"><?=isset($err['phone'])?$err['phone']:''?></p>
                    <div style="color: red"></div>
                </div>
                <!-- mật khẩu -->
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Mật khẩu<span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" value="<?=isset($target['pass'])?$target['pass']:''?>"
                        name="pass" id="validationCustom03" />
                    <p class="text-danger"><?=isset($err['pass'])?$err['pass']:''?></p>
                    <div style="color: red"></div>
                </div>
                <!-- email -->
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Địa chỉ Email<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email" id="validationCustom03"
                        value="<?=isset($target['email'])?$target['email']:''?>" />
                    <p class="text-danger"><?=isset($err['email'])?$err['email']:''?></p>
                    <div style="color: red"></div>
                </div>
                <!-- Trạng thái -->
                <div hidden class="col-md-6">
                    <label for="validationCustom03" class="form-label">Trạng thái<span
                            class="text-danger">*</span></label>
                    <div class="check">
                        <!-- on -->
                        <div class="form-check form-check-inline">
                            <input checked class="form-check-input border-secondary"
                                <?=(isset($target['status'])&&$target['status']==1)?'checked':''?> name="status"
                                type="radio" value="1" />
                            <label class="form-check-label" for="inlineCheckbox1">Hoạt động</label>
                        </div>
                        <!-- off -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input border-secondary"
                                <?=(isset($target['status'])&&$target['status']==0)?'checked':''?> name="status"
                                type="radio" value="0" />
                            <label class="form-check-label" for="inlineCheckbox2">Vô hiệu</label>
                        </div>
                    </div>

                </div>
                <!-- ảnh đại diện -->
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" name="img" id="validationCustom03" />
                    <p class="text-danger"><?=isset($err['img'])?$err['img']:''?></p>

                </div>

                <!-- vai trò -->
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Vai trò<span class="text-danger">*</span></label>
                    <div class="check">
                        <!-- cus -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input border-secondary"
                                <?=(isset($target['role'])&&$target['role']==0)?'checked':''?> name="role" type="radio"
                                value="0" />
                            <label class="form-check-label" for="inlineCheckbox1">Khách hàng</label>
                        </div>
                        <!-- ad -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input border-secondary"
                                <?=(isset($target['role'])&&$target['role']==1)?'checked':''?> name="role" type="radio"
                                value="1" />
                            <label class="form-check-label" for="inlineCheckbox2">Quản trị</label>
                        </div>
                    </div>

                </div>
                <!-- thêm -->
                <div class="button">
                    <input type="reset" value="Nhập lại" class="p-2 bg-success rounded-2 border-0 text-light">
                    <input type="submit" class="p-2 bg-info rounded-2 border-0 text-light" value="Cập nhật"
                        name="btn-update">
                </div>
            </form>
        </div>
    </div>


</div>