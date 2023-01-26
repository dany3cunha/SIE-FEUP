<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once("../../include/category_filter.php");
    include_once ("../../database/product.php");
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
                        <input type="text" name="page" value="f_ListProducts" hidden>
                        <?php   select_category($categorySelected);                         ?>
                    </form>
                </td>
                <td>
                    <form style= "margin: 0px" action="../../action/Employee_user/actionSubCategoryFilter.php" method="post">
                        <input type="text" name="page" value="f_ListProducts" hidden>
                        <?php   select_subcategory($categorySelected, $subCategorySelected) ?>
                    </form>
                </td>
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
                    <td > 
                        <form class=\"product-op-button\" method = \"GET\" action = \"formUpdateProduct.php \">
                            <input type=\"text\" name=\"product_ref\" value =\"".$product['product_ref']."\" hidden>
                            <button type=\"submit\" class=\"button\">
                                <i class=\"fa-regular fa-pen-to-square fa-2xl\"></i>
                            </button> 
                        </form>
                    </td>
                    <td > 
                        <form class=\"product-op-button\" method = \"GET\" action = \"formDeleteProduct.php \">
                            <input type=\"text\" name=\"product_ref\" value =\"".$product['product_ref']."\" hidden>
                            <button type=\"submit\" class=\"button\">
                                <i class=\"fa-regular fa-trash-can fa-2xl\"></i>
                            </button> 
                        </form>
                    </td>
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
