<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
<style type="text/css">
BODY {
    width: 550PX;
}

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var type_name = [];
                    var type_count = [];

                    for (var i in data) {
                        type_name.push(data[i].lecturer_name);
                        type_count.push(data[i].project_count);
                    }

                    var chartdata = {
                        labels: type_name,
                        datasets: [{
    label: 'My First Dataset',
    data: type_count,
    backgroundColor: [
      'rgb(2, 99, 132)',
      'rgb(5, 162, 2)',
      'rgb(255, 25, 89)',
      'rgb(16, 80, 40)',
      'rgb(19, 100, 203)',
    ],
    hoverOffset: 4
  }]
};

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'pie',
                        data: chartdata
                    });
                });
            }
        }
        </script>

</body>
</html>