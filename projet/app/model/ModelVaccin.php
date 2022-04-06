<!-- ----- début ModelVaccin -->

<?php
require_once 'Model.php';

class ModelVaccin {
    
    private $id, $label, $doses;


    public function __construct($id = NULL, $label = NULL, $doses = NULL) {
    // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->doses = $doses;
        }
    }
    
    public function getId() {
        return $this->id;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getDoses() {
        return $this->doses;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function setDoses($doses) {
        $this->doses = $doses;
    }

        
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from vaccin";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelVaccin');
            return $results;
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
       }
    }
    
    public static function insert($label, $doses) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from vaccin";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into vaccin value (:id, :label, :doses)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'doses' => $doses
            ]);
            return $id;
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    public static function update() {
        try {
            $database = Model::getInstance();
            $query = "select id, label from vaccin order by id";
            
            $statement = $database->prepare($query);
            $statement->execute();
            $data_vaccin = $statement->fetchAll(PDO::FETCH_ASSOC);
                      
            return $data_vaccin;
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
       }
    }
    
    public static function updated($id, $doses) {
        try {
            $database = Model::getInstance();
            $query1 = "select label from vaccin where id = :id";
            $statement = $database->prepare($query1);
            $statement->execute([
                'id' => $id,
            ]);
            $label = $statement->fetch();
            
            $query2 = "update vaccin set doses = :doses where id = :id";
            $statement = $database->prepare($query2);
            $statement->execute([
                'id' => $id,
                'doses' => $doses,
            ]);
            
            return array($id, $label[0], $doses);
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
       }
    }
}

?>

<!-- ----- fin ModelVaccin -->