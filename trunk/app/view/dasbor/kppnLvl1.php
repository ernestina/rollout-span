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
    var data_kanwil = <?php echo json_encode($this->data);?>; //console.log(data_kanwil);
    //var len_data = Object.keys(data_kanwil).length; 
    var label = new Array();
    var data_bar = new Array();
    for(var i in data_kanwil){
        var tmp = Math.ceil(data_kanwil[i].sum);
        label.push(data_kanwil[i].singkat_kanwil);
        data_bar.push(tmp);
    }
    console.log(label);
    console.log(data_bar);
    var data = {
    labels : label,
    datasets : [
        {
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,1)",
            data : data_bar
        }
    ]
}
    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(data);
	
</script>
