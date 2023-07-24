<?php
    function insert_signup($fullname,$sdt,$email,$password){
        $sql="insert into signup(fullname,sdt,email,password) values('$fullname','$sdt','$email','$password')";
        pdo_execute($sql);
    }
    function checktaikhoan($email,$sdt){
        $sql="select * from taikhoan where email='".$email."' AND sdt='".$sdt="'";
        $sp=pdo_query_one($sql);
        return $sp;
    }
?>