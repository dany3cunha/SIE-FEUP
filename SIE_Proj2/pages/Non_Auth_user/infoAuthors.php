<?php
    /* PHP includes */
    include_once("../../include/header.php");
?>

<?php
	menu();
?>

<body>
	
	<div class="content-body">
		<div class="content-title">Autores </div>
        <div class ="authors-page-grid">
            <div class = "authors-page-grid-col">
                <div class="author-layout">
                    <div class="author-page-name">
                            Joaquim Daniel Rios Cunha <br><br>
                            up201806651@edu.fe.up.pt 
                    </div>
                    <div>
                        <img src="../../resources/images/authors/autor_1.jpg" class="authors-page-grid-img">
                    </div>
                </div>
            </div>
            
            <div class = "authors-page-grid-col">
                <div class="author-page-text">
                    Somos alunos do Mestrado em Engenharia Eletrotécnica e de Computadores na FEUP, no ramo de Automação. <br>
                    Realizamos este projeto no âmbito da unidade curricular Sistemas de Informação Empresariais, no ano letivo 2022/23.
                </div>

                <table class="author-page-downloads">
                    <tr>
                        <td>
                            <a href="../../downloads/relatorioFinal.pptx" download>
                                <i class="fa-solid fa-file-powerpoint fa-5x" title="Download PowerPoint"></i>
                            </a>
                        </td>                
                        <td>
                            <a href="../../downloads/project2.zip" download>
                                <i class="fa-solid fa-file-zipper fa-5x" title="Download zip"></i>
                            </a>
                        </td>

                    </tr>
                </table>
                <table class="author-page-users">
                    <tr>
                        <th colspan="3" style="padding: 10px;" >            
                            Informações sobre os utilizadores                         
                        </th>
                    </tr>
                    <tr>
                        <th> papel    </th>
                        <th> mail     </th>
                        <th> password </th>                                        
                    </tr>
                    <tr>
                        <td> Cliente                   </td>
                        <td> cliente1@mail.com     </td>
                        <td> 123                       </td>
                    </tr>
                    <tr>
                        <td> Funcionario               </td>
                        <td> funcionario1@mail.com </td>
                        <td> 321                       </td>
                    </tr>
                </table>
            </div>
            
            <div class = "authors-page-grid-col">
                <div class="author-layout">
                    <div class="author-page-name">
                        Pedro Miguel Pinto Silva <br><br>
                        up201806526@edu.fe.up.pt
                    </div>
                    <div >
                        <img src="../../resources/images/authors/autor_2.jpg" class="authors-page-grid-img">
                    </div>
                    
                </div>
            </div>
        </div>
			
	</div>

</body>


<?php
	footer();
?>

</html>

