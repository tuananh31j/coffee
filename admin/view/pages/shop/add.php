<!-- CONTENT -->
<div class="col">
    <div class="container">
        <h3 class="text-center my-5">THÊM ĐỊA CHỈ</h3>
        <div class="d-flex">
            <!-- thêm địa chỉ -->

            <a href="index.php?url=shop&act=list"
                class="text-decoration-none bg-success p-1 px-2 rounded-2 text-light">Danh sách cửa hàng</a>
        </div>

        <!-- content -->
        <div class="wrapper" style="margin-top: 20px; width: 100%">
            <p class="text-success"><?=isset($noti)?$noti:''?></p>
            <form class="input" style="width: 50%" method="post" action="index.php?url=shop&act=add">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Địa chỉ<span
                            class="text-danger">*</span></span>
                    <input type="text" class="form-control" name="address">
                    <p class="text-danger ms-3"><?php echo isset($err['address'])?$err['address']:'' ?></p>

                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Số điện thoại<span
                            class="text-danger">*</span></span>
                    <input type="text" class="form-control" name="phone">
                    <p class="text-danger ms-3"><?php echo isset($err['phone'])?$err['phone']:'' ?></p>

                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Link địa chỉ trên google<span
                            class="text-danger">*</span></span>
                    <input type="text" class="form-control" name="link">
                    <p class="text-danger ms-3"><?php echo isset($err['link'])?$err['link']:'' ?></p>

                </div>
                <div class="button">
                    <input type="reset" value="Nhập lại" class="p-2 bg-info rounded-2 border-0 text-light">
                    <input type="submit" class="p-2 bg-success rounded-2 border-0 text-light" value="Thêm"
                        name="btn-add">
                </div>
            </form>

        </div>
    </div>


</div>
</div>
</div>