<?php
// global
require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
require_once "../../../models/feedback.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
// danh sách đánh giá
$list = getFeebBackById($id);
$err =[];
if(isset($_POST['btn-add'])){
    $idPro = $_POST['id'];
    if($_POST['star'] != ''){
        $star = $_POST['star'];
    }else{
        $err['star'] = "Chưa chấm điểm!";
    }
    if(isset($_SESSION['user']['customer_id'])){
        $idUser = $_SESSION['user']['customer_id'];
    }else{
        $err['user'] = "Bạn cần đăng nhập mới có thể đánh giá";
    }
    $content = $_POST['content'];
    $checkOrder = checkOrder($idPro,$idUser);
    $checkOnlyOne = checkFeedbackOnlyOne($idPro,$idUser);
    // kiểm tra người này đã mua hàng chưa
    if($checkOrder == []) {
        $err['checkOrder'] = "Bạn chưa từng mua đơn hàng này!";
    }
    // kiêm tra người này đã có đanh giá chưa
    if($checkOnlyOne != []){
        $err['checkOnlyOne'] = "Bạn đã có một đánh giá cho sản phẩm này!";
    }

    if(count($err) == 0){
        addFeedback($star,$content,$idPro,$idUser);
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
    <style>
    .rating {
        font-size: 24px;
        cursor: pointer;
    }

    .star {
        color: gray;
    }

    .star.active {
        color: #f39c12;
        /* Màu khi được chọn */
    }



    .star-rating {
        font-size: 12px;
        /* Kích thước của icon sao */
    }

    .star-rating span {
        display: inline-block;
        position: relative;
    }

    .star-rating span:before {
        content: "\2605";
        /* Mã Unicode cho dấu sao ★ */
        position: absolute;
        top: 0;
        left: 0;
    }

    .star-rating .full-star {
        color: gold;
        /* Màu sắc của sao đầy */
    }

    .star-rating .half-star {
        color: gold;
        /* Màu sắc của half star */
    }

    .star-rating .empty-star {
        color: #ccc;
        /* Màu sắc của sao không đầy */
    }
    </style>
    <div class="position-fixed bg-light rounded-2 w-100" style="top: 5px;">
        <form class="d-flex gap-2 align-items-center" action="<?=$_SERVER['PHP_SELF'].'?id='.$id?>" method="POST">
            <input type="text" value="<?=isset($id)?$id:''?>" hidden name="id">
            <div class="rating" data-rating="0">
                <span class="star fs-1" data-star="1">&#9733;</span>
                <span class="star fs-1" data-star="2">&#9733;</span>
                <span class="star fs-1" data-star="3">&#9733;</span>
                <span class="star fs-1" data-star="4">&#9733;</span>
                <span class="star fs-1" data-star="5">&#9733;</span>
            </div>
            <input type="text" name="content" class="border border-2 border-info rounded-2" value=""
                placeholder="Viết đánh giá của bạn!" id="">
            <input type="hidden" name="star" id="ratingInput">
            <input name="btn-add" type="submit" value="Gửi"
                class="border border-2 border-success bg-success text-light rounded-2">
        </form>
        <div style="margin-top: 20px; margin-bottom: 10px;">
            <span class="text-danger"><?php
        if(isset($err['checkOrder'])) {
            echo $err['checkOrder'];
        }elseif(isset($err['user'])){
            echo $err['user'];
        }elseif(isset($err['star'])){
            echo $err['star'];
        }elseif(isset($err['checkOnlyOne'])){
            echo $err['checkOnlyOne'];
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
            <?php foreach($list as $itemFB) {
               
               ?>
            <li class="nav-link active d-flex gap-2 align-items-center">
                <img class="rounded-circle object-fit-cover" style="width:50px; height: 50px;"
                    src="<?=$IMAGE.'/'.$itemFB['imgCus'] ?>" alt="">
                <div>
                    <div class="star-rating" data-rating="<?=$itemFB['star']?>"></div>

                    <span class=""><?php echo $itemFB['nameCus'] ?>: <span
                            class=""><?=$itemFB['content']?></span></span><br>

                    <i class="text-secondray"
                        style="font-size: 12px;"><?php echo isset($itemFB['update_at'])?$itemFB['update_at']:$itemFB['create_at'] ?>
                    </i>
                </div>

            </li>
            <?php }  ?>
        </ul>

    </nav>


</body>
<script>
const ratingDiv = document.querySelector('.rating');
const stars = ratingDiv.querySelectorAll('.star');
const ratingInput = document.getElementById('ratingInput');

let currentRating = 0;

stars.forEach(star => {
    star.addEventListener('mouseover', () => {
        const rating = parseInt(star.getAttribute('data-star'));
        highlightStars(rating);
    });

    star.addEventListener('click', () => {
        const rating = parseInt(star.getAttribute('data-star'));
        currentRating = rating;
        ratingDiv.setAttribute('data-rating', currentRating);
        ratingInput.value = currentRating; // Lưu giá trị đánh giá vào input hidden
    });

    star.addEventListener('mouseout', () => {
        highlightStars(currentRating);
    });
});

function highlightStars(rating) {
    stars.forEach(star => {
        const starRating = parseInt(star.getAttribute('data-star'));
        if (starRating <= rating) {
            star.classList.add('active');
        } else {
            star.classList.remove('active');
        }
    });
}




document.addEventListener("DOMContentLoaded", function() {
    const starRatingElements = document.querySelectorAll(".star-rating");

    starRatingElements.forEach(function(starRatingElement) {
        const rating = parseFloat(starRatingElement.dataset.rating);
        const fullStars = Math.floor(rating);
        const halfStars = rating % 1 === 0.5 ? 1 : 0;
        const remainingStars = 5 - fullStars - halfStars;

        starRatingElement.innerHTML = getStarIcons(fullStars, halfStars,
            remainingStars);
    });
});

function getStarIcons(fullStars, halfStars, remainingStars) {
    let starIcons = "";

    for (let i = 0; i < fullStars; i++) {
        starIcons += `<span class="full-star">&#9733;</span>`; // Mã HTML cho sao đầy ★ (màu vàng)
    }

    if (halfStars === 1) {
        starIcons +=
            `<span class="half-star">&#9733;&#189;</span>`; // Mã HTML cho half star ★½ (màu vàng)
    }

    for (let i = 0; i < remainingStars; i++) {
        starIcons += `<span class="empty-star">&#9733;</span>`; // Mã HTML cho sao không đầy ★ (màu xám)
    }

    return starIcons;
}
</script>

</html>