<!-- CONTENT -->
<div class="col">
    <div class="container">
        <h3 class="text-center my-5">Cập Nhật Danh Mục</h3>
        <p><?php var_dump($item)?></p>
        <div class="d-flex">
            <!-- thêm danh mục -->

            <a href="index.php?url=list_category"
                class="text-decoration-none bg-success p-1 px-2 rounded-2 text-light m-3">Danh sách danh mục</a>
        </div>

        <!-- content -->
        <div class="wrapper" style="margin-top: 20px; width: 100%">
            <p><?=isset($thongbao)?$thongbao:''?></p>
            <form style="width: 50%" method="post" action="index.php?url=category-update">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Tên loại</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" name="name"
                        value="<?=isset($item['name'])?$item['name']:''?>" />
                </div>
                <div class="button">
                    <input type="submit" class="p-2 bg-info rounded-2 border-0" value="Cập nhật" name="btn-update">

                    <input type="reset" value="Nhập lại" class="p-2 bg-success rounded-2 border-0">
                </div>
            </form>

        </div>
    </div>


</div>
</div>
</div>