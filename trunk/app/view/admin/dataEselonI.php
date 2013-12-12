<h2>MONITORING 
        <?php 
            echo strtoupper(Session::get('user'));
        ?></h2>
<center><?php $this->load('dasbor/kppnLvl1') ?></center>
<div id="top">
    <div id="gambar"></div>
    <div class="fitur" id="table">
        <div class="kolom6">
            <fieldset><legend>Data</legend>
                <div id="table-title"></div>
                <div id="table-content">
                    <table class="table-bordered zebra scroll" style="text-align: center; margin-left: -4px; margin-right: 7px">
                        <thead style="font-size:80%">
                            <th rowspan="2">No</th>
                            <th rowspan="2" width ="15%">Kanwil</th>
                            <th colspan="3">Konversi</th>
                            <th colspan="3">SP2D</th>
                            <th colspan="3">LHP</th>
                            <th colspan="3">Rekon</th>
                            <!--<tr>
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
                            </tr>-->
                        </thead>
                        <tbody style="font-size:80%">
                            <?php
                            $no = 1;
                            foreach ($this->data as $key=>$val) {
                                //var_dump($val);
                                echo "<tr>";
                                echo "<td>$no</td>";
                                echo "<td><a href=".URL."dataKppn/viewDataKppnLvl2/".$key.">" . $val['singkat_kanwil'] . "</a></td>";
                                echo "<td>" . ceil($val['konversi']) . "</td>";
                                echo "<td>" . ceil($val['sp2d']) . "</td>";
                                echo "<td>" . ceil($val['lhp']) . "</td>";
                                echo "<td>" . ceil($val['rekon']) . "</td>";
                                echo "</tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<script type="text/javascript">
    
</script>