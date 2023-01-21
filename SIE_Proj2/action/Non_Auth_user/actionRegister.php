<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/menu.php";
    include_once "../../database/user.php";
?>

<?php
    session_start();

    $email 		= $_POST['newuserEmail'];
	$password   = $_POST['newuserPassword'];
	$name 		= $_POST['newuserName'];
	$address    = $_POST['newuserAddress'];
    $cp         = $_POST['newuserCP'];
    $phone      = $_POST['newuserPhone'];
    $nif        = $_POST['newuserNIF'];

    if (empty($email) OR 
        empty($password) OR
        empty($name) OR
        empty($address) OR
        empty($cp) ) { 
        
        $_SESSION['sErrorMsg'] = "Preencha todos os campos obrigatórios";    
    }
    if(!emailIsAvailable($email) ){
        $_SESSION['sErrorMsg'] = "Este email já se encontra registado";    
    }

    //If fields where wrong, save them and exit
    if(!empty($_SESSION['sErrorMsg'])){
        $_SESSION['sEmail'] 	 = $email;
        $_SESSION['sName'] 		 = $name;
        $_SESSION['sAddress']    = $address;
        $_SESSION['sCP']         = $cp;
        $_SESSION['sPhone']      = $phone;
        $_SESSION['sNIF']        = $nif;   
        header("Location: ../../pages/Non_Auth_user/register.php"); 
        exit();    
    }

    //Insert new user, and checks for error in insert
    $password_md5 = md5($password);
    if( !insertNewUser($email, $password_md5, $name, $address, $cp, $phone, $nif) ){
        $_SESSION['sErrorMsg'] = "Ocorreu um erro, tente novamente";
        header("Location: ../../pages/Non_Auth_user/register.php"); 
        exit();  
    }
    //Everything verified, so let's insert the new user!
    $_SESSION['sAuthenticated'] = true; 
    $_SESSION['sCurrentUserID'] = getIdFromEmail($email);  
    header("Location: ../../index.php");  

?>

