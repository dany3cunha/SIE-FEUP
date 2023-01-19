<html>
<header>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../../resources/icons/fonts-6/css/all.css">
    <link rel="stylesheet" href="../../css/style.css">

</header>

<?php
    /* PHP includes */
    include_once("../../include/menu_footer.php");
    include_once("../../database/product.php");
    
    # GET product ref.
    $product_ref = $_GET['prod_ref'];

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

    # Access local description of the product
    $product_specs_file_path = '../../resources/specifications/products/'.$product_category.'/'.$product_ref.'.txt';
    $product_specs_file = fopen($product_specs_file_path,"r") or die("Unable to open specs file!");
    $product_specs = fread($product_specs_file,filesize($product_specs_file_path));
    fclose($product_specs_file);
?>

<body>

    <?php

        menu();
        
        echo "<div class = \"content-body\">
                <div class = \"product-page-go-back\">
                    <u> <a href =\"homepage.php\" > Página Inicial </u></a> 
                    >
                    <u> <a href = #category >". $product_category."</u></a> 
                    >
                    <u> <a href = #subcategory >". $product_subcategory." </u></a>
                </div>";

        # Page Content
        echo "   <div class = \"product-page-grid\">
                    <div class = \"product-page-product\">
                        <div>
                            <img src=\"../../resources/images/products/".$product_category."/".$product_ref.".jpg \">
                        </div>
                        <div>
                            <div class = \"product-page-title\">
                                ".$product_name."
                            </div>";

        # Different aspect regarding the discount on the product or not                    
        if($product_discount <= 0){
            echo "          <div class = \"product-page-product-price\">
                                ".$product_price." €
                            </div>";
        }else{
            echo "          <div class = \"product-page-product-price\">
                                <strike>".round($product_price,2,PHP_ROUND_HALF_UP)." €</strike>
                                <div class = \"product-page-product-price-discount\">
                                    ".round($product_price - ($product_discount/100)*$product_price,2,PHP_ROUND_HALF_UP)." €                      
                                </div>
                            </div>";   
        }

        # Verify the availability 
        if($product_qty <= 0){
            echo "          <div class = \"product-page-product-availability\">
                                <div class = \"product-out-stock \">
                                    Esgotado
                                </div>                      
                            </div>";

        }else if($product_qty > 0 and $product_qty < 50){
            echo "          <div class = \"product-page-product-availability\">
                                <div class = \"product-few-stock \">
                                    Poucas Unidades
                                </div>                      
                            </div>";
        }else{
            echo "          <div class = \"product-page-product-availability\">
                                <div class = \"product-in-stock \">
                                    Disponível
                                </div>                      
                            </div>";
        }

        # Buy and Add do cart buttons
        echo "              <div class = \"btn-buy-options\">
                                Compre já
                            </div>
                            <div class = \"btn-buy-options\">
                                Adicionar ao Carrinho
                            </div>
        ";


        echo "          </div>
                    </div>";

        # For the product description
        echo "      <div>
                    </div>";

        echo "  </div>"; #ending product-page-product
        echo " </div>";  #ending product-page-grid

        /*
        echo "<p>". $product_ref         ." </p>";
        echo "<p>". $product_name        ." </p>";
        echo "<p>". $product_qty         ." </p>";
        echo "<p>". $product_discount    ." </p>";
        echo "<p>". $product_price       ." </p>";
        echo "<p>". $product_discount    ." </p>";
        echo "<p>". $product_highlighted ." </p>";
        echo "<p>". $product_subcategory ." </p>";
        echo "<p>". $product_category    ." </p>";
        echo "<p>". $product_specs          ." </p>";
        */
        footer();
    ?>

</body>

</html>