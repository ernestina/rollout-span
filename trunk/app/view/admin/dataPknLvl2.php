<h2>DATA PKN PER SUBDIT</h2>
<center><?php $this->load('dasbor/pknLvl2') ?></center>
<?php if (Session::get('role') == PKN) { ?>
    <div id="top">
        <div>
            <input id="add_data" class="normal" type="button" onclick="addData()" value="TAMBAH DATA">
        </div>
    <?php } ?>

    <div id="form">
        <div>
            <?php
            if (Session::get('role') == 5) {
                echo "<input id='add_data' class='normal' type='button' onclick='addData()' value='TAMBAH DATA'>";
            }
            ?>
        </div></br></br>
        <div id="form_input"><div class="kiri">
                <form id="form_rekam"> 
                    <!--method="POST" action="<?php
                    if (isset($this->d_ubah)) {
                        echo URL . 'dataPkn/updDataPkn';
                    } else {
                        $_SERVER['PHP_SELF'];
                    }
                    ?>"-->
                    <?php
                    echo "<input type='hidden' name='add_d_pkn' value=''>";
                    if (isset($this->d_ubah)) {
                        echo "<input type=hidden name='kd_d_pkn' value=" . $this->d_ubah->get_kd_d_pkn() . ">";
                    }

                    if (isset($this->error)) {
                        echo "<div class=error>" . $this->error . "</div>";
                    }
                    ?>

                    <input type="hidden" name="kd_d_user" id="kd_d_user" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_user() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_user() : '88888'); ?>">
                    <div id="wdouble" class="error"></div>
                    <div id="wtgl"  class="error"></div>
                    <label class="isian">Tanggal</label><input type="text" name="kd_d_tgl" id="kd_d_tgl" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_tgl() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_tgl() : ''); ?>">

                    <div id="wsp2d"  class="error"></div>
                    <label class="isian">SP2D Sukses</label><input type="number" name="kd_d_sp2d" id="kd_d_sp2d" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_sp2d() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_sp2d() : ''); ?>">
                    <div id="wsp2d_gagal" class="error"></div>
                    <label class="isian">SP2D Gagal</label><input type="number" name="kd_d_sp2d_gagal" id="kd_d_sp2d_gagal" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_sp2d_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_sp2d_gagal() : ''); ?>">

                    <div id="wspt" class="error"></div>
                    <label class="isian">SPT Sukses</label><input type="number" name="kd_d_spt" id="kd_d_spt" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_spt() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_spt() : ''); ?>">
                    <div id="wspt_gagal" class="error"></div>
                    <label class="isian">SPT Gagal</label><input type="number" name="kd_d_spt_gagal" id="kd_d_spt_gagal" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_spt_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_spt_gagal() : ''); ?>">

                    <ul class="inline" style="margin-left: 220px">
                        <!--li><input id="batal" class="normal" type="button" onclick="" value="BATAL"></li-->
                        <li><input id="submit" class="sukses" type="button" name="<?php echo isset($this->d_ubah) ? 'upd_d_pkn' : 'add_d_pkn'; ?>" value="SIMPAN" onClick=""></li>
                    </ul>
                </form>
            </div>
        </div>
        </fieldset>
    </div>
    <fieldset><legend>Data PKN</legend>
        <div id="table-title"></div>
        <div id="table-content">
            <table class="table-bordered zebra" style="text-align: center">
                <thead>
                <th width="5%">No</th>
                <th width="10%">Subdit</th>
                <th width="10%">SP2D Sukses</th>
                <th width="10%">SPT Sukses</th>
                <th width="10%">Total/Bobot</th>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sp2d = 0;
                    $spt = 0;
                    foreach ($this->bobot as $bot) {
                        $sp2d = $bot->get_sp2d_pkn() / 100;
                        $spt = $bot->get_spt_pkn() / 100;
                    }
                    foreach ($this->data as $val) {
                        if($val->get_kd_d_sp2d_persen()<1){
                            $kd_d_sp2d = "-";
                            $kd_d_spt = $val->get_kd_d_spt_persen()."%";
                            $total = $val->get_kd_d_spt_persen()."%";
                        }elseif($val->get_kd_d_spt_persen()<1){
                            $kd_d_sp2d = $val->get_kd_d_sp2d_persen()."%";
                            $kd_d_spt = "-";
                            $total = $val->get_kd_d_sp2d_persen()."%";
                        }else{
                            $kd_d_sp2d = $val->get_kd_d_sp2d_persen()."%";
                            $kd_d_spt = $val->get_kd_d_spt_persen()."%";
                            $total = ((int) ((($val->get_kd_d_sp2d_persen() * $sp2d) + ($val->get_kd_d_spt_persen() * $spt))))."%";
                        }
                        echo "<tr>";
                        echo "<td>$no</td>";
                        if ($val->get_kd_d_user() == 88881) {
                            echo "<td><a href=" . URL . "dataPkn/viewDataPKNLvl3/" . $val->get_kd_d_user() . " target=_blank> RKN </td>";
                        } else if ($val->get_kd_d_user() == 88882) {
                            echo "<td><a href=" . URL . "dataPkn/viewDataPKNLvl3/" . $val->get_kd_d_user() . " target=_blank>RKUN</td>";
                        } else if ($val->get_kd_d_user() == 88883) {
                            echo "<td><a href=" . URL . "dataPkn/viewDataPKNLvl3/" . $val->get_kd_d_user() . " target=_blank>RPH</td>";
                        } else if ($val->get_kd_d_user() == 88884) {
                            echo "<td><a href=" . URL . "dataPkn/viewDataPKNLvl3/" . $val->get_kd_d_user() . " target=_blank>RPL</td>";
                        } else {
                            echo "<td>subdit salah";
                        }
                        echo "<td><b>" . $kd_d_sp2d . "</td>";
                        echo "<td><b>" . $kd_d_spt . "</b></td>";
                        echo "<td><b>" . $total. "</b></td>";
                        echo "<tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </fieldset>
</div> <!--end modal-->
</div>
</div>
<script type="text/javascript">
    var add_data = false;
    $(function() {
        page = 1;
        maxPerPage = 10;
        dataPosition = 1;
        numOfPage = 0;
        data = null;
        url = '<?php echo URL; ?>dataPkn/data_nav';
        url_data = '<?php echo URL; ?>dataPkn/get_data_pkn_array';
        var divContainer = "table";
        maxPerPage = 10;
        //console.log(PagingClass);
        createPaging(url, url_data, page, maxPerPage, divContainer);
        hideErrorId();
        hideWarning();

        $('#batal').click(function() {
            emptyField();
            hideErrorId();
            hideWarning();
            $('#form_input').dialog('close');
        })

        $('#submit').click(function() {
            return cek();
            $('#form_input').dialog('close');

        });

<?php if (isset($this->d_ubah)) { ?>
            $('#form_input').dialog('open');
<?php } ?>

    });

    function rekam() {
        var formData = new FormData($('#form_rekam')[0]);
        if (add_data) {
            var url_rekam = "<?php echo URL; ?>dataPkn/addDataPkn";
        } else {
            var url_rekam = "<?php echo URL; ?>dataPkn/updDataPkn";
        }
        $.ajax({
            url: url_rekam,
            type: 'POST',
            data: formData,
            async: false,
            success: function() {
                $('#form_input').dialog('close');
                window.location.href = '<?php echo URL; ?>dataPkn/addDataPkn'
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }

    function emptyField() {
        $('#kd_d_tgl').val('');
        $('#kd_d_sp2d').val('');
        $('#kd_d_sp2d_gagal').val('');
        $('#kd_d_spt').val('');
        $('#kd_d_spt_gagal').val('');
    }

    function addData() {
        //TODO open dialog form add data kppn
        add_data = true;
        $('#form_input').dialog('open');
    }

    $('#form_input').dialog({
        autoOpen: false,
        width: 400,
        height: 300,
        modal: true,
        title: '<?php
if (isset($this->d_ubah)) {
    echo 'Ubah Data PKN';
} else {
    echo 'Tambah Data PKN';
}
?>',
        close: function() {
            emptyField();
            hideErrorId();
            hideWarning();
        }

    });

    function hideErrorId() {
        $('.error').fadeOut(0);
    }

    function isDoubleData() {
        var tgl_input = document.getElementById('kd_d_tgl').value;
        console.log(tgl_input);
        $.post("<?php echo URL; ?>dataPkn/is_double_data", {tgl: "" + tgl_input + ""},
        function(data) {
            console.log(data);
            var count = parseInt(data);
            if (data > 0) {
                var warn = "data pernah direkam, lakukan ubah data!";
                $('#wdouble').fadeIn();
                $('#wdouble').html(warn);
                return false;
            } else {
                rekam();
                return true;
            }
        });
    }

    function hideWarning() {
        $('#kd_d_user').keyup(function() {
            if (document.getElementById('kd_d_user').value != '') {
                $('#wuser').fadeOut(200);
            }
        })

        $('#kd_d_tgl').change(function() {
            if (document.getElementById('kd_d_tgl').value != '') {
                $('#wtgl').fadeOut(200);
            }
        })

        $('#kd_d_sp2d').keyup(function() {
            if (document.getElementById('kd_d_sp2d').value != '') {
                $('#wsp2d').fadeOut(200);
            }
        })

        $('#kd_d_sp2d_gagal').keyup(function() {
            if (document.getElementById('kd_d_sp2d_gagal').value != '') {
                $('#wsp2d_gagal').fadeOut(200);
            }
        })

        $('#kd_d_spt').keyup(function() {
            if (document.getElementById('kd_d_spt').value != '') {
                $('#wspt').fadeOut(200);
            }
        })

        $('#kd_d_spt_gagal').keyup(function() {
            if (document.getElementById('kd_d_spt_gagal').value != '') {
                $('#wspt_gagal').fadeOut(200);
            }
        })

    }

    $(function() {
        $("#kd_d_tgl").datepicker({dateFormat: "yy-mm-dd"
                    //            buttonImage:'images/calendar.gif',
                    //            buttonImageOnly: true,
                    //            showOn: 'button'
        });
    });

    function del(user) {
        var text = "Yakin data Tanggal " + user + " akan dihapus?";
        if (confirm(text)) {
            return true;
        } else {
            return false;
        }
    }

    function cek() {
        var pattern = '^[0-9]+$';
        var kd_d_user = document.getElementById('kd_d_user').value;
        var kd_d_tgl = document.getElementById('kd_d_tgl').value;
        var kd_d_sp2d = document.getElementById('kd_d_sp2d').value;
        var kd_d_sp2d_gagal = document.getElementById('kd_d_sp2d_gagal').value;
        var kd_d_spt = document.getElementById('kd_d_spt').value;
        var kd_d_spt_gagal = document.getElementById('kd_d_spt_gagal').value;
        var jml = 0;
        if (kd_d_user == '') {
            var wuser = 'User harus diisi!';
            $('#wuser').fadeIn(0);
            $('#wuser').html(wuser);
            jml++;
        }

        if (kd_d_tgl == '') {
            var wtgl = 'Tanggal harus diisi!';
            $('#wtgl').fadeIn(0);
            $('#wtgl').html(wtgl);
            jml++;
        }

        if (!kd_d_sp2d.match(pattern)) {
            var wsp2d = "Jumlah SP2D harus dalam bentuk angka!";
            $('#wsp2d').html(wsp2d);
            $('#wsp2dt').fadeIn(200);
            jml++;
        }

        if (kd_d_sp2d == '') {
            var wsp2d = 'SP2d harus diisi!';
            $('#wsp2d').fadeIn(0);
            $('#wsp2d').html(wsp2d);
            jml++;
        }

        if (!kd_d_sp2d_gagal.match(pattern)) {
            var wsp2d_gagal = "Jumlah SP2D harus dalam bentuk angka!";
            $('#wsp2d_gagal').html(wsp2d_gagal);
            $('#wsp2d_gagal').fadeIn(200);
            jml++;
        }

        if (kd_d_sp2d_gagal == '') {
            var wsp2d_gagal = 'SP2D harus diisi!';
            $('#wsp2d_gagal').fadeIn(0);
            $('#wsp2d_gagal').html(wsp2d_gagal);
            jml++;
        }

        if (!kd_d_spt.match(pattern)) {
            var wspt = "Jumlah SPT harus dalam bentuk angka!";
            $('#wspt').html(wspt);
            $('#wspt').fadeIn(200);
            jml++;
        }

        if (kd_d_spt == '') {
            var wspt = 'SPT harus diisi!';
            $('#wspt').fadeIn(0);
            $('#wspt').html(wspt);
            jml++;
        }

        if (!kd_d_spt_gagal.match(pattern)) {
            var wspt_gagal = "Jumlah SPT harus dalam bentuk angka!";
            $('#wspt_gagal').html(wspt_gagal);
            $('#wspt_gagal').fadeIn(200);
            jml++;
        }

        if (kd_d_spt_gagal == '') {
            var wspt_gagal = 'SPT harus diisi!';
            $('#wspt_gagal').fadeIn(0);
            $('#wspt_gagal').html(wspt_gagal);
            jml++;
        }

        if (jml > 0) {
            return false
        } else {
            if (add_data) {
                console.log(isDoubleData());
                return isDoubleData();
            }
            rekam();
            return true;
        }
    }
</script>