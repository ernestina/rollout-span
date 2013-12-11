<h2>DATA PERMASALAHAN</h2>
<!--center><?php //$this->load('dasbor/pknLvl2') ?></center-->
<div id="top">
    <div id="form"></div>
    <div class="kolom3">
        <fieldset><legend><?php
if (isset($this->d_ubah)) {
    echo 'Ubah Data Masalah';
} else {
    echo 'Tambah Data Masalah';
	echo Session::get('id_user');
}
?></legend>
            <div id="form-input"><div class="kiri">
                    <form method="POST" action="<?php
                if (isset($this->d_ubah)) {
                    echo URL . 'dataMasalah/updDataMasalah';
                } else {
                    $_SERVER['PHP_SELF'];
                }
?>">
                              <?php
                              if (isset($this->d_ubah)) {
                                  echo "<input type=hidden name='kd_d_mslh' value=" . $this->d_ubah->get_kd_d_mslh() . ">";
                              }

                              if (isset($this->error)) {
                                  echo "<div class=error>" . $this->error . "</div>";
                              }
                              ?>

                        <input type="hidden" name="kd_d_user" id="kd_d_user" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_user() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_user() : '88888'); ?>">
                        
						<div id="wtgl"  class="error"></div>
						<label>Tanggal</label><input type="text" name="tgl_mslh" id="tgl_mslh" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_tgl_mslh() : (isset($this->d_rekam) ? $this->d_rekam->get_tgl_mslh() : ''); ?>">
                        
						<div id="wmslh"  class="error"></div>
						<label>Uraian Permasalahan</label><textarea type="text" name="masalah" id="masalah" rows="7" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_mslh() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_mslh() : ''); ?>"></textarea>
                        
                        <ul class="inline tengah">
                            <li><input class="normal" type="submit" onclick="" value="BATAL"></li>
                            <li><input class="sukses" type="submit" name="<?php echo isset($this->d_ubah) ? 'upd_d_mslh' : 'add_d_mslh'; ?>" value="SIMPAN" onClick="return cek();"></li>
                        </ul>
                    </form>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="kolom4" id="table">
        <fieldset><legend>Data Masalah</legend>
            <div id="table-title"></div>
            <div id="table-content">
                <table class="table-bordered zebra scroll">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th width ="25%">Tanggal</th>
                            <th width ="60%">Masalah</th>
                            <th width ="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($this->data as $val) {
                            //var_dump($val);
                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>" . date("d/m", strtotime($val->get_tgl_mslh())) . "</td>";
                            echo "<td>" . $val->get_masalah() . "</td>";

                            echo "<td><a href=" . URL . "dataMasalah/delDataMasalah/" . $val->get_kd_d_mslh() . " onclick=\"return del('" . $val->get_tgl_mslh() . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataMasalah/addDataMasalah/" . $val->get_kd_d_mslh() . "><i class=\"icon-pencil\"></i></a></td>";
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
        
        $('#kd_tgl_mslh').change(function(){
            if(document.getElementById('tgl_mslh').value !=''){
                $('#wtgl').fadeOut(200);
            }
        })
        
        $('#kd_masalah').keyup(function(){
            if(document.getElementById('masalah').value !=''){
                $('#wmslh').fadeOut(200);
            }
        })

    }
    
    $(function() { 
        $("#tgl_mslh").datepicker({dateFormat: "yy-mm-dd"
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
        var tgl_mslh = document.getElementById('tgl_mslh').value;
        var masalah = document.getElementById('masalah').value;
        
        var jml=0;
        if(kd_d_user==''){
            var wuser= 'User harus diisi!';
            $('#wuser').fadeIn(0);
            $('#wuser').html(wuser);
            jml++;
        }
        
        if(tgl_mslh==''){
            var wtgl= 'Tanggal harus diisi!';
            $('#wtgl').fadeIn(0);
            $('#wtgl').html(wtgl);
            jml++;
        }
            
        if(masalah==''){
            var wmslh= 'Masalah harus diisi!';
            $('#wmslh').fadeIn(0);
            $('#wmslh').html(wmslh);
            jml++;
        }
        
        if(jml>0){
            return false
        }else{
            return true;
        }
    }
</script>