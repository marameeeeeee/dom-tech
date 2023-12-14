// Function to fetch data from the server using AJAX
function fetchData() {
    fetch('../controller/fetch_abonnement_count.php')
        .then(response => response.json())
        .then(data => {
            createChart(data);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

// Function to create the chart using Chart.js
function createChart(data) {
    const canvas = document.getElementById('abonnementChart');
    const ctx = canvas.getContext('2d');

    // Define custom labels
    const customLabels = [' Gratuit ', ' Premium ', ' Normal '];

    // Chart creation logic using the 'data' received from the server
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: customLabels, // Use custom labels here
            datasets: [{
                label: 'Abonnement Count',
                data: Object.values(data),
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
}

// Call the function to fetch data when the page loads
window.onload = function () {
    fetchData();
};
