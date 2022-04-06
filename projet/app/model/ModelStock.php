<!-- ----- début ModelStock -->

<?php
require_once 'Model.php';

class ModelStock {
    
    private $centre_id, $vaccin_id, $quantite;
 
    public function __construct($centre_id = NULL, $vaccin_id = NULL, $quantite = NULL) {
    // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id) or !is_null($vaccin_id)) {
            $this->centre_id = $centre_id;
            $this->vaccin_id = $vaccin_id;
            $this->quantite = $quantite;
        }
    }
    
    public function getCentre_id() {
        return $this->centre_id;
    }

    public function getVaccin_id() {
        return $this->vaccin_id;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function setCentre_id($centre_id) {
        $this->centre_id = $centre_id;
    }

    public function setVaccin_id($vaccin_id) {
        $this->vaccin_id = $vaccin_id;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

        
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select centre.label, vaccin.label, stock.quantite from centre, vaccin, stock where centre.id = stock.centre_id and vaccin.id = stock.vaccin_id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
       }
    }
    
    public static function getNombreGlobal() {
        try{
            $database = Model::getInstance();
            $query = "select centre.label, sum(stock.quantite) from centre, stock WHERE centre.id = stock.centre_id group by centre_id order by sum(stock.quantite) desc";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    public static function getInfo() {
        try {
            $database = Model::getInstance();
            $query1 = "select id, label, adresse from centre";
            
            $statement = $database->prepare($query1);
            $statement->execute();
            $data_centre = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            $query2 = "select id, label from vaccin order by id";
            
            $statement = $database->prepare($query2);
            $statement->execute();
            $data_vaccin = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return array($data_centre,$data_vaccin);
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
       }
    }
    
    public static function addDoses($centre, $doses) {
        try {
            $database = Model::getInstance();
            for ($i=0; $i<count($doses); $i+=1){
            try {

                    $query1 = "insert into stock values (:centre, :vaccin_id, :doses)";
                    echo($doses[$i+1]);
                    $statement = $database->prepare($query1);
                    $statement->execute([
                        'centre' => $centre,
                        'vaccin_id' => $i+1,
                        'doses' => $doses[$i]
                    ]);
                }
            
            catch (PDOException $ex) {
                    $query2 = "update stock set quantite = quantite + :doses where centre_id = :centre and vaccin_id = :vaccin_id";

                    $statement = $database->prepare($query2);
                    $statement->execute([
                        'centre' => $centre,
                        'vaccin_id' => $i+1,
                        'doses' => $doses[$i]
                    ]);
            }
            }
            
            $query3 = "select vaccin.label, stock.quantite from vaccin, stock WHERE vaccin.id = stock.vaccin_id and centre_id = :centre";
            $statement = $database->prepare($query3);
            $statement->execute([
                'centre' => $centre,
            ]);
            $data_doses = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            $query4 = "select label from centre where id = :centre";
            $statement = $database->prepare($query4);
            $statement->execute([
                'centre' => $centre,
            ]);
            $label = $statement->fetch(PDO::FETCH_ASSOC);
            
            return array($data_doses, $label);
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
       }
    }
}

?>

<!-- ----- fin ModelStock -->