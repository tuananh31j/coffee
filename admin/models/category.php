<?php

function getListCategory() {
    $sql = "select * from category where status = 1";
    return pdo_query($sql);
}
//hàm thêm danh mục
function addCategory($name) {
    $sql = "insert into category (name) values('$name')";
    pdo_execute($sql);
}

function loadOne($category_id){
    $sql="select * from category where category_id=".$category_id;
    $catego=pdo_query_one($sql);
    return $catego;
}

function search_category($keyword) {
    $sql="select * from category where ";
    return pdo_query($sql);
}
// xóa mềm
function deleteCate($id) {
    $sql="update category set status = 0 where category_id= $id";
    pdo_execute($sql);
}
// chỉnh sửa
function updateCate($name, $id) {
    $sql="update category set name = $name where category_id= $id";
    pdo_execute($sql);
}
// lấy ra 1 danh mục
function getCategory($id) {
    $sql = "select * from category where category_id =$id and status = 1";
    return pdo_query_one($sql);
}
?>