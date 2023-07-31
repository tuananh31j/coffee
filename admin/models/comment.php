<?php
// list comments
function getListCMT($kw, $fil) {
    $keyword = 1;
    $filter = '';
    if ($fil == "new" && $fil != 0) {
        $filter = "order by comment.cmt_id desc";
    }
    if ($fil == "old" && $fil != 0) {
        $filter = "order by comment.cmt_id asc";
    }
    if ($kw != 0 && $kw != '') {
$keyword = "comment.content like '%$kw%'";
        
            

    }
    $sql = "select comment.*, customer.name as nameCus, product.name as namePro from comment ";
    $sql .= "inner join customer on customer.customer_id ";
    $sql .= "inner join product on product.product_id ";
    $sql .= "where $keyword group by cmt_id $filter ";
    return pdo_query($sql);
    
    
}
// xoa cmt
function deleteCMT($id) {
    $sql = "delete from comment where cmt_id = ?";
    pdo_execute($sql, $id);
}
// lấy cmt bằng id
function getCMTID($id) {
    $sql = "select * from comment ";
    $sql .= "inner join customer on customer.customer_id ";
    $sql .= "inner join product on product.product_id ";
    $sql .= "where cmt_id = ?";
    return pdo_query_one($sql,$id);
}
?>