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
        
    // Đăng xuất
    case 'logout':
        require_once "view/pages/account/logOut.php";
        header("location: index.php");
        break;

    case "signup":
    if(isset($_POST['btn-client'])){

        $dir = "./public/img/";
        $up_file = $dir . $_FILES['anh']['name'];
       if (move_uploaded_file($_FILES['anh']['tmp_name'], $up_file)) {
          
       }
            $name= $_POST['name'];
            $password1= $_POST['password1'];
            $password2= $_POST['password2'];
             $address= $_POST['address'];
            $phone= $_POST['phone'];
            $email= $_POST['email'];
            $image="/".$_FILES['anh']['name'];
            $kichhoat= 1;
            $vaitro= 0;
            
            $check = AddCustumerclient($name,$password2,$address,$phone,$email,$kichhoat,$vaitro,$image);
       
            
    
      
       
        }
            require_once "view/pages/account/signUp.php";
        
        break;

    case "account":
        
            require_once "view/pages/account/info.php";
        
        break;

        //Đổi mật khẩu
        case "edit":
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $old_password = $_POST["old_password"];
                $new_password = $_POST["new_password"];
            
                
                $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$old_password'";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                   
                    $sql_update = "UPDATE users SET password = '$new_password' WHERE username = '$username'";
                    if ($conn->query($sql_update) === TRUE) {
                        echo "Đổi mật khẩu thành công!";
                    } else {
                        echo "Có lỗi xảy ra khi đổi mật khẩu: " . $conn->error;
                    }
                } else {
                    echo "Tên người dùng hoặc mật khẩu cũ không đúng.";
                }
            }
            require_once "view/pages/account/edit.php";
            break;
            
    // ORDER
    case "cart":
        if(isset($_SESSION['cart'])) {
           $listCart = $_SESSION['cart']; 
        }
        if(isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['cart'][$index]);
        }
        
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