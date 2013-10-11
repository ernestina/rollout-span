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
        foreach ($this->data as $value) {
            $ids[] = $value->get_kd_d_sp2d_persen();
            $ids2[] = $value->get_kd_d_lhp_persen();
            $ids3[] = $value->get_kd_d_rekon_persen();
            $originalDate = $value->get_kd_d_tgl();
            $newDate = date("d/m", strtotime($originalDate));
            $tgl[] = '"' . $newDate . '"';
        }
        ?>
        <canvas id="canvas" height="400" width="900"></canvas>
        <ul class="inline">
            <li><div id="bundar" class="ungu"></div></li>
            <li><h3>Tren SP2D  &nbsp &nbsp </h3></li>
            <li><div id="bundar" class="kuning"></div></li>
            <li><h3>Tren LHP &nbsp &nbsp </h3></li>
            <li><div id="bundar" class="birutua"></div></li>
            <li><h3>Tren Rekon &nbsp &nbsp</h3></li>
        </ul>
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
                //kuning
                fillColor : "rgba(243,190,0,0.3)",
                strokeColor : "rgba(243,190,0,1)",
                pointColor : "rgba(243,190,0,1)",
                pointStrokeColor : "#fff",
                data : val
            },
            {
                //biru
                fillColor : "rgba(0,121,185,0.3)",
                strokeColor : "rgba(0,121,185,1)",
                pointColor : "rgba(0,121,185,1)",
                pointStrokeColor : "#fff",
                data : val2
            },
            {
                //ungu
                fillColor : "rgba(106,30,115,0.3)",
                strokeColor : "rgba(106,30,115,1)",
                pointColor : "rgba(106,30,115,1)",
                pointStrokeColor : "#fff",
                data : val3
            }
        ]
			
    }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	
</script>
