 <div class=" col ">
    <div class="container">
       <h3 class="text-center my-5">Danh sách Người dùng</h3>
       <div class="d-flex ">
          <!-- thêm sản phẩm -->

          <a href="" class="bg-success p-1 px-2 rounded-2 text-light m-3 text-decoration-none">Thêm khách
             hàng <i class="fa-solid fa-plus"></i></a>

          <!-- fillter -->
          <div class="dropdown m-3">
             <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-filter"></i> Sắp xếp
             </button>
             <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">A->Z</a></li>
                <li><a class="dropdown-item" href="#">Z->A</a></li>
                <li><a class="dropdown-item" href="#">Mới nhất</a></li>
                <li><a class="dropdown-item" href="#">Cũ nhất</a></li>
                <li><a class="dropdown-item" href="#">Đơn hàng <i class="fa-solid fa-arrow-up"></i></a>
                </li>
                <li><a class="dropdown-item" href="#">Đơn hàng <i class="fa-solid fa-arrow-down"></i></a></li>


             </ul>
          </div>
          <!-- tìm kiếm -->
          <div class="m-3">
             <form action="" method="post">
                <input class="p-1 rounded-2" type="text" name="search" placeholder="nội dung tìm kiếm...">
                <input type="submit" name="btn-search" value="Tìm kiếm"
                   class="p-1 border-1 text-light rounded-2 bg-black">
             </form>
          </div>
       </div>

       <!-- content -->
       <div>
          <?php if(isset($checkdelete)){
            ?>
          <button class="btn btn-warning"><?php echo $checkdelete; ?></button>

          <?php
         }
         ?>
          <table class="table table-hover table-bordered text-center">
             <thead style="border: 2px solid black">
                <tr>
                   <th>#MÃ</th>
                   <th>Ảnh</th>
                   <th>Họ tên</th>
                   <th>Số điện thoại</th>
                   <th>Email<i class="fa-solid fa-envelope"></i></th>
                   <th style="width: 100px;">Địa chỉ<i class="fa-solid fa-location-dot"></i></th>
                   <th>Đơn hàng<i class="fa-solid fa-box"></i></th>
                   <th>Ngày tạo</th>
                   <th>Mật khẩu</th>
                   <th>Vai trò</th>
                   <th style="width: 170px;">Chức năng</th>
                </tr>
             </thead>
             <tbody>
                <?php
                
                foreach ($arrcustumer as $item) {
                ?>
                <tr>

                   <td><?php echo $item['customer_id'] ?></td>
                   <td><img width="50" height="50" src="../public/img<?php echo $item['image_url'] ?>" alt="">
                   </td>
                   <td><?php echo $item['name'] ?></td>
                   <td><?php echo $item['phone'] ?></td>
                   <td><?php echo $item['email'] ?>@gmail.com</td>
                   <td><?php echo $item['address'] ?></td>
                   <td>4</td>
                   <td><?php echo $item['create_at'] ?></td>
                   <td><?php echo $item['update_at'] ?></td>
                   <td><?php  if($item['customer_id']==1){
                     echo "Admin";
                   }else{
                     echo "Khách hàng" ;
                   } ?></td>
                   <td>
                      <form method="post">
                         <!-- Gọi hàm confirm trong mã JavaScript -->
                         <input type="hidden" name="id" value="<?php echo $item['customer_id'] ?>">
                         <input type="submit" name="delete" value="Xóa"
                            onclick="return confirm('Bạn có chắc muốn người dùng này không?')">
                      </form>|
                      <a href="index.php?url=customer&id=<?php echo $item['customer_id'] ?>"
                         class="bg-info text-light p-1 rounded-2">Sửa</a>
                   </td>
                </tr>


                <?php
               }
               
               ?>



             </tbody>
          </table>


       </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    // tổng doanh thu
    const totalMoney = document.getElementById('total-money');

    let lineTotalMoney = new Chart(totalMoney, {
       type: 'line',
       data: {
          labels: ['', '', '', '', '', ''],
          datasets: [{
             label: 'VNĐ',
             data: [12, 19, 3, 6, 7, 2],
             borderWidth: 4,
             borderColer: "#b5313a",
             hoverBorderColor: "#000",
             hoverBorderWidth: 6,
             backgroundColor: "#b5313a",
             tension: 0.5,
          }],

       },
       options: {
          plugins: {
             title: {
                display: true,
                text: 'Doanh thu tháng này(VNĐ)'
             },
             legend: {
                display: false
             }

          }
       }


    });
    // số lượng khách hàng mới
    const userNew = document.getElementById('userNew');

    let lineUserNew = new Chart(userNew, {
       type: 'line',
       data: {
          labels: ['', '', '', '', '', ''],
          datasets: [{
             label: 'Số lượng',
             data: [12, 19, 3, 6, 7, 2],
             borderWidth: 4,
             borderColer: "#777",
             hoverBorderColor: "#000",
             hoverBorderWidth: 6,
             tension: 0.5,
          }],
       },
       options: {
          plugins: {
             title: {
                display: true,
                text: 'Khách hàng mới'
             },
             legend: {
                display: false
             }

          }
       }

    });
    // lượng đơn hàng
    const orders = document.getElementById('orders');

    let lineOrders = new Chart(orders, {
       type: 'line',
       data: {
          labels: ['', '', '', '', '', ''],
          datasets: [{
             label: 'Số lượng',
             data: [12, 19, 3, 6, 7, 2],
             borderWidth: 4,
             borderColer: "#777",
             hoverBorderColor: "#000",
             hoverBorderWidth: 6,
             backgroundColor: "#198754",
             tension: 0.5,

          }],
       },
       options: {
          plugins: {
             title: {
                display: true,
                text: 'Đơn hàng'
             },
             legend: {
                display: false
             }
          }
       }

    });
    // số lượng sản phẩm theo danh mục
    const category = document.getElementById('category');

    let barCategory = new Chart(category, {
       type: 'bar',
       data: {
          labels: ['Cà phê', 'Chè', 'Trà', 'Trà sữa', 'Sữa', 'Bột cà phê'],
          datasets: [{
             label: 'Số lượng',
             data: [12, 19, 3, 6, 7, 2],
             borderWidth: 4,
             borderColer: "#777",
             hoverBorderColor: "#000",
             hoverBorderWidth: 6,
             backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(165, 205, 86)',
                'rgb(255, 205, 00)',
                'rgb(255, 00, 86)',
                'rgb(165, 42, 42)',
             ],
          }],
       },
       options: {

          plugins: {
             title: {
                display: true,
                text: 'Thống kê sản phẩm theo danh mục',

             },
             legend: {
                display: false
             }
          }
       }


    });
    </script>

 </div>