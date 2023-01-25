<?php
    /* PHP includes */
    include_once("../../include/header.php");
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

    # GET product ref.
    if(isset($_COOKIE['cProduct_ref'])){
        # It returned from the actionCreateOrder
        $product_ref = $_COOKIE['cProduct_ref'];

    }else{
        # It came from the productDetails
        $product_ref = $_GET['product_ref'];
    }

    #GET order quantity information
    if(isset($_COOKIE['cOrder_qty'])){
        # It returned from the actionCreateOrder
        $order_qty = $_COOKIE['cOrder_qty'];
    }else{
        # It came from the productDetails, so it is the default: 1
        $order_qty = 1;
    }

     #GET payment method information
     if(isset($_COOKIE['cPay_method'])){
        # It returned from the actionCreateOrder
        $pay_method = $_COOKIE['cPay_method'];

    }else{
        # It came from the productDetails, so it is the default: Escolha
        $pay_method = "Escolha";
    }

    # check if there are errors
    if(isset($_COOKIE['cErrorCreateOrder'])){
        $cErrorMsg = $_COOKIE['cErrorCreateOrder'];
        deleteCookie("cErrorCreateOrder");
    }
    else{
        $cErrorMsg = " ";
    }

    # Retrieve from DB product information
    $prod_info = getProductByRef($product_ref);
    $prod_info = pg_fetch_assoc($prod_info);

    $product_name          = $prod_info['product_name'];
    $product_qty           = $prod_info['product_qty'];
    $product_desc          = $prod_info['product_desc'];
    $product_price         = $prod_info['product_price'];
    $product_discount      = $prod_info['product_discount'];
    $product_highlighted   = $prod_info['product_highlighted'];
    $product_subcategory   = $prod_info['product_subcategory'];
    $product_category      = getCatBySubcat($product_subcategory);

    $tax = 0.23; #iva 23%

    if ($product_discount > 0)
        $product_final_price = round($product_price - ($product_discount / 100) * $product_price, 2, PHP_ROUND_HALF_UP);
    else
        $product_final_price =  $product_price;

    $product_tax = round($product_final_price * $tax, 2, PHP_ROUND_HALF_UP);

?>

<body>
    <?php
        menu();

    echo "<div class = \"content-body\">
       
                <div class=\"go-back-line \">
                  <form method=\"GET\" action = \"../Non_Auth_user/detailProduct.php\">
                        <div class = \"go-back-line-text\">
                            <
                            <input type=\"text\" name=\"product_ref\" value=\"" . $product_ref . "\" hidden>
                            <input type=\"submit\" name=\"label\" value=\"Voltar\" >
                        </div>                        
                    </form>            
                </div>
                
                <div class = \"checkout-grid\">
                    <div class = \"content-title\">
                        Resumo da Encomenda
                    </div>

                    <div class = \"checkout-content-grid \">
                        <div>
                            <table class = \"checkout-content-table\">
                                <tr>
                                    <td style=\"width:150px;\">
                                        <img src=\"../../resources/images/products/" . $product_category . "/" . $product_ref . ".jpg\"> 
                                    </td>
                                    <td style=\"width:600px;\">
                                        " . $product_name . "
                                    </td>
                                    <td class=\"shorter-field\">
                                        <form method=\"POST\" action = \"../../action/Auth_user/actionCreateOrder.php\">
                                                <label id=\"order_qty\">Quantidade</label> <br>
                                                <input type=\"number\" id=\"order_qty\" name = \"order_qty\" value = \"" . $order_qty . "\"  onchange=\"this.form.submit()\">
                                                <input type = \"text\" name=\"product_ref\" value=\"" . $product_ref . "\" hidden>
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
                            <div>
                                <table style = \"width:100%;\">
                                    <tr>
                                        <td style = \"float:right;\"> 
                                            <a href=\"userInfo.php\"> 
                                                <button class=\"btn\" style=\"height:25px;\">Editar</button>
                                            </a>
                                        </td>
                                    </tr>                                                                   
                                </table>                                
                            </div>
                            <div class = \"checkout-content-text \">
                                <table class = \"checkout-content-table\">
                                    <tr>
                                        <td> Método de Pagamento </td>
                                        <td>
                                            <form method=\"POST\" action = \"../../action/Auth_user/actionCreateOrder.php\">
                                                <select name=\"pay_method\" class = \"checkout-select-payment\" onchange=\"this.form.submit()\">
                                                    <option name = \"pay_method\" value=\"Escolha\" >       Escolha Pag.     </option>
                                                    <option name = \"pay_method\" ".($pay_method == "MB" ? "selected" : "" )."       value=\"MB\"> Referência MB   </option>
                                                    <option name = \"pay_method\" ".($pay_method == "Entrega" ? "selected" : "" )."  value=\"Entrega\"> Pag. na Entrega </option>
                                                </select>
                                                <input type = \"text\" name=\"product_ref\" value=\"" . $product_ref . "\" hidden>    
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
                                        <td style = \"margin-left:auto;\"> " . $order_qty * ($product_final_price - $product_tax) . " €</td>
                                    </tr>
                                    <tr>
                                        <td> IVA (" . ($tax * 100) . "%) </td>
                                        <td style = \"margin-left:auto;\">" . $order_qty * $product_tax . " €</td>
                                    </tr>
                                    <tr class =\"checkout-content-title\">
                                        <td> Total </td>
                                        <td style = \"margin-left:auto;\"> " . $order_qty * $product_final_price . " €</td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <table style = \"width:100%;\">
                                    <tr> ".$cErrorMsg." </tr>
                                    <tr>
                                        <td style = \"float:right;\"> 
                                            <form method = \"POST\" action=\"../../action/Auth_user/actionCreateOrder.php\">
                                                <input type = \"text\" name=\"user_id\"     value=\"" . $user_id     . "\" hidden>
                                                <input type = \"text\" name=\"product_ref\" value=\"" . $product_ref . "\" hidden>
                                                <input type = \"text\" name=\"order_qty\"   value=\"" . $order_qty   . "\" hidden>
                                                <input type = \"text\" name=\"pay_method\"  value=\"" . $pay_method  . "\" hidden>
                                                <input type=\"submit\" class=\"btn-form\" value=\"Avançar\">    
                                            </form>
                                        </td>
                                    </tr>                                                                   
                                </table>                              
                            </div>
                        </div>
                    </div>

                </div>

              </div>"; #end content-body
    ?>
</body>

<?php
    footer();
?>

</html>