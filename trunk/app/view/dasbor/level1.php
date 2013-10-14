<!doctype html>
<?php
$nilai_kppn2 = 0;
$nilai_kppn6 = 0;
$nilai_kppn = 0;
$nilai_ba1 = 0;
$nilai_ba = 0;
$nilai_pkn1 = 0;
$nilai_pkn = 0;
$nilai_total=0;

$bobot_kppn = 0;
$bobot_ba = 0;
$bobot_pkn = 0;
$bobot_konversi = 0;
$bobot_sp2d = 0;
$bobot_lhp = 0;
$bobot_rekon = 0;
$bobot_spm_ba = 0;
$bobot_rekon_ba = 0;
$bobot_kontrak_ba = 0;
$bobot_sp2d_pkn = 0;
$bobot_spt_pkn = 0;

foreach ($this->bobot as $bot) {
    $bobot_kppn = $bot->get_kppn() / 100;
    $bobot_ba = $bot->get_ba() / 100;
    $bobot_pkn = $bot->get_pkn() / 100;
    $bobot_konversi = $bot->get_konversi() / 100;
    $bobot_sp2d = $bot->get_sp2d() / 100;
    $bobot_lhp = $bot->get_lhp() / 100;
    $bobot_rekon = $bot->get_rekon() / 100;
    $bobot_spm_ba = $bot->get_spm_ba() / 100;
    $bobot_rekon_ba = $bot->get_rekon_ba() / 100;
    $bobot_kontrak_ba = $bot->get_kontrak_ba() / 100;
    $bobot_sp2d_pkn = $bot->get_sp2d_pkn() / 100;
    $bobot_spt_pkn = $bot->get_spt_pkn() / 100;
}

$nokppn2 = 0;
$nokppn6 = 0;
foreach ($this->kppn as $valkppn) {
    $unit = $valkppn->get_kd_d_user();
    $persen = ceil(($valkppn->get_kd_d_konversi_persen() * $bobot_konversi + $valkppn->get_kd_d_sp2d_persen() * $bobot_sp2d + $valkppn->get_kd_d_lhp_persen() * $bobot_lhp + $valkppn->get_kd_d_rekon_persen() * $bobot_rekon));
    if ($unit == 10002) {
        $nilai_kppn2 += $persen;
        $nokppn2++;
    } elseif ($unit == 10006) {
        $nilai_kppn6 += $persen;
        $nokppn6++;
    }
}
$nilai_kppn = ceil(($nilai_kppn2 / $nokppn2 + $nilai_kppn6 / $nokppn6) / 2);

$noba = 0;
foreach ($this->ba as $valba) {
    $persen = ceil(($valba->get_kd_d_spm_persen() * $bobot_spm_ba + $valba->get_kd_d_rekon_persen() * $bobot_rekon_ba + $valba->get_kd_d_kontrak_persen() * $bobot_kontrak_ba));
    $nilai_ba1 += $persen;
    $noba++;
}
$nilai_ba = ceil($nilai_ba1 / $noba);

$nopkn = 0;
foreach ($this->pkn as $valpkn) {
    $persen = ceil(($valpkn->get_kd_d_sp2d_persen() * $bobot_sp2d_pkn + $valpkn->get_kd_d_spt_persen() * $bobot_spt_pkn));
    $nilai_pkn1 += $persen;
    $nopkn++;
}
$nilai_pkn = ceil($nilai_pkn1 / $nopkn);

$nilai_total=ceil($nilai_kppn*$bobot_kppn+$nilai_ba*$bobot_ba+$nilai_pkn*$bobot_pkn) ;
?>

<div class="kolom1" id="g1" href="#">
    <input type="hidden" id="nilai_kppn" value= "<?php echo $nilai_kppn ?>">
    <input type="hidden" id="nilai_ba" value= "<?php echo $nilai_ba ?>">
    <input type="hidden" id="nilai_pkn" value= "<?php echo $nilai_pkn ?>">
    <input type="hidden" id="nilai_total" value= "<?php echo $nilai_total ?>">
</div>
<div class="kolom2">
    <center>
        <button><a href="<?php echo URL; ?>dataKppn/viewDataKppnLvl2" target="_blank"><div id="g2"></div></a></button><br></br>
        <button><a href="<?php echo URL; ?>dataBa/addDataBa" target="_blank"><div id="g3"></div></a></button><br></br>
        <button><a href="<?php echo URL; ?>dataPkn/addDataPkn" target="_blank"><div id="g4"></div></a></button>
    </center>
</div>


<!--script-->

<script>
    var g1, g2, g3, g4;
      
    window.onload = function(){
        var nilai_kppn = document.getElementById('nilai_kppn').value;
        var nilai_ba = document.getElementById('nilai_ba').value;
        var nilai_pkn = document.getElementById('nilai_pkn').value;
        var nilai_total = document.getElementById('nilai_total').value;
        
        var g1 = new JustGage({
            id: "g1", 
            value: nilai_total,
            min: 0,
            max: 100,
            title: "Piloting SPAN",
            label: "% SUKSES"
        });
        
        var g2 = new JustGage({
            id: "g2", 
            value: nilai_kppn,
            min: 0,
            max: 100,
            title: "KPPN",
            label: "% SUKSES"
        });
        
        var g3 = new JustGage({
            id: "g3", 
            value: nilai_ba,
            min: 0,
            max: 100,
            title: "BA 999",
            label: "% SUKSES"
        });
        
        var g4 = new JustGage({
            id: "g4", 
            value: nilai_pkn,
            min: 0,
            max: 100,
            title: "PKN",
            label: "% SUKSES"
        });
      
        setInterval(function() {
        }, 2500);
    };
</script>
