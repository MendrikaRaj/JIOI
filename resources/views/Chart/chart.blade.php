<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <canvas id="sectorsChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var sectorsData = {!! json_encode($sectorsData) !!};
        var barData = {!! json_encode($barData) !!};

        var sectorsChart = new Chart(document.getElementById('sectorsChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: sectorsData.labels,
                datasets: [{
                    data: sectorsData.data,
                    backgroundColor: ['red', 'blue', 'green', 'yellow']
                }]
            }
        });

        var barChart = new Chart(document.getElementById('barChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: barData.labels,
                datasets: [{
                    data: barData.data,
                    backgroundColor: ['red', 'blue', 'green', 'yellow']
                }]
            }
        });
    </script>
</body>

</html>
