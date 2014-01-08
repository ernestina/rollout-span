<div id="top">
    <h2>MONITORING KPPN DI KANWIL 
        <?php
        foreach ($this->data as $val) {
            $kanwil = $val->get_kd_d_kanwil();
        }
        echo $kanwil;
        ?></h2>
<?php $this->load('dasbor/kppnLvl2') ?></center>
<div id="gambar"></div>
<div class="fitur" id="table">
    <fieldset><legend>Data KPPN </legend>
        <div id="table-title"></div>
        <div id="table-content">
            <table class="table-bordered zebra" style="text-align: center">
                <thead>
                <th width="5%">No</th>
                <th width="10%">KPPN</th>
                <th width="10%">Konversi Sukses</th>
                <th width="10%">SP2D Sukses</th>
                <th width="10%">LHP Sukses</th>
                <th width="10%">Rekon Sukses</th>
                <th width="10%">Total/Bobot</th>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $k = 0;
                    $s = 0;
                    $l = 0;
                    $r = 0;
                    foreach ($this->bobot as $bot) {
                        $k = $bot->get_konversi();
                        $s = $bot->get_sp2d();
                        $l = $bot->get_lhp();
                        $r = $bot->get_rekon();
                    }
                    foreach ($this->data as $val) {
                        $pembagi = DataKppn::getPembagi($val);
                        $konversi = ($val->get_kd_d_konversi_persen()<0)?"-":$val->get_kd_d_konversi_persen()."%";
                        $sp2d = ($val->get_kd_d_sp2d_persen()<0)?"-":$val->get_kd_d_sp2d_persen()."%";
                        $lhp = ($val->get_kd_d_lhp_persen()<0)?"-":"%";
                        $rekon = ($val->get_kd_d_rekon_persen()<0)?"-":"%";
                        $total = ceil(($val->get_kd_d_konversi_persen() * $k + $val->get_kd_d_sp2d_persen() * $s + $val->get_kd_d_lhp_persen() * $l + $val->get_kd_d_rekon_persen() * $r)/$pembagi); 
                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td style=\"text-align: left\"><a href=" . URL . "dataKppn/viewDataKppnLvl3/" . $val->get_kd_d_user() . " target=_blank>" . $val->get_kd_d_kppn() . "</td>";
                        echo "<td>" . $konversi . "%</td>";
                        echo "<td>" . $sp2d . "%</td>";
                        echo "<td>" . $lhp . "%</td>";
                        echo "<td>" . $rekon . "%</td>";
                        echo "<td>" . $total . "%</td>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
</div>
</div>