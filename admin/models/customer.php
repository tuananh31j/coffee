<?php

function AddCustumer( $name,$password2, $address, $phone, $email,$kichhoat,$vaitro,$image){
   $sql="INSERT INTO `customer`( `name`, `phone`, `email`, `status`, `address`, `image_url`, `role`, `pass`) 
   VALUES ('$name','$phone','$email','$kichhoat','$address','$image','$vaitro','$password2')";
  try {
    pdo_execute($sql);
   return "Thêm thành công";
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}

}
function GetAllCustumer(){
   $sql="SELECT * FROM `customer`";
   
    try {
   return pdo_query($sql);;
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
   
}
function DeleteCustumer($id){
   $sql="DELETE FROM `customer` WHERE customer_id=$id";
   
    try {
   return pdo_execute($sql);
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
   
}

function getOneupdate($id){
    $sql="SELECT * FROM `customer` where customer_id=$id";
     try {
   return pdo_query_one($sql);;
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
}
function updateCustumer($id, $name, $address, $phone, $email,$kichhoat,$vaitro){
   $sql="UPDATE `customer` SET `name`='$name',`phone`='$phone',`email`='$email',`status`='$kichhoat',`address`='$address',`role`='$vaitro' WHERE customer_id=$id";
  try {
    pdo_execute($sql);
   return "Update thành công";
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}

}

?>