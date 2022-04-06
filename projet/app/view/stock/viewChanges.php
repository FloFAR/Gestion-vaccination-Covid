<!-- ----- début viewChanges -->

<?php
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
    <div class="container">
        <?php
            include $root . '/app/view/fragment/fragmentSiteMenu.html';
            include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
     

            echo("<h3>Voici les nouvelles doses des différents vaccins du centre " . $results[1]['label'] . ":</h3>");
            echo("<ul>");
            for ($i=0; $i<count($results[0]); $i+=1){
                echo("<li>" . $results[0][$i]['label'] . " : " . $results[0][$i]['quantite'] . "</li>");
            }
            echo("</ul>");
            echo("</div>");
    
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
?>
    
<!-- ----- fin viewChanges -->    