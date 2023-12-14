<?php

require_once '../config.php';

class EvenementC
{
    public function listEvenement()
    {
        $sql = "SELECT * FROM event";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteEvenement($id)
    {
        $sql = "DELETE FROM event WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT); // Specify the parameter type

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addEvenement($evenement)
    {
        $sql = "INSERT INTO event (id, nom_event, adresse, temps, type)  
                VALUES (NULL, :nom_event, :adresse, :temps, :type )";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_event' => $evenement->getNomEvent(),
                'adresse' => $evenement->getAdresse(),
                'temps' => $evenement->getTemps(),
                'type' => $evenement->getType(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            // Ajoutez une vérification des erreurs SQL
            var_dump($query->errorInfo());
        }
    }
    
    

    function showEvenement($id)
    {
        $sql = "SELECT * FROM event WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT); // Specify the parameter type
            $query->execute();
            $evenement = $query->fetch();
            return $evenement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getParticipantsCount($id_event)
    {
        $db = config::getConnexion();

        // Sélectionnez le nombre de participants pour un événement donné
        $sql = "SELECT COUNT(id_user) AS count FROM participation WHERE id_event = :id_event";
        $query = $db->prepare($sql);
        $query->execute(['id_event' => $id_event]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result['count']; // Retourne le nombre de participants
    }
    public function getParticipantsCountByDate($id_event, $start_date, $end_date) {
        $db = config::getConnexion();
    
        // Sélectionnez le nombre de participants pour un événement donné dans une période donnée
        $sql = "SELECT COUNT(id_user) AS count FROM participation WHERE id_event = :id_event AND date_participation BETWEEN :start_date AND :end_date";
        $query = $db->prepare($sql);
        $query->execute(['id_event' => $id_event, 'start_date' => $start_date, 'end_date' => $end_date]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
        return $result['count'];
    }
    public function getUpcomingEvents()
{
    $db = config::getConnexion();
    $currentDate = date("Y-m-d");

    $sql = "SELECT * FROM event WHERE temps >= '$currentDate' ORDER BY temps ASC";
    $result = $db->query($sql);

    $events = [];
    while ($row = $result->fetch()) {
        $events[] = $row;
    }

    return $events;
}
// EvenementC.php

public function getClosedEvents()
{
    $db = config::getConnexion();
    $currentDate = date("Y-m-d");

    $sql = "SELECT * FROM event WHERE temps < '$currentDate' ORDER BY temps DESC";
    $result = $db->query($sql);

    $closedEvents = [];
    while ($row = $result->fetch()) {
        $closedEvents[] = $row;
    }

    return $closedEvents;
}

    

    function updateEvenement($evenement, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE event SET 
                    nom_event = :nom_event, 
                    adresse = :adresse, 
                    temps = :temps,
                    type = :type
                    
                   
                  
                WHERE id = :id'
            );
    
            $query->execute([
                'id' => $id,
                'nom_event' => $evenement->getNomEvent(),
                'adresse' => $evenement->getAdresse(),
                'temps' => $evenement->getTemps(),
                'type' => $evenement->getType(),
             
            
                //'type' => $evenement->getType(),
               
            ]);
    
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
   
    function searchEvenementByDate($date)
    {
        $sql = "SELECT * FROM event WHERE temps = :date";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':date', $date, PDO::PARAM_STR); // Assure that the parameter is treated as a string
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
}


