<?php
    /* PHP includes */
    include_once("../../include/header.php");
?>

<?php
	menu();

	$errorMsg       = "";
    $successMsg     = "";

	$ref            = "";
	$name           = "";
	$description    = "";
	$subCategory    = "";
	$price          = "";
	$quantity       = "";
    $discount       = "";
    $highlight      = "";

    //Check for errors
	if (!empty($_SESSION['sErrorMsg'])) {
		//echo "<p class='error'>" . $_SESSION['sErrorMsg'] . "<p>";
		$errorMsg = $_SESSION['sErrorMsg'];
		$_SESSION['sErrorMsg'] = NULL;

		//Get the form data stored in the session vars, then clean them
		if (!is_null($_SESSION['sRef'])) 	        $ref            = $_SESSION['sRef'];
        if (!empty($_SESSION['sName'])) 	    $name           = $_SESSION['sName'];
        if (!empty($_SESSION['sDescription'])) 	$description    = $_SESSION['sDescription'];
        if (!empty($_SESSION['sSubCategory'])) 	$subCategory    = $_SESSION['sSubCategory'];
        if (!empty($_SESSION['sPrice'])) 	    $price          = $_SESSION['sPrice'];
        if (!is_null($_SESSION['sQuantity'])) 	$quantity       = $_SESSION['sQuantity'];
        if (!is_null($_SESSION['sDiscount'])) 	$discount       = $_SESSION['sDiscount'];
        if (!empty($_SESSION['sHighlight'])) 	$highlight      = $_SESSION['sHighlight'];
        
        $_SESSION['sRef']           = NULL;
        $_SESSION['sName']          = NULL;
        $_SESSION['sDescription']   = NULL;
        $_SESSION['sSubCategory']   = NULL;
        $_SESSION['sPrice']         = NULL;
        $_SESSION['sQuantity']      = NULL;
        $_SESSION['sDiscount']      = NULL;
        $_SESSION['sHighlight']    = NULL;  
	}

    //Check if product was inserted successfuly
    if(!empty($_SESSION['sSuccessMsg'])){
        $successMsg                 = $_SESSION['sSuccessMsg'];  
        $_SESSION['sSuccessMsg']    = NULL;  
    }    
?>



<body>
	<div class="content-title">Adicionar novo produto </div>
	<div class="content-body">
		<form method="POST" action="../../action/Employee_user/actionAddProduct.php">
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
						<td><textarea class=\"description-field\"  name=\"newDescription\" rows=\"10\" cols=\"77\" >".$description."</textarea>  </td>
					</tr>
                    <tr>
                        <td>Subcategoria</td>
                        <td></td>
                        <td>
                            <select name=\"newSubCategory\" class=\"add-cat-select\">
                                <option class=\"selection_text\" value=\"\">    Selecionar ... </option>";
    
    // Retrieve categories and subcategories from DB for the selection box
    $category_result = getAllCategories();
    $category = pg_fetch_assoc($category_result);
    while (isset($category["nome"])) {
        echo"                   <optgroup label=    \"".$category["nome"]."\" >";
        
        $subcategory_result = getAllSubCategories($category["nome"]);
        $subcategory        = pg_fetch_assoc($subcategory_result);
        while (isset($subcategory["nome"])) {
            echo"                   <option value=\"".$subcategory["nome"]."\"> ".$subcategory["nome"]." </option>";
            
            $subcategory    = pg_fetch_assoc($subcategory_result);
        }
        $category           = pg_fetch_assoc($category_result);

        echo"                   </optgroup>";
    }

    echo"
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
                            <input type=\"radio\" name=\"newHighlight\" value=\"true\"  ".($highlight=="true"   ? "checked" : "").   "> Sim
                            <input type=\"radio\" name=\"newHighlight\" value=\"false\" ".($highlight=="false"  ? "checked" : "").   "> Não
                        </td>
					</tr>
					<tr>
                        <td></td>
                        <td></td>
                        ".(!empty($errorMsg)     ? "<td class=\"auth-error-text\">     ".$errorMsg."    </td>" : "" )."
                        ".(!empty($successMsg)   ? "<td class=\"update-success-text\"> ".$successMsg. " </td>" : "" )."
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
