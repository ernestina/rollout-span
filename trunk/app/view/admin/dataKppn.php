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
                        <label>User</label><input type="text" name="kd_d_user" id="kd_d_user" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_user() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_user() : ''); ?>">
                        <div id="wkonversi"  class="error"></div>
                        <label>Konversi</label><input type="text" name="kd_d_konversi" id="kd_d_konversi" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_konversi() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_konversi() : ''); ?>">
                        <div id="wnrs" class="error"></div>
                        <label>NRS</label><input type="text" name="kd_d_nrs" id="kd_d_nrs" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_nrs() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_nrs() : ''); ?>">
                        <div id="wnrk" class="error"></div>
                        <label>NRK</label><input type="text" name="kd_d_nrk" id="kd_d_nrk" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_nrk() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_nrk() : ''); ?>">
                        <div id="wspm" class="error"></div>
                        <label>SPM</label><input type="text" name="kd_d_spm" id="kd_d_spm" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_spm() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_spm() : ''); ?>">
                        <div id="wsp2d" class="error"></div>
                        <label>SP2D</label><input type="text" name="kd_d_sp2d" id="kd_d_sp2d" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_sp2d() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_sp2d() : ''); ?>">
                        <div id="wlhp"  class="error"></div>
                        <label>LHP</label><input type="text" name="kd_d_lhp" id="kd_d_lhp" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_lhp() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_lhp() : ''); ?>">
                        <div id="wrekon" class="error"></div>
                        <label>Rekon</label><input type="text" name="kd_d_rekon" id="kd_d_rekon" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_rekon() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_rekon() : ''); ?>">
                        <div id="winfrastruktur" class="error"></div>
                        <label>Infrastruktur</label><input type="text" name="kd_d_infrastruktur" id="kd_d_infrastruktur" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_infrastruktur() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_infrastruktur() : ''); ?>">
                        <div id="wjaringan" class="error"></div>
                        <label>Jaringan</label><input type="text" name="kd_d_jaringan" id="kd_d_jaringan" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_jaringan() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_jaringan() : ''); ?>">
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
    <div class="kolom4" id="table">
        <fieldset><legend>Data KPPN</legend>
            <div id="table-title"></div>
            <div id="table-content">
                <table class="table-bordered zebra scroll">
                    <thead>
                    <th>No</th>
                    <th>User</th>
                    <th>Konversi</th>
                    <th>NRS</th>
                    <th>NRK</th>
                    <th>SPM</th>
                    <th>SP2D</th>
                    <th>LHP</th>
                    <th>Rekon</th>
                    <th>Infrastuktur</th>
                    <th>Jaringan</th>
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
                            echo "<td>" . $val->get_kd_d_konversi() . "</td>";
                            echo "<td>" . $val->get_kd_d_nrs() . "</td>";
                            echo "<td>" . $val->get_kd_d_nrk() . "</td>";
                            echo "<td>" . $val->get_kd_d_spm() . "</td>";
                            echo "<td>" . $val->get_kd_d_sp2d() . "</td>";
                            echo "<td>" . $val->get_kd_d_lhp() . "</td>";
                            echo "<td>" . $val->get_kd_d_rekon() . "</td>";
                            echo "<td>" . $val->get_kd_d_infrastruktur() . "</td>";
                            echo "<td>" . $val->get_kd_d_jaringan() . "</td>";
                            echo "<td><a href=" . URL . "dataKppn/delDataKppn/" . $val->get_kd_d_user() . " onclick=\"return del('" . $val->get_kd_d_user() . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataKppn/addDataKppn/" . $val->get_kd_d_user() . "><i class=\"icon-pencil\"></i></a></td>";
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

    }

    function del(user){
        var text = "Yakin data Kantor "+user+" akan dihapus?\npenghapusan akan mengakibatkan data kantor "+unit+" berantakan!";
        if(confirm(text)){
            return true;
        }else{
            return false;
        }
    }
    
    function cek(){
        var kd_d_user = document.getElementById('kd_d_user').value;
        var kd_d_konversi = document.getElementById('kd_d_konversi').value;
        var kd_d_nrs = document.getElementById('kd_d_nrs').value;
        var kd_d_nrk = document.getElementById('kd_d_nrk').value;
        var kd_d_spm = document.getElementById('kd_d_spm').value;
        var kd_d_sp2d = document.getElementById('kd_d_sp2d').value;
        var kd_d_lhp = document.getElementById('kd_d_lhp').value;
        var kd_d_rekon = document.getElementById('kd_d_rekon').value;
        var kd_d_infrastruktur = document.getElementById('kd_d_infrastruktur').value;
        var kd_d_jaringan = document.getElementById('kd_d_jaringan').value;
        var jml=0;
        if(kd_d_user==''){
            var wuser= 'User harus diisi!';
            $('#wuser').fadeIn(0);
            $('#wuser').html(wuser);
            jml++;
        }
    
        if(kd_d_konversi==''){
            var wkonversi= 'Jumlah Konversi harus diisi!';
            $('#wkonversi').fadeIn(0);
            $('#wkonversi').html(wkonversi);
            jml++;
        }
    
        if(kd_d_nrs==''){
            var wnrs= 'Jumlah NRS harus diisi!';
            $('#wnrs').fadeIn(0);
            $('#wnrs').html(wnrs);
            jml++;
        }
    
        if(kd_d_nrk==''){
            var wnrk= 'Jumlah NRK harus diisi!';
            $('#wnrk').fadeIn(0);
            $('#wnrk').html(wnrk);
            jml++;
            
        }
    
        if(kd_d_spm==''){
            var wspm= 'Jumlah SPM harus diisi!';
            $('#wspm').fadeIn(0);
            $('#wspm').html(wspm);
            jml++;
        }
        
        if(kd_d_sp2d==''){
            var wsp2d= 'Jumlah SP2D harus diisi!';
            $('#wsp2d').fadeIn(0);
            $('#wsp2d').html(wsp2d);
            jml++;
        }
    
        if(kd_d_lhp==''){
            var wlhp= 'Jumlah LHP harus diisi!';
            $('#wlhp').fadeIn(0);
            $('#wlhp').html(wlhp);
            jml++;
        }
    
        if(kd_d_rekon==''){
            var wrekon= 'Jumlah Rekon harus diisi!';
            $('#wrekon').fadeIn(0);
            $('#wrekon').html(wrekon);
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
    
        if(jml>0){
            return false
        }else{
            return true;
        }
    
    }
</script>