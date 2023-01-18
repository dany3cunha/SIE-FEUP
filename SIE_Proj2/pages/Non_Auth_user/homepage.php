<!-- PHP includes -->
<html>
<header>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../../resources/icons/fonts-6/css/all.css">
    <link rel="stylesheet" href="../../css/style.css">

</header>

<body>

    <?php
    
        include_once("../../include/menu_footer.php");
        include_once("../../database/homepage_queries.php");
        menu();

        $highlights = get3Highlights();
        echo "<div class =\" content-title \">
                Produtos em Destaque
              </div>";
        echo "<div class = \"content-layout\">";
        
        while ($row = pg_fetch_row($highlights)) {
            $prod_ref = $row[0];
            $prod_name = $row[1];
            $prod_price =$row[2];
            $prod_subcat = $row[3];
            $prod_discount =$row[4];
            $prod_cat = getCatBySubcat($prod_subcat);
        
            echo "<div class = \"content-product \">                
                    <div>
                        <img src=\"../../resources/images/products/".$prod_cat."/".$prod_ref.".jpg\">
                    </div>";
                        
            echo    "<div class = \"content-product-name\">
                        ".$prod_name."
                     </div>";
            
            if ($prod_discount <= 0){
            echo    "<div class = \"content-product-price\">
                        ".$prod_price."€
                     </div>";
            }else{
            echo    "<div class = \"content-product-price\">
                        <strike>".round($prod_price,2,PHP_ROUND_HALF_UP)."€ </strike>
                        <div class = \"content-product-price-discount\">
                            ".round($prod_price - ($prod_discount/100)*$prod_price,2,PHP_ROUND_HALF_UP)."€                      
                        </div>
                    </div>";   
            }
            echo "</div>";
        }
        echo "</div>";
        echo "<div class=\"body-remaining\"> </div>";
        footer();
    ?>

</body>

</html>