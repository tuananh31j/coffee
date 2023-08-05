<?php
                            # 1 MONTH
// doanh thu
function getRevenue(){
    $sql = "select sum(order_detail.total_price) as orderPrice from orders inner join order_detail on order_detail.order_id = orders.order_id where orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) and orders.status = 3 group by orders.order_id";
    return pdo_query($sql);

}
//tổng đơn
function countAll(){
    $sql = "SELECT count(orders.order_id) as countOrder 
        FROM orders 
        WHERE orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
    return pdo_query_one($sql);

}
// đơn hủy
function countRejected(){
    $sql = "SELECT count(orders.order_id) as countOrder 
        FROM orders 
        WHERE orders.status >= 4 AND orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
    return pdo_query_one($sql);
}
function countResole(){
    $sql = "SELECT count(orders.order_id) as countOrder 
        FROM orders 
        WHERE orders.status = 3 AND orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
    return pdo_query_one($sql);
}
// top 5 sản phẩm được mua nhiều nhất
function getTop5Pro() {
    $sql  = "select orders.create_at,product.name as namePro, count(orders.order_id) as countOrder from order_detail inner join product on product.product_id = order_detail.product_id ";
    $sql .= "inner join orders on orders.order_id = order_detail.order_id ";
    $sql .= "where orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) group by product.product_id  order by countOrder desc  limit 5 ";
    return pdo_query($sql);
}
// số đơn hàng theo dah mục
// top 5 sản phẩm được mua nhiều nhất
function getOrderByCate() {
    $sql  = "select category.name as nameCate, count(orders.order_id) as countOrder from order_detail inner join product on product.product_id = order_detail.product_id ";
    $sql .= "inner join category on category.category_id = product.category_id ";
    $sql .= "inner join orders on orders.order_id = order_detail.order_id ";
    $sql .= "where orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) group by category.category_id order by countOrder desc";
    return pdo_query($sql);
}








                                    # 3 MONTH
// doanh thu
function getRevenue3(){
    $sql = "select sum(order_detail.total_price) as orderPrice from orders inner join order_detail on order_detail.order_id = orders.order_id where orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) and orders.status = 3 group by orders.order_id";
    return pdo_query($sql);

}
//tổng đơn
function countAll3(){
    $sql = "SELECT count(orders.order_id) as countOrder 
        FROM orders 
        WHERE orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)";
    return pdo_query_one($sql);

}
// đơn hủy
function countRejected3(){
    $sql = "SELECT count(orders.order_id) as countOrder 
        FROM orders 
        WHERE orders.status >= 4 AND orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)";
    return pdo_query_one($sql);
}
function countResole3(){
    $sql = "SELECT count(orders.order_id) as countOrder 
        FROM orders 
        WHERE orders.status = 3 AND orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)";
    return pdo_query_one($sql);
}
// top 5 sản phẩm được mua nhiều nhất
function getTop5Pro3() {
    $sql  = "select orders.create_at,product.name as namePro, count(orders.order_id) as countOrder from order_detail inner join product on product.product_id = order_detail.product_id ";
    $sql .= "inner join orders on orders.order_id = order_detail.order_id ";
    $sql .= "where orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) group by product.product_id  order by countOrder desc  limit 5 ";
    return pdo_query($sql);
}
// số đơn hàng theo dah mục
// top 5 sản phẩm được mua nhiều nhất
function getOrderByCate3() {
    $sql  = "select category.name as nameCate, count(orders.order_id) as countOrder from order_detail inner join product on product.product_id = order_detail.product_id ";
    $sql .= "inner join category on category.category_id = product.category_id ";
    $sql .= "inner join orders on orders.order_id = order_detail.order_id ";
    $sql .= "where orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) and orders.create_at <= CURDATE() group by category.category_id order by countOrder desc";
    return pdo_query($sql);
}









                                # 6 MONTH

// doanh thu
function getRevenue6(){
    $sql = "select sum(order_detail.total_price) as orderPrice from orders inner join order_detail on order_detail.order_id = orders.order_id where orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH) and orders.status = 3 group by orders.order_id";
    return pdo_query($sql);

}
//tổng đơn
function countAll6(){
    $sql = "SELECT count(orders.order_id) as countOrder 
        FROM orders 
        WHERE orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)";
    return pdo_query_one($sql);

}
// đơn hủy
function countRejected6(){
    $sql = "SELECT count(orders.order_id) as countOrder 
        FROM orders 
        WHERE orders.status >= 4 AND orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)";
    return pdo_query_one($sql);
}
function countResole6(){
    $sql = "SELECT count(orders.order_id) as countOrder 
        FROM orders 
        WHERE orders.status = 3 AND orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)";
    return pdo_query_one($sql);
}
// top 5 sản phẩm được mua nhiều nhất
function getTop5Pro6() {
    $sql  = "select orders.create_at,product.name as namePro, count(orders.order_id) as countOrder from order_detail inner join product on product.product_id = order_detail.product_id ";
    $sql .= "inner join orders on orders.order_id = order_detail.order_id ";
    $sql .= "where orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH) group by product.product_id  order by countOrder desc  limit 5 ";
    return pdo_query($sql);
}
// số đơn hàng theo dah mục
function getOrderByCate6() {
    $sql  = "select category.name as nameCate, count(orders.order_id) as countOrder from order_detail inner join product on product.product_id = order_detail.product_id ";
    $sql .= "inner join category on category.category_id = product.category_id ";
    $sql .= "inner join orders on orders.order_id = order_detail.order_id ";
    $sql .= "where orders.create_at >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH) group by category.category_id order by countOrder desc";
    return pdo_query($sql);
}
?>