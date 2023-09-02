<!-- MAIN CONTENT -->
<?php if ($banner['banner_url'] == '') { ?>

<?php } else { ?>
    <!-- banner -->
    <div class="header-banner" style="max-height:500px; overflow-y: hidden;">
        <a href="index.php?url=proDetails&id=<?= $banner['product_id'] ?>&view=<?= getProById($banner['product_id'])['view'] + 1 ?>"><img src="<?= $IMAGE . '/' . $banner['banner_url'] ?>" alt="" class="  w-100  object-fit-cover" /></a>
    </div>
<?php } ?>
<div class="main-content container my-5">
    <main>
        <div class="aboutUs-title">
            <h3 class="mb-5 tw-text-xl tw-font-semibold">Giới thiệu</h3>
            <p>Highlands Coffee CPG thuộc Công ty TNHH MTV Thái Kiên tự hào là đơn vị phân phối hợp lệ và độc
                quyền cho tất cả các sản phẩm đóng gói mang thương hiệu Highlands Coffee®- Thương hiệu cà phê
                sinh ra từ đất Việt</p>
            <br>
            <p>Từ tình yêu với Việt Nam và niềm đam mê cà phê, năm 1999, thương hiệu Highlands Coffee® ra đời
                với khát vọng nâng tầm di sản cà phê lâu đời của Việt Nam và lan rộng tinh thần tự hào, kết nối
                hài hoà giữa truyền thống với hiện đại.</p>
            <br>
            <p>Bắt đầu với sản phẩm cà phê đóng gói tại Hà Nội vào năm 2000, chúng tôi đã nhanh chóng phát triển
                và mở rộng thành thương hiệu quán cà phê nổi tiếng và không ngừng mở rộng hoạt động trong và
                ngoài nước từ năm 2002.</p>
            <br>
            <p>Qua một chặng đường dài, chúng tôi đã không ngừng mang đến những sản phẩm cà phê thơm ngon, sánh
                đượm trong không gian thoải mái và lịch sự. Những ly cà phê của chúng tôi không chỉ đơn thuần là
                thức uống quen thuộc mà còn mang trên mình một sứ mệnh văn hóa phản ánh một phần nếp sống hiện
                đại của người Việt Nam.</p>
            <br>
            <p>Đến nay, Highlands Coffee® vẫn duy trì khâu phân loại cà phê bằng tay để chọn ra từng hạt cà phê
                chất lượng nhất, rang mới mỗi ngày và phục vụ quý khách với nụ cười rạng rỡ trên môi. Bí quyết
                thành công của chúng tôi là đây: không gian quán tuyệt vời, sản phẩm tuyệt hảo và dịch vụ chu
                đáo với mức giá phù hợp.</p>
            <br>
            <p>Không chỉ dừng lại ở đó, Highlands Coffee® mong muốn đưa hương vị cà phê đến gần hơn với nhiều
                hơn gia đình Việt trên mọi miền đất nước, thưởng thức ngay tại nhà khi không có thời gian tới
                quán. Mang đến nhiều lựa chọn cà phê rang xay sẵn hoặc uống liền với mức độ bận rộn khác nhau
                của nhịp sống hằng này. Đó chính là lý do ra đời của dòng sản phẩm đóng gói Highlands Coffee®.
            </p>
        </div>
    </main>
</div>