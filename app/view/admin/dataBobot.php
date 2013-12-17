<div id="top">
    <div id="form">
        <h2>DATA BOBOT</h2></div>
    <div class="tiga">
        <div class="kolom">
            <fieldset>
                <legend>
                    <?php
                    echo 'Level 1';
                    ?>
                </legend>
                <div id="form-input"><div class="kiris">
                        <form method="POST" action="
                        <?php
                        $_SERVER['PHP_SELF'];
                        ?>
                              ">
                                  <?php
                                  if (isset($this->error)) {
                                      echo "<div class=error>" . $this->error . "</div>";
                                  }
                                  $kppn = '';
                                  $ba = '';
                                  $pkn = '';
                                  $konversi = '';
                                  $sp2d = '';
                                  $lhp = '';
                                  $rekon = '';
                                  $spm_ba = '';
                                  $rekon_ba = '';
                                  $kontrak_ba = '';
                                  $sp2d_pkn = '';
                                  $spt_pkn = '';
                                  foreach ($this->data as $value) {
                                      $kppn = $value->get_kppn();
                                      $ba = $value->get_ba();
                                      $pkn = $value->get_pkn();
                                      $konversi = $value->get_konversi();
                                      $sp2d = $value->get_sp2d();
                                      $lhp = $value->get_lhp();
                                      $rekon = $value->get_rekon();
                                      $spm_ba = $value->get_spm_ba();
                                      $rekon_ba = $value->get_rekon_ba();
                                      $kontrak_ba = $value->get_kontrak_ba();
                                      $sp2d_pkn = $value->get_sp2d_pkn();
                                      $spt_pkn = $value->get_spt_pkn();
                                  }
                                  ?>
                            <input type="hidden" name="konversi" id="" size="8" value="<?php echo $konversi ?>">
                            <input type="hidden" name="sp2d" id="" size="8" value="<?php echo $sp2d ?>">
                            <input type="hidden" name="lhp" id="" size="8" value="<?php echo $lhp ?>">
                            <input type="hidden" name="rekon" id="" size="8" value="<?php echo $rekon ?>">
                            <input type="hidden" name="spm_ba" id="" size="8" value="<?php echo $spm_ba ?>">
                            <input type="hidden" name="rekon_ba" id="" size="8" value="<?php echo $rekon_ba ?>">
                            <input type="hidden" name="kontrak_ba" id="" size="8" value="<?php echo $kontrak_ba ?>">
                            <input type="hidden" name="sp2d_pkn" id="" size="8" value="<?php echo $sp2d_pkn ?>">
                            <input type="hidden" name="spt_pkn" id="" size="8" value="<?php echo $spt_pkn ?>">
                            <div id="wkppn" class="error"></div>
                            <label class="isian" >KPPN</label><input type="number" name="kppn" id="kppn" size="8" value="<?php echo $kppn ?>">
                            <div id="wba" class="error"></div>
                            <label class="isian" >BA.999</label><input type="number" name="ba" id="ba" size="8" value="<?php echo $ba ?>">
                            <div id="wpkn" class="error"></div>
                            <label class="isian">PKN</label><input type="number" name="pkn" id="pkn" size="8" value="<?php echo $pkn ?>">
                            </select>
                            <ul class="inline tengah1">
                                <li><input class="normal" type="submit" onclick="" value="BATAL"></li>
                                <li><input class="sukses" type="submit" name="upd_bobot" value="SIMPAN" onclick="return ceklvl1();"></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div> <!--end kolom1-->



        <div class="kolomx">
            <fieldset><legend><?php
                    echo 'Level 2 KPPN';
                    ?></legend>
                <div id="form-input"><div class="kiris">
                        <form method="POST" action="<?php
                        $_SERVER['PHP_SELF'];
                        ?>">
                                  <?php
                                  echo "<div class=error>" . $this->error . "</div>";
                                  ?>
                            <input type="hidden" name="kppn" id="" size="8" value="<?php echo $kppn ?>">
                            <input type="hidden" name="ba" id="" size="8" value="<?php echo $ba ?>">
                            <input type="hidden" name="pkn" id="" size="8" value="<?php echo $pkn ?>">
                            <input type="hidden" name="spm_ba" id="" size="8" value="<?php echo $spm_ba ?>">
                            <input type="hidden" name="rekon_ba" id="" size="8" value="<?php echo $rekon_ba ?>">
                            <input type="hidden" name="kontrak_ba" id="" size="8" value="<?php echo $kontrak_ba ?>">
                            <input type="hidden" name="sp2d_pkn" id="" size="8" value="<?php echo $sp2d_pkn ?>">
                            <input type="hidden" name="spt_pkn" id="" size="8" value="<?php echo $spt_pkn ?>">
                            <div id="wkonversi" class="error"></div>
                            <label class="isian">Konversi</label><input type="number" name="konversi" id="konversi" size="8" value="<?php echo $konversi ?>">
                            <div id="wsp2d" class="error"></div>
                            <label class="isian">SP2D</label><input type="number" name="sp2d" id="sp2d" size="8" value="<?php echo $sp2d ?>">
                            <div id="wlhp" class="error"></div>
                            <label class="isian">LHP</label><input type="number" name="lhp" id="lhp" size="8" value="<?php echo $lhp ?>">
                            <div id="wrekon"  class="error"></div>
                            <label class="isian">REKON</label><input type="number" name="rekon" id="rekon" size="50" value="<?php echo $rekon ?>">
                            </select>
                            <ul class="inline tengah1">
                                <li><input class="normal" type="submit" onclick="" value="BATAL"></li>
                                <li><input class="sukses" type="submit" name="upd_bobot" value="SIMPAN" onclick="return ceklvl2kppn();"></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div> <!--end kolom2-->



        <div class="kolomy">
            <fieldset><legend><?php
                    echo 'Level 2 BA.999';
                    ?></legend>
                <div id="form-input"><div class="kiris">
                        <form method="POST" action="<?php
                        $_SERVER['PHP_SELF'];
                        ?>">
                                  <?php
                                  if (isset($this->error)) {
                                      echo "<div class=error>" . $this->error . "</div>";
                                  }
                                  ?>

                            <input type="hidden" name="kppn" id="" size="8" value="<?php echo $kppn ?>">
                            <input type="hidden" name="ba" id="" size="8" value="<?php echo $ba ?>">
                            <input type="hidden" name="pkn" id="" size="8" value="<?php echo $pkn ?>">
                            <input type="hidden" name="konversi" id="" size="8" value="<?php echo $konversi ?>">
                            <input type="hidden" name="sp2d" id="" size="8" value="<?php echo $sp2d ?>">
                            <input type="hidden" name="lhp" id="" size="8" value="<?php echo $lhp ?>">
                            <input type="hidden" name="rekon" id="" size="8" value="<?php echo $rekon ?>">
                            <input type="hidden" name="sp2d_pkn" id="" size="8" value="<?php echo $sp2d_pkn ?>">
                            <input type="hidden" name="spt_pkn" id="" size="8" value="<?php echo $spt_pkn ?>">
                            <div id="wspm_ba" class="error"></div>
                            <label class="isian">SPM</label><input type="number" name="spm_ba" id="spm_ba" size="8" value="<?php echo $spm_ba ?>">
                            <div id="wkontrak_ba" class="error"></div>
                            <label class="isian">KONTRAK</label><input type="number" name="kontrak_ba" id="kontrak_ba" size="8" value="<?php echo $kontrak_ba ?>">
                            <div id="wrekon_ba"  class="error"></div>
                            <label class="isian">REKON</label><input type="number" name="rekon_ba" id="rekon_ba" size="50" value="<?php echo $rekon_ba ?>">
                            </select>
                            <ul class="inline tengah1">
                                <li><input class="normal" type="submit" onclick="" value="BATAL"></li>
                                <li><input class="sukses" type="submit" name="upd_bobot" value="SIMPAN" onclick="return ceklvl2ba();"></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </fieldset>

        </div>

        <div class="kolomz">
            <fieldset><legend><?php
                    echo 'Level 2 PKN';
                    ?></legend>
                <div id="form-input"><div class="kiris">
                        <form method="POST" action="<?php
                        $_SERVER['PHP_SELF'];
                        ?>">
                                  <?php
                                  if (isset($this->error)) {
                                      echo "<div class=error>" . $this->error . "</div>";
                                  }
                                  ?>

                            <input type="hidden" name="kppn" id="" size="8" value="<?php echo $kppn ?>">
                            <input type="hidden" name="ba" id="" size="8" value="<?php echo $ba ?>">
                            <input type="hidden" name="pkn" id="" size="8" value="<?php echo $pkn ?>">
                            <input type="hidden" name="konversi" id="" size="8" value="<?php echo $konversi ?>">
                            <input type="hidden" name="sp2d" id="" size="8" value="<?php echo $sp2d ?>">
                            <input type="hidden" name="lhp" id="" size="8" value="<?php echo $lhp ?>">
                            <input type="hidden" name="rekon" id="" size="8" value="<?php echo $rekon ?>">
                            <input type="hidden" name="spm_ba" id="" size="8" value="<?php echo $spm_ba ?>">
                            <input type="hidden" name="rekon_ba" id="" size="8" value="<?php echo $rekon_ba ?>">
                            <input type="hidden" name="kontrak_ba" id="" size="8" value="<?php echo $kontrak_ba ?>">
                            <div id="wsp2d_pkn" class="error"></div>
                            <label class="isian">SP2D</label><input type="number" name="sp2d_pkn" id="sp2d_pkn" size="8" value="<?php echo $sp2d_pkn ?>">
                            <div id="wspt_pkn" class="error"></div>
                            <label class="isian">SPT</label><input type="number" name="spt_pkn" id="spt_pkn" size="8" value="<?php echo $spt_pkn ?>">
                            </select>
                            <ul class="inline tengah1">
                                <li><input class="normal" type="submit" onclick="" value="BATAL"></li>
                                <li><input class="sukses" type="submit" name="upd_bobot" value="SIMPAN" onclick="return ceklvl2pkn();"></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </fieldset>

        </div>
    </div> <!--end tiga kolom-->
</div> <!--end top-->

<script type="text/javascript">
    $(function() {
        hideErrorId();
        hideWarning();

    });

    function hideErrorId() {
        $('.error').fadeOut(0);
    }

    function hideWarning() {
        $('#kppn').keyup(function() {
            if (document.getElementById('kppn').value != '') {
                $('#wkppn').fadeOut(200);
            }
            if ((parseInt(document.getElementById('kppn').value) + parseInt(document.getElementById('ba').value) + parseInt(document.getElementById('pkn').value)) == 100) {
                $('#wkppn').fadeOut(200);
            }
        })

        $('#ba').keyup(function() {
            if (document.getElementById('ba').value != '') {
                $('#wba').fadeOut(200);
            }
            if ((parseInt(document.getElementById('kppn').value) + parseInt(document.getElementById('ba').value) + parseInt(document.getElementById('pkn').value)) == 100) {
                $('#wkppn').fadeOut(200);
            }
        })

        $('#pkn').keyup(function() {
            if (document.getElementById('pkn').value != '') {
                $('#wpkn').fadeOut(200);
            }
            if ((parseInt(document.getElementById('kppn').value) + parseInt(document.getElementById('ba').value) + parseInt(document.getElementById('pkn').value)) == 100) {
                $('#wkppn').fadeOut(200);
            }
        })

        $('#konversi').keyup(function() {
            if (document.getElementById('konversi').value != '') {
                $('#wkonversi').fadeOut(200);
            }
            if ((parseInt(document.getElementById('konversi').value)
                    + parseInt(document.getElementById('sp2d').value)
                    + parseInt(document.getElementById('lhp').value)
                    + parseInt(document.getElementById('rekon').value)) == 100) {
                $('#wkonversi').fadeOut(200);
            }
        })

        $('#sp2d').keyup(function() {
            if (document.getElementById('sp2d').value != '') {
                $('#wsp2d').fadeOut(200);
            }
            if ((parseInt(document.getElementById('konversi').value)
                    + parseInt(document.getElementById('sp2d').value)
                    + parseInt(document.getElementById('lhp').value)
                    + parseInt(document.getElementById('rekon').value)) == 100) {
                $('#wkonversi').fadeOut(200);
            }
        })

        $('#lhp').keyup(function() {
            if (document.getElementById('lhp').value != '') {
                $('#wlhp').fadeOut(200);
            }
            if ((parseInt(document.getElementById('konversi').value)
                    + parseInt(document.getElementById('sp2d').value)
                    + parseInt(document.getElementById('lhp').value)
                    + parseInt(document.getElementById('rekon').value)) == 100) {
                $('#wkonversi').fadeOut(200);
            }
        })

        $('#rekon').keyup(function() {
            if (document.getElementById('rekon').value != '') {
                $('#wrekon').fadeOut(200);
            }
            if ((parseInt(document.getElementById('konversi').value)
                    + parseInt(document.getElementById('sp2d').value)
                    + parseInt(document.getElementById('lhp').value)
                    + parseInt(document.getElementById('rekon').value)) == 100) {
                $('#wkonversi').fadeOut(200);
            }
        })

        $('#spm_ba').keyup(function() {
            if (document.getElementById('spm_ba').value != '') {
                $('#wspm_ba').fadeOut(200);
            }
            if ((parseInt(document.getElementById('spm_ba').value)
                    + parseInt(document.getElementById('rekon_ba').value)
                    + parseInt(document.getElementById('kontrak_ba').value)) == 100) {
                $('#wspm_ba').fadeOut(200);
            }
        })

        $('#rekon_ba').keyup(function() {
            if (document.getElementById('rekon_ba').value != '') {
                $('#wrekon_ba').fadeOut(200);
            }
            if ((parseInt(document.getElementById('spm_ba').value)
                    + parseInt(document.getElementById('rekon_ba').value)
                    + parseInt(document.getElementById('kontrak_ba').value)) == 100) {
                $('#wspm_ba').fadeOut(200);
            }
        })

        $('#kontrak_ba').keyup(function() {
            if (document.getElementById('kontrak_ba').value != '') {
                $('#wkontrak_ba').fadeOut(200);
            }
            if ((parseInt(document.getElementById('spm_ba').value)
                    + parseInt(document.getElementById('rekon_ba').value)
                    + parseInt(document.getElementById('kontrak_ba').value)) == 100) {
                $('#wspm_ba').fadeOut(200);
            }
        })

        $('#sp2d_pkn').keyup(function() {
            if (document.getElementById('sp2d_pkn').value != '') {
                $('#wsp2d_pkn').fadeOut(200);
            }
            if ((parseInt(document.getElementById('sp2d_pkn').value)
                    + parseInt(document.getElementById('spt_pkn').value)) == 100) {
                $('#wsp2d_pkn').fadeOut(200);
            }
        })

        $('#spt_pkn').keyup(function() {
            if (document.getElementById('spt_pkn').value != '') {
                $('#wspt_pkn').fadeOut(200);
            }
            if ((parseInt(document.getElementById('sp2d_pkn').value)
                    + parseInt(document.getElementById('spt_pkn').value)) == 100) {
                $('#wsp2d_pkn').fadeOut(200);
            }
        })

    }

    function ceklvl1() {
        var pattern = '^[0-9]+$';
        var kppn = document.getElementById('kppn').value;
        var ba = document.getElementById('ba').value;
        var pkn = document.getElementById('pkn').value;
        var all = parseInt(kppn) + parseInt(ba) + parseInt(pkn);
        var jml = 0;

        if ((all) != '100') {
            var wkppn = 'Jumlah Bobot KPPN + BA + PKN Harus 100 !';
            $('#wkppn').html(wkppn);
            $('#wkppn').fadeIn(200);
            jml++;
        }

        if (!kppn.match(pattern)) {
            var wkppn = 'Bobot KPPN harus dalam bentuk angka!';
            $('#wkppn').html(wkppn);
            $('#wkppn').fadeIn(200);
            jml++;
        }

        if (kppn == '') {
            var wkppn = 'Bobot KPPN harus diisi!';
            $('#wkppn').fadeIn(0);
            $('#wkppn').html(wkppn);
            jml++;
        }

        if (!ba.match(pattern)) {
            var wba = 'Bobot BA.999 harus dalam bentuk angka!';
            $('#wba').html(wba);
            $('#wba').fadeIn(200);
            jml++;
        }

        if (ba == '') {
            var wba = 'Bobot BA harus diisi!';
            $('#wba').fadeIn(0);
            $('#wba').html(wba);
            jml++;
        }

        if (!pkn.match(pattern)) {
            var wpkn = 'Bobot PKN harus dalam bentuk angka!';
            $('#wpkn').html(wpkn);
            $('#wpkn').fadeIn(200);
            jml++;
        }

        if (pkn == '') {
            var wpkn = 'Bobot PKN harus diisi!';
            $('#wpkn').fadeIn(0);
            $('#wpkn').html(wpkn);
            jml++;
        }

        if (jml > 0) {
            return false
        } else {
            return true;
        }

    }

    function ceklvl2kppn() {
        var pattern = '^[0-9]+$';
        var konversi = document.getElementById('konversi').value;
        var sp2d = document.getElementById('sp2d').value;
        var lhp = document.getElementById('lhp').value;
        var rekon = document.getElementById('rekon').value;
        var all = parseInt(konversi) + parseInt(sp2d) + parseInt(lhp) + parseInt(rekon);
        var jml = 0;

        if ((all) != '100') {
            var wkonversi = 'Jumlah Bobot Konversi + SP2D + LHP + Rekon Harus 100 !';
            $('#wkonversi').html(wkonversi);
            $('#wkonversi').fadeIn(200);
            jml++;
        }

        if (!konversi.match(pattern)) {
            var wkonversi = 'Bobot Konversi harus dalam bentuk angka!';
            $('#wkonversi').html(wkonversi);
            $('#wkonversi').fadeIn(200);
            jml++;
        }

        if (konversi == '') {
            var wkonversi = 'Bobot Konversi harus diisi!';
            $('#wkonversi').fadeIn(0);
            $('#wkonversi').html(wkonversi);
            jml++;
        }

        if (!sp2d.match(pattern)) {
            var wsp2d = 'Bobot SP2D harus dalam bentuk angka!';
            $('#wsp2d').html(wsp2d);
            $('#wsp2d').fadeIn(200);
            jml++;
        }

        if (sp2d == '') {
            var wsp2d = 'Bobot SP2D harus diisi!';
            $('#wsp2d').fadeIn(0);
            $('#wsp2d').html(wsp2d);
            jml++;
        }

        if (!lhp.match(pattern)) {
            var wlhp = 'Bobot LHP harus dalam bentuk angka!';
            $('#wlhp').html(wlhp);
            $('#wlhp').fadeIn(200);
            jml++;
        }

        if (lhp == '') {
            var wlhp = 'Bobot LHP harus diisi!';
            $('#wlhp').fadeIn(0);
            $('#wlhp').html(wlhp);
            jml++;
        }

        if (!rekon.match(pattern)) {
            var wrekon = 'Bobot Rekon harus dalam bentuk angka!';
            $('#wrekon').html(wrekon);
            $('#wrekon').fadeIn(200);
            jml++;
        }

        if (rekon == '') {
            var wrekon = 'Bobot Rekon harus diisi!';
            $('#wrekon').fadeIn(0);
            $('#wrekon').html(wrekon);
            jml++;
        }

        if (jml > 0) {
            return false
        } else {
            return true;
        }

    }

    function ceklvl2ba() {
        var pattern = '^[0-9]+$';
        var spm_ba = document.getElementById('spm_ba').value;
        var rekon_ba = document.getElementById('rekon_ba').value;
        var kontrak_ba = document.getElementById('kontrak_ba').value;
        var all = parseInt(spm_ba) + parseInt(rekon_ba) + parseInt(kontrak_ba);
        var jml = 0;

        if ((all) != '100') {
            var wspm_ba = 'Jumlah Bobot SPM + Rekon + Kontrak BA.999 Harus 100 !';
            $('#wspm_ba').html(wspm_ba);
            $('#wspm_ba').fadeIn(200);
            jml++;
        }

        if (!spm_ba.match(pattern)) {
            var wspm_ba = 'Bobot SPM BA.999 harus dalam bentuk angka!';
            $('#wspm_ba').html(wspm_ba);
            $('#wspm_ba').fadeIn(200);
            jml++;
        }

        if (spm_ba == '') {
            var wspm_ba = 'Bobot SPM BA.999 harus diisi!';
            $('#wspm_ba').fadeIn(0);
            $('#wspm_ba').html(wspm_ba);
            jml++;
        }

        if (!rekon_ba.match(pattern)) {
            var wrekon_ba = 'Bobot Rekon BA.999 harus dalam bentuk angka!';
            $('#wrekon_ba').html(wrekon_ba);
            $('#wrekon_ba').fadeIn(200);
            jml++;
        }

        if (rekon_ba == '') {
            var wrekon_ba = 'Bobot Rekon BA.999 harus diisi!';
            $('#wrekon_ba').fadeIn(0);
            $('#wrekon_ba').html(wrekon_ba);
            jml++;
        }

        if (!kontrak_ba.match(pattern)) {
            var wkontrak_ba = 'Bobot Kontrak BA.999 harus dalam bentuk angka!';
            $('#wkontrak_ba').html(wkontrak_ba);
            $('#wkontrak_ba').fadeIn(200);
            jml++;
        }

        if (kontrak_ba == '') {
            var wkontrak_ba = 'Bobot Kontrak BA.999 harus diisi!';
            $('#wkontrak_ba').fadeIn(0);
            $('#wkontrak_ba').html(wkontrak_ba);
            jml++;
        }

        if (jml > 0) {
            return false
        } else {
            return true;
        }

    }

    function ceklvl2pkn() {
        var pattern = '^[0-9]+$';
        var sp2d_pkn = document.getElementById('sp2d_pkn').value;
        var spt_pkn = document.getElementById('spt_pkn').value;
        var all = parseInt(sp2d_pkn) + parseInt(spt_pkn);
        var jml = 0;

        if ((all) != '100') {
            var wsp2d_pkn = 'Jumlah Bobot SP2D + SPT PKN Harus 100 !';
            $('#wsp2d_pkn').html(wsp2d_pkn);
            $('#wsp2d_pkn').fadeIn(200);
            jml++;
        }

        if (!sp2d_pkn.match(pattern)) {
            var wsp2d_pkn = 'Bobot SP2D PKN harus dalam bentuk angka!';
            $('#wsp2d_pkn').html(wsp2d_pkn);
            $('#wsp2d_pkn').fadeIn(200);
            jml++;
        }

        if (sp2d_pkn == '') {
            var wsp2d_pkn = 'Bobot SP2D PKN harus diisi!';
            $('#wsp2d_pkn').fadeIn(0);
            $('#wsp2d_pkn').html(wsp2d_pkn);
            jml++;
        }

        if (!spt_pkn.match(pattern)) {
            var wspt_pkn = 'Bobot SPM PKN harus dalam bentuk angka!';
            $('#wspt_pkn').html(wspt_pkn);
            $('#wspt_pkn').fadeIn(200);
            jml++;
        }

        if (spt_pkn == '') {
            var wspt_pkn = 'Bobot SPT PKN harus diisi!';
            $('#wspt_pkn').fadeIn(0);
            $('#wspt_pkn').html(wspt_pkn);
            jml++;
        }


        if (jml > 0) {
            return false
        } else {
            return true;
        }

    }
</script>