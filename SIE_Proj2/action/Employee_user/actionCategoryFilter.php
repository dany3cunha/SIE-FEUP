<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/product.php";
?>

<?php

    $categorySelected = $_POST['category']; 
    $page             = $_POST['page'];

    //Clear category cookie
    unset($_COOKIE['cCategory']);
    setcookie("cCategory", NULL, time() - 3600, "/");
    //Clear subcategory cookie
    unset($_COOKIE['cSubCategory']);
    setcookie("cSubCategory", NULL , time() - 3600, "/");

    setcookie("cCategory", $categorySelected, 0, "/");
    

    header("Location: ../../pages/Employee_user/".$page.".php");  
?>