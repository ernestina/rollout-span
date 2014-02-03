<div id="top">
    <h2>MONITORING KPPN PER KANWIL</h2>
    <center><?php $this->load('dasbor/kppnLvl1') ?></center>
    <div id="gambar"></div>
    <div class="fitur" id="table">
        <fieldset><legend>Data KANWIL </legend>
            <div id="table-title"></div>
            <div id="table-content">
                <table class="table-bordered zebra scroll" style="text-align: center">
                    <thead>
                    <th width="5%">No</th>
                    <th width="10%">KANWIL</th>
                    <!--<th width="10%">Tanggal</th>-->
                    <th width="10%">Konversi Sukses</th>
                    <th width="10%">Supplier Sukses</th>
                    <th width="10%">SP2D Sukses</th>
                    <th width="10%">LHP Sukses</th>
                    <th width="10%">Rekon Sukses</th>
                    <th width="10%">Total/Bobot</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $k = 0;
                        $p = 0;
                        $s = 0;
                        $l = 0;
                        $r = 0;
                        foreach ($this->bobot as $bot) {
                            $k = $bot->get_konversi() / 100;
                            $p = $bot->get_supplier() / 100;
                            $s = $bot->get_sp2d() / 100;
                            $l = $bot->get_lhp() / 100;
                            $r = $bot->get_rekon() / 100;
                        }
                        foreach ($this->data as $val) {
                            $konversi = ($val->get_kd_d_konversi_persen()<=0)?"-":$val->get_kd_d_konversi_persen()."%";
                            $supplier = ($val->get_kd_d_supplier_persen()<=0)?"-":$val->get_kd_d_supplier_persen()."%";
                            $sp2d = ($val->get_kd_d_sp2d_persen()<=0)?"-":$val->get_kd_d_sp2d_persen()."%";
                            $lhp = ($val->get_kd_d_lhp_persen()<=0)?"-":$val->get_kd_d_lhp_persen()."%";
                            $rekon = ($val->get_kd_d_rekon_persen()<=0)?"-":$val->get_kd_d_rekon_persen()."%";
                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td style=\"text-align: left\"><a href=" . URL . "dataKppn/viewDataKppnLvl2/" . $val->get_kd_d_user() . " target=_blank>" . $val->get_kd_d_kppn() . "</a></td>";
                            echo "<td>" . $konversi . "</td>";
                            echo "<td>" . $supplier . "</td>";
                            echo "<td>" . $sp2d . "</td>";
                            echo "<td>" . $lhp . "</td>";
                            echo "<td>" . $rekon . "</td>";
                            echo "<td><b>" . ceil(($val->get_kd_d_konversi_persen() * $k + $val->get_kd_d_supplier_persen() * $p +$val->get_kd_d_sp2d_persen() * $s + $val->get_kd_d_lhp_persen() * $l + $val->get_kd_d_rekon_persen() * $r)) . "%</b></td>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>