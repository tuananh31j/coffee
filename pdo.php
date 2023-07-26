<?php
//hàm kết nối database
    function pdo_get_connection() {
        $hostname='localhost';
        $db_name='du-an-1';
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

// hàm CUD trả về id với phương thức lastInsertId() nó trả về giá trị tự động tăng tỏng db
function add_product_with_details($sqlDetail, $sqlPro) {
    $connect = pdo_get_connection();

    // Bắt đầu giao dịch
    $connect->beginTransaction();
    $sql_args = array_slice(func_get_args(), 2);
    try {
        // Thêm sản phẩm vào bảng "products"
        $product_id = add_product($product_name, $product_price, $product_description);

        // Thêm chi tiết sản phẩm vào bảng "product_details"
        add_product_details($product_id, $sql_args);

        // Nếu không có lỗi, hoàn tất giao dịch
        $connect->commit();
        return true;
    } catch (PDOException $e) {
        // Nếu có lỗi xảy ra, hủy giao dịch
        $connect->rollback();
        throw $e;
    } finally {
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

// Insert 
function pdo_insert($sql) {
    try {
        $connect = Pdo_get_connection();
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($connect);
    }
}
function pdo_delete($sql) {
    try {
        $connect = Pdo_get_connection();
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($connect);
    }
}

function pdo_update($sql) {
    try {
        $connect = Pdo_get_connection();
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($connect);
    }
}


?>