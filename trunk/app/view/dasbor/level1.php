<!doctype html>
<?php
$sp2d = 0;
foreach ($this->data as $val) {
    $sp2d+=$val->get_kd_d_sp2d();
}
$ids1=ceil(rand(0, 100));
$ids2=ceil(rand(0, 100));
$ids0=($ids1+$ids2)/2;
?>

<div class="kolom1" id="g1" href="#">
    <input type="hidden" id="sp2d" value= "<?php echo $ids0?>">
    <input type="hidden" id="ids1" value= "<?php echo $ids1?>">
    <input type="hidden" id="ids2" value= "<?php echo $ids2?>">
</div>
<div class="kolom2">
    <center>
        <button><a href="<?php echo URL . 'dataKppn/addDataKppnLvl3' ?>"><div id="g2" ></div></a></button><br>
        <button><a href="<?php echo URL . 'dataBa/addDataBa' ?>"><div id="g3"></div></a></button>
    </center>
</div>

<!--script-->

<script>
    var g1, g2, g3;
      
    window.onload = function(){
        var jum_sp2d = document.getElementById('sp2d').value;
        var ids1 = document.getElementById('ids1').value;
        var ids2 = document.getElementById('ids2').value;
        var g1 = new JustGage({
            id: "g1", 
            value: jum_sp2d,
            min: 0,
            max: 100,
            title: "Piloting SPAN",
            label: "sukses"
        });
        
        var g2 = new JustGage({
            id: "g2", 
            value: ids1, 
            min: 0,
            max: 100,
            title: "KPPN",
            label: "oz"
        });
        
        var g3 = new JustGage({
            id: "g3", 
            value: ids2, 
            min: 0,
            max: 100,
            title: "BA 999",
            label: "oz"
        });
      
        setInterval(function() {
            //g1.refresh(getRandomInt(50, 100));
            g2.refresh(getRandomInt(50, 100));          
            g3.refresh(getRandomInt(0, 50));
        }, 2500);
    };
</script>
