
<?php
    

    function verifyAuthenticatedPermission(){

        if(!isset($_SESSION['sAuthenticated'])){
            header("Location: ../../index.php");
            exit();
        }
    }

    function verifyEmployeePermission(){

        if(!isset($_SESSION['sEmployeePerm'])){
            //header("Location: ../../index.php");
            echo $_SESSION['sEmployeePerm'];
            exit();
        }
    }
?>