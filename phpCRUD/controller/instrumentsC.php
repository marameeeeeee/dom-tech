<?php

require '../config.php';
class insC
{

    public function listinstruments()
    {
        $sql = "SELECT * FROM instruments";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteinstruments($id)
    {
        $sql = "DELETE FROM instruments WHERE id_in = :id_in";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_in', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addinstruments($joueur)
{
    $sql = "INSERT INTO instruments (nom, tp, piece_jointe, likes, dislikes) VALUES (:nom, :tp, :piece_jointe, 0, 0)";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $joueur->getnom(),
            'tp' => $joueur->gettp(),
            'piece_jointe' => $joueur->getPieceJointe(),
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function showinstruments($id)
    {
        $sql = "SELECT * FROM instruments WHERE id_in = $id";
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
    

    function updateinstruments($joueur, $id)
    {
        try {
            $db = config::getConnexion();
            $updatepiecejointe='';
           
            $query = $db->prepare(
                'UPDATE instruments SET 
                    nom = :nom, 
                   
                    tp = :tp
                WHERE id_in = :id_in'
            );
           

            $query->execute([
                'id_in' => $id,
                'nom' => $joueur->getnom(),
                'tp' => $joueur->gettp(),

            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function searchInstrumentsByName($searchTerm)
{
    $sql = "SELECT * FROM instruments WHERE nom LIKE :searchTerm";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll();

        return $result;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

function incrementLikes($instrumentId)
{
    $sql = "UPDATE instruments SET likes = likes + 1 WHERE id_in = :id_in";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_in', $instrumentId, PDO::PARAM_INT);
        $query->execute();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function incrementDislikes($instrumentId)
{
    $sql = "UPDATE instruments SET dislikes = dislikes + 1 WHERE id_in = :id_in";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_in', $instrumentId, PDO::PARAM_INT);
        $query->execute();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function getLikesCount($instrumentId)
{
    $sql = "SELECT likes FROM instruments WHERE id_in = :id_in";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_in', $instrumentId, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchColumn();
        return $result;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function getDislikesCount($instrumentId)
{
    $sql = "SELECT dislikes FROM instruments WHERE id_in = :id_in";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_in', $instrumentId, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchColumn();
        return $result;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

public function getBestInstrument()
{
    $sql = "SELECT * FROM instruments ORDER BY likes DESC LIMIT 1";
    $db = config::getConnexion();

    try {
        $query = $db->query($sql);
        $bestInstrument = $query->fetch();

        return $bestInstrument;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


}

