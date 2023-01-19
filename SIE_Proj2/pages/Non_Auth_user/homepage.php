
<html>
<header>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../../resources/icons/fonts-6/css/all.css">
    <link rel="stylesheet" href="../../css/style.css">

</header>

<body>

    <?php
        /* PHP includes */
        include_once("../../include/menu_footer.php");
        include_once("../../database/product.php");
        include_once("../../database/homepage_queries.php");
        menu();

        $highlights = get3Highlights();
        echo "<div class =\" content-title \">
                Produtos em Destaque
              </div>";
        echo "<div class =\"content-body\">";
        echo "  <div class = \"homepage-grid\">";
    
        while ($row = pg_fetch_row($highlights)) {
            $prod_ref = $row[0];
            $prod_name = $row[1];
            $prod_price =$row[2];
            $prod_subcat = $row[3];
            $prod_discount =$row[4];
            $prod_cat = getCatBySubcat($prod_subcat);
        
            echo "  <div class = \"homepage-grid-product \">                
                        <form method = \"GET\" action = \"productpage.php \">
                            <input type=\"text\" name=\"prod_ref\" value =\"".$prod_ref."\" hidden>
                            <div class = \"homepage-grid-product-img\">
                                <input type=\"image\" src=\"../../resources/images/products/".$prod_cat."/".$prod_ref.".jpg\"> 
                            </div>
                        </form>";
                        
            echo "      <form method = \"GET\" action = \"productpage.php \">  
                            <input type=\"text\" name=\"prod_ref\" value =\"".$prod_ref."\" hidden>
                            <div class = \"homepage-grid-product-name\">
                                <input type =\"submit\" value =\"".$prod_name."\">
                            </div>
                        </form>";
            
            if ($prod_discount <= 0){
            echo "      <div class = \"homepage-grid-product-price\">
                            ".$prod_price."€
                        </div>";
            }else{
            echo "      <div class = \"homepage-grid-product-price\">
                            <strike>".round($prod_price,2,PHP_ROUND_HALF_UP)."€ </strike>
                            <div class = \"homepage-grid-product-price-discount\">
                                ".round($prod_price - ($prod_discount/100)*$prod_price,2,PHP_ROUND_HALF_UP)."€                      
                            </div>
                        </div>";   
            }
            echo "  </div>";
        }
        echo "   </div>";
        echo " </div>";
        echo "<div class=\"body-remaining\"> </div>";
        footer();
    ?>

</body>

</html>