<?php
    /* PHP includes */
    include_once("../../include/header.php");
    include_once("../../database/product.php");
?>

<?php
	menu();
    //Comes from userInfo page
    $user_id = $_POST['user_id']
?>

<body>
	<div class="content-title">Apagar Conta</div>
	<div class="content-body">
			<table>
                <tr>
                    <td>
                        <?php
                            echo "Pretende apagar os seus dados e eliminar a sua conta?";
                        ?>
                    </td>
                </tr>
            </table>		
            <table class="confirm-buttons-div">
                <tr>
                    <td>
                        <form method = "POST" action = "userInfo.php">
                            <input type="text" name="" value ="" hidden>
                            <button type="submit" class="cancel-button">Cancelar</button> 
                        </form>    
                    </td> 
                    <td>
                        <form method = "POST" action = "../../action/Auth_user/actionDeleteUser.php">
                            <?php
                                echo"<input type=\"text\" name=\"user_id\" value =".$user_id." hidden>";
                            ?>
                            <button type="submit" class="delete-button">Eliminar</button> 
                        </form>    
                    </td>                   
                </tr>
            </table>
    </div>
<?php
    footer();
?>