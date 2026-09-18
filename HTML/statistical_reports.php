<?php

require '../DB/dbConnect.php';
include '../PHP/navbar.php';

$sql = "SELECT ticket_id, user_id, ward, municipal_service, date_filed
        FROM ticket 
        ORDER BY date_filed DESC";

$result = $conn->query($sql);

if (!$result) {
    die("Database query failed: " . $conn->error);
}

// Fetch all rows into an array once to avoid pointer reset issues
$tickets = $result->fetch_all(MYSQLI_ASSOC);

$wardData = [];
$serviceData = [];
$dateData = [];

// Aggregate statistics from the cached array
foreach ($tickets as $row) {
    $ward = $row['ward'];
    $wardData[$ward] = ($wardData[$ward] ?? 0) + 1;

    $service = $row['municipal_service'];
    $serviceData[$service] = ($serviceData[$service] ?? 0) + 1;

    $date = $row['date_filed'];
    $dateData[$date] = ($dateData[$date] ?? 0) + 1;
}

// Prepare Google Chart formatted arrays
// Define custom names for your wards (Change these keys/values to match your data)
$wardMapping = [
    '1' => 'Ward 1',
    '2' => 'Ward 2',
    '3' => 'Ward 3',
    '4' => 'Ward 4',
    '5' => 'Ward 5',
    '6' => 'Ward 6',
    '7' => 'Ward 7',
    '8' => 'Ward 8',
    '9' => 'Ward 9',
    '10' => 'Ward 10',
    '11' => 'Ward 11',
    '12' => 'Ward 12',
    '13' => 'Ward 13',
    '14' => 'Ward 14',
];

// Prepare Google Chart formatted arrays
$wardChartArray = [['Ward', 'Number of Tickets']];
foreach ($wardData as $ward => $count) {
    // If a custom name exists in the map, use it. Otherwise, fallback to "Ward [Number]"
    $displayName = $wardMapping[$ward] ?? "Ward " . $ward;
    
    $wardChartArray[] = [(string)$displayName, (int)$count];
}

$serviceChartArray = [['Municipal Service', 'Number of Tickets']];
foreach ($serviceData as $service => $count) {
    $serviceChartArray[] = [(string)$service, (int)$count];
}

$dateChartArray = [['Date Filed', 'Number of Tickets']];
foreach ($dateData as $date => $count) {
    $dateChartArray[] = [(string)$date, (int)$count];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistical Report</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/stats_report.css">

    <!-- Google Chart stuff -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<form name="statistical_report" id="statistical_report">

    <div class="dashboard">
        <h3 class="dashboard-title">Statistical Report</h3>

        <div class="charts-container">
            <div class="chart-card">
                <h4>Tickets by Ward</h4> 
                <div id="ward-chart" class="chart"></div>
            </div>

            <div class="chart-card">
                <h4>Tickets by municipal Service</h4>
                <div id="service-chart" class="chart"></div>
            </div>

            <div class="chart-card">
                <h4>Tickets Filed Over Time</h4>
                <div id="date-chart" class="chart"></div>
            </div>
        </div>

        <!-- Table of tickets -->
        <div class="table-container">
            <h4>Ticket Information</h4>

            <table class="ticket-table">
                <tr>
                    <th>Ticket ID</th>
                    <th>User ID</th>
                    <th>Ward</th>
                    <th>municipal Service</th>
                    <th>Date Filed</th>
                </tr>
                <?php foreach ($tickets as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['ticket_id']) ?></td>
                    <td><?= htmlspecialchars($row['user_id']) ?></td>
                    <td><?= htmlspecialchars($row['ward']) ?></td>
                    <td><?= htmlspecialchars($row['municipal_service']) ?></td>
                    <td><?= htmlspecialchars($row['date_filed']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</form>

<!-- load google charts -->
<script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart']
    });

    google.charts.setOnLoadCallback(drawCharts); 

    function drawCharts() {
        // Safely pass PHP data to JavaScript via json_encode
        var wardData = google.visualization.arrayToDataTable(<?= json_encode($wardChartArray) ?>);
        var serviceData = google.visualization.arrayToDataTable(<?= json_encode($serviceChartArray) ?>);
        var dateData = google.visualization.arrayToDataTable(<?= json_encode($dateChartArray) ?>);

        // Ward chart
        var wardOptions = {
            title: 'Number of Tickets by Ward',
            pieHole: 0.35,
            colors: ['#4285F4', '#34A853', '#FBBC05', '#EA4335', '#9C27B0', '#00ACC1'],
            legend: { position: 'right' },
            chartArea: { width: '85%', height: '80%' }
        };

        var wardChart = new google.visualization.PieChart(document.getElementById('ward-chart'));
        wardChart.draw(wardData, wardOptions);
    
        // municipal service chart
        var serviceOptions = {
            title: 'Tickets by Municipal Service',
            colors: ['#4285CA'],
            legend: { position: 'none' },
            hAxis: { title: 'Municipal Service' },
            vAxis: { title: 'Number of Tickets', minValue: 0 },
            chartArea: { width: '80%', height: '70%' }
        };

        var serviceChart = new google.visualization.ColumnChart(document.getElementById('service-chart'));
        serviceChart.draw(serviceData, serviceOptions);

        // Date chart
        var dateOptions = {
            title: 'Tickets Filed Over Time',
            colors: ['#34A853'],
            legend: { position: 'none' },
            hAxis: { title: 'Date Filed' },
            vAxis: { title: 'Number of Tickets', minValue: 0 },
            chartArea: { width: '80%', height: '70%' },
            pointSize: 5,
            lineWidth: 3
        };

        var dateChart = new google.visualization.LineChart(document.getElementById('date-chart'));
        dateChart.draw(dateData, dateOptions);
    }
</script>
<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>
<?php include '../PHP/footer.php'; ?>
</body>

</html>