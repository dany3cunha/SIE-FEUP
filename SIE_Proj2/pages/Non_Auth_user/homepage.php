<!-- PHP includes -->
<html>
<header>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../../resources/icons/fonts-6/css/all.css">
    <link rel="stylesheet" href="../../css/style.css">

</header>

<body>

    <?php
    
        include_once("../../include/menu_footer.php");
        include_once("../../database/homepage_queries.php");
        menu();

        $highlights = get3Highlights();

        echo "<div class = \"content-layout\">
                <div class = \"content-product \"> 
                </div>
                <div class = \"content-product \"> 
                </div>
                <div class = \"content-product \"> 
                </div>
              </div>";
        
        footer();

    ?>

</body>

</html>