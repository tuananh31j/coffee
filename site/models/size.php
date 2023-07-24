<?php
// lấy dnah sách size
function getListSize() {
    $sql = "select * from size";
    return pdo_query($sql);
}
function getSizeName($id) {
    $sql = "select * from size where size_id = $id";
    return pdo_query_one($sql);
}
?>