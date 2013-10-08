<div id="top">
    <div id="form">
        <h2>DATA Kanwil</h2></div>
    <div class="kolom3">
        <fieldset><legend><?php
if (isset($this->d_ubah)) {
    echo 'Ubah Data kanwil';
} else {
    echo 'Tambah Data kanwil';
}
?></legend>
            <div id="form-input"><div class="kiri">
                    <form method="POST" action="<?php
                if (isset($this->d_ubah)) {
                    echo URL . 'dataKanwil/updDataKanwil';
                } else {
                    $_SERVER['PHP_SELF'];
                }
?>">
                              <?php
                              if (isset($this->d_ubah)) {
                                  echo "<input type=hidden name='kd_d_kanwil' value=" . $this->d_ubah->get_kd_d_kanwil() . ">";
                              }

                              if (isset($this->error)) {
                                  echo "<div class=error>" . $this->error . "</div>";
                              }
                              ?>

                        <div id="wuser" class="error"></div>
                        <label>User</label><input type="number" name="kd_d_user" id="kd_d_user" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_user() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_user() : ''); ?>">
                        <div id="wtgl"  class="error"></div>
                        <label>Tanggal</label><input type="number" name="kd_d_tgl" id="kd_d_tgl" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_tgl() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_tgl() : ''); ?>">
                        <div id="wrekon" class="error"></div>
                        <label>Rekon</label><input type="number" name="kd_d_rekon" id="kd_d_rekon" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_rekon() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_rekon() : ''); ?>">
                        <div id="wjaringan" class="error"></div>
                        <label>Jaringan</label><textarea type="text" rows="10" name="kd_d_jaringan" id="kd_d_jaringan" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_jaringan() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_jaringan() : ''); ?>"></textarea>
                        <div id="wmasalah" class="error"></div>
                        <label>Masalah</label><textarea type="text" rows="10" name="kd_d_masalah" id="kd_d_masalah" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_masalah() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_masalah() : ''); ?>"></textarea>
                        </select>
                        <ul class="inline tengah">
                            <li><input class="normal" type="submit" onclick="" value="BATAL"></li>
                            <li><input class="sukses" type="submit" name="<?php echo isset($this->d_ubah) ? 'upd_d_kanwil' : 'add_d_kanwil'; ?>" value="SIMPAN" onClick="return cek();"></li>
                        </ul>
                    </form>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="kolom4" id="table">
        <fieldset><legend>Data kanwil</legend>
            <div id="table-title"></div>
            <div id="table-content">
                <table class="table-bordered zebra scroll">
                    <thead>
                    <th>No</th>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Rekon</th>
                    <th>Jaringan</th>
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
                            echo "<td>" . $val->get_kd_d_rekon() . "</td>";
                            echo "<td>" . $val->get_kd_d_jaringan() . "</td>";
                            echo "<td>" . $val->get_kd_d_masalah() . "</td>";
                            echo "<td><a href=" . URL . "dataKanwil/delDataKanwil/" . $val->get_kd_d_kanwil() . " onclick=\"return del('" . $val->get_kd_d_user() . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataKanwil/addDataKanwil/" . $val->get_kd_d_kanwil() . "><i class=\"icon-pencil\"></i></a></td>";
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
    
        $('#kd_d_rekon').keyup(function(){
            if(document.getElementById('kd_d_rekon').value !=''){
                $('#wrekon').fadeOut(200);
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
        var kd_d_rekon = document.getElementById('kd_d_rekon').value;
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