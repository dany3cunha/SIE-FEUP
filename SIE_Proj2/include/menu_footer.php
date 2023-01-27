<?php
    /* PHP includes */
    include_once("../../database/categories.php");
    include_once("../../database/user.php");
?>

<?php

    function menu(){

        //Show navbox common elements
        echo "  <div class = \"box\">
                    <div >
                        <a href=\"../../index.php\">
                            <img src =\"../../resources/logos/shop-logo.png\" class = \"logo-img\">
                        </a>
                    </div>
                    <div class = \"push-to-right\"></div>
                        <button class = \"btn-default\"> 
                            <a href=\"../../pages/Non_Auth_user/infoAuthors.php\" >
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
            ProfileAndLogOutButtons(false);
            ProductNavBar();
        }
        else if(    isset($_SESSION['sAuthenticated'])  and isset($_SESSION['sEmployeePerm'])  ){
            //Authenticated employee
            ProfileAndLogOutButtons(true);
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
        echo "  <a href=\"../../pages/Non_Auth_user/formLogin.php\" style = \"margin-top: auto; margin-bottom: auto ;\"> <button class=\"btn\">Login</button></a>
                <a href=\"../../pages/Non_Auth_user/formRegister.php\" style = \"margin-top: auto; margin-bottom: auto ;\"> <button class=\"btn\">Register</button></a>
                <div style = \"padding-right: 20px; \"> </div>
            </div>"; 
    }

    function ProfileAndLogOutButtons($isEmployee){
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
                        ".($isEmployee ? "": "<a href=\"../../pages/Auth_user/listOrdersHistory.php\">Encomendas</a>")."
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
                    <a href=\"../../index.php\">
                        <button class = \"subnavbtn-home \"> 
                            <i class=\"fa-solid fa-house fa-xl\"></i>
                        </button>
                    </a>
                </div>";

        $category = pg_fetch_assoc($category_result);
        while (isset($category["nome"])) {

            echo "  <div class = \"subnav\">
                        <form method = \"GET\" action=\"../Non_Auth_user/listProducts.php\">
                            <input class= \"subnavbtn\" type=\"submit\" name=\"info\" value=\"".$category["nome"]."\">
                        </form>
                        <div class= \"subnav-content\" >";

            $subcategory_result = getAllSubCategories($category["nome"]);
            $subcategory = pg_fetch_assoc($subcategory_result);
            
            echo "          <form method = \"GET\" action=\"../Non_Auth_user/listProducts.php\">";
            while (isset($subcategory["nome"])) {
                echo "          <input class = \"subnav-content-btn \" type=\"submit\" name=\"info\" value=\"". $subcategory["nome"]."\">";
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
                        <a href=\"../../index.php\">
                            <button class = \"subnavbtn-home \"> 
                                <i class=\"fa-solid fa-house fa-xl\"></i>
                            </button>
                        </a>
                    </div>";
        
        // Employee custom menu        
        echo "      <div class = \"subnav\" > 
                        <form action=\"../Employee_user/f_ListProducts.php\">
                            <input class= \"subnavbtn\" type=\"submit\" name=\"info\" value=\"Inventário\">
                        </form>
                    </div>
                    <div class = \"subnav\" > 
                        <form action=\"../Employee_user/f_ListOrders.php\">
                            <input class= \"subnavbtn\" type=\"submit\" name=\"info\" value=\"Encomendas\">
                        </form>
                    </div>";
                    
        echo "  </div>";
    }
 
?>