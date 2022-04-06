<!-- ----- début ControllerInnovation -->

<?php
require_once '../model/ModelInnovation.php';

class ControllerInnovation {
    
    // Affiche la première innovation (tableau avec notamment le nombre de doses restante à prendre des patients)
    public static function innovation1() {
        $results = ModelInnovation::innovation1();
        
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewInnovation1.php';
        if (DEBUG) {
            echo ("ControllerSite : innovation1 : vue = $vue");
        }
        require ($vue);
    }
 
    //Affiche la deuxième innovation (histogramme des stocks de vaccins de chaque centre)    
    public static function innovation2() {
        $results = ModelInnovation::innovation2();
        
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewInnovation2.php';
        if (DEBUG) {
            echo ("ControllerSite : innovation2 : vue = $vue");
        }
        require ($vue);
    }
    
    // Affiche un formulaire pour choisir un vaccin et un centre
    public static function innovationReadId($args) {
        $results = ModelInnovation::readAllId();
        $target = $args['target'];
        
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewAllId.php';
        if (DEBUG) {
            echo ("ControllerSite : innovationReadId : vue = $vue");
        }
        require ($vue);
    }
    
    //Affiche la troisième innovation (diagramme circulaire de la répartition des vaccins (avec le vaccin sélectionné mis en valeur) du centre sélectionné)
    public static function innovation3() {
        $vaccin = $_GET['vaccin'];
        $centre = $_GET['centre'];
        $results = ModelInnovation::innovation3($centre);
        
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewInnovation3.php';
        if (DEBUG) {
            echo ("ControllerSite : innovation3 : vue = $vue");
        }
        require ($vue);
    }
}

?>

<!-- ----- fin ControllerInnovation -->