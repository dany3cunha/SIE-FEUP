<?php
    
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
        $result = pg_fetch_assoc($result);
		return $result['category'];
		//exit();		    
    }
?>