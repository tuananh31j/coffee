<?php
// lấy giá tiền theo mã sản phẩm và mã size
function getPrice($pro_id,$size_id){
    $sql = "select * from product_detail where product_id = $pro_id and size_id = $size_id";
    return pdo_query_one($sql);
}
// lấy sản phẩm theo id
function getProFeedback($pro_id){
    $sql = "select count(feedback.feedback_id) as count_fb, product.*, product_detail.*, avg(feedback.star) as avg_star from product inner join product_detail on product_detail.product_id = product.product_id ";
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
function getListProduct($offset,$type = "product.name", $sort = 'ASC',$filterType = 0,$keyword) {
    $queryFilter = 1;
    $kw = 1;
    if($keyword != 0) {
        $kw = "product.name like '%$keyword%'";
    }
    if($filterType == "down") {
        $queryFilter = "price - (price * sale/100) <= 50000";
    }
    if($filterType == "up") {
        $queryFilter = "price - (price * sale/100) >= 50000";
    }
    if($filterType == "betweent1") {
        $queryFilter = "price - (price * sale/100) >= 20000 and price - (price * sale/100) <=60000";
    }
    if($filterType == "betweent2") {
        $queryFilter = "price - (price * sale/100) >= 60000 and price - (price * sale/100) <= 150000";
    }
    
    $sql = "select product.*, product_detail.*, category.name as nameCate, category.category_id as idCate from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "inner join category on category.category_id = product.category_id ";
    $sql .= "where  $queryFilter and product.status = 1 and category.status = 1 and product_detail.size_id = 1 and $kw order by $type $sort limit 12 offset $offset";
    
    return pdo_query($sql);
}

//lấy toàn bộ sản phẩm có size S
function getAllProducts($type = "product.name", $sort = 'ASC',$filterType = 0,$keyword) {
    $queryFilter = 1;
    $kw = 1;
    if($keyword != 0) {
        $kw = "product.name like '%$kw%'";
    }
   
        if($filterType == "down") {
            $queryFilter = "price - (price * sale/100) <= 50000";
        }
        if($filterType == "up") {
            $queryFilter = "price - (price * sale/100) >= 50000";
        }
        if($filterType == "betweent1") {
            $queryFilter = "price - (price * sale/100) >= 20000 and price - (price * sale/100) <=60000";
        }
        if($filterType == "betweent2") {
            $queryFilter = "price - (price * sale/100) >= 60000 and price - (price * sale/100) <= 150000";
        }
    
    $sql = "select product.*, product_detail.*, category.name as nameCate, category.category_id as idCate from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "inner join category on category.category_id = product.category_id ";
    $sql .= "where $kw and $queryFilter and product.status = 1 and category.status = 1 and product_detail.size_id = 1 order by $type $sort";
    return pdo_query($sql);
}

// lấy toàn bộ sản phẩm theo danh mục
function getAllProductsByCate($id, $type = "product.name", $sort = 'ASC',$filterType = 0,$keyword) {
    $queryFilter = 1;
    $kw = 1;
    if($keyword != 0) {
        $kw = "product.name like '%$kw%'";
    }
   
        if($filterType == "down") {
            $queryFilter = "price - (price * sale/100) <= 50000";
        }
        if($filterType == "up") {
            $queryFilter = "price - (price * sale/100) >= 50000";
        }
        if($filterType == "betweent1") {
            $queryFilter = "price - (price * sale/100) >= 20000 and price - (price * sale/100) <=60000";
        }
        if($filterType == "betweent2") {
            $queryFilter = "price - (price * sale/100) >= 60000 and price - (price * sale/100) <= 150000";
        }
    
    $sql = "select product.*, product_detail.*, category.name as nameCate, category.category_id as idCate, category.status as statusCate from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "inner join category on category.category_id = product.category_id ";
    $sql .= "where $kw and $queryFilter and product.status = 1 and category.status = 1 and product_detail.size_id = 1 and product.category_id = $id order by  $type $sort";
    return pdo_query($sql);
}
//lấy danh sách sản phẩm phân trang theo danh mục
function getListProductsByCate($cate, $offset, $type = "product.name", $sort = 'ASC', $filterType = 0,$keyword) {
    $queryFilter = 1;
    $kw = 1;
    if($keyword != 0) {
        $kw = "product.name like '%$kw%'";
    }
   
    if($filterType == "down") {
        $queryFilter = "price - (price * sale/100) <= 50000";
    }
    if($filterType == "up") {
        $queryFilter = "price - (price * sale/100) >= 50000";
    }
    if($filterType == "betweent1") {
        $queryFilter = "price - (price * sale/100) >= 20000 and price - (price * sale/100) <=60000";
    }
    if($filterType == "betweent2") {
        $queryFilter = "price - (price * sale/100) >= 60000 and price - (price * sale/100) <= 150000";
    }
    
    $sql = "select product.*, product_detail.*, category.name as nameCate, category.category_id as idCate, category.status as statusCate from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "inner join category on category.category_id = product.category_id ";
    $sql .= "where $kw and $queryFilter and product.status = 1 and category.status = 1 and product_detail.size_id = 1 and product.category_id = $cate order by  $type $sort, product.product_id limit 12 offset $offset";
    return pdo_query($sql);
}
// danh sách sản phẩm giảm giá
function getProSale() {
    $sql = "select product.*, product_detail.*, category.name as nameCate, category.category_id as idCate from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "inner join category on category.category_id = product.category_id ";
    $sql .= "where product.status = 1 and category.status = 1 and product_detail.size_id = 1 and sale >0 and sale <= 100";
    return pdo_query($sql);
}
// danh sách sản phẩm mới
function getNewPro() {
    $sql = "select product.*, product_detail.*, category.name as nameCate, category.category_id as idCate from product ";
    $sql .= "inner join product_detail on product_detail.product_id = product.product_id ";
    $sql .= "inner join category on category.category_id = product.category_id ";
    $sql .= "where product.status = 1 and category.status = 1 and product_detail.size_id = 1 order by product.product_id desc limit 10";
    return pdo_query($sql);
}
function getAllByCate($id) {
    $sql = "select * from product inner join product_detail on product_detail.product_id = product.product_id where product.category_id = ? and product_detail.size_id = 1 and product.status = 1";
    return pdo_query($sql,$id);
}


// cập nhật lượt xem
function updateView($idPro,$view) {
    $sql = "update product set view = ? where product_id = ?";
    pdo_execute($sql,$view,$idPro);
}

// lấy sản phẩm theo id sản phẩm
function getProById($id) {
    $sql = "select * from product where product_id = ?";
    return pdo_query_one($sql,$id);
}
?>