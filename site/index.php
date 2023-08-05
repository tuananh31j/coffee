<?php
// global
require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
// models
require_once "models/product.php";
require_once "models/category.php";
require_once "models/customer.php";
require_once "models/size.php";
require_once "models/contact.php";
require_once "models/feedback.php";
require_once "models/addressShop.php";
require_once "models/order.php";

# HEADER
$categorys = getListCategory();
$cartNum = 0;
if(isset($_SESSION['cart'])) {
    $cartNum = count($_SESSION['cart']);
}
require_once "view/layout/header.php";

# CONTENT
if(isset($_GET['url'])) {
    switch ($_GET['url']) {
    # TRANG SẢN PHẨM
    case 'product':
        // danh sách danh mục
        $sortStyle = "asc";
        $sortType = "product.name";
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
            // ảnh
                $img = "default.png";
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
                        // phone
                        if($_POST['phone'] != '') {
                            $phone = $_POST['phone'];
                            $check = checkPhone($phone);
                            if(is_array($check)){
                                if($check['customer_id'] != $_SESSION['user']['customer_id'] && $check['phone'] != $_SESSION['user']['phone'] ){
                                    $err['phone'] = "Số điện thoại đã tồn tại";
                                }
                            }
                        }else{
                            $err['phone'] = "Chưa nhập số điện thoại!";
                        }
                        // địa chỉ
                        if(isset($_POST['address'])){
                            $address = $_POST['address'];
                        }else{
                            $address = '';
                        }
                        // email
                        if($_POST['email'] != '') {
                            $email = $_POST['email'];
                            $check = checkEmail($email);
                            if(is_array($check)){
                                if($check['customer_id'] != $_SESSION['user']['customer_id'] && $check['email'] != $_SESSION['user']['email']){
                                    $err['email'] = "Email đã tồn tại";
                                }
                            }
                        }else{
                            $err['email'] = "Chưa nhập email!";
                        }
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
                            $img = $_SESSION['user']['image_url'];
                        }
                        // ngày sửa
                        $update_at = date("Y-m-d");
                        // id
                        $id = $_POST['id'];
                        // kiểm tra và đẩy lên hệ thống
                       if(count($err) == 0) {
                            $_SESSION['user']['name'] = $name;
                            $_SESSION['user']['update_at'] = $update_at;
                            $_SESSION['user']['address'] = $address;
                            $_SESSION['user']['phone'] = $phone;
                            $_SESSION['user']['email'] = $email;
                            $_SESSION['user']['image_url'] = $img;
                            updateInfo($name,$update_at,$address,$phone,$email,$img,$id);
                            $noti = "Cập nhật thành công!";
                       }
                    }
            require_once "view/pages/account/edit.php";
                
            }
            // Đơn hàng của tôi
            if($act == 'myOrder') {
                $update_at = date('Y-m-d');

                if(isset($_SESSION['user'])){
                    $id = $_SESSION['user']['customer_id'];
                    $myOrder = getOrderByCus($id);
                }
                // chuyển sang hủy đơn
                if(isset($_GET['idCancel'])) {
                    $id = $_GET['idCancel'];
                    $update_at = date('Y-m-d');
                    updateOrderStatus($id,4,$update_at);
                    header("location: index.php?url=account&act=myOrder");
                }
                // chuyển trạng thái thành công
                if(isset($_GET['idDone'])) {
                    $id = $_GET['idDone'];
                    $update_at = date('Y-m-d');
                    updateOrderStatus($id,3,$update_at);
                }
                // chi tiết đơn
                if(isset($_GET['idDetails'])) {
                    $id = $_GET['idDetails'];
                    $back = 0;
                    if(isset($_SESSION['user'])){
                        $back = 1;
                    }
                    header("location: $SITE_URL/view/pages/order/orderDetail.php?id=$id&back=$back");
                }
                // xóa đơn
                if(isset($_GET['idDelete'])) {
                    $id = $_GET['idDelete'];
                    updateOrderStatus($id,7,$update_at);
                    header("location: index.php?url=account&act=myOrder");
                }
                // đánh giá
                if(isset($_GET['idFeedback'])) {
                    $id = $_GET['idFeedback'];
                    
                }
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
            // feedback
            if($act = 'feedback'){
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $details = getOrderDetail($id);
                require_once "view/pages/account/feedback.php";
                }

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
    
    
    # TRANG GIỚI THIỆU
    case "aboutus":
        require_once "view/pages/aboutUs.php";
        break;
    
    
    
    # PAY
    case "pay":
        // chuyển đến trang điền thông tin nhận hàng
       $listShops = getShops();
       if(isset($_POST['btn-submit'])){
        foreach($_SESSION['cart'] as $key => $item) {
            
                if($item['id'] == $_POST['id'][$key]) {
                    $_SESSION['cart'][$key]['quantity'] = $_POST['quantity'][$key];
                }
            
        }
        //thêm vào giỏ
       
        
       }
       $listCart = $_SESSION['cart']; 


        // thanh toán
        $err = array();

        if(isset($_POST['btn-pay'])) {
            //shop
           if($_POST['shop'] != ''){
            $shop = $_POST['shop'];
           }else{
            $err['shop'] = "Chưa chọn cửa hàng!";
           }
            // id cus
                $idCus = $_POST['idCus'];
             //shop
           if($_POST['name'] != ''){
            $name = $_POST['name'];
           }else{
            $err['name'] = "Chưa nhập tên người nhận!";
           }  
           // phone
           if($_POST['phone'] != ''){
            $phone = $_POST['phone'];
           }else{
            $err['phone'] = "Chưa nhập số điện thoại!";
           }  
            // email
            if($_POST['email'] != ''){
                $email = $_POST['email'];
                }else{
                $err['email'] = "Chưa nhập email!";
                }  
           
            // địa chỉ nhận hàng
            if($_POST['address'] != ''){
                $address = $_POST['address'];
               }else{
                $err['address'] = "Chưa nhập địa chỉ nhận hàng!";
               }  
           
            $note = $_POST['note'];
            if(count($err) === 0){
                $result = addOrder($shop,$idCus,$phone,$name,$email,$address,$note);
                if(isset($_SESSION['cart'])) {
                    foreach($_SESSION['cart'] as $key => $pro) {
                        $idSize = $pro['size'];
                        $targetPro = getProById($pro['id']);
                        $idOrder = $result;
                        $idPro = $pro['id'];
                        $quantity = $pro['quantity'];
                        $cost = getPrice($idPro,$pro['size'])['price'];
                        $priceSale = $cost*$targetPro['sale']/100;
                        $price = $cost - $priceSale;
                        $totalPrice = $price*$quantity;
                        addOrderDetails($idOrder,$idPro,$idSize,$quantity,$price,$totalPrice);
                        $noti = "ok";
                        continue;
                        
                        
                    }
                    unset($_SESSION['cart']);
                        header("location: $SITE_URL/view/pages/order/orderDetail.php?id=$result");
                }
            }else{
                $listCart = $_SESSION['cart']; 
            }
                
            
        }
        require_once "view/pages/order/pay.php";
        break;

    # ORDER DETAILS
    case "orderdetails":
        if(isset($_SESSION['cart'])) {
           $listCart = $_SESSION['cart']; 
        }
        //xóa sản phẩm trong giỏ hàng
        if(isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['cart'][$index]);
            header("location: index.php?url=cart");
        }
        
        require_once "view/pages/order/cart.php";
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
            header("location: index.php?url=cart");
        }
        
        require_once "view/pages/order/cart.php";
        break;

    # TRANG CHI TIẾT SẢN PHẨM
    case "proDetails":
        $listSize = getListSize();
        if(isset($_GET['id'])){
            $idPro = $_GET['id'];
            $item = getProFeedback($idPro);
            $countFB =  getFeedbackCountById($idPro);
            if($item == []) {
                $item = getProNoFeedback($idPro);
            }
            if(isset($_GET['view']) && $_GET['view'] > 0) {
                $view = $_GET['view'];
                updateView($idPro,$view);
            }
        }
        $target = $item;
        $products = getAllByCate($target['category_id']);

         // thêm vào giỏ hàng
         if(isset($_POST['btn-addToCart']) && $_POST['btn-addToCart'] == true ) {
            $cartProducts = ["id" => $_POST['id'],
                            "name" => $_POST['name'],
                            "img" => $_POST['img'],
                            "size" => $_POST['size'],
                            "quantity" => $_POST['quantity'],
                        ];
                        //kiểm tra sản phẩm có size này không
                        if(getPrice($_POST['id'],$_POST['size']) !== []){
                            // thêm vào cart
                            if(!isset($_SESSION['cart'])) {
                                $_SESSION['cart'] = [];
                                array_push($_SESSION['cart'], $cartProducts);
                                header("location: index.php?url=proDetails&id=".$cartProducts['id']);
                            }else{
                                if(count($_SESSION['cart']) != 0){
                                    foreach($_SESSION['cart']  as $key => $item) {
                                    if($item['id'] == $cartProducts['id'] && $item['size'] == $cartProducts['size']) {
                                        $_SESSION['cart'][$key]['quantity'] = $item['quantity'] + $cartProducts['quantity'];
                                        break;
                                    }
                                    if($key < sizeof($_SESSION['cart']) - 1){ 
                                    continue;
                                    }
                                    array_push($_SESSION['cart'], $cartProducts);
                                    header("location: index.php?url=proDetails&id=".$cartProducts['id']);
                                } 
                                }else{
                                    array_push($_SESSION['cart'], $cartProducts);
                                    header("location: index.php?url=proDetails&id=".$cartProducts['id']);
                                }
                                  
                            } 
                        }
           
        }
       
        require_once "view/pages/detailsPro/proDetails.php";
        break;
    # FIND ORDER
    case "findMyOrder":
        $id = '';
        if(isset($_POST['btn-find'])){
            $id = $_POST['id'];
        
        }
        $myOrder = getOrderById($id);

        require_once "view/pages/findOrder.php";
        break;
    # SHOP
    case "shop":
        $list = getShops();
        require_once "view/pages/shop.php";
        break;
    # THÊM VÀO GIỎ HÀNG VÀ CHUYỂN HƯỚNG ĐẾN PAY(thanh toán)
    case "now":
        //thêm vào giỏ và đi đến thanh toán
        if(isset($_POST['btn-add']) && $_POST['btn-add'] == true ) {
            
            if(is_array(getPrice($_POST['id'],$_POST['size']))){
                $cartProducts = ["id" => $_POST['id'],
                                "name" => $_POST['name'],
                                "img" => $_POST['img'],
                                "size" => $_POST['size'],
                                "quantity" => $_POST['quantity'],
                            ];
                if(!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                    array_push($_SESSION['cart'], $cartProducts);
                    header("location: index.php?url=pay");
    
                }else{
                    if(count($_SESSION['cart']) != 0){
                        foreach($_SESSION['cart']  as $key => $item) {
                        if($item['id'] == $cartProducts['id'] && $item['size'] == $cartProducts['size']) {
                            $_SESSION['cart'][$key]['quantity'] = $item['quantity'] + $cartProducts['quantity'];
                            break;
                        }
                        if($key < sizeof($_SESSION['cart']) - 1){ 
                        continue;
                        }
                        array_push($_SESSION['cart'], $cartProducts);
                        header("location: index.php?url=pay");
                    } 
                    }else{
                        array_push($_SESSION['cart'], $cartProducts);
                        header("location: index.php?url=pay");
                    }
                      
                } 
            }else{
                echo '<script>
                alert("Sản phẩm không có size này!!");
                window.location = "' . $_SERVER['HTTP_REFERER'] . '";
              </script>';
            }
        }
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