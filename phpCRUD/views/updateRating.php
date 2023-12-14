<?php
include '../Controller/CourstypeC.php';
$courstypeC = new CourstypeC();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateRating'])) {
    $id = $_POST['id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Mettez à jour la note et le commentaire
    $courstypeC->updateRating($id, $rating, $comment);

    // Redirigez vers la page listeCourstypes.php après la mise à jour
    header("Location: listCourstypes.php");
    exit();
}
?>
