<!-- CONTENT -->
<div class="col">
    <div class="container">
        <h3 class="text-center my-5 tw-font-semibold tw-text-lg">THÊM KÍCH CỠ</h3>
        <div class="d-flex">
            <!--  danh sách -->

            <a href="index.php?url=size&act=list" class="text-decoration-none hover:tw-opacity-75 bg-success p-1 px-2 rounded-2 text-light m-3">Danh sách</a>
        </div>

        <!-- content -->
        <div class="wrapper" style="margin-top: 20px; width: 100%">
            <p class="text-success"><?= isset($noti) ? $noti : '' ?></p>
            <form class="input" style="width: 50%" method="post" action="index.php?url=size&act=add">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Tên kích cỡ<span class="text-danger">*</span></span>
                    <input type="text" class="form-control" name="name">
                </div>
                <p class="text-danger"><?php echo isset($errName) ? $errName : '' ?></p>
                <div class="button">
                    <input type="reset" value="Nhập lại" class="p-2 bg-info rounded-2 border-0 text-light hover:tw-opacity-75">
                    <input type="submit" class="p-2 tw-bg-red-800 rounded-2 border-0 text-light hover:tw-opacity-75" value="Thêm" name="btn-add">
                </div>
            </form>

        </div>
    </div>


</div>
</div>
</div>