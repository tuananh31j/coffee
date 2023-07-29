<?php
//danh sách tài khoản
function getListCustomerBy($kw, $fil) {
    $keyword = 1;
    $filter = '';

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
        $keyword = "customer.name like '%$kw%'";
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
function updateCustomer($name, $phone, $pass,$email,$status,$img,$role,$id) {
    $sql="update customer set name = ?, phone = ?, pass = ?, email = ?, status = ?, image_url = ?, role = ? where customer_id = ?";
    pdo_execute($sql,$name, $phone, $pass,$email,$status,$img,$role,$id);
    
}
// lấy ra 1 user
function getCusById($id) {
    $sql = "select * from customer where customer_id = ? and status = 1";
    return pdo_query_one($sql, $id);
}
?>