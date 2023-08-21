<?php
//hàm kết nối database
    function pdo_get_connection() {
        $hostname='localhost';
        $db_name='du-an-13';
        $username='root';
        $password="";
        // Dựng đối tương PDO
        
            $connect=new PDO("mysql:host=$hostname;dbname=$db_name",$username, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $connect;
        
}
    

//hàm CUD
    function pdo_execute($sql) {
        $sql_args = array_slice(func_get_args(), 1);
        
        try{
            $connect = pdo_get_connection();
            $stmt = $connect->prepare($sql);
            $stmt->execute($sql_args);
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($connect);
        }
    }

    function pdoExecutePro($sql) {
        $sql_args = array_slice(func_get_args(), 1);
            
        try{
            $connect = pdo_get_connection();
            $stmt = $connect->prepare($sql);
            $stmt->execute($sql_args);
            $product_id = $connect->lastInsertId();
    
            return $product_id;
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($connect);
        }
        
    }

//hàm query nhiều
function pdo_query($sql) {
    $sql_args = array_slice(func_get_args(), 1);

    try{
        $connect = Pdo_get_connection();
        $stmt = $connect->prepare($sql);
        $stmt->execute($sql_args);
        $data = $stmt->fetchAll();
        return $data;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($connect);
    }
}


//hàm query một
function pdo_query_one($sql) {
    $sql_args = array_slice(func_get_args(), 1);

    try {
        $connect = Pdo_get_connection();
        $stmt = $connect->prepare($sql);
        $stmt->execute($sql_args);
        $data = $stmt->fetch();
        return $data;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($connect);
    }
}



?>