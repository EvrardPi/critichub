<!-- Code HTML de la vue dashboard.php -->
<div id="chart_div"></div>
<div id="chart_div2"></div>
<p><?php echo $userCount; ?></p>
<p><?php echo $categoryCount; ?></p>
<p>15</p><!-- Changer les données brutes pour mettre la variable pour le nombre de preview  -->

<script>
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        var data1 = google.visualization.arrayToDataTable(<?php echo json_encode($chartData); ?>);
        var options1 = {
            title: 'Ventes mensuelles',
            width: 400,
            height: 300
        };
        var chart1 = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart1.draw(data1, options1);

        var data2 = google.visualization.arrayToDataTable(<?php echo json_encode($chartData2); ?>);
        var options2 = {
            title: 'Quantité par produit',
            width: 400,
            height: 300
        };
        var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);
    }
</script>
