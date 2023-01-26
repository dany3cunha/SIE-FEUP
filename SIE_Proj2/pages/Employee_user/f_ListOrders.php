<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once ("../../database/order.php");
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
	<div class="content-title">Encomendas </div>
	<div class="content-body">
        <table>
            <tr>
                <td>
                    <form  style= "margin: 0px" action="../../action/Employee_user/actionCategoryFilter.php" method="post" > 
                        <input type="text" name="page" value="f_ListOrders" hidden>
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
                        <input type=\"text\" name=\"page\" value=\"f_ListOrders\" hidden>
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
?>
            </tr>
        </table>
        

<?php
    /**************************** Show Filter Results ****************************/
    
    // Retrieve orders by the cat and subcat filters selected
    if( $categorySelected!= "" and $subCategorySelected == "") $orders_result = getOrdersByCategory($categorySelected);
    if( $categorySelected!= "" and $subCategorySelected != "") $orders_result = getOrdersBySubCategory($subCategorySelected);
    
    // Retrieve all order possible status
    $status_result  = getOrdersPossibleStatus();
    $status_var     = pg_fetch_assoc($status_result);
    $status_array   = array();
    while(isset($status_var['description']) ){
        array_push($status_array, $status_var['description']);
        $status_var = pg_fetch_assoc($status_result);
    }
     

    // If it has some orders results, show them
    if( isset($orders_result) ){
        // Start results table
        echo"
            <table class=\"product-list\">
                <tr>
                    <th>    Nº da Encomenda     </th>
                    <th>    Produto             </th>
                    <th>    Quantidade          </th>
                    <th>    Método de Pagamento </th>
                    <th>    Estado              </th>
                </tr>";
        
        $order = pg_fetch_assoc($orders_result);
        while(isset($order['order_id']) ){
            //If order is finished, then disable the select:
            $disable = ($order['order_status']=="Entregue" ? "disabled" : "");
            echo"
                <tr>
                    <td> ".$order['order_id']."         </td>
                    <td> ".$order['product_name']."     </td>
                    <td> ".$order['quantity']."         </td>
                    <td> ".$order['pay_method']."       </td>
                    
                    <form action=\"../../action/Employee_user/actionUpdateOrderStatus.php\" method=\"post\">
                        <td>      
                            <input type=\"text\" name=\"order_id\" value=\"".$order['order_id']."\" hidden>
                            <select name = \"status\"    class = \"update-order-select\" ".$disable.">";
            foreach($status_array as $status){
                echo $status;
                //The Waiting Payment option should only apear if the payment method is MB
                if($status=="Aguarda Pagamento" and $order['pay_method']!="MB") continue; 
                
                //Detect if the current status is the selected one
                $selected = ($status==$order['order_status'] ? "selected" : "");
                //Show status update options   
                echo"           <option value=\"".$status."\" ".$selected.">".$status."</option>";
            }
        
            echo"           </select> 
                        </td>
                        <td>
                            <button type=\"submit\" class=\"button\">
                                <i class=\"fa-regular fa-pen-to-square fa-2xl\"></i>
                            </button> 
                        </td>
                    </form>
                </tr>";
            
            $order = pg_fetch_assoc($orders_result);
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
