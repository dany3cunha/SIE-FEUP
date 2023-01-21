<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/menu.php";
    include_once "../../database/user.php";
?>

<?php
    
    session_destroy();
    echo "authen";
    header("Location: ../../index.php");
?>