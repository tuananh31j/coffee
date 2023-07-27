<!-- MAIN-CONTENT -->
<div class="main-content my-5">
    <main>

        <div class="container ">
            <div class="row">
                <?php require_once "site/view/layout/menuAccount.php" ?>
                <div class="col">
                    <div class="user-title mb-5">
                        <h2>THÔNG TIN TÀI KHOẢN</h2>
                    </div>
                    <div class="row aligh-items-center">
                        <div class="col user-list-infor">
                            <ul>
                                <li>
                                    <p class="fw-bold">Họ tên: <span
                                            class="fw-lighter"><?=$_SESSION['user']['name']?></span></p>
                                </li>
                                <li>
                                    <p class="fw-bold">Email: <span
                                            class="fw-lighter"><?=$_SESSION['user']['email']?></span></p>
                                </li>
                                <li>
                                    <p class="fw-bold">Điện thoại: <span
                                            class="fw-lighter"><?=$_SESSION['user']['phone']?></span></p>
                                </li>
                                <li>
                                    <p class="fw-bold">Địa chỉ: <span
                                            class="fw-lighter"><?=isset($_SESSION['user']['address'])?$_SESSION['user']['name']:'[Chưa có]'?></span>
                                    </p>
                                </li>
                            </ul>
                            <!-- chỉnh sửa -->
                            <div class="m-4">
                                <a href="index.php?url=account&act=update"> <button class="btn bg-info">Chỉnh sửa
                                        thông
                                        tin</button></a>
                            </div>
                        </div>
                        <div class="col" style="height: 210px;">
                            <img class="h-100 rounded-2 border border-2 border-danger"
                                src="<?=$IMAGE.'/'.$_SESSION['user']['image_url']?>" alt="">
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </main>
</div>