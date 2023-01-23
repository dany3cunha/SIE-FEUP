<?php
    /* PHP includes */
    include_once("../../include/header.php");
?>

<?php
	menu();

?>

<?php
    $categorySelected       = "";
    $subCategorySelected    = "";
    $selected_text          = "";
?>



<body>
	<div class="content-title">Inventário </div>
	<div class="content-body">
        <form action="" method="post" >
            <table>
                <tr>
                    <td> 
                        <select name="category" class="emp-cat-select" onchange="this.form.submit()">
                            <option value="">Selecionar categoria:</option>
<?php
    /**************************** Category Select Box ****************************/

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
    echo "              </select>
                    </td>";



    /**************************** SubCategory Select Box ****************************/
    
    // Show subcategory selection if category is selected and is not "All"
    $disable_text = "";
    if( !(isset($_POST['category']) && $categorySelected!="*") ) $disable_text = "disabled";
    
    echo"           <td>
                        <select name = \"subcategory\"    class = \"emp-cat-select\"  onchange = \"this.form.submit()\" ".$disable_text." >
                            <option value   =   \"\" >  Selecionar subcategoria:    </option>";    

    // Retrieve subcategories for the category selected
    if( isset($_POST['category']) && $categorySelected!="*"){
        $selected_text = "";
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
            $subCategory    = pg_fetch_assoc($subCategory_result);
        }   
    }

    echo"               /select>
                    </td>";   
?>
                </tr>
            </table>
        </form>

        <table>
            <thead>
                <tr>
                    <td>    Referência  </td>
                    <td>    Produto     </td>
                    <td>    Quantidade  </td>
                    <td>    Destaque    </td>
                    <td>    &nbsp       </td>
                </tr>
            <thead>

        </table>
        



	</div>
</body>

<?php
    echo $categorySelected;
    echo $subCategorySelected;
    footer();
?>
