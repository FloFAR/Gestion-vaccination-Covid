<!-- ----- début viewUpdated -->

<?php
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentSiteMenu.html';
        include $root . '/app/view/fragment/fragmentSiteJumbotron.html';

        echo ("<h3>Le vaccin a été mis à jour</h3>");
        echo("<ul>");
        echo ("<li>Id = " . $results[0] . "</li>");
        echo ("<li>Label = " . $results[1] . "</li>");
        echo ("<li>Doses = " . $results[2] . "</li>");
        echo("</ul>");
    echo("</div>");
    
include $root . '/app/view/fragment/fragmentSiteFooter.html';

?>
    
<!-- ----- fin viewUpdated -->    
