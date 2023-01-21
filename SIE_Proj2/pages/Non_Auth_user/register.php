<?php
    /* PHP includes */
    include_once("../../include/header.php");
?>

<?php
	menu();

	$errorMsg = "";
	$email = "";
	$name = "";
	$address = "";
	$cp = "";
	$phone = "";
	$nif = "";

	if (!empty($_SESSION['sErrorMsg'])) {
		//echo "<p class='error'>" . $_SESSION['sErrorMsg'] . "<p>";
		$errorMsg = $_SESSION['sErrorMsg'];
		$_SESSION['sErrorMsg'] = NULL;

		//Get the form data stored in the session vars, then clean them
		if (!empty($_SESSION['sEmail'])) 	$email = $_SESSION['sEmail'];
		if (!empty($_SESSION['sName'])) 	$name = $_SESSION['sName'];
		if (!empty($_SESSION['sAddress'])) 	$address = $_SESSION['sAddress'];
		if (!empty($_SESSION['sCP'])) 	    $cp = $_SESSION['sCP'];
		if (!empty($_SESSION['sPhone'])) 	$phone = $_SESSION['sPhone'];
		if (!empty($_SESSION['sNIF'])) 	    $nif = $_SESSION['sNIF'];

		$_SESSION['sEmail']     = NULL;
		$_SESSION['sName'] 		= NULL;
		$_SESSION['sAddress']   = NULL;
		$_SESSION['sCP']        = NULL;
		$_SESSION['sPhone']     = NULL;
		$_SESSION['sNIF']       = NULL;
	}
?>



<body>
	<div class="content-title">Registo </div>
	<div class="content-body">
		<form method="POST" action="../../action/Non_Auth_user/actionRegister.php">
			<table>
				<?php
				echo "
					<tr>
						<td>Email*</td>
						<td><input type=\"text\" value=\"".$email."\" name=\"newuserEmail\"></td>
					</tr>
					<tr>
						<td>Password*</td>
						<td><input type=\"password\" name=\"newuserPassword\"></td>
					</tr>
					<tr>
						<td>Nome*</td>
						<td><input type=\"text\" value=\"".$name."\" name=\"newuserName\"></td>
					</tr>
					<tr>
						<td>Morada*</td>
						<td><input type=\"text\" value=\"".$address."\" name=\"newuserAddress\"></td>
					</tr>
					<tr>
						<td>Código Postal*</td>
						<td><input type=\"text\" value=\"".$cp."\" name=\"newuserCP\"></td>
					</tr>
					<tr>
						<td>Contacto Telefónico</td>
						<td><input type=\"text\" value=\"".$phone."\" name=\"newuserPhone\"></td>
					</tr>
					<tr>
						<td>NIF</td>
						<td><input type=\"text\" value=\"".$nif."\" name=\"newuserNIF\"></td>
					</tr>
					<tr>
						<td class=\"auth-mandatory-text\">*campos obrigatórios</td>
						<td class=\"auth-error-text\"> ".$errorMsg." </td>
					</tr>
					<tr>
						<td></td>
						<td><input type=\"submit\" class=\"btn-form\" value=\"Registar\"></td>
					</tr>"
				?>
			</table>
		</form>
	</div>
</body>

<?php
	footer();
?>

</html>