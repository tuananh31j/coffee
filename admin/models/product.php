<?php
//danh sách sản phẩm
function getListPro($kw, $filter) {
    $word = 1;
    $fil = ' asc';
    $type = "product.name";
    
    if ($kw != '') {
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
    $sql .= "where $word and product.status = 1 and category.status = 1 and size_id = 1 order by $type $fil";

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
    $sql = "update product set name = ?, sale = ?, image_url = ?, category_id = ?, des = ?, update_at = ? where product_id = ?";
    pdo_execute($sql,$name, $sale, $img,$category,$des,$update_at,$id);

}
function updateDetails($id, $size, $price, $update_at) {
    $sql = "UPDATE product_detail SET size_id = ?, price = ?, update_at = ? WHERE product_id = ?";
    pdo_execute($sql, $size, $price, $update_at, $id);
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