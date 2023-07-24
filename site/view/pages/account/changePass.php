<div class="row mb">
    <div class="box">
        <div class="row mb">
            <div>QUÊN MẬT KHẨU</div>
            <div class="row boxcenter formtaikhoan">
                <form action="index.php?act=quenmk" method="post">
                    <div class="row mb10">
                        Email
                        <input type="email" name="email">
                    </div>
                    <div class="row mb10">
                        SĐT
                        <input type="sdt" name="sdt">
                    </div>
                    <div class="row mb10">
                        <input type="submit" value="Gửi" name="guiEmail">
                        <input type="reset" value="Nhập lại">
                    </div>
                </form>
                <h2 class="thongbao">
                    <?php
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }
                    ?>
                </h2>
            </div>
        </div>
    </div>
</div>