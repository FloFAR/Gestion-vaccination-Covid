<!-- ----- début ControllerSite -->

<?php
require_once '../model/ModelSite.php';

class ControllerSite {
    
    // --- Page d'acceuil
    public static function SiteAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/site/viewSiteAccueil.php';
        if (DEBUG) echo ("ControllerSite : SiteAccueil : vue = $vue");
        require ($vue);
    }
    
}

?>

<!-- ----- fin ControllerSite -->