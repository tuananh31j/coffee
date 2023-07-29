<!-- content -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center">Thêm sản phẩm</h3>

        <div class="">
            <!-- thêm sản phẩm -->

            <a href="index.php?url=product&act=list"
                class="bg-success p-1 px-2 rounded-2 text-light m-3 text-decoration-none">Danh sách sản
                phẩm <i class="fa-solid fa-plus"></i></a>
            <p class="text-danger m-3"><?=isset($noti)?$noti:''?></p>


        </div>

        <!-- content -->
        <div>
            <form action="index.php?url=product&act=add" class="row gap-5 align-items-center" method="post"
                enctype="multipart/form-data">
                <div class="col">
                    <!-- tên -->
                    <div class="">
                        <label for="validationCustom02" class="form-label">Tên hàng hóa<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="validationCustom02" />
                        <p class="text-danger"><?=isset($err['name'])?$err['name']:''?></p>
                    </div>
                    <!-- giảm giá -->
                    <div class="">
                        <label for="validationCustom01" class="form-label">Giảm giá %<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="sale" value="" />
                        <p class="text-danger"><?=isset($err['sale'])?$err['sale']:''?></p>
                    </div>
                    <!-- ảnh hàng hóa -->
                    <div class="">
                        <label for="validationCustom02" class="form-label">Ảnh hàng hóa<span
                                class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="img" aria-label="file example" />
                        <p class="text-danger"><?=isset($err['img'])?$err['img']:''?></p>
                    </div>
                    <!-- danh mục -->
                    <div class="">
                        <label for="validationCustomUsername" class="form-label">Loại hàng<span
                                class="text-danger">*</span></label>
                        <div class="input-group has-validation">
                            <select class="form-select" name="category" aria-label="Default select example">
                                <option value="">...Chọn Loại Hàng....</option>
                                <?php foreach($listCategory as $cate) { ?>
                                <option value="<?=$cate['category_id']?>"><?=$cate['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <p class="text-danger"><?=isset($err['category'])?$err['category']:''?></p>
                    </div>
                </div>
                <!-- giá và size -->
                <div class="col-3">
                    <?php
                    foreach($listSize as $key => $size) {
                    ?>
                    <div class="">
                        <label for="size">Size <span class="text-danger fw-bold"><?=$size['name']?></span> có giá
                            là<span class="text-danger">*</span>:</label>
                        <input type="text" value="<?=$size['size_id']?>" hidden name="details[<?=$key?>][size]">
                        <input type="text" class="form-control" name="details[<?=$key?>][price]" value=""
                            placeholder="đ" />
                        <p class="text-danger"><?=isset($err['price-'.$key])?$err['price-'.$key]:''?></p>
                    </div>
                    <?php } ?>
                </div>
                <!-- mô tả -->
                <div class="row  ms-1">
                    <label for="validationCustom02" class="form-label">Mô tả<span class="text-danger">*</span></label>
                    <input placeholder="......." type="text" class="form-control pb-5" name="des"
                        aria-label="file example" />
                    <p class="text-danger"><?=isset($err['des'])?$err['des']:''?></p>
                </div>
        </div>
        <div class="my-4">
            <input type="reset" class="bg-info text-light rounded-2 border-0 p-2" value="Nhập lại">
            <input type="submit" class="bg-success text-light rounded-2 border-0 p-2" value="Thêm" name="btn-add">
        </div>

        </form>
    </div>

</div>







</div>