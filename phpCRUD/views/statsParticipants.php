<?php
include '../Controller/EvenementC.php';

$evenementC = new EvenementC();

// Définissez la période pour les statistiques (vous pouvez personnaliser ces dates)
$start_date = '2023-01-01';
$end_date = '2023-12-31';

// Récupérez la liste des événements
$events = $evenementC->listEvenement();

// Initialisez des tableaux pour les labels et les données du graphique
$labels = [];
$data = [];

// Remplissez les tableaux avec les données nécessaires pour le graphique
foreach ($events as $event) {
    $labels[] = $event['nom_event'];
    $data[] = $evenementC->getParticipantsCountByDate($event['id'], $start_date, $end_date);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des participants</title>
    <!-- Ajoutez ici les liens vers les bibliothèques nécessaires pour le graphique -->
    <!-- Remplacez ces URL par les liens réels vers Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #008080;
        }

        canvas {
            max-width: 800px;
            margin: 10px auto;
        }
    </style>
</head>
<body>

    <h1>Statistiques des participants par événement</h1>
    
    <!-- Ajoutez ici le code nécessaire pour afficher le graphique avec les données récupérées -->
    <canvas id="myChart" width="400" height="400"></canvas>

    <script>
        // Utilisez les données récupérées pour créer un graphique
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Nombre de participants',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
