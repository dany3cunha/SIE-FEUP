<?php
    /* PHP includes */
    include_once("../../include/header.php");
?>

<?php
	menu();

?>

<?php

?>



<body>
	<div class="content-title">Inventário </div>
	<div class="content-body">
        <table>
            <tr>
                <td>
                    <form action="" method="post" >
                        <select name="category" class="emp-cat-select" onchange="this.form.submit()">
                            <option value="">Selecionar categoria:</option>
<?php
    $categorySelected   = "";
    $selected_text      = "";
    // Detect if some category is already detected
    if( isset($_POST['category'])   ) $categorySelected = $_POST['category'];

    // Detect if "All categories" was previously selected, and show that option
    if( $categorySelected == "*") $selected_text = "selected";
    echo "                  <option value   =\"*\" ".$selected_text.">Todas</option>";
    $selected_text = "";

    // Show options with categories from DB
    $category_result    = getAllCategories();
    $category           = pg_fetch_assoc($category_result);
    while (isset($category["nome"])) {
        // Detect if current category was previously selected
        if( $categorySelected == $category["nome"]) $selected_text = "selected";        

        // Show option
        echo "              <option value = '" . $category['nome'] . "' ".$selected_text." >" . $category['nome'] . "</option>";
        $selected_text  = "";
        $category       = pg_fetch_assoc($category_result);
    }
?>

                        </select>
                    </form>                
                </td>

<?php
    // Show subcategory selection if category is selected and is not "All"
    if( isset($_POST['category']) && $categorySelected!="*"){
        echo"   <td>
                    <form action=\"\" method=\"post\">
                        <select name=\"subcategory\" class=\"emp-cat-select\" onchange=\"this.form.submit()\">
                            <option value=\"\">Selecionar subcategoria:</option>";
        
        $subCategorySelected    = "";
        $selected_text          = "";
        // Detect if some subcategory is already detected
        if( isset($_POST['subcategory'])   ) $subCategorySelected = $_POST['subcategory'];

        // Detect if "All subcategories" was previously selected, and show that option
        if( $subCategorySelected == "*") $selected_text = "selected";
        echo "                  <option value   =\"*\" ".$selected_text.">Todas</option>";
        $selected_text = "";

        // Show options with subcategories from DB
        $subCategory_result = getAllSubCategories($categorySelected);
        $subCategory        = pg_fetch_assoc($subCategory_result);
        while (isset($subCategory["nome"])) {
            // Detect if current subategory was previously selected
            if( $subCategorySelected == $subCategory["nome"]) $selected_text = "selected";        

            // Show option
            echo "              <option value = '" . $subCategory['nome'] . "' ".$selected_text." >" . $subCategory['nome'] . "</option>";
            $selected_text  = "";
            $subCategory       = pg_fetch_assoc($subCategory_result);
        }   
        
        echo"           </select>
                    </form>
                </td>";
    }

?>

            </tr>
        </table>
	</div>
</body>

<?php
    footer();
?>
