<?php
ob_start();
require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
require_once "/xampp/htdocs/du-an-1-nhom7/pdo.php";

require_once "models/product.php";
require_once "models/category.php";
require_once "models/customer.php";


require_once "view/layout/header.php";


if(isset($_GET['url'])) {
    switch ($_GET['url']) {
    case 'product':
        // danh sách danh mục
        $categorys = getListCategory();
        $allPro = getProducts();
        
        $sortStyle = "asc";
        $sortType = "name";
        $products = getListProduct(0,$sortType, $sortStyle);
        // lấy ra sản phẩm cho mỗi trang
        if(isset($_GET['pagenum'])) {
            
            $pageNumber = $_GET['pagenum'];
            $offset= ($pageNumber - 1) * 12;
            $products = getListProduct($offset,$sortType, $sortStyle);
            if(isset($_GET['category']) && $_GET['category'] != 0) {
                $category = $_GET['category'];
                $products = getListProductsByCate($category,$offset,$sortType, $sortStyle);
            }
        }
        if(isset($_GET['category'])) {
            $category = $_GET['category'];
            $allPro = getProductsByCate($category,$sortType, $sortStyle);
            
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

        
        
        require_once "view/pages/product.php";
        break;
    case "login":
        
        if(isset($_POST['btn-login']) && $_POST['btn-login'] == true) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            
            $user = checkLogin($email, $pass);
            
            if(is_array($user)) {
                $_SESSION['user'] = $user;
                $noti ="Đăng nhập thành công!";
                header("location: /du-an-1-nhom7/");
                
            }else{
                $noti = "Dữ liệu không khớp!";
            } 
          
        
        }
        
        require_once "view/pages/account/logIn.php";
        
        
        
        
        break;

    case 'logout':
        require_once "view/pages/account/logOut.php";
        header("location: index.php");
        break;

    case "signup":
        
            require_once "view/pages/account/signUp.php";
        
        break;

    case "account":
        
            require_once "view/pages/account/info.php";
        
        break;
        

    // ORDER
    case "cart":
        require_once "view/pages/order/cart.php";
        break;
    
    case "/":
        require_once "view/pages/home.php";
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