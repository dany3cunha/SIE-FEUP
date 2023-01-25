

<?php
    include_once("../../include/cookies.php");
    
    session_start();
    session_destroy();

    deleteAllCookies();
    header("Location: ../../index.php");
?>