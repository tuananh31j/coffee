<?php
//danh sách sản phẩm
function getListPro() {
    $sql = "select * from product inner join product_detail on product_detail.product_id = product.product_id where product.status = 1";
    return pdo_query($sql);
}
// xóa
function handleDelete($id) {
    $sql = "update product set status = 0 where product.product_id = $id";
    pdo_execute($sql);
}
// thêm
function addPro($name, $sale, $img,$category,$des,$cb) {
    $sql = "insert into product (name, sale, image_url,category_id,des) values(?,?,?,?,?)";
    pdo_execute($sql,$name, $sale, $img,$category,$des);
    return $cb;
}
function addProDetail($size,$price,$product) {
    $sql = "INSERT INTO `product_detail` (`product_id`, `size_id`, `price`) VALUES ('$product', '$size', '$price')";
    pdo_execute($sql);
}
function getIdPro() {
    $sql = "select product_id from product order by product_id desc limit 1";
    return pdo_query_one($sql);
}
?>