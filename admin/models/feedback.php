<?php
// list feedbacks phân trang 10
function getListFB($kw, $fil,$offset) {
    $keyword = 1;
    $filter = "order by feedback.feedback_id desc";
    if ($fil == "new" && $fil != 0) {
        $filter = "order by feedback.feedback_id desc";
    }
    if ($fil == "old" && $fil != 0) {
        $filter = "order by feedback.feedback_id asc";
    }
    if ($kw != 0 && $kw != '') {
    $keyword = "feedback.content like '%$kw%' or feedback.content like '%$kw' or feedback.content like '$kw%'";
    }
    $sql = "select feedback.*, customer.name as nameCus, product.name as namePro from feedback ";
    $sql .= "inner join customer on customer.customer_id ";
    $sql .= "inner join product on product.product_id ";
    $sql .= "where $keyword group by feedback_id $filter limit 10  offset $offset";
    return pdo_query($sql);
    

}
//  toàn bộ FB
function getAllFB($kw, $fil) {
    $keyword = 1;
    $filter = "order by feedback.feedback_id desc";
    if ($fil == "new" && $fil != 0) {
        $filter = "order by feedback.feedback_id desc";
    }
    if ($fil == "old" && $fil != 0) {
        $filter = "order by feedback.feedback_id asc";
    }
    if ($kw != 0 && $kw != '') {
    $keyword = "feedback.content like '%$kw%' or feedback.content like '%$kw' or feedback.content like '$kw%'";
    }
    $sql = "select feedback.*, customer.name as nameCus, product.name as namePro from feedback ";
    $sql .= "inner join customer on customer.customer_id ";
    $sql .= "inner join product on product.product_id ";
    $sql .= "where $keyword group by feedback_id $filter";
    return pdo_query($sql);
    
    
}
// xoa FB
function deleteFB($id) {
    $sql = "delete from feedback where feedback_id = ?";
    pdo_execute($sql, $id);
}
// lấy FB bằng id
function getFBID($id) {
    $sql = "select feedback.*, customer.name as nameCus,customer.image_url as imgCus , customer.*, product.*, product.name as namePro from feedback ";
    $sql .= "inner join customer on customer.customer_id = feedback.customer_id ";
    $sql .= "inner join product on product.product_id = feedback.product_id ";
    $sql .= "where feedback.feedback_id = ?";
    return pdo_query_one($sql,$id);
}
?>