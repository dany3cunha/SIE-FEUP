<?php
    /**
     * @param string cookie name for delete
     */
    function deleteCookie($name){

        if(isset($_COOKIE[$name])){
            unset($_COOKIE[$name]);
            setcookie($name,"",-1,"/");
        }
        
        return;
    }

    /**
     * Clear all cookies created before
     */
    function deleteAllCookies(){
        
        # clear all cookies
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
    }
?>
