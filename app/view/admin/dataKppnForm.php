<div id="top">
    <div id="form">
        <h2>DATA KPPN</h2></div>
    <div class="kolom3">
        <fieldset><legend><?php
if (isset($this->d_ubah)) {
    echo 'Ubah Data KPPN';
} else {
    echo 'Tambah Data KPPN';
}
?></legend>
            <div id="form-input"><div class="kiri">
                    <form method="POST" action="<?php
                if (isset($this->d_ubah)) {
                    echo URL . 'dataKppn/updDataKppn';
                } else {
                    $_SERVER['PHP_SELF'];
                }
?>">
                              <?php
                              if (isset($this->d_ubah)) {
                                  echo "<input type=hidden name='kd_d_kppn' value=" . $this->d_ubah->get_kd_d_kppn() . ">";
                              }

                              if (isset($this->error)) {
                                  echo "<div class=error>" . $this->error . "</div>";
                              }
                              ?>

                        <div id="wuser" class="error"></div>
                        <label>User</label><input type="number" name="kd_d_user" id="kd_d_user" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_user() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_user() : ''); ?>">
                        <div id="wkonversi"  class="error"></div>
                        <label>Konversi</label><input type="number" name="kd_d_konversi" id="kd_d_konversi" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_konversi() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_konversi() : ''); ?>">
                        <div id="wtgl"  class="error"></div>
                        <label>Tanggal</label><input type="number" name="kd_d_tgl" id="kd_d_tgl" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_tgl() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_tgl() : ''); ?>">
                        <div id="wnrs" class="error"></div>
                        <label>NRS</label><input type="number" name="kd_d_nrs" id="kd_d_nrs" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_nrs() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_nrs() : ''); ?>">
                        <div id="wnrk" class="error"></div>
                        <label>NRK</label><input type="number" name="kd_d_nrk" id="kd_d_nrk" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_nrk() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_nrk() : ''); ?>">
                        <div id="wspm" class="error"></div>
                        <label>SPM</label><input type="number" name="kd_d_spm" id="kd_d_spm" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_spm() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_spm() : ''); ?>">
                        <div id="wsp2d" class="error"></div>
                        <label>SP2D</label><input type="number" name="kd_d_sp2d" id="kd_d_sp2d" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_sp2d() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_sp2d() : ''); ?>">
                        <div id="wlhp"  class="error"></div>
                        <label>LHP</label><input type="number" name="kd_d_lhp" id="kd_d_lhp" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_lhp() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_lhp() : ''); ?>">
                        <div id="wrekon" class="error"></div>
                        <label>Rekon</label><input type="number" name="kd_d_rekon" id="kd_d_rekon" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_rekon() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_rekon() : ''); ?>">
                        <div id="wpersepsi" class="error"></div>
                        <label>Persepsi</label><input type="number" name="kd_d_persepsi" id="kd_d_persepsi" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_persepsi() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_persepsi() : ''); ?>">
                        <div id="wterimaan" class="error"></div>
                        <label>Terimaan</label><input type="number" name="kd_d_terimaan" id="kd_d_terimaan" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_terimaan() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_terimaan() : ''); ?>">
                        <div id="wkoreksi" class="error"></div>
                        <label>Koreksi</label><input type="number" name="kd_d_koreksi" id="kd_d_koreksi" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_koreksi() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_koreksi() : ''); ?>">
                        <div id="winfrastruktur" class="error"></div>
                        <label>Infrastruktur</label><textarea rows="10" type="text" name="kd_d_infrastruktur" id="kd_d_infrastruktur" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_infrastruktur() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_infrastruktur() : ''); ?>"></textarea>
                        <div id="wjaringan" class="error"></div>
                        <label>Jaringan</label><textarea rows="10" type="text" name="kd_d_jaringan" id="kd_d_jaringan" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_jaringan() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_jaringan() : ''); ?>"></textarea>
                        <div id="wmasalah" class="error"></div>
                        <label>Masalah</label><textarea type="text" rows="10" name="kd_d_masalah" id="kd_d_masalah" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_masalah() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_masalah() : ''); ?>"></textarea>
                        </select>
                        <ul class="inline tengah">
                            <li><input class="normal" type="submit" onclick="" value="BATAL"></li>
                            <li><input class="sukses" type="submit" name="<?php echo isset($this->d_ubah) ? 'upd_d_kppn' : 'add_d_kppn'; ?>" value="SIMPAN" onClick="return cek();"></li>
                        </ul>
                    </form>
                </div>
            </div>
        </fieldset>
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
    
        $('#kd_d_konversi').keyup(function(){
            if(document.getElementById('kd_d_konversi').value !=''){
                $('#wkonversi').fadeOut(200);
            }
        })
    
        $('#kd_d_nrs').keyup(function(){
            if(document.getElementById('kd_d_nrs').value !=''){
                $('#wnrs').fadeOut(200);
            }
        })
    
        $('#kd_d_nrk').keyup(function(){
            if(document.getElementById('kd_d_nrk').value !=''){
                $('#wnrk').fadeOut(200);
            }
        })
    
        $('#kd_d_spm').keyup(function(){
            if(document.getElementById('kd_d_spm').value !=''){
                $('#wspm').fadeOut(200);
            }
        })
        
        $('#kd_d_sp2d').keyup(function(){
            if(document.getElementById('kd_d_sp2d').value !=''){
                $('#wsp2d').fadeOut(200);
            }
        })
    
        $('#kd_d_lhp').keyup(function(){
            if(document.getElementById('kd_d_lhp').value !=''){
                $('#wlhp').fadeOut(200);
            }
        })
    
        $('#kd_d_rekon').keyup(function(){
            if(document.getElementById('kd_d_rekon').value !=''){
                $('#wrekon').fadeOut(200);
            }
        })
        
        $('#kd_d_persepsi').keyup(function(){
            if(document.getElementById('kd_d_persepsi').value !=''){
                $('#wpersepsi').fadeOut(200);
            }
        })
        
        $('#kd_d_terimaan').keyup(function(){
            if(document.getElementById('kd_d_terimaan').value !=''){
                $('#wterimaan').fadeOut(200);
            }
        })
        
        $('#kd_d_koreksi').keyup(function(){
            if(document.getElementById('kd_d_koreksi').value !=''){
                $('#wkoreksi').fadeOut(200);
            }
        })
    
        $('#kd_d_infrastruktur').keyup(function(){
            if(document.getElementById('kd_d_infrastruktur').value !=''){
                $('#winfrastruktur').fadeOut(200);
            }
        })
    
        $('#kd_d_jaringan').keyup(function(){
            if(document.getElementById('kd_d_jaringan').value !=''){
                $('#wjaringan').fadeOut(200);
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
        var kd_d_konversi = document.getElementById('kd_d_konversi').value;
        var kd_d_nrs = document.getElementById('kd_d_nrs').value;
        var kd_d_nrk = document.getElementById('kd_d_nrk').value;
        var kd_d_spm = document.getElementById('kd_d_spm').value;
        var kd_d_sp2d = document.getElementById('kd_d_sp2d').value;
        var kd_d_lhp = document.getElementById('kd_d_lhp').value;
        var kd_d_rekon = document.getElementById('kd_d_rekon').value;
        var kd_d_persepsi = document.getElementById('kd_d_persepsi').value;
        var kd_d_terimaan = document.getElementById('kd_d_terimaan').value;
        var kd_d_koreksi = document.getElementById('kd_d_koreksi').value;
        var kd_d_infrastruktur = document.getElementById('kd_d_infrastruktur').value;
        var kd_d_jaringan = document.getElementById('kd_d_jaringan').value;
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
        
        if(!kd_d_konversi.match(pattern)){
            var wkonversi = "Konversi harus dalam bentuk angka!";
            $('#wkonversi').html(wkonversi);
            $('#wkonversi').fadeIn(200);
            jml++;
        }
    
        if(kd_d_konversi==''){
            var wkonversi= 'Jumlah Konversi harus diisi!';
            $('#wkonversi').fadeIn(0);
            $('#wkonversi').html(wkonversi);
            jml++;
        }
        
        if(!kd_d_nrs.match(pattern)){
            var wnrs = "NRS harus dalam bentuk angka!";
            $('#wnrs').html(wnrs);
            $('#wnrs').fadeIn(200);
            jml++;
        }
    
        if(kd_d_nrs==''){
            var wnrs= 'Jumlah NRS harus diisi!';
            $('#wnrs').fadeIn(0);
            $('#wnrs').html(wnrs);
            jml++;
        }
        
        if(!kd_d_nrk.match(pattern)){
            var wnrk = "NRK harus dalam bentuk angka!";
            $('#wnrk').html(wnrk);
            $('#wnrk').fadeIn(200);
            jml++;
        }
    
        if(kd_d_nrk==''){
            var wnrk= 'Jumlah NRK harus diisi!';
            $('#wnrk').fadeIn(0);
            $('#wnrk').html(wnrk);
            jml++;
            
        }
    
        if(!kd_d_spm.match(pattern)){
            var wspm = "SPM harus dalam bentuk angka!";
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
        
        if(!kd_d_sp2d.match(pattern)){
            var wsp2d = "SP2D harus dalam bentuk angka!";
            $('#wsp2d').html(wsp2d);
            $('#wsp2d').fadeIn(200);
            jml++;
        }
        
        if(kd_d_sp2d==''){
            var wsp2d= 'Jumlah SP2D harus diisi!';
            $('#wsp2d').fadeIn(0);
            $('#wsp2d').html(wsp2d);
            jml++;
        }
    
        if(!kd_d_lhp.match(pattern)){
            var wlhp = "LHP harus dalam bentuk angka!";
            $('#wlhp').html(wnrs);
            $('#wlhp').fadeIn(200);
            jml++;
        }
        
        if(kd_d_lhp==''){
            var wlhp= 'Jumlah LHP harus diisi!';
            $('#wlhp').fadeIn(0);
            $('#wlhp').html(wlhp);
            jml++;
        }
        
        if(!kd_d_rekon.match(pattern)){
            var wrekon = "Rekon harus dalam bentuk angka!";
            $('#wrekon').html(wrekon);
            $('#wrekon').fadeIn(200);
            jml++;
        }
    
        if(kd_d_rekon==''){
            var wrekon= 'Jumlah Rekon harus diisi!';
            $('#wrekon').fadeIn(0);
            $('#wrekon').html(wrekon);
            jml++;
        }
        
        if(!kd_d_persepsi.match(pattern)){
            var wpersepsi = "Persepsi harus dalam bentuk angka!";
            $('#wpersepsi').html(wpersepsi);
            $('#wpersepsi').fadeIn(200);
            jml++;
        }
        
        if(kd_d_persepsi==''){
            var wpersepsi= 'Jumlah Bank Persepsi harus diisi!';
            $('#wpersepsi').fadeIn(0);
            $('#wpersepsi').html(wpersepsi);
            jml++;
        }
        
        if(!kd_d_terimaan.match(pattern)){
            var wterimaan = "Penerimaan harus dalam bentuk angka!";
            $('#wterimaan').html(wterimaan);
            $('#wterimaan').fadeIn(200);
            jml++;
        }
        
        if(kd_d_terimaan==''){
            var wterimaan= 'Jumlah Konfirmasi Bank Penerimaan harus diisi!';
            $('#wterimaan').fadeIn(0);
            $('#wterimaan').html(wterimaan);
            jml++;
        }
        
        if(!kd_d_koreksi.match(pattern)){
            var wkoreksi = "Koreksi penerimaan harus dalam bentuk angka!";
            $('#wkoreksi').html(wkoreksi);
            $('#wkoreksi').fadeIn(200);
            jml++;
        }
        
        if(kd_d_koreksi==''){
            var wkoreksi= 'Koreksi Penerimaan harus diisi!';
            $('#wkoreksi').fadeIn(0);
            $('#wkoreksi').html(wkoreksi);
            jml++;
        }
    
        if(kd_d_infrastruktur==''){
            var winfrastruktur= 'Jumlah NRK harus diisi!';
            $('#winfrastruktur').fadeIn(0);
            $('#winfrastruktur').html(winfrastruktur);
            jml++;
            
        }
    
        if(kd_d_jaringan==''){
            var wjaringan= 'Jaringan harus diisi!';
            $('#wjaringan').fadeIn(0);
            $('#wjaringan').html(wjaringan);
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