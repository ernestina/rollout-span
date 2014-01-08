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
        $min = 100;
        $no = 0;
        foreach ($this->bobot as $bot) {
            $k = $bot->get_konversi();
            $s = $bot->get_sp2d();
            $l = $bot->get_lhp();
            $r = $bot->get_rekon();
        }

        foreach ($this->data as $value) {
            $pembagi = DataKppn::getPembagi($value);
            $ids[] = '"' . ceil(($value->get_kd_d_konversi_persen() * $k + 
                    $value->get_kd_d_sp2d_persen() * $s + 
                    $value->get_kd_d_lhp_persen() * $l + 
                    $value->get_kd_d_rekon_persen() * $r)
                    /$pembagi) . '"';
            $tgl[] = '"' . $value->get_kd_d_kppn() . '"';
            if ((ceil(($value->get_kd_d_konversi_persen() * $k + 
                    $value->get_kd_d_sp2d_persen() * $s + 
                    $value->get_kd_d_lhp_persen() * $l + 
                    $value->get_kd_d_rekon_persen() * $r)
                    /$pembagi)) <= $min) {
                $min = floor(ceil(($value->get_kd_d_konversi_persen() * $k + 
                    $value->get_kd_d_sp2d_persen() * $s + 
                    $value->get_kd_d_lhp_persen() * $l + 
                    $value->get_kd_d_rekon_persen() * $r)
                    /$pembagi));
                $no++;
            }
        }
        $mod = $min % 10;
        $min = $min - $mod;
        $step = (100 - $min) / 10;
        ?>
        <canvas id="canvas" height="400" width="900"></canvas>
    </body>
</html>

<script>
    val = new Array(<?php echo implode(',', $ids) ?>)
    label = new Array(<?php echo implode(',', $tgl) ?>)
    var min = <?php echo $min; ?>;
    var step = <?php echo $step; ?>

    var lineChartData = {
        labels: label,
        datasets: [
            {
                fillColor: "rgba(243,190,0,0.3)",
                strokeColor: "rgba(243,190,0,1)",
                pointColor: "rgba(243,190,0,1)",
                pointStrokeColor: "#fff",
                data: val
            }
        ]
    }
    var options = {
        scaleOverride: true,
        // Number - The number of steps in a hard coded scale
        scaleSteps: step,
        // Number - The value jump in the hard coded scale
        scaleStepWidth: 10,
        // Number - The scale starting value
        scaleStartValue: min,
    }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData, options);

</script>
