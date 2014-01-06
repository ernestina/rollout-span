<!--fieldset><legend>Data</legend-->
    <div id="table-title"></div>
    <div id="table-content">
        <table class="table-bordered zebra" width= "95%">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2" width ="10%">Tanggal</th>
                    <th colspan="3" width ="20%">Konversi</th>
                    <th colspan="3" width ="20%">SP2D</th>
                    <th colspan="3" width ="20%">LHP</th>
                    <th colspan="3" width ="20%">Rekon</th>
                    <?php
                    if (Session::get('role') == KPPN) {
                        echo "<th rowspan='2' width ='10%'>Aksi</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <th width ="7%">Sukses</th>
                    <th width ="7%">Gagal</th>
                    <th width ="6%">%</th>
                    <th width ="7%">Sukses</th>
                    <th width ="7%">Gagal</th>
                    <th width ="6%">%</th>
                    <th width ="7%">Sukses</th>
                    <th width ="7%">Gagal</th>
                    <th width ="6%">%</th>
                    <th width ="7%">Sukses</th>
                    <th width ="7%">Gagal</th>
                    <th width ="6%">%</th>
                </tr>
            </thead>
            <tbody style="text-align: right">
                <?php
                $no = $this->mulai;
                foreach ($this->data as $val) {
                    //var_dump($val);
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td style='text-align: center'>" . $val->get_kd_d_tgl() . "</td>";
                    echo "<td>" . $val->get_kd_d_konversi() . "</td>";
                    echo "<td>" . $val->get_kd_d_konversi_gagal() . "</td>";
                    echo "<td><b>" . $val->get_kd_d_konversi_persen() . "%</b></td>";
                    echo "<td>" . $val->get_kd_d_sp2d() . "</td>";
                    echo "<td>" . $val->get_kd_d_sp2d_gagal() . "</td>";
                    echo "<td><b>" . $val->get_kd_d_sp2d_persen() . "%</td>";
                    echo "</b><td>" . $val->get_kd_d_lhp() . "</td>";
                    echo "<td>" . $val->get_kd_d_lhp_gagal() . "</td>";
                    echo "<td><b>" . $val->get_kd_d_lhp_persen() . "%</b></td>";
                    echo "<td>" . $val->get_kd_d_rekon() . "</td>";
                    echo "<td>" . $val->get_kd_d_rekon_gagal() . "</td>";
                    echo "<td><b>" . $val->get_kd_d_rekon_persen() . "%</b></td>";
                    if (Session::get('role') == KPPN) {
                        echo "<td style='text-align: center'><a href=" . URL . "dataKppn/delDataKppnLvl3/" . $val->get_kd_d_kppn() . " onclick=\"return del('" . $val->get_kd_d_tgl() . "')\"><i class=\"icon-trash\"></i></a>
									<a href=" . URL . "dataKppn/addDataKppnLvl3/" . $val->get_kd_d_kppn() . "#pModal><i class=\"icon-pencil\"></i></a></td>";
                    }
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
<!--/fieldset-->