<?php
// lấy giá tiền theo mã sản phẩm và mã size
function getPrice($pro_id,$size_id){
    $sql = "select * from product_detail where product_id = $pro_id and size_id = $size_id";
    return pdo_query_one($sql);
}
// phân trang mỗi trang lấy ra 12 sản phẩm
function getListProduct($offset,$type = "name", $sort = 'ASC',$filterType = 0) {
    $queryFilter = 1;
   
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
    $sql .= "where $queryFilter and status = 1 and product_detail.size_id = 1 order by $type $sort, product.product_id limit 12 offset $offset";
    
    return pdo_query($sql);
}

//lấy toàn bộ sản phẩm có size S
function getAllProducts($type = "name", $sort = 'ASC',$filterType = 0) {
    $queryFilter = 1;
   
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
    $sql .= "where $queryFilter and status = 1 and product_detail.size_id = 1 order by $type $sort";
    return pdo_query($sql);
}

// lấy toàn bộ sản phẩm theo danh mục
function getAllProductsByCate($id, $type = "name", $sort = 'ASC',$filterType = 0) {
    $queryFilter = 1;
   
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
    $sql .= "where $queryFilter and status = 1 and product_detail.size_id = 1 and category_id = $id order by  $type $sort";
    return pdo_query($sql);
}
//lấy danh sách sản phẩm phân trang theo danh mục
function getListProductsByCate($id, $offset, $type = "name", $sort = 'ASC', $filterType = 0) {
    $queryFilter = 1;
   
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
    $sql .= "where $queryFilter and status = 1 and product_detail.size_id = 1 and category_id = $id order by  $type $sort, product.product_id limit 12 offset $offset";
    return pdo_query($sql);
}
// danh sách sản phẩm giảm giá
function getProSale() {
    $sql = "select * from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "where status = 1 and product_detail.size_id = 1 and sale >0 and sale <= 100";
    return pdo_query($sql);
}
// danh sách sản phẩm mới
function getNewPro() {
    $sql = "select * from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "where status = 1 and product_detail.size_id = 1 and sale >0 and sale <= 100 order by product.product_id desc limit 10";
    return pdo_query($sql);
}
?>