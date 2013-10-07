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
      kfnvkdnfvkjndfkjnvdkfjnv
      <div class="kolom4" id="table">
        <fieldset><legend>Data KPPN</legend>
            <div id="table-title"></div>
            <div id="table-content">
                <table class="table-bordered zebra scroll">
                    <thead>
                    <th>No</th>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Konversi</th>
                    <th>NRS</th>
                    <th>NRK</th>
                    <th>SPM</th>
                    <th>SP2D</th>
                    <th>LHP</th>
                    <th>Rekon</th>
                    <th>Bank Persepsi</th>
                    <th>Konvirmasi Penerimaan</th>
                    <th>Koreksi penerimaan</th>
                    <th>Infrastuktur</th>
                    <th>Jaringan</th>
                    <th>Masalah</th>
                    <th width="50">Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($this->data as $val) {
                            //var_dump($val);
                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>" . $val->get_kd_d_user() . "</td>";
                            echo "<td>" . $val->get_kd_d_tgl() . "</td>";
                            echo "<td>" . $val->get_kd_d_konversi() . "</td>";
                            echo "<td>" . $val->get_kd_d_nrs() . "</td>";
                            echo "<td>" . $val->get_kd_d_nrk() . "</td>";
                            echo "<td>" . $val->get_kd_d_spm() . "</td>";
                            echo "<td>" . $val->get_kd_d_sp2d() . "</td>";
                            echo "<td>" . $val->get_kd_d_lhp() . "</td>";
                            echo "<td>" . $val->get_kd_d_rekon() . "</td>";
                            echo "<td>" . $val->get_kd_d_persepsi() . "</td>";
                            echo "<td>" . $val->get_kd_d_terimaan() . "</td>";
                            echo "<td>" . $val->get_kd_d_koreksi() . "</td>";
                            echo "<td>" . $val->get_kd_d_infrastruktur() . "</td>";
                            echo "<td>" . $val->get_kd_d_jaringan() . "</td>";
                            echo "<td>" . $val->get_kd_d_masalah() . "</td>";
                            echo "<td><a href=" . URL . "dataKppn/delDataKppn/" . $val->get_kd_d_kppn() . " onclick=\"return del('" . $val->get_kd_d_user() . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataKppn/addDataKppn/" . $val->get_kd_d_kppn() . "><i class=\"icon-pencil\"></i></a></td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
    <div id="g1">
		<input type="hidden" id="sp2d" value= "22"></div>
	</div>
    <div id="g2"></div>
    <div id="g3"></div>
    <div id="g4"></div>
  </body>
	

	
    <script src="../../public/js/gaugejs/raphael.2.1.0.min.js"></script>
    <script src="../../js/gaugejs/justgage.1.0.1.min.js"></script>
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
