<?php
function getListSize() {
    $sql = "select * from size";
    return pdo_query($sql);
}
?>