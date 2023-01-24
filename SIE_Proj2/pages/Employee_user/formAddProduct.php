<?php
    /* PHP includes */
    include_once("../../include/header.php");
?>

<?php
	menu();

	$errorMsg = "";
	$ref = "";
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
		//if (!empty($_SESSION['sEmail'])) 	$email = $_SESSION['sEmail'];


		//$_SESSION['sEmail']     = NULL;

	}
?>



<body>
	<div class="content-title">Adicionar novo produto </div>
	<div class="content-body">
		<form method="POST" action="../../action/Non_Auth_user/actionRegister.php">
			<table>
				<?php
				echo "
					<tr>
						<td>Referência</td>
                        <td></td>
						<td class=\"shorter-field\"><input  type=\"text\" value=\"".$ref."\" name=\"newProductRef\"></td>
					</tr>
					<tr>
						<td>Nome</td>
                        <td></td>
						<td class=\"name-field\"><input  type=\"text\" value=\"".$ref."\" name=\"newProductRef\"></td>
					</tr>
					<tr>
						<td style=\"vertical-align:top\">Descrição</td>
                        <td></td>
						<td><textarea class=\"description-field\"  name=\"description\" rows=\"10\" cols=\"77\"> P   </textarea>    </td>
					</tr>
					<tr>
						<td>Preço</td>
                        <td style=\"text-align: right\">(€)</td>
						<td class=\"shorter-field\"><input  type=\"text\" value=\"".$ref."\" name=\"newProductRef\"></td>
					</tr>
					<tr>
						<td>Quantidade</td>
                        <td></td>
						<td class=\"shorter-field\"><input  type=\"text\" value=\"".$ref."\" name=\"newProductRef\"></td>
					</tr>
					<tr>
						<td>Desconto</td>
                        <td style=\"text-align: right\">(%)</td>
						<td class=\"shorter-field\"><input  type=\"text\" value=\"".$ref."\" name=\"newProductRef\"></td>
					</tr>
					<tr>
						<td>Destaque</td>
                        <td></td>
						<td>
                            <input type=\"radio\" name=\"highlight\" value=1> Sim
                            <input type=\"radio\" name=\"highlight\" value=0> Não
                        </td>
					</tr>
					<tr>
                        <td></td>
                        <td></td>
                        <td class=\"auth-error-text\"> ".$errorMsg." </td>
					</tr>
					<tr>
						<td></td>
                        <td></td>
						<td><input type=\"submit\" class=\"btn-form\" value=\"Adicionar\"></td>
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