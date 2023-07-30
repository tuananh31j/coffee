<!-- MAIN CONTENT -->
<div class="main-content">
    <?php
$newPrice = number_format($target['price']-($target['price']*$target['sale']/100),0,',','.');
?>
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="" style="height: 640px;">
                <img class="h-100" src="<?=$IMAGE.'/'.$target['image_url']?>" alt="">
            </div>
            <div class="content-right">
                <form class="ms-3">
                    <h4>
                        <?=$target['name']?>
                    </h4>
                    <div class="text-secondary d-flex align-items-center mt-3" style="font-size: 14px;gap:180px">
                        <p>Lượt xem <span><?=$target['view']?></span> <i class="fa-solid fa-eye"></i></p>
                        <p>Mã sản phẩm: #<span><?=$target['product_id']?></span></p>
                    </div>
                    <!-- điểm đánh giá trung bình -->
                    <div class="content-right-whitlist d-flex align-items-center gap-1 mb-2">
                        <span class="star-rating" data-rating="<?=isset($target['avg_star'])?$target['avg_star']:0?>">
                        </span><span>(<?=isset($target['count_fb'])?$target['count_fb']:0?>)</span>

                    </div>
                    <!-- size -->
                    <span class="me-5">Size:</span>

                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <?php 
                foreach ($listSize as $key => $size) {
                  $idSize = $size['size_id'];
                  $priceBysize = getPrice($idPro,$idSize)['price'];
                  $priceBysizeNew = $priceBysize - $priceBysize*$target['sale']/100;
                  $salePrice = number_format($priceBysize- $priceBysizeNew,0,',','.');
                  $result = number_format($priceBysizeNew,0,',','.');
                  if($key == sizeof($listSize)-1) {
                  $priceByCur = number_format($priceBysize,0,',','.');

                  }
                ?>
                        <div class="mx-2">
                            <input type="radio" class="btn-check" value="<?=$size['size_id']?>" name="btnradio"
                                id="btnradio<?=$key?>" autocomplete="off" <?=($key == 0)?'checked':''?>>
                            <label class="btn btn-outline-secondary price__check" data-price="<?=$priceBysizeNew?>"
                                for="btnradio<?=$key?>"><?=$size['name']?></label>
                        </div>

                        <?php } ?>

                    </div>
                    <!-- số lượng -->
                    <div class="d-flex gap-3 my-3 align-items-center">
                        <div>
                            <span>Số lượng: </span>
                        </div>
                        <div class="d-flex">
                            <button style="background-color: transparent;" type="button" class="border-0  rounded-2 m-2"
                                id="decrease-btn">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input class="quantity border-secondary mx-4 rounded-2 px-2 ps-2" style="width: 30px;"
                                type="text" id="quantity" value="1" name="quantity">
                            <button style="background-color: transparent;" type="button"
                                class="border-0  rounded-2 mx-2" id="increase-btn">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- giá -->
                    <div class="d-flex align-items-center gap-4">
                        <div>
                            <p id="priceDisplay" class="text-danger fs-2"><?=$newPrice?>₫</p>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <?=($target['sale'] == 0)?'':'<p class="text-light bg-danger p-1">Sale:
                            <span>'.$target['sale'].'%</span></p>'?>
                            <p><del
                                    class="text-secondary"><?php if($target['sale'] != 0){ echo $target['price'].'₫ - '.$priceByCur.'₫';}else{echo '';}?></del>
                            </p>
                        </div>
                    </div>
                    <div>
                        <!--                         <input type="submit" value="">
 -->
                    </div>
                </form>

                <div>
                    <div class="accordion accordion-flush" id="accordionFlushExample" style="width: 500px">
                        <!-- mô tả -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-medium" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Mô tả sản phẩm
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><?=$target['des']?></div>
                            </div>
                        </div>
                        <!-- đánh giá -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-medium" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                    aria-expanded="false" aria-controls="flush-collapseThree">
                                    Đánh giá sản phẩm
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body w-100">
                                    <iframe style="height: 300px;" class="w-100"
                                        src="./site/view/pages/detailsPro/feedback.php?id=<?php echo $target['product_id']?>"
                                        frameborder="1"></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- bình luận -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-medium" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    Bình luận sản phẩm
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <iframe style="height: 300px;" class="w-100"
                                        src="./site/view/pages/detailsPro/cmt.php?id=<?=$target['product_id']?>"
                                        frameborder="1"></iframe>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// số lượng
const quantityInput = document.getElementById('quantity');
const decreaseBtn = document.getElementById('decrease-btn');
const increaseBtn = document.getElementById('increase-btn');

decreaseBtn.addEventListener('click', () => {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
});

increaseBtn.addEventListener('click', () => {
    let currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1;
});


// giá tiền theo size
function formatPriceWithCommas(price) {
    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

const priceDisplay = document.getElementById('priceDisplay');
const radioSizes = document.querySelectorAll('.price__check');

radioSizes.forEach(radioSize => {
    radioSize.addEventListener('click', () => {
        const price = radioSize.getAttribute('data-price');
        const formattedPrice = formatPriceWithCommas(price);
        priceDisplay.textContent = formattedPrice + '₫';
    });
});

// star
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
        starIcons += `<span class="full-star">&#9733;</span>`;
    }

    if (halfStars === 1) {
        starIcons +=
            `<span class="half-star">&#9733;&#189;</span>`;
    }

    for (let i = 0; i < remainingStars; i++) {
        starIcons += `<span class="empty-star">&#9733;</span>`;
    }

    return starIcons;
}
</script>