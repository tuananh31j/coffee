<?php
// đăng nhập
function checkLogin($email, $pass) {
    $sql = "select * from customer where email = ? and pass = ?";
    return pdo_query_one($sql,$email,$pass);

}
// singin
function AddCustumerclient( $name,$password2, $address, $phone, $email,$kichhoat,$vaitro,$image){
   $sql="INSERT INTO `customer`( `name`, `phone`, `email`, `status`, `address`, `image_url`, `role`, `pass`) 
   VALUES ('$name','$phone','$email','$kichhoat','$address','$image','$vaitro','$password2')";
  try {
    pdo_execute($sql);
   return "Thêm thành công";
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}

}
?>