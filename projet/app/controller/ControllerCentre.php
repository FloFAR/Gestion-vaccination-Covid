<!-- ----- début ControllerCentre -->

<?php
require_once '../model/ModelCentre.php';

class ControllerCentre {
    
    // Affiche les informations des différents centres de la base de données
    public static function centreReadAll() {
        $results = ModelCentre::getAll();
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewAll.php';
        if (DEBUG) {
            echo ("ControllerCentre : centreReadAll : vue = $vue");
        }
        require ($vue);
    }
    
    // Affiche le formulaire de creation d'un centre
    public static function centreCreate($args) {
        // ----- Construction chemin de la vue
        $target = $args['target'];
        include 'config.php';
        $vue = $root . '/app/view/centre/viewInsert.php';
        require ($vue);
    }
    
    //Affiche la confirmation de la création du centre précédemment renseigné
    public static function centreCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelCentre::insert(
          htmlspecialchars($_GET['label']), htmlspecialchars($_GET['adresse'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewInserted.php';
        require ($vue);
    }
}

?>

<!-- ----- fin ControllerCentre -->