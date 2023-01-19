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
    
    function get3Highlights(){
        
        /*select your_columns from your_table ORDER BY random() - and select only 3 results */

        global $conn;
        $query = "select produto.ref             AS product_ref,
                         produto.nome            AS product_name,
                         produto.preco           AS product_price,
                         produto.fk_subcategoria AS product_subcategory,
                         produto.desconto        AS product_discount
                  from produto
                  where produto.destaque = TRUE
                  ORDER BY random()
                  LIMIT 3"; 

        
        //echo "DEBUG query: " .$query. "</br>";
	
		$result = pg_exec($conn, $query);
		//echo "DEBUG num_rows: " . pg_num_rows($result);
        if (!$result) {
            echo "An error occurred in get3Highlights().";
            exit();
        }
        
		return $result;
               
    }




?>
