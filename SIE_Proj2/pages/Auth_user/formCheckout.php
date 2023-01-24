<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once("../../database/product.php");
?>

<?php
    
    # GET product ref.
    $product_ref = $_GET['product_ref'];

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

    # Validate the user login
    if(isset($_SESSION['sAuthenticated'])){
        //Show user registered Name
        $userInfo       = getUserInfo($_SESSION['sCurrentUserID']);
        $user_name      = $userInfo['nome'];
        $user_address   = $userInfo['morada'];
        $user_contact   = $userInfo['telemovel'];
        $user_nif       = $userInfo['nif'];
    }

    $order_qty = 1;
    
    # Related to the filters option
    # POST method for the filters
    if (isset($_POST["order_qty"])) {
        $order_qty = $_POST["order_qty"];
        #echo "DBG (order_qty): " . $order_qty;
    }

?>

<body>
    <?php
        menu();

        echo "<div class = \"content-body\">
       
                <div class=\"go-back-line \">
                  <form method=\"GET\" action = \"../Non_Auth_user/detailProduct.php\">
                        <div class = \"go-back-line-text\">
                            <
                            <input type=\"text\" name=\"product_ref\" value=\"".$product_ref."\" hidden>
                            <input type=\"submit\" name=\"label\" value=\"Voltar\" >
                        </div>                        
                    </form>            
                </div>
                
                <div class = \"checkout-grid\">
                    <div class = \"content-title\">
                        Resumo da Encomenda
                    </div>

                    <div class = \"checkout-content-grid \">
                        <div class = \"checkout-content-table\">
                            <table>
                                <tr>
                                    <td>
                                        <img src=\"../../resources/images/products/".$product_category."/".$product_ref.".jpg\"> 
                                    </td>
                                    <td >
                                        ".$product_name."
                                    </td>
                                    <td class=\"checkout-content-table-qty\">
                                        <form method=\"POST\" action = \"\">
                                                <label id=\"order_qty\">Quantidade</label>
                                                <input type=\"number\" id=\"order_qty\" name = \"order_qty\" value = \"".$order_qty."\"  onchange=\"this.form.submit()\">
                                        </form>                                    
                                    </td>
                                    <td>
                                        ".($product_discount > 0 ? 
                                            round($product_price - ($product_discount/100)*$product_price,2,PHP_ROUND_HALF_UP)
                                            : $product_price)." € 
                                    </td>
                                </tr>

                            </table>
                        </div>

                        <div>
                            <div class = \"checkout-content-text \">
                                <table>
                                    <tr>
                                        <td>                                                                                  
                                            Nome do Cliente
                                        </td>
                                        <td class = \"checkout-content-text-right\">
                                            ".$user_name."
                                            
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <table>
                                <tr>
                                    <td> Método de Pagamento </td>
                                    <td>
                                        <select name=\"pay_meth\">
                                            <option value=\"\">Escolha Pag.</option>
                                            <option value=\"MB\">Referência MB</option>
                                            <option value=\"Entrega\">Pag. na Entrega</option>
                                        </select> 
                                    </td>
                                </tr>                                              
                            </table>

                            <table>
                            </table>
                        </div>
                    </div>

                </div>

              </div>"; #end content-body
    ?>

</body>

</html