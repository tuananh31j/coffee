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

// HEADER
require_once "./view/layout/sideLeft.php";

// CONTENT
if(isset($_GET['url'])) {
    switch ($_GET['url']) {
        
        
    //ORDER
        //danh sách đơn hàng
    case 'order':
        # code...
        break;

        //chi tiết đơn hàng
    case 'order-detail':
        # code...
        break;

        //thêm/chỉnh sửa đơn hàng
    case 'order-edit':
        # code...
        break;

        //cập nhật trạng thái đơn hàng
    case 'order-update-status':
        # code...
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
                if(isset($_POST['btn-search'])) {
                    if($_POST['keyWord'] != ''){
                        $kw = $_POST['keyWord'];
                    }else{
                    $errKw = "Chưa nhập từ khóa!";
                }

                }
                if(isset($_GET['filter'])){
                    $filter = $_GET['filter'];
                }
                $products = getListPro($kw,$filter);
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
                            if(isset($_FILES['img']) && $_FILES['img'] == true){
                                $img = $_FILES['img']['name'];
                                $path = pathinfo($img, PATHINFO_EXTENSION);
                                $format= ["jpg", "jpeg", "png", "gif"];
                                if (preg_match("/^(" . implode("|", $format) . ")$/", $path)) {
                                    move_uploaded_file($_FILES['img']['tmp_name'],"../public/img/".$img);
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
                            move_uploaded_file($_FILES['img']['tmp_name'],"../public/img/".$img);
                        }else{
                            $err['img'] = "File gửi lên không phải là file ảnh!";
                        }
                    }else{
                        $cur = getProById($id);
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
                $customers = getListCustomerBy($kw,$fil);
                    
                
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
                            move_uploaded_file($_FILES['img']['tmp_name'],"../public/img/".$img);
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
                    // name
                    if($_POST['name'] != '') {
                        $name = $_POST['name'];
                    }else{
                        $err['name'] = "Chưa nhập tên khách hàng!";
                    }
                    // phone
                    if($_POST['phone'] != '') {
                        $phone = $_POST['phone'];
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
                            move_uploaded_file($_FILES['img']['tmp_name'],"../public/img/".$img);
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
                    $id = $_POST['id'];
                    if(count($err) === 0){
                        updateCustomer($name, $phone, $pass,$email,$status,$img,$role,$id);
                        $noti = "Cập nhật thành công!";
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
                $comments = getListCMT($kw, $fil);
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
        $listContact =  getListContact($filter, $sort,$kw);
        $update_at = date("Y-m-d");
                for($i = 0; $i < sizeof($listContact); $i++) {
                    if(isset($_POST['btn-update-'.$i]) && $_POST['btn-update-'.$i] != '' && $_POST['btn-update-'.$i]) {
                        if(isset($_POST['status-'.$i])){
                            $status = $_POST['status-'.$i];
                            $id = $_POST['id-'.$i];
                            updateStatus($id,$status,$update_at);
                            $listContact =  getListContact($filter, $sort,$kw);
                        }else{
                            $err = "chưa chọn trạng thái!";;
                        }
                    }
                }
        // xóa sản phẩm
        
        if(isset($_GET['act']) && $_GET['act'] == 'delete') {
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                deleteContact($id);
            }
            
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
            
        
        require_once "./view/pages/contact/list.php";
        break;
    // ĐĂNG XUẤT
    case 'logout':
        require_once "../site/view/pages/account/logOut.php";
        header("location: $ROOT_URL");
        break;

    // THỐNG KÊ
    default:
        require_once "./view/dashboard/dashboard.php";
        break;
}
// THÔNG KÊ
}else{
    require_once "./view/pages/dashboard/dashboard.php";
    
}

// FOOTER
require_once "./view/layout/footer.php";
?>