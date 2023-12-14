<?php
include '../Controller/CourstypeC.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données du formulaire sont présentes
    if (isset($_POST['course_id']) && isset($_POST['rating_value'])) {
        // Créer une instance de la classe CourstypeC
        $courstypeC = new CourstypeC();

        // Récupérer les données du formulaire
        $courseId = $_POST['course_id'];
        $ratingValue = $_POST['rating_value'];

        // Appeler la méthode addRating pour ajouter la note
        $courstypeC->addRating($courseId, $ratingValue);

        // Rediriger ou afficher un message de succès, selon vos besoins
        // header("Location: index.php"); // Rediriger vers la page d'origine
        echo "Note attribuée avec succès!";
    } else {
        // Afficher un message d'erreur si des données sont manquantes
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>