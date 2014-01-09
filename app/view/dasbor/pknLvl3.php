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
        foreach ($this->dasbor as $value) {
            $persen = ceil(($value->get_kd_d_sp2d_persen() * $sp2d + $value->get_kd_d_spt_persen() * $spt));
            if($value->get_kd_d_sp2d_persen()<0){
                $persen = $value->get_kd_d_spt_persen();
            }elseif($value->get_kd_d_spt_persen()<0){
                $persen = $value->get_kd_d_sp2d_persen();
            }
            if($persen<0) $persen=0;
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

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

</script>
