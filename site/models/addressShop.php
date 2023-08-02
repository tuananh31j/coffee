<?php
// danh sách cửa hàng
function getShops() {
    $sql = "select * from shop_address";
    return pdo_query($sql);
}
?>