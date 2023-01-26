<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/order.php";
    include_once "../../include/security.php";
    session_start();
?>

<?php
    verifyEmployeePermission();
    // New data to be updated
	$order_id   = $_POST['order_id'];
	$new_status = $_POST['status'];

    if(!updateOrderStatus($order_id, $new_status)) exit();

    header("Location: ../../pages/Employee_user/f_ListOrders.php");  

?>