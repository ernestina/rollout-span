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
        <div class="bg">
            <?php
            $ids = array();
            $ids2 = array();
            $ids3 = array();
            $ids4 = array();
            $tgl = array();
            foreach ($this->sp2d as $value) {
                $ids[] = ($value->get_kd_d_konversi_persen()<0)?0:$value->get_kd_d_konversi_persen();
                $ids2[] = ($value->get_kd_d_sp2d_persen()<0)?0:$value->get_kd_d_sp2d_persen();
                $ids3[] = ($value->get_kd_d_lhp_persen()<0)?0:$value->get_kd_d_lhp_persen();
                $ids4[] = ($value->get_kd_d_rekon_persen()<0)?0:$value->get_kd_d_rekon_persen();
                $originalDate = $value->get_kd_d_tgl();
                $newDate = date("d/m", strtotime($originalDate));
                $tgl[] = '"' . $newDate . '"';
            }
            ?>
            <canvas id="canvas" height="400" width="900"></canvas>
        </div>
        <ul class="inline">
            <li><div id="bundar" class="kuning"></div></li>
            <li><h3>Tren Konversi  &nbsp &nbsp </h3></li>
            <li><div id="bundar" class="birutua"></div></li>
            <li><h3>Tren SP2D &nbsp &nbsp </h3></li>
            <li><div id="bundar" class="ungu"></div></li>
            <li><h3>Tren LHP &nbsp &nbsp</h3></li>
            <li><div id="bundar" class="hijau"></div></li>
            <li><h3>Tren Rekon &nbsp &nbsp</h3></li>
        </ul>

    </body>
</html>

<script>
    val = new Array(<?php echo implode(',', $ids) ?>)
    val2 = new Array(<?php echo implode(',', $ids2) ?>)
    val3 = new Array(<?php echo implode(',', $ids3) ?>)
    val4 = new Array(<?php echo implode(',', $ids4) ?>)
    label = new Array(<?php echo implode(',', $tgl) ?>)
    var lineChartData = {
        labels: label,
        datasets: [
            {
                //kuning
                fillColor: "rgba(243,190,0,0)",
                strokeColor: "rgba(243,190,0,1)",
                pointColor: "rgba(243,190,0,1)",
                pointStrokeColor: "#fff",
                data: val
            },
            {
                //biru
                fillColor: "rgba(0,121,185,0)",
                strokeColor: "rgba(0,121,185,1)",
                pointColor: "rgba(0,121,185,1)",
                pointStrokeColor: "#fff",
                data: val2
            },
            {
                //ungu
                fillColor: "rgba(106,30,115,0)",
                strokeColor: "rgba(106,30,115,1)",
                pointColor: "rgba(106,30,115,1)",
                pointStrokeColor: "#fff",
                data: val3
            },
            {
                //hijau
                fillColor: "rgba(94,140,106,0)",
                strokeColor: "rgba(94,140,106,1)",
                pointColor: "rgba(94,140,106,1)",
                pointStrokeColor: "#fff",
                data: val4
            }
        ]

    }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

</script>
