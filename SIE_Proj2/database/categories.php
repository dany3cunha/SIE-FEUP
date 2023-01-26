<?php
    /**
     * @return $result from selection of all categories 
     */
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

    /**
     * @param string $category to search
     * @return $result from selection of all subcategories of $category 
     */
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
    
    /**
     * @param string $subcategory to search
     * @return string category of the $subcategory or NULL if the subcategory do no exist
     */
    function getCatBySubcat($subcategory){
        global $conn;

        $query = "select  subcategoria.fk_categoria AS category 
				  from 	  subcategoria 
                  where nome = '".$subcategory."'";

		//echo "DEBUG query: " . $query;
	
		$result = pg_exec($conn, $query);
		//echo "DEBUG num_rows: " . pg_num_rows($result);
        if (!$result) {
            echo "An error occurred in getCatBySubcat().";
            exit();
        }
        if(pg_num_rows($result) == 1){
            $result = pg_fetch_assoc($result);
            return $result['category'];
        }else
            return null;
    
    }

    /**
     * @param string $category to search
     * @return boolean TRUE if the category exists, FALSE otherwise
     */
    function searchCat($category){
        global $conn;

        $query = "select  * 
				  from 	 categoria 
                  where categoria.nome = '".$category."'";

		//echo "DEBUG query: " . $query;
	
		$result = pg_exec($conn, $query);
		//echo "DEBUG num_rows: " . pg_num_rows($result);
        if (!$result) {
            echo "An error occurred in getCatBySubcat().";
            exit();
        }
        if(pg_num_rows($result) == 1)
		    return true;
        else
            return false;	    
    }
?>