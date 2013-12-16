<h2>MONITORING DATA BA 999</h2>
<center><?php $this->load('dasbor/baLvl2') ?></center>
<div id="top">
    <div id="form">
	<?php if(Session::get('role')==BA999) { ?>
		<div>
			<input id="add_data" class="normal" type="button" onclick="addData()" value="TAMBAH DATA">
		</div></br></br></br>
	<?php } ?>
	<!--<?php if (Session::get('role') == 4) { 
	echo "<div><input id='add_data' class='normal' type='button' onclick='addData()' value='TAMBAH DATA'>
	</div></br></br>";
	}
	?>-->
        <div class="kolom3" style="display:none">
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
                <div id="form_input">
                    <div class="kiri">
                        <form id="form_rekam">
                        <!--method="POST" action="
                        <?php
                        if (isset($this->d_ubah)) {
                            echo URL . 'dataBa/updDataBa';
                        } else {
                            $_SERVER['PHP_SELF'];
                        }
                        ?>"-->
                                  <?php
                                  echo "<input type='hidden' name='add_d_ba' value=''>";
                                  if (isset($this->d_ubah)) {
                                      echo "<input type=hidden name='kd_d_ba' value=" . $this->d_ubah->get_kd_d_ba() . ">";
                                  }

                                  if (isset($this->error)) {
                                      echo "<div class=error>" . $this->error . "</div>";
                                  }
                                  ?>
                            <input type="hidden" name="kd_d_user" id="kd_d_user" size="8" value="99999">
                            <div class="kolom1" style="width:600spx">
							<div id="wdouble" class="error"></div>
							<div id="wuser_ba"  class="error"></div>
                            <label >Pilih Satker</label>
                            <select name="kd_d_user_ba" id="kd_d_user_ba" style="width: 100px" type="text">
                                <option value="1">DJA 979321</option>
                                <option value="2">DJA 999200</option>
                                <option value="3">DJA 984501</option>
                                <option value="4">DJKN 977191</option>
                                <option value="5">DJPK 999201</option>
                                <option value="6">DJPK 999202</option>
                                <option value="7">DJPK 999204</option>
                                <option value="8">DSP 987361</option>
                                <option value="9">DSP 984475</option>
                                <option value="10">PKN 440780</option>
                                <option value="11">PKN 999001</option>
                                <option value="12">SMI 997386</option>
                                <option value="13">SMI 983783</option>
                                <option value="14">SMI 961671</option>
                                <option value="15">DJPK 985251 2</option>
                                <option value="16">DJPK 985251 6</option>
                                <option value="17">DJPU 960186</option>
                                <option value="18">DJPU 977263</option>
                            </select>
                            <div id="wtgl"  class="error"></div>
                            <label>Tanggal</label><input type="text" name="kd_d_tgl" id="kd_d_tgl" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_tgl() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_tgl() : ''); ?>">
                            <div id="wspm"  class="error"></div>
                            <label>SPM Sukses</label><input type="number" name="kd_d_spm" id="kd_d_spm" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_spm() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_spm() : ''); ?>">
                             <div id="wspm_gagal"  class="error"></div>
                            <label>SPM Gagal</label><input type="number" name="kd_d_spm_gagal" id="kd_d_spm_gagal" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_spm_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_spm_gagal() : ''); ?>">
                             <div id="wrekon"  class="error"></div>
                            </div>
							<div class="kolom2" style="width:160px">
							<label>Rekon Sukses</label><input type="number" name="kd_d_rekon" id="kd_d_rekon" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_rekon() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_rekon() : ''); ?>">
                             <div id="wrekon_gagal"  class="error"></div>
                            <label>Rekon Gagal</label><input type="number" name="kd_d_rekon_gagal" id="kd_d_rekon_gagal" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_rekon_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_rekon_gagal() : ''); ?>">
                             <div id="wkontrak"  class="error"></div>
                            <label>Kontrak Sukses</label><input type="number" name="kd_d_kontrak" id="kd_d_kontrak" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_kontrak() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_kontrak() : ''); ?>">
                             <div id="wkontrak_gagal"  class="error"></div>
                            <label>Kontrak Gagal</label><input type="number" name="kd_d_kontrak_gagal" id="kd_d_kontrak_gagal" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_kontrak_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_kontrak_gagal() : ''); ?>">
							</div>
                            <ul class="inline tengah">
                                <li><input id="batal" class="normal" type="button" onclick="" value="BATAL"></li>
                                <li><input id="submit" class="sukses" type="button" name="<?php echo isset($this->d_ubah) ? 'upd_d_ba' : 'add_d_ba'; ?>" value="SIMPAN" onClick=""></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="kolom6" id="table">
            <!--<fieldset>
                <legend>Data BA 999</legend>
                <div id="table-title"></div>
                <div id="table-content">
                    <table class="table-bordered zebra scroll">
                        <thead>
                            <tr>
                                <th rowspan="2" width="5%">No</th>
                                <th rowspan="2" width="5%">Tanggal</th>
                                <th rowspan="2" width="10%">Satker</th>
                                <th colspan="3" width="25%">SPM</th>
                                <th colspan="3" width="25%">Rekon</th>
                                <th colspan="3" width="25%">Kontrak</th>
								<?php if (Session::get('role') == BA999) { 
								echo "<th rowspan='2' width='10%'>Aksi</th>";
								}
								?>
                            </tr>
                            <tr>
                                <th width="7%" >Sukses</th>
                                <th width="7%">Gagal</th>
                                <th width="6%">%</th>
                                <th width="7%">Sukses</th>
                                <th width="7%">Gagal</th>
                                <th width="6%">%</th>
                                <th width="7%">Sukses</th>
                                <th width="7%">Gagal</th>
                                <th width="6%">%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($this->data as $val) {
                                //var_dump($val);
                                echo "<tr>";
                                echo "<td style=\"text-align: center\">$no</td>";
                                $sat = $val->get_kd_d_user_ba();
                                echo "<td>" . date("d/m/Y", strtotime($val->get_kd_d_tgl())) . "</td>";
                                if ($sat == 1) {
                                    echo "<td>DJA 979321</td>";
                                } else if ($sat == 2) {
                                    echo "<td>DJA 999200</td>";
                                }else if ($sat == 3) {
                                    echo "<td>DJA 984501</td>";
                                }else if ($sat == 4) {
                                    echo "<td>DJKN 977191</td>";
                                }else if ($sat == 5) {
                                    echo "<td>DJPK 999201</td>";
                                }else if ($sat == 6) {
                                    echo "<td>DJPK 999202</td>";									
                                }else if ($sat == 7) {
                                    echo "<td>DJPK 999204</td>";
                                }else if ($sat == 8) {
                                    echo "<td>DSP 987361</td>";
                                }else if ($sat == 9) {
                                    echo "<td>DSP 984475</td>";
                                }else if ($sat == 10) {
                                    echo "<td>PKN 440780</td>";
                                } elseif ($sat == 11) {
                                    echo "<td>PKN 999001</td>";
                                } else if ($sat == 12) {
                                    echo "<td>SMI 997386</td>";
                                }else if ($sat == 13) {
                                    echo "<td>SMI 983783</td>";
                                }else if ($sat == 14) {
                                    echo "<td>SMI 961671</td>";
                                }else if ($sat == 15) {
                                    echo "<td>DJPK 985251 2</td>";
                                }else if ($sat == 16) {
                                    echo "<td>DJPK 985251 6</td>";
                                }else if ($sat == 17) {
                                    echo "<td>DJPU 960186</td>";
                                }else if ($sat == 18) {
                                    echo "<td>DJPU 977263</td>";
                                }else {
                                    echo "<td>Satker tidak ditemukan</td>";
                                }
                                echo "<td style=\"text-align: center\">" . $val->get_kd_d_spm() . "</td>";
                                echo "<td style=\"text-align: center\">" . $val->get_kd_d_spm_gagal() . "</td>";
                                echo "<td style=\"text-align: center\"><b>" . $val->get_kd_d_spm_persen() . "%</b></td>";
                                echo "<td style=\"text-align: center\">" . $val->get_kd_d_rekon() . "</td>";
                                echo "<td style=\"text-align: center\">" . $val->get_kd_d_rekon_gagal() . "</td>";
                                echo "<td style=\"text-align: center\"><b>" . $val->get_kd_d_rekon_persen() . "%</b></td>";
                                echo "<td style=\"text-align: center\">" . $val->get_kd_d_kontrak() . "</td>";
                                echo "<td style=\"text-align: center\">" . $val->get_kd_d_kontrak_gagal() . "</td>";
                                echo "<td style=\"text-align: center\"><b>" . $val->get_kd_d_kontrak_persen() . "%</b></td>";
								if (Session::get('role') == BA999) { 
                                echo "<td style=\"text-align: center\"><a href=" . URL . "dataBa/delDataBa/" . $val->get_kd_d_ba() . " onclick=\"return del('" . date("d/m/Y", strtotime($val->get_kd_d_tgl())) . "')\"><i class=\"icon-trash\"></i></a>
                        <a href=" . URL . "dataBa/addDataBa/" . $val->get_kd_d_ba() . "><i class=\"icon-pencil\"></i></a></td>";
								}
								echo "</tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>-->
        </div><div id="nav"></div>
    </div>
</div>
<script type="text/javascript">
    var add_data = false;
    $(function(){
        page = 1;
        maxPerPage = 10;
        dataPosition = 1;
        numOfPage = 0;
        data = null;
        url = '<?php echo URL; ?>dataBa/data_nav';
        url_data = '<?php echo URL;?>dataBa/get_data_ba_array';
        var divContainer = "table";
        maxPerPage = 10;
        //console.log(PagingClass);
        createPaging(url,url_data,page,maxPerPage,divContainer);
        hideErrorId();
        hideWarning();
        
		$('#batal').click(function(){
			emptyField();
			hideErrorId();
			hideWarning();
			$('#form_input').dialog('close');
		})
		
		$('#submit').click(function(){
			return cek();
			$('#form_input').dialog('close');
			
		});
		
		<?php if(isset($this->d_ubah)){ ?>
			$('#form_input').dialog('open');
		<?php } ?>
    });
	
    function rekam(){
        var formData = new FormData($('#form_rekam')[0]);
        if(add_data){
            var url_rekam = "<?php echo URL; ?>dataBa/addDataBa";
        }else{
            var url_rekam = "<?php echo URL; ?>dataBa/updDataBa";
        }
        $.ajax({
            url: url_rekam,
            type: 'POST',
            data: formData,
            async: false,
            success: function(){
                $('#form_input').dialog('close');
                window.location.href='<?php echo URL;?>dataBa/addDataBa'
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }

	function emptyField(){
		$('#kd_d_tgl').val('');
		$('#kd_d_spm').val('');
		$('#kd_d_spm_gagal').val('');
		$('#kd_d_kontrak').val('');
		$('#kd_d_kontrak_gagal').val('');
		$('#kd_d_rekon').val('');
		$('#kd_d_rekon_gagal').val('');
	}
	
	function addData(){
		//TODO open dialog form add data kppn
        add_data = true;
		$('#form_input').dialog('open');
	}
	
	$('#form_input').dialog({
		autoOpen: false,
		width: 500,
		height: 400,
		modal: true,
		close: function(){
			emptyField();
			hideErrorId();
			hideWarning();
		}
		
	});
	
	function isDoubleData(){
        var id_user = document.getElementById('kd_d_user_ba').value; console.log(id_user);
        var tgl_input = document.getElementById('kd_d_tgl').value; console.log(tgl_input);
        $.post("<?php echo URL;?>dataBa/is_double_data",{tgl:""+tgl_input+"",jenis:id_user},
            function(data){
                var count = parseInt(data); console.log(data);
                if(data > 0){
                    var warn = "data pernah direkam, lakukan ubah data!";
                    $('#wdouble').fadeIn();
                    $('#wdouble').html(warn);
                    return false; 
                }else{
                    rekam();
                    return true;
                }
        });
    }

    
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
			if(add_data){
                return isDoubleData();
            }
            rekam();
            return true;
        }
    }
</script>