<?php

    function createOrder($order_id,$user_id,$pagamento){

        global $conn;

        $pay_method = "Aguarda Pagamento";
        if($pagamento == "Entrega")
            $pay_method = "Em Processamento";

        $query = "insert into encomenda (id,data,fk_utilizador,fk_status,pagamento)                          
                  values('$order_id',
                         CURRENT_TIMESTAMP,
                         '$user_id',
                         '$pay_method',
                          '$pagamento')";

        //echo "DEBUG query: " .$query. "</br>";

        $result = pg_exec($conn, $query);

        if(!$result){
            echo "Error in createOrder()\n";
            return false;
        }
        return true;
    }

    function associateProductToOrder($order_qty,$order_id,$product_ref){

        global $conn;
        $query = "insert into enc_prod (quantidade,fk_encomenda,fk_produto)                          
                  values('$order_qty',                    
                         '$order_id',
                         '$product_ref')";

        //echo "DEBUG query: " .$query. "</br>";

        $result = pg_exec($conn, $query);

        if(!$result){
            echo "Error in associateProductToOrder()\n";
            return false;
        }
        return true;


    }

    function getLastOrderId(){
        
        global $conn;
        $query = "select *                           
                  from encomenda
                  ORDER BY encomenda.id desc";

        //echo "DEBUG query: " .$query. "</br>";

        $result = pg_exec($conn, $query);
        //echo "DEBUG num_rows: " . pg_num_rows($result);
        if (!$result) {
            echo "An error occurred in getLastOrderId().";
            exit();
        }
        if(pg_num_rows($result) == 0)
            return 0;

        $id = pg_fetch_row($result);
        return $id[0];

    }

    function getOrderById($order_id){
        global $conn;
        $query = "select  encomenda.data          as date,
                          encomenda.fk_utilizador as user_id,
                          encomenda.fk_status     as order_status,
                          encomenda.pagamento     as order_pay_method,
                          enc_prod.quantidade     as order_qty,
                          enc_prod.fk_produto     as order_product_ref                                        
                  from encomenda
                  join enc_prod on encomenda.id=enc_prod.fk_encomenda
                  where encomenda.id  = '" .$order_id. "'";
       
        $result = pg_exec($conn, $query);
        //echo "DEBUG num_rows: " . pg_num_rows($result);

        if (!$result) {
            echo "An error occurred in getProductsByCategory().";
            exit();
        }
        return $result;
    }



?>