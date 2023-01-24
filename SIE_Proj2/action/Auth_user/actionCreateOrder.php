<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/product.php";
    include_once "../../database/order.php";
?>

<?php

    # For safety delete the cookie related to the payment method
    if(isset($_COOKIE['cPayMethod'])){
        unset($_COOKIE['cPayMethod']);
        setcookie('cPayMethod',null,-1,"/");
    }

    $user_id = $_POST['user_id'];
    $product_ref = $_POST['product_ref'];
    $order_qty = $_POST['order_qty'];
    $pay_method = $_POST['pay_method'];
    
    $order_id = getLastOrderId() + 1;
    
    # create order
    if(createOrder($order_id,$user_id,$pay_method)){
        # success, associate order to the product by the quantity
        if(!associateProductToOrder($order_qty,$order_id,$product_ref))
            
            setcookie('cErrorOrderCreation',true,0);
        else{
            #update product qty
            $product = getProductByRef($product_ref);
            $product = pg_fetch_assoc($product);
            if(!updateProduct(  $product_ref,
                                $product['product_name'],
                                $product['product_qty'] - $order_qty,
                                $product['product_desc'],
                                $product['product_price'],
                                $product['product_discount'],
                                $product['product_highlighted'],
                                $product['product_subcategory'])){
                            
                setcookie('cErrorOrderCreation',true,0);
            }
        }
    }else{
        setcookie('cErrorOrderCreation',true,0);
    }
    
    setcookie('cOrderCreated',$order_id,0,"/");
    header("Location: ../../pages/Auth_user/infoOrderCreated.php");


?>


