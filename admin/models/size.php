<?php
function getListSize() {
    $sql = "select * from size where status = 1";
    return pdo_query($sql);
}
// xóa size
function deleteSize($id) {
    $sql = "update size set status = 0 where size_id = ?";
    pdo_execute($sql,$id);
}
// update
function updateSize($id) {
    $sql = "update size set status = 1 where size_id = ?";
    pdo_execute($sql,$id);
}
// danh sách khôi phục
function getListResetSize() {
    $sql = "select * from size where status = 0";
    return pdo_query($sql);
}
//thêm size
function addSize($name) {
    $sql = "insert into size (name) values(?)";
    pdo_execute($sql,$name);
}
function getSizeName($id) {
    $sql = "select * from size where size_id = $id";
    return pdo_query_one($sql);
}
?>