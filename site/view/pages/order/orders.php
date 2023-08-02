<?php
// global
require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
require_once "../../../models/product.php";
require_once "../../../models/size.php";

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

    <?php 
                    $totalPrice = 0;
                    $listCart =$_SESSION['cart'];
                    if(isset($listCart)) {
                        foreach($listCart as $index => $product){
                            $targetPro = getProById($product['id']);
                            $cost = getPrice($product['id'],$product['size'])['price'];
                            $priceSale = $cost*$targetPro['sale']/100;
                            $currentPrice = $cost - $priceSale;
                            $curPriceFormat = number_format($currentPrice,0,',','.');
                            $totalPrice = $currentPrice*$product['quantity'];

                    ?>
    <div class="row align-items-center w-100 mt-2">
        <div class="col-3"><img class="w-100" src="<?=$IMAGE.'/'.$product['img']?>" alt=""> <span
                class="position-relative text-light px-2 border border-danger rounded-circle bg-danger"
                style="bottom: 100px;"><?=$product['quantity']?></span></div>
        <div class="col border-2 border rounded-2 shadow ">
            <span class="fs-5 fw-medium">
                <?=$product['name']?>
            </span>
            <div class="d-flex gap-2 align-items-center">
                <span class="fs-6 text-danger fw-bold ">
                    <?=$curPriceFormat?><span class="text-decoration-underline fw-normal fa-italic">đ</span>
                </span>
                <span class="text-decoration-line-through text-secondary" style="font-size: 12px; font-style: italic;">
                    <?=$cost?><span class="text-decoration-underline fw-normal fa-italic">đ</span>
                </span>
                <span class="fs-6 fw-bold text-danger"><span class=" text-dark">size:
                    </span><?=getSizeName($product['size'])['name']?></span>
            </div>

        </div>
    </div>
    <hr>
    <?php }} ?>




</body>
<script>

</script>

</html>