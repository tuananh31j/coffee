<?php
// global
require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
require_once "../../../models/comment.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
// danh sách đánh giá
$list = getCMTById($id);
$err =[];
if(isset($_POST['btn-add'])){
    $idPro = $_POST['id'];
    if($_POST['content'] != ''){
        $content = $_POST['content'];
    }else{
        $err['content'] = "Chưa nhập nội dung!";
    }
    if(isset($_SESSION['user']['customer_id'])){
        $idUser = $_SESSION['user']['customer_id'];
    }else{
        $err['user'] = "Bạn cần đăng nhập mới có thể bình luận";
    }
    if(count($err) == 0){
        addCMT($content,$idPro,$idUser);
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/view.css">

</head>

<body>
   
    <div class="position-fixed bg-light rounded-2 w-100" style="top: 5px;">
        <form class="d-flex gap-2 align-items-center" action="<?=$_SERVER['PHP_SELF'].'?id='.$id?>" method="POST">
            <input type="text" value="<?=isset($id)?$id:''?>" hidden name="id">
            <input type="text" name="content" class="border border-2 border-info rounded-2" value=""
                placeholder="Viết bình luận của bạn!" id="">
            <input name="btn-add" type="submit" value="Gửi"
                class="border border-2 border-success bg-success text-light rounded-2">
        </form>
        <div style="margin-top: 20px; margin-bottom: 10px;">
            <span class="text-danger"><?php
        if(isset($err['user'])) {
            echo $err['user'];
        }elseif(isset($err['content'])){
            echo $err['content'];
        }else{
            echo "";
        }
        ?></span>

        </div>
        <hr class="m-2">
    </div>

    <br>



    <nav style="margin-top: 100px; margin-bottom: 10px;" style="height: 800px; margin-bottom: 100px;" class="">
        <ul>
            <?php foreach($list as $item) {
               
               ?>
            <li class="nav-link active d-flex gap-2 align-items-center mb-2">
                <img class="rounded-circle object-fit-cover" style="width:50px; height: 50px;"
                    src="<?=$IMAGE.'/'.$item['imgCus'] ?>" alt="">
                <div>
                <span><span class="fw-bold"><?php echo $item['nameCus'] ?>: </span><span
                            class=""><?=$item['content']?></span></span><br>

                    <i class="text-secondray"
                        style="font-size: 12px;"><?php echo isset($item['update_at'])?$item['update_at']:$item['create_at'] ?>
                    </i>
                </div>

            </li>
            <hr>
            <?php }  ?>
        </ul>

    </nav>


</body>
<script>

</script>

</html>