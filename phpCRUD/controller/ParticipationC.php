<?php

require_once '../config.php'; // Assurez-vous d'ajuster le chemin selon votre configuration

class ParticipationC
{
    public function addParticipation($id_event, $id_user)
    {
        // Ajoutez la participation à la base de données
        $sql = "INSERT INTO participation (id_event, id_user)  
                VALUES (:id_event, :id_user NOW())";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_event' => $id_event,
                'id_user' => $id_user,
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

        // Envoyez un e-mail de confirmation
       // $subject = "Confirmation de participation à l'événement";
       // $message = "Merci de votre participation à l'événement. Voici les détails :\n";

        // Récupérez les détails de l'événement
        $evenementC = new EvenementC();
        $evenementDetails = $evenementC->showEvenement($id_event);

        // Ajoutez les détails de l'événement au message
       // $message .= "Nom de l'événement: " . $evenementDetails['nom_event'] . "\n";
       // $message .= "Adresse: " . $evenementDetails['adresse'] . "\n";
        //$message .= "Temps: " . $evenementDetails['temps'] . "\n";
        // Ajoutez d'autres détails selon vos besoins

        // Ajoutez l'adresse e-mail du participant au message
        //$message .= "Votre adresse e-mail: " . $email_participant . "\n";

        // Remplacez l'adresse e-mail ci-dessous par l'adresse du participant
       // $to = $email_participant;

        // Envoyez l'e-mail
       // mail($to, $subject, $message);
    }

    // Ajoutez d'autres méthodes selon vos besoins
}
