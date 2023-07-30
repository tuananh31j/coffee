<?php
// global
require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
// models
require_once "models/product.php";
require_once "models/category.php";
require_once "models/customer.php";
require_once "models/size.php";
require_once "models/contact.php";

# HEADER
require_once "view/layout/header.php";

# CONTENT
if(isset($_GET['url'])) {
    switch ($_GET['url']) {
    # TRANG SẢN PHẨM
    case 'product':
        // danh sách danh mục
        $sortStyle = "asc";
        $sortType = "name";
        $filterType = 0;
        $kw = 0;
        // tìm kiếm
        if(isset($_POST['btn-search'])) {
            if($_POST['keyword'] != ''){
                $kw = $_POST['keyword'];
            }else{
                $errKw = "Chưa nhập từ khóa!";
            }
        }
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
        $allPro = getAllProducts($sortType, $sortStyle, $filterType,$kw);
        $products = getListProduct($offset,$sortType, $sortStyle, $filterType,$kw);
        $listSize = getListSize();

        
        // lấy ra sản phẩm cho mỗi trang
        if(isset($_GET['pagenum'])) {
            
            $pageNumber = $_GET['pagenum'];
            $offset= ($pageNumber - 1) * 12;
            $products = getListProduct($offset,$sortType, $sortStyle, $filterType,$kw);
            if(isset($_GET['category']) && $_GET['category'] != 0) {
                $category = $_GET['category'];
                $products = getListProductsByCate($category,$offset,$sortType, $sortStyle, $filterType,$kw);
            }
        }
        if(isset($_GET['category']) && $_GET['category'] != 0) {
                $category = $_GET['category'];
                $allPro = getAllProductsByCate($category,$sortType, $sortStyle, $filterType,$kw);
                $products = getListProductsByCate($category,$offset,$sortType, $sortStyle, $filterType,$kw);
                
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

    # ĐĂNG NHẬP
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
        
    # ĐĂNG KÝ
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

    # TRANG TÀI KHOẢN
    case "account":
        $err = [];
        if(isset($_GET['act'])) {
            $act = $_GET['act'];
            // Cập nhât tài khoản
             if($act === 'update') {
                    $err= array();
                    if(isset($_POST['btn-update'])) {
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
                        if(isset($_POST['address'])){
                            $address = $_POST['address'];
                        }else{
                            $address = '';
                        }
                        // email
                        if($_POST['email'] != ''){
                            $email = $_POST['email'];
                        }else{
                            $err['email'] = 'Chưa điền email!';
                        }
                        // ảnh
                        if(isset($_FILES['img']) && $_FILES['img']['name'] != 'true'){
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
                        // ngày sửa
                        $update_at = date("Y-m-d");
                        // id
                        $id = $_POST['id'];
                        // kiểm tra và đẩy lên hệ thống
                       if(isset($name) && isset($email) && isset($phone) && isset($img) && isset($address)) {
                            $_SESSION['user']['name'] = $name;
                            $_SESSION['user']['update_at'] = $update_at;
                            $_SESSION['user']['address'] = $address;
                            $_SESSION['user']['phone'] = $phone;
                            $_SESSION['user']['email'] = $email;
                            $_SESSION['user']['image_url'] = $img;
                            updateInfo($name,$update_at,$address,$phone,$email,$img,$id);
                       }
                    }
            require_once "view/pages/account/edit.php";
                require_once "view/pages/account/myOrder.php";
            }
            // Đơn hàng của tôi
            if($act == 'myOrder') {
                require_once "view/pages/account/myOrder.php";
            }
            // Đổi mật khẩu
            if($act == 'changePass') {
                $err = [];
                if(isset($_POST['btn-update'])) {
                    $id = $_POST['id'];
                    if($_POST['curPass'] != '') {
                        $curPass = $_POST['curPass'];
                        $check = checkPass($id,$curPass);
                        if(!is_array($check)){
                        $err['curPass'] = "Mật khẩu không đúng!";
                        }
                    }else{
                        $err['curPass'] = "Chưa điền mật khẩu cũ";
                    }
                    if($_POST['newPass'] != '') {
                        $newPass = $_POST['newPass'];
                    }else{
                        $err['newPass'] = "Chưa điền mật khẩu mới";
                    }
                    if($_POST['rePass'] != '') {
                        $rePass = $_POST['rePass'];
                    }else{
                        $err['rePass'] = "Chưa điền mật khẩu mới";
                    }
                    if(isset($rePass) && isset($newPass) && $rePass != $newPass) {
                        $err['pass'] = "Mật khẩu không trùng khớp";
                    }
                    if(count($err) === 0) {
                        changePass($id,$newPass);
                        $noti = "Đổi mật khẩu thành công!";
                    }
                }
                require_once "view/pages/account/changePass.php";
            }
            // lịch sử mua hàng
            if($act == 'hisOrder') {
                require_once "view/pages/account/historyOrder.php";
            }
            // Đăng xuất
            if($act == 'logout') {
                require_once "view/pages/account/logOut.php";
                header("location: index.php");
            }
        }else{
            require_once "view/pages/account/info.php";
        }
        break;
    
    # CONTACT
    case "contact":
        $err = array();
        if(isset($_POST['btn-send']) && $_POST['btn-send']) {
            if(isset($_POST['name']) && $_POST['name'] != '') {
                $name = $_POST['name'];
            }else{
                $err['name'] = "Chưa điền tên!";
            }
            if(isset($_POST['email']) && $_POST['email'] != '') {
                $email = $_POST['email'];
            }else{
                $err['email'] = "Chưa điền email!";
            }
            if(isset($_POST['phone']) && $_POST['phone'] != '') {
                $phone = $_POST['phone'];
            }else{
                $err['phone'] = "Chưa điền số điện thoại!";
            }
            if(isset($_POST['content']) && $_POST['content'] != '') {
                $content = $_POST['content'];
            }else{
                $err['content'] = "Chưa điền nội dung!";
            }
            if(count($err) == 0) {
                addContact($name,$email,$phone,$content);
                $noti = "Gửi thành công!";
            }
        }
        require_once "view/pages/contact.php";
        break;
    # ORDER
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
    
    # TRANG GIỚI THIỆU
    case "aboutus":
        require_once "view/pages/aboutUs.php";
        break;

    # TRANG CHI TIẾT SẢN PHẨM
    case "proDetails":
        $listSize = getListSize();
        if(isset($_GET['id'])){
            $idPro = $_GET['id'];
            $item = getProFeedback($idPro);
            if($item == []) {
                $item = getProNoFeedback($idPro);
            }
        }
        $target = $item;
        require_once "view/pages/detailsPro/proDetails.php";
        break;
    # TRANG CHỦ
    default:
        require_once "view/pages/home.php";
        break;
}
# TRANG CHỦ
}else{
    // if(isset($_GET['keyword'])) {
    //     $kw = $_GET['keyword'];
    //     header("Location: index.php?url=product&keyword=$kw");
    // }
    if(isset($_POST['btn-search'])) {
        if($_POST['keyword'] != ''){
            $kw = $_POST['keyword'];
        }else{
            $errKw = "Chưa nhập từ khóa!";
        }
    }
    $listProSale = getProSale();
    $listProNew = getNewPro();
    $listSize = getListSize();
    require_once "view/pages/home.php";
}

# FOOTER
require_once "view/layout/footer.php";



?>