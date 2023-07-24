<?php
//hàm thêm danh mục
function addCategory($name) {
    $sql = "insert into category (name) values('$name')";
    pdo_execute($sql);
}
?>