<?php
echo '<div id="debug-info"></div>';

$lang = $_GET['lang'] ?? 'en'; // Langue par défaut

// Afficher le lien pour revenir à la page précédente
echo '<a href="javascript:history.back()">Retour</a>';

// Afficher les traductions en fonction de la langue
echo '<h2>Traductions actuelles (' . $lang . '):</h2>';
$query = $pdo->prepare("SELECT key_phrase, translation FROM translation_table WHERE language = :lang");
$query->bindParam(':lang', $lang, PDO::PARAM_STR);
$query->execute();
$translations = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($translations as $translation) {
    echo '<p>' . $translation['key_phrase'] . ': ' . $translation['translation'] . '</p>';
}

echo '<h2>Traductions à mettre à jour :</h2>';
echo '<pre>' . print_r($_POST['translations'], true) . '</pre>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $translationsToUpdate = $_POST['translations'] ?? [];

    if (is_array($translationsToUpdate)) {
        foreach ($translationsToUpdate as $key => $translation) {
            // Assurez-vous que les clés et les traductions sont non vides
            if (!empty($key) && !empty($translation)) {
                // Mettez à jour la traduction existante ou insérez une nouvelle traduction
                $updateTranslationQuery = $pdo->prepare("REPLACE INTO translation_table (language, key_phrase, translation) VALUES (:lang, :key, :translation)");
                $updateTranslationQuery->bindParam(':lang', $lang, PDO::PARAM_STR);
                $updateTranslationQuery->bindParam(':key', $key, PDO::PARAM_STR);
                $updateTranslationQuery->bindParam(':translation', $translation, PDO::PARAM_STR);
                $updateTranslationQuery->execute();
            }
        }
    }
}

// Récupérez les traductions actuelles après la mise à jour
$query = $pdo->prepare("SELECT key_phrase, translation FROM translation_table WHERE language = :lang");
$query->bindParam(':lang', $lang, PDO::PARAM_STR);
$query->execute();
$updatedTranslations = $query->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($updatedTranslations);
?>
