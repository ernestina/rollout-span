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
        $len_data = count($this->dasbor);
        if($len_data<=60){
            $from = 0;
        }else{
            $from = $len_data-60;
        }
        $dasbor_ba = array_slice($this->dasbor,$from);
        $ids = array();
        $tgl = array();
        foreach ($this->bobot as $bot) {
            $s = $bot->get_spm_ba();
            $r = $bot->get_rekon_ba();
            $k = $bot->get_kontrak_ba();
        }
        foreach ($dasbor_ba as $value) {
            $pembagi = DataBa::getPembagi($value);
            $persen = ceil(($value->get_kd_d_spm_persen() * $s + 
                    $value->get_kd_d_rekon_persen() * $r + 
                    $value->get_kd_d_kontrak_persen() * $k)
                    /$pembagi);
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
