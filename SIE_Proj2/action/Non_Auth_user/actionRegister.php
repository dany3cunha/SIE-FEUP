<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/user.php";
    session_start();
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
    
    if(!emailIsAvailable($email) ){
        $_SESSION['sErrorMsg'] = "Este email já se encontra registado";    
    }
    if (empty($email) OR 
        empty($password) OR
        empty($name) OR
        empty($address) OR
        empty($cp) ) { 
        
        $_SESSION['sErrorMsg'] = "Preencha todos os campos obrigatórios";    
    }

    //If fields were wrong, save them and exit
    if(!empty($_SESSION['sErrorMsg'])){
        $_SESSION['sEmail'] 	 = $email;
        $_SESSION['sName'] 		 = $name;
        $_SESSION['sAddress']    = $address;
        $_SESSION['sCP']         = $cp;
        $_SESSION['sPhone']      = $phone;
        $_SESSION['sNIF']        = $nif;   
        header("Location: ../../pages/Non_Auth_user/formRegister.php"); 
        exit();    
    }

    //Insert new user, and checks for error in insert
    $password_md5 = md5($password);
    if( !insertNewUser($email, $password_md5, $name, $address, $cp, $phone, $nif) ){
        $_SESSION['sErrorMsg'] = "Ocorreu um erro, tente novamente";
        header("Location: ../../pages/Non_Auth_user/formRegister.php"); 
        exit();  
    }

    header("Location: ../../index.php");  

?>

