<!-- ----- début ControllerPatient -->

<?php
require_once '../model/ModelPatient.php';

class ControllerPatient {
    
    // Affiche les informations des différents patients de la base de données
    public static function patientReadAll() {
        $results = Modelpatient::getAll();
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewAll.php';
        if (DEBUG) {
            echo ("ControllerPatient : patientReadAll : vue = $vue");
        }
        require ($vue);
    }
    
    // Affiche le formulaire de creation d'un patient
    public static function patientCreate($args) {
        // ----- Construction chemin de la vue
        $target = $args['target'];
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsert.php';
        require ($vue);
    }
    
    //Affiche la confirmation de la création du patient précédemment renseigné
    public static function patientCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelPatient::insert(
          htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['adresse'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInserted.php';
        require ($vue);
    }
}

?>

<!-- ----- fin ControllerPatient -->