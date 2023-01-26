<?php
    /* PHP Includes */
    include_once("opendb.php");
    include_once("menu_footer.php");
    include_once("cookies.php");
    include_once("security.php");
?>

<?php
    # To prevent direct access into other pages than index.php
    if(!isset($_COOKIE['cSession'])){
        header("Location: ../../index.php");
        exit();
    }
    session_start();
?>

<html>
<header>
    <meta charset="utf-8">
    <!-- Include Font Awesome icons -->
    <link rel="stylesheet" href="../../resources/icons/fonts-6/css/all.css">
    <!-- include css file -->
    <link rel="stylesheet" href="../../css/style.css">
</header>
