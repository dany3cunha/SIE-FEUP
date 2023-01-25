<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/product.php";
?>

<?php

    $subCategorySelected = $_POST['subcategory']; 
    $page                = $_POST['page'];

    //Clear subcategory cookie
    unset($_COOKIE['cSubCategory']);
    setcookie("cSubCategory", NULL , time() - 3600, "/");

    setcookie("cSubCategory", $subCategorySelected, 0, "/");
    

    header("Location: ../../pages/Employee_user/f_ListProducts.php"); 
    header("Location: ../../pages/Employee_user/".$page.".php");  
?>