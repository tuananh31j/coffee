 <!-- CONTENT -->
 <div class=" col ">
     <div class="container">
         <h3 class="text-center my-5 tw-font-semibold tw-text-lg">DANH SÁCH KHÁCH HÀNG</h3>
         <div class="d-flex ">
             <!-- thêm sản phẩm -->

             <a href="index.php?url=customer&act=add" class="bg-success h-25 p-1 px-2 rounded-2 text-light m-3 text-decoration-none">Thêm khách
                 hàng <i class="fa-solid fa-plus"></i></a>

             <!-- fillter -->
             <div class="dropdown m-3">
                 <button class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa-solid fa-filter"></i> Sắp xếp
                 </button>
                 <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="index.php?url=customer&act=list&filter=az">A->Z</a></li>
                     <li><a class="dropdown-item" href="index.php?url=customer&act=list&filter=za">Z->A</a></li>
                     <li><a class="dropdown-item" href="index.php?url=customer&act=list&filter=new">Mới nhất</a></li>
                     <li><a class="dropdown-item" href="index.php?url=customer&act=list&filter=old">Cũ nhất</a></li>


                 </ul>
             </div>
             <!-- tìm kiếm -->
             <div class="m-3">
                 <form action="index.php?url=customer&act=list" method="post">
                     <input class="p-1 rounded-2 tw-border-2" type="text" name="keyword" placeholder="nội dung tìm kiếm...">
                     <input type="submit" name="btn-search" value="Tìm kiếm" class="p-1 border-1 text-light rounded-2 bg-black">
                     <p class="text-danger"><?= isset($errKw) ? $errKw : '' ?></p>
                 </form>
             </div>
         </div>

         <!-- content -->
         <div>
             <table class="table table-hover table-bordered text-center">
                 <thead style="border: 2px solid black">
                     <tr style="font-size: 14px;">
                         <th>STT</th>
                         <th>Ảnh</th>
                         <th style="width: 200px">Họ tên</th>
                         <!-- số điện thoại -->
                         <th><i class="fa-solid fa-phone"></i></th>
                         <!-- email -->
                         <th><i class="fa-solid fa-envelope"></i></th>
                         <!-- address -->
                         <th><i class="fa-solid fa-location-dot"></i></th>
                         <th style="width:380px">Ngày tạo</th>
                         <th style="width:200px">Ngày sửa</th>
                         <th>Mật khẩu</th>
                         <th>Vai trò</th>
                         <th style="width: 900px;">Chức năng</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php foreach ($customers as $key => $item) { ?>
                         <tr>
                             <td><?= $key + 1 ?></td>
                             <td style="width: 60px;"><img class="w-100" src="<?= $IMAGE . '/' . $item['image_url'] ?>" alt="">
                             </td>
                             <td><?= $item['name'] ?></td>
                             <td><?= $item['phone'] ?></td>
                             <td><?php $flag = 0;
                                    for ($i = 0; $i < strlen($item['email']); $i++) {
                                        echo $item['email'][$i];
                                        if ($item['email'][$i] === '@' || $item['email'][$i] === '.') {
                                            echo " </br> ";
                                        }
                                    } ?></td>
                             <td><?php $flag = 0;
                                    for ($i = 0; $i < strlen($item['address']); $i++) {
                                        echo $item['address'][$i];
                                        if ($item['address'][$i] === ',' || $item['address'][$i] === '.') {
                                            echo " </br> ";
                                        }
                                    } ?></td>
                             <td><?= $item['create_at'] ?></td>
                             <td><?= isset($item['update_at']) ? $item['update_at'] : '' ?></td>
                             <td><?= $item['pass'] ?></td>
                             <td><?= ($item['role'] == 0) ? '<span class="text-success">User</span>' : '<span class="text-danger">Admin</span>' ?>
                             </td>
                             <td>
                                 <!-- <button onclick="confirmDelete('customer&act=delete&id=<?= $item['customer_id'] ?>')"
                                 class="border-0 bg-danger text-light p-1 rounded-2">Xóa</button> -->
                                 <a href="index.php?url=customer&act=update&id=<?= $item['customer_id'] ?>" class="bg-info text-light p-1 rounded-2 text-decoration-none">Sửa</a>
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
                     <li class="page-item"><a class="page-link border-danger" href="index.php?url=customer&act=list&filter=<?php echo isset($fil) ? $fil : 0 ?>">1</a>
                     </li>
                     <?php

                        $count = 1;
                        $page = 1;
                        for ($i = 0; $i < sizeof($all); $i++) {
                            $count++;

                            if ($count == 8) {
                                $page += 1;
                                $count = 0;

                        ?>
                             <li class="page-item "><a class="page-link border-danger" href="index.php?url=customer&act=list&filter=<?php echo isset($fil) ? $fil : 0 ?>&pagenum=<?= $page ?>">
                                     <?= $page ?>
                                 </a>
                             </li>
                     <?php }
                        } ?>



                 </ul>
             </nav>
         </div>

     </div>
 </div>