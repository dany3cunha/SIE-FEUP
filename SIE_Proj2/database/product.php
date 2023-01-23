<?php

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


    function get3Highlights()
    {

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
                    from produto
                    join subcategoria on produto.fk_subcategoria=subcategoria.nome
                    where subcategoria.fk_categoria = '" . $category . "'";

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
                    from produto
                    where produto.fk_subcategoria = '" . $subcategory . "'";

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
    
    function getMostExpensiveProduct($category){
        global $conn;

        $query = "select produto.preco             
                    from produto
                    order by produto.preco desc";

        //echo "DEBUG query: " . $query;

        $result = pg_exec($conn, $query);
        //echo "DEBUG num_rows: " . pg_num_rows($result);
        
        
        if (!$result) {
            echo "An error occurred in getMostExpensiveProduct().";
            exit();
        }

        $row = pg_fetch_row($result);

        return $row[0];
    }

?>