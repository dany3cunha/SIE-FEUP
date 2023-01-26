<?php
    /* PHP includes */
    include_once("../../database/categories.php");
?>

<?php
    // Selection forms for filter in category and subcategory

    function select_category($categorySelected){
        echo"   <select name=\"category\" class=\"emp-cat-select\" onchange=\"this.form.submit()\">
                    <option value=\"\">Selecionar categoria:</option>
                    <option value   =\"*\" ".($categorySelected=="*" ? "selected" : "").">Todas</option>";

                // Show options with categories from DB
                $category_result    = getAllCategories();
                $category           = pg_fetch_assoc($category_result);

                while (isset($category["nome"])) {
                // Show option and set selected (if it was previously selected)
                echo "
                    <option value = '".$category['nome']."' ".($categorySelected==$category['nome'] ? "selected" : "")." >"
                        .$category['nome']."
                    </option>";
                $category   =   pg_fetch_assoc($category_result);
                }
        echo"   </select>";
    }

    function select_subcategory($categorySelected, $subCategorySelected){
        //If category was not selected or selected all, disable the subcategory selection box
        $disable_select = ( ($categorySelected=="" || $categorySelected=="*") ? "disabled" : "");
        echo"   <select name = \"subcategory\"    class = \"emp-cat-select\"  onchange = \"this.form.submit()\" ".$disable_select.">
                    <option value   =   \"\" >  Selecionar subcategoria:    </option>";    

        // If some category was selected, retrieve subcategories for that category
        if($categorySelected!=""){
            echo "  <option value   =\"*\" ".($subCategorySelected=="*" ? "selected" : "").">Todas</option>";

            // Show options with subcategories from DB
            $subCategory_result = getAllSubCategories($categorySelected);
            $subCategory        = pg_fetch_assoc($subCategory_result);
            while (isset($subCategory["nome"])) {
                // Show option
                echo "              <option value = '" . $subCategory['nome'] . "' ".($subCategorySelected==$subCategory['nome'] ? "selected" : "").">"
                                        .$subCategory['nome']."
                                    </option>";
                $subCategory    = pg_fetch_assoc($subCategory_result);
            }   
        }
        echo"   </select>";
    }

?>