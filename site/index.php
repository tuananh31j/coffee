<?php
require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
require_once "/xampp/htdocs/du-an-1-nhom7/pdo.php";
require_once "site/view/layout/header.php";
if(isset($_GET['url'])) {
    switch ($_GET['url']) {
    case 'product':
        require_once "site/view/pages/product.php";
        break;
    
    default:
        require_once "site/view/pages/home.php";
        break;
}
}else{
    require_once "site/view/pages/home.php";
}

require_once "site/view/layout/footer.php";



?>