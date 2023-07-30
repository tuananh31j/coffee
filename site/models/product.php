<?php
// lấy giá tiền theo mã sản phẩm và mã size
function getPrice($pro_id,$size_id){
    $sql = "select * from product_detail where product_id = $pro_id and size_id = $size_id";
    return pdo_query_one($sql);
}
// lấy sản phẩm theo id
function getProFeedback($pro_id){
    $sql = "select product.*, product_detail.*, count(feedback.product_id) as count_fb, avg(feedback.star) as avg_star from product inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "inner join feedback on feedback.product_id = product.product_id ";
    $sql .= "where product.product_id = $pro_id group by product.product_id";
    return pdo_query_one($sql);
}
function getProNoFeedback($pro_id){
    $sql = "select * from product inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "where product.product_id = $pro_id group by product.product_id";
    return pdo_query_one($sql);
}
// phân trang mỗi trang lấy ra 12 sản phẩm
function getListProduct($offset,$type = "name", $sort = 'ASC',$filterType = 0,$keyword) {
    $queryFilter = 1;
    $kw = 1;
    if($keyword != 0) {
        $kw = "product.name like '%$keyword%'";
    }
   
        if($filterType == "down") {
            $queryFilter = "price <= 200000";
        }
        if($filterType == "up") {
            $queryFilter = "price >= 60000";
        }
        if($filterType == "betweent1") {
            $queryFilter = "price >= 20000 and price <=100000";
        }
        if($filterType == "betweent2") {
            $queryFilter = "price >= 100000 and price <= 200000";
        }
    
    $sql = "select * from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "where $kw and $queryFilter and status = 1 and product_detail.size_id = 1 order by $type $sort limit 12 offset $offset";
    
    return pdo_query($sql);
}

//lấy toàn bộ sản phẩm có size S
function getAllProducts($type = "name", $sort = 'ASC',$filterType = 0,$keyword) {
    $queryFilter = 1;
    $kw = 1;
    if($keyword != 0) {
        $kw = "product.name like '%$kw%'";
    }
   
        if($filterType == "down") {
            $queryFilter = "price <= 200000";
        }
        if($filterType == "up") {
            $queryFilter = "price >= 60000";
        }
        if($filterType == "betweent1") {
            $queryFilter = "price >= 20000 and price <=100000";
        }
        if($filterType == "betweent2") {
            $queryFilter = "price >= 100000 and price <= 200000";
        }
    
    $sql = "select * from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "where $kw and $queryFilter and status = 1 and product_detail.size_id = 1 order by $type $sort";
    return pdo_query($sql);
}

// lấy toàn bộ sản phẩm theo danh mục
function getAllProductsByCate($id, $type = "name", $sort = 'ASC',$filterType = 0,$keyword) {
    $queryFilter = 1;
    $kw = 1;
    if($keyword != 0) {
        $kw = "product.name like '%$kw%'";
    }
   
        if($filterType == "down") {
            $queryFilter = "price <= 200000";
        }
        if($filterType == "up") {
            $queryFilter = "price >= 60000";
        }
        if($filterType == "betweent1") {
            $queryFilter = "price >= 20000 and price <=100000";
        }
        if($filterType == "betweent2") {
            $queryFilter = "price >= 100000 and price <= 200000";
        }
    
    $sql = "select * from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "where $kw and $queryFilter and product.status = 1 and product_detail.size_id = 1 and category_id = $id order by  $type $sort";
    return pdo_query($sql);
}
//lấy danh sách sản phẩm phân trang theo danh mục
function getListProductsByCate($cate, $offset, $type = "name", $sort = 'ASC', $filterType = 0,$keyword) {
    $queryFilter = 1;
    $kw = 1;
    if($keyword != 0) {
        $kw = "product.name like '%$kw%'";
    }
   
    if($filterType == "down") {
        $queryFilter = "price <= 200000";
    }
    if($filterType == "up") {
        $queryFilter = "price >= 60000";
    }
    if($filterType == "betweent1") {
        $queryFilter = "price >= 20000 and price <=100000";
    }
    if($filterType == "betweent2") {
        $queryFilter = "price >= 100000 and price <= 200000";
    }
    
    $sql = "select * from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "where $kw and $queryFilter and product.status = 1 and product_detail.size_id = 1 and category_id = $cate order by  $type $sort, product.product_id limit 12 offset $offset";
    return pdo_query($sql);
}
// danh sách sản phẩm giảm giá
function getProSale() {
    $sql = "select * from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "where product.status = 1 and product_detail.size_id = 1 and sale >0 and sale <= 100";
    return pdo_query($sql);
}
// danh sách sản phẩm mới
function getNewPro() {
    $sql = "select * from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "where product.status = 1 and product_detail.size_id = 1 and sale > 0 and sale <= 100 order by product.product_id desc limit 10";
    return pdo_query($sql);
}
?>