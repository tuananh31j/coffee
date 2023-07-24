<?php
    function insert_signup($fullname,$sdt,$email,$password){
        $sql="insert into signup(fullname,sdt,email,password) values('$fullname','$sdt','$email','$password')";
        pdo_execute($sql);
    }
?>