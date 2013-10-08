<!doctype html>

                        <?php                        
						$sp2d= 0;
                        foreach ($this->data as $val) {   
                                                       
							$sp2d+=$val->get_kd_d_sp2d();
                        }
                        ?>
					
		<div class="kolom1" id="g1" href="#">
			<input type="hidden" id="sp2d" value= "<?php echo $sp2d ?>">
		</div>
	<div class="kolom2">
	<table width="100%" style="margin: 0px; padding: 0px">
		<tr>
			<td><div id="g2"></div></td>
			<td><div id="g3"></div></td>
			<td><div id="g4"></div></td>
			
		</tr>
		<tr>
			<td><div id="g5"></div></td>
			<td><div id="g6"></div></td>
			<td><div id="g7"></div></td>
			
		</tr>
		<tr>
			<td><div id="g8"></div></td>
			<td><div id="g9"></div></td>
		</tr>
	</table>
		
		
		
	</div>
	


    <!--script-->

    <script>
      var g1, g2, g3, g4, g5, g6, g7, g8, g9;
      
      window.onload = function(){
        var jum_sp2d = document.getElementById('sp2d').value;
		var g1 = new JustGage({
          id: "g1", 
          value: jum_sp2d,
          min: 0,
          max: 100,
          title: "Pilotting SPAN",
          label: "sukses"
        });
        
        var g2 = new JustGage({
          id: "g2", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "KPPN",
          label: "oz"
        });
        
        var g3 = new JustGage({
          id: "g3", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "Kanwil",
          label: "oz"
        });
        
        var g4 = new JustGage({
          id: "g4", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "BA999",
          label: "oz"
        });
		
		var g5 = new JustGage({
          id: "g5", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "PKN",
          label: "oz"
        });
		
		var g6 = new JustGage({
          id: "g6", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "Little Pal",
          label: "oz"
        });
		
		var g7 = new JustGage({
          id: "g7", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "APK",
          label: "oz"
        });
		
		var g8 = new JustGage({
          id: "g8", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "SMI",
          label: "oz"
        });
		
		var g9 = new JustGage({
          id: "g9", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "DJPU",
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
