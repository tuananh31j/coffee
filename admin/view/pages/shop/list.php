<!-- CONTENT -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5">CỬA HÀNG</h3>
        <div class="d-flex ">
            <!-- thêm danh mục -->

            <a href="index.php?url=shop&act=add"
                class="text-decoration-none h-25 bg-success p-1 px-2 rounded-2 text-light m-3">Thêm địa chỉ <i
                    class="fa-solid fa-plus"></i></a>
            <!-- fillter -->
            <div class="dropdown m-3">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-filter"></i> Sắp xếp theo
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?url=shop&act=list">Mới
                            nhất</a></li>
                    <li><a class="dropdown-item" href="index.php?url=shop&act=list&sort=old">Cũ
                            nhất</a></li>


                </ul>
            </div>
            <!-- tìm kiếm -->
            <div class="m-3">
                <form action="index.php?url=shop&act=list&sort=<?=isset($sort)?$sort:0?>" method="post">
                    <input class="p-1 rounded-2" type="search" name="keyword" placeholder="nhập tên...">
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
                        <th>STT</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Link</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        foreach ($list as $key => $item) {?>
                    <tr>
                        <td><?=$key + 1?></td>
                        <td><?=$item['address']?></td>
                        <td><?=$item['phone']?></td>
                        <td><a target="_blank" href="<?=$item['link']?>">Xem địa chỉ</a></td>

                        <td>

                            <a href="index.php?url=shop&act=update&id=<?=$item['address_id']?>"
                                class="bg-info text-light p-1 rounded-2">Sửa</a>
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
                    <li class="page-item"><a class="page-link border-danger" href="index.php?url=shop&act=list">1</a>
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
                            href="index.php?url=shop&act=list&pagenum=<?=$page?>">
                            <?=$page?>
                        </a>
                    </li>
                    <?php }} ?>



                </ul>
            </nav>
        </div>
    </div>




</div>