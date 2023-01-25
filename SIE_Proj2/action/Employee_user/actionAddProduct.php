<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/product.php";
    session_start();
?>

<?php
    // New product data
	$ref            = $_POST['newRef'];
	$name           = $_POST['newName'];
	$description    = $_POST['newDescription'];
	$subcategory    = $_POST['newSubCategory'];
	$price          = $_POST['newPrice'];
	$quantity       = $_POST['newQuantity'];
    $discount       = $_POST['newDiscount'];
    $highlight      = $_POST['newHighlight'];
    
    //Check for errors in data fields
    if(!refIsAvailable($ref) ){
        $_SESSION['sErrorMsg'] = "Esta referência já se encontra registada!";    
    }
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
    
    
    //If fields were wrong, save them and exit
    if(!empty($_SESSION['sErrorMsg'])){
        $_SESSION['sRef']           = $ref;
        $_SESSION['sName']          = $name;
        $_SESSION['sDescription']   = $description;
        $_SESSION['sSubCategory']   = $subcategory;
        $_SESSION['sPrice']         = $price;
        $_SESSION['sQuantity']      = $quantity;
        $_SESSION['sDiscount']      = $discount;
        $_SESSION['sHighlight']     = $highlight;
        header("Location: ../../pages/Employee_user/formAddProduct.php"); 
        exit();    
    }

    //Insert new product and checks for error in insert
    if( !insertProduct($ref, $name, $quantity, $description, $price, $discount, $highlight, $subcategory) ){
        $_SESSION['sErrorMsg'] = "Ocorreu um erro, tente novamente";
        header("Location: ../../pages/Employee_user/formAddProduct.php"); 
        exit();  
    }
    $_SESSION['sSuccessMsg'] = "Produto inserido com sucesso!";
    header("Location: ../../pages/Employee_user/formAddProduct.php");  

?>

