<!-- CONTENT -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5 tw-font-semibold tw-text-lg">DANH SÁCH BANNER</h3>


        <!-- content -->
        <div>
            <table class="table table-hover table-bordered text-center">
                <thead style="border: 2px solid black">
                    <tr>
                        <th>STT</th>
                        <th>Trang</th>
                        <th>Tên banner</th>
                        <th>Ảnh</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($banners as $key => $banner) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?php if ($banner['page'] == 1) {
                                    echo "Trang chủ";
                                } elseif ($banner['page'] == 2) {
                                    echo "Cửa hàng";
                                } elseif ($banner['page'] == 3) {
                                    echo "Trang sản phẩm";
                                } elseif ($banner['page'] == 4) {
                                    echo "Trang liên hệ";
                                } elseif ($banner['page'] == 5) {
                                    echo "Trang giới thiệu";
                                } ?></td>
                            <td><?php if ($banner['name'] == '') {
                                    echo "Đang cập nhật";
                                } else {
                                    echo $banner['name'];
                                } ?></td>
                            <td>
                                <?php if ($banner['banner_url'] == null) {
                                    echo "Đang cập nhật";
                                } else { ?>
                                    <div class="item  tw-w-40 tw-h-16 tw-border-2 tw-border-gray-700 "><img class=" tw-border  tw-object-cover h-100 w-100" src="<?= $IMAGE . '/' . $banner['banner_url'] ?>" alt=""></div>
                                <?php } ?>
                            </td>
                            <td><?= $banner['create_at'] ?></td>
                            <td><?= $banner['update_at'] ?></td>
                            <td>

                                <a href="index.php?url=banner&act=update&id=<?= $banner['banner_id'] ?>" class="bg-info text-light p-1 rounded-2 hover:tw-opacity-75">Sửa</a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>




</div>