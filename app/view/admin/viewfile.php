<?php 
if($this->file!='' AND !is_null($this->file) AND file_exists('report/'.$this->file)) {
	$cfile = explode(".", $this->file);
	$len = count($cfile);
	$ext = $cfile[$len-1];
	if($ext=='pdf'){
	?>
<div class="vlamp"><iframe  width= 800 height= 500 src="<?php echo URL;?>report/<?php echo $this->file;?>">
    <?php 
    	}else{
    		?>
<div class="vlamp"><iframe  width= 800 height= 500 src="http://docs.google.com/gview?url=<?php echo URL;?>report/<?php echo $this->file;?>">
    		<?php
    	}

	}else{
        echo "</br></br></br></br></br><h2 align=center>File Laporan Belum di Upload</h2>";
    } ?>
    
    <p align="center">Mohon segera upload file surat yang bersangkutan</p>
</iframe></div>
<a href="http://docs.google.com/gview?url=<?php echo URL;?>report/<?php echo $this->file;?>"></a>