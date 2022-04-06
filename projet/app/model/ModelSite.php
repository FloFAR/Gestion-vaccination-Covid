<!-- ----- début ModelSite -->

<?php
require_once 'Model.php';

class ModelSite {
    
    public static function getAllId() {
        try {
            $database = Model::getInstance(); 
            
            $query = "select vaccin.id, vaccin.label, centre.id, centre.label, centre.adresse from vaccin, centre ";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } 
        catch (Exception $ex) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
   
}

?>

<!-- ----- fin ModelSite -->