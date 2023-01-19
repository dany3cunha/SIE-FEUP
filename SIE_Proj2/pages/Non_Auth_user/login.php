<html>
<header>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../resources/icons/fonts-6/css/all.css">
	<link rel="stylesheet" href="../../css/style.css">
</header>

<?php
// PHP include menu
include_once("../../include/menu_footer.php");
menu();

session_start();

$errorMsg = "";
$email = "";


if (!empty($_SESSION['sErrorMsg'])) {
	//echo "<p class='error'>" . $_SESSION['sErrorMsg'] . "<p>";
	$errorMsg = $_SESSION['sErrorMsg'];
	$_SESSION['sErrorMsg'] = NULL;

	//Get the form data stored in the session vars, then clean them
	if (!empty($_SESSION['sEmail'])) 	$email = $_SESSION['sEmail'];
	$_SESSION['sEmail'] = NULL;
}
?>



<body>
	<div class="content-title">Login </div>
	<div class="content-body">
		<form method="POST" action="../../action/Non_Auth_user/actionLogin.php">
			<table>
				<?php
				echo "
					<tr>
						<td>Email</td>
						<td><input type=\"text\" value=\"".$email."\" name=\"userEmail\"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type=\"text\" name=\"userPassword\"></td>
					</tr>

					<tr>
						<td></td>
						<td class=\"auth-error-text\"> ".$errorMsg." </td>
					</tr>
					<tr>
						<td></td>
						<td><input type=\"submit\" class=\"btn-form\" value=\"Login\"></td>
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