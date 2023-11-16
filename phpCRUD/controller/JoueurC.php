<?php

require '../config.php';

class typeC
{

    public function listJoueurs()
    {
        $sql = "SELECT * FROM typess";
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
        $sql = "DELETE FROM typess WHERE id_type = :id_type";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_type', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addJoueur($joueur)
    {
        $title = $joueur->gettitre();
        $description = $joueur->getdescriptions();

        
        // Valider l'entrée - autoriser uniquement des lettres
        if (!preg_match("/^[a-zA-Z]+$/", $title)) {
            echo "Erreur : Le titre doit contenir uniquement des lettres.";
            return;
        }
        if (ctype_digit(substr($description, 0, 1))) {
            echo "Erreur : La description ne doit pas commencer par un chiffre.";
            return;
        }
    
       
        $sql = "INSERT INTO typess
        VALUES (NULL, :titre, :descriptions)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $joueur->gettitre(),
                'descriptions' => $joueur->getdescriptions(),
            ]);

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showJoueur($id)
    {
        $sql = "SELECT * FROM typess WHERE id_type = $id";
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
                'UPDATE typess SET 
                    titre = :titre, 
                   
                    descriptions = :descriptions
                WHERE id_type = :id_type'
            );

            $query->execute([
                'id_type' => $id,
                'titre' => $joueur->gettitre(),
                'descriptions' => $joueur->getdescriptions(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
