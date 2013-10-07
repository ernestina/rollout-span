<!doctype html>

<html>
  <head>
    <title>Auto-adjust</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
      body {
        text-align: center;
      }
      
      #g1 {
        width:400px; height:320px;
        display: inline-block;
        margin: 1em;
      }
      
      #g2, #g3, #g4 {
        width:100px; height:80px;
        display: inline-block;
        margin: 1em;
      }
      
      p {
        display: block;
        width: 450px;
        margin: 2em auto;
        text-align: left;
      }
    </style>
    
	<!--php-->
	<?php


	?>
	</head>
  <body>    
    <div id="g1">
		<input type="hidden" id="sp2d" value= "<?php echo $this->data->get_kd_d_sp2d; ?>"></div>
	</div>
    <div id="g2"></div>
    <div id="g3"></div>
    <div id="g4"></div>
  </body>
	

	
    <script src="../../../gaugejs/raphael.2.1.0.min.js"></script>
    <script src="../../../gaugejs/justgage.1.0.1.min.js"></script>
    <script>
      var g1, g2, g3, g4;
      
      window.onload = function(){
        var jum_sp2d = document.getElementById('sp2d').value;
		var g1 = new JustGage({
          id: "g1", 
          value: jum_sp2d, 
          min: 0,
          max: 50,
          title: "SP2D",
          label: "lembar"
        });
        
        var g2 = new JustGage({
          id: "g2", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "Small Buddy",
          label: "oz"
        });
        
        var g3 = new JustGage({
          id: "g3", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "Tiny Lad",
          label: "oz"
        });
        
        var g4 = new JustGage({
          id: "g4", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "Little Pal",
          label: "oz"
        });
      
        setInterval(function() {
          //g1.refresh(getRandomInt(50, 100));
          g2.refresh(getRandomInt(50, 100));          
          g3.refresh(getRandomInt(0, 50));
          g4.refresh(getRandomInt(0, 50));
        }, 2500);
      };
    </script>

	
</html>
