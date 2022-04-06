<!-- ----- début viewDossier -->

<?php
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentSiteMenu.html';
        include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
        
        // Si le patient n'a pas encore fait d'injection : 
        if ($results[0] == "cas 0") {
            $target = "premiereDose";
            echo ("<h3>" . $results[1]['nom'] . " " . $results[1]['prenom'] . " n'a pas encore eu d'injection de vaccin.</h3>");
            echo ("<form role='form' method='get' action='router.php'>");
            echo ("<div class='form-group'>");

            echo("<input type='hidden' name='action' value='$target'>");   
            echo ('<input type="hidden" name="patient" value='. $results[1]["id"] . '>');
            echo ("<label>Sélectionnez un centre ayant encore des doses :</label>");
            echo ("<br>");
            echo ("<select name='centre' size='1' style='width: 50%'>");
                for ($i=0; $i<count($results[2]); $i+=1){
                    echo("<option value=" . $results[2][$i]['id'] . ">" . $results[2][$i]['id'] . " : ". $results[2][$i]['label'] . " : ". $results[2][$i]['adresse'] . " : ". $results[2][$i]['quantite'] . " doses restantes</option>");
                }
            echo ("</select>");
            echo("</div>");
            echo("<p>");
            echo("<button class='btn btn-primary' type='submit'>Envoyer</button>");
            echo("</form>");
        }
        
        // Si un centre a le vaccin du patient :
        else if ($results[0] == "cas 1") {
            $target = "injecterDose";
            echo ("<h3>" . $results[1]['nom'] . " " . $results[1]['prenom'] . " doit encore recevoir des injections de " . $results[3]['label'] . ".</h3>");
            echo ("<form role='form' method='get' action='router.php'>");
            echo ("<div class='form-group'>");

            echo("<input type='hidden' name='action' value=$target>");   
            echo ('<input type="hidden" name="patient" value='. $results[1]["id"] . '>');
            echo ('<input type="hidden" name="vaccin" value='. $results[4] . '>');
            echo ("<label>Sélectionnez un centre ayant encore des doses :</label>");
            echo ("<br>");
            echo ("<select name='centre' size='1' style='width: 50%'>");
                for ($i=0; $i<count($results[2]); $i+=1){
                    echo("<option value=" . $results[2][$i]['id'] . ">" . $results[2][$i]['id'] . " : ". $results[2][$i]['label'] . " : ". $results[2][$i]['adresse'] . " : ". $results[2][$i]['quantite'] . " doses restantes</option>");
                }
            echo ("</select>");
            echo("</div>");
            echo("<p>");
            echo("<button class='btn btn-primary' type='submit'>Envoyer</button>");
            echo("</form>");
        }
        
        // Si aucun centre n'a le vaccin du patient :
        else if ($results[0] == "cas 1.0") {
            echo ("<h3>" . $results[1]['nom'] . " " . $results[1]['prenom'] . " ne peut pas recevoir d'injection de ". $results[2]['label'] . ". Aucun centre en propose. Veuillez attendre la prochaine vague de réapprovisionnement.</h3>");
        }
        
        // Si le patient a fait toutes ses injections :
        else if ($results[0] == "cas n") {
            echo ("<h3>" . $results[1]['nom'] . " " . $results[1]['prenom'] . " a reçu toutes ses injections de ". $results[2]['label'] . ". Il / Elle peut aller boire une bière sans se soucier de sa santé !</h3>");
            echo('<img src="../../public/images/affligen.PNG" alt="Une bonne Affligen">');
        }
        
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
?>
    
<!-- ----- fin viewDossier -->    