<!-- CONTENT -->
<?php  
                $total = 0;
                foreach($revenue as $item) {
                    $total += $item['orderPrice'];
                   
                }
              
                ?>
<div class=" col ">
    <div class="container ">
        <h3 class="text-center my-5">THỐNG KÊ</h3>
        <!-- filter -->
        <div>
            <div class="dropdown d-flex flex-row-reverse my-4">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Theo thời gian
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?date=1">30 ngày qua</a></li>
                    <li><a class="dropdown-item" href="index.php?date=3">3 tháng qua</a></li>
                    <li><a class="dropdown-item" href="index.php?date=6">6 tháng qua</a></li>
                </ul>
            </div>
        </div>
        <div class="row text-light fw-bold mb-5">
            <div class="col-3">

                <!-- doanh thu -->
                <div>

                    <div class="col bg-secondary p-4 rounded-2 text-center ">
                        <span>Doanh thu <br><span><?=number_format($total,0,',','.')?> <span
                                    class="text-decoration-underline">đ</span></span></span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <!-- tổng đơn -->
                <div>

                    <div class="col bg-info p-4 rounded-2 text-center">
                        <span>Tổng đơn <br><span><?=$countOrder?> <i class="fa-solid fa-box"></i></span></span>
                    </div>
                </div>
            </div>
            <!-- boom hàng -->
            <div class="col-3">
                <div>

                    <div class="col bg-danger p-4 rounded-2 text-center">
                        <span>Hủy <br><span><?=$rejected?> <i class="fa-solid fa-box"></i></span></span>
                    </div>
                </div>

            </div>
            <div class="col-3">
                <!-- đơn thành cồng -->
                <div>

                    <div class="col bg-success  p-4 rounded-2 text-center">
                        <span>Thành công <br><span><?=$resole?> <i class="fa-solid fa-box"></i></span></span>
                    </div>
                </div>

            </div>

        </div>

        <div class="row align-items-center">
            <!-- top 5 mặt hàng mua nhiều nhất -->
            <div class="col">
                <div>
                    <canvas id="top5"></canvas>
                </div>
            </div>
            <!-- đơn hàng theo danh mục -->
            <div class="col-4 ">
                <div>
                    <canvas id="category"></canvas>
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
    // Top 5 sản phẩm
    const top5 = document.getElementById('top5');

    let lineTop5 = new Chart(top5, {
        type: 'bar',
        data: {
            labels: [
                <?php
                $i = 0;
                $solg = count($top5);
                     foreach($top5 as $item){
                        $i++;
                        $comma = ",";
                        if($i == $solg) {
                            $comma = " ";
                        }?> "<?=$item['namePro']?>"
                <?=$comma?>
                <?php } ?>
            ],
            datasets: [{
                label: 'Đơn',
                data: [<?php
                $i = 0;
                $solg = count($top5);
                     foreach($top5 as $item){
                        $i++;
                        $comma = ",";
                        if($i == $solg) {
                            $comma = " ";
                        }?> <?=$item['countOrder']?>
                    <?=$comma?>
                    <?php } ?>
                ],
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
            indexAxis: 'y',
            plugins: {
                title: {
                    display: true,
                    text: 'Top 5 sản phẩm bán chạy'
                },
                legend: {
                    display: false,
                    label: {
                        font: {
                            size: 50
                        }
                    }
                }

            }
        }


    });

    // số lượng đơn hàng theo danh mục
    const category = document.getElementById('category');

    let barCategory = new Chart(category, {
        type: 'doughnut',
        data: {
            labels: [<?php
                $i = 0;
                $solg = count($orderCate);
                     foreach($orderCate as $item){
                        $i++;
                        $comma = ",";
                        if($i == $solg) {
                            $comma = " ";
                        }?> "<?=$item['nameCate']?>"
                <?=$comma?>
                <?php } ?>
            ],
            datasets: [{
                label: 'Số lượng',
                data: [<?php
                $i = 0;
                $solg = count($orderCate);
                     foreach($orderCate as $item){
                        $i++;
                        $comma = ",";
                        if($i == $solg) {
                            $comma = " ";
                        }?> "<?=$item['countOrder']?>"
                    <?=$comma?>
                    <?php } ?>
                ],
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
                    text: 'Thống kê đơn hàng theo danh mục',

                },
                legend: {
                    display: true
                }
            }
        }


    });
    </script>

</div>