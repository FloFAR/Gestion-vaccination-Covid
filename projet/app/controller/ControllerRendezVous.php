<!-- ----- début ControllerRendezVous -->

<?php
require_once '../model/ModelRendezVous.php';

class ControllerRendezVous {
    
    // Affiche le formulaire de sélection d'un patient
    public static function patientReadAllId($args) {
        $results = ModelRendezVous::getAllId();
        $target = $args['target'];
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/viewAllId.php';
        if (DEBUG) {
            echo ("ControllerPatient : patientReadAllId : vue = $vue");
        }
        require ($vue);
    }
    
    // Méthode générale qui va s'occuper de la gestion d'un dossier. En fonction du nombre d'injection du patient,
    // la vue va s'adapter sur ce qu'elle doit afficher en changeant la valeur de la variable $target :
    // 
    //      * Si le patient n'a pas encore eu d'injection, un formulaire apparait grâce à la méthode premiereDose();
    //      
    //      * Si le patient n'a pas encore atteint le nombre d'injection nécessaire de son vaccin, 
    //        il chosit un centre ayant encore son vaccin pour se faire vacciner grâce à la méthode injecterDose();
    //        
    //      * Si aucun centre n'a de vaccin pour un patient, une page spéciale apparaît pour lui dire d'attendre;
    //        
    //      * Si il a atteint le nombre d'injection de son vaccin, une page spéciale apparaît pour le féliciter !
    public static function patientDossier($args){
        $id=$_GET['id'];
        $target = $args['target'];
        $results = ModelRendezVous::getDossier($id);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/viewDossier.php';
        require ($vue);
    }
    
    // Affiche un formulaire pour choisir un centre pour se faire vacciner pour la 1ère fois
    public static function premiereDose(){
        $centre = $_GET['centre'];
        $patient = $_GET['patient'];
        $results = ModelRendezVous::premiereDose($centre, $patient);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/viewPremiereDose.php';
        require ($vue);
    }
    
    // Affiche un formulaire pour choisir un centre pour continuer ses vaccinations
    public static function injecterDose(){
        $centre = $_GET['centre'];
        $patient = $_GET['patient'];
        $vaccin = $_GET['vaccin'];
        $results = ModelRendezVous::injecterDose($centre, $patient, $vaccin);
        print_r($results);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/viewInjectionDose.php';
        require ($vue);
    }
  
}

?>

<!-- ----- fin ControllerRendezVous -->