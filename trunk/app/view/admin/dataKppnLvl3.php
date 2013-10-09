<div id="top">
    <h2>MONITORING KPPN </h2>
    <center><?php $this->load('dasbor/line2') ?></center>
    <div id="gambar"></div>
    <div class="fitur" id="table">
        <fieldset><legend>Data KPPN </legend>
            <div id="table-title"></div>
            <div id="table-content">
                <table class="table-bordered zebra scroll" style="text-align: center">
                    <thead style="font-size:80%">
                    <th>No</th>
                    <th>Unit</th>
                    <th>Tanggal</th>
                    <th>Persentase SP2D Sukses</th>
                    <th>Persentase LHP Sukses</th>
                    <th>Persentase Rekon Sukses</th>
                    <th>Aksi</th>
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
                            echo "<td>" . ceil(rand(90,100)) . " %</td>";
                            echo "<td>" . ceil(rand(80,100)) . " %</td>";
                            echo "<td>" . ceil(rand(90,100)) . " %</td>";
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