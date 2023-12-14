<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphique</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<?php   
$dsn = "mysql:host=localhost;dbname=conservatoire";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$query = "SELECT nom, likes, dislikes FROM instruments";
$statement = $pdo->prepare($query);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

$instrus = [];
$percentages = [];

foreach ($data as $row) {
    $instrus[] = $row['nom'];
    
    // Calcul du pourcentage
    $like = $row['likes'];
    $dislike = $row['dislikes'];
    
    // Éviter la division par zéro
    $totalVotes = $like + $dislike;
    $percentage = ($totalVotes > 0) ? (($like - $dislike) / $totalVotes) * 100 : 0;
    
    $percentages[] = $percentage;
}
?>
<div class="chart-container">
    <canvas id="myChart"></canvas>
</div>
<a href="lisinstruments.php">Retourner a la liste</a>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($instrus) ?>,
            datasets: [{
                label: 'Pourcentage de satisfaction',
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1,
                data: <?php echo json_encode($percentages) ?>,
            }]
        },
        options: {
            scales: {
                y: {
                beginAtZero: true,
                max: 100,
                ticks: {
                    color: 'black' // Changer la couleur du texte des numéros
                }
            },
            x: {
                ticks: {
                    color: 'black' // Changer la couleur du texte des noms des instruments
                }
            }

            }
        }
    });
</script>

<a href="indexad.php" class="link">Back to Profile</a>
    <?php include 'footer.php'; ?>
</body>


</html>
