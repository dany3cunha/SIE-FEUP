<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/product.php";
    include_once "../../include/security.php";
    session_start();
?>

<?php
    
    verifyEmployeePermission();
    
    // Product ref to be deleted
	$ref    =   $_POST['product_ref'];

    deleteProduct($ref);
    header("Location: ../../pages/Employee_user/f_ListProducts.php"); 

?>