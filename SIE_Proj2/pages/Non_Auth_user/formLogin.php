<?php
    /* PHP includes */
    include_once("../../include/header.php");
?>

<?php
	menu();

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
	
	<div class="content-body">
		<div class="content-title">Login </div>
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
						<td><input type=\"password\" name=\"userPassword\"></td>
					</tr>

					<tr>
						<td></td>
						<td class=\"auth-error-text\"> ".$errorMsg." </td>
					</tr>"
                ?>   
					<tr>
						<td></td>
						<td style="text-align: right"   >    
                                <button type="submit" class="button">
                                        <i class="fa-solid fa-right-to-bracket fa-2xl"></i> 
                                </button> 
                        </td>
					</tr>
				
			</table>
		</form>
	</div>

	<!--<div style="height:459px"></div> -->

</body>


<?php
	footer();
?>

</html>

