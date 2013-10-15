<h2>MONITORING DATA BA 999</h2>
<center><?php $this->load('dasbor/baLvl2') ?></center>
<div id="top">
    <div id="form">
        <div class="kolom3">
            <fieldset>
                <legend>
                    <?php
                    if (isset($this->d_ubah)) {
                        echo 'Ubah Data ba';
                    } else {
                        echo 'Tambah Data ba';
                    }
                    ?>
                </legend>
                <div id="form-input">
                    <div class="kiri">
                        <form method="POST" action="
                        <?php
                        if (isset($this->d_ubah)) {
                            echo URL . 'dataBa/updDataBa';
                        } else {
                            $_SERVER['PHP_SELF'];
                        }
                        ?>">
                                  <?php
                                  if (isset($this->d_ubah)) {
                                      echo "<input type=hidden name='kd_d_ba' value=" . $this->d_ubah->get_kd_d_ba() . ">";
                                  }

                                  if (isset($this->error)) {
                                      echo "<div class=error>" . $this->error . "</div>";
                                  }
                                  ?>
                            <input type="hidden" name="kd_d_user" id="wuser" size="8" value="99999">
                            <div id="wuser_ba"  class="error"></div>
                            <label >Pilih Satker</label>
                            <select name="kd_d_user_ba" id="kd_d_user_ba" style="width: 100px" type="text">
                                <option value="1">PKN</option>
                                <option value="2">APK</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="17">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                            </select>
                            <div id="wtgl"  class="error"></div>
                            <label>Tanggal</label><input type="text" name="kd_d_tgl" id="kd_d_tgl" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_tgl() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_tgl() : ''); ?>">
                            <div id="wspm"  class="error"></div>
                            <label>SPM Sukses</label><input type="number" name="kd_d_spm" id="kd_d_spm" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_spm() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_spm() : ''); ?>">
                             <div id="wspm_gagal"  class="error"></div>
                            <label>SPM Gagal</label><input type="number" name="kd_d_spm_gagal" id="kd_d_spm_gagal" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_spm_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_spm_gagal() : ''); ?>">
                             <div id="wrekon"  class="error"></div>
                            <label>Rekon Sukses</label><input type="number" name="kd_d_rekon" id="kd_d_rekon" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_rekon() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_rekon() : ''); ?>">
                             <div id="wrekon_gagal"  class="error"></div>
                            <label>Rekon Gagal</label><input type="number" name="kd_d_rekon_gagal" id="kd_d_rekon_gagal" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_rekon_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_rekon_gagal() : ''); ?>">
                             <div id="wkontrak"  class="error"></div>
                            <label>Kontrak Sukses</label><input type="number" name="kd_d_kontrak" id="kd_d_kontrak" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_kontrak() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_kontrak() : ''); ?>">
                             <div id="wkontrak_gagal"  class="error"></div>
                            <label>Kontrak Gagal</label><input type="number" name="kd_d_kontrak_gagal" id="kd_d_kontrak_gagal" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_kontrak_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_kontrak_gagal() : ''); ?>">
                            </select>
                            <ul class="inline tengah">
                                <li><input class="normal" type="submit" onclick="" value="BATAL"></li>
                                <li><input class="sukses" type="submit" name="<?php echo isset($this->d_ubah) ? 'upd_d_ba' : 'add_d_ba'; ?>" value="SIMPAN" onClick="return cek();"></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="kolom4" id="table">
            <fieldset>
                <legend>Data BA 999</legend>
                <div id="table-title"></div>
                <div id="table-content">
                    <table class="table-bordered zebra scroll">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2" width ="25%">Tanggal</th>
                                <th rowspan="2" >Satker</th>
                                <th colspan="3">SPM</th>
                                <th colspan="3">Rekon</th>
                                <th colspan="3">Kontrak</th>
                                <th rowspan="2" width ="15%">Aksi</th>
                            </tr>
                            <tr>
                                <th width ="10%">Sukses</th>
                                <th width ="10%">Gagal</th>
                                <th width ="10%">%</th>
                                <th width ="10%">Sukses</th>
                                <th width ="10%">Gagal</th>
                                <th width ="10%">%</th>
                                <th width ="10%">Sukses</th>
                                <th width ="10%">Gagal</th>
                                <th width ="10%">%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($this->data as $val) {
                                //var_dump($val);
                                echo "<tr>";
                                echo "<td>$no</td>";
                                $sat = $val->get_kd_d_user_ba();
                                echo "<td>" . date("d/m", strtotime($val->get_kd_d_tgl())) . "</td>";
                                if ($sat == 1) {
                                    echo "<td>PKN</td>";
                                } else if ($sat == 2) {
                                    echo "<td>APK</td>";
                                }else if ($sat == 3) {
                                    echo "<td>3</td>";
                                }else if ($sat == 4) {
                                    echo "<td>4</td>";
                                }else if ($sat == 5) {
                                    echo "<td>5</td>";
                                }else if ($sat == 6) {
                                    echo "<td>6</td>";
                                }else if ($sat == 7) {
                                    echo "<td>7</td>";
                                }else if ($sat == 8) {
                                    echo "<td>8</td>";
                                }else if ($sat == 9) {
                                    echo "<td>9</td>";
                                }else if ($sat == 10) {
                                    echo "<td>10</td>";
                                } elseif ($sat == 11) {
                                    echo "<td>11</td>";
                                } else if ($sat == 12) {
                                    echo "<td>12</td>";
                                }else if ($sat == 13) {
                                    echo "<td>13</td>";
                                }else if ($sat == 14) {
                                    echo "<td>14</td>";
                                }else if ($sat == 15) {
                                    echo "<td>15</td>";
                                }else if ($sat == 16) {
                                    echo "<td>16</td>";
                                }else if ($sat == 17) {
                                    echo "<td>17</td>";
                                }else if ($sat == 18) {
                                    echo "<td>18</td>";
                                }else if ($sat == 19) {
                                    echo "<td>19</td>";
                                }else if ($sat == 20) {
                                    echo "<td>20</td>";
                                }else if ($sat == 21) {
                                    echo "<td>21</td>";
                                }else if ($sat == 22) {
                                    echo "<td>22</td>";
                                }else if ($sat == 23) {
                                    echo "<td>23</td>";
                                }else if ($sat == 24) {
                                    echo "<td>24</td>";
                                }else {
                                    echo "<td>Satker tidak ditemukan</td>";
                                }
                                echo "<td>" . $val->get_kd_d_spm() . "</td>";
                                echo "<td>" . $val->get_kd_d_spm_gagal() . "</td>";
                                echo "<td>" . $val->get_kd_d_spm_persen() . " %</td>";
                                echo "<td>" . $val->get_kd_d_rekon() . "</td>";
                                echo "<td>" . $val->get_kd_d_rekon_gagal() . "</td>";
                                echo "<td>" . $val->get_kd_d_rekon_persen() . " %</td>";
                                echo "<td>" . $val->get_kd_d_kontrak() . "</td>";
                                echo "<td>" . $val->get_kd_d_kontrak_gagal() . "</td>";
                                echo "<td>" . $val->get_kd_d_kontrak_persen() . " %</td>";
                                echo "<td><a href=" . URL . "dataBa/delDataBa/" . $val->get_kd_d_ba() . " onclick=\"return del('" . $val->get_kd_d_tgl() . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataBa/addDataBa/" . $val->get_kd_d_ba() . "><i class=\"icon-pencil\"></i></a></td>";
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
    $(function(){
        hideErrorId();
        hideWarning();
        
    });
    
    function hideErrorId(){
        $('.error').fadeOut(0);
    }

    function hideWarning(){
        $('#kd_d_user').keyup(function(){
            if(document.getElementById('kd_d_user').value !=''){
                $('#wuser').fadeOut(200);
            }
        })
        
        $('#kd_d_user_ba').keyup(function(){
            if(document.getElementById('kd_d_user_ba').value !=''){
                $('#wuser_ba').fadeOut(200);
            }
        })
        
        $('#kd_d_tgl').keyup(function(){
            if(document.getElementById('kd_d_tgl').value !=''){
                $('#wtgl').fadeOut(200);
            }
        })
        
        $('#kd_d_spm').keyup(function(){
            if(document.getElementById('kd_d_spm').value !=''){
                $('#wspm').fadeOut(200);
            }
        })
        
        $('#kd_d_spm_gagal').keyup(function(){
            if(document.getElementById('kd_d_spm_gagal').value !=''){
                $('#wspm_gagal').fadeOut(200);
            }
        })
    
        $('#kd_d_rekon').keyup(function(){
            if(document.getElementById('kd_d_rekon').value !=''){
                $('#wrekon').fadeOut(200);
            }
        })
    
        $('#kd_d_rekon_gagal').keyup(function(){
            if(document.getElementById('kd_d_rekon_gagal').value !=''){
                $('#wrekon_gagal').fadeOut(200);
            }
        })
        
        $('#kd_d_kontrak').keyup(function(){
            if(document.getElementById('kd_d_kontrak').value !=''){
                $('#wkontrak').fadeOut(200);
            }
        })
        
        $('#kd_d_kontrak_gagal').keyup(function(){
            if(document.getElementById('kd_d_kontrak_gagal').value !=''){
                $('#wkontrak_gagal').fadeOut(200);
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

    function del(user){
        var text = "Yakin data Tanggal "+user+" akan dihapus?";
        if(confirm(text)){
            return true;
        }else{
            return false;
        }
    }
    
    function cek(){
        var pattern = '^[0-9]+$';
        var kd_d_user = document.getElementById('kd_d_user').value;
        var kd_d_user_ba = document.getElementById('kd_d_user_ba').value;
        var kd_d_tgl = document.getElementById('kd_d_tgl').value;
        var kd_d_spm = document.getElementById('kd_d_spm').value;
        var kd_d_spm_gagal = document.getElementById('kd_d_spm_gagal').value;
        var kd_d_rekon = document.getElementById('kd_d_rekon').value;
        var kd_d_rekon_gagal = document.getElementById('kd_d_rekon_gagal').value;
        var kd_d_kontrak = document.getElementById('kd_d_kontrak').value;
        var kd_d_kontrak_gagal = document.getElementById('kd_d_kontrak_gagal').value;
        var jml=0;
        if(kd_d_user==''){
            var wuser= 'User harus diisi!';
            $('#wuser').fadeIn(0);
            $('#wuser').html(wuser);
            jml++;
        }
        
        if(kd_d_user_ba==''){
            var wuser_ba= 'Unit BA.999 harus diisi!';
            $('#wuser_ba').fadeIn(0);
            $('#wuser_ba').html(wuser_ba);
            jml++;
        }
        
        if(kd_d_tgl==''){
            var wtgl= 'Tanggal harus diisi!';
            $('#wtgl').fadeIn(0);
            $('#wtgl').html(wtgl);
            jml++;
        }
        
        if(!kd_d_spm.match(pattern)){
            var wspm = "Jumlah SPM harus dalam bentuk angka!";
            $('#wspm').html(wspm);
            $('#wspm').fadeIn(200);
            jml++;
        }
    
        if(kd_d_spm==''){
            var wspm= 'Jumlah SPM harus diisi!';
            $('#wspm').fadeIn(0);
            $('#wspm').html(wspm);
            jml++;
        }
        
        if(!kd_d_spm_gagal.match(pattern)){
            var wspm_gagal = "Jumlah SPM harus dalam bentuk angka!";
            $('#wspm_gagal').html(wspm_gagal);
            $('#wspm_gagal').fadeIn(200);
            jml++;
        }
    
        if(kd_d_spm_gagal==''){
            var wspm_gagal= 'Jumlah SPM harus diisi!';
            $('#wspm_gagal').fadeIn(0);
            $('#wspm_gagal').html(wspm_gagal);
            jml++;
        }
        
        if(!kd_d_rekon.match(pattern)){
            var wrekon = "Rekon pembayaran harus dalam bentuk angka!";
            $('#wrekon').html(wrekon);
            $('#wrekon').fadeIn(200);
            jml++;
        }
    
        if(kd_d_rekon==''){
            var wrekon= ' Rekon harus diisi!';
            $('#wrekon').fadeIn(0);
            $('#wrekon').html(wrekon);
            jml++;
        }
        
        if(!kd_d_rekon_gagal.match(pattern)){
            var wrekon_gagal = "Rekon harus dalam bentuk angka!";
            $('#wrekon_gagal').html(wrekon_gagal);
            $('#wrekon_gagal').fadeIn(200);
            jml++;
        }
    
        if(kd_d_rekon_gagal==''){
            var wrekon_gagal= ' Rekon harus diisi!';
            $('#wrekon_gagal').fadeIn(0);
            $('#wrekon_gagal').html(wrekon_gagal);
            jml++;
        }
        
        if(!kd_d_kontrak.match(pattern)){
            var wkontrak = "KOntrak harus dalam bentuk angka!";
            $('#wkontrak').html(wkontrak);
            $('#wkontrak').fadeIn(200);
            jml++;
        }
                
        if(kd_d_kontrak==''){
            var wkontrak= 'Kontrak harus diisi!';
            $('#wkontrak').fadeIn(0);
            $('#wkontrak').html(wkontrak);
            jml++;
        }
        
        if(!kd_d_kontrak_gagal.match(pattern)){
            var wkontrak_gagal = "Kontrak harus dalam bentuk angka!";
            $('#wkontrak_gagal').html(wkontrak_gagal);
            $('#wkontrak_gagal').fadeIn(200);
            jml++;
        }
                
        if(kd_d_kontrak_gagal==''){
            var wkontrak_gagal= 'Kontrak harus diisi!';
            $('#wkontrak_gagal').fadeIn(0);
            $('#wkontrak_gagal').html(wkontrak_gagal);
            jml++;
        }
    
        if(jml>0){
            return false
        }else{
            return true;
        }
    }
</script>