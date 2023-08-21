<!-- CONTENT -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5">DANH SÁCH ĐƠN HÀNG</h3>
        <div class="d-flex">
            <!-- fillter -->
            <div class="dropdown m-3">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-filter"></i> Sắp xếp theo
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item"
                            href="index.php?url=order&act=list&filter=<?=isset($filter)?$filter:''?>">Mới
                            nhất</a></li>
                    <li><a class="dropdown-item"
                            href="index.php?url=order&act=list&sort=old&filter=<?=isset($filter)?$filter:''?>">Cũ
                            nhất</a></li>
                    <li><a class="dropdown-item"
                            href="index.php?url=order&act=list&sort=<?=isset($sort)?$sort:0?>&filter=0">Chưa
                            xác nhận</a></li>
                    <li><a class="dropdown-item"
                            href="index.php?url=order&act=list&sort=<?=isset($sort)?$sort:0?>&filter=1">Đã
                            xác
                            nhận</a></li>
                    <li><a class="dropdown-item"
                            href="index.php?url=order&act=list&sort=<?=isset($sort)?$sort:0?>&filter=2">Đang
                            giao hàng</a></li>
                    <li><a class="dropdown-item"
                            href="index.php?url=order&act=list&sort=<?=isset($sort)?$sort:0?>&filter=3">Giao
                            hàng thành công</a></li>
                    <li><a class="dropdown-item"
                            href="index.php?url=order&act=list&sort=<?=isset($sort)?$sort:0?>&filter=4">Đã
                            hủy</a></li>

                </ul>
            </div>
            <!-- tìm kiếm -->
            <div class="m-3">
                <form
                    action="index.php?url=order&act=list&filter=<?=isset($filter)?$filter:0?>&sort=<?=isset($sort)?$sort:0?>"
                    method="post">
                    <input class="p-1 rounded-2" type="search" name="keyword" placeholder="nhập tên...">
                    <input type="submit" name="btn-search" value="Tìm kiếm"
                        class="p-1 border-1 text-light rounded-2 bg-black">
                    <p class="text-danger"><?=isset($errKw)?$errKw:''?></p>
                </form>
            </div>
        </div>


        <!-- list đơn hàng -->
        <div>
            <?php
            foreach($listOrder as $key => $item){
            ?>
            <div class="row p-3 m-3 rounded-2 " style="box-shadow: 5px 5px 10px;">
                <div class="col">
                    <p class=" text-secondary" style="font-size: 12px;">Thời gian: <span><?=$item['create_at']?></span>
                    </p>
                    <p>Mã đơn: #<?=$item['order_id']?> (<a
                            href="index.php?url=order&act=update&id=<?=$item['order_id']?>">Chi tiết </a>)</p>
                    <!-- sản phẩm -->
                    <p>Trạng thái: <?php 
                    if($item['status'] == 0){
                        echo '<span class="text-secondary fw-bold">Chưa xác nhận</span>';
                    }elseif($item['status'] == 1){
                        echo '<span class="text-info fw-bold">Đã xác nhận</span>';
                    }elseif($item['status'] == 2){
                        echo '<span class="text-warning fw-bold">Đang giao hàng</span>';
                    }elseif($item['status'] == 3){
                        echo '<span class="text-success fw-bold">Giao thành công</span>';
                    }else{
                        echo '<span class="text-danger fw-bold">Đã hủy</span>';
                    }
                     ?></p>
                    <form
                        action="index.php?url=order&act=list&filter=<?=isset($fil)?$fil:0?>&sort=<?=isset($sort)?$sort:0?>"
                        method="post">
                        <!-- id đơn hàng -->
                        <input type="text" name="id-<?=$key?>" value="<?=$item['order_id']?>" hidden>
                        <select name="status-<?=$key?>" id="" class="p-1 border rounded-2">
                            <option value="">Trạng thái</option>
                            <option value="0">Chưa xác nhận</option>
                            <option value="1">Xác nhận</option>
                            <option value="2">Đang giao hàng</option>
                            <option value="3">Giao thành công</option>
                            <option value="4">Hủy</option>

                        </select>
                        <p class="text-danger"><?=isset($err[$key])?$err[$key]:''?></p>
                        <input type="submit" name="btn-update-<?=$key?>" class="btn border-0 p-1 bg-black text-light"
                            value="Cập nhật">
                    </form>
                </div>

                <div class="col">
                    <h4 class="text-success">Đơn hàng</h4>
                    <div>
                        <ul>
                            <?php 
                            $total = 0;
                            foreach(getListDetails($item['order_id']) as $details){
                                $total += $details['total_price'];
                                 ?>
                            <li style="font-size: 14px;"><span class="fw-medium"><?=$details['namePro']?></span><span>
                                    (x<?=$details['quantity']?>)</span></li>
                            <?php } ?>
                            <li><span class="fw-medium">Tổng: </span><?php echo number_format($total,0,',','.')?><span
                                    class="text-decoration-underline">đ</span></li>
                        </ul>
                    </div>
                </div>

                <!-- thông tin người mua -->
                <div class="col">
                    <h4 class="text-success">Thông tin nhận hàng</h4>
                    <div>
                        <ul>
                            <li>Họ tên: <span><?=$item['customer_name']?></span></li>
                            <li>Số điện thoại: <span><?=$item['phone']?></span></li>
                            <li>Email: <span><?=$item['email']?></span></li>
                            <li>Địa chỉ: <span><?=$item['address']?></span></li>
                        </ul>
                    </div>
                    <p class=" text-secondary d-inline"
                        style="font-size: 12px; position:relative; top: 15px; left: 80px;">
                        Ngày cập nhật:
                        <span><?=isset($item['update_at'])?$item['update_at']:''?></span>
                    </p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- Phân trang -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link border-danger"
                        href="index.php?url=order&act=list&filter=<?php echo isset($fil)?$fil:0?>">1</a>
                </li>
                <?php
                               
                                $count = 1;
                                $page = 1;
                                for($i = 0; $i < sizeof($all ); $i++ ){
                                    $count++;
                                    
                                    if($count == 8) {
                                        $page +=1;
                                        $count = 0;

                                ?>
                <li class="page-item "><a class="page-link border-danger"
                        href="index.php?url=order&act=list&filter=<?php echo isset($fil)?$fil:0?>&pagenum=<?=$page?>">
                        <?=$page?>
                    </a>
                </li>
                <?php }} ?>



            </ul>
        </nav>
    </div>
</div>