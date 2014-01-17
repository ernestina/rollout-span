<h2>MONITORING PER KANWIL</h2>
<center><?php $this->load('dasbor/kppnLvl1') ?></center>
<div id="top">
    <div id="gambar"></div>
    <div class="fitur" id="table">
        <div class="kolom6">
            <fieldset><legend>Data</legend>
                <div id="table-title"></div>
                <div id="table-content">
                    <table class="table-bordered zebra scroll" style="text-align: center; margin-left: -4px; margin-right: 7px">
                        <thead >
                        <th width="5%">No</th>
                        <th width="10%">KPPN</th>
                        <th width="10%">Konversi Sukses</th>
                        <th width="10%">Supplier Sukses</th>
                        <th width="10%">SP2D Sukses</th>
                        <th width="10%">LHP Sukses</th>
                        <th width="10%">Rekon Sukses</th>
                        <th width="10%">Total/Bobot</th>
                        </thead>
                        <tbody >
                            <?php
                            $no = 1;
                            $k = $this->bot->get_bobot('konversi');
                            $p = $this->bot->get_bobot('supplier');
                            $s = $this->bot->get_bobot('sp2d');
                            $l = $this->bot->get_bobot('lhp');
                            $r = $this->bot->get_bobot('rekon');
                            foreach ($this->data as $key => $val) {
                                //var_dump($val);
                                $total = ($val['konversi']*$k+$val['sp2d']*$s+$val['lhp']*$l+$val['rekon']*$r)/DataKppn::getPembagi($val);
                                echo "<tr>";
                                echo "<td>$no</td>";
                                echo "<td><a href=" . URL . "dataKppn/viewDataKppnLvl2/" . $key . " target=_blank>" . $val['singkat_kanwil'] ."</a></td>";
                                echo "<td>" . ceil($val['konversi']) . "%</td>";
                                 echo "<td>" . ceil($val['supplier']) . "%</td>";
                                echo "<td>" . ceil($val['sp2d']) . "%</td>";
                                echo "<td>" . ceil($val['lhp']) . "%</td>";
                                echo "<td>" . ceil($val['rekon']) . "%</td>";
                                echo "<td>" .  ceil($val['sum']). "%</td>";
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