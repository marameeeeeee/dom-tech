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

$query = "SELECT date, COUNT(*) as count FROM rdv GROUP BY date";
$statement = $pdo->prepare($query);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

$dates = [];
$counts = [];

foreach ($data as $row) {
    $dates[] = $row['date'];
    $counts[] = $row['count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
        }

        .chart-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
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
            labels: <?php echo json_encode($dates) ?>,
            datasets: [{
                label: 'Number of Appointments',
                backgroundColor: [
                    'rgba(255, 255, 255, 0.7)', // White
                    'rgba(165, 42, 42, 0.7)',  // Brown
                    'rgba(173, 216, 230, 0.7)', // Light Blue
                    // Add more colors if needed
                ],
                borderColor: [
                    'rgba(255, 255, 255, 1)',
                    'rgba(165, 42, 42, 1)',
                    'rgba(173, 216, 230, 1)',
                    // Add more colors if needed
                ],
                borderWidth: 1,
                data: <?php echo json_encode($counts) ?>,
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

<footer>
<a href="indexad.php" class="return-btn">Back to Profile</a>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>
