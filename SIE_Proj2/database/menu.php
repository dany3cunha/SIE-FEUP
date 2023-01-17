<?php
    
    include_once("../../include/opendb.php");

    function getAllCategories(){
        global $conn;

        $query = "select  nome 
				  from 	  categoria 
                  order by nome desc";
		//echo "DEBUG query: " . $query;
	
		$result = pg_exec($conn, $query);
		//echo "DEBUG num_rows: " . pg_num_rows($result);
        if (!$result) {
            echo "An error occurred in getAlllCategories().";
            exit();
        }
        
		return $result;
		//exit();		  
    }

    function getAllSubCategories($category){
        global $conn;

        $query = "select  nome 
				  from 	  subcategoria
                  where  fk_categoria = '".$category."'
                  order by nome asc";
		//echo "DEBUG query: " .$query. "</br>";
	
		$result = pg_exec($conn, $query);
		//echo "DEBUG num_rows: " . pg_num_rows($result);
        if (!$result) {
            echo "An error occurred in getAlllSubCategories().";
            exit();
        }
        
		return $result;
		//exit();		  
    }
    
    function menu(){
        
        echo "<div class = \"menu\">
                <div class = \"box\">
                    <div class = \"push-to-right\"></div>
                    <button class = \"btn-info\"> 
                        <a href=\"#info\">
                            <i class = \"fa-solid fa-circle-info fa-2xl\"></i>
                        </a> 
                    </button>
                    <button class = \"btn\"> <a href=\"../../pages/Non_Auth_user/login.php\">Login</a> </button>
                    <button class = \"btn\"> <a href=\"../../pages/Non_Auth_user/register.php\">Register</a> </button>
                    <div style = \"padding-right: 20px; \"> </div>
                </div>";

        $category_result = getAllCategories();

        echo "  <div class=\"navbar\">";
        echo "     <div class=\"subnav\">
                       <button class = \"subnavbtn \">
                       <a href=\"../../index.php\"> <i class=\"fa-solid fa-house\"></i></a>
                       </button>
                   </div>";

        $category = pg_fetch_assoc($category_result);
        while (isset($category["nome"])) {

            echo "<div class = \"subnav\" >";
            echo "  <button class= \"subnavbtn\" >" . $category["nome"] . "</button>";
            echo "  <div class= \"subnav-content\" >";
            $subcategory_result = getAllSubCategories($category["nome"]);
            $subcategory = pg_fetch_assoc($subcategory_result);
            while (isset($subcategory["nome"])) {
                echo "      <a href=\"#company\">" . $subcategory["nome"] . "</a>";
                $subcategory = pg_fetch_assoc($subcategory_result);
            }
            echo "  </div>";
            echo "</div>";

            $category = pg_fetch_assoc($category_result);
        }
        echo "</div>";
        
    }


?>
