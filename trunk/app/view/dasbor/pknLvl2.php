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
            $sp2d = $bot->get_sp2d_pkn() / 100;
            $spt = $bot->get_spt_pkn() / 100;
        }
        foreach ($this->data as $value) {
            $persen = ceil(($value->get_kd_d_sp2d_persen() * $sp2d + $value->get_kd_d_spt_persen() * $spt));
            if($value->get_kd_d_sp2d_persen()<0){
                $persen = $value->get_kd_d_spt_persen();
            }elseif($value->get_kd_d_spt_persen()<0){
                $persen = $value->get_kd_d_sp2d_persen();
            }
            $ids[] = $persen;
            if ($value->get_kd_d_user()==88881){
                $tgl[] = '"RKN"';
            } elseif ($value->get_kd_d_user()==88882){
                $tgl[] = '"RKUN"';
            } elseif ($value->get_kd_d_user()==88883){
                $tgl[] = '"RPH"';
            }elseif ($value->get_kd_d_user()==88884){
                $tgl[] = '"RPL"';
            } else {
                $tgl[] = '"Subdit tidak terdaftar"';
            }
            
            
        }
        ?>
        <canvas id="canvas" height="400" width="900"></canvas>
    </body>
</html>

<script>
    val = new Array(<?php echo implode(',', $ids) ?>)
    label = new Array(<?php echo implode(',', $tgl) ?>)
    var lineChartData = {
        labels: label,
        datasets: [
            {
                fillColor: "rgba(0,121,185,0.3)",
                strokeColor: "rgba(0,121,185,1)",
                pointColor: "rgba(0,121,185,1)",
                pointStrokeColor: "#fff",
                data: val
            }
        ]

    }
	var options = {
        scaleOverride: true,
        // Number - The number of steps in a hard coded scale
        scaleSteps: 2,
        // Number - The value jump in the hard coded scale
        scaleStepWidth: 10,
        // Number - The scale starting value
        scaleStartValue: 80,
    }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData,options);

</script>
