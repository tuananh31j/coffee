<?php
// đăng nhập
function checkLogin($email, $pass) {
    $sql = "select * from customer where email = ? and pass = ?";
    return pdo_query_one($sql,$email,$pass);

}
function getUserById($id) {
    $sql = "select * from customer where customer_id = ?";
    return pdo_query_one($sql,$id);

}
// sigup
function handleSigup( $name,$password, $phone, $email,$image){
   $sql="INSERT INTO `customer`( `name`, `phone`, `email`, `image_url`, `pass`) 
   VALUES ('$name','$phone','$email','$image','$password')";
   pdo_execute($sql);
}

// cập nhật thông tin tài khoản
function updateInfo($name,$update_at,$address,$phone,$email,$image,$id){
    $sql = "update customer set name = ?, update_at = ?, address = ?, phone = ?, email = ?, image_url = ? where customer_id = ? and status = 1";
    pdo_execute($sql,$name,$update_at,$address,$phone,$email,$image,$id);
}
?>