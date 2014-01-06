<h2>DATA JARINGAN</h2>
<div id="top">
    <?php if (Session::get('role') != ADMIN) { ?>
        <a href="#oModal" class="modal">INPUT JARINGAN</a><br><br>
        <div id="oModal" class="modalDialog" >
            <div>
                <!--h2>INPUT JARINGAN</h2-->
                <h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px">
                    <?php
                    if (isset($this->d_ubah)) {
                        echo 'Ubah Data Jaringa';
                    } else {
                        echo 'Tambah Data Jaringan';
                        //echo Session::get('id_user');
                    }
                    ?></h2>

                <a href="<?php
                if (isset($this->d_ubah)) {
                    echo URL . 'dataJaringan/addDataJaringan';
                } else {
                    $_SERVER['PHP_SELF'];
                }
                ?>" title="Tutup" class="close"><i class="icon-remove icon-white" style="margin-left: 4px; margin-top: 0px"></i></a>
                <div id="top">
                    <form method="POST" action="<?php
                    if (isset($this->d_ubah)) {
                        echo URL . 'dataJaringan/updDataJaringan';
                    } else {
                        $_SERVER['PHP_SELF'];
                    }
                    ?>">
                              <?php
                              if (isset($this->d_ubah)) {
                                  echo "<input type=hidden name='kd_d_jar' value=" . $this->d_ubah->get_kd_d_jar() . ">";
                              }

                              if (isset($this->error)) {
                                  echo "<div class=error>" . $this->error . "</div>";
                              }
                              ?>

                        <input type="hidden" name="kd_d_user" id="kd_d_user" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_user() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_user() : '88888'); ?>">

                        <div id="wtgl"  class="error"></div>
                        <label class="isian">Tanggal</label><input type="text" name="tgl_jar" id="tgl_jar" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_tgl_jar() : (isset($this->d_rekam) ? $this->d_rekam->get_tgl_jar() : ''); ?>">

                        <div id="wjar"  class="error"></div>
                        <label class="isian">Uraian Jaringan</label><textarea type="text" name="jaringan" id="jaringan" rows="7" value="<?php //echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_jar() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_jar() : '');  ?>"><?php echo isset($this->d_ubah) ? $this->d_ubah->get_jaringan() : (isset($this->d_rekam) ? $this->d_rekam->get_jaringan() : ''); ?></textarea>

                        <ul class="inline" style="margin-left: 200px">
                            <li><input class="sukses" type="submit" name="<?php echo isset($this->d_ubah) ? 'upd_d_jar' : 'add_d_jar'; ?>" value="SIMPAN" onClick="return cek();"></li>
                                                        <!--li><input class="normal" type="reset" onclick="" value="BATAL"></li-->
                        </ul>
                    </form>
                </div>
            </div>
        </div>

<?php } ?>
    <div class="kolom" id="table">
        <fieldset><legend>Data Jaringan</legend>
            <table class="table-bordered zebra scroll">
                <thead>
                    <tr>
                        <?php
                        if (Session::get('role') == ADMIN OR Session::get('role') == Lainya) {
                            echo "<th>No</th>";
                            echo "<th width ='20%'>Tanggal</th>";
                            echo "<th width ='20%'>User</th>";
                            echo "<th width ='60%'>Jaringan</th>";
                        } else {
                            echo "<th>No</th>";
                            echo "<th width ='20%'>Tanggal</th>";
                            echo "<th width ='70%'>Jaringan</th>";
                            echo "<th width ='10%'>Aksi</th>";
                        }
                        ?>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($this->data as $val) {
                        //var_dump($val);
                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td>" . date("d/m/Y", strtotime($val->get_tgl_jar())) . "</td>";
                        if (Session::get('role') == ADMIN OR Session::get('role') == Lainya) {
                            echo "<td>" . $val->get_kd_d_user() . "</td>";
                            echo "<td>" . $val->get_jaringan() . "</td>";
                        } else {
                            echo "<td>" . $val->get_jaringan() . "</td>";

                            echo "<td style='text-align: center'>
								
								<a href=" . URL . "dataJaringan/delDataJaringan/" . $val->get_kd_d_jar() . " onclick=\"return del('" . date("d/m/Y", strtotime($val->get_tgl_jar())) . "')\"><i class=\"icon-trash\"></i></a>
							
								<a href=" . URL . "dataJaringan/addDataJaringan/" . $val->get_kd_d_jar() . "#oModal><i class=\"icon-pencil\"></i></a>
								</td>";
                        }
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </fieldset>
    </div>
</div><!--end top-->

<script type="text/javascript">
    $(function() {
        hideErrorId();
        hideWarning();

    });

    function hideErrorId() {
        $('.error').fadeOut(0);
    }

    function hideWarning() {
        $('#kd_d_user').keyup(function() {
            if (document.getElementById('kd_d_user').value != '') {
                $('#wuser').fadeOut(200);
            }
        })

        $('#kd_tgl_jar').change(function() {
            if (document.getElementById('tgl_jar').value != '') {
                $('#wtgl').fadeOut(200);
            }
        })

        $('#kd_jaringan').keyup(function() {
            if (document.getElementById('jaringan').value != '') {
                $('#wjar').fadeOut(200);
            }
        })

    }

    $(function() {
        $("#tgl_jar").datepicker({dateFormat: "yy-mm-dd"
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
        var tgl_jar = document.getElementById('tgl_jar').value;
        var jaringan = document.getElementById('jaringan').value;

        var jml = 0;
        if (kd_d_user == '') {
            var wuser = 'User harus diisi!';
            $('#wuser').fadeIn(0);
            $('#wuser').html(wuser);
            jml++;
        }

        if (tgl_jar == '') {
            var wtgl = 'Tanggal harus diisi!';
            $('#wtgl').fadeIn(0);
            $('#wtgl').html(wtgl);
            jml++;
        }

        if (jaringan == '') {
            var wjar = 'Jaringan harus diisi!';
            $('#wjar').fadeIn(0);
            $('#wjar').html(wjar);
            jml++;
        }

        if (jml > 0) {
            return false
        } else {
            return true;
        }
    }
</script>