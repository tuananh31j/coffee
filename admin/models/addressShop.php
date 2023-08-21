<?php
// danh sách cửa hàng phân trang
function getShops($sort,$kw,$offset) {
    $sortCase = "order by address_id desc";
    $keyword = 1;
    if($kw != 0 && $kw != '') {
        $keyword = "address like '%$kw%'";
    }
    if($sort != 0 && $sort == 'old') {
        $sortCase = "order by address_id asc";
    }
    if($sort != 0 && $sort == 'new') {
        $sortCase = "order by address_id desc";
    }
    $sql = "select * from shop_address "; 
    $sql .= "where $keyword $sortCase limit 8 offset $offset";
    return pdo_query($sql);
}
// toàn bộ 
function getAllShops($sort,$kw) {
    $sortCase = "order by address_id desc";
    $keyword = 1;
    if($kw != 0 && $kw != '') {
        $keyword = "address like '%$kw%' or address like '$kw%' or address like '%$kw'";
    }
    if($sort != 0 && $sort == 'old') {
        $sortCase = "order by address_id asc";
    }
    if($sort != 0 && $sort == 'new') {
        $sortCase = "order by address_id desc";
    }
    $sql = "select * from shop_address "; 
    $sql .= "where $keyword $sortCase";
    return pdo_query($sql);
}

// thêm địa chỉ
function addShop($address,$phone,$link) {
    $sql = "insert into shop_address (address,phone,link) values(?,?,?)";
    pdo_execute($sql,$address,$phone,$link);
}
// lấy địa chỉ theo id
function getShopById($id) {
    $sql = "select * from shop_address where address_id = ?";
    return pdo_query_one($sql,$id);
}
// chỉnh sửa 
function updateShop($id,$address,$phone,$link,$update_at) {
    $sql = "update shop_address set address = ?, phone = ?, link = ?, update_at = ? where address_id = ?";
    pdo_execute($sql,$address,$phone,$link,$update_at,$id);
}
?>