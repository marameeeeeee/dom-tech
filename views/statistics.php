<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add your CSS styles here -->
    <style>
      body {
    background-color: #f0f0f0; /* Set a slightly lighter background color */
}

.container {
    margin-top: 120px; /* Adjusted margin-top for moving components slightly lower */
}

h1 {
    color: #FF5733; /* Set title color to a professional orange shade */
    text-align: center;
}


h2 a {
    
    color: #4B0082; /* Set link color to a professional indigo shade */
    
}

table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 35px; /* Adjusted space between title and table */
}

th, td {
    border: 1px solid #dcdcdc; /* Slightly lighter border color for better contrast */
    padding: 8px; /* Increased padding for better spacing */
    text-align: left;
}

th {
    background-color: #4B0082; /* Set table header background color to a professional indigo shade */
    color: #ffffff;
}

td {
    background-color: #f5f5f5; /* Set table data cell background color to a slightly lighter shade */
}

form {
    display: block; /* Changed to display form elements as block for better alignment */
}

input[type="submit"] {
    background-color: #FF5733; /* Set button color to a professional orange shade */
    color: #ffffff;
    padding: 8px 12px; /* Adjusted padding for better button size */
    border: none;
    cursor: pointer;
}
    </style>
    <title>Abonnement Statistics</title>
    <!-- Include necessary Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <h1>Abonnement Statistics</h1>
    <div style="width: 80%; margin: auto;">
        <!-- Add a canvas element to display the chart -->
        <canvas id="abonnementChart"></canvas>
    </div>

    <!-- Include the chart generation JavaScript file -->
    <script src="chart_abonnement.js"></script>

    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
