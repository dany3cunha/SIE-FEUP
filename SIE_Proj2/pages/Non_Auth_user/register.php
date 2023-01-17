<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/menu.php";
?>

<html>
<head>
	<style>
	
		* {font-family:arial;
		}

		form  { padding:10px;
				border:1px dotted;
		}
		
		td, th { padding:5px}			
		
	</style>
</head>

<?php
	session_start();

    if (!empty($_SESSION['sErrorMsg'])) {
		
		echo "<p class='error'>" . $_SESSION['errorMsg'] . "<p>";
		$_SESSION['sErrorMsg'] = NULL;
		
		//Get the form data stored in the session var's, then clean them
		if (!empty($_SESSION['sEmail'])) 	$email = $_SESSION['email'];        else $email = "";
		if (!empty($_SESSION['sName'])) 	$name = $_SESSION['sName']; 		else $name = "";
		if (!empty($_SESSION['sAddress'])) 	$address = $_SESSION['sAddress']; 	else $address = "";
        if (!empty($_SESSION['sCP'])) 	    $cp = $_SESSION['sCP']; 	        else $cp = "";
        if (!empty($_SESSION['sPhone'])) 	$phone = $_SESSION['sPhone']; 	    else $phone = "";
        if (!empty($_SESSION['sNIF'])) 	    $nif = $_SESSION['sNIF']; 	        else $nif = "";
		
        $_SESSION['sEmail']     = NULL;
        $_SESSION['sName'] 		= NULL;
        $_SESSION['sAddress']   = NULL;
        $_SESSION['sCP']        = NULL;
        $_SESSION['sPhone']     = NULL;
        $_SESSION['sNIF']       = NULL;
	}
?>

<body>
	
	<form method = "POST" action = "../../action/Non_Auth_user/actionRegister.php">
	
		<h3>Registo</h3>
		
		
		<table>
			<tr>
				<td>Email*</td>
				<td><input type = "text" value ="teste" name = "newuserEmail"></td>
			</tr>	
			<tr>
				<td>Password*</td>
				<td><input type = "text" name = "newuserPassword"></td>
			</tr>
			<tr>
				<td>Nome*</td>
				<td><input type = "text" name = "newuserName"></td>
			</tr>
			<tr>
				<td>Morada*</td>
				<td><input type = "text" name = "newuserAddress"></td>
			</tr>
			<tr>
				<td>Código Postal*</td>
				<td><input type = "text" name = "newuserCP"></td>
			</tr>
            <tr>
				<td>Contacto Telefónico</td>
				<td><input type = "text" name = "newuserPhone"></td>
			</tr>
            <tr>
				<td>NIF</td>
				<td><input type = "text" name = "newuserNIF"></td>
			</tr>
            <tr>
				<td>*Campos obrigatórios</td>
				<td style="align:left"> Mensagem de erro aqui </td>
			</tr>

			
			<tr>
				<td></td>
				<td style="align:left"><input type = "submit" value = "REGISTAR"></td>
			</tr>		

		</table>
		
	</form>
	
</body>
</html>