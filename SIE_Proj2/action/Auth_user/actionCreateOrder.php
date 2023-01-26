<!-- PHP includes -->
<?php
    include_once("../../include/opendb.php");
    include_once("../../database/product.php");
    include_once("../../database/order.php");
    include_once("../../include/security.php");
    include_once("../../include/cookies.php");
    session_start();
?>
<?php
	verifyAuthenticatedPermission();
?>


<?php

    # GET the user
    if(isset($_POST['user_id'])){
        $user_id = $_POST['user_id'];
    }else if (isset($_SESSION['sAuthenticated'])){
        $user_id = $_SESSION['sCurrentUserID'];    
    }

    # Save the product
    if (isset($_POST['product_ref']) ){
        # always set the cookie - or it is the 1st time or it is updated
        setcookie('cProduct_ref',$_POST['product_ref'],0,'/');
        $product_ref = $_POST['product_ref'];

    }else if(isset($_COOKIE['cProduct_ref'])){
        $product_ref = $_COOKIE['cProduct_ref'];
    }
    
    # Save the order quantity
    if (isset($_POST['order_qty']) ){
        # always set the cookie - or it is the 1st time or it is updated
        setcookie('cOrder_qty',$_POST['order_qty'],0,'/');
        $order_qty = $_POST['order_qty'];

    }else if(isset($_COOKIE['cOrder_qty'])){
        $order_qty = $_COOKIE['cOrder_qty'];
    }
    # Save the payment method
    if(isset($_POST['pay_method'])){
        setcookie('cPay_method',$_POST['pay_method'],0,'/');
        $pay_method = $_POST['pay_method'];

    }else if(isset($_COOKIE['cPay_method'])){
        $pay_method = $_COOKIE['cPay_method'];
    }

    # Verify the errors, quantity and payment method
    if(isset($product_ref)){
        # Compare quantity of order with items in stock
        $product = getProductByRef($product_ref);
        $product = pg_fetch_assoc($product);

        $product_qty = $product['product_qty'];
        
        if($order_qty > $product_qty){
            $msg = "Apenas existe(m) ".$product_qty." em stock.";
            setcookie('cErrorCreateOrder',$msg,0,'/');
            header("Location: ../../pages/Auth_user/formCheckout.php");
            exit();
        }
        if($order_qty == 0){
            $msg = "A encomenda tem de possuir quantidade superior a 0.";
            setcookie('cErrorCreateOrder',$msg,0,'/');
            header("Location: ../../pages/Auth_user/formCheckout.php");
            exit();   
        }
    }

    if (isset($pay_method)){
        # Check a valid payment method
        if($pay_method == "Escolha"){
                $msg = "Por favor escolha um método de pagamento.";
                setcookie('cErrorCreateOrder',$msg,0,'/');
                header("Location: ../../pages/Auth_user/formCheckout.php");
                exit();
        }
    }

    # Verify that all the fields are present to 
    if(isset($user_id) and isset($product_ref) and isset($order_qty) and isset($pay_method)){
        
        $order_id = getLastOrderId() + 1;
        if(createOrder($order_id,$user_id,$pay_method)){
            if(associateProductToOrder($order_qty,$order_id,$product_ref)){
                $product = getProductByRef($product_ref);
                $product = pg_fetch_assoc($product);
                if(updateProduct($product_ref,
                                $product['product_name'],
                                $product['product_qty'] - $order_qty,
                                $product['product_desc'],
                                $product['product_price'],
                                $product['product_discount'],
                                $product['product_highlighted'],
                                $product['product_subcategory'])){
                    # All went well, so
                    # Delete the cookies related to this page
                    deleteCookie('cProduct_ref');
                    deleteCookie('cOrder_qty');
                    deleteCookie('cPay_method');

                    # Set cookie for the page of info order created
                    setcookie('cOrderCreated',$order_id,0,"/");
                    header("Location: ../../pages/Auth_user/infoOrderCreated.php");
                    exit();
                } 
            }
        }

        # Something happened
        $msg = "Aconteceu um erro inesperado. A sua encomenda não foi registada";
        setcookie('cErrorCreateOrder',$msg,0,'/');       
    }

    header("Location: ../../pages/Auth_user/formCheckout.php");

?>


