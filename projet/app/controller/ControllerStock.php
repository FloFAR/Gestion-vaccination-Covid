<!-- ----- début ControllerStock -->

<?php
require_once '../model/ModelStock.php';

class ControllerStock {
    
    // Affiche la liste des centre et de leurs vaccins
    public static function stockReadAll() {
        $results = ModelStock::getAll();
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAll.php';
        if (DEBUG) {
            echo ("ControllerStock : stockReadAll : vue = $vue");
        }
        require ($vue);
    }
    
    // Affiche une liste du nombre de producteurs par région
    public static function stockNombreGlobal() {
        $results = ModelStock::getNombreGlobal();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewNombreGlobal.php';
        require ($vue);
    }
    
    // Affiche un formulaire pour demander la quantité de doses à ajouter à un centre
    public static function askQuantite($args) {
        $results = ModelStock::getInfo();
        $target = $args['target'];

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAttribution.php';
        require ($vue);
    }
    
    //Affiche le nombre des nouvelles doses de vaccin
    public static function getChanges() {
        $centre = $_GET['centre'];
        $doses = $_GET['doses'];
        
        $results = ModelStock::addDoses($centre, $doses);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewChanges.php';
        require ($vue);
    }
}

?>

<!-- ----- fin ControllerStock -->