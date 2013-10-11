<html>
    <head>
        <title>Line Chart</title>
        <meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
        <style>
            canvas{
            }
        </style>
    </head>
    <body>

        <?php
        $ids = array();
        $ids2 = array();
        $ids3 = array();
        $tgl = array();
        foreach ($this->dasbor as $value) {
            $ids[] = ceil(rand(90,100));
            $ids2[] = ceil(rand(90,100));
            $ids3[] = ceil(rand(90,100));
            $originalDate = $value->get_kd_d_tgl();
            $newDate = date("d/m/Y", strtotime($originalDate));
            $tgl[] = '"' . $newDate . '"';
        }
        ?>
        <canvas id="canvas" height="400" width="900"></canvas>
    </body>
</html>

<script>
    val = new Array(<?php echo implode(',', $ids) ?>)
    val2 = new Array(<?php echo implode(',', $ids2) ?>)
    val3 = new Array(<?php echo implode(',', $ids3) ?>)
    label = new Array(<?php echo implode(',', $tgl) ?>)
    var lineChartData = {
        labels : label,
        datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                data : val
            },
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                pointColor : "rgba(151,187,205,1)",
                pointStrokeColor : "#fff",
                data : val2
            },
            {
                fillColor : "rgba(100,100,100,0.5)",
                strokeColor : "rgba(100,100,100,1)",
                pointColor : "rgba(100,100,100,1)",
                pointStrokeColor : "#fff",
                data : val3
            }
        ]
			
    }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	
</script>
