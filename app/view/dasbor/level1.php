<!doctype html>
<?php
$sp2d = 0;
foreach ($this->data as $val) {
    $sp2d+=$val->get_kd_d_sp2d();
}
$sp2d = $sp2d." %";
?>

<div class="kolom1" id="g1" href="#">
    <input type="hidden" id="sp2d" value= "<?php echo $sp2d ?>">
</div>
<div class="kolom2">
    <center>
        <button><a href="<?php echo URL; ?>dataKppn/addDataKppnLvl3"><div id="g2"></div></a></button><br>
        <button><a href="<?php echo URL; ?>dataBa/addDataBa"><div id="g3"></div></a></button>
    </center>
</div>

<!--script-->

<script>
    var g1, g2, g3;
      
    window.onload = function(){
        var jum_sp2d = document.getElementById('sp2d').value;
        var g1 = new JustGage({
            id: "g1", 
            value: jum_sp2d,
            min: 0,
            max: 100,
            title: "Piloting SPAN",
            label: "% SUKSES"
        });
        
        var g2 = new JustGage({
            id: "g2", 
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            title: "KPPN",
            label: "% SUKSES"
        });
        
        var g3 = new JustGage({
            id: "g3", 
            value: getRandomInt(0, 100), 
            min: 0,
            max: 100,
            title: "Ba 999",
            label: "% SUKSES"
        });
      
        setInterval(function() {
            //g1.refresh(getRandomInt(50, 100));
            g2.refresh(getRandomInt(50, 100));          
            g3.refresh(getRandomInt(0, 50));
        }, 2500);
    };
</script>
