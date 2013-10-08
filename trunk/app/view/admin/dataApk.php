<div id="top">
    <div id="form">
        <h2>DATA APK</h2></div>
    <div class="kolom3">
        <fieldset><legend><?php
if (isset($this->d_ubah)) {
    echo 'Ubah Data APK';
} else {
    echo 'Tambah Data APK';
}
?></legend>
            <div id="form-input"><div class="kiri">
                    <form method="POST" action="<?php
                if (isset($this->d_ubah)) {
                    echo URL . 'dataApk/updDataApk';
                } else {
                    $_SERVER['PHP_SELF'];
                }
?>">
                              <?php
                              if (isset($this->d_ubah)) {
                                  echo "<input type=hidden name='kd_d_apk' value=" . $this->d_ubah->get_kd_d_apk() . ">";
                              }

                              if (isset($this->error)) {
                                  echo "<div class=error>" . $this->error . "</div>";
                              }
                              ?>

                        <div id="wuser" class="error"></div>
                        <label>User</label><input type="number" name="kd_d_user" id="kd_d_user" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_user() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_user() : ''); ?>">
                        <div id="wtgl"  class="error"></div>
                        <label>Tanggal</label><input type="number" name="kd_d_tgl" id="kd_d_tgl" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_tgl() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_tgl() : ''); ?>">
                        <div id="wakun"  class="error"></div>
                        <label>Akun</label><input type="number" name="kd_d_akun" id="kd_d_akun" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_akun() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_akun() : ''); ?>">
                        <div id="wpel" class="error"></div>
                        <label>Pelanggan</label><input type="number" name="kd_d_pel" id="kd_d_pel" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_pel() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_pel() : ''); ?>">
                        <div id="wmasalah" class="error"></div>
                        <label>Masalah</label><textarea type="text" rows="10" name="kd_d_masalah" id="kd_d_masalah" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_masalah() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_masalah() : ''); ?>"></textarea>
                        </select>
                        <ul class="inline tengah">
                            <li><input class="normal" type="submit" onclick="" value="BATAL"></li>
                            <li><input class="sukses" type="submit" name="<?php echo isset($this->d_ubah) ? 'upd_d_apk' : 'add_d_apk'; ?>" value="SIMPAN" onClick="return cek();"></li>
                        </ul>
                    </form>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="kolom4" id="table">
        <fieldset><legend>Data PKN</legend>
            <div id="table-title"></div>
            <div id="table-content">
                <table class="table-bordered zebra scroll">
                    <thead>
                    <th>No</th>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Akun</th>
                    <th>Pelanggan</th>
                    <th>Masalah</th>
                    <th width="50">Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($this->data as $val) {
                            //var_dump($val);
                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>" . $val->get_kd_d_user() . "</td>";
                            echo "<td>" . $val->get_kd_d_tgl() . "</td>";
                            echo "<td>" . $val->get_kd_d_akun() . "</td>";
                            echo "<td>" . $val->get_kd_d_pel() . "</td>";
                            echo "<td>" . $val->get_kd_d_masalah() . "</td>";
                            echo "<td><a href=" . URL . "dataApk/delDataApk/" . $val->get_kd_d_apk() . " onclick=\"return del('" . $val->get_kd_d_user() . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataApk/addDataApk/" . $val->get_kd_d_apk() . "><i class=\"icon-pencil\"></i></a></td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
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
        
        $('#kd_d_tgl').keyup(function(){
            if(document.getElementById('kd_d_tgl').value !=''){
                $('#wtgl').fadeOut(200);
            }
        })
        
        $('#kd_d_akun').keyup(function(){
            if(document.getElementById('kd_d_akun').value !=''){
                $('#wakun').fadeOut(200);
            }
        })
    
        $('#kd_d_pel').keyup(function(){
            if(document.getElementById('kd_d_pel').value !=''){
                $('#wpel').fadeOut(200);
            }
        })
        
        $('#kd_d_masalah').keyup(function(){
            if(document.getElementById('kd_d_masalah').value !=''){
                $('#wmasalah').fadeOut(200);
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
        var text = "Yakin data Kantor "+user+" akan dihapus?\npenghapusan akan mengakibatkan data kantor "+user+" berantakan!";
        if(confirm(text)){
            return true;
        }else{
            return false;
        }
    }
    
    function cek(){
        var pattern = '^[0-9]$';
        var kd_d_user = document.getElementById('kd_d_user').value;
        var kd_d_tgl = document.getElementById('kd_d_tgl').value;
        var kd_d_akun = document.getElementById('kd_d_akun').value;
        var kd_d_pel = document.getElementById('kd_d_pel').value;
        var kd_d_masalah = document.getElementById('kd_d_masalah').value;
        var jml=0;
        if(kd_d_user==''){
            var wuser= 'User harus diisi!';
            $('#wuser').fadeIn(0);
            $('#wuser').html(wuser);
            jml++;
        }
        
        if(kd_d_tgl==''){
            var wtgl= 'Tanggal harus diisi!';
            $('#wtgl').fadeIn(0);
            $('#wtgl').html(wtgl);
            jml++;
        }
        
        if(!kd_d_akun.match(pattern)){
            var wakun = "Jumlah akun harus dalam bentuk angka!";
            $('#wakun').html(wakun);
            $('#wakun').fadeIn(200);
            jml++;
        }
            
        if(kd_d_akun==''){
            var wakun= 'AKUN harus diisi!';
            $('#wakun').fadeIn(0);
            $('#wakun').html(wakun);
            jml++;
        }
        
        if(!kd_d_pel.match(pattern)){
            var wpel = "Jumlah Pelanggan harus dalam bentuk angka!";
            $('#wpel').html(wpel);
            $('#wpel').fadeIn(200);
            jml++;
        }
                
        if(kd_d_pel==''){
            var wpel= 'Pelanggan harus diisi!';
            $('#wpel').fadeIn(0);
            $('#wpel').html(wpel);
            jml++;
        }
        
        if(kd_d_masalah==''){
            var wmasalah= 'Masalah harus diisi!';
            $('#wmasalah').fadeIn(0);
            $('#wmasalah').html(wmasalah);
            jml++;
        }
    
        if(jml>0){
            return false
        }else{
            return true;
        }
    }
</script>