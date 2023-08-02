<?php
// thêm mới order
function addOrder($shop,$idCus,$phone,$name,$email,$address,$note) {
    if($idCus == '') {
        $idCus = null;
    }
    $sql = "insert into orders (address_id,customer_id,phone,customer_name,email,address,note) values(?,?,?,?,?,?,?)";
    return pdoExecutePro($sql,$shop,$idCus,$phone,$name,$email,$address,$note);
}
// thêm mới chi tiết order
function addOrderDetails($idOrder,$idPro,$quantity,$price,$totalPrice) {
    $sql = "insert into order_detail (order_id,product_id,quantity,price_cur,total_price) values(?,?,?,?,?)";
    pdo_execute($sql,$idOrder,$idPro,$quantity,$price,$totalPrice);
}
?>