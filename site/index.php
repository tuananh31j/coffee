<?php
require_once "/xampp/htdocs/du-an-1-nhom7/global.php";

// models
require_once "models/product.php";
require_once "models/category.php";
require_once "models/customer.php";
require_once "models/size.php";


require_once "view/layout/header.php";


if(isset($_GET['url'])) {
    switch ($_GET['url']) {
    // trang sản phẩm
    case 'product':
        // danh sách danh mục
        $sortStyle = "asc";
        $sortType = "name";
        $filterType = 0;
        // lọc sản phẩm theo giá
        if(isset($_GET['filter']) && $_GET['filter'] != 0) {
            $filterType = $_GET['filter'];
            
        }
        //sắp xêp sản phẩm
        if(isset($_GET['sort']) && $_GET['sort'] != 0) {
            $sort = $_GET['sort'];
            if($sort == 'az'){
                $sortStyle = "asc";
            }
            if($sort == 'za'){
                $sortStyle = "desc";
            }
            if($sort == 'priceup'){
                $sortType = "price";
            }
            if($sort == 'pricedown'){
                $sortStyle = "desc";
                $sortType = 'price';
            }
            if($sort == 'new'){
                $sortType = "product.product_id";
                $sortStyle = "desc";
            }
            if($sort == 'old'){
                $sortType = "product.product_id";
                $sortStyle = "asc";
            }
        }
        $offset= 0;
        $categorys = getListCategory();
        $allPro = getAllProducts($sortType, $sortStyle, $filterType);
        $products = getListProduct(0,$sortType, $sortStyle, $filterType);
        $listSize = getListSize();

        
        // lấy ra sản phẩm cho mỗi trang
        if(isset($_GET['pagenum'])) {
            
            $pageNumber = $_GET['pagenum'];
            $offset= ($pageNumber - 1) * 12;
            $products = getListProduct($offset,$sortType, $sortStyle, $filterType);
            if(isset($_GET['category']) && $_GET['category'] != 0) {
                $category = $_GET['category'];
                $products = getListProductsByCate($category,$offset,$sortType, $sortStyle, $filterType);
            }
        }
        if(isset($_GET['category']) && $_GET['category'] != 0) {
                $category = $_GET['category'];
                $allPro = getAllProductsByCate($category,$sortType, $sortStyle, $filterType);
                $products = getListProductsByCate($category,$offset,$sortType, $sortStyle, $filterType);
                
            }

        // thêm vào giỏ hàng
        
        if(isset($_POST['btn-addToCart']) && $_POST['btn-addToCart'] == true ) {
            $cartProducts = ["id" => $_POST['id'],
                            "name" => $_POST['name'],
                            "img" => $_POST['img'],
                            "price" =>$_POST['price'],
                            "size" => $_POST['size'],
                            "quantity" => $_POST['quantity'],
                            "img" => $_POST['img']
                        ];
            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
                array_push($_SESSION['cart'], $cartProducts);
            }else{
                array_push($_SESSION['cart'], $cartProducts);
            }
            
            
            
        }
        require_once "view/pages/product.php";
        break;

    // đăng nhập
    case "login":
        if(isset($_POST['btn-login']) && $_POST['btn-login'] == true) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            
            $user = checkLogin($email, $pass);
            if($email == '') {
                $errEmail = "Chưa nhập email!";
            }
            if($pass == '') {
                $errPass = "Chưa nhập mật khẩu!";
            }
            if($email != '' && $pass != '' ) {
                if(is_array($user)) {
                $_SESSION['user'] = $user;
                $noti ="Đăng nhập thành công!";
                header("location: /du-an-1-nhom7/");
                
            }else{
                $noti = "Dữ liệu không khớp!";
            } 
            }
        }
        require_once "view/pages/account/logIn.php";
        break;
        
    // đăng ký
    case "signup":
        $err = [];
        if(isset($_POST['btn-signup']) && $_POST['btn-signup'] == true) {
        // handle 
            // name
            if($_POST['name'] != ''){
                $name = $_POST['name'];
            }else{
                $err['name'] = 'Chưa điền tên!';
            }
            // số điện thoại
            if($_POST['phone'] != ''){
                $phone = $_POST['phone'];
            }else{
                $err['phone'] = 'Chưa điền số điện thoại!';
            }
            
            // email
            if($_POST['email'] != ''){
                $email = $_POST['email'];
            }else{
                $err['email'] = 'Chưa điền email!';
            }
            // ảnh
            if(isset($_FILES['img']['name']) && $_FILES['img']['name'] != '' ){
                $img = $_FILES['img']['name'];
                $path = pathinfo($img, PATHINFO_EXTENSION);
                $format= ["jpg", "jpeg", "png", "gif"];
                if (preg_match("/^(" . implode("|", $format) . ")$/", $path)) {
                    move_uploaded_file($IMAGE,$img);
                }else{
                    $err['img'] = "File gửi lên không phải là file ảnh!";
                }
            }else{
                $img = "default.png";
            }
            // mật khẩu
            if($_POST['pass'] != ''){
                if($_POST['pass'] == $_POST['rePass']) {
                    $pass = $_POST['pass'];
                }else{
                    $err['pass'] = "Mật khẩu không trùng khớp!";
                }
            }else{
                $err['pass'] = 'Chưa điền mật khẩu!';
            }
            // kiểm tra và đẩy lên hệ thống
            if(count($err) === 0) {
                handleSigup( $name,$pass, $phone, $email,$img);
                $noti = "Đăng ký thành công!";
            }
        }
        require_once "view/pages/account/signUp.php";
        break;

    case "account":
        $err = [];
        if(isset($_GET['act'])) {

            
             if($_GET['act'] == 'edit') {
                $act = $_GET['act'];
                $err=[];
            if(isset($_POST['btn-edit']) && $_POST['btn-edit'] == true) {
            // handle 
                // name
                if($_POST['name'] != ''){
                    $name = $_POST['name'];
                }else{
                    $err['name'] = 'Chưa điền tên!';
                }
                // số điện thoại
                if($_POST['phone'] != ''){
                    $phone = $_POST['phone'];
                }else{
                    $err['phone'] = 'Chưa điền số điện thoại!';
                }
                // địa chỉ
                
                    $address = $_POST['address'];
                
                
                // email
                if($_POST['email'] != ''){
                    $email = $_POST['email'];
                }else{
                    $err['email'] = 'Chưa điền email!';
                }
                // ảnh
                if(isset($_FILES['img']) && $_FILES['img'] == true){
                    $img = $_FILES['img']['name'];
                    $path = pathinfo($img, PATHINFO_EXTENSION);
                    $format= ["jpg", "jpeg", "png", "gif"];
                    if (preg_match("/^(" . implode("|", $format) . ")$/", $path)) {
                        move_uploaded_file($IMAGE,$img);
                    }else{
                        $err['img'] = "File gửi lên không phải là file ảnh!";
                    }
                }else{
                    $img = $_SESSION['user']['image_url'];
                }
                $update_at = date("Y-m-d");
                $id = $_POST['id'];
                // kiểm tra và đẩy lên hệ thống
                if(count($err) === 0) {
                    //chỉnh sửa ngày
                    $result = editInfo($name,$update_at,$address,$phone,$email,$img,$id);
                    if($result) {
                    $_SESSION['user']['name'] = $_POST['name'];
                    $_SESSION['user']['update_at'] = $update_at;
                    $_SESSION['user']['address'] = $address;
                    $_SESSION['user']['phone'] = $phone;
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['image_url'] = $img;
                    }
                }
            }
            require_once "view/pages/account/edit.php";
                require_once "view/pages/account/myOrder.php";
            }
            if($_GET['act'] == 'myOrder') {
                $act = $_GET['act'];
                require_once "view/pages/account/myOrder.php";
            }
            if($_GET['act'] == 'pass') {
                $act = $_GET['act'];
                require_once "view/pages/account/changePass.php";
            }
            if($_GET['act'] == 'hisOrder') {
                $act = $_GET['act'];
                require_once "view/pages/account/historyOrder.php";
            }
            if($_GET['act'] == 'logout') {
                $act = $_GET['act'];
                require_once "view/pages/account/logOut.php";
                header("location: index.php");
            }
        }else{
            require_once "view/pages/account/info.php";
        }
        break;
    case "changePass":
        
        require_once "view/pages/account/changePass.php";
    
    break;
            
    // ORDER
    case "cart":
        if(isset($_SESSION['cart'])) {
           $listCart = $_SESSION['cart']; 
        }
        //xóa sản phẩm trong giỏ hàng
        if(isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['cart'][$index]);
        }
        
        require_once "view/pages/order/cart.php";
        break;
    
    case "editinfo":
        
           
        
        break;
        
    default:
        require_once "view/pages/home.php";
        break;
}
}else{
    
    require_once "view/pages/home.php";
}

require_once "view/layout/footer.php";



?>