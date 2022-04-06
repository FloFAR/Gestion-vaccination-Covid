<!-- ----- début ModelRendezVous -->

<?php
require_once 'Model.php';

class ModelRendezVous {
    
    public static function getAllId() {
        try {
            $database = Model::getInstance();
            $query = "select id, nom, prenom from patient order by id";
            
            $statement = $database->prepare($query);
            $statement->execute();
            $data_patient = $statement->fetchAll(PDO::FETCH_ASSOC);
                      
            return $data_patient;
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
       }
    }
    
    public static function getDossier($id) {
        try {
            $database = Model::getInstance();
            
            // Plusieurs requêtes pour stoker certaines informations pertinentes :
            
            $query_patient = "select id, nom, prenom from patient where id = :id";
            $statement = $database->prepare($query_patient);
            $statement->execute([
                'id' => $id,
            ]);
            $patient = $statement->fetch();
            
            $query_injection = "select sum(injection), vaccin_id from rendezvous where patient_id = :id";
            $statement = $database->prepare($query_injection);
            $statement->execute([
                'id' => $id,
            ]);
            $injection = $statement->fetch();
            
            $query_dose = "select vaccin.doses from vaccin, rendezvous where vaccin.id = vaccin_id and patient_id = :id";
            $statement = $database->prepare($query_dose);
            $statement->execute([
                'id' => $id,
            ]);
            $vaccin_doses = $statement->fetch();
            
            // Si le patient n'a pas encore fait d'injection : 
            if ($injection['sum(injection)'] == 0 or $injection == null) {
                try {
                    $query = "select centre.id, centre.label, centre.adresse, sum(stock.quantite) as quantite from centre, stock WHERE centre.id = stock.centre_id group by centre_id order by sum(stock.quantite) desc";
                    $statement = $database->prepare($query);
                    $statement->execute();
                    $centres = $statement->fetchAll();
                    return array("cas 0", $patient, $centres);
                } 
                catch (PDOException $ex) {
                    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
                    return NULL;
                }
            }
            // Si le patient doit encore faire des injections :
            else if ($injection['sum(injection)'] >= 1 and $injection['sum(injection)'] < $vaccin_doses['doses']) {
                $query2 = "SELECT * from vaccin, centre, rendezvous, stock WHERE vaccin.id = stock.vaccin_id and vaccin.id = rendezvous.vaccin_id and centre.id = stock.centre_id AND stock.quantite>0 and vaccin.id = :id";
                $statement = $database->prepare($query2);
                $statement->execute([
                    'id' => $injection['vaccin_id'],
                ]);
                $centres = $statement->fetchAll();
                // Si aucun centre n'a le vaccin du patient :
                if (count($centres) == 0) {
                    $query_vaccin = "select vaccin.label from vaccin, rendezvous where rendezvous.vaccin_id = vaccin.id and rendezvous.patient_id = :id";
                    $statement = $database->prepare($query_vaccin);
                    $statement->execute([
                        ':id' => $id,
                    ]);
                    $vaccin_label = $statement->fetch();
                    return array("cas 1.0", $patient, $vaccin_label);
                }
                // Si un centre a le vaccin du patient :
                else {
                    $query_centres = "select centre.id, centre.label, adresse, stock.quantite from centre, stock, vaccin where centre.id = stock.centre_id and vaccin.id = stock.vaccin_id and quantite > 0 and vaccin.id = :id";
                    $statement = $database->prepare($query_centres);
                    $statement->execute([
                        ':id' => $injection['vaccin_id'],
                    ]);
                    $centres = $statement->fetchAll();
                    
                    $query_vaccin = "select vaccin.label from vaccin, rendezvous where rendezvous.vaccin_id = vaccin.id and rendezvous.patient_id = :id";
                    $statement = $database->prepare($query_vaccin);
                    $statement->execute([
                        ':id' => $id,
                    ]);
                    $vaccin_label = $statement->fetch();
                    
                    return array("cas 1", $patient, $centres, $vaccin_label, $injection['vaccin_id']);
                }
            }
            // Si le patient a fait toutes ses injections :
            else if ($injection['sum(injection)'] == $vaccin_doses['doses']) {
                $query_vaccin = "select vaccin.label from vaccin, rendezvous where rendezvous.vaccin_id = vaccin.id and patient_id = :id";
                $statement = $database->prepare($query_vaccin);
                $statement->execute([
                    'id' => $id,
                ]);
                $vaccin_label = $statement->fetch();
                return array("cas n", $patient, $vaccin_label);
            }
            
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
       }
    }
    
    public static function premiereDose($centre, $patient) {
        try {
            $database = Model::getInstance();
            $query = "select label, quantite, vaccin_id from vaccin, stock where vaccin.id = stock.vaccin_id and centre_id = :centre order by quantite DESC LIMIT 1";
            $statement = $database->prepare($query);
            $statement->execute([
                'centre' => $centre,
            ]);
            $vaccin = $statement->fetch();
            
            $query = "update stock set quantite = quantite - 1 WHERE vaccin_id = :vaccin and centre_id = :centre";
            $statement = $database->prepare($query);
            $statement->execute([
                'centre' => $centre,
                'vaccin' => $vaccin['vaccin_id']
            ]);
            
            try {
                $query = "insert into rendezvous values (:centre, :patient, 1, :vaccin)";
                $statement = $database->prepare($query);
                $statement->execute([
                    'centre' => $centre,
                    'vaccin' => $vaccin['vaccin_id'],
                    'patient' => $patient
                ]);
                
            } 
            catch (PDOException $ex) {
                $query2 = "update rendezvous set injection = 1 where centre_id = :centre and vaccin_id = :vaccin_id and patient_id = :patient";
                $statement = $database->prepare($query2);
                $statement->execute([
                    'centre' => $centre,
                    'vaccin_id' => $vaccin['vaccin_id'],
                    'patient' => $patient
                ]);
            }
            
            $query_centre = "select label, adresse FROM centre WHERE id = :centre";
            $query_patient = "select nom, prenom FROM patient WHERE id = :patient";
            
            $statement = $database->prepare($query_centre);
            $statement->execute([
                'centre' => $centre,
            ]);
            $data_centre = $statement->fetch();
            
            $statement = $database->prepare($query_patient);
            $statement->execute([
                'patient' => $patient,
            ]);
            $data_patient = $statement->fetch();
            
            return array($data_patient, $data_centre, $vaccin['label']);
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
       }
    }
    
    public static function injecterDose($centre, $patient, $vaccin) {
        try {
            $database = Model::getInstance();
            
            $query2 = "update stock set quantite = quantite - 1 where centre_id = :centre and vaccin_id = :vaccin";
            $statement = $database->prepare($query2);
            $statement->execute([
                'centre' => $centre,
                'vaccin' => $vaccin,
            ]);
            
            try {
                $query = "insert into rendezvous values (:centre, :patient, 1, :vaccin)";
                $statement = $database->prepare($query);
                $statement->execute([
                    'centre' => $centre,
                    'vaccin' => $vaccin,
                    'patient' => $patient,
                ]);
            } catch (PDOException $ex) {
                $query = "update rendezvous set injection = injection + 1 where centre_id = :centre and vaccin_id = :vaccin and patient_id = :patient";
                $statement = $database->prepare($query);
                $statement->execute([
                    'centre' => $centre,
                    'vaccin' => $vaccin,
                    'patient' => $patient,
                ]);
            }
                        
            $query_patient = "select nom, prenom from patient where id = :patient";
            $statement = $database->prepare($query_patient);
            $statement->execute([
                'patient' => $patient,
            ]);
            $data_patient = $statement->fetch();

            $query_centre = "select label, adresse from centre where id = :centre";
            $statement = $database->prepare($query_centre);
            $statement->execute([
                'centre' => $centre,
            ]);
            $data_centre = $statement->fetch();

            $query_vaccin = "select label from vaccin where id = :vaccin";
            $statement = $database->prepare($query_vaccin);
            $statement->execute([
                'vaccin' => $vaccin,
            ]);
            $data_vaccin = $statement->fetch();
            
            $query_injection = "select injection from rendezvous where patient_id = :id and centre_id = :centre";
            $statement = $database->prepare($query_injection);
            $statement->execute([
                'id' => $patient,
                'centre' => $centre
            ]);
            $data_injection = $statement->fetch();
            
            $query_injection = "select sum(injection) from rendezvous where patient_id = :id";
            $statement = $database->prepare($query_injection);
            $statement->execute([
                'id' => $patient,
            ]);
            $somme_injection = $statement->fetch();
            
            return array($data_patient, $data_centre, $data_vaccin, $data_injection, $somme_injection);
        } 
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
       }
    }
    
}

?>

<!-- ----- fin ModelRendezVous -->