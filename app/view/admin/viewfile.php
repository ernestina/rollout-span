<div class="vlamp">
<?php 
if($this->file!='' AND !is_null($this->file) AND !file_exists('report/'.$this->file)) {
	$cfile = explode(".", $this->file);
	$len = count($cfile);
	$ext = $cfile[$len-1];
	if($ext=='pdf'){
	?>
<iframe  width= 800 height= 500 src="<?php echo URL;?>report/<?php echo $this->file;?>">
    <?php 
    	}elseif($ext=='doc' || $ext=='docx'){
    		?>
<!--<iframe  width= 800 height= 500 src="http://docs.google.com/gview?url=<?php echo URL;?>report/<?php echo $this->file;?>">-->
<a href="<?php echo URL;?>report/<?php echo $this->file;?>">
<img src="../../public/img/word.jpg" style="margin-left:40%;margin-top:20%">
</a>


    		<?php
    	}elseif($ext=='xls' || $ext=='xlsx'){
            ?>
            <!--<iframe  width= 800 height= 500 src="http://docs.google.com/gview?url=<?php echo URL;?>report/<?php echo $this->file;?>">-->
            <a href="<?php echo URL;?>report/<?php echo $this->file;?>">
            <img src="../../public/img/excel.jpg" style="margin-left:40%;margin-top:20%">
            </a>


            <?php
        }

	}else{
        echo "</br></br></br></br></br><h2 align=center>File Laporan Belum di Upload</h2>";
        echo "<p align='center'>Mohon segera upload file surat yang bersangkutan</p>";
    } ?>
    
    
</iframe></div>