<!-- ----- début Router -->

<?php
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerDocumentation.php');
require ('../controller/ControllerInnovation.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerRendezVous.php');
require ('../controller/ControllerSite.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerVaccin.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

$action = $param['action'];

unset($param['action']);

$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
    case "centreReadAll" :
    case "centreCreate" :
    case "centreCreated" :
        ControllerCentre::$action($args);
        break;
    
    case "documentationInnovation1" :
    case "documentationInnovation2" :
    case "documentationInnovation3" :
    case "avis" :
        ControllerDocumentation::$action($args);
        break;
    
    case "innovation1" :
    case "innovation2" :
    case "innovationReadId" :
    case "innovation3" :
        ControllerInnovation::$action($args);
        break;

    case "patientReadAll" :
    case "patientCreate" :
    case "patientCreated" :
        ControllerPatient::$action($args);
        break;

    case "patientReadAllId" :
    case "patientDossier" :
    case "premiereDose" :
    case "injecterDose" :
        ControllerRendezVous::$action($args);
        break;

    case "SiteAccueil" :
        ControllerSite::$action($args);
        break;
   
    case "stockReadAll" :
    case "stockNombreGlobal" :
    case "askQuantite" :
    case "getChanges" :
        ControllerStock::$action($args);
        break;
    
    case "vaccinReadAll" :
    case "vaccinCreate" :
    case "vaccinCreated" :
    case "vaccinUpdate" :
    case "vaccinUpdated" :
        ControllerVaccin::$action($args);
        break;

    // Tache par défaut
    default:
        $action = "siteAccueil";
        ControllerSite::$action($args);
}

?>

<!-- ----- Fin Router -->

