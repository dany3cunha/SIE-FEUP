<?php

    function getProductByRef($ref){

         global $conn;
         $query = "select produto.ref             AS product_ref,
                          produto.nome            AS product_name,
                          produto.quantidade      AS product_qty,
                          produto.descricao       AS product_desc,
                          produto.preco           AS product_price,                          
                          produto.desconto        AS product_discount,
                          produto.destaque        AS product_highlighted,
                          produto.fk_subcategoria AS product_subcategory
                   from produto
                   where produto.ref = '".$ref."'"; 
 
         
         //echo "DEBUG query: " .$query. "</br>";
     
         $result = pg_exec($conn, $query);
         //echo "DEBUG num_rows: " . pg_num_rows($result);
         if (!$result) {
             echo "An error occurred in getProductByRef().";
             exit();
         }
         
         return $result;

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

    function getProductsByCategory($category) {

        global $conn;
		
        $query = "select produto.ref             AS product_ref,
                         produto.nome            AS product_name,
                         produto.quantidade      AS product_qty,
                         produto.descricao       AS product_desc,
                         produto.preco           AS product_price,                          
                         produto.desconto        AS product_discount,
                         produto.destaque        AS product_highlighted,
                         produto.fk_subcategoria AS product_subcategory
                  from produto
                  join subcategoria on produto.fk_subcategoria=subcategoria.nome
                  where subcategoria.fk_categoria = '".$category."'";
    
		//echo "DEBUG query: " . $query;
	
		$result = pg_exec($conn, $query);
		//echo "DEBUG num_rows: " . pg_num_rows($result);
		
		return $result;
		//exit();		
    }

    function getProductsBySubcategory($subcategory){

        global $conn;
		
        $query = "select produto.ref             AS product_ref,
                         produto.nome            AS product_name,
                         produto.quantidade      AS product_qty,
                         produto.descricao       AS product_desc,
                         produto.preco           AS product_price,                          
                         produto.desconto        AS product_discount,
                         produto.destaque        AS product_highlighted,
                         produto.fk_subcategoria AS product_subcategory
                  from produto
                  where produto.fk_subcategoria = '".$subcategory."'";
    
		//echo "DEBUG query: " . $query;
	
		$result = pg_exec($conn, $query);
		//echo "DEBUG num_rows: " . pg_num_rows($result);
		
		return $result;
		//exit();	

    }


?>