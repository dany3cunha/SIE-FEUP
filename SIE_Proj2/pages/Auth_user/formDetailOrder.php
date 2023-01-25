<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once("../../database/order.php");
    include_once("../../database/product.php");
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

    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
    }

    $order = getOrderById($order_id);
    $order = pg_fetch_assoc($order);
    $product = getProductByRef($order['order_product_ref']);
    $product = pg_fetch_assoc($product);
    $product_category = getCatBySubcat($product['product_subcategory']);

    $tax = 0.23; #iva 23%

    if ($product['product_discount'] > 0)
        $product_final_price = round($product['product_price'] - ($product['product_discount'] / 100) * $product['product_price'], 2, PHP_ROUND_HALF_UP);
    else
        $product_final_price =  $product['product_price'];

    $product_tax = round($product_final_price * $tax, 2, PHP_ROUND_HALF_UP);


?>
<?php
    menu();
?>

<body>

    <?php
    echo "<div class = \"content-body\">
       
                <div class=\"go-back-line \">
                  <form method=\"GET\" action = \"listOrdersHistory.php\">
                        <div class = \"go-back-line-text\">
                            <
                            <input type=\"submit\" name=\"label\" value=\"Voltar a Encomendas\" >
                        </div>                        
                    </form>            
                </div>
                <div class = \"checkout-grid\">
                    <div class = \"content-title\">
                        Resumo da Encomenda #".$order_id."
                    </div>

                    <div>
                        Encomenda #".$order_id." realizada em ".  $order['date']."
                    </div>
                    <div>
                        Estado atual: ".$order['order_status']."
                    </div>

                    <div class = \"checkout-content-grid \">
                        <div>
                            <table class = \"checkout-content-table\">
                                <tr>
                                    <td style=\"width:150px;\">
                                        <img src=\"../../resources/images/products/" . $product_category . "/" . $product['product_ref'] . ".jpg\"> 
                                    </td>
                                    <td style=\"width:600px;\">
                                        " . $product['product_name'] . "
                                    </td>
                                    <td class=\"shorter-field\">
                                        <form method=\"POST\" action = \"\">
                                                <label id=\"order_qty\">Quantidade</label> <br>
                                                <input type=\"number\" id=\"order_qty\" name = \"order_qty\" value = \"" . $order['order_qty'] . "\" disabled>
                                        </form>                                    
                                    </td>
                                    <td>
                                        " . $product_final_price . " € 
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class = \".checkout-content-grid-right\">
                            <div class = \"checkout-content-text \">
                                <table class = \"checkout-content-table\">
                                    <tr>
                                        <td>Nome do Cliente</td>                                      
                                        <td style = \"margin-left:auto;\"> " . $user_name . "</td>
                                    </tr>
                                    <tr>
                                        <td>Morada</td>                                      
                                        <td style = \"margin-left:auto;\"> " . $user_address . "</td>
                                    </tr>
                                    <tr>
                                        <td>Contacto Tel. </td>                                      
                                        <td style = \"margin-left:auto;\"> " . $user_contact . "</td>
                                    </tr>
                                    <tr>
                                        <td>NIF</td>                                      
                                        <td style = \"margin-left:auto;\"> " . $user_nif . "</td>
                                    </tr>
                                </table>                          
                            </div>
                            <div class = \"checkout-content-text \">
                                <table class = \"checkout-content-table\">
                                    <tr>
                                        <td> Método de Pagamento </td>
                                        <td>
                                            <form method=\"POST\" action = \"\">
                                                <select name=\"pay_method\" class = \"checkout-select-payment\" disabled>
                                                    <option name = \"pay_method\" " . ($order['order_pay_method'] == "MB" ? "selected" : "") . "       value=\"MB\" > Referência MB   </option>
                                                    <option name = \"pay_method\" " . ($order['order_pay_method'] == "Entrega" ? "selected" : "") . "  value=\"Entrega\" > Pag. na Entrega </option>
                                                </select>
                                            </form> 
                                        </td>
                                    </tr>                                              
                                </table>
                            </div>
                            <div>
                                <table  class = \"checkout-content-table\">
                                    <tr class =\"checkout-content-title\">
                                        <td> Sumário </td>
                                    </tr>
                                    <tr>
                                        <td>Produto</td>
                                        <td style = \"margin-left:auto;\"> " . $order['order_qty'] * ($product_final_price - $product_tax) . " €</td>
                                    </tr>
                                    <tr>
                                        <td> IVA (" . ($tax * 100) . "%) </td>
                                        <td style = \"margin-left:auto;\">" . $order['order_qty']  * $product_tax . " €</td>
                                    </tr>
                                    <tr class =\"checkout-content-title\">
                                        <td> Total </td>
                                        <td style = \"margin-left:auto;\"> " . $order['order_qty']  * $product_final_price . " €</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
        </div>";
        footer();
    ?>
</body>

</html>