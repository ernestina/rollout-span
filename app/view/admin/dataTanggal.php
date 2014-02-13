<h2>MONITORING PER TANGGAL PADA <?php echo strtoupper($this->kanwil);?></h2>
<div id="top">
	<div id="pilihan">
		<h4>Pilih Tanggal :</h4>
		<input type="text" id="pil_tgl" name="datepicker" value="">
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
			dataPerDate(kd_kanwil);
		})
	});

	function dataPerDate(kd_kanwil){
		var tmp = document.getElementById('pil_tgl').value;
		var arrtgl = tmp.split('/'); //console.log(arrtgl);
		var tgl = arrtgl[2]+'-'+arrtgl[0]+'-'+arrtgl[1];
		var url = '<?php echo URL;?>dataKppn/viewTableDataTanggal/'+kd_kanwil+'/'+tgl;
		//console.log(url);
		$.post(url,{},function(data){
			//document.getElementById('table-content').value = data;
			//console.log(data);
			$('#table-content').html(data);
		});
	}
</script>