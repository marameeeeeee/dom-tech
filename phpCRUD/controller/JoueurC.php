<?php

require '../config.php';

class JoueurC
{

    public function listJoueurs()
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

    function deleteJoueur($id)
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

    function addJoueur($joueur)
    {
        $nom = $joueur->getnom();
        $description = $joueur->getdescription();
        if (!preg_match("/^[a-zA-Z]+$/", $nom)) {
            echo "Erreur : Le titre doit contenir uniquement des lettres.";
            return;}
           
            if (ctype_digit(substr($description, 0, 1))) {
                echo "Erreur : La description ne doit pas commencer par un chiffre.";
                return;
            }
            $type = $joueur->gettype();
            if (!preg_match("/^[A-Z][a-zA-Z]*$/", $type)) {
                echo "Erreur : Le typedoit commencer par une majuscule et ne contenir que des lettres.";
                return;
            }
        
        $sql = "INSERT INTO event_type (id_event, nom, type, description)  
        VALUES (NULL, :nom, :type, :description)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $joueur->getNom(),
                'type' => $joueur->getType(),
                'description' => $joueur->getDescription(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showJoueur($id)
    {
        $sql = "SELECT * FROM event_type WHERE id_event = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $joueur = $query->fetch();
            return $joueur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateJoueur($joueur, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE event_type SET 
                    nom = :nom, 
                    type = :type, 
                    description = :description
                WHERE id_event = :id'
            );

            $query->execute([
                'id' => $id,
                'nom' => $joueur->getNom(),
                'type' => $joueur->getType(),
                'description' => $joueur->getDescription(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
