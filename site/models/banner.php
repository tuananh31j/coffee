<?php

function getBannerById($page)
{
    $sql = "select * from banner where page = ? and status = 1";
    return pdo_query_one($sql, $page);
}
