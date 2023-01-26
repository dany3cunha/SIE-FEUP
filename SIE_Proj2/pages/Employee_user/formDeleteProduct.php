<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once("../../database/product.php");
?>

<?php

    verifyEmployeePermission();
	
    menu();

    //Comes from f_ListProducts page
    $product_ref = $_GET['product_ref'];

    //Get all user fields using current ID
	$row     = getProductByRef($product_ref);
    $name    = pg_fetch_assoc($row)['product_name']; 
?>

<body>
	<div class="content-title">Apagar produto</div>
	<div class="content-body">
			<table>
                <tr>
                    <td>
                        <?php
                        echo "Pretende apagar os dados do produto <b>\"".$name."\"</b>, 
                              de referência <b>\"".$product_ref."\"</b>?";
                        ?>
                    </td>
                </tr>
            </table>		
            <table class="confirm-buttons-div">
                <tr>
                    <td>
                        <form method = "POST" action = "f_ListProducts.php">
                            <input type="text" name="" value ="" hidden>
                            <button type="submit" class="cancel-button">Cancelar</button> 
                        </form>    
                    </td> 
                    <td>
                        <form method = "POST" action = "../../action/Employee_user/actionDeleteProduct.php">
                            <?php
                                echo"<input type=\"text\" name=\"product_ref\" value =".$product_ref." hidden>";
                            ?>
                            <button type="submit" class="delete-button">Apagar</button> 
                        </form>    
                    </td>                   
                </tr>
            </table>
    </div>
<?php
    footer();
?>