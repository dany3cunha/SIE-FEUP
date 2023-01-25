<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/product.php";
?>

<?php
    // Product ref to be deleted
	$ref    =   $_POST['product_ref'];

    deleteProduct($ref);
    header("Location: ../../pages/Employee_user/f_ListProducts.php"); 

?>