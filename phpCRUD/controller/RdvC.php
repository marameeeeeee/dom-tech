<?php

require '../config.php';

class RdvC
{
    public function getRdvStatistics() {
        $db = config::getConnexion();
        
        // Nombre total de rendez-vous
        $totalRdvs = $db->query("SELECT COUNT(*) FROM rdv")->fetchColumn();
        
        // Nombre de rendez-vous réalisés
        $realises = $db->query("SELECT COUNT(*) FROM rdv WHERE etat = 'realise'")->fetchColumn();
        
        // Nombre de rendez-vous annulés
        $annules = $db->query("SELECT COUNT(*) FROM rdv WHERE etat = 'annule'")->fetchColumn();
    
        // Nombre de rendez-vous confirmés
        $confirms = $db->query("SELECT COUNT(*) FROM rdv WHERE etat = 'confirme'")->fetchColumn();
    
        // Nombre de rendez-vous non confirmés
        $nonConfirms = $db->query("SELECT COUNT(*) FROM rdv WHERE etat = 'non confirme'")->fetchColumn();
    
        // Nombre de rendez-vous absents
        $absents = $db->query("SELECT COUNT(*) FROM rdv WHERE etat = 'absent'")->fetchColumn();
    
        return [
            'total' => $totalRdvs,
            'realises' => $realises,
            'annules' => $annules,
            'confirms' => $confirms,
            'nonConfirms' => $nonConfirms,
            'absents' => $absents,
        ];
    }
    
    public function getRdvsByEtat($etat)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("SELECT * FROM rdv WHERE etat = :etat");
            $query->execute(['etat' => $etat]);
            $rdvs = $query->fetchAll(PDO::FETCH_ASSOC);
            return $rdvs;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
    public function getAllEtats()
    {
        try {
            $db = config::getConnexion();
            $query = $db->query("SELECT DISTINCT etat FROM rdv");
            $etats = $query->fetchAll(PDO::FETCH_COLUMN);
            return $etats;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function getRdvById($id_rv) {
    $db = config::getConnexion();
    $query = $db->prepare("SELECT * FROM rdv WHERE id_rv = :id_rv");
    $query->execute(['id_rv' => $id_rv]);
    return $query->fetch(PDO::FETCH_ASSOC);
}



    public function getLieuByDate($date) {
        $db = config::getConnexion();
        $query = $db->prepare("SELECT lieu FROM rdv WHERE date = :date");
        $query->execute(['date' => $date]);
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }

    public function listRdvs()
    {
        $sql = "SELECT * FROM rdv";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteRdv($id_rv)
    {
        $sqlDeleteRdv = "DELETE FROM rdv WHERE id_rv = :id_rv";
        $sqlDeleteFeedback = "DELETE FROM feedback WHERE id_rv = :id_rv";
    
        $db = config::getConnexion();
        $db->beginTransaction();
    
        try {
            $stmtDeleteRdv = $db->prepare($sqlDeleteRdv);
            $stmtDeleteRdv->bindValue(':id_rv', $id_rv, PDO::PARAM_INT);
            $stmtDeleteRdv->execute();
    
            $stmtDeleteFeedback = $db->prepare($sqlDeleteFeedback);
            $stmtDeleteFeedback->bindValue(':id_rv', $id_rv, PDO::PARAM_INT);
            $stmtDeleteFeedback->execute();
    
            $db->commit();
    
            echo '<script>alert("Suppression terminée");</script>';
        } catch (PDOException $e) {
            $db->rollBack();
            echo '<script>alert("Erreur lors de la suppression");</script>';
            echo "Error: " . $e->getMessage();
        }
    
        header("Location: listRdvs.php");
        exit();
    }
    

    


    function addRdv($rendez_vous)
    {

        $sql = "INSERT INTO rdv(id_rv,date,lieu,etat) 
        VALUES (NULL, :date,:lieu ,:etat)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_rv' => $rendez_vous->getid_rv(),

                'date' => $rendez_vous->getdate(),
                'lieu' => $rendez_vous->getlieu(),
                'etat' => $rendez_vous->getetat(),


                

              
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showRdv($id)
    {
        $sql = "SELECT * from rdv where id_rv = $id_rv";
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

    function updateRdv($rendez_vous, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE rdv SET 
                   date=:date,
                   lieu=:lieu
                   etat=:etat

                WHERE id_rv=:id_rv'
            );
            
            $query->execute([
                'id_rv' => $id,
                'date' => $rendez_vous->getdate(),
                'lieu' => $rendez_vous->getlieu(),
                'etat' => $rendez_vous->getetat(),

            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
    
            // Ajout d'une redirection après la mise à jour
            header("Location: listRdvs.php");
            exit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    

}
