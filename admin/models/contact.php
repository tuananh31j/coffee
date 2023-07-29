<?php
// lấy danh sách toàn bộ danh sachs
function getListContact($fil, $sort,$kw) {
    $filter = 1;
    $sortCase = 1;
    $keyword = 1;
    if($kw != 0 && $kw != '') {
        $keyword = "name like '%$kw%'";
    }
    if($sort != 0 && $sort == 'old') {
        $sortCase = "order by contact_id asc";
    }
    if($sort != 0 && $sort == 'new') {
        $sortCase = "order by contact_id desc";
    }
    if($fil != 0 && $fil == 'done') {
        $filter = "status = 1";
    }
    if($fil != 0 && $fil == 'yet') {
        $filter = "status = 0";
    }
    $sql = "select * from contact where $keyword and $filter $sortCase";
    return pdo_query($sql);
}
// cập nhật trạng thái
function updateStatus($id,$status,$update_at) {
    $sql = "UPDATE `contact` SET `update_at` = ?, `status` = ? WHERE `contact`.`contact_id` = ?;";
    pdo_execute($sql,$update_at,$status,$id);
}
// xóa thư
function deleteContact($id) {
    $sql = "delete from contact where contact_id = ?";
    pdo_execute($sql,$id);
}
?>