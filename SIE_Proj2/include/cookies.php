<?php
    function deleteCookie($name){

        if(isset($_COOKIE[$name])){
            unset($_COOKIE[$name]);
            setcookie($name,"",-1,"/");
        }
        
        return;
    }
?>
