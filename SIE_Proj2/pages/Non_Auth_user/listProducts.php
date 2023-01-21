<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once("../../database/product.php");
?>

<?php 
    
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
    
    menu();
?>

<body>
    
    <?php
    echo "<div class = \"content-body\">";

    # Different go back based on category or subcategory
    if($type == "category")
        echo "  <div class = \"product-page-go-back\">
                    <u> <a href =\"homepage.php\" > Página Inicial </u></a> 
                    >
                    <u> <a href = #category >". $products_category."</u></a> 
                </div>";
    else{
        echo "  <div class = \"product-page-go-back\">
                    <u> <a href =\"homepage.php\" > Página Inicial </u></a> 
                    >
                    <u> <a href = #category >". $products_category."</u></a>
                    >
                    <u> <a href = #subcategory >". $products_subcategory."</u></a>
                </div>";
    }
    
    echo "</div>";

    ?>


</body>

<?php
	footer();
?>
</html>