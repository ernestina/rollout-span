<!--fieldset-->
    <div id="table-title"></div>
    <div id="table-content">
        <table class="table-bordered zebra">
            <thead>
                <tr>
                    <th rowspan="2" width="5%">No</th>
                    <th rowspan="2" width="5%">Tanggal</th>
                    <th rowspan="2" width="8%">Satker</th>
                    <th colspan="3" width="25%">SPP</th>
                    <th colspan="3" width="25%">SPM</th>
                    <th colspan="3" width="25%">Kontrak</th>
                    <?php
                    //if (Session::get('role') == BA999) {
                        echo "<th rowspan='2' width='12%'>Aksi</th>";
                    //}
                    ?>
                </tr>
                <tr>
                    <th width="7%" ><i class="icon-ok" title='sukses'></th>
                    <th width="7%"><i class="icon-remove" title='gagal'></th>
                    <th width="6%">%</th>
                    <th width="7%"><i class="icon-ok" title='sukses'></th>
                    <th width="7%"><i class="icon-remove" title='gagal'></th>
                    <th width="6%">%</th>
                    <th width="7%"><i class="icon-ok" title='sukses'></th>
                    <th width="7%"><i class="icon-remove" title='gagal'></th>
                    <th width="6%">%</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = $this->mulai;
                $t_spm = 0;
                $t_spm_gagal = 0;
                $t_kontrak = 0;
                $t_kontrak_gagal = 0;
                $t_rekon = 0;
                $t_rekon_gagal = 0;
                //var_dump($this->total);
                foreach ($this->data as $val) {
                    $t_spm += $val->get_kd_d_spm();
                    $t_spm_gagal += $val->get_kd_d_spm_gagal();
                    $t_kontrak += $val->get_kd_d_kontrak();
                    $t_kontrak_gagal += $val->get_kd_d_kontrak_gagal();
                    $t_rekon += $val->get_kd_d_rekon();
                    $t_rekon_gagal += $val->get_kd_d_rekon_gagal();
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
                    echo "<td style=\"text-align: center\">" . $rekon . "</td>";
                    echo "<td style=\"text-align: center\">" . $rekon_gagal . "</td>";
                    echo "<td style=\"text-align: center\"><b>" . $rekon_persen . "</b></td>";
                    echo "<td style=\"text-align: center\">" . $spm . "</td>";
                    echo "<td style=\"text-align: center\">" . $spm_gagal . "</td>";
                    echo "<td style=\"text-align: center\"><b>" . $spm_persen . "</b></td>";
                    echo "<td style=\"text-align: center\">" . $kontrak . "</td>";
                    echo "<td style=\"text-align: center\">" . $kontrak_gagal . "</td>";
                    echo "<td style=\"text-align: center\"><b>" . $kontrak_persen . "</b></td>";
                    if (Session::get('role') == BA999) {
                        echo "<td style=\"text-align: center\"><a href=" . URL . "dataBa/delDataBa/" . $val->get_kd_d_ba() . " onclick=\"return del('" . date("d/m/Y", strtotime($val->get_kd_d_tgl())) . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataBa/addDataBa/" . $val->get_kd_d_ba() . "><i class=\"icon-pencil\"></i></a>
                        <a href=" . URL . "dataBa/addDataBa/" . $val->get_kd_d_ba() . "/1#uplModal  style='cursor:pointer'><i class=\"icon-file\" title='upload file'></i></a>
                        <a href=" . URL . "dataMasalah/addDataMasalah/".$val->get_kd_d_ba()."/".BA999."#oModal  style='cursor:pointer'><i class=\"icon-list-alt\" title='input masalah'></i></a></td>";
                    }elseif(Session::get('role') == ADMIN){
                        echo "<td style='text-align: center'><a onclick='viewFile(\"".$val->get_file()."\")' style='cursor:pointer'><i class=\"icon-search\" title='lihat file'></i></a>
                                <a onclick='viewMasalah(\"".$val->get_kd_d_ba()."\")' style='cursor:pointer'><i class=\"icon-eye-close\" title='lihat permasalahan'></i></a></td>";
                    }
                    echo "</tr>";
                    $no++;
                }
                echo "<tr style='font-weight:bold; border-top: 1px solid #D6D6C2'>";
                echo "<td></td><td style='text-align:left' colspan=2>SubTotal</td>";
                echo "<td>".$t_rekon."</td><td>".$t_rekon_gagal."</td><td></td>";
                echo "<td>".$t_spm."</td><td>".$t_spm_gagal."</td><td></td>";
                echo "<td>".$t_kontrak."</td><td>".$t_kontrak_gagal."</td><td colspan=2></td></tr>";
                if(isset($this->total)){
                    echo "<tr style='font-weight:bold; border-top: 1px solid #D6D6C2;background-color:#0066FF;color:#CCFFFF'>";
                    echo "<td></td><td style='text-align:left;'>TOTAL</td>";
                    echo "<td>".$this->total['kd_d_rekon']."</td><td>".$this->total['kd_d_rekon_gagal']."</td><td></td>";
                    echo "<td>".$this->total['kd_d_spm']."</td><td>".$this->total['kd_d_spm_gagal']."</td><td></td>";
                    echo "<td>".$this->total['kd_d_kontrak']."</td><td>".$this->total['kd_d_kontrak_gagal']."</td><td colspan=2></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<!--/fieldset-->