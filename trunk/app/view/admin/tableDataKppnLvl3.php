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
                    //if (Session::get('role') == KPPN) {
                        echo "<th rowspan='2' width ='10%'>Aksi</th>";
                    //}
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
                    $kd_d_konversi = ($val->get_kd_d_konversi()==0)?"-":$val->get_kd_d_konversi();
                    $kd_d_konversi_gagal = ($val->get_kd_d_konversi_gagal()==0)?"-":$val->get_kd_d_konversi_gagal();
                    $kd_d_konversi_persen = ($val->get_kd_d_konversi_persen()<0)?"-":$val->get_kd_d_konversi_persen()."%";
                    $kd_d_sp2d = ($val->get_kd_d_sp2d()==0)?"-":$val->get_kd_d_sp2d();
                    $kd_d_sp2d_gagal = ($val->get_kd_d_sp2d_gagal()==0)?"-":$val->get_kd_d_sp2d_gagal();
                    $kd_d_sp2d_persen = ($val->get_kd_d_sp2d_persen()<0)?"-":$val->get_kd_d_sp2d_persen()."%";
                    $kd_d_lhp = ($val->get_kd_d_lhp()==0)?"-":$val->get_kd_d_lhp();
                    $kd_d_lhp_gagal = ($val->get_kd_d_lhp_gagal()==0)?"-":$val->get_kd_d_lhp_gagal();
                    $kd_d_lhp_persen = ($val->get_kd_d_lhp_persen()<0)?"-":$val->get_kd_d_lhp_persen()."%";
                    $kd_d_rekon = ($val->get_kd_d_rekon()==0)?"-":$val->get_kd_d_rekon();
                    $kd_d_rekon_gagal = ($val->get_kd_d_rekon_gagal()==0)?"-":$val->get_kd_d_rekon_gagal();
                    $kd_d_rekon_persen = ($val->get_kd_d_rekon_persen()<0)?"-":$val->get_kd_d_rekon_persen()."%";
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td style='text-align: center'>" . $val->get_kd_d_tgl() . "</td>";
                    echo "<td>" . $kd_d_konversi . "</td>";
                    echo "<td>" . $kd_d_konversi_gagal . "</td>";
                    echo "<td><b>" . $kd_d_konversi_persen . "</b></td>";
                    echo "<td>" . $kd_d_sp2d . "</td>";
                    echo "<td>" . $kd_d_sp2d_gagal . "</td>";
                    echo "<td><b>" . $kd_d_sp2d_persen . "</td>";
                    echo "</b><td>" . $kd_d_lhp . "</td>";
                    echo "<td>" . $kd_d_lhp_gagal . "</td>";
                    echo "<td><b>" . $kd_d_lhp_persen . "</b></td>";
                    echo "<td>" . $kd_d_rekon . "</td>";
                    echo "<td>" . $kd_d_rekon_gagal . "</td>";
                    echo "<td><b>" . $kd_d_rekon_persen . "</b></td>";
                    if (Session::get('role') == KPPN) {
                        echo "<td style='text-align: center'><a href=" . URL . "dataKppn/delDataKppnLvl3/" . $val->get_kd_d_kppn() . " onclick=\"return del('" . $val->get_kd_d_tgl() . "')\" title='hapus data'><i class=\"icon-trash\"></i></a>
									<a href=" . URL . "dataKppn/addDataKppnLvl3/" . $val->get_kd_d_kppn() . "#pModal><i class=\"icon-pencil\" title='ubah data'></i></a>
                                    <a href=" . URL . "dataKppn/addDataKppnLvl3/" . $val->get_kd_d_kppn() . "#uplModal ><i class=\"icon-upload\" title='upload file'></i></a>
                                    <a href=" . URL . "dataMasalah/addDataMasalah/".$val->get_kd_d_kppn()."/1#oModal><i class=\"icon-eye-close\" title='input masalah'></i></a></td>";
                    }
                    if(Session::get('role') == ADMIN){
                        echo "<td style='text-align: center'><a onclick='viewFile(\"".$val->get_file()."\")'><i class=\"icon-search\" title='lihat file'></i></a>
                                <a onclick='viewMasalah(\"".$val->get_kd_d_kppn()."\")'><i class=\"icon-eye-close\" title='lihat file'></i></a></td>";
                    }
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
<!--/fieldset-->