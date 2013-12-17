<fieldset><legend>Data PKN</legend>
    <div id="table-title"></div>
    <div id="table-content">
        <table class="table-bordered zebra scroll">
            <thead>
                <tr>
                    <th rowspan="2" width ="5%">No</th>
                    <th rowspan="2" width ="5%">Tanggal</th>
                    <th colspan="3" width ="45%">SP2D</th>
                    <th colspan="3" width ="45%">SPT</th>
                    <?php
                    if (Session::get('role') == PKN) {
                        echo "<th rowspan='2' width ='15%'>Aksi</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <th width="15%">Sukses</th>
                    <th width="15%">Gagal</th>
                    <th width="15%">%</th>
                    <th width="15%">Sukses</th>
                    <th width="15%">Gagal</th>
                    <th width="15%">%</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = $this->mulai;
                foreach ($this->data as $val) {
                    //var_dump($val);
                    echo "<tr>";
                    echo "<td style=\"text-align: center\">$no</td>";
                    echo "<td>" . date("d/m/Y", strtotime($val->get_kd_d_tgl())) . "</td>";
                    echo "<td style=\"text-align: center\">" . $val->get_kd_d_sp2d() . "</td>";
                    echo "<td style=\"text-align: center\">" . $val->get_kd_d_sp2d_gagal() . "</td>";
                    echo "<td style=\"text-align: center\"><b>" . $val->get_kd_d_sp2d_persen() . "%</td>";
                    echo "<td style=\"text-align: center\">" . $val->get_kd_d_spt() . "</td>";
                    echo "<td style=\"text-align: center\">" . $val->get_kd_d_spt_gagal() . "</td>";
                    echo "<td style=\"text-align: center\"><b>" . $val->get_kd_d_spt_persen() . "%</b></td>";
                    if (Session::get('role') == PKN) {
                        echo "<td style=\"text-align: center\"><a href=" . URL . "dataPkn/delDataPkn/" . $val->get_kd_d_pkn() . " onclick=\"return del('" . date("d/m/Y", strtotime($val->get_kd_d_tgl())) . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataPkn/addDataPkn/" . $val->get_kd_d_pkn() . "><i class=\"icon-pencil\"></i></a></td>";
                    }
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</fieldset>