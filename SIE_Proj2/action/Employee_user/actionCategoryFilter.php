<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../include/cookies.php";
    include_once "../../database/product.php";
    include_once "../../include/security.php";
    session_start();
?>

<?php

    verifyEmployeePermission();

    $categorySelected = $_POST['category']; 
    $page             = $_POST['page'];

    //Clear category cookie
    deleteCookie('cCategory');

    //Clear subcategory cookie
    unset($_COOKIE['cSubCategory']);
    deleteCookie('cSubCategory');

    setcookie("cCategory", $categorySelected, 0, "/");

    header("Location: ../../pages/Employee_user/".$page.".php");  
?>