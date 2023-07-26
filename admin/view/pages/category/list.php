<!-- CONTENT -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5">Danh mục</h3>
        <div class="d-flex ">
            <!-- thêm danh mục -->

            <a href="index.php?url=add_categories"
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
                    <li><a class="dropdown-item" href="index.php?url=tangdan">A->Z</a></li>
                    <li><a class="dropdown-item" href="index.php?url=giamdan">Z->A</a></li>
                </ul>
            </div>
            <!-- tìm kiếm -->
            <div class="m-3">
                <form action="index.php?url=list_category" method="post">
                    <input class="p-1 rounded-2" type="text" name="keyword" placeholder="nội dung tìm kiếm...">
                    <input type="submit" name="btn-search" name="search" value="Tìm kiếm"
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
                    <?php
                                    foreach ($cate as $category) {
                                        extract($category);
                                        $update_cate="index.php?url=category-update&category_id=".$category_id;
                                        $delete_cate="index.php?url=category-delete&category_id=".$category_id;
                                        echo '
                                        <tr>
                                        <td>'.$category_id.'</td>
                                        <td>'.$name.'</td>
                                        <td>
                                            <a href="'.$delete_cate.'" class="bg-danger text-light p-1 rounded-2">Xóa</a>
                                            <a href="'.$update_cate.'" class="bg-info text-light p-1 rounded-2">Sửa</a>
                                        </td>
                                        </tr>';
                                    }
                                ?>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>




</div>