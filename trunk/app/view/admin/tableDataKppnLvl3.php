<!--fieldset><legend>Data</legend-->
    <div id="table-title"></div>
    <div id="table-content">
        <table class="table-bordered zebra" width= "95%">
            <thead>
                <tr>
                    <th rowspan="2" width ="3%">No</th>
                    <th rowspan="2" width ="5%">Tanggal</th>
                    <th colspan="3" width ="15%">Konversi</th>
                    <th colspan="3" width ="15%">Supplier</th>
                    <th colspan="3" width ="15%">SP2D</th>
                    <th colspan="3" width ="15%">LHP</th>
                    <th colspan="3" width ="15%">Rekon</th>
                    <?php
                    //if (Session::get('role') == KPPN) {
                        echo "<th rowspan='2' width ='15%'>Aksi</th>";
                    //}
                    ?>
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
            <tbody style="text-align: right">
                <?php
                $no = $this->mulai;
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
                    //var_dump($val);
                    $kd_d_konversi = ($val->get_kd_d_konversi()==0)?"-":$val->get_kd_d_konversi();
                    $kd_d_konversi_gagal = ($val->get_kd_d_konversi_gagal()==0)?"-":$val->get_kd_d_konversi_gagal();
                    $kd_d_konversi_persen = ($val->get_kd_d_konversi_persen()<0)?"-":$val->get_kd_d_konversi_persen()."%";
                    $kd_d_supplier = ($val->get_kd_d_supplier()==0)?"-":$val->get_kd_d_supplier();
                    $kd_d_supplier_gagal = ($val->get_kd_d_supplier_gagal()==0)?"-":$val->get_kd_d_supplier_gagal();
                    $kd_d_supplier_persen = ($val->get_kd_d_supplier_persen()<0)?"-":$val->get_kd_d_supplier_persen()."%";
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
                    echo "<td>" . $kd_d_supplier . "</td>";
                    echo "<td>" . $kd_d_supplier_gagal . "</td>";
                    echo "<td><b>" . $kd_d_supplier_persen . "</b></td>";
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
									<a href=" . URL . "dataKppn/addDataKppnLvl3/" . $val->get_kd_d_kppn() . "#pModal  style='cursor:pointer'><i class=\"icon-pencil\" title='ubah data'></i></a> &nbsp; &nbsp;
                                    <a href=" . URL . "dataKppn/addDataKppnLvl3/" . $val->get_kd_d_kppn() . "#uplModal  style='cursor:pointer'><i class=\"icon-file\" title='upload file'></i></a> 
                                    <a href=" . URL . "dataMasalah/addDataMasalah/".$val->get_kd_d_kppn()."/".KPPN."#oModal  style='cursor:pointer'><i class=\"icon-list-alt\" title='input masalah'></i></a></td>";
                    }
                    if(Session::get('role') == ADMIN){
                        echo "<td style='text-align: center'><a onclick='viewFile(\"".$val->get_file()."\")' style='cursor:pointer'><i class=\"icon-search\" title='lihat file'></i></a>
                                <a onclick='viewMasalah(\"".$val->get_kd_d_kppn()."\")' style='cursor:pointer'><i class=\"icon-eye-close\" title='lihat permasalahan'></i></a></td>";
                    } //onclick='viewMasalah(\"".$val->get_kd_d_kppn()."\")'
                    echo "</tr>";
                    $no++;
                }
                echo "<tr style='font-weight:bold; border-top: 1px solid #D6D6C2'>";
                echo "<td></td><td style='text-align:left'>SubTotal</td><td>".$t_konversi."</td><td>".$t_konversi_gagal."</td><td></td>";
                echo "<td>".$t_supplier."</td><td>".$t_supplier_gagal."</td><td></td>";
                echo "<td>".$t_sp2d."</td><td>".$t_sp2d_gagal."</td><td></td>";
                echo "<td>".$t_lhp."</td><td>".$t_lhp_gagal."</td><td></td>";
                echo "<td>".$t_rekon."</td><td>".$t_rekon_gagal."</td><td colspan=2></td></tr>";
                if(isset($this->total)){
                    echo "<tr style='font-weight:bold; border-top: 1px solid #D6D6C2;background-color:#0066FF;color:#CCFFFF'>";
                    echo "<td></td><td style='text-align:left;'>TOTAL</td><td>".$this->total['kd_d_konversi']."</td><td>".$this->total['kd_d_konversi_gagal']."</td><td></td>";
                    echo "<td>".$this->total['kd_d_suppier']."</td><td>".$this->total['kd_d_supplier_gagal']."</td><td></td>";
                    echo "<td>".$this->total['kd_d_sp2d']."</td><td>".$this->total['kd_d_sp2d_gagal']."</td><td></td>";
                    echo "<td>".$this->total['kd_d_lhp']."</td><td>".$this->total['kd_d_lhp_gagal']."</td><td></td>";
                    echo "<td>".$this->total['kd_d_rekon']."</td><td>".$this->total['kd_d_rekon_gagal']."</td><td colspan=2></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<!--/fieldset-->