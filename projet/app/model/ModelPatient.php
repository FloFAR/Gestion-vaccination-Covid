<!-- ----- début ModelPatient -->

<?php
require_once 'Model.php';

class ModelPatient {
    
    private $id, $nom, $prenom, $adresse;


    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL) {
    // valeurs nulles si pas de passage de parametres
        if (!is_null($prenom)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
        }
    }
   
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from patient";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelPatient');
            return $results;
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
       }
    }
    
    public static function insert($prenom, $nom, $adresse) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from patient";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into patient value (:id, :prenom, :nom, :adresse)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'prenom' => $prenom,
                'nom' => $nom,
                'adresse' => $adresse
            ]);
            return $id;
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

}

?>

<!-- ----- fin ModelPatient -->