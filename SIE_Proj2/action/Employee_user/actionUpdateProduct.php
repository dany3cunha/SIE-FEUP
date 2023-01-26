<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/product.php";
    include_once "../../include/security.php";
    session_start();
?>

<?php
    verifyEmployeePermission();
    
    // New data to be updated
	$ref            = $_POST['newRef'];
	$name           = $_POST['newName'];
	$description    = $_POST['newDescription'];
	$subcategory    = $_POST['newSubCategory'];
	$price          = $_POST['newPrice'];
	$quantity       = $_POST['newQuantity'];
    $discount       = $_POST['newDiscount'];
    $highlight      = $_POST['newHighlight'];

    //Numeric variables need to be compared in a way that differentiates values "" from "0"
    if ($ref=="" OR 
        empty($name) OR
        empty($description) OR
        empty($subcategory) OR
        empty($price) OR
        $quantity=="" OR
        $discount=="" OR
        empty($highlight) ) { 

        $_SESSION['sErrorMsg'] = "Preencha todos os campos do produto!";    
    }
    if( $price == 0 ) $_SESSION['sErrorMsg'] = "Um produto não pode ser gratuito!"; 

    $_SESSION['ProductREF'] = $ref;
    //If error was detected, exit without updating
    if(!empty($_SESSION['sErrorMsg'])){
        header("Location: ../../pages/Employee_user/formUpdateProduct.php"); 
        exit();    
    }

    //Update all fields
    if( !updateProduct($ref, $name, $quantity, $description, $price, $discount, $highlight, $subcategory) ){
        $_SESSION['sErrorMsg']  = "Ocorreu um erro, tente novamente";
        header("Location: ../../pages/Employee_user/formUpdateProduct.php"); 
        exit();  
    }

    $_SESSION['sFieldsUpdated'] = "As informações do produto foram atualizadas com sucesso!";
    header("Location: ../../pages/Employee_user/formUpdateProduct.php");  
?>