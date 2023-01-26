<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/user.php";
    include_once "../../include/security.php";
    session_start();
?>
<?php
	verifyAuthenticatedPermission();
?>


<?php
    // New data to be updated
    $email 		= $_POST['newuserEmail'];
	$password   = $_POST['newuserPassword'];
	$name 		= $_POST['newuserName'];
	$address    = $_POST['newuserAddress'];
    $cp         = $_POST['newuserCP'];
    $phone      = $_POST['newuserPhone'];
    $nif        = $_POST['newuserNIF'];

    // Get old email
    $current_ID     = $_SESSION['sCurrentUserID'];
	$userInfo       = getUserInfo($current_ID);
	$old_email      = $userInfo['email'];

    // Verify if the user updated the email
    if(!($email==$old_email) ){
        // If email was updated, verify if the new e-mail is available
        if(!emailIsAvailable($email) ){
            $_SESSION['sErrorMsg'] = "Este email já se encontra registado";
        }    
    }   

    if (empty($email) OR 
        empty($password) OR
        empty($name) OR
        empty($address) OR
        empty($cp) ) { 
        
        $_SESSION['sErrorMsg'] = "Preencha todos os campos obrigatórios";    
    }

    //If error was detected, exit without updating
    if(!empty($_SESSION['sErrorMsg'])){ 
        header("Location: ../../pages/Auth_user/userInfo.php"); 
        exit();    
    }

    //Update all fields
    $password_md5 = md5($password);
    if( !updateUser($current_ID, $email, $password_md5, $name, $address, $cp, $phone, $nif) ){
        $_SESSION['sErrorMsg'] = "Ocorreu um erro, tente novamente";
        header("Location: ../../pages/Non_Auth_user/formRegister.php"); 
        exit();  
    }

    $_SESSION['sFieldsUpdated'] = "Os dados foram atualizados com sucesso!";
    header("Location: ../../pages/Auth_user/userInfo.php");  

?>

