<?php

require '../config.php';


class AbonnementC
{

    public function listAbonnements()
    {
        $sql = "SELECT * FROM abonnement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteAbonnement($ide)
    {
        $sql = "DELETE FROM abonnement WHERE id_ab = :id_ab";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_ab', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    
    function addAbonnement($abonnement) { 
        $sql = "INSERT INTO abonnement  
                VALUES (NULL, :id_user, :types, :date_deb, :date_fin, :status,:payed)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_user' => $abonnement->getId_user(),
                'types' => $abonnement->getTypes(),
                'date_deb' => $abonnement->getDatedeb(),
                'date_fin' => $abonnement->getDatefin(),
                'status' => $abonnement->getStatus(),
                'payed' => $abonnement->getPayed(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


 


    function showAbonnement($id_ab)
    {
        $sql ="SELECT * from abonnement where id_ab = $id_ab";
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

    function updateAbonnement($abonnement, $id)
    {   

        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE abonnement SET 
                    id_user = :id_user,
                    types = :types, 
                    date_deb = :date_deb, 
                    date_fin = :date_fin,
                    status = :status, 
                    payed = :payed,

                WHERE id_ab= :id_ab'
            );
            
            $query->execute([
                'id_ab' => $id,
                'id_user' => $abonnement->getId_user(),
                'types' => $abonnement->getTypes(),
                'date_deb' => $abonnement->getDatedeb(),
                'date_fin' => $abonnement->getDatefin(),
                'status' => $abonnement->getStatus(),
                'payed' => $abonnement->getPayed(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function executeQuery($sql)
    {
        $conn = config::getConnexion();
        try {
            $result = $conn->query($sql);
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getAbonnementsSortedByDateDebDesc()
    {
        $sql = "SELECT * FROM abonnement ORDER BY date_deb DESC";
        return $this->executeQuery($sql);
    }
    public function getAbonnementsSortedByDateDebAsc()
    {
        $sql = "SELECT * FROM abonnement ORDER BY date_deb ASC";
        return $this->executeQuery($sql);
    }
    public function resetSorting()
{
    return $this->listAbonnements();
}

}

Class GenreC{
    function afficheabonnements($id_pack)
        {
            try {
                $pdo= config::getConnexion();
                $query=$pdo->prepare("SELECT * FROM abonnement WHERE types = :id_pack" );
                $query->execute(['id_pack' => $id_pack]);
                return $query->fetchALL();
            } catch (PDOException $e){
                echo $e->getMessage();
            }
    
    
        }
        function affichepacks()
        {
            try {
                $pdo= config::getConnexion();
                $query=$pdo->prepare("SELECT * FROM pack ");
                $query->execute();
                return $query->fetchALL();
            } catch (PDOException $e){
                echo $e->getMessage();
            }
    
    
        }
        function afficheusers()
        {
            try {
                $pdo= config::getConnexion();
                $query=$pdo->prepare("SELECT * FROM user ");
                $query->execute();
                return $query->fetchALL();
            } catch (PDOException $e){
                echo $e->getMessage();
            }
    
    
        }
    }
    