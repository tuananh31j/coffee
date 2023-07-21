<?php
// lấy ra 12 sản phẩm đầu tiên
function getListProduct($offset) {
    $sql = "select * from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "where status = 1 and product_detail.size_id = 3 order by product.product_id limit 12 offset $offset";
    return pdo_query($sql);
}

?>