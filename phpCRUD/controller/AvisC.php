<?php

include_once '../model/Avis.php';
include_once '../config.php';

class AvisC
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Config::getConnexion();
    }

    public function addAvis(Avis $avis)
    {
        try {
            $query = "INSERT INTO avis (commentaires, note) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$avis->getCommentaires(), $avis->getNote()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listAvis()
    {
        $query = "SELECT * FROM avis";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll();
    }
}

?>