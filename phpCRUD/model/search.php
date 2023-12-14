<?php
include '../Controller/CourstypeC.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Effectuez la recherche dans la base de données en utilisant la classe CourstypeC
    $CourstypeC = new CourstypeC();
    $searchResults = $CourstypeC->searchByNomDeCours($searchTerm);

    // Affichez les résultats ou un message si aucun résultat n'est trouvé
    if (!empty($searchResults)) {
        foreach ($searchResults as $result) {
            // Affichez les résultats comme vous le souhaitez
            echo "ID: " . $result['id'] . ", Nom: " . $result['nom_de_cours'] . ", Type: " . $result['type'] . "<br>";
            echo "Note: " . $result['note'] . ", Rating: " . $result['rating'] . "<br>";
            echo "Commentaires: " . $result['commentaries'] . "<br><br>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
}
?>

