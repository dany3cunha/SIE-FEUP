<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once("../../database/order.php");
    include_once("../../database/product.php");
    include_once("../../database/categories.php");
    
?>

<?php
    
    if(isset($_COOKIE['cOrderCreated'])){
        $order_id = $_COOKIE['cOrderCreated'];
        deleteCookie('cOrderCreated');
    }

    $order = getOrderById($order_id);
    $order = pg_fetch_assoc($order);
    $product = getProductByRef($order['order_product_ref']);
    $product = pg_fetch_assoc($product);
    $product_category = getCatBySubcat($product['product_subcategory']);
    
    $total_price = $order['order_qty'] * $product['product_price'] * (1 - ($product['product_discount']/100) ) ;
    $total_price = round($total_price,2,PHP_ROUND_HALF_UP)
?>

<body>
    <?php
        menu();
    ?>

    <div class="content-body">
        <div class="go-back-line">
            <form method="GET" action = "../../index.php">
                <div class = "go-back-line-text">
                    <
                    <input type="submit" name="go-to-homepage" value="Página Inicial">
                </div>
            </form>
        </div>

    <?php 
    
    echo "<table style = \"width:100%;\">
                <tr style =\"text-align:center;\">
                    <td class = \"content-title\"> Encomenda realizada com sucesso!</td>
                    <br>
                </tr>
                <tr style =\"text-align:center;\">
                    <td>A sua encomenda será preparada por nós brevemente. <br>
                        Agradecemos a sua preferência. <br>
                    </td>
                </tr>
            </table>";
    echo "  <table style = \"width:100%;\">
                <tr style =\"text-align:center;\">
                    <td style=\"width:150px;\">
                        <img style =\"width:20%;\" src=\"../../resources/images/products/" . $product_category . "/" . $product['product_ref'] . ".jpg\"> 
                    </td>
                </tr>
                <tr style =\"text-align:center;\">
                    <td>
                        " . $product['product_name'] . "
                    </td>
                </tr>
                <tr style =\"text-align:center;\">
                    <td>
                        Quantidade ".$order['order_qty']."                            
                    </td>
                </tr>
                <tr style =\"text-align:center;\">
                    <td>
                        " . $total_price . " € 
                    </td>
                </tr>
            </table>";
    
    if($order['order_pay_method'] == "MB"){
        echo "  
            <table>
                <tr>
                    <td>Para completar a sua encomenda, efetue o pagamento num terminal multibanco no prazo máximo de 24h. </td>
                </tr>
            </table>
            <table style = \"width:20%;\">
                <tr> 
                    <td>Entidade  </td> <td> 22148 </td>
                </tr>
                <tr> 
                    <td>Referência</td> <td>".rand(100000000,999999999)." </td>
                </tr>
                <tr> 
                    <td>Montante</td>   <td>". $total_price." €</td>
                </tr>
            </table>";
    }else if($order['order_pay_method'] == "Entrega"){

    }else {
        echo "UPS something went wrong with the payment method!";
    }
    echo "  </table>
         </div>";
        
    ?>

    </div>


</body>

<?php
    footer();
?>

</html>