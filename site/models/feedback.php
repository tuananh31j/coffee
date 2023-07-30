<?php
// thêm đánh giá
function addFeedback($star,$content,$idPro,$idUser) {
    $sql = "insert into feedback (star,content,product_id,customer_id) values(?,?,?,?)";
    pdo_execute($sql,$star,$content,$idPro,$idUser);
}
// kiểm tra người dùng đã mua sản phẩm này chưa
function checkOrder($idPro,$idUser) {
    $sql = "select * from order_detail inner join orders on orders.order_id = order_detail.order_id ";
    $sql .= "where order_detail.product_id = ? and orders.customer_id = ? and orders.status = 4";
    return pdo_query($sql,$idPro,$idUser);
}
// lầy toàn bộ feedback theo id sản phẩm
function getFeebBackById($idPro) {
    $sql = "select feedback.*, customer.name as nameCus, customer.image_url as imgCus from feedback ";
    $sql .= "inner join customer on customer.customer_id = feedback.customer_id ";
    $sql .= "where product_id = ?";
    return pdo_query($sql,$idPro);
}
// kiểm tra người dùng đã đánh giá sản phẩm này chưa
function checkFeedbackOnlyOne($idPro,$idUser) {
    $sql = "select * from feedback where product_id = ? and customer_id = ?";
    return pdo_query_one($sql,$idPro,$idUser);
}
?>