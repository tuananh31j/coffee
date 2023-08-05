<?php
// GLOBAL
require_once "/xampp/htdocs/du-an-1-nhom7/global.php";

// MODELS
require_once "/xampp/htdocs/du-an-1-nhom7/pdo.php";
require_once "../admin/models/customer.php";
require_once "../admin/models/product.php";
require_once "../admin/models/size.php";
require_once "../admin/models/category.php";
require_once "../admin/models/contact.php";
require_once "../admin/models/comment.php";
require_once "../admin/models/order.php";
require_once "../admin/models/addressShop.php";
require_once "../admin/models/dashboard.php";

if (!isset($_SESSION['user'])) {
    header("location: $ROOT_URL/notFound.php");
}elseif($_SESSION['user']['role'] != 1){
    header("location: $ROOT_URL/notFound.php");
}

// HEADER
require_once "./view/layout/sideLeft.php";

// CONTENT
if(isset($_GET['url'])) {
    switch ($_GET['url']) {
        
        
    //ORDER
    case 'order':
       
        if(isset($_GET['act'])) {
            $act = $_GET['act'];
            if($act == 'list') {
                $fil = '';
                $sort = "new";
                $kw = 0;
                $offset = 0;
                //phân trang
                if(isset($_GET['pagenum'])) {
                    $page = $_GET['pagenum'];
                    $offset = ($page - 1)* 8;
                }
                // tìm kiếm
                if(isset($_POST['btn-search'])) {
                    if($_POST['keyword'] != ''){
                        $kw = $_POST['keyword'];
                    }else{
                        $errKw = "Chưa nhập từ khóa!";
                    }
                }
                // sắp sếp
                if(isset($_GET['filter'])) {
                    $fil = $_GET['filter'];
                }
                // lọc
                if(isset($_GET['sort'])) {
                    $sort = $_GET['sort'];
                }
                $all = getAllOrder($fil, $sort,$kw);
                $listOrder =  getListOrder($fil, $sort,$kw,$offset);
                $update_at = date("Y-m-d");
                        for($i = 0; $i < sizeof($listOrder); $i++) {
                            if(isset($_POST['btn-update-'.$i]) && $_POST['btn-update-'.$i] != '' && $_POST['btn-update-'.$i]) {
                                if(isset($_POST['status-'.$i]) && $_POST['status-'.$i] != ''){
                                    $status = $_POST['status-'.$i];
                                    $id = $_POST['id-'.$i];
                                    updateOrderStatus($id,$status,$update_at);
                                    $listOrder =  getListOrder($fil, $sort,$kw,$offset);
                                }else{
                                    $err[$i] = "chưa chọn trạng thái!";;
                                }
                            }
                        }



                require_once "./view/pages/order/list.php";
            }
        }
        break;
           
    //CATEGORY  
    case 'category':
        if(isset($_GET['act'])) {
            $act = $_GET['act'];
            // danh sách danh mục
            if($act == 'list') {
                $kw = 0;
                $fil = 0;

                //search
                if(isset($_POST['btn-search'])){
                    if($_POST['keyword'] != ""){
                        $kw = $_POST['keyword'];
                    }else{
                        $errKw = "Chưa nhập từ khóa!";
                    }
                }
                // fillter
                if(isset($_GET['filter'])) {
                    $fil = $_GET['filter'];
                }
                $categorys = getListCategoryBy($kw,$fil);
                require_once "./view/pages/category/list.php";
            }
            // thêm mới danh mục
            if($act == 'add') {
                $errName = '';
                if(isset($_POST['btn-add'])) {
                    $name = $_POST['name'];
                    if($_POST['name'] != '') {
                        addCategory($name);
                        $noti="Thêm mới thành công!";
                    }else{
                        $errName = "Chưa nhập tên danh mục!";
                    }
                }
                include_once "./view/pages/category/add.php";
            }
            // sửa danh mục
            if($act == 'update') {
                $errName = '';
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $target = getCategoryById($id);
                }
                if(isset($_POST['btn-update'])) {
                    $name = $_POST['name'];
                    if($_POST['name'] != '') {
                        updateCate($name, $_POST['id']);
                        $noti="Cập nhật thành công!";
                        $target = getCategoryById($_POST['id']);

                    }else{
                        $errName = "Chưa nhập tên danh mục!";
                    }
                }
                
                include_once "./view/pages/category/update.php";
            }
            //xóa danh mục
            if($act == 'delete') {
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    deleteCate($id);
                }
                header("location: index.php?url=category&act=list");
            }
        }
        break; 
    

        
    //PRODUCT
    case 'product':
        if(isset($_GET['act'])) {
            // danh sách sản phẩm
            if($_GET['act'] == 'list') {
                $kw = '';
                $filter = '';
                $offset = 0;
                // phân trang
                if(isset($_GET['pagenum'])) {
                    $page = $_GET['pagenum'];
                    $offset = ($page -1) *8;
                }
                // tìm kiếm
                if(isset($_POST['btn-search'])) {
                    if($_POST['keyWord'] != ''){
                        $kw = $_POST['keyWord'];
                    }else{
                    $errKw = "Chưa nhập từ khóa!";
                }

                }
                // lọc
                if(isset($_GET['filter'])){
                    $filter = $_GET['filter'];
                }
                $all = getAllPro($kw, $filter);
                $products = getListPro($kw,$filter,$offset);
                require_once "../admin/view/pages/product/list.php";
            }
            // thêm sản phẩm
            if($_GET['act'] == 'add') {
                $err = [];
                $listSize = getListSize();
                $listCategory = getListCategory();
                if(isset($_POST['btn-add']) && $_POST['btn-add'] == true) {
                            //name
                            if($_POST['name'] != '') {
                                $name = $_POST['name'];
                            }else{
                                $err['name'] = "Chưa điền tên sản phẩm!";
                            }
                            // sale
                            if(isset($_POST['sale']) ) {
                                if($_POST['sale'] > 0 && $_POST['sale'] <= 100 || $_POST['sale'] == ''){
                                    $sale = $_POST['sale'];
                                }else{
                                    $err['sale'] = "Giá trị phải >0 và <100!";
                                }
                            }else{
                                $sale = 0;
                            }
                            // ảnh
                            if(isset($_FILES['img']) && $_FILES['img']['name'] != ''){
                                $img = $_FILES['img']['name'];
                                $path = pathinfo($img, PATHINFO_EXTENSION);
                                $format= ["jpg", "jpeg", "png", "gif"];
                                if (preg_match("/^(" . implode("|", $format) . ")$/", $path)) {
                                    if($_FILES['img']['size'] <= 1048576){
                                    move_uploaded_file($_FILES['img']['tmp_name'],"../public/img/".$img);
                                    }else{
                                        $err['img'] = "Dung lượng vượt quá giới hạn!";
                                    }
                                }else{
                                    $err['img'] = "File gửi lên không phải là file ảnh!";
                                }
                            }else{
                                $err['img'] = "Chưa tải file ảnh!";
                            }
                            //category
                            if($_POST['category'] != '') {
                                $category = $_POST['category'];
                            }else{
                                $err['category'] = "Chưa chọn danh mục sản phẩm!";
                            }
                            //mô tả
                            if($_POST['des'] != '') {
                                $des = $_POST['des'];
                            }else{
                                $err['des'] = "Chưa nhập mô tả sản phẩm!";
                            }
                            // // size, price
                            // foreach($listSize as $key => $size) {
                            //     if(isset($_POST['details'][$key]['price']))
                            // }
                          
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $detailsArray = array();
                            
                                // Lặp qua dữ liệu được post từ form và lưu vào mảng $detailsArray
                                foreach ($_POST['details'] as $key => $value) {
                                    $size = $value['size'];
                                    $price = $value['price'];
                                    if($price != '') {
                                    $detailsArray[$key] = array('size' => $size, 'price' => $price);
                                    }else{
                                        $err["price-".$key] = "Chưa nhập giá!";
                                    }
                                }
                            }
                            if(count($err) === 0){
                              $result = add_product($name, $sale, $img,$category,$des);
                            if($result) {
                                foreach($detailsArray as $details) {
                                    add_product_details($result,$details['size'],$details['price']);
                                }
                                $noti = "Thêm mới thành công!";
                            }  
                            }
                } 
                require "./view/pages/product/add.php";
            }
            // xóa sản phẩm
            if($_GET['act'] == 'delete') {
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    handleDelete($id);
                }
                
                header("location: index.php?url=product&act=list");
            }
            // sửa sản phẩm
            if($_GET['act'] == 'update') {
                $listSize = getListSize();
                $listCategory = getListCategory();
                $err = [];
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $target = getProById($id);
                    $listProDetail = getlistProDetailById($id);
                }
                if(isset($_POST['btn-update'])) {
                    //name
                    if($_POST['name'] != '') {
                        $name = $_POST['name'];
                    }else{
                        $err['name'] = "Chưa điền tên sản phẩm!";
                    }
                    // sale
                    if(isset($_POST['sale']) ) {
                        if($_POST['sale'] >= 0 && $_POST['sale'] <= 100 || $_POST['sale'] == ''){
                            $sale = $_POST['sale'];
                        }else{
                            $err['sale'] = "Giá trị phải >0 và <100!";
                        }
                    }else{
                        $sale = 0;
                    }
                    // ảnh
                    if(isset($_FILES['img']) && $_FILES['img']['name'] != ''){
                        $img = $_FILES['img']['name'];
                        $path = pathinfo($img, PATHINFO_EXTENSION);
                        $format= ["jpg", "jpeg", "png", "gif"];
                        if (preg_match("/^(" . implode("|", $format) . ")$/", $path)) {
                            if($_FILES['img']['size'] <= 1048576){
                                move_uploaded_file($_FILES['img']['tmp_name'],"../public/img/".$img);
                                }else{
                                    $err['img'] = "Dung lượng vượt quá giới hạn!";
                                }
                        }else{
                            $err['img'] = "File gửi lên không phải là file ảnh!";
                        }
                    }else{
                        $cur = getProById($_POST['id']);
                        $img = $cur['image_url'];
                    }
                    //category
                    if($_POST['category'] != '') {
                        $category = $_POST['category'];
                    }else{
                        $err['category'] = "Chưa chọn danh mục sản phẩm!";
                    }
                    //mô tả
                    if($_POST['des'] != '') {
                        $des = $_POST['des'];
                    }else{
                        $err['des'] = "Chưa nhập mô tả sản phẩm!";
                    }
                    // dữ liệu chi tiết sản phẩm
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $detailsArray = array();
                        // Lặp qua dữ liệu được post từ form và lưu vào mảng $detailsArray
                        foreach ($_POST['details'] as $key => $value) {
                            $size = $value['size'];
                            $price = $value['price'];
                            if($price != '') {
                            $detailsArray[$key] = array('size' => $size, 'price' => $price);
                            }else{
                                $err["price-".$key] = "Chưa nhập giá!";
                            }
                        }
                    }
                    $update_at = date("Y-m-d");
                    $idPro = $_POST['id'];
                    if(count($err) === 0){
                        $result = update_product($name, $sale, $img,$category,$des,$update_at,$idPro);
                        if($result){
                            for($i = 0; $i < sizeof($detailsArray); $i++) {
                            $size = $detailsArray[$i]['size'];
                            $price = $detailsArray[$i]['price'];
                            updateDetails($idPro,$size, $price, $update_at);
                        } 
                        $noti = "Cập nhật thành công!";
                        $target = getProById($idPro);

                        }
                        // updateDetails($idPro,$detailsArray[0]['size'], $detailsArray[0]['price'], $update_at);
                        // updateDetails($idPro,$detailsArray[1]['size'], $detailsArray[1]['price'], $update_at);
                        // updateDetails($idPro,$detailsArray[2]['size'], $detailsArray[2]['price'], $update_at);
                    }
                }  
                require "./view/pages/product/update.php";
            }
        }
        break;

    // CUSTOMER
    case 'customer':
        if(isset($_GET['act'])) {
            $act = $_GET['act'];
            // danh sách khách hàng
            if($act == 'list') {
                $kw = 0;
                $fil = 0;
                $offset = 0;
                // phân trang
                if(isset($_GET['pagenum'])) {
                    $page = $_GET['pagenum'];
                    $offset = ($page - 1)*10;
                }
                //search
                if(isset($_POST['btn-search'])){
                    if($_POST['keyword'] != ""){
                        $kw = $_POST['keyword'];
                    }else{
                        $errKw = "Chưa nhập từ khóa!";
                    }
                }
                // fillter
                if(isset($_GET['filter'])) {
                    $fil = $_GET['filter'];
                }
                $all = getAllCustomerBy($kw, $fil);
                $customers = getListCustomerBy($kw,$fil,$offset);
                require_once "./view/pages/customer/list.php";
            }
            // thêm mới khách hàng
            if($act == 'add') {
                $err = [];
                if(isset($_POST['btn-add'])) {
                    // name
                    if($_POST['name'] != '') {
                        $name = $_POST['name'];
                    }else{
                        $err['name'] = "Chưa nhập tên khách hàng!";
                    }
                    // phone
                    if($_POST['phone'] != '') {
                        $phone = $_POST['phone'];
                        $check = checkPhone($phone);
                        if(is_array($check)){
                            $err['phone'] = "Số điện thoại đã tồn tại";
                        }
                    }else{
                        $err['phone'] = "Chưa nhập số điện thoại!";
                    }
                    // pass
                    if($_POST['pass'] != '') {
                        $pass = $_POST['pass'];
                    }else{
                        $err['pass'] = "Chưa nhập mật khẩu!";
                    }
                    // email
                    if($_POST['email'] != '') {
                        $email = $_POST['email'];
                        $check = checkEmail($email);
                        if(is_array($check)){
                            $err['email'] = "Email đã tồn tại";
                        }
                    }else{
                        $err['email'] = "Chưa nhập email!";
                    }
                    // status
                        $status = $_POST['status'];
                    // ảnh
                    if(isset($_FILES['img']) && $_FILES['img']['name'] != ''){
                        $img = $_FILES['img']['name'];
                        $path = pathinfo($img, PATHINFO_EXTENSION);
                        $format= ["jpg", "jpeg", "png", "gif"];
                        if (preg_match("/^(" . implode("|", $format) . ")$/", $path)) {
                            if($_FILES['img']['size'] <= 2097082){
                                move_uploaded_file($_FILES['img']['tmp_name'],"../public/img/".$img);
                                }else{
                                    $err['img'] = "Dung lượng vượt quá giới hạn!";
                                }
                        }else{
                            $err['img'] = "File gửi lên không phải là file ảnh!";
                        }
                    }else{
                        $img = "anhcuaban.png";
                    }
                    // vai trò
                        $role = $_POST['role'];
                    if(count($err) === 0){
                        addCustomer($name, $phone, $pass,$email,$status,$img,$role);
                        $noti = "Thêm mới thành công!";
                      }  
                }
                include_once "./view/pages/customer/add.php";
            }
            // chỉnh sửa thông tin khách hàng
            if($act == 'update'){
                $err = [];
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $target = getCusById($id);
                }
                if(isset($_POST['btn-update'])) {
                    $id = $_POST['id'];
                    $target = getCusById($id);
                    // name
                    if($_POST['name'] != '') {
                        $name = $_POST['name'];
                    }else{
                        $err['name'] = "Chưa nhập tên khách hàng!";
                    }
                    // phone
                    if($_POST['phone'] != '') {
                        $phone = $_POST['phone'];
                        $check = checkPhone($phone);
                        if(is_array($check)){
                            if($check['customer_id'] != $target['customer_id'] && $check['phone'] != $target['phone'] ){
                                $err['phone'] = "Số điện thoại đã tồn tại";
                            }
                        }
                    }else{
                        $err['phone'] = "Chưa nhập số điện thoại!";
                    }
                    // pass
                    if($_POST['pass'] != '') {
                        $pass = $_POST['pass'];
                    }else{
                        $err['pass'] = "Chưa nhập mật khẩu!";
                    }
                    // email
                    if($_POST['email'] != '') {
                        $email = $_POST['email'];
                        $check = checkEmail($email);
                        if(is_array($check)){
                            if($check['customer_id'] != $target['customer_id'] && $check['email'] != $target['email']){
                                $err['email'] = "Email đã tồn tại";
                            }
                        }
                    }else{
                        $err['email'] = "Chưa nhập email!";
                    }
                    // status
                        $status = $_POST['status'];
                    // ảnh
                    if(isset($_FILES['img']) && $_FILES['img']['name'] != ''){
                        $img = $_FILES['img']['name'];
                        $path = pathinfo($img, PATHINFO_EXTENSION);
                        $format= ["jpg", "jpeg", "png", "gif"];
                        if (preg_match("/^(" . implode("|", $format) . ")$/", $path)) {
                            if($_FILES['img']['size'] <= 2097082){
                                move_uploaded_file($_FILES['img']['tmp_name'],"../public/img/".$img);
                                }else{
                                    $err['img'] = "Dung lượng vượt quá giới hạn!";
                                }
                        }else{
                            $err['img'] = "File gửi lên không phải là file ảnh!";
                        }
                    }else{
                        $curImg = getCusById($_POST['id']);
                        $img = $curImg['image_url'];
                    }
                    // vai trò
                        $role = $_POST['role'];
                    // id 
                    if(count($err) === 0){
                        updateCustomer($name, $phone, $pass,$email,$status,$img,$role,$id);
                        $noti = "Cập nhật thành công!";
                        $target = getCusById($id);

                      }  
                }
                include_once "./view/pages/customer/update.php";
            }
            // xóa khách hàng
            if($act == 'delete') {
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    deleteCus($id);
                }
                header("location: index.php?url=customer&act=list");
            }
        }
        break; 
    
    // COMMENT
    case 'comment':
        if(isset($_GET['act'])) {
            $act = $_GET['act'];
            // danh sách danh mục
            if($act == 'list') {
                $kw = 0;
                $fil = 0;
                $offset = 0;
                //search
                if(isset($_POST['btn-search'])){
                    if($_POST['keyword'] != ""){
                        $kw = $_POST['keyword'];
                    }else{
                        $errKw = "Chưa nhập từ khóa!";
                    }
                }
                // fillter
                if(isset($_GET['filter'])) {
                    $fil = $_GET['filter'];
                }
                // phân trang
                if(isset($_GET['pagenum'])){
                    $page = $_GET['pagenum'];
                    $offset = ($page - 1) * 10;
                }
                $all =  getAllCMT($kw, $fil);
                $comments = getListCMT($kw, $fil, $offset);
                require_once "./view/pages/comment/list.php";
            }
            // chi tiết cmt
            if($act == 'details') {
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $target = getCMTID($id);
                }
                require_once "./view/pages/comment/details.php";
            }
            // xóa cmt
            if($act == 'delete') {
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    deleteCMT($id);
                }
                header("location: index.php?url=comment&act=list");
            }
        }
        break;
    // CONTACT
    case 'contact':
        $filter = 0;
        $sort = "new";
        $kw = 0;
        $offset = 0;
        if(isset($_GET['pagenum'])) {
            $page = $_GET['pagenum'];
            $offset = ($page - 1)*8;
        }
        if(isset($_POST['btn-search'])) {
            if($_POST['keyword'] != ''){
                $kw = $_POST['keyword'];
            }else{
                $errKw = "Chưa nhập từ khóa!";
            }
        }
        if(isset($_GET['filter'])) {
            $filter = $_GET['filter'];
        }
        if(isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        }
        $all = getAllContact($filter, $sort,$kw);
        $listContact =  getListContact($filter, $sort,$kw,$offset);
        $update_at = date("Y-m-d");
                for($i = 0; $i < sizeof($listContact); $i++) {
                    if(isset($_POST['btn-update-'.$i])) {
                        if(isset($_POST['status-'.$i]) && $_POST['status-'.$i] != ''){
                            $status = $_POST['status-'.$i];
                            $id = $_POST['id-'.$i];
                            updateStatus($id,$status,$update_at);
                            $listContact =  getListContact($filter, $sort,$kw,$offset);
                        }else{
                            $err[$i] = "chưa chọn trạng thái!";;
                        }
                    }
                }

        // xóa thư
        if(isset($_GET['act']) && $_GET['act'] == 'delete') {
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                deleteContact($id);
            }
            
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
            
        
        require_once "./view/pages/contact/list.php";
        break;
    # SHOP
    case 'shop':
        if(isset($_GET['act'])){
            $act = $_GET['act'];
        if($act == 'list') {
            $sort = "new";
            $kw = 0;
            $offset = 0;
            //phân trang
            if(isset($_GET['pagenum'])) {
                $page = $_GET['pagenum'];
                $offset = ($page - 1)* 8;
            }
            // tìm kiếm
            if(isset($_POST['btn-search'])) {
                if($_POST['keyword'] != ''){
                    $kw = $_POST['keyword'];
                }else{
                    $errKw = "Chưa nhập từ khóa!";
                }
            }
            // lọc
            if(isset($_GET['sort'])) {
                $sort = $_GET['sort'];
            }
            $all = getAllShops($sort,$kw);
            $list = getShops($sort,$kw,$offset);

        require_once "./view/pages/shop/list.php";


        }
        }
        // thêm mới địa chỉ shop
        if($act == 'add') {
            $err = [];
            if(isset($_POST['btn-add'])) {
                if($_POST['address'] != '') {
                    $address = $_POST['address'];
                }else{
                    $err['address'] = "Chưa nhập địa chỉ!";
                }
                if($_POST['phone'] != '') {
                    $phone = $_POST['phone'];
                }else{
                    $err['phone'] = "Chưa nhập số điện thoại!";
                }
                if($_POST['link'] != '') {
                    $link = $_POST['link'];
                }else{
                    $err['link'] = "Chưa có link!";
                }
                if(count($err) == 0){
                    addShop($address,$phone,$link);
                    $noti = "Thêm thành công!";
                }
            }
            include_once "./view/pages/shop/add.php";
        }
        // sửa địa chỉ shop
        if($act == 'update') {
            $update_at = date("Y-m-d");
            $err = [];
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $target = getShopById($id);
            }
            if(isset($_POST['btn-update'])) {
                if($_POST['address'] != '') {
                    $address = $_POST['address'];
                }else{
                    $err['address'] = "Chưa nhập địa chỉ!";
                }
                if($_POST['phone'] != '') {
                    $phone = $_POST['phone'];
                }else{
                    $err['phone'] = "Chưa nhập số điện thoại!";
                }
                if($_POST['link'] != '') {
                    $link = $_POST['link'];
                }else{
                    $err['link'] = "Chưa có link!";
                }
                $id = $_POST['id'];
                if(count($err) == 0){
                    updateShop($id,$address,$phone,$link,$update_at);
                    $noti = "Chỉnh sửa thành công!";
                    $target = getShopById($id);

                }
            }
            include_once "./view/pages/shop/update.php";
            }
        break;
        
    // ĐĂNG XUẤT
    case 'logout':
        require_once "../site/view/pages/account/logOut.php";
        header("location: $ROOT_URL");
        break;

    # SIZE
    case "size":
        if(isset($_GET['act'])){
            $act =$_GET['act'];
            if($act == 'list') {
                $list =getListSize();
                require_once "view/pages/size/list.php";
            }
        }
        if($act == "delete"){
            $id = $_GET['id'];
            deleteSize($id);
            header("location: index.php?url=size&act=list");
        }
        if($act == "update"){
            $list = getListResetSize();
            if(isset($_GET['id'])){
            $id = $_GET['id'];
            updateSize($id);
            header("location: index.php?url=size&act=update");
            }
            require_once "view/pages/size/update.php";

        }
        if($act == 'add') {
            $errName = '';
            if(isset($_POST['btn-add'])) {
                $name = $_POST['name'];
                if($_POST['name'] != '') {
                    addSize($name);
                    $noti="Thêm mới thành công!";
                }else{
                    $errName = "Chưa nhập tên size!";
                }
            }
            include_once "./view/pages/size/add.php";
        }
    break;
    // THỐNG KÊ
    default:
        require_once "./view/pages/dashboard/dashboard.php";
        break;
}
// THÔNG KÊ
}else{
    $date = 1;
    if(isset($_GET['date'])){
        $date = $_GET['date'];
    }
    // doanh thu
    $orderCate =  getOrderByCate();
    $top5 = getTop5Pro();
    $rejected = countRejected()['countOrder'];
    $resole = countResole()['countOrder'];
    $countOrder = countAll()['countOrder'];
    $revenue = getRevenue();
    if(isset($_GET['date'])){
        $date = $_GET['date']; 
        if($date == 3) {
            $orderCate =  getOrderByCate3();
            $top5 = getTop5Pro3();
            $rejected = countRejected3()['countOrder'];
            $resole = countResole3()['countOrder'];
            $countOrder = countAll3()['countOrder'];
            $revenue = getRevenue3();
        }
        if($date == 6) {
            $orderCate =  getOrderByCate6();
            $top5 = getTop5Pro6();
            $rejected = countRejected6()['countOrder'];
            $resole = countResole6()['countOrder'];
            $countOrder = countAll6()['countOrder'];
            $revenue = getRevenue6();
        }
    }
    require_once "./view/pages/dashboard/dashboard.php";
    
}

// FOOTER
require_once "./view/layout/footer.php";
?>