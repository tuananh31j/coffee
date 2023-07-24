<?php

require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
require_once "/xampp/htdocs/du-an-1-nhom7/pdo.php";
require("../admin/models/customer.php");

require_once "./view/layout/sideLeft.php";
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
        //danh sách danh mục có trạng thái bằng 1(on)
    case 'category':
        # code...
        break;

        //chỉnh sửa danh mục
    case 'category-update':
        # code...
        break;

        //xóa danh mục. Nếu có khóa ngoại thì chỉ tắt trạng thái sang 0(off)
    case 'category-delete':
        # code...
        break;
        

        
    //PRODUCT
        //danh sách sản phẩm. Phải có trạng thái là 1(on)
    case 'product':
        # code...
        break;

        //chỉnh sửa sản phẩm
    case 'product-update':
        # code...
        break;

        //xóa sản phẩm. Nếu có khóa ngoại thì chuyển trạng thái sang 0(off)
    case 'product-delete':
        # code...
        break;


    case 'customer':
        if(isset($_POST['btn'])){
             $dir = "../public/img/";
            $up_file = $dir . $_FILES['anh']['name'];
       if (move_uploaded_file($_FILES['anh']['tmp_name'], $up_file)) {
          
       }
       
    
      $name= $_POST['name'];
       $password1= $_POST['password1'];
       $password2= $_POST['password2'];
        $address= $_POST['address'];
       $phone= $_POST['phone'];
       $email= $_POST['email'];
       $kichhoat= $_POST['kichhoat'];
       $vaitro= $_POST['vaitro'];
       $image="/".$_FILES['anh']['name'];
       
       $check = AddCustumer($name,$password2,$address,$phone,$email,$kichhoat,$vaitro,$image);
      
       
        }

        if(isset($_GET['id'])){
   $id = $_GET['id'];
   $dataupdate = getOneupdate($id);
   if(isset($_POST['btn-update'])){
        $name= $_POST['name'];
        $address= $_POST['address'];
       $phone= $_POST['phone'];
       $email= $_POST['email'];
       $kichhoat= $_POST['kichhoat'];
       $vaitro= $_POST['vaitro'];
       $check = updateCustumer($id,$name,$address,$phone,$email,$kichhoat,$vaitro);
       header("location:index.php?url=customer-list");
   }
   

}
        
       require_once("../admin/view/pages/custumer/custumer.php");
        break;
     case 'customer-list':
          $checkdelete='';  
        $arrcustumer = GetAllCustumer();
        if(isset($_POST['delete'])){
           $id = $_POST['id'];
           DeleteCustumer($id);
            $checkdelete="Bạn đã xóa người dùng thành công";
              $arrcustumer = GetAllCustumer();
        }
            require_once("../admin/view/pages/custumer/listcustumer.php");
    break;
    case 'comment':
        # code...
        break;




    case 'logout':
        require_once "../site/view/pages/account/logOut.php";
        header("location: $ROOT_URL");
        break;

    default:
        require_once "./view/dashboard/dashboard.php";
        break;
}
}else{
    require_once "./view/pages/dashboard/dashboard.php";
    
}

require_once "./view/layout/footer.php";
?>