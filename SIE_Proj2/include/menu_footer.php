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

        
        if(         !isset($_SESSION['sAuthenticated'])   ){
            //Not Authenticated User
            LoginAndRegisterButtons();
            ProductNavBar();

        }
        else if(    isset($_SESSION['sAuthenticated'])  and !isset($_SESSION['sEmployeePerm'])  ){
            //Authenticated client
            ProfileAndLogOutButtons();
            ProductNavBar();
        }
        else if(    isset($_SESSION['sAuthenticated'])  and isset($_SESSION['sEmployeePerm'])  ){
            //Authenticated employee
            ProfileAndLogOutButtons();
            EmployeeNavBar();
        }



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



    function LoginAndRegisterButtons(){
        //If not authenticated, enable login and register buttons
        echo "  <button class = \"btn\"> <a href=\"../../pages/Non_Auth_user/login.php\">Login</a> </button>
                
                <a href=\"../../pages/Non_Auth_user/login.php\" class=\"btn\">Login</a>
                <button class = \"btn\"> <a href=\"../../pages/Non_Auth_user/register.php\">Register</a> </button>
                <div style = \"padding-right: 20px; \"> </div>
            </div>"; 
    }

    function ProfileAndLogOutButtons(){
        //Show user registered Name
        $userInfo       = getUserInfo($_SESSION['sCurrentUserID']);
        $current_Name   = $userInfo['nome'];
        echo "<div class=\"display-user-name\">Olá, ".$current_Name."</div>";
        
        //User Profile Dropdown Menu                    
        echo "  <div class=\"dropdown\">
                    <button class=\"btn-default\">
                        <i class=\"fa-solid fa-user fa-2xl\"></i>
                    </button>
                    <div class=\"dropdown-content\">
                        <a href=\"../../pages/Auth_user/userInfo.php\">Dados pessoais</a>
                        <a href=\"#\">Encomendas</a>
                    </div>
                </div>";

        //Logout button
        echo "  <button class = \"btn-default\">
                    <a href=\"../../action/Auth_user/actionLogout.php\">  
                        <i class=\"fa-solid fa-right-from-bracket fa-2xl\"></i> 
                    </a>             
                </button>  
                <div style = \"padding-right: 20px; \"> </div>
            </div>"; 
    }

    function ProductNavBar(){
        $category_result = getAllCategories();

        echo "<div class=\"navbar\">";
        echo "  <div class=\"subnav\">
                    <button class = \"subnavbtn-home \">
                    <a href=\"../../index.php\"> <i class=\"fa-solid fa-house\"></i></a>
                    </button>
                </div>";

        $category = pg_fetch_assoc($category_result);
        while (isset($category["nome"])) {

            echo "  <div class = \"subnav\">
                        <form method = \"GET\" action=\"../Non_Auth_user/listProducts.php\">
                            <div class= \"subnavbtn\" >
                                <input type=\"text\" name=\"filter\" value=\"category\" hidden>
                                <input type=\"submit\" name=\"product_category\" value=\"".$category["nome"]."\">
                            </div>
                        </form>
                        
                        <div class= \"subnav-content\" >";

            $subcategory_result = getAllSubCategories($category["nome"]);
            $subcategory = pg_fetch_assoc($subcategory_result);
            
            echo "          <form method = \"GET\" action=\"../Non_Auth_user/listProducts.php\">";
            while (isset($subcategory["nome"])) {
                echo "          <div class = \"subnav-content-btn \">
                                    <input type=\"text\" name=\"filter\" value=\"subcategory\" hidden>";
                echo "              <input type=\"submit\" name=\"product_subcategory\" value=\"". $subcategory["nome"]."\">";
                echo "          </div>";
                $subcategory = pg_fetch_assoc($subcategory_result);
            }
            echo "          </form>";

            echo "      </div>";
            echo "  </div>";

            $category = pg_fetch_assoc($category_result);
        }
        echo "  </form>";
        echo "</div>";
    }

    function EmployeeNavBar(){
        echo "  <div class=\"navbar\">";
        // Home button
        echo "      <div class=\"subnav\">
                        
                        <button class = \"subnavbtn-home \">
                            <a href=\"../../index.php\">    <i class=\"fa-solid fa-house\"></i>    </a>
                        </button>
                        
                    </div>";
        
                    // Employee custom menu
        echo "      <div class = \"subnav\" >
                        <button class= \"subnavbtn\" > 
                            <a href=\"../Employee_user/f_ListProducts.php\">    Inventário    </a>
                        </button>
                    </div>
                    <div class = \"subnav\" >
                        <button class= \"subnavbtn\" > 
                            <a href=\"../Employee_user/f_ListOrders.php\">    Encomendas    </a>
                        </button>
                    </div>";
                    
        echo "  </div>";
    }
 
?>