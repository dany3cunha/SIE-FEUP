<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once("../../database/product.php");
    include_once("../../database/categories.php");
?>

<?php
    # GET 3 random highlighted products 
    $highlights = get3Highlights();

    # GET 6 products with the biggest discounts
    $discounts = get6BiggestDiscounts();
?>

<body>
    <?php
        menu();

        echo "<div class =\"content-body\">
                <div class =\" content-title \">
                    Produtos em Destaque
                </div>";
        echo "  <div class = \"homepage-grid\">";
    
        while ($row = pg_fetch_row($highlights)) {
            $product_ref = $row[0];
            $product_name = $row[1];
            $product_price =$row[2];
            $product_subcat = $row[3];
            $product_discount =$row[4];
            $product_cat = getCatBySubcat($product_subcat);
        
            echo "  <div class = \"grid-product \">                
                        <form method = \"GET\" action = \"detailProduct.php \">
                            <input type=\"text\" name=\"product_ref\" value =\"".$product_ref."\" hidden>
                            <div class = \"grid-product-img\">
                                <input type=\"image\" src=\"../../resources/images/products/".$product_cat."/".$product_ref.".jpg\"> 
                            </div>
                        </form>";
                        
            echo "      <form method = \"GET\" action = \"detailProduct.php \">  
                            <input type=\"text\" name=\"product_ref\" value =\"".$product_ref."\" hidden>
                            <div class = \"grid-product-name\">
                                <input type =\"submit\" value =\"".$product_name."\">
                            </div>
                        </form>";

            echo "      <div class = \"grid-product-price\">
                            ".$product_price." €
                        </div>"; 
            echo "  </div>";
        }
        
        echo "  </div>";  # end homepage grid      

        echo "<div class =\" content-title \" style = \" margin-left:0px;padding-left:0px;\">
                Produtos em Desconto
              </div>";
        
        $row_cnt = pg_num_rows($discounts);
        $cols_cnt = 0;

        while ($row_cnt > 0){
            
            if($cols_cnt == 0)
                echo "  <div class = \"homepage-grid\">";
            
            $row_cnt = $row_cnt - 1;
            $cols_cnt = $cols_cnt + 1;
                
            $row = pg_fetch_row($discounts); 
            $product_ref = $row[0];
            $product_name = $row[1];
            $product_price =$row[2];
            $product_subcat = $row[3];
            $product_discount =$row[4];
            $product_cat = getCatBySubcat($product_subcat);
        
            echo "          <div class = \"grid-product \">                
                                <form method = \"GET\" action = \"detailProduct.php \">
                                    <input type=\"text\" name=\"product_ref\" value =\"".$product_ref."\" hidden>
                                    <div class = \"grid-product-img\">
                                        <input type=\"image\" src=\"../../resources/images/products/".$product_cat."/".$product_ref.".jpg\"> 
                                    </div>
                                </form>";
                        
            echo "              <form method = \"GET\" action = \"detailProduct.php \">  
                                    <input type=\"text\" name=\"product_ref\" value =\"".$product_ref."\" hidden>
                                    <div class = \"grid-product-name\">
                                        <input type =\"submit\" value =\"".$product_name."\">
                                    </div>
                                </form>";
            
            echo "              <div class = \"grid-product-price\">
                                    <strike>".round($product_price,2,PHP_ROUND_HALF_UP)." € </strike>
                                    <div class = \"grid-product-price-discount\">
                                        ".round($product_price - ($product_discount/100)*$product_price,2,PHP_ROUND_HALF_UP)."€                      
                                    </div>
                                </div>";   
            echo "          </div>";
            if($cols_cnt == 3 or $row_cnt == 0){
                $cols_cnt = 0;
                echo "  </div";
            }
        }
        
        echo " </div>";
        echo"</div>"; #end content-body
    ?>

    <?php  
        footer();
    ?>

</body>

</html>