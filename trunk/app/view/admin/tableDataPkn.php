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
                    if (Session::get('role') == PKN) {
                        echo "<th rowspan='2' width ='10%'>Aksi</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <th width="10%">Sukses</th>
                    <th width="10%">Gagal</th>
                    <th width="15%">%</th>
                    <th width="10%">Sukses</th>
                    <th width="10%">Gagal</th>
                    <th width="15%">%</th>
                </tr>
            </thead>
            <tbody style='text-align: center'>
                <?php
                $no = $this->mulai;
                foreach ($this->data as $val) {
                    //var_dump($val);
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td style='text-align: center'>" . date("d/m/Y", strtotime($val->get_kd_d_tgl())) . "</td>";
                    echo "<td>" . $val->get_kd_d_sp2d() . "</td>";
                    echo "<td>" . $val->get_kd_d_sp2d_gagal() . "</td>";
                    echo "<td><b>" . $val->get_kd_d_sp2d_persen() . "%</td>";
                    echo "<td>" . $val->get_kd_d_spt() . "</td>";
                    echo "<td>" . $val->get_kd_d_spt_gagal() . "</td>";
                    echo "<td><b>" . $val->get_kd_d_spt_persen() . "%</b></td>";
                    if (Session::get('role') == PKN) {
                        echo "<td><a href=" . URL . "dataPkn/delDataPkn/" . $val->get_kd_d_pkn() . " onclick=\"return del('" . date("d/m/Y", strtotime($val->get_kd_d_tgl())) . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataPkn/addDataPkn/" . $val->get_kd_d_pkn() . "><i class=\"icon-pencil\"></i></a></td>";
                    }
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
<!--/fieldset-->