
<?php
// Inclure le fichier de la classe CourstypeC
include '../Controller/CourstypeC.php';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données du formulaire sont présentes
    if (isset($_POST['course_id']) && isset($_POST['comment_content'])) {
        // Créer une instance de la classe CourstypeC
        $courstypeC = new CourstypeC();

        // Récupérer les données du formulaire
        $courseId = $_POST['course_id'];
        $commentContent = $_POST['comment_content'];

        // Appeler la méthode addComment pour ajouter un commentaire
        $courstypeC->addComment($courseId, $commentContent);

        // Rediriger ou afficher un message de succès, selon vos besoins
        // header("Location: index.php"); // Rediriger vers la page d'origine
        echo "Commentaire ajouté avec succès!";
    } else {
        // Afficher un message d'erreur si des données sont manquantes
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>