<!-- CONTENT -->
<?php
    if(is_array($catego)){
        extract($catego);
    }
?>
<div class="col">
    <div class="container">
        <h3 class="text-center my-5">Cập Nhật Danh Mục</h3>
        <div class="d-flex">
            <!-- thêm danh mục -->

            <a href="index.php?url=list_category"
                class="text-decoration-none bg-success p-1 px-2 rounded-2 text-light m-3">Danh sách danh mục</a>
        </div>

        <!-- content -->
        <div class="wrapper" style="margin-top: 20px; width: 100%">
            <p><?=isset($thongbao)?$thongbao:''?></p>
            <form class="input" style="width: 50%" method="post" action="index.php?url=add_categories">
                <!-- <div class="input-group mb-3" hidden>
                <span class="input-group-text" id="inputGroup-sizing-default">Mã loại</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-default" name="id"/>
              </div> -->
                <div class="input-group mb-3">

                    <span class="input-group-text" id="inputGroup-sizing-default">Tên loại</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" name="name"
                        value="<?php if(isset($name)&&($name!="")) echo $name; ?>" />
                </div>
                <div class="button">
                    <input type="submit" class="p-2 bg-info rounded-2 border-0" value="Cập nhật" name="btn-add">

                    <input type="reset" value="Nhập lại" class="p-2 bg-success rounded-2 border-0">
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    // tổng doanh thu
    const totalMoney = document.getElementById("total-money");

    let lineTotalMoney = new Chart(totalMoney, {
        type: "line",
        data: {
            labels: ["", "", "", "", "", ""],
            datasets: [{
                label: "VNĐ",
                data: [12, 19, 3, 6, 7, 2],
                borderWidth: 4,
                borderColer: "#b5313a",
                hoverBorderColor: "#000",
                hoverBorderWidth: 6,
                backgroundColor: "#b5313a",
                tension: 0.5,
            }, ],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Doanh thu tháng này(VNĐ)",
                },
                legend: {
                    display: false,
                },
            },
        },
    });
    // số lượng khách hàng mới
    const userNew = document.getElementById("userNew");

    let lineUserNew = new Chart(userNew, {
        type: "line",
        data: {
            labels: ["", "", "", "", "", ""],
            datasets: [{
                label: "Số lượng",
                data: [12, 19, 3, 6, 7, 2],
                borderWidth: 4,
                borderColer: "#777",
                hoverBorderColor: "#000",
                hoverBorderWidth: 6,
                tension: 0.5,
            }, ],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Khách hàng mới",
                },
                legend: {
                    display: false,
                },
            },
        },
    });
    // lượng đơn hàng
    const orders = document.getElementById("orders");

    let lineOrders = new Chart(orders, {
        type: "line",
        data: {
            labels: ["", "", "", "", "", ""],
            datasets: [{
                label: "Số lượng",
                data: [12, 19, 3, 6, 7, 2],
                borderWidth: 4,
                borderColer: "#777",
                hoverBorderColor: "#000",
                hoverBorderWidth: 6,
                backgroundColor: "#198754",
                tension: 0.5,
            }, ],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Đơn hàng",
                },
                legend: {
                    display: false,
                },
            },
        },
    });
    // số lượng sản phẩm theo danh mục
    const category = document.getElementById("category");

    let barCategory = new Chart(category, {
        type: "bar",
        data: {
            labels: [
                "Cà phê",
                "Chè",
                "Trà",
                "Trà sữa",
                "Sữa",
                "Bột cà phê",
            ],
            datasets: [{
                label: "Số lượng",
                data: [12, 19, 3, 6, 7, 2],
                borderWidth: 4,
                borderColer: "#777",
                hoverBorderColor: "#000",
                hoverBorderWidth: 6,
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(165, 205, 86)",
                    "rgb(255, 205, 00)",
                    "rgb(255, 00, 86)",
                    "rgb(165, 42, 42)",
                ],
            }, ],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Thống kê sản phẩm theo danh mục",
                },
                legend: {
                    display: false,
                },
            },
        },
    });
    </script>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>