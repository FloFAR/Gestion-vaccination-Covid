<!-- ----- début viewInjectionDose -->

<?php
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentSiteMenu.html';
        include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
        echo ("<h3>" . $results[0]['nom'] . " " . $results[0]['prenom'] . " a eu sa " . $results[3]["injection"] . "e dose (" . $results[4]['sum(injection)'] . "e au total) de " . $results[2]['label'] . " à " . $results[1]['label'] . " : " . $results[1]['adresse'] . ".</h3>");
        
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
?>
    
<!-- ----- fin viewInjectionDose -->    