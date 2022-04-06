<!-- ----- début viewInserted -->

<?php
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentSiteMenu.html';
        include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
     
        if ($results) {
        echo ("<h3>Le nouveau vaccin a été ajouté :</h3>");
        echo("<ul>");
        echo("<li>Id = " . $results . "</li>");
        echo("<li>Label = " . $_GET['label'] . "</li>");
        echo("<li>Doses = " . $_GET['doses'] . "</li>");
        echo("</ul>");
        } 
        else {
            echo ("<h3>Problème d'insertion du vaccin</h3>");
            echo ("id = " . $results);
        }
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
?>
    
<!-- ----- fin viewInserted -->    