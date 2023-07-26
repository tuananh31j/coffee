<?php
// đăng nhập
function checkLogin($email, $pass) {
    $sql = "select * from customer where email = ? and pass = ?";
    return pdo_query_one($sql,$email,$pass);

}
// sigup
function handleSigup( $name,$password, $phone, $email,$image){
   $sql="INSERT INTO `customer`( `name`, `phone`, `email`, `image_url`, `pass`) 
   VALUES ('$name','$phone','$email','$image','$password')";
   pdo_execute($sql);
}

// cập nhật thông tin tài khoản
function editInfo($name,$update_at,$address,$phone,$email,$image,$id){
    $sql = "update customer set name = ?, update_at = ?, address = ?, phone = ?, email = ?, image_url = ? where customer_id = ?";
    pdo_execute($sql,$name,$update_at,$address,$phone,$email,$image,$id);
}
?>