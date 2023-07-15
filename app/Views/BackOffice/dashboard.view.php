<div class="container">
    <h1><strong>Dashboard</strong></h1>
    <h2>Bienvenue sur le back office de votre site</h2>
    <br>

    <div class="element-row justify-content-space-between text-center container-100 py-4">
        <div class="">
            <div class="circle">
                <span class="number"><?php echo $userCount; ?></span>
                <p class="label" style="font-size: 22px;"><b>Comptes</b></p>
            </div>
        </div>
        <div class="">
            <div class="circle">
                <span class="number"><?php echo $categoryCount; ?></span>
                <p class="label" style="font-size: 22px;"><b>Catégories</b></p>
            </div>
        </div>
        <div class="">
            <div class="circle">
                <span class="number">189</span><!-- Changer les données brutes pour mettre la variable pour le nombre de previews -->
                <p class="label" style="font-size: 22px;"><b>Previews</b></p>
            </div>
        </div>
        <div class="">
            <div class="circle">
                <span class="number"><?php echo $allView; ?></span><!-- Changer les données brutes pour mettre la variable pour le nombre de vues -->
                <p class="label" style="font-size: 22px;"><b>Vues</b></p>
            </div>
        </div>
        <div class="">
            <div class="circle">
                <span class="number">985</span><!-- Changer les données brutes pour mettre la variable pour le nombre de commentaires -->
                <p class="label" style="font-size: 22px;"><b>Commentaires</b></p>
            </div>
        </div>
    </div>

    <div class="element-row justify-content-space-between text-center container-100">
        <div class="col-md-3">
            <div class="card" style="">
                <div class="card-body">
                    <h5 class="card-title"><b>Signalements</b></h5>
                    <p class="card-text"><span style="font-weight: bold; font-size: 45px;"><?php echo $reporting; ?></span></p>
                    <a href="#" class="card-link">Aller gérer les signalements -></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="">
                <div class="card-body">
                    <h5 class="card-title"><b>Commentaires à gérer</b></h5>
                    <p class="card-text"><span style="font-weight: bold; font-size: 45px;"><?php echo $checkComment; ?></span></p>
                    <a href="#" class="card-link">Aller gérer les commentaires -></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="">
                <div class="card-body">
                    <h5 class="card-title"><b>Tickets</b></h5>
                    <p class="card-text"><span style="font-weight: bold; font-size: 45px;">29</span></p>
                    <a href="#" class="card-link">Aller gérer les tickets -></a>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- Statistique affichage de graphique -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h4>Sélectionner l'année </h4>
            <select id="yearSelect" onchange="updateChart()">
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
            </select>

            <div>
                <span id="selectedYear" style="display: none;"></span>
            </div>

            <div id="chart_div"></div>
        </div>
    </div>

    <br>

    <!-- Statistique affichage de tableau -->
    <div class="row">
        <div class="col-sm-6">
            <h5>Top 10 des previews les plus vues</h5>
            <div id="table_div"></div>
        </div>
        <div class="col-sm-6">
            <h5>Top 10 des previews les plus commentés</h5>
            <div id="table_div2"></div>
        </div>
    </div>
</div>

<style>
    .circle {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 200px;
        height: 200px; 
        border-radius: 50%;
        background-color: white;
        margin-bottom: 10px;
    }

    .element-row{
            display:flex;
            justify-content: space-between;
    }

    .number {
        font-size: 40px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .label {
        font-size: 14px;
    }
</style>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', { 'packages': ['corechart', 'table'] });
    google.charts.setOnLoadCallback(drawCharts);
    google.charts.setOnLoadCallback(function() {
        drawCharts('2023'); // Utilisez l'année par défaut ici
    });



        function updateChart() {
            var yearSelect = document.getElementById('yearSelect');
            var selectedYear = yearSelect.value;

            var selectedYearElement = document.getElementById('selectedYear');
            selectedYearElement.innerHTML = 'Sélectionner l\'année : ' + selectedYear;

            drawCharts(selectedYear);
        }



        function drawCharts(year) {
            var data;

            // Sélectionnez les données en fonction de l'année
            if (year === '2023') {
                data = google.visualization.arrayToDataTable(<?php echo json_encode($chartData2023); ?>);
            } else if (year === '2022') {
                data = google.visualization.arrayToDataTable(<?php echo json_encode($chartData2022); ?>);
            } else if (year === '2021') {
                data = google.visualization.arrayToDataTable(<?php echo json_encode($chartData2021); ?>);
            }

            var options = {
                title: 'Créations d\'utilisateurs en ' + year, // Utilisez l'année sélectionnée dans le titre
                width: '100%',
                height: 400
            };

            // Dessinez le graphique avec les données et les options appropriées
            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            chart.draw(data, options);

            var rawData = <?php echo json_encode($bestPreviewsView); ?>;
            console.log(rawData);

            var dataArray = rawData.map(function(movie) {
                return [movie.movie_name, movie.id_user.toString(), movie.nb_vue];
            });

            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn('string', 'Film');
            dataTable.addColumn('string', 'Rédacteur');
            dataTable.addColumn('number', 'Nombre de vues');
            dataTable.addRows(dataArray);

            var table = new google.visualization.Table(document.getElementById('table_div'));
            table.draw(dataTable, { showRowNumber: true });


            var rawData2 = <?php echo json_encode($bestPreviewsComment); ?>;
        var dataTable2 = new google.visualization.DataTable();
        dataTable2.addColumn('string', 'Film');
        dataTable2.addColumn('string', 'Rédacteur');
        dataTable2.addColumn('number', 'Nombre de commentaires');
        dataTable2.addRows(rawData2);

        var table2 = new google.visualization.Table(document.getElementById('table_div2'));
        table2.draw(dataTable2, { showRowNumber: true });
    }
</script>
