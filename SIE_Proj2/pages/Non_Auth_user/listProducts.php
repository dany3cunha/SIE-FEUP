<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once("../../database/product.php");
?>

<?php 
    /*
    $products_list = NULL;
    $type = $_GET["filter"];

    if($type == "category"){
        $products_category = $_GET["product_category"];
        $products_list = getProductsByCategory($products_category);
    }    
    else if ($type == "subcategory"){
        $products_subcategory = $_GET["product_subcategory"];
        $products_category = getCatBySubcat($products_subcategory);
        $products_list = getProductsBySubcategory($products_subcategory);
    }    
    else
        echo "Error on listProducts, no category or subcategory";
    */

    $info = $_GET["info"];

    if(searchCat($info) == true){
        # The value passed matches with a category
        $products_category = $info;
        $type = "category";
    }else {
        # The value passed don't matches with a category
        $products_category = getCatBySubcat($info);
        if ($products_category != null){
          # But maches with  a subcategory
          $products_subcategory = $info;
          $type = "subcategory";
        }
        else{
            echo "Not a category or subcategory !";
        }
    }

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

    if($type == "category"){
        echo "          
                        <input type=\"submit\" name=\"info\" value=\"".$products_category."\">";
    }else{
        echo "          <input type=\"submit\" name=\"info\" value=\"".$products_category."\">
                        >
                        <input type=\"submit\" name=\"info\" value=\"".$products_subcategory."\">";
    }
    echo "          </div>
                </form>";
    
    echo "  </div>"; // end go-back-line div
    
    
    
    
    echo "</div>";   // end content-body div

    ?>


</body>

<?php
	footer();
?>
</html>