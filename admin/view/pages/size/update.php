<!-- CONTENT -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5 tw-font-semibold tw-text-lg">DANH SÁCH KÍCH CỠ ĐÃ XÓA</h3>

        <!-- thêm size -->

        <a href="index.php?url=size&act=list" class="text-decoration-none h-25 bg-success p-1 px-2 rounded-2 text-light m-3">Danh sách<i class="fa-solid fa-plus"></i></a>

        <!-- content -->
        <div class="mt-5">
            <table class="table table-hover table-bordered text-center">
                <thead style="border: 2px solid black">
                    <tr>
                        <th>STT</th>
                        <th>Tên size</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($list as $key => $size) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $size['name'] ?></td>
                            <td>

                                <a href="index.php?url=size&act=update&id=<?= $size['size_id'] ?>" onclick='alert("Đã khôi phục!")' class="border-0 bg-secondary text-light p-1 rounded-2">Khôi phục</a>


                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>






    </div>