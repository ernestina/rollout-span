<fieldset><legend>Data</legend>
                <div id="table-title"></div>
                <div id="table-content">
                    <table class="table-bordered zebra scroll" style="text-align: center; margin-left: -4px; margin-right: 7px">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2" width ="10%">Tanggal</th>
                                <th colspan="3">Konversi</th>
                                <th colspan="3">SP2D</th>
                                <th colspan="3">LHP</th>
                                <th colspan="3">Rekon</th>
								<?php if (Session::get('role') == KPPN) { 
                                echo "<th rowspan='2' width ='20%'>Aksi</th>";
								}
								?>
                            </tr>
                            <tr>
                                <th width ="10%">Sukses</th>
                                <th width ="8%">Gagal</th>
                                <th width ="8%">%</th>
                                <th width ="10%">Sukses</th>
                                <th width ="8%">Gagal</th>
                                <th width ="8%">%</th>
                                <th width ="10%">Sukses</th>
                                <th width ="8%">Gagal</th>
                                <th width ="8%">%</th>
                                <th width ="10%">Sukses</th>
                                <th width ="8%">Gagal</th>
                                <th width ="8%">%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($this->data as $val) {
                                //var_dump($val);
                                echo "<tr>";
                                echo "<td>$no</td>";
                                echo "<td>" . $val->get_kd_d_tgl() . "</td>";
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
									echo "<td><a href=" . URL . "dataKppn/delDataKppnLvl3/" . $val->get_kd_d_kppn() . " onclick=\"return del('" . $val->get_kd_d_tgl() . "')\"><i class=\"icon-trash\"></i></a>
									<a href=" . URL . "dataKppn/addDataKppnLvl3/" . $val->get_kd_d_kppn() . "><i class=\"icon-pencil\"></i></a></td>";
								}
								echo "</tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>