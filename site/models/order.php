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
function addOrderDetails($idOrder,$idPro,$idSize,$quantity,$price,$totalPrice) {
    $sql = "insert into order_detail (order_id,product_id,size_id,quantity,price_cur,total_price) values(?,?,?,?,?,?)";
    pdo_execute($sql,$idOrder,$idPro,$idSize,$quantity,$price,$totalPrice);
}
// lấy đơn hàng theo khách hàng
function getOrderByCus($id) {
    $sql = "select * from orders  where customer_id = ?  and status < 4 order by order_id desc";
    return pdo_query($sql,$id);
}
// thay đổi trạng thái
function updateOrderStatus($id,$status,$update_at) {
    $sql = "UPDATE `orders` SET `update_at` = ?, `status` = ? WHERE `orders`.`order_id` = ?";
    pdo_execute($sql,$update_at,$status,$id);
}
// lấy thông tin đơn hàng by id
function getOrderById($id){
    $sql = "select orders.*, shop_address.address as shop from orders inner join shop_address on shop_address.address_id =  orders.address_id where order_id = ? and status < 4";
    return pdo_query_one($sql, $id);
}
function getOrderDetail($id) {
    $sql = "select * from order_detail inner join product on product.product_id = order_detail.product_id where order_id = ?";
    return pdo_query($sql,$id);
}
// xóa order
?>