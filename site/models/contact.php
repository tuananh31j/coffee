<?php
// thêm liên hệ
function addContact($name,$phone,$email,$content) {
    $sql = "insert into contact (name,phone,email,content) values(?,?,?,?)";
    pdo_execute($sql,$name,$phone,$email,$content);
}
?>