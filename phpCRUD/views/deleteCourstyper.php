<?php
include '../Controller/CourstypeC.php';
$CourstypeC = new CourstypeC();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $CourstypeC = new CourstypeC();
    $CourstypeC->deleteCourstype($id);
}
header('Location: listCourstypes.php');

?>

