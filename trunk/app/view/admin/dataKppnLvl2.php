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
                <!--<th width="5%">No</th>
                <th width="10%">KPPN</th>
                <th width="10%">Konversi Sukses</th>
                <th width="10%">Supplier Sukses</th>
                <th width="10%">SP2D Sukses</th>
                <th width="10%">LHP Sukses</th>
                <th width="10%">Rekon Sukses</th>
                <th width="10%">Total/Bobot</th>-->
                <tr>
                    <th rowspan="2" width ="3%">No</th>
                    <th rowspan="2" width ="15%">KPPN</th>
                    <th colspan="3" width ="15%">Konversi</th>
                    <th colspan="3" width ="15%">Supplier</th>
                    <th colspan="3" width ="15%">SP2D</th>
                    <th colspan="3" width ="15%">LHP</th>
                    <th colspan="3" width ="15%">Rekon</th>
                    <th rowspan="2" width="7%">Total/<br>Bobot</th>
                </tr>
                <tr>
                    <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                    <th width ="5%"><i class="icon-remove" title='gagal'></th>
                    <th width ="5%">%</th>
                    <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                    <th width ="5%"><i class="icon-remove" title='gagal'></th>
                    <th width ="5%">%</th>
                    <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                    <th width ="5%"><i class="icon-remove" title='gagal'></th>
                    <th width ="5%">%</th>
                    <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                    <th width ="5%"><i class="icon-remove" title='gagal'></th>
                    <th width ="5%">%</th>
                    <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                    <th width ="5%"><i class="icon-remove" title='gagal'></th>
                    <th width ="5%">%</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $k = 0;
                    $p = 0;
                    $s = 0;
                    $l = 0;
                    $r = 0;
                    $t_konversi = 0;
                    $t_konversi_gagal = 0;
                    $t_supplier = 0;
                    $t_supplier_gagal = 0;
                    $t_sp2d = 0;
                    $t_sp2d_gagal = 0;
                    $t_lhp = 0;
                    $t_lhp_gagal = 0;
                    $t_rekon = 0;
                    $t_rekon_gagal = 0;
                    foreach ($this->bobot as $bot) {
                        $k = $bot->get_konversi();
                        $p = $bot->get_supplier();
                        $s = $bot->get_sp2d();
                        $l = $bot->get_lhp();
                        $r = $bot->get_rekon();
                    }
                    foreach ($this->data as $val) {
                        $t_konversi += $val->get_kd_d_konversi();
                        $t_konversi_gagal += $val->get_kd_d_konversi_gagal();
                        $t_supplier += $val->get_kd_d_supplier();
                        $t_supplier_gagal += $val->get_kd_d_supplier_gagal();
                        $t_sp2d += $val->get_kd_d_sp2d();
                        $t_sp2d_gagal += $val->get_kd_d_sp2d_gagal();
                        $t_lhp += $val->get_kd_d_lhp();
                        $t_lhp_gagal += $val->get_kd_d_lhp_gagal();
                        $t_rekon += $val->get_kd_d_rekon();
                        $t_rekon_gagal += $val->get_kd_d_rekon_gagal();
                        $pembagi = DataKppn::getPembagi($val);
                        $konversi = ($val->get_kd_d_konversi_persen()<0)?"-":$val->get_kd_d_konversi_persen()."%";
                        $supplier = ($val->get_kd_d_supplier_persen()<0)?"-":$val->get_kd_d_supplier_persen()."%";
                        $sp2d = ($val->get_kd_d_sp2d_persen()<0)?"-":$val->get_kd_d_sp2d_persen()."%";
                        $lhp = ($val->get_kd_d_lhp_persen()<0)?"-":$val->get_kd_d_lhp_persen()."%";
                        $rekon = ($val->get_kd_d_rekon_persen()<0)?"-":$val->get_kd_d_rekon_persen()."%";
                        //$total = ceil(($val->get_kd_d_konversi_persen() * $k + $val->get_kd_d_supplier_persen() * $p +$val->get_kd_d_sp2d_persen() * $s + $val->get_kd_d_lhp_persen() * $l + $val->get_kd_d_rekon_persen() * $r)/$pembagi); 
                        $total = ceil($val->total);
                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td style=\"text-align: left\"><a href=" . URL . "dataKppn/viewDataKppnLvl3/" . $val->get_kd_d_user() . " target=_blank>" . $val->get_kd_d_kppn() . "</td>";
                        echo "<td>".$val->get_kd_d_konversi()."</td>";
                        echo "<td>".$val->get_kd_d_konversi_gagal()."</td>";
                        echo "<td>" . $konversi . "</td>";
                        echo "<td>".$val->get_kd_d_supplier()."</td>";
                        echo "<td>".$val->get_kd_d_supplier_gagal()."</td>";
                        echo "<td>" . $supplier . "</td>";
                        echo "<td>".$val->get_kd_d_sp2d()."</td>";
                        echo "<td>".$val->get_kd_d_sp2d_gagal()."</td>";
                        echo "<td>" . $sp2d . "</td>";
                        echo "<td>".$val->get_kd_d_lhp()."</td>";
                        echo "<td>".$val->get_kd_d_lhp_gagal()."</td>";
                        echo "<td>" . $lhp . "</td>";
                        echo "<td>".$val->get_kd_d_rekon()."</td>";
                        echo "<td>".$val->get_kd_d_rekon_gagal()."</td>";
                        echo "<td>" . $rekon . "</td>";
                        echo "<td>" . $total . "%</td>";
                        echo "</tr>";
                        $no++;
                    }
                    echo "<tr style='font-weight:bold; border-top: 1px solid #D6D6C2'>";
                    echo "<td></td><td style='text-align:left'>Total</td><td>".$t_konversi."</td><td>".$t_konversi_gagal."</td><td></td>";
                    echo "<td>".$t_supplier."</td><td>".$t_supplier_gagal."</td><td></td>";
                    echo "<td>".$t_sp2d."</td><td>".$t_sp2d_gagal."</td><td></td>";
                    echo "<td>".$t_lhp."</td><td>".$t_lhp_gagal."</td><td></td>";
                    echo "<td>".$t_rekon."</td><td>".$t_rekon_gagal."</td><td colspan=2></td></tr>";
                    ?>
                </tbody>
            </table>
        </div>
</div>
</div>