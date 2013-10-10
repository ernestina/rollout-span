<h2>MONITORING DATA BA 999</h2>
<center><?php $this->load('dasbor/line3') ?></center>
<div id="top">
    <div id="form">

        <div class="kolom3">
            <fieldset><legend><?php
if (isset($this->d_ubah)) {
    echo 'Ubah Data ba';
} else {
    echo 'Tambah Data ba';
}
?></legend>
                <div id="form-input"><div class="kiri">
                        <form method="POST" action="<?php
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

                            <input type="hidden" name="kd_d_user" id="kd_d_user" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_user() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_user() : '999999'); ?>">
                            <label>Pilih Satker</label><select>
                                <option>PKN</option>
                                <option>APK</option>
                                <option>3</option>
                            </select>
                            <div id="wtgl"  class="error"></div>
                            <label>Tanggal</label><input type="text" name="kd_d_tgl" id="kd_d_tgl" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_tgl() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_tgl() : ''); ?>">
                            <div id="wbayar"  class="error"></div>
                            <label>SPM Sukser</label><input type="number" name="kd_d_bayar" id="kd_d_bayar" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_bayar() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_bayar() : ''); ?>">
                            <div id="wbayar"  class="error"></div>
                            <label>SPM Gagal</label><input type="number" name="kd_d_bayar" id="kd_d_bayar" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_bayar() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_bayar() : ''); ?>">
                            <div id="wrekon" class="error"></div>
                            <label>Rekon Sukses</label><input type="number" name="kd_d_rekon" id="kd_d_rekon" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_rekon() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_rekon() : ''); ?>">
                            <div id="wrekon" class="error"></div>
                            <label>Rekon Gagal</label><input type="number" name="kd_d_rekon" id="kd_d_rekon" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_rekon() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_rekon() : ''); ?>">
                            <div id="wjaringan" class="error"></div>
                            <label>Kontrak Sukses</label><input type="number" name="kd_d_jaringan" id="kd_d_jaringan" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_jaringan() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_jaringan() : ''); ?>">
                            <div id="wjaringan" class="error"></div>
                            <label>Kontrak Gagal</label><input type="number" name="kd_d_jaringan" id="kd_d_jaringan" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_jaringan() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_jaringan() : ''); ?>">
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
            <fieldset><legend>Data ba</legend>
                <div id="table-title"></div>
                <div id="table-content">
                    <table class="table-bordered zebra scroll">
                        <thead>
                        <th>No</th>
                        <th width ="15%">Tanggal</th>
                        <th>Satker</th>
                        <th>SPM Sukses</th>
                        <th>SPM Gagal</th>
                        <th>Rekon Sukses</th>
                        <th>Rekon Gagal</th>
                        <th>Kontrak Sukses</th>
                        <th>Kontrak Gagal</th>
                        <th width="50">Aksi</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($this->data as $val) {
                                //var_dump($val);
                                echo "<tr>";
                                echo "<td>$no</td>";
                                $sat=$val->get_kd_d_user();
                                echo "<td>" . $val->get_kd_d_tgl() . "</td>";
                                if ($sat==1){
                                echo "<td>PKN</td>";
                                } else if ($sat==2){
                                echo "<td>APK</td>";
                                } else {
                                    echo "<td>Satker tidak ditemukan</td>";
                                }
                                echo "<td>" . $val->get_kd_d_bayar() . "</td>";
                                echo "<td>" . ceil($val->get_kd_d_bayar()/rand(10,20)) . "</td>";
                                echo "<td>" . $val->get_kd_d_rekon() . "</td>";
                                echo "<td>" . ceil($val->get_kd_d_rekon()/rand(10,20)) . "</td>";
                                echo "<td>" . $val->get_kd_d_jaringan() . "</td>";
                                echo "<td>" . ceil($val->get_kd_d_jaringan()/rand(10,20)) . "</td>";
                                echo "<td><a href=" . URL . "dataBa/delDataBa/" . $val->get_kd_d_ba() . " onclick=\"return del('" . $val->get_kd_d_user() . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataBa/addDataBa/" . $val->get_kd_d_ba() . "><i class=\"icon-pencil\"></i></a></td>";
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
        
        $('#kd_d_bayar').keyup(function(){
            if(document.getElementById('kd_d_bayar').value !=''){
                $('#wbayar').fadeOut(200);
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
        var kd_d_bayar = document.getElementById('kd_d_bayar').value;
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
        
        if(!kd_d_bayar.match(pattern)){
            var wbayar = "Jumlah pembayaran harus dalam bentuk angka!";
            $('#wbayar').html(wbayar);
            $('#wbayar').fadeIn(200);
            jml++;
        }
    
        if(kd_d_bayar==''){
            var wbayar= 'Pembayaran harus diisi!';
            $('#wbayar').fadeIn(0);
            $('#wbayar').html(wbayar);
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