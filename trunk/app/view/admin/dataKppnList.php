<div class="kolom4" id="table">
    <fieldset><legend>Data KPPN</legend>
        <div id="table-title"></div>
        <div id="table-content">
            <table class="table-bordered zebra scroll">
                <thead>
                <th>No</th>
                <th>Unit</th>
                <th>Tanggal</th>
                <th>Konversi</th>
                <th>NRS</th>
                <th>NRK</th>
                <th>SPM</th>
                <th>SP2D</th>
                <th>LHP</th>
                <th>Rekon</th>
                <th>Bank Persepsi</th>
                <th>Konvirmasi Penerimaan</th>
                <th>Koreksi penerimaan</th>
                <th>Infrastuktur</th>
                <th>Jaringan</th>
                <th>Masalah</th>
                <th width="50">Aksi</th>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($this->data as $val) {
                        //var_dump($val);
                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td>" . $val->get_kd_d_user() . "</td>";
                        echo "<td>" . $val->get_kd_d_tgl() . "</td>";
                        echo "<td>" . $val->get_kd_d_konversi() . "</td>";
                        echo "<td>" . $val->get_kd_d_nrs() . "</td>";
                        echo "<td>" . $val->get_kd_d_nrk() . "</td>";
                        echo "<td>" . $val->get_kd_d_spm() . "</td>";
                        echo "<td>" . $val->get_kd_d_sp2d() . "</td>";
                        echo "<td>" . $val->get_kd_d_lhp() . "</td>";
                        echo "<td>" . $val->get_kd_d_rekon() . "</td>";
                        echo "<td>" . $val->get_kd_d_persepsi() . "</td>";
                        echo "<td>" . $val->get_kd_d_terimaan() . "</td>";
                        echo "<td>" . $val->get_kd_d_koreksi() . "</td>";
                        echo "<td>" . $val->get_kd_d_infrastruktur() . "</td>";
                        echo "<td>" . $val->get_kd_d_jaringan() . "</td>";
                        echo "<td>" . $val->get_kd_d_masalah() . "</td>";
                        echo "<td><a href=" . URL . "dataKppn/delDataKppn/" . $val->get_kd_d_kppn() . " onclick=\"return del('" . $val->get_kd_d_user() . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataKppn/addDataKppn/" . $val->get_kd_d_kppn() . "><i class=\"icon-pencil\"></i></a></td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
</div>