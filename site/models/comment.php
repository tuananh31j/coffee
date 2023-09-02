<?php
// thêm comment
function addCMT($content, $idPro, $idUser)
{
    $sql = "insert into comment (content ,product_id,customer_id) values(?,?,?)";
    pdo_execute($sql, $content, $idPro, $idUser);
}
// list cmt theo sản phẩm
function getCMTById($id)
{
    $sql = "select comment.*, customer.image_url as imgCus, customer.name as nameCus from comment inner join customer on customer.customer_id = comment.customer_id where comment.product_id = ? order by comment.cmt_id desc";
    return pdo_query($sql, $id);
}
