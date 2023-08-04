<?php
// danh sách cửa hàng phân trang
// danh sách phân trang
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
?>