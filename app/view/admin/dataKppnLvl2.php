<div id="top">
    <h2>MONITORING KPPN </h2>
    <center><?php $this->load('dasbor/kppnLvl2') ?></center>
    <div id="gambar"></div>
    <div class="fitur" id="table">
        <fieldset><legend>Data KPPN </legend>
            <div id="table-title"></div>
            <div id="table-content">
                <table class="table-bordered zebra scroll" style="text-align: center">
                    <thead style="font-size:80%">
                    <th width="5%">No</th>
                    <th width="10%">Unit</th>
                    <th width="10%">Tanggal</th>
                    <th width="10%">Persentase Konversi Sukses</th>
                    <th width="10%">Persentase SP2D Sukses</th>
                    <th width="10%">Persentase LHP Sukses</th>
                    <th width="10%">Persentase Rekon Sukses</th>
                    <th width="10%">Persentase Total/Bobot</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $k=0;
                        $s=0;
                        $l=0;
                        $r=0;
                        foreach ($this->bobot as $bot) {
                            $k=$bot->get_konversi()/100;
                            $s=$bot->get_sp2d()/100;
                            $l=$bot->get_lhp()/100;
                            $r=$bot->get_rekon()/100;
                        }
                        foreach ($this->data as $val) {
                            //var_dump($val);
                            echo "<tr>";
                            echo "<td>$no</td>";
                            $unit1=$val->get_kd_d_user();
                            if ($unit1==10002) {
                            echo "<td style=\"text-align: left\">KPPN JAKARTA II</td>";
                            } else if ($unit1==10006) {
                                echo "<td style=\"text-align: left\">KPPN JAKARTA VI</td>";
                            }
                            echo "<td>" . $val->get_kd_d_tgl() . "</td>";
                            echo "<td>" . $val->get_kd_d_konversi_persen() . "%</td>";
                            echo "<td>" . $val->get_kd_d_sp2d_persen() . "%</td>";
                            echo "<td>" . $val->get_kd_d_lhp_persen() . "%</td>";
                            echo "<td>" . $val->get_kd_d_rekon_persen() . "%</td>";
                            echo "<td>" . ceil(($val->get_kd_d_konversi_persen()*$k+$val->get_kd_d_sp2d_persen()*$s+$val->get_kd_d_lhp_persen()*$l+$val->get_kd_d_rekon_persen()*$r)) . "%</td>";
//                            echo "<td>" . $val->get_kd_d_konversi_persen()+$val->get_kd_d_sp2d_persen()+$val->get_kd_d_lhp_persen()+$val->get_kd_d_rekon_persen() . "%</td>";
							/*
                            echo "<td><a href=" . URL . "dataKppn/delDataKppn/" . $val->get_kd_d_kppn() . " onclick=\"return del('" . $val->get_kd_d_user() . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataKppn/addDataKppn/" . $val->get_kd_d_kppn() . "><i class=\"icon-pencil\"></i></a></td>";
                            echo "</tr>";
							*/
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>