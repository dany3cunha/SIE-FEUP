<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once("../../database/product.php");
?>

<?php
	menu();
    
    $displayMsg = "";
    $msgStyle = "auth-error-text";

    if (!empty($_SESSION['sErrorMsg'])) {
        //Error detected!
		$displayMsg  = $_SESSION['sErrorMsg'];
        $product_ref = $_SESSION['ProductREF'];
		
        $_SESSION['sErrorMsg']  = NULL;
        $_SESSION['ProductREF'] = NULL;
	}
    else if(!empty($_SESSION['sFieldsUpdated'])) {
        //Update detected!
		$displayMsg  = $_SESSION['sFieldsUpdated'];
        $product_ref = $_SESSION['ProductREF'];
        
        $msgStyle    = "update-success-text";
        
		$_SESSION['sFieldsUpdated'] = NULL;
        $_SESSION['ProductREF']     = NULL;
	}
    else{
        //Comes from f_ListProducts page
        $product_ref = $_GET['product_ref'];        
    }

    //Get all user fields using current ID
	$row            = getProductByRef($product_ref);
    $productInfo    = pg_fetch_assoc($row); 

	$ref            = $productInfo['product_ref'];
	$name           = $productInfo['product_name'];
	$description    = $productInfo['product_desc'];
	$subCategory    = $productInfo['product_subcategory'];
	$price          = $productInfo['product_price'];
	$quantity       = $productInfo['product_qty'];
    $discount       = $productInfo['product_discount'];
    $highlight      = $productInfo['product_highlighted'];
?>

<body>
	<div class="content-title">Atualizar informações do produto </div>
	<div class="content-body">
		<form method="POST" action="../../action/Employee_user/actionUpdateProduct.php">
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
    $list_category = pg_fetch_assoc($category_result);
    while (isset($list_category["nome"])) {
        echo"                   <optgroup label=    \"".$list_category["nome"]."\" >";
        
        $subcategory_result = getAllSubCategories($list_category["nome"]);
        $list_subcategory        = pg_fetch_assoc($subcategory_result);
        
        while (isset($list_subcategory["nome"])) {
            $selected = ($list_subcategory["nome"] == $subCategory) ? "selected" : "";
            echo"                   <option value=\"".$list_subcategory["nome"]."\" ".$selected."> "
                                        .$list_subcategory["nome"]." 
                                    </option>";
            
            $list_subcategory = pg_fetch_assoc($subcategory_result);
        }
        $list_category        = pg_fetch_assoc($category_result);

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
                            <input type=\"radio\" name=\"newHighlight\" value=\"true\"  ".($highlight=="t"   ? "checked" : "").   "> Sim
                            <input type=\"radio\" name=\"newHighlight\" value=\"false\" ".($highlight=="f"  ? "checked" : "").   "> Não
                        </td>
					</tr>
					<tr>
                        <td></td>
                        <td></td>
                        <td class=\"".$msgStyle."\"> ".$displayMsg." </td>
					</tr>
					<tr>
						<td></td>
                        <td></td>
						<td><input type=\"submit\" class=\"btn-form\" value=\"Atualizar\"></td>
					</tr>"
				?>
			</table>
		</form>
	</div>
</body>

<?php
	footer();
?>