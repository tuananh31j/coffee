<?php

require_once "/xampp/htdocs/du-an-1-nhom7/global.php";

require_once "/xampp/htdocs/du-an-1-nhom7/pdo.php";
require_once "../admin/models/customer.php";
require_once "../admin/models/product.php";
require_once "../admin/models/size.php";
require_once "../admin/models/category.php";

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
    case 'add_categories':
        if(isset($_POST['btn-add'])&&$_POST['btn-add']) {
            $name=$_POST['name'];
            addCategory($name);
            $noti="addtion complete !";
        }
        include_once "./view/pages/category/add.php";
        break;
        
    case 'list_category':
        //search danh mục
        if(isset($_POST['keyword']) && $_POST['keyword']!=""){
            $key = $_POST['keyword'];
            $sql="select * from category where name like '%$key%' ";
        }else {
            $categorys = getListCategory();
        }
        
        require_once "./view/pages/category/list.php";
        break; 

        //chỉnh sửa danh mục
    case 'category-update':
        # code...
        if(isset($_GET['category_id'])){
            $id = $_GET['category_id'];
            $item = getCategory($id);
            if(isset($_POST['btn-update']) && $_POST['btn-update'] == true) {
                $name = $_POST['name'];
                updateCate($name, $id);
            }
            
        }
        require_once "./view/pages/category/update.php";
        break;

        //xóa danh mục. Nếu có khóa ngoại thì chỉ tắt trạng thái sang 0(off)
    case 'category-delete':
        # code...
        if(isset($_GET['category_id'])&&$_GET['category_id']>0){
            $id = $_GET['category_id'];
            deleteCate($id);
            
        }
        
        header("location: index.php?url=list_category");
        break;
    
    case 'tangdan':
        $sql = "select * from category order by name ASC";
        $cate=pdo_query($sql);
        require_once "./view/pages/category/list.php";
        break;
    
    case 'giamdan':
        $sql = "select * from category order by name DESC";
        $cate=pdo_query($sql);
        require_once "./view/pages/category/list.php";
        break;

        
    //PRODUCT
    case 'product':
        if(isset($_GET['act'])) {
            // danh sách sản phẩm
            if($_GET['act'] == 'list') {
                $kw = '';
                $filter = '';
                if(isset($_POST['btn-search'])) {
                    $kw = $_POST['keyWord'];
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
            if($_GET['act'] == 'delete' && isset($_GET['id'])) {
                $id = $_GET['id'];
                handleDelete($id);
                header("location: index.php?url=product&act=list");
            }
            // sửa sản phẩm
            if($_GET['act'] == 'update' && isset($_GET['id'])) {
                $err = [];
                $listSize = getListSize();
                $listCategory = getListCategory();
                $id = $_GET['id'];
                $target = getProById($id);
                $listProDetail = getlistProDetailById($id);
                    if(isset($_POST['btn-update']) && $_POST['btn-update']) {
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
                            // if(isset($_FILES['img']['name']) && $_FILES['img']['name'] != ''){
                            //     $img = $_FILES['img']['name'];
                            //     $path = pathinfo($img, PATHINFO_EXTENSION);
                            //     $format= ["jpg", "jpeg", "png", "gif"];
                            //     if (preg_match("/^(" . implode("|", $format) . ")$/", $path)) {
                            //         move_uploaded_file($_FILES['img']['tmp_name'],"../public/img/".$img);
                            //     }else{
                            //         $err['img'] = "File gửi lên không phải là file ảnh!";
                            //     }
                            // }else{
                            //     $img = $target['image_url'];
                            // }
                            //category
                            $img = $target['image_url'];
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
                            $update_at = date("Y-m-d");
                           $result =  update_product($name, $sale, $img,$category,$des,$update_at,$id);
                           if($result) {
                            foreach($detailsArray as $details) {
                                $size = $details['size'];
                                $price = $details['price'];
                                updateDetails($id, $size, $price, $update_at);
                                
                              }
                           }
                } 
                $target = getProById($id);
                $listProDetail = getlistProDetailById($id);
                require "./view/pages/product/edit.php";
            }
        }
        break;



    // CUSTOMER
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
    // COMMENT
    case 'comment':
        # code...
        break;
    // ĐĂNG XUẤT
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