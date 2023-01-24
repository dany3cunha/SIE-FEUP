<?php
    /* PHP includes */
    include_once("../../include/header.php");
?>

<?php
	menu();

	$errorMsg       = "";
	$ref            = "";
	$name           = "";
	$description    = "";
	$subCategory    = "";
	$price          = "";
	$quantity       = "";
    $discount       = "";
    $highlight      = "";

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
						<td class=\"shorter-field\"><input  type=\"number\" value=\"".$ref."\" name=\"newRef\"></td>
					</tr>
					<tr>
						<td>Nome</td>
                        <td></td>
						<td class=\"name-field\"><input  type=\"text\" value=\"".$name."\" name=\"newName\"></td>
					</tr>
					<tr>
						<td style=\"vertical-align:top\">Descrição</td>
                        <td></td>
						<td><textarea class=\"description-field\"  name=\"description\" rows=\"10\" cols=\"77\" >".$description."</textarea>  </td>
					</tr>
                    <tr>
                        <td>Subcategoria</td>
                        <td></td>
                        <td>
                            <select name=\"newSubCategory\" class=\"add-cat-select\">
                                <option class=\"selection_text\" value=\"\">    Selecionar ... </option>
                                <optgroup label=\"Componentes\">
                                    <option value=\"Processadores> Processadores </option>
                                    <option value=\"Processadores> Processadores </option>
                                </optgroup>
                                <optgroup label=\"Componentes\">
                                    <option value=\"Processadores> Processadores </option>
                                    <option value=\"Processadores> Fontes de alimentação </option>
                                </optgroup>
                            </select>
                        </td>
                    </tr>
                    
					<tr>
						<td>Preço</td>
                        <td style=\"text-align: right\">(€)</td>
						<td class=\"shorter-field\"><input  type=\"number\" value=\"".$price."\" name=\"newPrice\" min=0 step=\"0.01\"></td>
					</tr>
					<tr>
						<td>Quantidade</td>
                        <td></td>
						<td class=\"shorter-field\"><input  type=\"number\" value=\"".$quantity."\" name=\"newQuantity\" min=0></td>
					</tr>
					<tr>
						<td>Desconto</td>
                        <td style=\"text-align: right\">(%)</td>
						<td class=\"shorter-field\"><input  type=\"number\" value=\"".$discount."\" name=\"newDiscount\" min=0 max=100></td>
					</tr>
					<tr>
						<td>Destaque</td>
                        <td></td>
						<td>
                            <input type=\"radio\" name=\"newHighlight\" value=1 ".($highlight=="true" ? "checked" : "").   "> Sim
                            <input type=\"radio\" name=\"newHighlight\" value=0 ".($highlight=="false" ? "checked" : "").  "> Não
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