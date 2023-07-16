<?php
require_once "/xampp/htdocs/du-an-1-nhom7/global.php";
require_once "/xampp/htdocs/du-an-1-nhom7/pdo.php";


require_once "./view/layout/sideLeft.php";
if(isset($_GET['url'])) {
    switch ($_GET['url']) {
    case 'value':
        # code...
        break;
    
    default:
        require_once "./view/dashboard/dashboard.php";
        break;
}
}else{
    require_once "./view/dashboard/dashboard.php";
    
}

require_once "./view/layout/footer.php";
?>