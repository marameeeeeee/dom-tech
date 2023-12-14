<?php
require '../config.php';

function connectToDatabase() {
    return config::getConnexion();
}

function executeQuery($sql) {
    $conn = connectToDatabase(); // Establish the database connection

    try {
        $result = $conn->query($sql);
        return $result;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

$sql = "SELECT types, COUNT(*) as count FROM abonnement GROUP BY types";
$result = executeQuery($sql);

$data = array();

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[$row['types']] = $row['count'];
    }
} else {
    $data['error'] = 'Database query error';
}

// Output data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
