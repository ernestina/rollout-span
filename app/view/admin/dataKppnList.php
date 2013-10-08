<div id="top">

<h2>MONITORING KPPN</h2>
<div id="gambar"></div>
<div class="fitur" id="table">
    <fieldset><legend>Data KPPN</legend>
        <div id="table-title"></div>
        <div id="table-content">
            <table class="table-bordered zebra scroll" style="text-align: center">
                <thead style="font-size:80%">
                <th>No</th>
                <th width="10%" >Unit</th>
                <th width="10%">Tanggal</th>
                <th width="5%">Kon-versi</th>
                <th width="5%">NRS</th>
                <th width="5%">NRK</th>
                <th width="5%">SPM</th>
                <th width="5%">SP2D</th>
                <th width="5%">LHP</th>
                <th width="5%">Rekon</th>
                <th width="5%">Bank Persepsi</th>
                <th width="5%">Konfirm Peneri-maan</th>
                <th width="5%">Koreksi Peneri-maan</th>
                <th width="5%">Infra-stuktur</th>
                <th>Jari-ngan</th>
                <th>Masalah</th>
                <th width="7%">Aksi</th>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($this->data as $val) {
                        //var_dump($val);
                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td style=\"text-align: left\">" . $val->get_kd_d_user() . "</td>";
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
</div>