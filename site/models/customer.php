<?php
// đăng nhập
function checkLogin($email, $pass) {
    $sql = "select * from customer where email = ? and pass = ?";
    return pdo_query_one($sql,$email,$pass);
}
?>