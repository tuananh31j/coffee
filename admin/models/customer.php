<?php
//danh sách tài khoản phân trang
function getListCustomerBy($kw, $fil,$offset) {
    $keyword = 1;
    $filter = "order by customer.customer_id desc";

    if ($fil == "az" && $fil != 0) {
        $filter = "order by customer.name asc";
    }
    if ($fil == "za" && $fil != 0) {
        $filter = "order by customer.name desc";
    }
    if ($fil == "new" && $fil != 0) {
        $filter = "order by customer.customer_id desc";
    }
    if ($fil == "old" && $fil != 0) {
        $filter = "order by customer.customer_id asc";
    }
    if ($kw != 0 && $kw != '') {
        $keyword = "customer.name like '%$kw%' or customer.name like '%$kw' or customer.name like '$kw%'";
    }
    $sql = "select * from customer where $keyword and status = 1 $filter limit 10 offset $offset";
    return pdo_query($sql);
}
// toàn bộ toàn khoản
function getAllCustomerBy($kw, $fil) {
    $keyword = 1;
    $filter = "order by customer.name desc";

    if ($fil == "az" && $fil != 0) {
        $filter = "order by customer.name asc";
    }
    if ($fil == "za" && $fil != 0) {
        $filter = "order by customer.name desc";
    }
    if ($fil == "new" && $fil != 0) {
        $filter = "order by customer.customer_id desc";
    }
    if ($fil == "old" && $fil != 0) {
        $filter = "order by customer.customer_id asc";
    }
    if ($kw != 0 && $kw != '') {
        $keyword = "customer.name like '%$kw%' or customer.name like '%$kw' or customer.name like '$kw%'";
    }
    $sql = "select * from customer where $keyword and status = 1 $filter";
    return pdo_query($sql);
}
// thêm mới tài khoản
function addCustomer($name, $phone, $pass,$email,$status,$img,$role) {
    $sql = "insert into customer (name,phone,pass,email,status,image_url,role) values(?,?,?,?,?,?,?)";
    pdo_execute($sql,$name, $phone, $pass,$email,$status,$img,$role);
}
// xóa mềm
function deleteCus($id) {
    $sql="update customer set status = 0 where customer_id= $id";
    pdo_execute($sql);
}
// chỉnh sửa
function updateCustomer($name, $phone, $pass,$email,$status,$img,$role,$update_at,$id) {
    $sql="update customer set name = ?, phone = ?, pass = ?, email = ?, status = ?, image_url = ?, role = ?, update_at = ? where customer_id = ?";
    pdo_execute($sql,$name, $phone, $pass,$email,$status,$img,$role,$update_at,$id);
    
}
// lấy ra 1 user
function getCusById($id) {
    $sql = "select * from customer where customer_id = ? and status = 1";
    return pdo_query_one($sql, $id);
}
// kiểm tra email có trên hệ thống không
function checkEmail($email) {
    $sql = "select * from customer where email = ?";
    return pdo_query_one($sql,$email);
}
// kiểm tra sđt có trên hệ thống không
function checkPhone($phone) {
    $sql = "select * from customer where phone = ?";
    return pdo_query_one($sql,$phone);
}
