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