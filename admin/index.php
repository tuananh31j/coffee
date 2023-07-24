<?php

require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
require_once "./models/category.php";


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
    

    case 'add_categories':
        if(isset($_POST['btn-add'])&&$_POST['btn-add']) {
            $name=$_POST['name'];
            addCategory($name);
            $noti="addtion complete !";
        }
        include_once "./view/pages/category/add.php";
        break;
        
    case 'list_category':
        $sql="select * from category order by category_id";
        $cate=pdo_query($sql);
        require_once "./view/pages/category/list.php";
        break;

        //chỉnh sửa danh mục
    case 'category-update':
        # code...
        if(isset($_GET['category_id'])&&$_GET['category_id']>0){
            $sql="select * from category where category_id=".$_GET['category_id'];
            $catego=pdo_query_one($sql);
            $thongbao="update complete !";
        }
        require_once "./view/pages/category/update.php";
        break;
    


        //xóa danh mục. Nếu có khóa ngoại thì chỉ tắt trạng thái sang 0(off)
    case 'category-delete':
        # code...
        if(isset($_GET['category_id'])&&$_GET['category_id']>0){
            $sql=" delete from category where category_id=".$_GET['category_id'];
            pdo_execute($sql);
        }
        $sql="select * from category order by category_id";
        $cate=pdo_query($sql);
        require_once "./view/pages/category/list.php";
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
        # code...
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