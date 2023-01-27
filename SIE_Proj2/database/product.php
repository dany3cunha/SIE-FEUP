<?php
    /**
     * Param: product reference (PK)
     * Returns all product fields 
     */ 
    function getProductByRef($ref)
    {

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
                    where produto.ref = '" . $ref . "'";


        //echo "DEBUG query: " .$query. "</br>";

        $result = pg_exec($conn, $query);
        //echo "DEBUG num_rows: " . pg_num_rows($result);
        if (!$result) {
            echo "An error occurred in getProductByRef().";
            exit();
        }

        return $result;
    }

    /**
     * Returns 3 random product that have the highlighted field true
     */ 
    function get3Highlights()
    {
        global $conn;
        $query = "select produto.ref             AS product_ref,
                         produto.nome            AS product_name,
                         produto.preco           AS product_price,
                         produto.fk_subcategoria AS product_subcategory,                    
                         produto.desconto        AS product_discount
                  from produto
                  where produto.destaque = TRUE and produto.desconto = 0
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

    /**
     * Returns six products that have the higher discount setted
     */ 
    function get6BiggestDiscounts(){
        
        global $conn;
        $query = "select produto.ref             AS product_ref,
                         produto.nome            AS product_name,
                         produto.preco           AS product_price,
                         produto.fk_subcategoria AS product_subcategory,                    
                         produto.desconto        AS product_discount
                  from  produto
                  where produto.desconto > 0
                  ORDER BY produto.desconto desc
                  LIMIT 6";

        //echo "DEBUG query: " .$query. "</br>";

        $result = pg_exec($conn, $query);
        //echo "DEBUG num_rows: " . pg_num_rows($result);
        if (!$result) {
            echo "An error occurred in get6BiggestDiscounts().";
            exit();
        }

        return $result;

    }

    /**
     * Mandatory params: product category (* is All)
     * Optional params: availability and maxprice, if they aren't needed, then use NULL for both
     * Returns a product list accordingly to the category and optional filters
     */ 
    function getProductsByCategory($category, $availability, $max_price)
    {

        global $conn;

        $query = "select produto.ref             AS product_ref,
                            produto.nome            AS product_name,
                            produto.quantidade      AS product_qty,
                            produto.descricao       AS product_desc,
                            produto.preco           AS product_price,                          
                            produto.desconto        AS product_discount,
                            produto.destaque        AS product_highlighted,
                            produto.fk_subcategoria AS product_subcategory
                    from produto ";
                    
        
        if ($category!="*"){
            $query = $query . "join subcategoria on produto.fk_subcategoria=subcategoria.nome
                               where subcategoria.fk_categoria = '" . $category . "'";
        }

        if (isset($availability) and $availability == "true")
            $query = $query . " and produto.quantidade > 0 ";
        else if (isset($availability) and $availability == "false")
            $query = $query . " and produto.quantidade = 0 ";

        if (isset($max_price) and $max_price > 0)
            $query = $query . " and produto.preco <= " . $max_price;

        //echo "DEBUG query: " . $query;

        $result = pg_exec($conn, $query);
        //echo "DEBUG num_rows: " . pg_num_rows($result);

        if (!$result) {
            echo "An error occurred in getProductsByCategory().";
            exit();
        }
        return $result;
	
    }

    /**
     * Mandatory params: product subcategory (* is All)
     * Optional params: availability and maxprice, if they aren't needed, then use NULL for both
     * Returns a product list accordingly to the subcategory and optional filters
     */ 
    function getProductsBySubcategory($subcategory, $availability, $max_price)
    {

        global $conn;

        $query = "select produto.ref             AS product_ref,
                            produto.nome            AS product_name,
                            produto.quantidade      AS product_qty,
                            produto.descricao       AS product_desc,
                            produto.preco           AS product_price,                          
                            produto.desconto        AS product_discount,
                            produto.destaque        AS product_highlighted,
                            produto.fk_subcategoria AS product_subcategory
                    from produto ";
        
        if($subcategory!="*"){
            $query = $query . "where produto.fk_subcategoria = '" . $subcategory . "'";
        }


        if (isset($availability) and $availability == "true")
            $query = $query . " and produto.quantidade > 0 ";
        else if (isset($availability) and $availability == "false")
            $query = $query . " and produto.quantidade = 0 ";
        
        if (isset($max_price) and $max_price > 0)
            $query = $query . " and produto.preco <= " . $max_price;

        //echo "DEBUG query: " . $query;

        $result = pg_exec($conn, $query);
        //echo "DEBUG num_rows: " . pg_num_rows($result);

        if (!$result) {
            echo "An error occurred in getProductsBySubcategory().";
            exit();
        }

        return $result;
        
    }

    /**
     * Params: category filter
     * Returns the most expensive product from a specific category
     */ 
    function getMostExpensiveProduct($cat_or_subcat){
        global $conn;

        $is_category = searchCat($cat_or_subcat);
        if(!$is_category){
            $query = "select produto.preco             
                        from produto
                        where produto.fk_subcategoria = '" .$cat_or_subcat. "'
                        order by produto.preco desc";
        }else{
            $query = "select  produto.preco                         
                        from produto 
                        join subcategoria on produto.fk_subcategoria=subcategoria.nome
                            where subcategoria.fk_categoria = '" . $cat_or_subcat . "'
                        order by produto.preco desc";
        }


        //echo "DEBUG query: " . $query;

        $result = pg_exec($conn, $query);
        //echo "DEBUG num_rows: " . pg_num_rows($result);
        
        
        if (!$result) {
            echo "An error occurred in getMostExpensiveProduct().";
            exit();
        }

        $row = pg_fetch_row($result);
        if (pg_num_rows($result) == 0)
            return 0;
        else
            return $row[0];
    }

    /**
     * Params: product reference
     * Returns true if there are no products with that reference already registered
     *         false otherwise
     */ 
    function refIsAvailable($ref) {
        global $conn;
        
        $query = "  SELECT  produto.ref
                    FROM 	produto
                    WHERE   produto.ref=$ref";
    
        //echo "DEBUG query: " . $query;
    
        $result = pg_exec($conn, $query);
        //echo "DEBUG num_rows: " . pg_num_rows($result);
        
        if (!$result) {
            echo "An error occurred in refIsAvailable()\n";
            return false;
        }
    
        if( pg_num_rows($result) > 0){
            //There is already a product with this ref!
            return false;
        }
    
        //This product ref is available
        return true;		
    }

    /**
     * Params: new product parameters
     * Returns true inserted successfuly
     *         false otherwise
     */ 
    function insertProduct($ref, $name, $quantity, $description, $price, $discount, $highlight, $subcategory){
        global $conn;
        
        $query = "  INSERT INTO produto (ref, nome, quantidade, descricao, preco, desconto, destaque, fk_subcategoria)
                    VALUES ( $ref, 
                            '$name', 
                             $quantity, 
                            '$description', 
                             $price, 
                             $discount, 
                            '$highlight',
                            '$subcategory')";
    
        $result = pg_exec($conn, $query);
    
        if(!$result){

            echo "An error occurred in insertProduct()\n";
            return false;
        }
        
        return true;
    }

    /**
     * Params: updated product parameters
     * Returns true updated successfuly
     *         false otherwise
     */ 
    function updateProduct($ref, $name, $quantity, $description, $price, $discount, $highlight, $subcategory){
    
        global $conn;
        
        $query = "  update produto 
                    set nome            = '$name', 
                        quantidade      = '$quantity', 
                        descricao       = '$description', 
                        preco           = '$price', 
                        desconto        = '$discount', 
                        destaque        = '$highlight', 
                        fk_subcategoria = '$subcategory'
                    where ref = '$ref'";

        $result = pg_exec($conn, $query);
    
        if(!$result){
            echo "An error occurred in updateProduct()\n";
            return false;
        }
        
        return true;
    }
    
    /**
     * Params: product referece to be deleted
     * Returns true if deleted successfuly
     *         false otherwise
     */ 
    function deleteProduct($ref){
    
        global $conn;
        
        $query = "  DELETE FROM produto 
                    WHERE ref = '$ref'";

        $result = pg_exec($conn, $query);
    
        if(!$result){
            echo "An error occurred in deleteProduct()\n";
            return false;
        }
        
        return true;
    }
