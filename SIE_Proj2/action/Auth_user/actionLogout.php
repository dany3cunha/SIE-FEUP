<!-- PHP includes -->
<?php
    include_once("../../include/cookies.php");
    include_once("../../include/security.php");
    session_start();
?>
<?php
	verifyAuthenticatedPermission();
?>

<?php
    # Logout the user
    session_destroy();

    # For safety, delete all cookies (related to that user navigation)
    deleteAllCookies();
    header("Location: ../../index.php");
?>