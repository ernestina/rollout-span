<!DOCTYPE html>
<html>
    <head>
        <title>DASHBOARD</title>   
        <script src="<?php echo URL; ?>public/js/jquery-2.0.3.min.js"></script>
        <link rel="stylesheet" href="<?php echo URL; ?>public/js/jquery-ui-1.10.3/themes/base/jquery.ui.all.css">
<!--        <script src="<?php echo URL; ?>public/js/jquery-ui-1.10.2/ui/jquery.ui.datepicker.js"></script>-->

        <script src="<?php echo URL; ?>public/js/jquery-ui.js"></script>
        <script src="<?php echo URL; ?>public/js/myjs.js"></script>
        <script src="<?php echo URL; ?>public/js/teamdf-jquery-number/jquery.number.js"></script>
		<script src="<?php echo URL; ?>public/js/gaugejs/raphael.2.1.0.min.js"></script>
		<script src="<?php echo URL; ?>public/js/gaugejs/justgage.1.0.1.min.js"></script>
<!--    <link href="<?php echo URL; ?>public/css/flick/jquery-ui-1.10.1.custom.css" rel="stylesheet">-->
    <!--link href="<?php echo URL; ?>public/css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/ui.theme.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/sims.css" rel="stylesheet"-->
        <link href="<?php echo URL; ?>public/css/ernest.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/dialog.css" rel="stylesheet">

        <script type="text/javascript">
            $(function(){
                $('#datepicker').datepicker(); 
                $('#datepicker1').datepicker();
                $('#datepicker2').datepicker();
            });
        </script>
    </head>
    <header>logo <br>SPAN</header>
	<body>
		
        <div id="wrapper">
			
            <div id="menu">
                
				<ul>
                    <li class="nav">
                        <a href="#"></a>
                    </li>
					<li class="nav">
                        <a href="#"></a>
                    </li>
					<li class="nav">
                        <a href="#"></a>
                    </li>
					<li class="nav">
                        <a href="<?php echo URL; ?>dataKppn/showDasbor">BERANDA</a>
                    </li>
                    <li class="subnav">
                        <a href="<?php echo URL; ?>dataTetap/addDataTetap">ADMIN</a>
                        <ul>
                            <li><a href="<?php echo URL; ?>dataTetap/addDataTetap"><i class="icon-globe icon-white"></i>Data Tetap</a></li>
                            <li><a href="<?php echo URL; ?>dataUser/addDataUser"><i class="icon-globe icon-white"></i>Data User</a></li>
                        </ul>
                    </li>
                    <li class="subnav">
                        <a href="<?php echo URL; ?>dataKppn/addDataKppn">KPPN</a>
                        <ul>
                            <li><a href="<?php echo URL; ?>dataKppn/addDataKppnList"><i class="icon-globe icon-white"></i>data KPPN</a></li>
                        </ul>
                    </li>
                    <li class="subnav">
                        <a href="<?php echo URL; ?>dataKanwil/addDataKanwil">KANWIL</a>
                        <ul>
                            <li><a href="<?php echo URL; ?>dataKanwil/addDataKanwil"><i class="icon-globe icon-white"></i>data Kanwil</a></li>
                        </ul>
                    </li>
                    <li class="subnav">
                        <a href="<?php echo URL; ?>dataBa/addDataBa">BA 999</a>
                        <ul>
                            <li><a href="<?php echo URL; ?>dataBa/addDataBa"><i class="icon-globe icon-white"></i>data BA.999</a></li>
                        </ul>
                    </li>
                    <li class="subnav">
                        <a href="<?php echo URL; ?>dataPkn/addDataPkn">PKN</a>
                        <ul>
                            <li><a href="<?php echo URL; ?>dataPkn/addDataPkn"><i class="icon-globe icon-white"></i>data PKN</a></li>
                        </ul>
                    </li>
                    <li class="subnav">
                        <a href="<?php echo URL; ?>dataApk/addDataApk">APK</a>
                        <ul>
                            <li><a href="<?php echo URL; ?>dataApk/addDataApk"><i class="icon-globe icon-white"></i>data APK</a></li>
                        </ul>
                    </li>

                    <li class="subnav">
                        <a href="<?php echo URL; ?>dataSmi/addDataSmi">SMI</a>
                        <ul>
                            <li><a href="<?php echo URL; ?>dataSmi/addDataSmi"><i class="icon-globe icon-white"></i>data SMI</a></li>
                        </ul>
                    </li>
                    <li class="subnav">
                        <a href="<?php echo URL; ?>dataDjpu/addDataDjpu">DJPU</a>
                        <ul>
                            <li><a href="<?php echo URL; ?>dataDjpu/addDataDjpu"><i class="icon-globe icon-white"></i>data DJPU</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <script>
                jam();
            </script>





