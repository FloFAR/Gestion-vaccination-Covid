<!-- ----- début ControllerDocumentation -->

<?php

class ControllerDocumentation {
    
    // Affiche la documentation de la première innovation (tableau avec notamment le nombre de doses restante à prendre des patients)
    public static function documentationInnovation1() {
        include 'config.php';
        $vue = $root . '/app/view/documentation/viewDocumentationInnovation1.php';
        if (DEBUG) {
            echo ("ControllerDocumentation : documentationInnovation1 : vue = $vue");
        }
        require ($vue);
    }
    
    //Affiche la documentation de la deuxième innovation (histogramme des stocks de vaccins de chaque centre)
    public static function documentationInnovation2() {
        include 'config.php';
        $vue = $root . '/app/view/documentation/viewDocumentationInnovation2.php';
        if (DEBUG) {
            echo ("ControllerDocumentation : documentationInnovation2 : vue = $vue");
        }
        require ($vue);
    }
    
    //Affiche la documentation de la troisième innovation (diagramme circulaire de la répartition des vaccins d'un centre)
    public static function documentationInnovation3() {
        include 'config.php';
        $vue = $root . '/app/view/documentation/viewDocumentationInnovation3.php';
        if (DEBUG) {
            echo ("ControllerDocumentation : documentationInnovation3 : vue = $vue");
        }
        require ($vue);
    }
    
    // Affiche mon avis sur le projet
    public static function avis() {
        include 'config.php';
        $vue = $root . '/app/view/documentation/viewAvis.php';
        if (DEBUG) {
            echo ("ControllerDocumentation : avis : vue = $vue");
        }
        require ($vue);
    }
    
}

?>

<!-- ----- fin ControllerDocumentation -->