<?php
    /**
     * @param int $order_id order identification
     * @param int $user_id user identification
     * @param string $pagamento order's payment method
     * @return boolean TRUE if the order was sucessfully created, FALSE otherwise
     */
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

    /**
     * @param int $order_qty order quantity 
     * @param int $order_id order identification
     * @param int $product_ref product identification/reference
     * @return boolean TRUE if the product was sucessfully linked to the order by quantity, FALSE otherwise
     */
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
    /**
     * @return int last order created ($order_id)
     */
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
    /**
     * @param int $order_id order identification
     * @return $result search by order identification ($order_id)
     */
    function getOrderById($order_id){
        global $conn;
        $query = "select  TO_CHAR(encomenda.data, 'dd-mm-yyyy HH24:MI') as date,
                          encomenda.fk_utilizador                       as user_id,
                          encomenda.fk_status                           as order_status,
                          encomenda.pagamento                           as order_pay_method,
                          enc_prod.quantidade                           as order_qty,
                          enc_prod.fk_produto                           as order_product_ref                                        
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

    /**
     * @param int $user_id user identification
     * @return $result all orders made by the user ($user_id)
     */
    function getAllOrdersByUser($user_id){
        global $conn;
        $query = "select  encomenda.id                                  as order_id,
                          TO_CHAR(encomenda.data, 'dd-mm-yyyy HH24:MI') as date,
                          encomenda.fk_utilizador                       as user_id,
                          encomenda.fk_status                           as order_status,
                          encomenda.pagamento                           as order_pay_method,
                          enc_prod.quantidade                           as order_qty,
                          enc_prod.fk_produto                           as order_product_ref                                        
                  from encomenda
                  join enc_prod on encomenda.id=enc_prod.fk_encomenda
                  where encomenda.fk_utilizador  = '" .$user_id. "'";
       
        $result = pg_exec($conn, $query);
        //echo "DEBUG num_rows: " . pg_num_rows($result);

        if (!$result) {
            echo "An error occurred in getAllOrdersByUser().";
            exit();
        }
        return $result;
    }

    /**
     * Params string $category category
     * Returns all orders related to $category or -1 if none
     */    
    function getOrdersByCategory($category){
        global $conn;
        $query = "  SELECT  encomenda.id         AS order_id,
                            encomenda.pagamento AS pay_method,
                            encomenda.fk_status AS order_status,
                            enc_prod.quantidade AS quantity,
                            produto.nome        AS product_name 
                    FROM encomenda 
                    JOIN enc_prod   ON encomenda.id = enc_prod.fk_encomenda 
                    JOIN produto    ON produto.ref  = enc_prod.fk_produto ";

        
        if ($category!="*"){
            // If category selected was not "All"
            $query = $query . " JOIN  subcategoria ON produto.fk_subcategoria=subcategoria.nome 
                                WHERE subcategoria.fk_categoria = '" . $category . "'";
        }

        $result = pg_exec($conn, $query);

        if (!$result) {
            echo "Error on getOrdersByCategory()\n";
            return -1;
        }
        
        return $result;
    }
    /**
     * Params string $subcategory subcategory
     * Returns all orders related to $subcategory or -1 if none
     */  
    function getOrdersBySubCategory($subcategory){
        global $conn;
        $query = "  SELECT  encomenda.id         AS order_id,
                            encomenda.pagamento AS pay_method,
                            encomenda.fk_status AS order_status,
                            enc_prod.quantidade AS quantity,
                            produto.nome        AS product_name 
                    FROM encomenda 
                    JOIN enc_prod   ON encomenda.id = enc_prod.fk_encomenda 
                    JOIN produto    ON produto.ref  = enc_prod.fk_produto ";


        if($subcategory!="*"){
            // If subcategory selected was not "All"
            $query = $query . "WHERE produto.fk_subcategoria = '" . $subcategory . "'";
        }

        $result = pg_exec($conn, $query);


        if (!$result) {
            echo "Error on getOrdersBySubCategory()\n";
            return -1;
        }
        
        return $result;
    }
    
    /**
     * Returns $result all possible status, -1 if error 
     */  
    function getOrdersPossibleStatus(){
        global $conn;

        $query = "  SELECT  descricao    AS description 
                    FROM    status";

        $result = pg_exec($conn, $query);
        
        if (!$result) {
            echo "Error on getOrdersPossibleStatus()\n";
            return -1;
        }
        
        return $result;
    }

    /**
     * Params order_id and desired status
     * Returns true if updated, false if error
     */     
    function updateOrderStatus($id, $status){
        global $conn;
        
        $query = "  UPDATE  encomenda 
                    SET     fk_status   = '$status' 
                    WHERE   id          = '$id'";

        $result = pg_exec($conn, $query);
    
        if(!$result){
            echo "An error occurred in updateOrder()\n";
            return false;
        }
        
        return true;
    }
?>