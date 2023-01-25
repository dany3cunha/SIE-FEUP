<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once ("../../database/product.php");
    include_once ("../../database/order.php");
?>

<?php
    
    # Validate the user login
    if (isset($_SESSION['sAuthenticated'])) {
        //Show user registered Name
        $user_id = $_SESSION['sCurrentUserID'];
        $userInfo       = getUserInfo($user_id);
        $user_name      = $userInfo['nome'];
        $user_address   = $userInfo['morada'];
        $user_contact   = $userInfo['telemovel'];
        $user_nif       = $userInfo['nif'];
    } else {
        header('Location: ../Non_Auth_user/login.php');
        exit();
    }  
?>

<?php
	menu();
?>

<body>
	<div class="content-title">Encomendas </div>
	<div class="content-body">
        <table class="product-list">
                <tr>
                    <th>    Nº encomenda  </th>
                    <th>    Produto       </th>
                    <th>    Total         </th>
                    <th>    Estado        </th>
                </tr>
    <?php
        $orders_history = getAllOrdersByUser($user_id);
        $orders = pg_fetch_assoc($orders_history);
        while(isset($orders['order_id']) ){
            $product = getProductByRef($orders['order_product_ref']);
            $product = pg_fetch_assoc($product);
            $product_category = getCatBySubcat($product['product_subcategory']);

            $total_price = $orders['order_qty'] * $product['product_price'] * (1 - ($product['product_discount']/100) ) ;
            $total_price = round($total_price,2,PHP_ROUND_HALF_UP);

            echo"
                <tr>
                    <td> ".$orders['order_id']       ."  </td>
                    <td>
                        <div class = \"product-list-product\">
                            
                            <div><img src=\"../../resources/images/products/" . $product_category . "/" . $product['product_ref'] . ".jpg\"></div>
                            <div> ".$product['product_name']." </div> 
                            
                        </div> 
                    </td>
                    <td> ". $total_price             ." € </td>
                    <td> ". $orders['order_status']  ."   </td>
                    <td> 
                        <form class=\"product-op-button\" method = \"GET\" action = \"formDetailOrder.php \">
                            <input type=\"text\" name=\"order_id\" value =\"".$orders['order_id']."\" hidden>
                            <button type=\"submit\" class=\"button\">
                                <i class=\"fa-solid fa-circle-chevron-right fa-2xl\"></i>
                            </button> 
                        </form>
                    </td>

                </tr>";
                $orders = pg_fetch_assoc($orders_history);
        }

        // Close results table
        echo"  
        </table>
        </div>";
    ?>
</body>

<?php

    footer();
?>