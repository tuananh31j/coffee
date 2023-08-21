<?php
function getListCategory() {
    $sql = "select * from category where status = 1";
    return pdo_query($sql);
}
function getListCategoryBy($kw, $fil) {
    $keyword = 1;
    $filter = "order by category.name desc";

    if ($fil == "az" && $fil != 0) {
        $filter = "order by category.name asc";
    }
    if ($fil == "za" && $fil != 0) {
        $filter = "order by category.name desc";
    }
    if ($fil == "new" && $fil != 0) {
        $filter = "order by category.category_id desc";
    }
    if ($fil == "old" && $fil != 0) {
        $filter = "order by category.category_id asc";
    }
    if ($kw != 0 && $kw != '') {
        $keyword = "category.name like '%$kw%' or category.name like '$kw%' or category.name like '%$kw'";
    }
    $sql = "select * from category where $keyword and status = 1 $filter";
    return pdo_query($sql);
}
//hàm thêm danh mục
function addCategory($name) {
    $sql = "insert into category (name) values('$name')";
    pdo_execute($sql);
}


// xóa mềm
function deleteCate($id) {
    $sql="update category set status = 0 where category_id= $id";
    pdo_execute($sql);
}
// chỉnh sửa
function updateCate($name, $id) {
    $sql="UPDATE `category` SET `name` = ? WHERE `category`.`category_id` = ?";
    pdo_execute($sql,$name,$id);
    
}
// lấy ra 1 danh mục
function getCategoryById($id) {
    $sql = "select * from category where category_id = ? and status = 1";
    return pdo_query_one($sql, $id);
}
?>