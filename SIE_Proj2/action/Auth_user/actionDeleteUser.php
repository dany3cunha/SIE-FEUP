<!-- PHP includes -->
<?php
    include_once "../../include/opendb.php";
    include_once "../../database/user.php";
    session_start();
?>

<?php

    # First Log out
    $user_id     = $_POST['user_id'];
    if(isset($_SESSION['sCurrentUserID']))
        session_destroy();

    # And then the account is deleted
    deleteUser($user_id);

?>