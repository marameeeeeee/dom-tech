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

$query = "SELECT name, SUM(number) as total FROM month GROUP BY name";
$statement = $pdo->prepare($query);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

$names = [];
$totals = [];

foreach ($data as $row) {
    $names[] = $row['name'];
    $totals[] = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphique</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>

    

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($names) ?>,
            datasets: [{
                label: 'Total par mois',
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',  // Rouge
                    'rgba(54, 162, 235, 0.7)', // Bleu
                    'rgba(255, 206, 86, 0.7)', // Jaune
                    // Ajoutez plus de couleurs si nécessaire
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    // Ajoutez plus de couleurs si nécessaire
                ],
                borderWidth: 1,
                data: <?php echo json_encode($totals) ?>,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>
<style>
     .return-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
        }

        .return-btn:hover {
            background-color: #555;
        }
        </style>

<a href="indexad.php" class="return-btn">Back to Profile</a>
    <?php include 'footer.php'; ?>
</body>
</html>
