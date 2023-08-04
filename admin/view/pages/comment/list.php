<!-- CONTENT -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5">Bình luận</h3>
        <div class="d-flex ">
            <!-- fillter -->
            <div class="dropdown m-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-filter"></i> Sắp xếp
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?url=comment&act=list&filter=new">Mới nhất</a></li>
                    <li><a class="dropdown-item" href="index.php?url=comment&act=list&filter=old">Cũ nhất</a></li>
                </ul>
            </div>
            <!-- tìm kiếm -->
            <div class="m-3">
                <form action="index.php?url=comment&act=list" method="post">
                    <input class="p-1 rounded-2" type="text" name="keyword" placeholder="nội dung tìm kiếm...">
                    <input type="submit" name="btn-search" value="Tìm kiếm"
                        class="p-1 border-1 text-light rounded-2 bg-black">
                    <p class="text-danger"><?=isset($errKw)?$errKw:''?></p>
                </form>
            </div>
        </div>

        <!-- content -->
        <div>
            <table class="table table-hover table-bordered text-center">
                <thead style="border: 2px solid black">
                    <tr>
                        <th>#MÃ</th>
                        <th>User</th>
                        <th>Sản phẩm</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Nội dung</th>
                        <th style="width: 170px;">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comments as $item){ ?>
                    <tr>

                        <td>#<?=isset($item['cmt_id'])?$item['cmt_id']:''?></td>
                        <td><?=isset($item['nameCus'])?$item['nameCus']:''?></td>
                        <td><?=isset($item['namePro'])?$item['namePro']:''?></td>
                        <td><?=isset($item['create_at'])?$item['create_at']:''?></td>
                        <td><?=isset($item['update_at'])?$item['update_at']:''?></td>
                        <td><?php $flag = 0; for($i = 0; $i < strlen($item['content']); $i++) {
                            echo $item['content'][$i];
                            $flag++;
                            if($flag == 15) {
                                echo " </br> ";
                                $flag = 0;
                            }
                        }?></td>
                        <td><button onclick="confirmDelete('comment&act=delete&id=<?=$item['cmt_id']?>')"
                                class="border-0 bg-danger text-light p-1 rounded-2">Xóa</button> |
                            <a href="index.php?url=comment&act=details&id=<?=$item['cmt_id']?>"
                                class="text-decoration-none bg-info text-light p-1 rounded-2">Chi tiết</a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <!-- Phân trang -->
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link border-danger"
                            href="index.php?url=comment&act=list&filter=<?php echo isset($fil)?$fil:0?>">1</a>
                    </li>
                    <?php
                               
                                $count = 1;
                                $page = 1;
                                for($i = 0; $i < sizeof($all ); $i++ ){
                                    $count++;
                                    
                                    if($count == 10) {
                                        $page +=1;
                                        $count = 0;

                                ?>
                    <li class="page-item "><a class="page-link border-danger"
                            href="index.php?url=comment&act=list&filter=<?php echo isset($fil)?$fil:0?>&pagenum=<?=$page?>">
                            <?=$page?>
                        </a>
                    </li>
                    <?php }} ?>



                </ul>
            </nav>
        </div>

    </div>
</div>