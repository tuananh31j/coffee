<?php
// danh sách danh mục
function getListCategory() {
    $sql = "select * from category where status = 1";
    return pdo_query($sql);
}
?>