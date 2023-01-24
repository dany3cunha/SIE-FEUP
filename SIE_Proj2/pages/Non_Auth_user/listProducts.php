<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once("../../database/product.php");
?>

<?php

    # If not defined -> came from other page
    if (isset($_GET["info"])) {
        $info = $_GET["info"];

        if (searchCat($info) == true) {
            # The value passed matches with a category
            $products_category = $info;
            $type = "category";
        } else {
            # The value passed don't matches with a category
            $products_category = getCatBySubcat($info);
            if ($products_category != null) {
                # But maches with  a subcategory
                $products_subcategory = $info;
                $type = "subcategory";
            } else {
                echo "Not a category or subcategory !";
            }
        }

        # The value of the cookie is always setted when came from other page
        setcookie('cType', $type, 0,'/');
        setcookie('cCategory', $products_category, 0,'/');
        if (isset($products_subcategory))
            setcookie('cSubcategory', $products_subcategory, 0,'/');
    } else {
        # else came from this page, a filter was applied
        if (!isset($type))
            $type = $_COOKIE['cType'];
        if (!isset($products_category))
            $products_category = $_COOKIE['cCategory'];
        if (!isset($products_subcategory) and !empty($_COOKIE['cSubcategory']))
            $products_subcategory = $_COOKIE['cSubcategory'];
    }



    $availability = "";
    $price_max = ceil(getMostExpensiveProduct($products_category));
    $price_min = 0;
    
    # Related to the filters option
    # POST method for the filters

    if (isset($_POST["availability"])) {
        $availability = $_POST["availability"];
        #echo "DBG (stock): " . $availability;
    }
    $price_max_query =  $price_max;
    if (isset($_POST["price_max"])) {
        $price_max_query = ceil($_POST["price_max"]);
        //echo "DBG (price_max): " . $price_max;
    }

    # Search in the database for the products considering the above criteria 
    if($type == "category") 
        $allProducts = getProductsByCategory($products_category,$availability,$price_max_query); 
    else 
        $allProducts = getProductsBySubcategory($products_subcategory,$availability,$price_max_query);

    # Adjust the max price based on the products

    menu();
?>

<body>

    <?php
    echo "<div class = \"content-body\">";

    # Different go back based on category or subcategory
    echo "  <div class=\"go-back-line \">";
    echo "      <form method=\"GET\" action = \"../../index.php\">
                    <div class = \"go-back-line-text\">
                        <input type=\"submit\" name=\"go-to-homepage\" value=\"Página Inicial\">
                    </div>
                    >
                </form>";
    echo "      <form method=\"GET\" action = \"listProducts.php\">
                    <div class = \"go-back-line-text\">";

    if ($type == "category") {
        echo "          
                        <input type=\"submit\" name=\"info\" value=\"" . $products_category . "\">";
    } else {
        echo "          <input type=\"submit\" name=\"info\" value=\"" . $products_category . "\">
                        >
                        <input type=\"submit\" name=\"info\" value=\"" . $products_subcategory . "\">";
    }
    echo "          </div>
                </form>";

    echo "  </div>"; // end go-back-line div

    echo "  <div class = \"listproducts-grid\">
                <div class = \"content-title\">"
        . ($type == "category" ? $products_category : $products_subcategory) . " 
                </div> 
                <div class = \"listproducts-content-grid\">
                    <div class = \"listproducts-content-filters\">
                        <h1>Disponibilidade</h1>
                        <form method=\"POST\" action = \"listProducts.php\">
                          <input type=\"checkbox\" id =\"inStock\" name = \"availability\" value = \"true\" 
                                onchange=\"this.form.submit()\" ".($availability == "true" ? "checked" : "" ).">
                            <label for=\"inStock\"> Em stock </label> <br>

                            <input type=\"checkbox\" id =\"outStock\" name = \"availability\" value = \"false\" 
                                onchange=\"this.form.submit()\" ".($availability == "false" ? "checked" : "" ).">
                            <label for=\"outStock\"> Sem stock </label> <br>                        
                        </form>
                    
                        <h1>Preço</h1>
                        <form method=\"POST\" action = \"listProducts.php\">
                            <label> ".$price_min." € - ".$price_max." € </label> <br>
                            <input type=\"range\" name = \"price_max\" min=\"".$price_min."\" max=\"".$price_max."\" value=\"".$price_max_query."\" 
                                oninput=\"document.getElementById('price_range_max').innerHTML = this.value\"
                                onchange=\"this.form.submit()\"> <br>
                            <label id=\"price_range_max\"> max ".$price_max_query." €</label> <br>
                        </form>
                    </div>
                    <div class = \"listproducts-content-products\">
                        <table>";
    # Iterate over the search result products
    $row_cnt = pg_num_rows($allProducts);
    if($row_cnt == 0)
        echo "<div class = \"product-page-text-title\">
                Sem resultados 
                </div>";

    $cols_cnt = 0;
    #echo "      <tr>";
    while ($row_cnt > 0){
        if($row_cnt % 3 == 0 and $row_cnt > 3)
            echo "      <tr>";
        
        $product = pg_fetch_assoc($allProducts);
        $row_cnt = $row_cnt - 1;
        $cols_cnt = $cols_cnt + 1;
        
        echo "              <td>
                                <div class = \"grid-product \">                                                        
                                    <form method = \"GET\" action = \"detailProduct.php \">
                                        <input type=\"text\" name=\"product_ref\" value =\"".$product["product_ref"]."\" hidden>
                                        <div class = \"grid-product-img\">
                                            <input type=\"image\" src=\"../../resources/images/products/".$products_category."/".$product["product_ref"].".jpg\"> 
                                        </div>
                                    </form>   

                                    <form method = \"GET\" action = \"detailProduct.php \">  
                                        <input type=\"text\" name=\"product_ref\" value =\"".$product["product_ref"]."\" hidden>
                                        <div class = \"grid-product-name\">
                                            <input type =\"submit\" value =\"".$product["product_name"]."\">
                                        </div>
                                    </form>";

        if ($product["product_discount"] <= 0){
            echo "                  <div class = \"grid-product-price\">
                                        ".$product["product_price"]." €
                                    </div>";
            }else{
            echo "                  <div class = \"grid-product-price\">
                                        <strike>".round($product["product_price"],2,PHP_ROUND_HALF_UP)." € </strike>
                                        <div class = \"grid-product-price-discount\">
                                            ".round($product["product_price"] - ($product["product_discount"]/100)*$product["product_price"],2,PHP_ROUND_HALF_UP)."€                      
                                        </div>
                                    
                                    </div>";   
        }
        echo "                     
                                </div>
                            </td>";
        if($cols_cnt == 3 or $row_cnt == 0){
            $cols_cnt = 0;
            echo "      </tr>";
        }
            
    }
                        
    echo "              </table>
                    </div>
                </div>
            </div>";

    echo "</div>";   // end content-body div

    ?>


</body>

<?php
footer();
?>

</html>