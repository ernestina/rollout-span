<div id="top">
    <h2>MONITORING KPPN </h2>
    <center><?php $this->load('dasbor/dasborKppnLvl2') ?></center>
    <div id="gambar"></div>
    <div class="fitur" id="table">
        <fieldset><legend>Data KPPN </legend>
            <div id="table-title"></div>
            <div id="table-content">
                <table class="table-bordered zebra scroll" style="text-align: center">
                    <thead style="font-size:80%">
                    <th width="5%">No</th>
                    <th>Unit</th>
                    <th>Tanggal</th>
                    <th width="10%">Persentase SP2D Sukses</th>
                    <th width="10%">Persentase LHP Sukses</th>
                    <th width="10%">Persentase Rekon Sukses</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($this->data as $val) {
                            //var_dump($val);
                            echo "<tr>";
                            echo "<td>$no</td>";
                            //link sementara ke level 3
							echo "<td style=\"text-align: left\"><a href='addDataKppnLvl3Jkt6'>" . $val->get_kd_d_user() . "</a></td>";
                            echo "<td>" . $val->get_kd_d_tgl() . "</td>";
                            echo "<td>" . ceil(rand(90,100)) . " %</td>";
                            echo "<td>" . ceil(rand(80,100)) . " %</td>";
                            echo "<td>" . ceil(rand(90,100)) . " %</td>";
							/*
                            echo "<td><a href=" . URL . "dataKppn/delDataKppn/" . $val->get_kd_d_kppn() . " onclick=\"return del('" . $val->get_kd_d_user() . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataKppn/addDataKppn/" . $val->get_kd_d_kppn() . "><i class=\"icon-pencil\"></i></a></td>";
                            echo "</tr>";
							*/
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>