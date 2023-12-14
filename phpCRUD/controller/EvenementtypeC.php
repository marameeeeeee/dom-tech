<?php

require '../config.php';

class EvenementtypeC
{

    public function listEvenementtypes()
    {
        $sql = "SELECT * FROM event_type";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    function deleteEvenementtype($id)
    {
        $sql = "DELETE FROM event_type WHERE id_event = :id_event";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_event', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addEvenementtype($evenementtype)
    {
       
        
        $sql = "INSERT INTO event_type (id_event, nom, type_event, description,image_path)  
        VALUES (NULL, :nom, :type_event, :description ,:image_path)";
        $db = config::getConnexion();
       try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $evenementtype->getnom(),
                'type_event' => $evenementtype->gettype_event(),
                'description' => $evenementtype->getdescription(),
                'image_path' => $evenementtype->getImagePath(), 
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        

         
    }

   
    

    function showEvenementtype($id)
    {
        $sql = "SELECT * FROM event_type WHERE id_event = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $evenementtype = $query->fetch();
            return $evenementtype;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateEvenementtype($evenementtype, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE event_type SET 
                    nom = :nom, 
                    type_event = :type_event, 
                    description = :description
                WHERE id_event = :id'
            );

            $query->execute([
                'id' => $id,
                'nom' => $evenementtype->getNom(),
                'type_event' => $evenementtype->getType_event(),
                'description' => $evenementtype->getDescription(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
