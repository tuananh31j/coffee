<!-- CONTENT -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5">KÍCH CỠ</h3>

        <!-- thêm size -->

        <a href="index.php?url=size&act=add"
            class="text-decoration-none h-25 bg-success p-1 px-2 rounded-2 text-light m-3">Thêm size <i
                class="fa-solid fa-plus"></i></a>
        <a href="index.php?url=size&act=update"
            class="text-decoration-none h-25 bg-secondary p-1 px-2 rounded-2 text-light m-3">Khôi phục<i
                class="fa-solid fa-plus"></i></a>
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
                        foreach ($list as $key => $size) {?>
                    <tr>
                        <td><?=$key + 1?></td>
                        <td><?=$size['name']?></td>
                        <td>
                            <?php if($size['size_id'] == 1){ ?>
                            <button onclick="swal('Không thể xóa size mặc định!')"
                                class="border-0 bg-danger text-light p-1 rounded-2">Xóa</button>
                            <?php }else{ ?>
                            <button onclick="confirmDelete('size&act=delete&id=<?=$size['size_id']?>')"
                                class="border-0 bg-danger text-light p-1 rounded-2">Xóa</button>
                            <?php }?>

                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>






    </div>