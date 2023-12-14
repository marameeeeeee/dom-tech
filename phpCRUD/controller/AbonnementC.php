<?php

require '../config.php';
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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


            if ($abonnement->getPayed() == 0) {
                $this->sendEmail(); // Call the sendEmail method to send the email
            }
    
            // Add any further logic as needed after inserting the abonnement
        } catch (PDOException $e) {
            // Handle exceptions here
        }
    }
    
    // Method to send email
    private function sendEmail() {
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Your SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = 'bboumiza01@gmail.com'; // Your SMTP username
            $mail->Password = 'swah eqfb kpxo ggic'; // Your SMTP password
            $mail->Port = 587; // Your SMTP port (usually 587 for TLS)
        
            // Recipients
            $mail->setFrom('bboumiza01@gmail.com', 'Badiss');
            $mail->addAddress('amenallah.kochrad@esprit.tn', 'Static Mail');
        
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Reminder for Payment';
            $mail->Body = 'Welcome our dear client, <br><br>Please proceed with the payment to continue enjoying our services. <br><br>Thank you!';
        
            $mail->send();
            // You might want to log the email sent status or handle success in another way
        } catch (Exception $e) {
            // Handle email sending errors
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
                $query=$pdo->prepare("SELECT * FROM tb_user ");
                $query->execute();
                return $query->fetchALL();
            } catch (PDOException $e){
                echo $e->getMessage();
            }
    
    
        }
    }
    