<!-- CONTENT -->
<div class="col">
    <div class="container">
        <h3 class="text-center my-5 tw-font-semibold tw-text-lg">CHỈNH SỬA BANNER <?php if ($target['page'] == 1) {
                                                                                        echo "TRANG CHỦ";
                                                                                    } elseif ($target['page'] == 2) {
                                                                                        echo "TRANG CỬA HÀNG";
                                                                                    } elseif ($target['page'] == 3) {
                                                                                        echo "TRANG SẢN PHẨM";
                                                                                    } elseif ($target['page'] == 4) {
                                                                                        echo "TRANG LIÊN HỆ";
                                                                                    } elseif ($target['page'] == 5) {
                                                                                        echo "TRANG GIỚI THIỆU";
                                                                                    } ?></h3>


        <div><a href="index.php?url=banner&act=list" class="bg-success p-1 px-2 rounded-2 text-light mb-3 text-decoration-none">Danh sách banner</a></div>
        <!-- content -->
        <div class="wrapper" style="margin-top: 20px; width: 100%">
            <p class="text-success"><?= isset($noti) ? $noti : '' ?></p>
            <form action="" method="post" enctype="multipart/form-data" class=" gap-5 align-items-center">
                <input type="text" name="id" value="<?= $target['banner_id'] ?>" hidden>
                <!-- page -->
                <div class="" hidden>
                    <input type="text" class="form-control tw-border-2 tw-border-gray-600" value="<?= $target['page'] ?>" name="page" id="validationCustom02" />
                </div>
                <div class="row">
                    <!-- tên banner -->
                    <div class="col">
                        <label for="validationCustom02" class="form-label">Tên banner<span class="text-danger">*</span></label>
                        <input type="text" value="<?= $target['name'] ?>" class="form-control tw-border-2 tw-border-gray-600" name="name" id="validationCustom02" />
                        <p class="text-danger"><?= isset($err['name']) ? $err['name'] : '' ?></p>
                    </div>
                    <!-- link đến sản phẩm -->
                    <div class="col">
                        <label for="validationCustom02" class="form-label">Link đến sản phẩm<span class="text-danger">*</span></label><br>
                        <select name="pro" class="tw-border-2 tw-border-gray-600 tw-py-[7px] tw-rounded-lg" id="">
                            <option class="tw-border-gray-600" value="">---Chọn sản phẩm---</option>
                            <?php foreach ($listPro as $item) { ?>
                                <option value="<?= $item['product_id'] ?>" <?php if ($item['product_id'] == $target['product_id']) {
                                                                                echo "selected";
                                                                            } ?>><?= $item['name'] ?></option>
                            <?php } ?>
                        </select>
                        <p class="text-danger"><?= isset($err['pro']) ? $err['pro'] : '' ?></p>
                    </div>


                </div>
                <!-- ảnh -->
                <div class="">
                    <label for="validationCustom02" class="form-label">Ảnh<span class="text-danger">*</span></label>
                    <input type="file" class="form-control tw-border-2 tw-border-gray-600" name="img" id="validationCustom02" />
                    <p class="text-danger"><?= isset($err['img']) ? $err['img'] : '' ?></p>
                </div>
                <div class="my-4">
                    <input type="reset" class="bg-info text-light rounded-2 border-0 p-2" value="Nhập lại">
                    <input type="submit" class="bg-success text-light rounded-2 border-0 p-2" value="Cập nhật" name="btn-update">
                </div>

            </form>

        </div>
    </div>


</div>
</div>
</div>