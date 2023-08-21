<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr class="fw-bold text-center">
                <td>Đơn hàng</td>
                <td>Ngày</td>
                <td>Địa chỉ</td>
                <td>Trạng thái</td>
                <td>Action</td>
                <td>Chi tiết</td>
            </tr>
        </thead>
        <tbody>
            <?php if($myOrder == []){
                echo "<p class='text-center text-danger fs-3 fw-bold'>Không tìm thấy(kiểm tra lại mã đơn)!</p>";
            }else{?>
            <tr>
                <td>#<?=$myOrder['order_id']?></td>
                <td><?=$myOrder['create_at']?></td>
                <td><?=$myOrder['address']?></td>
                <?php if($myOrder['status'] == 0) {?>
                <td class="text-secondary"><i class="fa-solid fa-circle"></i> Chưa duyệt</td>
                <td><a href="index.php?url=account&act=myOrder&idCancel=<?=$myOrder['order_id']?>"><button
                            class="bg-danger text-light p-1 border-0 rounded-2 w-100">Hủy</button></a>
                </td>
                <?php }elseif($myOrder['status'] == 1){?>
                <td class="text-info"><i class="fa-solid fa-circle"></i> Đã duyệt</td>
                <td><a href=""><button class="bg-danger text-light p-1 border-0 rounded-2 w-100 opacity-25"
                            disabled>Hủy</button></a>
                </td>
                <?php }elseif($myOrder['status'] == 2){?>
                <td class="text-warning"><i class="fa-solid fa-circle"></i> Đang giao hàng</td>
                <?php if(isset($_SESSION['user'])){?>
                <td><a href="index.php?url=account&act=myOrder&idDone=<?=$myOrder['order_id']?>"><button
                            class="bg-warning text-light p-1 border-0 rounded-2  w-100">Đã
                            nhận</button></a>
                </td>
                <?php }?>
                <?php }elseif($myOrder['status'] == 3){?>
                <td class="text-success"><i class="fa-solid fa-circle"></i> Giao thành công!</td>
                <?php if(isset($_SESSION['user'])){?>
                <td><a href="index.php?url=account&act=proDetails&id=<?=$myOrder['product_id']?>"><button
                            class="bg-success text-light p-1 border-0 rounded-2 w-100">Đánh
                            giá</button></a>
                </td>
                <?php }?>
                <?php }else{?>
                <td class="text-danger"><i class="fa-solid fa-circle"></i> Đã hủy!</td>
                <?php if(isset($_SESSION['user'])){?>
                <td><button class="bg-danger text-light p-1 border-0 rounded-2 w-100"
                        onclick="confirmDelete('account&act=myOrder&idDelete=<?=$myOrder['order_id']?>')">Xóa</button>
                </td>
                <?php }?>
                <?php } ?>

                <td><a href="index.php?url=account&act=myOrder&idDetails=<?=$myOrder['order_id']?>" class="">Chi tiết
                        đơn
                        hàng</a></td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
</div>