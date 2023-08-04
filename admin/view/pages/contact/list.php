<!-- CONTENT -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5">Thư liên hệ</h3>
        <!-- fillter -->
        <div class="d-flex">
            <div class="dropdown m-3">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-filter"></i> Sắp xếp theo
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?url=contact&filter=<?=isset($filter)?$filter:0?>">Mới
                            nhất</a></li>
                    <li><a class="dropdown-item"
                            href="index.php?url=contact&sort=old&filter=<?=isset($filter)?$filter:0?>">Cũ
                            nhất</a></li>
                    <li><a class="dropdown-item"
                            href="index.php?url=contact&sort=<?=isset($sort)?$sort:0?>&filter=done">Đã
                            xử lý</a></li>
                    <li><a class="dropdown-item"
                            href="index.php?url=contact&sort=<?=isset($sort)?$sort:0?>&filter=yet">chưa
                            xử lý</a></li>
                </ul>
            </div>
            <!-- tìm kiếm -->
            <div class="m-3">
                <form action="index.php?url=contact&filter=<?=isset($filter)?$filter:0?>&sort=<?=isset($sort)?$sort:0?>"
                    method="post">
                    <input class="p-1 rounded-2" type="search" name="keyword" placeholder="nhập tên...">
                    <input type="submit" name="btn-search" value="Tìm kiếm"
                        class="p-1 border-1 text-light rounded-2 bg-black">
                    <p class="text-danger"><?=isset($errKw)?$errKw:''?></p>
                </form>
            </div>
        </div>

        <!-- item -->
        <?php foreach($listContact as $key => $item){ ?>

        <div class="row p-3 m-3 rounded-2" style="box-shadow: 5px 5px 10px;">
            <div class="col">
                <p class=" text-secondary" style="font-size: 12px;">Thời gian:
                    <span><?=isset($item['create_at'])?$item['create_at']:''?></span>
                </p>
                <button onclick="confirmDelete('contact&act=delete&id=<?=$item['contact_id']?>')"
                    class="bg-danger border-0 text-light p-1 rounded-2">Xóa</button>
                <p>Trạng thái: <?php if(isset($item['status'])){
                             if($item['status'] == 0){
                                echo "<span class='text-danger fw-bold'>Chưa xử lý</span>";
                                }else{
                                    echo "<span class='text-success fw-bold'>Đã xử lý</span>";
                                    }} ?>
                </p>
                <form action="index.php?url=contact&filter=<?=isset($filter)?$filter:0?>&sort=<?=isset($sort)?$sort:0?>"
                    method="post">
                    <!-- id Liên hệ -->
                    <input type="text" name="id-<?=$key?>" value="<?=$item['contact_id']?>" hidden>
                    <select name="status-<?=$key?>" id="" class="p-1 border rounded-2">
                        <option value="">Trạng thái</option>
                        <option value="0">Chưa xử lý</option>
                        <option value="1">Đã xử lý</option>
                    </select>
                    <p class="text-danger"><?=isset($err[$key])?$err[$key]:''?></p>
                    <input type="submit" name="btn-update-<?=$key?>" class="btn border-0 p-1 bg-black text-light"
                        value="Cập nhật">
                </form>
            </div>
            <div class="col">
                <h4 class="text-success">Nội dung</h4>
                <div>
                    <p><?=isset($item['content'])?$item['content']:''?></p>
                </div>
            </div>
            <!-- thông tin người gửi -->
            <div class="col">
                <h4 class="text-success">Thông tin người gửi</h4>
                <div>
                    <ul>
                        <li>Họ tên: <span><?=isset($item['name'])?$item['name']:''?></span></li>
                        <li>Số điện thoại: <span><?=isset($item['phone'])?$item['phone']:''?></span></li>
                        <li>Email: <span><?=isset($item['email'])?$item['email']:''?></span></li>
                    </ul>
                </div>
                <p class=" text-secondary d-inline" style="font-size: 12px; position:relative; top: 15px; left: 80px;">
                    Ngày cập nhật:
                    <span><?=isset($item['update_at'])?$item['update_at']:''?></span>
                </p>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- Phân trang -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link border-danger"
                        href="index.php?url=contact&act=list&filter=<?php echo isset($filter)?$filter:0?>">1</a>
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
                        href="index.php?url=contact&act=list&filter=<?php echo isset($filter)?$filter:0?>&pagenum=<?=$page?>">
                        <?=$page?>
                    </a>
                </li>
                <?php }} ?>



            </ul>
        </nav>
    </div>
</div>