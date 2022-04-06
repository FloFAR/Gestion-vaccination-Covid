<!-- ----- début ControllerVaccin -->

<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin {
    
    // Affiche les informations des différents vaccins de la base de données
    public static function vaccinReadAll() {
        $results = ModelVaccin::getAll();
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewAll.php';
        if (DEBUG) {
            echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
        }
        require ($vue);
    }
    
    // Affiche le formulaire de creation d'un vaccin
    public static function vaccinCreate($args) {
        // ----- Construction chemin de la vue
        $target = $args['target'];
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInsert.php';
        require ($vue);
    }
    
    //Affiche la confirmation de la création du vaccin précédemment renseigné
    public static function vaccinCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelVaccin::insert(
          htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInserted.php';
        require ($vue);
    }
    
    // Affiche le formulaire de modification du nombre de doses d'un vaccin
    public static function vaccinUpdate($args){
        $results = ModelVaccin::update();
        $target = $args['target'];
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewUpdate.php';
        require ($vue);
    }
    
    // Affiche la confirmation de la modification du nombre de doses du vaccin précédemment renseigné
    public static function vaccinUpdated(){
        $id=$_GET['id'];
        $doses=$_GET['doses'];
        $results = ModelVaccin::updated($id, $doses);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewUpdated.php';
        require ($vue);
    }
  
}

?>

<!-- ----- fin ControllerVaccin -->