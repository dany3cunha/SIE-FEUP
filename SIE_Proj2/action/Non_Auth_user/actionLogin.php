<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/user.php";
    session_start();
?>

<?php

    $email 		= $_POST['userEmail'];
	$password   = $_POST['userPassword'];
    //Hash the password
    $password_md5 = md5($password);

    if(empty($email) OR empty($password)) { 
        $_SESSION['sErrorMsg'] = "Preencha todos os campos obrigatórios";    
    }

    $current_userID = verifyLogin($email, $password_md5);
    if($current_userID == -1){
        $_SESSION['sErrorMsg'] = "As credenciais estão incorretas";    
    }else if($current_userID == -2){
        $_SESSION['sErrorMsg'] = "O utilizador não existe";   
    }

    //If fields where wrong, save them and exit
    if(!empty($_SESSION['sErrorMsg'])){
        $_SESSION['sEmail'] = $email;   
        header("Location: ../../pages/Non_Auth_user/login.php"); 
        exit();    
    }

    //Check if user is employee
    if( getUserInfo($current_userID)['funcionario'] == "t" ){
        $_SESSION['sEmployeePerm']=true;
    }

    //Credentials valid, user authenticated and userID saved!
    $_SESSION['sAuthenticated'] = true; 
    $_SESSION['sCurrentUserID'] = $current_userID;  
    header("Location: ../../index.php");  

?>

