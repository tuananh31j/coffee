<!-- CONTENT -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5 tw-font-semibold tw-text-lg">DANH SÁCH DANH MỤC</h3>
        <div class="d-flex ">
            <!-- thêm danh mục -->

            <a href="index.php?url=category&act=add" class="text-decoration-none h-25 bg-success p-1 px-2 rounded-2 text-light m-3">Thêm danh
                mục <i class="fa-solid fa-plus"></i></a>
            <!-- fillter -->
            <div>
                <div class="dropdown m-3">
                    <a class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-filter"></i> Sắp xếp
                    </a>
                    <ul class="dropdown-menu">
                        <!-- sắp xếp list -->
                        <li><a class="dropdown-item" href="index.php?url=category&act=list&filter=az">A->Z</a></li>
                        <li><a class="dropdown-item" href="index.php?url=category&act=list&filter=za">Z->A</a></li>
                        <li><a class="dropdown-item" href="index.php?url=category&act=list&filter=new">Mới nhất</a></li>
                        <li><a class="dropdown-item" href="index.php?url=category&act=list&filter=old">Cũ nhất</a></li>
                    </ul>
                </div>
            </div>
            <!-- tìm kiếm -->
            <div class="m-3">
                <form action="index.php?url=category&act=list" method="post">
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
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($categorys as $key => $category) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $category['name'] ?></td>
                            <td>
                                <button onclick="confirmDelete('category&act=delete&id=<?= $category['category_id'] ?>')" class="border-0 bg-danger text-light p-1 rounded-2">Xóa</button>
                                <a href="index.php?url=category&act=update&id=<?= $category['category_id'] ?>" class="bg-info text-light p-1 rounded-2">Sửa</a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>




</div>