<?php
    /* PHP includes */
    include_once("../../database/categories.php");
    include_once("../../database/user.php");
?>

<?php

    function menu(){

        //Show navbox common elements
        echo "  <div class = \"box\">
                    <div class = \"push-to-right\"></div>
                    <button class = \"btn-default\"> 
                        <a href=\"../../action/Non_Auth_user/login.php\">
                            <i class = \"fa-solid fa-circle-info fa-2xl\"></i>
                        </a> 
                    </button>";

        if(isset($_SESSION['sAuthenticated'])){
            //If authenticated, enable profile and log out buttons
            
            //Show user registered Name
            $userInfo       = getUserInfo($_SESSION['sCurrentUserID']);
            $current_Name   = $userInfo['nome'];
            echo "<div class=\"display-user-name\">Olá, ".$current_Name."</div>";
            
            //Buttons
            echo "  <button class = \"btn-default\">
                        <a href=\"../../pages/Auth_user/userInfo.php\">  
                            <i class=\"fa-solid fa-user fa-2xl\"></i>   
                        </a>             
                    </button>
                    <button class = \"btn-default\">
                        <a href=\"../../action/Auth_user/actionLogout.php\">  
                            <i class=\"fa-solid fa-right-from-bracket fa-2xl\"></i> 
                        </a>             
                    </button>  
                    <div style = \"padding-right: 20px; \"> </div>
                </div>";
        }
        else{
            //If not authenticated, enable login and register buttons
            echo "  <button class = \"btn\"> <a href=\"../../pages/Non_Auth_user/login.php\">Login</a> </button>
                    <button class = \"btn\"> <a href=\"../../pages/Non_Auth_user/register.php\">Register</a> </button>
                    <div style = \"padding-right: 20px; \"> </div>
                </div>";            
        }



        $category_result = getAllCategories();

        echo "  <div class=\"navbar\">";
        echo "     <div class=\"subnav\">
                    <button class = \"subnavbtn-home \">
                    <a href=\"../../index.php\"> <i class=\"fa-solid fa-house\"></i></a>
                    </button>
                </div>";

        $category = pg_fetch_assoc($category_result);
        while (isset($category["nome"])) {

            echo "<div class = \"subnav\" >";
            echo "  <button class= \"subnavbtn\" >" . $category["nome"] . "</button>";
            echo "  <div class= \"subnav-content\" >";
            $subcategory_result = getAllSubCategories($category["nome"]);
            $subcategory = pg_fetch_assoc($subcategory_result);
            while (isset($subcategory["nome"])) {
                echo "      <a href=\"#company\">" . $subcategory["nome"] . "</a>";
                $subcategory = pg_fetch_assoc($subcategory_result);
            }
            echo "  </div>";
            echo "</div>";

            $category = pg_fetch_assoc($category_result);
        }
        echo "</div>";
        
    }

    function footer(){

        echo "<div class = \"footer\">
                <div style=\"height:10px;\"></div>
                <hr>
                <div class = \"footer-text \">
                    FEUP MEEC - Sistemas de Informação Empresariais (SIE) 2022/23 <br>
                    Projeto 2 - Aplicação PHP, (JS), e Postgres &copy Joaquim Cunha (up201806651@edu.fe.up.pt) &copy Pedro Silva (up201806526@edu.fe.up.pt)
                </div>       
                <div class = \"footer-logo\">
                    <img src = \"../../resources/logos/feup_logo.png\">
                </div>
    
            </div>";

    }
?>