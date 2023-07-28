<!-- CONTENT -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5">Danh mục</h3>
        <div class="d-flex ">
            <!-- thêm danh mục -->

            <a href="index.php?url=category&act=add"
                class="text-decoration-none bg-success p-1 px-2 rounded-2 text-light m-3">Thêm danh
                mục <i class="fa-solid fa-plus"></i></a>
            <!-- fillter -->
            <div class="dropdown m-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-filter"></i> Sắp xếp
                </button>
                <ul class="dropdown-menu">
                    <!-- sắp xếp list -->
                    <li><a class="dropdown-item" href="index.php?url=category&act=list&filter=az">A->Z</a></li>
                    <li><a class="dropdown-item" href="index.php?url=category&act=list&filter=za">Z->A</a></li>
                    <li><a class="dropdown-item" href="index.php?url=category&act=list&filter=new">Mới nhất</a></li>
                    <li><a class="dropdown-item" href="index.php?url=category&act=list&filter=old">Cũ nhất</a></li>
                </ul>
            </div>
            <!-- tìm kiếm -->
            <div class="m-3">
                <form action="index.php?url=category&act=list" method="post">
                    <input class="p-1 rounded-2" type="text" name="keyword" placeholder="nội dung tìm kiếm...">
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
                        <th>Tên danh mục</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        foreach ($categorys as $category) {?>
                    <tr>
                        <td><?=$category['category_id']?></td>
                        <td><?=$category['name']?></td>
                        <td>
                            <a href="index.php?url=category&act=delete&id=<?=$category['category_id']?>"
                                class="bg-danger text-light p-1 rounded-2">Xóa</a>
                            <a href="index.php?url=category&act=update&id=<?=$category['category_id']?>"
                                class="bg-info text-light p-1 rounded-2">Sửa</a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>




</div>