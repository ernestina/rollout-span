<div id="top">
    <h2>MONITORING KPPN JAKARTA 2</h2>
    <center><?php $this->load('dasbor/line') ?></center>
	
    <div id="gambar"></div>
    <div class="fitur" id="table">
        <fieldset><legend>Data KPPN JAKARTA 2</legend>
            <div id="table-title"></div>
            <div id="table-content"><button href="<?php echo URL.'dasbor'?>" style="margin-right:20px"><i class="icon-plus icon-white"></i></button>
                <table class="table-bordered zebra scroll" style="text-align: center">
                    <thead style="font-size:80%">
                     <th>No</th>
                    <th>Tanggal</th>
                    <th>SP2D Sukses</th>
                    <th>SP2D Gagal</th>
                    <th>LHP Sukses</th>
                    <th>SP2D Gagal</th>
                    <th>Rekon Sukses</th>
                    <th>Rekon Gagal</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($this->data as $val) {
                            //var_dump($val);
                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>" . $val->get_kd_d_tgl() . "</td>";
                            echo "<td>" . $val->get_kd_d_sp2d() . "</td>";
                            echo "<td>" . ceil($val->get_kd_d_sp2d()/rand(1,10)) . "</td>";
                            echo "<td>" . $val->get_kd_d_lhp() . "</td>";
                            echo "<td>" . ceil($val->get_kd_d_lhp()/rand(1,10)) . "</td>";
                            echo "<td>" . $val->get_kd_d_rekon() . "</td>";
                            echo "<td>" . ceil($val->get_kd_d_rekon()/rand(1,10)) . "</td>";
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