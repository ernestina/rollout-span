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
                        <!--<th width="5%">No</th>
                        <th width="10%">KPPN</th>
                        <th width="10%">Konversi Sukses</th>
                        <th width="10%">Supplier Sukses</th>
                        <th width="10%">SP2D Sukses</th>
                        <th width="10%">LHP Sukses</th>
                        <th width="10%">Rekon Sukses</th>
                        <th width="10%">Total/Bobot</th>-->
                        <tr>
                            <th rowspan="2" width ="3%">No</th>
                            <th rowspan="2" width ="5%">Tanggal</th>
                            <th colspan="3" width ="15%">Konversi</th>
                            <th colspan="3" width ="15%">Supplier</th>
                            <th colspan="3" width ="15%">SP2D</th>
                            <th colspan="3" width ="15%">LHP</th>
                            <th colspan="3" width ="15%">Rekon</th>
                            <th width="10%">Total/Bobot</th>
                        </tr>
                        <tr>
                            <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                            <th width ="5%"><i class="icon-remove" title='gagal'></th>
                            <th width ="5%">%</th>
                            <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                            <th width ="5%"><i class="icon-remove" title='gagal'></th>
                            <th width ="5%">%</th>
                            <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                            <th width ="5%"><i class="icon-remove" title='gagal'></th>
                            <th width ="5%">%</th>
                            <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                            <th width ="5%"><i class="icon-remove" title='gagal'></th>
                            <th width ="5%">%</th>
                            <th width ="5%"><i class="icon-ok" title='sukses'></i></th>
                            <th width ="5%"><i class="icon-remove" title='gagal'></th>
                            <th width ="5%">%</th>
                        </tr>
                        </thead>
                        <tbody >
                            <?php
                            $no = 1;
                            $k = $this->bot->get_bobot('konversi');
                            $p = $this->bot->get_bobot('supplier');
                            $s = $this->bot->get_bobot('sp2d');
                            $l = $this->bot->get_bobot('lhp');
                            $r = $this->bot->get_bobot('rekon');
                            $t_konversi = 0;
                            $t_konversi_gagal = 0;
                            $t_supplier = 0;
                            $t_supplier_gagal = 0;
                            $t_sp2d = 0;
                            $t_sp2d_gagal = 0;
                            $t_lhp = 0;
                            $t_lhp_gagal = 0;
                            $t_rekon = 0;
                            $t_rekon_gagal = 0;
                            foreach ($this->data as $key=>$val) {
                                $t_konversi += $val['kd_d_konversi'];
                                $t_konversi_gagal += $val['kd_d_konversi_gagal'];
                                $t_supplier += $val['kd_d_supplier'];
                                $t_supplier_gagal += $val['kd_d_supplier_gagal'];
                                $t_sp2d += $val['kd_d_sp2d'];
                                $t_sp2d_gagal += $val['kd_d_sp2d_gagal'];
                                $t_lhp += $val['kd_d_lhp'];
                                $t_lhp_gagal += $val['kd_d_lhp_gagal'];
                                $t_rekon += $val['kd_d_rekon'];
                                $t_rekon_gagal += $val['kd_d_rekon_gagal'];
                                //var_dump($val);
                                //$total = ($val['konversi']*$k+$val['sp2d']*$s+$val['lhp']*$l+$val['rekon']*$r)/DataKppn::getPembagi($val);
                                echo "<tr>";
                                echo "<td>$no</td>";
                                //echo "<td><a href=" . URL . "dataKppn/viewDataKppnLvl2/" . $key . " target=_blank>" . $val['singkat_kanwil'] ."</a></td>";
                                echo "<td><a onclick=pilihan(".$key.") style='cursor:pointer; color:blue;'>" . $val['singkat_kanwil'] ."</a></td>";
                                echo "<td>".$val['kd_d_konversi']."</td>";
                                echo "<td>".$val['kd_d_konversi_gagal']."</td>";
                                echo "<td>" . ceil($val['konversi_persen']) . "%</td>";
                                echo "<td>".$val['kd_d_supplier']."</td>";
                                echo "<td>".$val['kd_d_supplier_gagal']."</td>";
                                echo "<td>" . ceil($val['supplier_persen']) . "%</td>";
                                echo "<td>".$val['kd_d_sp2d']."</td>";
                                echo "<td>".$val['kd_d_sp2d_gagal']."</td>";
                                echo "<td>" . ceil($val['sp2d_persen']) . "%</td>";
                                echo "<td>".$val['kd_d_lhp']."</td>";
                                echo "<td>".$val['kd_d_lhp_gagal']."</td>";
                                echo "<td>" . ceil($val['lhp_persen']) . "%</td>";
                                echo "<td>".$val['kd_d_rekon']."</td>";
                                echo "<td>".$val['kd_d_rekon_gagal']."</td>";
                                echo "<td>" . ceil($val['rekon_persen']) . "%</td>";
                                echo "<td>" .  ceil($val['sum']). "%</td>";
                                echo "</tr>";
                                $no++;
                            }
                            echo "<tr style='font-weight:bold; border-top: 1px solid #D6D6C2'>";
                            echo "<td></td><td style='text-align:left'>Total</td><td>".$t_konversi."</td><td>".$t_konversi_gagal."</td><td></td>";
                            echo "<td>".$t_supplier."</td><td>".$t_supplier_gagal."</td><td></td>";
                            echo "<td>".$t_sp2d."</td><td>".$t_sp2d_gagal."</td><td></td>";
                            echo "<td>".$t_lhp."</td><td>".$t_lhp_gagal."</td><td></td>";
                            echo "<td>".$t_rekon."</td><td>".$t_rekon_gagal."</td><td colspan=2></td></tr>";
                            ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<script type="text/javascript">

    function pilihan(kd_kanwil ){
        if(isExistDomId('oPilihan')) document.getElementById('oPilihan').remove();
        var oModal = document.createElement('div');
        oModal.setAttribute('id','oPilihan');

        var ul = document.createElement('div');
        ul.className = "inline";
        ul.style.width = "100%";
        ul.style.textAlign = "center";

        var liSum = document.createElement('div');
        liSum.style.display = "inline-block";

        var aSum = document.createElement('a');
        aSum.href = "<?php echo URL . "dataKppn/viewDataKppnLvl2/"?>"+kd_kanwil;
        aSum.setAttribute("title","summary data kppn");
        aSum.setAttribute("target","_blank");

        var imgSum = document.createElement('img');
        imgSum.src = "<?php echo URL; ?>/public/img/chart.jpg";
        imgSum.height = 100;
        imgSum.width = 100;

        var liDate = document.createElement('div');
        liDate.style.display = "inline-block";

        var aDate = document.createElement('a');
        aDate.href = "<?php echo URL . "dataKppn/viewDataTanggal/"?>"+kd_kanwil;
        aDate.setAttribute("title","data per tanggal");
        aDate.setAttribute("target","_blank");

        var imgDate = document.createElement('img');
        imgDate.src = "<?php echo URL; ?>/public/img/calendar.jpg";
        imgSum.height = 100;
        imgDate.width = 100;

        aSum.appendChild(imgSum);
        aDate.appendChild(imgDate);
        liSum.appendChild(aSum);
        liDate.appendChild(aDate);
        ul.appendChild(liSum);
        ul.appendChild(liDate);
        oModal.appendChild(ul);

        var cbody = document.getElementsByTagName('body');
        cbody[0].appendChild(oModal);

        $('#oPilihan').dialog({
            autoOpen:false,
            width:300,
            height:200,
            close:function(){
                if(isExistDomId('oPilihan')) document.getElementById('oPilihan').remove();
            }
        });



        $('#oPilihan').dialog('open');

    }



</script>