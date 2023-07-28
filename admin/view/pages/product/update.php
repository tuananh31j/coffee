<!-- content -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center">Chỉnh sửa sản phẩm</h3>
        <img class="object-fit-cover w-25 my-4 mx-3" src="../public/img/item11.jpg" alt="">
        <div class="">
            <!-- thêm sản phẩm -->

            <a href="index.php?url=product&act=list"
                class="bg-success p-1 px-2 rounded-2 text-light m-3 text-decoration-none">Danh sách sản
                phẩm <i class="fa-solid fa-plus"></i></a>
            <p class="text-danger m-3"><?=isset($noti)?$noti:''?></p>
        </div>
        <!-- content -->
        <div>
            <form action="index.php?url=product&act=update" class="row gap-5 align-items-center" method="post"
                enctype="multipart/form-data">
                <div class="col">
                    <!-- id -->
                    <input type="text" hidden value="<?=isset($id)?$id:''?>" name="id">
                    <!-- tên -->
                    <div class="">
                        <label for="validationCustom02" class="form-label">Tên hàng hóa</label>
                        <input type="text" class="form-control" value="<?=isset($target['name'])?$target['name']:''?>"
                            name="name" id="validationCustom02" />
                        <p class="text-danger"><?=isset($err['name'])?$err['name']:''?></p>
                    </div>
                    <!-- giảm giá -->
                    <div class="">
                        <label for="validationCustom01" class="form-label">Giảm giá %</label>
                        <input type="text" class="form-control" name="sale"
                            value="<?=isset($target['sale'])?$target['sale']:''?>" />
                        <p class="text-danger"><?=isset($err['sale'])?$err['sale']:''?></p>
                    </div>
                    <!-- ảnh hàng hóa -->
                    <div class="">
                        <label for="validationCustom02" class="form-label">Ảnh hàng hóa</label>
                        <input type="file" class="form-control" name="img" aria-label="file example" />
                        <p class="text-danger"><?=isset($err['img'])?$err['img']:''?></p>
                    </div>
                    <!-- danh mục -->
                    <div class="">
                        <label for="validationCustomUsername" class="form-label">Loại hàng</label>
                        <div class="input-group has-validation">
                            <select class="form-select" name="category" aria-label="Default select example">
                                <option value="">...Chọn Loại Hàng....</option>
                                <?php foreach($listCategory as $cate) { ?>
                                <option
                                    <?php if($target['category_id'] == $cate['category_id'] && isset($target['category_id'])){echo "selected";}else{echo '';}?>
                                    value="<?=$cate['category_id']?>">
                                    <?=$cate['name']?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <p class="text-danger"><?=isset($err['category'])?$err['category']:''?></p>
                    </div>
                </div>
                <!-- giá và size -->
                <div class="col-3">
                    <?php
                    $list = [];
                    if(isset($listProDetail)) {
                        $list = $listProDetail;
                    }else{
                        $list = $listSize;
                    }
                    foreach($listSize as $key => $size) {
                    ?>
                    <div class="">
                        <label for="size">Size <span class="text-danger fw-bold"><?=$size['name']?></span> có giá
                            là:</label>
                        <input type="text" value="<?=($size['size_id'])?>" name="details[<?=$key?>][size]">
                        <input type="text" class="form-control" name="details[<?=$key?>][price]"
                            value="<?=isset($listProDetail[$key]['price'])?$listProDetail[$key]['price']:''?>"
                            placeholder="đ" />
                        <p class="text-danger"><?=isset($err['price-'.$key])?$err['price-'.$key]:''?></p>
                    </div>
                    <?php } ?>
                </div>
                <!-- mô tả -->
                <div class="row  ms-1">
                    <label for="validationCustom02" class="form-label">Mô tả</label>
                    <input placeholder="......." type="text" value="<?=isset($target['des'])?$target['des']:''?>"
                        class="form-control pb-5" name="des" aria-label="file example" />
                    <p class="text-danger"><?=isset($err['des'])?$err['des']:''?></p>
                </div>
        </div>
        <div class="my-4">
            <input type="reset" class="bg-info text-light rounded-2 border-0 p-2" value="Nhập lại">
            <input type="submit" class="bg-success text-light rounded-2 border-0 p-2" value="Cập nhật"
                name="btn-update">
        </div>

        </form>
    </div>

</div>







</div>