<!-- MAIN-CONTENT -->
<div class="main-content my-5">
    <main>
        <div class="container ">
            <div class="row">
                <?php require_once "../site/view/layout/menuAccount.php" ?>
                <div class="col">
                    <div class="user-title mb-5">
                        <h2>ĐƠN HÀNG CỦA TÔI</h2>
                    </div>
                    <div class="user-list-infor">
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
                                <?php foreach($myOrder as $item){?>
                                <tr>
                                    <td>#<?=$item['order_id']?></td>
                                    <td><?=$item['create_at']?></td>
                                    <td><?=$item['address']?></td>
                                    <?php if($item['status'] == 0) {?>
                                    <td class="text-secondary"><i class="fa-solid fa-circle"></i> Chưa duyệt</td>
                                    <td><a href="index.php?url=account&act=myOrder&idCancel=<?=$item['order_id']?>"><button
                                                class="bg-danger text-light p-1 border-0 rounded-2 w-100">Hủy</button></a>
                                    </td>
                                    <?php }elseif($item['status'] == 1){?>
                                    <td class="text-info"><i class="fa-solid fa-circle"></i> Đã duyệt</td>
                                    <td><a href=""><button
                                                class="bg-danger text-light p-1 border-0 rounded-2 w-100 opacity-25"
                                                disabled>Hủy</button></a>
                                    </td>
                                    <?php }elseif($item['status'] == 2){?>
                                    <td class="text-warning"><i class="fa-solid fa-circle"></i> Đang giao hàng</td>
                                    <td><a href="index.php?url=account&act=myOrder&idDone=<?=$item['order_id']?>"><button
                                                class="bg-warning text-light p-1 border-0 rounded-2  w-100">Đã
                                                nhận</button></a>
                                    </td>
                                    <?php }elseif($item['status'] == 3){?>
                                    <td class="text-success"><i class="fa-solid fa-circle"></i> Giao thành công!</td>
                                    <td><a href="index.php?url=account&act=proDetails&id=<?=$item['product_id']?>"><button
                                                class="bg-success text-light p-1 border-0 rounded-2 w-100">Đánh
                                                giá</button></a>
                                    </td>
                                    <?php }else{?>
                                    <td class="text-danger"><i class="fa-solid fa-circle"></i> Đã hủy!</td>
                                    <td><button class="bg-danger text-light p-1 border-0 rounded-2 w-100"
                                            onclick="confirmDelete('account&act=myOrder&idDelete=<?=$item['order_id']?>')">Xóa</button>
                                    </td>
                                    <?php } ?>

                                    <td><a href="index.php?url=account&act=myOrder&idDetails=<?=$item['order_id']?>"
                                            class="">Chi tiết đơn hàng</a></td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>