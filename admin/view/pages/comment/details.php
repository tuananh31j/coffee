<!-- CONTENT -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5">CHI TIẾT BÌNH LUẬN</h3>
        <div class="d-flex ">
            <!-- thêm sản phẩm -->

            <a href="index.php?url=comment&act=list"
                class="bg-success p-1 px-2 rounded-2 text-light m-3 text-decoration-none">Danh
                sách
                bình luận</i></a>



        </div>

        <!-- content -->
        <div>
            <div class="container ">
                <!-- Nội dung bình luận -->
                <div class="border-1 text-start text-light bg-secondary rounded-2 p-2 pb-4">
                    <p>
                        Nội dung:
                    </p>
                    <i class=""
                        style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin-left: 80px;"><span><?=$target['content']?></span></i>
                </div>
                <div class="row m-0 mt-5 gap-4">
                    <!-- thông tin sản phẩm -->
                    <div class="col rounded-2 bg-info p-3">
                        <div class="container">

                            <div class="row align-items-center">
                                <div class="col-5">
                                    <img class="w-100" src="<?=$IMAGE.'/'.$target['imgCus']?>" alt="">
                                </div>
                                <div class="col">
                                    <ul>
                                        <li><span class="fw-bold">Họ tên: <span><?=$target['nameCus']?></span></span>
                                        </li>
                                        <li><span class="fw-bold">Điện thoại: <span><?=$target['phone']?></span></span>
                                        </li>
                                        <li><span class="fw-bold">Email: <span><?=$target['email']?></span></span></li>
                                        <li><span class="fw-bold">Địa chỉ: <span><?=$target['address']?></span></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col rounded-2 p-5" style="background-color: #f6606a;">
                        <div class="container">

                            <div class="row align-items-center">
                                <div class="col-5">
                                    <img class="w-100" src="<?=$IMAGE.'/'.$target['image_url']?>" alt="">
                                </div>
                                <div class="col">
                                    <ul>
                                        <li><span class="fw-bold">Tên: <span><?=$target['namePro']?></span></span></li>
                                        <li><span class="fw-bold">Mã: #<span><?=$target['product_id']?></span></span>
                                        </li>
                                        <li><span class="fw-bold">View: <span><?=$target['view']?></span></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>