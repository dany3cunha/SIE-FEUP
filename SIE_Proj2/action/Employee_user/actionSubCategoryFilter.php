<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../include/cookies.php";
    include_once "../../database/product.php";
?>

<?php

    $subCategorySelected = $_POST['subcategory']; 
    $page                = $_POST['page'];

    //Clear subcategory cookie
    deleteCookie('cSubCategory');

    setcookie("cSubCategory", $subCategorySelected, 0, "/");
    
    header("Location: ../../pages/Employee_user/".$page.".php");  
?>