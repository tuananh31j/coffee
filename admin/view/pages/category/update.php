<!-- CONTENT -->
<div class="col">
    <div class="container">
        <h3 class="text-center my-5">Chỉnh sửa Danh Mục</h3>
        <div class="d-flex">
            <a href="index.php?url=category&act=list"
                class="text-decoration-none bg-success p-1 px-2 rounded-2 text-light m-3">Danh sách danh mục</a>
        </div>
        <!-- content -->
        <div class="wrapper" style="margin-top: 20px; width: 100%">
            <p class="text-success"><?=isset($noti)?$noti:''?></p>
            <form class="input" style="width: 50%" method="post" action="index.php?url=category&act=update">
                <input type="text" hidden name="id"
                    value="<?=isset($target['category_id'])?$target['category_id']:''?>">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Tên loại</span>
                    <input type="text" class="form-control" name="name"
                        value="<?=isset($target['name'])?$target['name']:''?>">
                </div>
                <p class="text-danger"><?php echo isset($errName)?$errName:'' ?></p>
                <div class="button">
                    <input type="reset" value="Nhập lại" class="p-2 bg-success rounded-2 border-0 text-light">
                    <input type="submit" class="p-2 bg-info rounded-2 border-0 text-light" value="Cập nhât"
                        name="btn-update">
                </div>
            </form>

        </div>
    </div>


</div>
</div>
</div>