<?php
include '../Controller/CourstypeC.php';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données du formulaire sont présentes
    if (isset($_POST['comment_id'])) {
        // Créer une instance de la classe CourstypeC
        $courstypeC = new CourstypeC();

        // Récupérer l'ID du commentaire à supprimer
        $commentId = $_POST['comment_id'];

        // Appeler la méthode deleteComment pour supprimer le commentaire
        $courstypeC->deleteComment($commentId);

        // Répondre avec succès (vous pouvez également renvoyer un message JSON)
        echo "Commentaire supprimé avec succès!";
    } else {
        // Répondre avec une erreur si l'ID du commentaire est manquant
        http_response_code(400);
        echo "ID du commentaire manquant";
    }
}
?>

