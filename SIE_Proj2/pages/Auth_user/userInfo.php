<?php
    /* PHP includes */
    include_once("../../include/header.php");
?>

<?php
	menu();
    
    $displayMsg = "";
    $msgStyle = "auth-error-text";
    if (!empty($_SESSION['sErrorMsg'])) {
        //Error detected!
		$displayMsg = $_SESSION['sErrorMsg'];
		$_SESSION['sErrorMsg'] = NULL;
	}
    else if(!empty($_SESSION['sFieldsUpdated'])) {
        //Update detected!
		$displayMsg = $_SESSION['sFieldsUpdated'];
        $msgStyle = "update-success-text";
		$_SESSION['sFieldsUpdated'] = NULL;
	}

    //Get all user fields using current ID
    $current_ID = $_SESSION['sCurrentUserID'];
	$userInfo = getUserInfo($current_ID);

	$email      = $userInfo['email'];
	$name       = $userInfo['nome'];
	$address    = $userInfo['morada'];
	$cp         = $userInfo['cp'];
	$phone      = $userInfo['telemovel'];
	$nif        = $userInfo['nif'];
?>

<body>
	<div class="content-title">Dados Pessoais </div>
	<div class="content-body">
		<form method="POST" action="../../action/Auth_user/actionUpdateUser.php">
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
						<td class=\"".$msgStyle."\"> ".$displayMsg." </td>
					</tr>
					<tr>
						<td></td>
						<td><input type=\"submit\" class=\"btn-form\" value=\"Guardar\"></td>
					</tr>"
				?>
			</table>
		</form>
	</div>
</body>