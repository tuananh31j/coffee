  <!-- FOOTER -->
  <footer>

      <div class="container footer ">
          <div class="footer-about">
              <h2>HAI LẦN COFFEE CPG</h2>
              <p class="lh-4">Hai Lần coffee là dự án của sinh viên của trường cao đẳng thực hàng FPT polytechnic</p>
              <img src="img/logo 1.svg" alt="">
          </div>

          <div class="footer-address">
              <h2>THÔNG TIN CÔNG TY</h2>
              <p>
                  FPT phố Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội
              </p>
              <p>Số điện thoại: 0123456789</p>
              <p>hailan@gmail.com</p>
          </div>

          <div class="footer-menu">
              <h2>MENU</h2>
              <ul>
                  <li><a href="index.php">TRANG CHỦ</a></li>
                  <li><a href="">CỬA HÀNG</a></li>
                  <li><a href="index.php?url=product">SẢN PHẨM</a></li>
                  <li><a href="index.php?url=contact">LIÊN HỆ</a></li>
                  <li><a href="index.php?url=aboutus">GIỚI THIỆU</a></li>
              </ul>

          </div>

          <!-- chăm sóc khách hàng -->
          <div>
              <h2>TỔNG ĐÀI HỖ TRỢ</h2>
              <div class="footer-contact">
                  <div class="footer-contact-icon">
                      <i class="fa-solid fa-phone-volume"></i>
                  </div>
                  <div class="footer-contact-text">
                      <h3>Lỗi sản phẩm: <span>019999999</span></h3>
                      <h3>Mua hàng: <span>018888888</span></h3>
                      <p>hailan@gmail.com</p>
                  </div>
              </div>
              <div class="footer-social">
                  <h3>FOLLOW US</h3>
                  <div>
                      <span class="me-1"><i class="fa-brands fa-facebook-f"></i></span>
                      <span class="mx-1"><i class="fa-brands fa-twitter"></i></span>
                      <span class="mx-1"><i class="fa-brands fa-youtube"></i></span>
                      <span class="ms-1"><i class="fa-brands fa-square-instagram"></i></span>
                  </div>
              </div>
              <div>

              </div>
          </div>
      </div>
  </footer>


  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>


  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
let allProSale = document.querySelectorAll(".proSaleItem");
let btnMoreSale = document.querySelector(".more-btn-sale");
let btnHideSale = document.querySelector(".hide-btn-sale");

// Ẩn các phần tử từ vị trí thứ 8 trở đi
for (let i = 8; i < allProSale.length; i++) {
    allProSale[i].classList.add('d-none');
}

function handleItemAll(items) {
    btnMoreSale.classList.add("d-none");
    btnHideSale.classList.remove("d-none");
    // Hiển thị tất cả các phần tử
    items.forEach(element => element.classList.remove('d-none'));
}

function handleItem(items) {
    btnMoreSale.classList.remove("d-none");
    btnHideSale.classList.add("d-none");
    // Ẩn các phần tử từ vị trí thứ 8 trở đi
    for (let i = 8; i < items.length; i++) {
        items[i].classList.add('d-none');
    }
}
  </script>
  <script>
var splide = new Splide('.splide', {
    type: 'loop',
    perPage: 5,
    focus: 'center',
});

splide.mount();



// hàm thông báo xác nhận xóa
function confirmDelete(link) {

    swal({
            title: "Bạn có chắc là muốn xóa không?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Xóa thành công!", {
                    icon: "success",
                });
                swal("Xóa thành công!!");
                window.location.href = "index.php?url=" + link
            } else {

            }
        });
}
  </script>
  </body>