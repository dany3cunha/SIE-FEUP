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

    # Divide the description of each product, delimited by ';'
    $product_desc = explode(";",$product_desc);
    $n_product_desc = count($product_desc);
    #echo "DBG:".$n_product_desc;
    
    # Access local description of the product
    $product_specs_file_path = '../../resources/specifications/products/'.$product_category.'/'.$product_ref.'.txt';
    $product_specs_file = fopen($product_specs_file_path,"r") or die("Unable to open specs file!");
    $product_specs = fread($product_specs_file,filesize($product_specs_file_path));
    fclose($product_specs_file);

    # Divide the specs of each product, delimited by ';'
    $product_specs = explode(";",$product_specs);
    #$n_product_specs = count($product_specs);
    #echo "DBG:".$n_product_specs;

    # Verify the availability 
    if($product_qty <= 0){
        $qtyStyle = "product-out-stock ";
        $qtyMsg   = "Esgotado";
    }else if($product_qty > 0 and $product_qty < 50){
        $qtyStyle = "product-few-stock ";
        $qtyMsg   = "Poucas Unidades";
    }else{
        $qtyStyle = "product-in-stock ";
        $qtyMsg   = "Disponível";
    }

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
        
        # Availability message
        echo "              <div class = \"product-page-product-availability \" >
                                <div class = \" ".$qtyStyle."\">
                                    ".$qtyMsg."
                                </div> 
                            </div>";

        # Buy and Add do cart buttons
        echo "              <div class = \"btn-table-2cols\">";
        echo "                  <form method = \"GET\" action = \"../Auth_user/formCheckout.php \">  
                                    <input type=\"text\" name=\"prod_ref\" value =\"".$product_ref."\" hidden>
                                    <div class = \"btn-buy-options\">
                                        <input type =\"submit\" value =\"Compre já\">
                                    </div>
                                </form>";
        echo "                  <form method = \"GET\" action = \"#add2Cart\">  
                                    <input type=\"text\" name=\"prod_ref\" value =\"".$product_ref."\" hidden>
                                    <div class = \"btn-buy-options\">
                                        <input type =\"submit\" value =\"Adicionar ao Carrinho\">
                                    </div>
                                </form>";                      
        echo "              </div>";

        echo "          </div>
                    </div>";

        # For the product description
        echo "      <div>
                        <div class = \"product-page-product-text \">";
        foreach ($product_desc as $desc){
        echo               $desc."<br><br>";
        }
        echo "          </div>
                        <div class = \"product-page-text-title\">
                            Especificações
                        </div>
                        <div class = \"product-page-product-text \">
                            <ul>";
        foreach ($product_specs as $spec){
            echo "          <li>".$spec."</li>";
        }

        echo"               </ul>
                        </div>
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