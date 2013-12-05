<h2>MONITORING KPPN JAKARTA 6</h2>
<center><?php $this->load('dasbor/lvl3') ?></center>
<div id="top">
    <div id="form">
        <h2>DATA KPPN JAKARTA 6</h2></div>
    <div class="kolom3">
        <fieldset><legend><?php
if (isset($this->d_ubah)) {
    echo 'Ubah Data';
} else {
    echo 'Tambah Data';
}
?></legend>
            <div id="form-input"><div class="kiri">
                    <form method="POST" action="<?php
                if (isset($this->d_ubah)) {
                    echo URL . 'dataKppn/updDataKppnLvl3Jkt6';
                } else {
                    $_SERVER['PHP_SELF'];
                }
?>">
                              <?php
                              if (isset($this->d_ubah)) {
                                  echo "<input type='hidden' name='kd_d_kppn' value=" . $this->d_ubah->get_kd_d_kppn() . ">";
                              }

                              if (isset($this->error)) {
                                  echo "<div class=error>" . $this->error . "</div>";
                              }
                              ?>


                        <input type="hidden" name="kd_d_user" id="kd_d_user" size="8" value="10006">
                        <div id="wtgl"  class="error"></div>
                        <label>Tanggal</label><input type="text" name="kd_d_tgl" id="kd_d_tgl" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_tgl() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_tgl() : ''); ?>">
                        <div id="wkonversi"  class="error"></div>
                        <label>Konversi Sukses</label><input type="number" name="kd_d_konversi" id="kd_d_konversi" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_konversi() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_konversi() : ''); ?>">
                        <div id="wkonversi_gagal"  class="error"></div>
                        <label>Konversi Gagal</label><input type="number" name="kd_d_konversi_gagal" id="kd_d_konversi_gagal" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_konversi_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_konversi_gagal() : ''); ?>">
                        <div id="wsp2d"  class="error"></div>
                        <label>SP2D Sukses</label><input type="number" name="kd_d_sp2d" id="kd_d_sp2d" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_sp2d() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_sp2d() : ''); ?>">
                        <div id="wsp2d_gagal"  class="error"></div>
                        <label>SP2D Gagal</label><input type="number" name="kd_d_sp2d_gagal" id="kd_d_sp2d_gagal" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_sp2d_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_sp2d_gagal() : ''); ?>">
                        <div id="wrekon" class="error"></div>
                        <label>Rekon Sukses</label><input type="number" name="kd_d_rekon" id="kd_d_rekon" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_rekon() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_rekon() : ''); ?>">
                        <div id="wrekon_gagal" class="error"></div>
                        <label>Rekon Gagal</label><input type="number" name="kd_d_rekon_gagal" id="kd_d_rekon_gagal" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_rekon_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_rekon_gagal() : ''); ?>">
                        <div id="wlhp" class="error"></div>
                        <label>LHP Sukses</label><input type="number" name="kd_d_lhp" id="kd_d_lhp" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_lhp() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_lhp() : ''); ?>">
                        <div id="wlhp_gagal" class="error"></div>
                        <label>LHP Gagal</label><input type="number" name="kd_d_lhp_gagal" id="kd_d_lhp_gagal" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_lhp_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_lhp_gagal() : ''); ?>">
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
<div id="top">
    <div id="gambar"></div>
    <div class="fitur" id="table">
        <div class="kolom4">
            <fieldset><legend>Data</legend>
                <div id="table-title"></div>
                <div id="table-content">
                    <table class="table-bordered zebra scroll" style="text-align: center">
                        <thead style="font-size:80%">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2" width ="25%">Tanggal</th>
                                <th colspan="3">Konversi</th>
                                <th colspan="3">SP2D</th>
                                <th colspan="3">LHP</th>
                                <th colspan="3">Rekon</th>
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
                                echo "<td>" . $val->get_kd_d_tgl() . "</td>";
                                echo "<td>" . $val->get_kd_d_konversi() . "</td>";
                                echo "<td>" . $val->get_kd_d_konversi_gagal() . "</td>";
                                echo "<td>" . $val->get_kd_d_konversi_persen() . "%</td>";
                                echo "<td>" . $val->get_kd_d_sp2d() . "</td>";
                                echo "<td>" . $val->get_kd_d_sp2d_gagal() . "</td>";
                                echo "<td>" . $val->get_kd_d_sp2d_persen() . "%</td>";
                                echo "<td>" . $val->get_kd_d_lhp() . "</td>";
                                echo "<td>" . $val->get_kd_d_lhp_gagal() . "</td>";
                                echo "<td>" . $val->get_kd_d_lhp_persen() . "%</td>";
                                echo "<td>" . $val->get_kd_d_rekon() . "</td>";
                                echo "<td>" . $val->get_kd_d_rekon_gagal() . "</td>";
                                echo "<td>" . $val->get_kd_d_rekon_persen() . "%</td>";
                                echo "<td><a href=" . URL . "dataKppn/delDataKppnLvl3Jkt6/" . $val->get_kd_d_kppn() . " onclick=\"return del('" . $val->get_kd_d_tgl() . "')\"><i class=\"icon-trash\"></i></a>
                                <a href=" . URL . "dataKppn/addDataKppnLvl3Jkt6/" . $val->get_kd_d_kppn() . "><i class=\"icon-pencil\"></i></a></td>";
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
    
        $('#kd_d_konversi_gagal').keyup(function(){
            if(document.getElementById('kd_d_konversi_gagal').value !=''){
                $('#wkonversi_gagal').fadeOut(200);
            }
        })
    
        $('#kd_d_sp2d').keyup(function(){
            if(document.getElementById('kd_d_sp2d').value !=''){
                $('#wsp2d').fadeOut(200);
            }
        })
    
        $('#kd_d_sp2d_gagal').keyup(function(){
            if(document.getElementById('kd_d_sp2d_gagal').value !=''){
                $('#wsp2d_gagal').fadeOut(200);
            }
        })
        
        $('#kd_d_lhp').keyup(function(){
            if(document.getElementById('kd_d_lhp').value !=''){
                $('#wlhp').fadeOut(200);
            }
        })
    
        $('#kd_d_lhp_gagal').keyup(function(){
            if(document.getElementById('kd_d_lhp_gagal').value !=''){
                $('#wlhp_gagal').fadeOut(200);
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

    }
    
    $(function() { 
        $("#kd_d_tgl").datepicker({dateFormat: "yy-mm-dd"
            //            buttonImage:'images/calendar.gif',
            //            buttonImageOnly: true,
            //            showOn: 'button'
        }); 
    });

    function del(user){
        var text = "Yakin data tanggal "+user+" akan dihapus?";
        if(confirm(text)){
            return true;
        }else{
            return false;
        }
    }
    
    function cek(){
        var pattern = '^[0-9]+$';
        var kd_d_user = document.getElementById('kd_d_user').value;
        var kd_d_tgl = document.getElementById('kd_d_tgl').value;
        var kd_d_konversi = document.getElementById('kd_d_konversi').value;
        var kd_d_konversi_gagal = document.getElementById('kd_d_konversi_gagal').value;
        var kd_d_sp2d = document.getElementById('kd_d_sp2d').value;
        var kd_d_sp2d_gagal = document.getElementById('kd_d_sp2d_gagal').value;
        var kd_d_lhp = document.getElementById('kd_d_lhp').value;
        var kd_d_lhp_gagal = document.getElementById('kd_d_lhp_gagal').value;
        var kd_d_rekon = document.getElementById('kd_d_rekon').value;
        var kd_d_rekon_gagal = document.getElementById('kd_d_rekon_gagal').value;
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
        
        if(!kd_d_konversi_gagal.match(pattern)){
            var wkonversi_gagal = "Konversi harus dalam bentuk angka!";
            $('#wkonversi_gagal').html(wkonversi_gagal);
            $('#wkonversi_gagal').fadeIn(200);
            jml++;
        }
    
        if(kd_d_konversi_gagal==''){
            var wkonversi_gagal= 'Jumlah Konversi harus diisi!';
            $('#wkonversi_gagal').fadeIn(0);
            $('#wkonversi_gagal').html(wkonversi_gagal);
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
        
        if(!kd_d_sp2d_gagal.match(pattern)){
            var wsp2d_gagal = "SP2D harus dalam bentuk angka!";
            $('#wsp2d_gagal').html(wsp2d_gagal);
            $('#wsp2d_gagal').fadeIn(200);
            jml++;
        }
        
        if(kd_d_sp2d_gagal==''){
            var wsp2d_gagal= 'Jumlah SP2D harus diisi!';
            $('#wsp2d_gagal').fadeIn(0);
            $('#wsp2d_gagal').html(wsp2d_gagal);
            jml++;
        }
    
        if(!kd_d_lhp.match(pattern)){
            var wlhp = "LHP harus dalam bentuk angka!";
            $('#wlhp').html(wlhp);
            $('#wlhp').fadeIn(200);
            jml++;
        }
        
        if(kd_d_lhp==''){
            var wlhp= 'Jumlah LHP harus diisi!';
            $('#wlhp').fadeIn(0);
            $('#wlhp').html(wlhp);
            jml++;
        }
        
        if(!kd_d_lhp_gagal.match(pattern)){
            var wlhp_gagal = "LHP harus dalam bentuk angka!";
            $('#wlhp_gagal').html(wlhp_gagal);
            $('#wlhp_gagal').fadeIn(200);
            jml++;
        }
        
        if(kd_d_lhp_gagal==''){
            var wlhp_gagal= 'Jumlah LHP harus diisi!';
            $('#wlhp_gagal').fadeIn(0);
            $('#wlhp_gagal').html(wlhp_gagal);
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
        
        if(!kd_d_rekon_gagal.match(pattern)){
            var wrekon_gagal = "Rekon harus dalam bentuk angka!";
            $('#wrekon_gagal').html(wrekon_gagal);
            $('#wrekon_gagal').fadeIn(200);
            jml++;
        }
    
        if(kd_d_rekon_gagal==''){
            var wrekon_gagal= 'Jumlah Rekon harus diisi!';
            $('#wrekon_gagal').fadeIn(0);
            $('#wrekon_gagal').html(wrekon_gagal);
            jml++;
        }
        
        if(jml>0){
            return false
        }else{
            return true;
        }
    }
</script>