<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once "../../database/product.php";
?>

<?php
	menu();
?>

<?php
    if( isset($_COOKIE['cCategory']) )      $categorySelected       = $_COOKIE['cCategory'];
    else $categorySelected = "";

    if( isset($_COOKIE['cSubCategory']) )   $subCategorySelected    = $_COOKIE['cSubCategory'];
    else $subCategorySelected = "";    
?>



<body>
	<div class="content-title">Inventário </div>
	<div class="content-body">
        <table>
            <tr>
                <td>
                    <form  style= "margin: 0px" action="../../action/Employee_user/actionCategoryFilter.php" method="post" > 
                        <select name="category" class="emp-cat-select" onchange="this.form.submit()">
                            <option value="">Selecionar categoria:</option>
<?php
    /**************************** Category Select Box ****************************/
    
    echo "                  <option value   =\"*\" ".($categorySelected=="*" ? "selected" : "").">Todas</option>";

    // Show options with categories from DB
    $category_result    = getAllCategories();
    $category           = pg_fetch_assoc($category_result);
    while (isset($category["nome"])) {
        // Show option and set selected (if it was previously selected)
        echo "              <option value = '".$category['nome']."' ".($categorySelected==$category['nome'] ? "selected" : "")." >"
                                .$category['nome']."
                            </option>";
        $category       = pg_fetch_assoc($category_result);
    }
    echo "              </select>
                    </form>
                </td>";

    /**************************** SubCategory Select Box ****************************/
    
    //If category was not selected or selected all, disable the subcategory selection box
    $disable_select = ( ($categorySelected=="" || $categorySelected=="*") ? "disabled" : "");
    echo"       <td>
                    <form style= \"margin: 0px\" action=\"../../action/Employee_user/actionSubCategoryFilter.php\" method=\"post\">
                        <select name = \"subcategory\"    class = \"emp-cat-select\"  onchange = \"this.form.submit()\" ".$disable_select.">
                            <option value   =   \"\" >  Selecionar subcategoria:    </option>";    

    // If some category was selected, retrieve subcategories for that category
    if($categorySelected!=""){
        echo "                  <option value   =\"*\" ".($subCategorySelected=="*" ? "selected" : "").">Todas</option>";

        // Show options with subcategories from DB
        $subCategory_result = getAllSubCategories($categorySelected);
        $subCategory        = pg_fetch_assoc($subCategory_result);
        while (isset($subCategory["nome"])) {
            // Show option
            echo "              <option value = '" . $subCategory['nome'] . "' ".($subCategorySelected==$subCategory['nome'] ? "selected" : "").">"
                                     .$subCategory['nome']."
                                </option>";
            $subCategory    = pg_fetch_assoc($subCategory_result);
        }   
    }

    echo"               </select>
                    </form>
                </td>";
    echo"       <td>
                    <a href=\"../../pages/Employee_user/formAddProduct.php\"> <button class=\"btn\">Adicionar</button></a>
                </td>";
?>
            </tr>
        </table>
        

<?php
    /**************************** Show Filter Results ****************************/
    
    // Retrieve products by category, if category was selected, and subcat was not selected
    if( $categorySelected!= "" and $subCategorySelected == "") $products_result = getProductsByCategory($categorySelected, NULL, NULL);
    if( $categorySelected!= "" and $subCategorySelected != "") $products_result = getProductsBySubCategory($subCategorySelected, NULL, NULL);

    // If it has some product results, show them
    if( isset($products_result) ){

        // Start results table
        echo"
        <table class=\"product-list\">
            <tr>
                <th>    Referência  </th>
                <th>    Produto     </th>
                <th>    Preço (€)   </th>
                <th>    Desconto (%)</th>
                <th>    Quantidade  </th>
                <th>    Destaque    </th>
                <th>    &nbsp       </th>
            </tr>";

        $product = pg_fetch_assoc($products_result);
        while(isset($product['product_ref']) ){
            
            echo"
            <tr>
                <td> ".$product['product_ref']."                                                </td>
                <td> ".$product['product_name']."                                               </td>
                <td> ".$product['product_price']."                                              </td>
                <td> ".($product['product_discount']>0 ? $product['product_discount'] : "--")." </td>
                <td> ".$product['product_qty']."                                                </td>
                <td> ".($product['product_highlighted']=="t" ? "Sim" : "--")."                  </td>
                <td> &nbsp </td>
            </tr>";

            $product = pg_fetch_assoc($products_result);
        }

        // Close results table
        echo"  
        </table>";

    }

?>

        



	</div>
</body>

<?php

    footer();
?>
