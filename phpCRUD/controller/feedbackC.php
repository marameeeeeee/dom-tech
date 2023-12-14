<?php
require '../config.php';

class feedC
{
    public function listFeedsForRdv($id_rv) {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM feedback WHERE id_rv = :id_rv");
            $query->execute(['id_rv' => $id_rv]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
   public function affichefeedback($id_rv)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM feedback WHERE id_rv = :id_fb");
            $query->execute(['id_fb' => $id_rv]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function afficheRdvs()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM rdv");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Nouvelle méthode pour obtenir le lieu par date
    public function getLieuByDate($id_rv)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT lieu FROM rdv WHERE id_rv = :id_rv");
            $query->execute(['id_rv' => $id_rv]);
            $lieuList = $query->fetchAll(PDO::FETCH_COLUMN);
            return $lieuList;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    
    public function getCommentsAndEmailsByDate($id_rv)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT feedback.commentaire, feedback.email FROM feedback
                                    INNER JOIN rdv ON feedback.id_rv = rdv.id_rv
                                    WHERE rdv.id_rv = :id_rv");
            $query->execute(['id_rv' => $id_rv]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function listFeeds()
    {
        $sql = "SELECT * FROM feedback";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteRdv($ide)
    {
        $sql = "DELETE FROM feedback WHERE id_fb = :id_fb";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_fb', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addFeed($feed)
    {

        $sql = "INSERT INTO feed(id_fb,commentaire,email) 
        VALUES (NULL, :commentaire,:email ,)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_fb' => $feed->getid_fb(),

                'commentaire' => $feed->getcommentaire(),
                'email' => $feed->getemail(),
                

              
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showFeed($id)
    {
        $sql = "SELECT * from feedback where id_fb = $id_fb";
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

    function updateFeed($feed, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE feedback SET 
                   commentaire =:commentaire;
                   email=:email;
                 
                WHERE id_fb= :id_fb'
            );
            
            $query->execute([
                'id_fb' => $id,
                'commentaire' => $feed->getcommentaire(),
                'email' => $feed->getemail(),
               

                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
            header("Location: listFeeds.php");
            exit();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}
?>
