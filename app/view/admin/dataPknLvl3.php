<!--tampilan judul ini masih salah jika dibuka pakai user subdit, tapi untuk user admin sudah benar-->
<?php 
	foreach ($this->data as $val){ 
		$pkn=$val->get_kd_d_user();
	}
	if ($pkn >=88881 && $pkn <=88884) {
?>
<div id="top">
<h2>DATA PKN SUBDIT
	<?php 
			if ($pkn == 88881) { echo "RKN"; }
			else if ($pkn == 88882){ echo "RKUN";}
			else if ($pkn == 88883){ echo "RPH";}
			else { echo "RPL";}
		
        ?>
</h2>
<center><?php $this->load('dasbor/pknLvl3') ?></center>
<?php if (Session::get('role') == PKN) { ?>
    
            <input id="add_data" class="normal" type="button" onclick="addData()" value="TAMBAH DATA">
     
    <?php } ?>

    <div id="form"></br></br>
        </legend-->
        <div id="form_input"><div class="kiri">
                <form id="form_rekam"> 
                <?php
                echo "<input type='hidden' name='add_d_pkn' value=''>";
                if (isset($this->d_ubah)) {
                    echo "<input type=hidden name='kd_d_pkn' value=" . $this->d_ubah->get_kd_d_pkn() . ">";
                }

                if (isset($this->error)) {
                    echo "<div class=error>" . $this->error . "</div>";
                }
                ?>
                    <input type="hidden" name="kd_d_user" id="kd_d_user" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_user() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_user() : Session::get('id_user')); ?>">
                    <input type="hidden" name="kd_d_user_pkn" id="kd_d_user_pkn" size="8" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_user_pkn() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_user_pkn() : Session::get('id_user')); ?>">
                    <div id="wdouble" class="error"></div>
                    <div id="wtgl"  class="error"></div>
                    <label class="isian">Tanggal</label><input type="text" name="kd_d_tgl" id="kd_d_tgl" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_tgl() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_tgl() : ''); ?>">

                    <div id="wsp2d"  class="error"></div>
                    <label class="isian">SP2D Sukses</label><input type="number" name="kd_d_sp2d" id="kd_d_sp2d" size="50" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_sp2d() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_sp2d() : ''); ?>">
                    <div id="wsp2d_gagal" class="error"></div>
                    <label class="isian">SP2D Gagal</label><input type="number" name="kd_d_sp2d_gagal" id="kd_d_sp2d_gagal" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_sp2d_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_sp2d_gagal() : ''); ?>">

                    <div id="wspt" class="error"></div>
                    <label class="isian">SPT Sukses</label><input type="number" name="kd_d_spt" id="kd_d_spt" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_spt() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_spt() : ''); ?>">
                    <div id="wspt_gagal" class="error"></div>
                    <label class="isian">SPT Gagal</label><input type="number" name="kd_d_spt_gagal" id="kd_d_spt_gagal" value="<?php echo isset($this->d_ubah) ? $this->d_ubah->get_kd_d_spt_gagal() : (isset($this->d_rekam) ? $this->d_rekam->get_kd_d_spt_gagal() : ''); ?>">

                    <ul class="inline" style="margin-left: 220px">
                        <!--li><input id="batal" class="normal" type="button" onclick="" value="BATAL"></li-->
                        <li><input id="submit" class="sukses" type="button" name="<?php echo isset($this->d_ubah) ? 'upd_d_pkn' : 'add_d_pkn'; ?>" value="SIMPAN" onClick=""></li>
                    </ul>
                </form>
            </div>
        </div>
        </fieldset>
    </div>
    <fieldset><legend>DATA <?php Session::get('role') ?> </legend>
        <div class="kolom6" id="table">
        </div></br><div id="nav"></div>
        <?php
        $subdit = Session::get('id_user');
        if (isset($this->data)) {
            foreach ($this->data as $vali) {
                $subdit = $vali->get_kd_d_user();
            }
        }
        ?>
    </fieldset>
</div> <!--end modal-->

</div>
</div>
<!-- UPLOAD FILE LAPORAN BA -->
<div id="uplModal" class="modalDialog">
<div>
    <!--input id="add_data" class="normal" type="button" onclick="addData('<?php //echo Session::get('id_user');?>')" value="TAMBAH DATA"-->
    <h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px">
        Upload File Laporan
    </h2>
    
    <a href="<?php echo URL . 'dataPkn/addDataPkn'; ?>" title="Tutup" class="close"><i class="icon-remove icon-white" style="margin-left: 4px; margin-top: 0px"></i></a>
    
    <div id="top">
        <form method="POST" action="<?php echo URL . 'dataPkn/upload_file';?>" enctype="multipart/form-data">
                  
            <div id="wfile" class="error"></div>
            <input type="hidden" name="kd_d_user" id="kd_d_user" size="8" value="">
            <input type="hidden" name="id_data" id="id_data" value="
                <?php 
                    if (isset($this->kd_d_pkn)) {
                        echo $this->kd_d_pkn;
                    }
                ?>
            ">
            <table style="margin: 0px 5px 0px 5px">
                <tr>
                    <td align="left" width="30%">Nama File</td><td> : </td><td><div id="filename"></div></td>
                </tr>
                <tr>
                    <td>File Upload</td><td> : </td><td><input type="file" name="fupload" id="fupload"></td>
                </tr>
            </table>
            <ul class="inline" style="margin-left: 230px";>
                    <li><input type="submit" id="uplsubmit" class="sukses" name="submit_file" value="SIMPAN" onClick="return cek_upload();"></li>
                </ul>   
        </form>
        </div>
    </div><!--end top-->
</div><!--end modal-->
<?php } else { echo "<h2>"; echo "Maaf halaman yang Anda cari tidak ada"; echo "</h2>";} ?>

<script type="text/javascript">
    var add_data = false;
    $(function() {
        page = 1;
        maxPerPage = 10;
        dataPosition = 1;
        numOfPage = 0;
        data = null;
        id = <?php if(isset($this->pkn)){ 
                echo $this->pkn;
            }
            else{ 
                echo Session::get('id_user');
            }?>
            ;
        <?php if(Session::get('role')==ADMIN || Session::get('role')==LAINYA){?>
            var url = '<?php echo URL; ?>dataPkn/data_nav/'+id;
               var url_data = '<?php echo URL; ?>dataPkn/get_data_pkn_array/'+id;
        <?php }else{ ?>
            var url = '<?php echo URL; ?>dataPkn/data_nav/';
               var url_data = '<?php echo URL; ?>dataPkn/get_data_pkn_array/';
        <?php } ?>
        
               console.log(url_data);
                var divContainer = "table";
                maxPerPage = 10;
                //console.log(PagingClass);
                createPaging(url, url_data, page, maxPerPage, divContainer);
                hideErrorId();
                hideWarning();

                $('#batal').click(function() {
                    emptyField();
                    hideErrorId();
                    hideWarning();
                    $('#form_input').dialog('close');
                })

                $('#submit').click(function() {
                    return cek();
                    $('#form_input').dialog('close');

                });

<?php if (isset($this->d_ubah)) { ?>
                    $('#form_input').dialog('open');
<?php } ?>

        $('#fupload').change(function(){
            var tmp = $('#fupload').val();
            var tmp_arr = tmp.split('\\');
            console.log(tmp_arr);
            var len = tmp_arr.length; console.log(len);
            var filename = tmp_arr[len-1];
            $('#filename').html(filename);
        })
            });

            function rekam() {
                var formData = new FormData($('#form_rekam')[0]);
                if (add_data) {
                    var url_rekam = "<?php echo URL; ?>dataPkn/addDataPkn";
                } else {
                    var url_rekam = "<?php echo URL; ?>dataPkn/updDataPkn";
                }
                $.ajax({
                    url: url_rekam,
                    type: 'POST',
                    data: formData,
                    async: false,
                    success: function() {
                        $('#form_input').dialog('close');
                        window.location.href = '<?php echo URL; ?>dataPkn/addDataPkn'
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }

            function emptyField() {
                $('#kd_d_tgl').val('');
                $('#kd_d_sp2d').val('');
                $('#kd_d_sp2d_gagal').val('');
                $('#kd_d_spt').val('');
                $('#kd_d_spt_gagal').val('');
            }

            function addData() {
                //TODO open dialog form add data kppn
                add_data = true;
                $('#form_input').dialog('open');
            }

            $('#form_input').dialog({
                autoOpen: false,
                width: 400,
                height: 300,
                modal: true,
                title: '<?php
if (isset($this->d_ubah)) {
    echo 'Ubah Data PKN';
} else {
    echo 'Tambah Data PKN';
}
?>',
                close: function() {
                    emptyField();
                    hideErrorId();
                    hideWarning();
                }

            });

            function hideErrorId() {
                $('.error').fadeOut(0);
            }

            function isDoubleData() {
                var tgl_input = document.getElementById('kd_d_tgl').value;
                console.log(tgl_input);
                $.post("<?php echo URL; ?>dataPkn/is_double_data", {tgl: "" + tgl_input + ""},
                function(data) {
                    console.log(data);
                    var count = parseInt(data);
                    if (data > 0) {
                        var warn = "data pernah direkam, lakukan ubah data!";
                        $('#wdouble').fadeIn();
                        $('#wdouble').html(warn);
                        return false;
                    } else {
                        rekam();
                        return true;
                    }
                });
            }

            function hideWarning() {
                $('#kd_d_user').keyup(function() {
                    if (document.getElementById('kd_d_user').value != '') {
                        $('#wuser').fadeOut(200);
                    }
                })

                $('#kd_d_tgl').change(function() {
                    if (document.getElementById('kd_d_tgl').value != '') {
                        $('#wtgl').fadeOut(200);
                    }
                })

                $('#kd_d_sp2d').keyup(function() {
                    if (document.getElementById('kd_d_sp2d').value != '') {
                        $('#wsp2d').fadeOut(200);
                    }
                })

                $('#kd_d_sp2d_gagal').keyup(function() {
                    if (document.getElementById('kd_d_sp2d_gagal').value != '') {
                        $('#wsp2d_gagal').fadeOut(200);
                    }
                })

                $('#kd_d_spt').keyup(function() {
                    if (document.getElementById('kd_d_spt').value != '') {
                        $('#wspt').fadeOut(200);
                    }
                })

                $('#kd_d_spt_gagal').keyup(function() {
                    if (document.getElementById('kd_d_spt_gagal').value != '') {
                        $('#wspt_gagal').fadeOut(200);
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

            function del(user) {
                var text = "Yakin data Tanggal " + user + " akan dihapus?";
                if (confirm(text)) {
                    return true;
                } else {
                    return false;
                }
            }

            function cek() {
                var pattern = '^[0-9]+$';
                var kd_d_user = document.getElementById('kd_d_user').value; console.log(kd_d_user);
                var kd_d_tgl = document.getElementById('kd_d_tgl').value;
                var kd_d_sp2d = document.getElementById('kd_d_sp2d').value;
                var kd_d_sp2d_gagal = document.getElementById('kd_d_sp2d_gagal').value;
                var kd_d_spt = document.getElementById('kd_d_spt').value;
                var kd_d_spt_gagal = document.getElementById('kd_d_spt_gagal').value;
                var jml = 0;
                /*if (kd_d_user == '') {
                    var wuser = 'User harus diisi!';
                    $('#wuser').fadeIn(0);
                    $('#wuser').html(wuser);
                    jml++;
                }*/

                if (kd_d_tgl == '') {
                    var wtgl = 'Tanggal harus diisi!';
                    $('#wtgl').fadeIn(0);
                    $('#wtgl').html(wtgl);
                    jml++;
                }

                if (!kd_d_sp2d.match(pattern)) {
                    var wsp2d = "Jumlah SP2D harus dalam bentuk angka!";
                    $('#wsp2d').html(wsp2d);
                    $('#wsp2dt').fadeIn(200);
                    jml++;
                }

                if (kd_d_sp2d == '') {
                    var wsp2d = 'SP2d harus diisi!';
                    $('#wsp2d').fadeIn(0);
                    $('#wsp2d').html(wsp2d);
                    jml++;
                }

                if (!kd_d_sp2d_gagal.match(pattern)) {
                    var wsp2d_gagal = "Jumlah SP2D harus dalam bentuk angka!";
                    $('#wsp2d_gagal').html(wsp2d_gagal);
                    $('#wsp2d_gagal').fadeIn(200);
                    jml++;
                }

                if (kd_d_sp2d_gagal == '') {
                    var wsp2d_gagal = 'SP2D harus diisi!';
                    $('#wsp2d_gagal').fadeIn(0);
                    $('#wsp2d_gagal').html(wsp2d_gagal);
                    jml++;
                }

                if (!kd_d_spt.match(pattern)) {
                    var wspt = "Jumlah SPT harus dalam bentuk angka!";
                    $('#wspt').html(wspt);
                    $('#wspt').fadeIn(200);
                    jml++;
                }

                if (kd_d_spt == '') {
                    var wspt = 'SPT harus diisi!';
                    $('#wspt').fadeIn(0);
                    $('#wspt').html(wspt);
                    jml++;
                }

                if (!kd_d_spt_gagal.match(pattern)) {
                    var wspt_gagal = "Jumlah SPT harus dalam bentuk angka!";
                    $('#wspt_gagal').html(wspt_gagal);
                    $('#wspt_gagal').fadeIn(200);
                    jml++;
                }

                if (kd_d_spt_gagal == '') {
                    var wspt_gagal = 'SPT harus diisi!';
                    $('#wspt_gagal').fadeIn(0);
                    $('#wspt_gagal').html(wspt_gagal);
                    jml++;
                }
                console.log(jml);
                if (jml > 0) {
                    return false
                } else {
                    if (add_data) {
                        console.log(isDoubleData());
                        return isDoubleData();
                    }
                    rekam();
                    return true;
                }
            }

function cek_upload(){
        var file_upload = document.getElementById('fupload').value;
        var jml = 0;
        if(file_upload==''){
            $('#wfile').html('file belum dipilih!');
            $('#wfile').fadeIn();
            jml++;
        }else{
            var fsplit = file_upload.split('.');
            var ext = fsplit[fsplit.length-1];
            var cek_file = ext=='doc' || ext=='docx' || ext=='xls' || ext=='xlsx' || ext=='pdf';
            if(!cek_file){
                $('#wfile').html('file tidak sesuai dengan format!');
                $('#wfile').fadeIn();
                jml++;
            } 
        }
        console.log(jml);
        if(jml>0){
            return false;
        }
    }

function viewFile(file){
        var url = "<?php echo URL;?>dataPkn/view_file/"+file;
    
        var w = 800;
        var h = 500;
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        var title = "tampilan surat tugas";
        window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    }

function styleListMasalah(obj){
        obj.style.borderRadius="2px";
        obj.style.borderColor="#B6B6A9";
        obj.style.borderWidth="2px";
        obj.style.backgroundColor="#E0E0D1";
        obj.style.padding = "5px";
        obj.style.marginBottom="2px";
    }

    function viewMasalah(id_data){
        console.log(id_data);
        var url_data = '<?php echo URL."dataMasalah/get_masalah_kppn/"; ?>'+id_data+'<?php echo "/".PKN;?>';
        $.ajax({
            type:'post',
            url: url_data,
            data:'',
            dataType:'json',
            success:function(data){
                var oMasalah = 'oMasalah';
                if(isExistDomId(oMasalah)) document.getElementById(oMasalah).remove();
                var div = document.createElement('div');
                div.setAttribute('id',oMasalah);
                div.setAttribute('title','Daftar Masalah');
                var count_data = Object.keys(data).length;
                var ul = document.createElement('div');
                ul.style.color = "blue";
                ul.style.fontSize = "18px";
                if(count_data==0){
                    var li = document.createElement('div');
                    styleListMasalah(li);
                    li.appendChild(document.createTextNode('Data Tidak Ditemukan!'));
                    ul.appendChild(li);
                }else{
                    for(key in data){
                        var li = document.createElement('div');
                        styleListMasalah(li);
                        li.appendChild(document.createTextNode(data[key].masalah));
                        ul.appendChild(li);
                    }
                }
                div.appendChild(ul);
                document.getElementsByTagName('body')[0].appendChild(div);
                $( "#oMasalah" ).dialog({
                  autoOpen: false,
                    width: 400,
                    //height: 400,
                    show: {
                        effect: "blind",
                        duration: 300
                    },
                    hide: {
                        effect: "blind",
                        duration: 300
                    }
                });

                $( "#oMasalah" ).dialog( "open" );
            },
            error:function(data){
                //console.log(data);
            }  
        });
    }
</script>