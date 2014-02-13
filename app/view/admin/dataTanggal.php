<h2>MONITORING TANGGAL PADA </h2>
<h2><?php echo strtoupper($this->kanwil);?></h2>
 <div id="to_string" style='text-align:center'></div>
<div id="top">
	<div id="pilihan">
		<p><b>Pilih Tanggal : </b><input type="text" id="pil_tgl" name="datepicker" value=""></p>
	</div>
	<div class="fitur" id="table">
        <div class="kolom6">
            <fieldset><legend>Data</legend>
                <div id="table-title"></div>
                <div id="table-content">
                    
				</div>
			</fieldset>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		var kd_kanwil = <?php echo $this->kd_kanwil; ?>;
		$('#pil_tgl').datepicker({
			changeMonth:true,
		});

		$('#pil_tgl').change(function(){
			dataPerDate(kd_kanwil, this.value);
		})

		var cdate = new Date();
		var tgl = cdate.getDate();
		var bln = cdate.getMonth()+1;
		var thn = cdate.getFullYear();
		var today = bln+'/'+tgl+'/'+thn; console.log(today);
		dataPerDate(kd_kanwil,today);
	});

	function dataPerDate(kd_kanwil, datePick){
		//var tmp = document.getElementById('pil_tgl').value;
		var arrtgl = datePick.split('/'); //console.log(arrtgl);
		var tgl = arrtgl[2]+'-'+arrtgl[0]+'-'+arrtgl[1];
		var url = '<?php echo URL;?>dataKppn/viewTableDataTanggal/'+kd_kanwil+'/'+tgl;
		$('#to_string').html('<b>Tanggal '+dateToString(arrtgl)+'</b>');
		//console.log(url);
		$.post(url,{},function(data){
			//document.getElementById('table-content').value = data;
			//console.log(data);
			$('#table-content').html(data);
		});
	}

	function dateToString(date){
		var bln = ''; console.log(date[0]);
		var tmp = date[0];
		if(tmp.length<2){
			tmp = '0'+tmp;
		}
		switch(tmp){
			case '01' || '1':
				bln = 'Januari';
				break;
			case '02' || 2:
				console.log('test');
				bln = 'Februari';
				break;
			case '03' || 3:
				bln = 'Maret';
				break;
			case '04' || 4:
				bln = 'April';
				break;
			case '05' || 5:
				bln = 'Mei';
				break;
			case '06' || 6:
				bln = 'Juni';
				break;
			case '07' || 7:
				bln = 'Juli';
				break;
			case '08' || 8:
				bln = 'Agustus';
				break;
			case '09' || 9:
				bln = 'September';
				break;
			case '10':
				bln = 'Oktober';
				break;
			case '11':
				bln = 'Nopember';
				break;
			case '12':
				bln = 'Desember';
				break;
		}
		var day = date[1]+' '+bln+' '+date[2]; console.log(day);
		return day;
	}
</script>