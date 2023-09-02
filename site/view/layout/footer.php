  <!-- FOOTER -->
  <footer class="tw-my-11">
      <hr>
      <div class="tw-flex tw-justify-between tw-my-4 container">
          <div class="tw-w-60 tw-leading-7">
              <h2 class="tw-font-semibold tw-mb-3">HAI LẦN COFFEE CPG</h2>
              <p class="">Hai Lần coffee là dự án của sinh viên trường cao đẳng thực hành FPT polytechnic</p>
              <img src="img/logo 1.svg" alt="">
          </div>

          <div class="tw-w-60 tw-leading-7">
              <h2 class="tw-font-semibold tw-mb-3">THÔNG TIN CÔNG TY</h2>
              <p>
                  FPT phố Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội
              </p>
              <p>Số điện thoại: 0123456789</p>
              <p>hailan@gmail.com</p>
          </div>

          <div class="tw-w-36 tw-leading-8">
              <h2 class="tw-font-semibold tw-mb-3">MENU</h2>
              <ul class=" tw-leading-8">
                  <li><a href="index.php">TRANG CHỦ</a></li>
                  <li><a href="index.php?url=shop">CỬA HÀNG</a></li>
                  <li><a href="index.php?url=product">SẢN PHẨM</a></li>
                  <li><a href="index.php?url=contact">LIÊN HỆ</a></li>
                  <li><a href="index.php?url=aboutus">GIỚI THIỆU</a></li>
              </ul>

          </div>

          <!-- chăm sóc khách hàng -->
          <div>
              <h2 class="tw-font-semibold tw-mb-3">TỔNG ĐÀI HỖ TRỢ</h2>
              <div class="tw-flex tw-gap-4 tw-items-center">
                  <div class="tw-text-4xl">
                      <i class="fa-solid fa-phone-volume"></i>
                  </div>
                  <div class="tw-leading-8">
                      <p>Lỗi sản phẩm: <span>019999999</span></p>
                      <p>Mua hàng: <span>018888888</span></p>
                      <p>hailan@gmail.com</p>
                  </div>
              </div>
              <div class="tw-mt-5">
                  <h3 class="tw-text-md tw-font-semibold">FOLLOW US</h3>
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