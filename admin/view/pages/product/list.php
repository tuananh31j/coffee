<!-- content -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center">Sản phẩm</h3>
        <div class="d-flex ">
            <!-- thêm sản phẩm -->

            <a href="index.php?url=product&act=add"
                class="bg-success p-1 px-2 rounded-2 text-light m-3 text-decoration-none">Thêm sản
                phẩm <i class="fa-solid fa-plus"></i></a>

            <!-- fillter -->
            <div class="dropdown m-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-filter"></i> Sắp xếp
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">A->Z</a></li>
                    <li><a class="dropdown-item" href="#">Z->A</a></li>
                    <li><a class="dropdown-item" href="#">Mới nhất</a></li>
                    <li><a class="dropdown-item" href="#">Cũ nhất</a></li>
                    <li><a class="dropdown-item" href="#">Lượt xem <i class="fa-solid fa-arrow-up"></i></a>
                    </li>
                    <li><a class="dropdown-item" href="#">Lượt thích <i class="fa-solid fa-arrow-up"></i></a></li>
                    <li><a class="dropdown-item" href="#">Số đơn hàng <i class="fa-solid fa-arrow-up"></i></a></li>

                    <li><a class="dropdown-item" href="#">Lượt xem <i class="fa-solid fa-arrow-down"></i></a>
                    </li>
                    <li><a class="dropdown-item" href="#">Lượt thích <i class="fa-solid fa-arrow-down"></i></a></li>
                    <li><a class="dropdown-item" href="#">Số đơn hàng <i class="fa-solid fa-arrow-down"></i></a></li>


                </ul>
            </div>
            <!-- tìm kiếm -->
            <div class="m-3">
                <form action="" method="post">
                    <input class="p-1 rounded-2" type="text" name="search" placeholder="nội dung tìm kiếm...">
                    <input type="submit" name="btn-search" value="Tìm kiếm"
                        class="p-1 border-1 text-light rounded-2 bg-black">
                </form>
            </div>
        </div>

        <!-- content -->
        <div>
            <table class="table table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th>#MÃ</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>

                        <th><i class="fa-sharp fa-solid fa-eye"></i></th>

                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>$</th>
                        <th>Sale<i class="fa-solid fa-percent"></i></th>
                        <th style="width: 100px;">Chức năng</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($products as $pro){ ?>
                    <tr>

                        <td><?php $flag = 0; for($i = 0; $i < strlen($pro['product_id']); $i++) {
                            echo $pro['product_id'][$i];
                            $flag++;
                            if($flag == 10) {
                                echo " </br> ";
                                $flag = 0;
                            }
                        }?></td>
                        <td style="width: 60px;"><img class="w-100" src="<?=$IMAGE.'/'.$pro['image_url']?>" alt=""></td>
                        <td><?=$pro['name']?></td>
                        <td><?php $flag = 0; for($i = 0; $i < strlen($pro['des']); $i++) {
                            echo $pro['des'][$i];
                            $flag++;
                            if($flag == 15) {
                                echo " </br> ";
                                $flag = 0;
                            }
                        }?></td>
                        <td><?=$pro['view']?></td>
                        <td><?=$pro['create_at']?></td>
                        <td><?=$pro['update_at']?></td>
                        <td><?=$pro['price']?></td>
                        <td><?=$pro['sale']?></td>

                        <td><a href="index.php?url=product&act=delete&id=<?=$pro['product_id']?>"
                                class="bg-danger text-light p-1 rounded-2">Xóa</a> |
                            <a href="index.php?url=product&act=update&id=<?=$pro['product_id']?>"
                                class="bg-info text-light p-1 rounded-2">Sửa</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>







</div>