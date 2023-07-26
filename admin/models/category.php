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

function deleteCategory($category_id) {
    $sql=" delete from category where category_id=".$category_id;
    pdo_execute($sql);
}

function loadAll() {
    $sql="select * from category order by category_id";
    $cate=pdo_query($sql);
    return $cate;
}

function loadOne($category_id){
    $sql="select * from category where category_id=".$category_id;
    $catego=pdo_query_one($sql);
    return $catego;
}

function search_category($keyword, $name) {
    $sql="select * from category where ";

}
?>