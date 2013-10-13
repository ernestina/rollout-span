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
        $tgl = array();
        foreach ($this->bobot as $bot) {
            $s = $bot->get_spm_ba() / 100;
            $r = $bot->get_rekon_ba() / 100;
            $k = $bot->get_kontrak_ba() / 100;
        }
        foreach ($this->dasbor as $value) {
            $persen = ceil(($value->get_kd_d_spm_persen() * $s + $value->get_kd_d_rekon_persen() * $r + $value->get_kd_d_kontrak_persen() * $k));
            $ids[] = $persen;
            $originalDate = $value->get_kd_d_tgl();
            $newDate = date("d/m", strtotime($originalDate));
            $tgl[] = '"' . $newDate . '"';
        }
        ?>
        <canvas id="canvas" height="400" width="900"></canvas>
    </body>
</html>

<script>
    val = new Array(<?php echo implode(',', $ids) ?>)
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
            }
        ]
			
    }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	
</script>
