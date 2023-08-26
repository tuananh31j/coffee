<?php
function getListBanner()
{
    $sql = "select * from banner where status = 1";
    return pdo_query($sql);
}
function getBannerById($id)
{
    $sql = "select * from banner where banner_id = ?";
    return pdo_query_one($sql, $id);
}

function getListProFromBanner()
{
    $sql = "select * from product where status = 1";
    return pdo_query($sql);
}






// chỉnh sửa
function updateBanner($name, $banner_id, $product_id, $banner_url, $update_at)
{
    $sql = "UPDATE `banner` SET `name` = ?, banner_url = ?, product_id = ?, update_at = ? WHERE `banner`.`banner_id` = ?";
    pdo_execute($sql, $name, $banner_url, $product_id, $update_at, $banner_id);
}
