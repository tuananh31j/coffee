<!-- CONTENT -->
<div class=" col ">
    <div class="container ">
        <h3 class="text-center my-5">Thống kê</h3>
        <!-- filter -->
        <div>
            <div class="dropdown d-flex flex-row-reverse my-4">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Theo thời gian
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">30 ngày qua</a></li>
                    <li><a class="dropdown-item" href="#">3 tháng qua</a></li>
                    <li><a class="dropdown-item" href="#">6 tháng qua</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <!-- doanh thu -->
                <div>

                    <canvas id="total-money"></canvas>
                </div>
            </div>
            <!-- lượng người dùng mới -->
            <div class="col-4">
                <div>

                    <canvas id="userNew"></canvas>
                </div>

            </div>
            <div class="col-4">
                <!-- số lượng đơn hàng -->
                <div>

                    <canvas id="orders"></canvas>
                </div>

            </div>

        </div>

        <div class="row align-items-center">
            <!-- thông kê số lượng sản phẩm theo danh mục -->
            <div class="col">

                <div>

                    <canvas id="category"></canvas>
                </div>
            </div>
            <!-- tình trạng đơn hàng -->
            <div class="col-4 text-light fw-bold">

                <div class="row gap-3">
                    <div class="col bg-info p-4 rounded-2 text-center">
                        <span>Tổng đơn: <span>2000</span></span>
                    </div>
                    <div class="col bg-warning p-4 rounded-2 text-center">
                        <span>Đang giao: <span>600</span></span>

                    </div>
                </div>
                <div class="row gap-3 mt-3">
                    <div class="col bg-success  p-4 rounded-2 text-center">
                        <span>Thành công: <span>400</span></span>
                    </div>
                    <div class="col bg-danger p-4 rounded-2 text-center">
                        <span>Hủy: <br><span>1000</span></span>
                    </div>
                </div>

            </div>


        </div>

        <!-- đơn hàng gần đây -->
        <div>
            <h3 class="my-4">Đơn hàng gần đây</h3>
            <table class="table table-hover table-bordered text-center">
                <thead class="">
                    <tr class="fw-bold ">
                        <td style="width: 104px;">Mã đơn</td>
                        <td style="width: 104px;">Người mua</td>
                        <td>Nơi nhận</td>
                        <td style="width: 104px;">Tổng tiền</td>
                        <td style="width: 104px;">Nhận hàng</td>
                        <td style="width: 104px;">Thanh toán</td>
                        <td style="width: 104px;">Trạng thái</td>
                        <td style="width: 104px;">#</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>#111</td>
                        <td>Tuấn Anh</td>
                        <td>Hà Nội, Quốc Oai, Tân Hòa</td>
                        <td>1000000</td>
                        <td>Tại nhà</td>
                        <td>Thanh toán khi nhận hàng</td>
                        <td class="text-warning">Đang giao</td>
                        <td><a href="">Chi tiết</a></td>
                    </tr>

                    <tr>
                        <td>#111</td>
                        <td>Tuấn Anh</td>
                        <td>Hà Nội, Quốc Oai, Tân Hòa</td>
                        <td>1000000</td>
                        <td>Tại nhà</td>
                        <td>Thanh toán khi nhận hàng</td>
                        <td class="text-success">Thành công</td>
                        <td><a href="">Chi tiết</a></td>
                    </tr>
                    <tr>
                        <td>#111</td>
                        <td>Tuấn Anh</td>
                        <td>Hà Nội, Quốc Oai, Tân Hòa</td>
                        <td>1000000</td>
                        <td>Tại nhà</td>
                        <td>Thanh toán khi nhận hàng</td>
                        <td class="text-danger">Đã hủy</td>
                        <td><a href="">Chi tiết</a></td>
                    </tr>
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