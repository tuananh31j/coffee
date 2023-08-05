<?php
// lấy giá tiền theo mã sản phẩm và mã size
function getPrice($pro_id,$size_id){
    $sql = "select * from product_detail where product_id = $pro_id and size_id = $size_id";
    return pdo_query_one($sql);
}
//danh sách sản phẩm phân trang
function getListPro($kw, $filter,$offset) {
    $word = 1;
    $fil = ' desc';
    $type = "product.product_id";
    
    if ($kw != '' && $kw !=0) {
        $word = "product.name like '%$kw%'";
    }
    if ($filter == "az" && $filter != '') {
        $fil = " asc";
    } elseif ($filter == "za" && $filter != '') {
        $fil = " desc";
    } elseif ($filter == "new" && $filter != '') {
        $fil = " desc ";
        $type = "product.product_id";
    } elseif ($filter == "old" && $filter != '') {
        $fil = " asc";
        $type = "product.product_id";
    } elseif ($filter == "view" && $filter != '') {
        $fil = " desc ";
        $type = "view";
    }

    $sql = "select product.*, product.product_id as pro_id, category.name AS category_name, product_detail.* ";
    $sql .= "from product inner join product_detail on product_detail.product_id = product.product_id "; 
    $sql .= "inner join category on category.category_id = product.category_id ";
    $sql .= "where $word and size_id = 1 and product.status = 1 and category.status = 1 order by $type $fil limit 8 offset $offset";

    return pdo_query($sql);
}
// toàn bộ
function getAllPro($kw, $filter) {
    $word = 1;
    $fil = ' desc';
    $type = "product.name";
    
    if ($kw != '' && $kw !=0) {
        $word = "product.name like '%$kw%'";
    }
    if ($filter == "az" && $filter != '') {
        $fil = " asc";
    } elseif ($filter == "za" && $filter != '') {
        $fil = " desc";
    } elseif ($filter == "new" && $filter != '') {
        $fil = " desc ";
        $type = "product.product_id";
    } elseif ($filter == "old" && $filter != '') {
        $fil = " asc";
        $type = "product.product_id";
    } elseif ($filter == "view" && $filter != '') {
        $fil = " desc ";
        $type = "view";
    }

    $sql = "select product.*, product.product_id as pro_id, category.name AS category_name, product_detail.* ";
    $sql .= "from product inner join product_detail on product_detail.product_id = product.product_id "; 
    $sql .= "inner join category on category.category_id = product.category_id ";
    $sql .= "where $word and size_id = 1 and product.status = 1 and category.status = 1 order by $type $fil";

    return pdo_query($sql);
}
// xóa
function handleDelete($id) {
    $sql = "update product set status = 0 where product.product_id = $id";
    pdo_execute($sql);
}
// update
function getProById($id) {
    $sql = "select * from product where product_id = $id";
    return pdo_query_one($sql);
}
function update_product($name, $sale, $img,$category,$des,$update_at,$id) {
    $sql = "UPDATE `product` SET `category_id` = ?, `image_url` = ?, `name` = ?, `des` = ?, `sale` = ?, `update_at` = ? WHERE `product`.`product_id` = ?;";
    pdo_execute($sql,$category, $img, $name,$des,$sale,$update_at,$id);
    return true;

}
function updateDetails($id, $size, $price, $update_at) {
    $sql = "UPDATE `product_detail` SET `price` = ?, `update_at` = ? WHERE `product_id` = ? AND `size_id` = ?";
    pdo_execute($sql, $price, $update_at, $id, $size);
}

function getlistProDetailById($id) {
    $sql = "select * from product_detail inner join size on size.size_id = product_detail.size_id where product_id =$id";
    return pdo_query($sql);
}
// thêm
function add_product($name, $sale, $img,$category,$des) {
    $sql = "insert into product (name, sale, image_url,category_id,des) values(?,?,?,?,?)";
    return pdoExecutePro($sql,$name, $sale, $img,$category,$des);

}
function add_product_details($pro_id,$size,$price) {
    $sql = "INSERT INTO `product_detail` (`product_id`, `size_id`, `price`) VALUES ($pro_id, '$size', '$price')";
    pdo_execute($sql);
}




?>