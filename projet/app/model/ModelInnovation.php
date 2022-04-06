<!-- ----- début ModelInnovation -->

<?php
require_once 'Model.php';

class ModelInnovation {
    
    public static function innovation1() {
        try {
            $database = Model::getInstance();
            
            $query = "select nom, prenom, adresse, label, sum(injection) as 'Nombre d\'injection reçue', (vaccin.doses - sum(injection)) as 'Nombre d\'injection restante à faire' from rendezvous, patient, vaccin WHERE patient.id = rendezvous.patient_id and vaccin.id = rendezvous.vaccin_id GROUP by rendezvous.patient_id";
            $statement = $database->prepare($query);
            $statement->execute();
            $nmbcol = $statement->columnCount();
            
            $cols = array();
            for ($i=0; $i<$nmbcol; $i+=1){
                $cols[$i]=$statement->getColumnMeta($i)["name"];
            }
            $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
            return array($cols,$datas);
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    

    public static function innovation2() {
        try {
            $database = Model::getInstance();
            
            $query = "select centre.label, sum(stock.quantite) from centre, stock WHERE centre.id = stock.centre_id group by centre_id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return ($results);
        } 
        catch (PDOException $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return -1;
        }
        
    }
    
    public static function readAllId() {
        try {
            $database = Model::getInstance(); 
            
            $query1 = "select id, label from vaccin order by id";
            $statement = $database->prepare($query1);
            $statement->execute();
            $data_vaccin = $statement->fetchAll();
            
            $query2 = "select id, label, adresse from centre order by id";
            $statement = $database->prepare($query2);
            $statement->execute();
            $data_centre = $statement->fetchAll();
            
            return array($data_vaccin, $data_centre);
        } 
        catch (PDOException $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return -1;
        }
    }
    
    public static function innovation3($centre) {
        try {
            $database = Model::getInstance(); 
            
            $query = "select vaccin.label, quantite from vaccin, stock where vaccin.id = stock.vaccin_id and stock.centre_id = :centre order by stock.centre_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'centre' => $centre,
            ]);
            $data_stock = $statement->fetchAll();
            
            $query2 = "select label from centre where id = :centre";
            $statement = $database->prepare($query2);
            $statement->execute([
                'centre' => $centre,
            ]);
            $nom_centre = $statement->fetch();
            
            return array($data_stock, $nom_centre);
        } 
        catch (PDOException $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return -1;
        }
    }
   
}

?>

<!-- ----- fin ModelInnovation -->