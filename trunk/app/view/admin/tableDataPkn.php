<!--fieldset><legend>Data PKN</legend-->
    <div id="table-title"></div>
    <div id="table-content">
        <table class="table-bordered zebra" width="95%">
            <thead>
                <tr>
                    <th rowspan="2" width ="5%">No</th>
                    <th rowspan="2" width ="15%">Tanggal</th>
                    <th colspan="3" width ="35%">SP2D</th>
                    <th colspan="3" width ="35%">SPT</th>
                    <?php
                    //if (Session::get('role') == PKN) {
                        echo "<th rowspan='2' width ='10%'>Aksi</th>";
                    //}
                    ?>
                </tr>
                <tr>
                    <th width="10%"><i class="icon-ok" title='sukses'></th>
                    <th width="10%"><i class="icon-remove" title='gagal'></th>
                    <th width="15%">%</th>
                    <th width="10%"><i class="icon-ok" title='sukses'></th>
                    <th width="10%"><i class="icon-remove" title='gagal'></th>
                    <th width="15%">%</th>
                </tr>
            </thead>
            <tbody style='text-align: center'>
                <?php
                $no = $this->mulai;
                $t_sp2d = 0;
                $t_sp2d_gagal = 0;
                $t_spt = 0;
                $t_spt_gagal = 0;
                foreach ($this->data as $val) {
                    $t_sp2d += $val->get_kd_d_sp2d();
                    $t_sp2d_gagal += $val->get_kd_d_sp2d_gagal();
                    $t_spt += $val->get_kd_d_spt();
                    $t_spt_gagal += $val->get_kd_d_spt_gagal();
                    //var_dump($val);
                    $kd_d_sp2d = ($val->get_kd_d_sp2d()==0)?"-":$val->get_kd_d_sp2d();
                    $kd_d_sp2d_gagal = ($val->get_kd_d_sp2d_gagal()==0)?"-":$val->get_kd_d_sp2d_gagal();
                    $kd_d_sp2d_persen = ($val->get_kd_d_sp2d_persen()<0)?"-":$val->get_kd_d_sp2d_persen()."%";
                    $kd_d_spt = ($val->get_kd_d_spt()==0)?"-":$val->get_kd_d_spt();
                    $kd_d_spt_gagal = ($val->get_kd_d_spt_gagal()==0)?"-":$val->get_kd_d_spt_gagal();
                    $kd_d_spt_persen = ($val->get_kd_d_spt_persen()<0)?"-":$val->get_kd_d_spt_persen()."%"; 
                    //print_r($val->get_kd_d_spt_persen());
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td style='text-align: center'>" . $val->get_kd_d_tgl() . "</td>";
                    echo "<td>" . $kd_d_sp2d . "</td>";
                    echo "<td>" . $kd_d_sp2d_gagal . "</td>";
                    echo "<td><b>" . $kd_d_sp2d_persen . "</td>";
                    echo "<td>" . $kd_d_spt . "</td>";
                    echo "<td>" . $kd_d_spt_gagal . "</td>";
                    echo "<td><b>" . $kd_d_spt_persen . "</b></td>";
                    if (Session::get('role') == PKN) {
                        echo "<td><a href=" . URL . "dataPkn/delDataPkn/" . $val->get_kd_d_pkn() . " onclick=\"return del('" . date("d/m/Y", strtotime($val->get_kd_d_tgl())) . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataPkn/addDataPkn/" . $val->get_kd_d_pkn() . "><i class=\"icon-pencil\"></i></a>
                        <a href=" . URL . "dataPkn/addDataPkn/" . $val->get_kd_d_pkn() . "/1#uplModal  style='cursor:pointer'><i class=\"icon-file\" title='upload file'></i></a>
                        <a href=" . URL . "dataMasalah/addDataMasalah/".$val->get_kd_d_pkn()."/".PKN."#oModal  style='cursor:pointer'><i class=\"icon-list-alt\" title='input masalah'></i></a></td>";
                    }elseif(Session::get('role') == ADMIN){
                        echo "<td style='text-align: center'><a onclick='viewFile(\"".$val->get_file()."\")' style='cursor:pointer'><i class=\"icon-search\" title='lihat file'></i></a>
                                <a onclick='viewMasalah(\"".$val->get_kd_d_pkn()."\")' style='cursor:pointer'><i class=\"icon-eye-close\" title='lihat permasalahan'></i></a></td>";
                    }
                    echo "</tr>";
                    $no++;
                }
                echo "<tr style='font-weight:bold; border-top: 1px solid #D6D6C2'>";
                echo "<td></td><td style='text-align:left'>SubTotal</td>";
                echo "<td>".$t_sp2d."</td><td>".$t_sp2d_gagal."</td><td></td>";
                echo "<td>".$t_spt."</td><td>".$t_spt_gagal."</td><td colspan=2></td></tr>";
                if(isset($this->total)){
                    echo "<tr style='font-weight:bold; border-top: 1px solid #D6D6C2;background-color:#0066FF;color:#CCFFFF'>";
                    echo "<td></td><td style='text-align:left;'>TOTAL</td>";
                    echo "<td>".$this->total['kd_d_sp2d']."</td><td>".$this->total['kd_d_sp2d_gagal']."</td><td></td>";
                    echo "<td>".$this->total['kd_d_spt']."</td><td>".$this->total['kd_d_spt_gagal']."</td><td></td><td colspan=2></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<!--/fieldset-->
