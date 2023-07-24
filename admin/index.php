<?php
include "models/signup.php";

require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
require_once "/xampp/htdocs/du-an-1-nhom7/pdo.php";


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
        case 'addsp':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $iddm=$_POST['iddm'];
                $tensp=$_POST['tensp'];
                $giasp=$_POST['giasp'];
                $mota=$_POST['mota'];
                $hinh=$_FILES['hinh']['name'];
                $status=$_POST['status'];
                $view=$_POST=['view'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if(move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)){
                    // echo "The file". htmlspecialchars( basename($_FILES["fileToUpLoad"]["name"])). "has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }

                insert_sanpham($tensp, $giasp, $hinh, $mota, $status, $view ,$iddm);
                $thongbao="Them thanh cong";
            }
            $listdanhmuc=loadall_danhmuc();
            
            include "sanpham/add.php";
            break;

        //chỉnh sửa sản phẩm
        case 'suasp':
            if(isset($_GET['id'])&&($_GET['id']>0)){
               
                $sanpham=loadone_sanpham($_GET['id']);
            }
            
            include "sanpham/update.php";
            break;
        case 'uppdatesp':
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                $id=$_POST['id'];
                $iddm=$_POST['iddm'];
                $tensp=$_POST['tensp'];
                $giasp=$_POST['giasp'];
                $mota=$_POST['mota'];
                $hinh=$_FILES['hinh']['name'];
                $status=$_POST['status'];
                $view=$_POST=['view'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if(move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)){
                    // echo "The file". htmlspecialchars( basename($_FILES["fileToUpLoad"]["name"])). "has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                uppdate_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);
                $thongbao="Cập nhật thanh cong";
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham();
                include "sanpham/list.php";
                break;
        //xóa sản phẩm. Nếu có khóa ngoại thì chuyển trạng thái sang 0(off)
        case 'xoasp':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_sanpham($_GET['id']);
            }
            $listsanpham=loadall_sanpham("",0);
            include "sanpham/list.php";
            break;

    
    case 'signup':
        if(isset($_POST['taotk'])&&($_POST['taotk'])){
            $fullname=$_POST['fullname'];
            $email=$_POST['email'];
            $sdt=$_POST['sdt'];
            $password=$_POST['password'];
            insert_signup($fullname,$sdt,$email,$password);
            $thongbao="Bạn đã đăng ký thành công, vui lòng đăng nhập !";
        }
        include "view/taikhoan/signup.php";
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