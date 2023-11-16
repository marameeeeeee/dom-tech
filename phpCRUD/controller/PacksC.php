<?php

require '../config.php';

class PackC
{

    public function listPacks()
    {
        $sql = "SELECT * FROM pack";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletePack($ide)
    {
        $sql = "DELETE FROM pack WHERE idpack = :idpack";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idpack', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addPack($pack)
    { 
        $nom = $pack->getNom();
        $price = $pack->getPrice();

        
        // Valider l'entrée - autoriser uniquement des lettres
        if (!preg_match("/^[a-zA-Z]+$/", $nom)) {
            echo "Erreur : Le titre doit contenir uniquement des lettres.";
            return;
        } elseif (!is_numeric($price)) {
            echo "Erreur : Le prix doit être un nombre.";
            return;
        } elseif ($price <= 0) {
            echo "Erreur : Le prix doit être un nombre positif.";
            return;
        }

        $sql = "INSERT INTO pack  
        VALUES (NULL,:nom ,:price, :types,:duration)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $pack->getNom(),
                'price' => $pack->getPrice(),
                'types' => $pack->getTypes(),
                'duration' => $pack->getDuration(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showPack($idpack)
    {
        $sql ="SELECT * from pack where idpack = $idpack";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $pack = $query->fetch();
            return $pack;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatePack($pack, $id)
    {   
        $nom = $pack->getNom();
        $price = $pack->getPrice();

        
        // Valider l'entrée - autoriser uniquement des lettres
        if (!preg_match("/^[a-zA-Z]+$/", $nom)) {
            echo "Erreur : Le titre doit contenir uniquement des lettres.";
            return;
        } elseif (!is_numeric($price)) {
            echo "Erreur : Le prix doit être un nombre.";
            return;
        } elseif ($price <= 0) {
            echo "Erreur : Le prix doit être un nombre positif.";
            return;
        }

        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE pack SET 
                    nom = :nom, 
                    price = :price, 
                    types = :types, 
                    duration = :duration
                WHERE idpack= :idpack'
            );
            
            $query->execute([
                'idpack' => $id,
                'nom' => $pack->getNom(),
                'price' => $pack->getPrice(),
                'types' => $pack->getTypes(),
                'duration' => $pack->getDuration(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
