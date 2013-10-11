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
        $tgl = array();
        $tgl2 = array();
        $no = 0;
        foreach ($this->bobot as $bot) {
            $k = $bot->get_konversi() / 100;
            $s = $bot->get_sp2d() / 100;
            $l = $bot->get_lhp() / 100;
            $r = $bot->get_rekon() / 100;
        }
        foreach ($this->dasbor as $value) {
            $unit = $value->get_kd_d_user();
            $persen = ceil(($value->get_kd_d_konversi_persen() * $k + $value->get_kd_d_sp2d_persen() * $s + $value->get_kd_d_lhp_persen() * $l + $value->get_kd_d_rekon_persen() * $r));
            if ($unit == 10002) {
                $ids[] = $persen;
            } elseif ($unit == 10006) {
                $ids2[] = $persen;
            }
            if ($value->get_kd_d_tgl() != $tgl2[$no]) {
                $originalDate = $value->get_kd_d_tgl();
                $newDate = date("d/m", strtotime($originalDate));
                $tgl[] = '"' . $newDate . '"';
                $no++;
                $tgl2[$no] = $value->get_kd_d_tgl();
            }
        }
        ?>
        <canvas id="canvas" height="400" width="900"></canvas>
    </body>
</html>

<script>
    val = new Array(<?php echo implode(',', $ids) ?>)
    val2 = new Array(<?php echo implode(',', $ids2) ?>)
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
            }
        ]
			
    }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	
</script>
