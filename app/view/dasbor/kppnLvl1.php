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
        <canvas id="canvas" height="400" width="900"></canvas>
    </body>
</html>

<script>
    var data_kanwil = <?php echo json_encode($this->data); ?>; //console.log(data_kanwil);
    //var len_data = Object.keys(data_kanwil).length; 
    var label = new Array();
    var data_bar = new Array();
    var min = 100;
    for (var i in data_kanwil) {
        var tmp = Math.ceil(data_kanwil[i].sum);
        label.push(data_kanwil[i].singkat_kanwil);
        data_bar.push(tmp);
        if (tmp <= min) {
            min = tmp;
        }
    }
    var mod = min % 10;
    min -= mod;
    var step = (100 - min) / 10;
    //console.log(label);
    //console.log(data_bar);
    var data = {
        labels: label,
        datasets: [
            {
                fillColor: "rgba(243,190,0,0.3)",
                strokeColor: "rgba(243,190,0,1)",
                pointColor: "rgba(243,190,0,1)",
                pointStrokeColor: "#fff",
                data: data_bar
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
    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(data, options);

</script>
