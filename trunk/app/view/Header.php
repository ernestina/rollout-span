<!DOCTYPE html>
<html>
    <head>
        <title>.:DASHBOARD:.</title>   
        <script src="<?php echo URL; ?>public/js/jquery-2.0.3.min.js"></script>
        <script src="<?php echo URL; ?>public/js/jquery-ui.js"></script>
        <script src="<?php echo URL; ?>public/js/myjs.js"></script>
        <script src="<?php echo URL; ?>public/js/teamdf-jquery-number/jquery.number.js"></script>
        <script src="<?php echo URL; ?>public/js/gaugejs/raphael.2.1.0.min.js"></script>
        <script src="<?php echo URL; ?>public/js/gaugejs/justgage.1.0.1.min.js"></script>
        <script src="<?php echo URL; ?>public/js/Chart.js"></script>
        <script src="<?php echo URL; ?>public/js/paging.js"></script>
		<link href="<?php echo URL; ?>public/js/jquery-ui-1.10.3/themes/base/jquery.ui.all.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/ernest.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/dialog.css" rel="stylesheet">

        <script type="text/javascript">
            $(function() {
                $('#datepicker').datepicker();
                $('#datepicker1').datepicker();
                $('#datepicker2').datepicker();
            });
        </script>
    </head>
    <header><img src="<?php echo URL; ?>public/img/span-putih.png" width="40px" height="48px"></header>
    <body>
        <div id="wrapper">
            <div id="menu">
                <ul>
                    <li class="nav"><a href="#"></a></li>
                    <li class="nav"><a href="#"></a></li>
                    <li class="nav"><a href="#"></a></li>
                    <?php
                    if (Session::get('role') == ADMIN) {
                        echo '<li class="nav"><a href=' . URL . 'index>BERANDA</a></li>';
                        echo '<li class="subnav"><a href=' . URL . 'dataTetap/addDataTetap>ADMIN</a>
								<ul>
								<li><a href=' . URL . 'dataBobot/viewDataBobot><i class="icon-globe icon-white"></i>Data Bobot</a></li>
								<li><a href=' . URL . 'dataTetap/addDataTetap><i class="icon-globe icon-white"></i>Data Tetap</a></li>
								<li><a href=' . URL . 'dataUser/addDataUser><i class="icon-globe icon-white"></i>Data User</a></li>
								</ul>
								</li>';
						echo'<li class="nav"><a href=' . URL . 'dataKppn/viewDataKppnLvl1>KPPN</a></li>';
						echo '<li class="nav"><a href=' . URL . 'dataBa/addDataBa>BA 999</a></li>';
						echo '<li class="nav"><a href=' . URL . 'dataPkn/viewDataPknLvl2>PKN</a></li>';
						echo '<li class="nav" ><a href=' . URL . 'dataMasalah/addDataMasalah>Rekap Masalah</a></li>';
                    }
					if (Session::get('role') == LAINYA) {
                        echo '<li class="nav"><a href=' . URL . 'index>BERANDA</a></li>';
						echo'<li class="nav"><a href=' . URL . 'dataKppn/viewDataKppnLvl1>KPPN</a></li>';
						echo '<li class="nav"><a href=' . URL . 'dataBa/addDataBa>BA 999</a></li>';
						echo '<li class="nav"><a href=' . URL . 'dataPkn/viewDataPknLvl2>PKN</a></li>';
						echo '<li class="nav" ><a href=' . URL . 'dataMasalah/addDataMasalah>Rekap Masalah</a></li>';
                    }
                    if (Session::get('role') == KPPN) {
                        echo'<li class="nav"><a href=' . URL . 'dataKppn/addDataKppnLvl3>Data Harian</a></li>';
                        echo '<li class="nav" ><a href=' . URL . 'dataMasalah/addDataMasalah>Input Masalah</a></li>';
                    }
                    if (Session::get('role') == BA999) {
                        echo '<li class="nav"><a href=' . URL . 'dataBa/addDataBa>BA 999</a></li>';
                        echo '<li class="nav" ><a href=' . URL . 'dataMasalah/addDataMasalah>Input Masalah</a></li>';
                    }
                    if (Session::get('role') == PKN) {
                        echo '<li class="nav"><a href=' . URL . 'dataPkn/addDataPkn>PKN</a></li>';
                        echo '<li class="nav" ><a href=' . URL . 'dataMasalah/addDataMasalah>Input Masalah</a></li>';
                    }
                    ?>
                    <li class="nav">
                        <a href="<?php echo URL; ?>auth/logout">Logout</a>
                    </li>
                    <li class="nav" style="float: right; font-size: 70%">
                        <a style="color: #F2C45A ">Selamat datang,<?php echo Session::get('user') ?></a>
					</li>
                </ul>
            </div>





