<!--fieldset-->
    <div id="table-title"></div>
    <div id="table-content">
        <table class="table-bordered zebra">
            <thead>
                <tr>
                    <th rowspan="2" width="5%">No</th>
                    <th rowspan="2" width="5%">Tanggal</th>
                    <th rowspan="2" width="10%">Satker</th>
                    <th colspan="3" width="25%">SPM</th>
                    <th colspan="3" width="25%">Rekon</th>
                    <th colspan="3" width="25%">Kontrak</th>
                    <?php
                    if (Session::get('role') == BA999) {
                        echo "<th rowspan='2' width='10%'>Aksi</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <th width="7%" >Sukses</th>
                    <th width="7%">Gagal</th>
                    <th width="6%">%</th>
                    <th width="7%">Sukses</th>
                    <th width="7%">Gagal</th>
                    <th width="6%">%</th>
                    <th width="7%">Sukses</th>
                    <th width="7%">Gagal</th>
                    <th width="6%">%</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = $this->mulai;
                foreach ($this->data as $val) {
                    //var_dump($val);
                    echo "<tr>";
                    echo "<td style=\"text-align: center\">$no</td>";
                    $sat = $val->get_kd_d_user_ba();
                    echo "<td>" . date("d/m/Y", strtotime($val->get_kd_d_tgl())) . "</td>";
                    if ($sat == 1) {
                        echo "<td>DJA 979321</td>";
                    } else if ($sat == 2) {
                        echo "<td>DJA 999200</td>";
                    } else if ($sat == 3) {
                        echo "<td>DJA 984501</td>";
                    } else if ($sat == 4) {
                        echo "<td>DJKN 977191</td>";
                    } else if ($sat == 5) {
                        echo "<td>DJPK 999201</td>";
                    } else if ($sat == 6) {
                        echo "<td>DJPK 999202</td>";
                    } else if ($sat == 7) {
                        echo "<td>DJPK 999204</td>";
                    } else if ($sat == 8) {
                        echo "<td>DSP 987361</td>";
                    } else if ($sat == 9) {
                        echo "<td>DSP 984475</td>";
                    } else if ($sat == 10) {
                        echo "<td>PKN 440780</td>";
                    } elseif ($sat == 11) {
                        echo "<td>PKN 999001</td>";
                    } else if ($sat == 12) {
                        echo "<td>SMI 997386</td>";
                    } else if ($sat == 13) {
                        echo "<td>SMI 983783</td>";
                    } else if ($sat == 14) {
                        echo "<td>SMI 961671</td>";
                    } else if ($sat == 15) {
                        echo "<td>DJPK 985251 2</td>";
                    } else if ($sat == 16) {
                        echo "<td>DJPK 985251 6</td>";
                    } else if ($sat == 17) {
                        echo "<td>DJPU 960186</td>";
                    } else if ($sat == 18) {
                        echo "<td>DJPU 977263</td>";
                    } else {
                        echo "<td>Satker tidak ditemukan</td>";
                    }

                    $spm = ($val->get_kd_d_spm()==0)?"-":$val->get_kd_d_spm();
                    $spm_gagal = ($val->get_kd_d_spm_gagal()==0)?"-":$val->get_kd_d_spm_gagal();
                    $spm_persen = ($val->get_kd_d_spm_persen()<0)?"-":$val->get_kd_d_spm_persen()."%";
                    $rekon = ($val->get_kd_d_rekon()==0)?"-":$val->get_kd_d_rekon();
                    $rekon_gagal = ($val->get_kd_d_rekon_gagal()==0)?"-":$val->get_kd_d_rekon_gagal();
                    $rekon_persen = ($val->get_kd_d_rekon_persen()<0)?"-":$val->get_kd_d_rekon_persen()."%";
                    $kontrak = ($val->get_kd_d_kontrak()==0)?"-":$val->get_kd_d_kontrak();
                    $kontrak_gagal = ($val->get_kd_d_kontrak_gagal()==0)?"-":$val->get_kd_d_kontrak_gagal();
                    $kontrak_persen = ($val->get_kd_d_kontrak_persen()<0)?"-":$val->get_kd_d_kontrak_persen()."%";
                    echo "<td style=\"text-align: center\">" . $spm . "</td>";
                    echo "<td style=\"text-align: center\">" . $spm_gagal . "</td>";
                    echo "<td style=\"text-align: center\"><b>" . $spm_persen . "</b></td>";
                    echo "<td style=\"text-align: center\">" . $rekon . "</td>";
                    echo "<td style=\"text-align: center\">" . $rekon_gagal . "</td>";
                    echo "<td style=\"text-align: center\"><b>" . $rekon_persen . "</b></td>";
                    echo "<td style=\"text-align: center\">" . $kontrak . "</td>";
                    echo "<td style=\"text-align: center\">" . $kontrak_gagal . "</td>";
                    echo "<td style=\"text-align: center\"><b>" . $kontrak_persen . "</b></td>";
                    if (Session::get('role') == BA999) {
                        echo "<td style=\"text-align: center\"><a href=" . URL . "dataBa/delDataBa/" . $val->get_kd_d_ba() . " onclick=\"return del('" . date("d/m/Y", strtotime($val->get_kd_d_tgl())) . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataBa/addDataBa/" . $val->get_kd_d_ba() . "><i class=\"icon-pencil\"></i></a></td>";
                    }
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
<!--/fieldset-->