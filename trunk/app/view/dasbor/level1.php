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
        <button><a href="<?php echo URL; ?>dataKppn/viewDataKppnLvl2" target="_blank"><div id="g2"></div></a></button><br>
        <button><a href="<?php echo URL; ?>dataBa/addDataBa" target="_blank"><div id="g3"></div></a></button>
    </center>
</div>

<!--script-->

<script>
    var g1, g2, g3;
      
    window.onload = function(){
        var jum_sp2d = document.getElementById('sp2d').value;
        var g1 = new JustGage({
            id: "g1", 
            value: [73],
            min: 0,
            max: 100,
            title: "Piloting SPAN",
            label: "% SUKSES"
        });
        
        var g2 = new JustGage({
            id: "g2", 
            value: [90],
            min: 0,
            max: 100,
            title: "KPPN",
            label: "% SUKSES"
        });
        
        var g3 = new JustGage({
            id: "g3", 
            value: [66],
            min: 0,
            max: 100,
            title: "Ba 999",
            label: "% SUKSES"
        });
      
        setInterval(function() {
            //g1.refresh(getRandomInt(50, 100));
        }, 2500);
    };
</script>
