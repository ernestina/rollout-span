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
<!--    <link href="<?php echo URL; ?>public/css/flick/jquery-ui-1.10.1.custom.css" rel="stylesheet">-->
    <!--link href="<?php echo URL; ?>public/css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/ui.theme.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/sims.css" rel="stylesheet"-->
        <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/dialog.css" rel="stylesheet">

        <script type="text/javascript">
            $(function(){
                $('#datepicker').datepicker(); 
                $('#datepicker1').datepicker();
                $('#datepicker2').datepicker();
            });
        </script>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div class="kolom1">
                    <img src="<?php echo URL; ?>public/img/logo.png" style="padding-left: 20px; padding-bottom: 10px">
                </div>
				
                <div id="jam" class="kolom2" >

                    <p id="jam" onload="jam()"></p>

                </div>
            </div>

            <div id="menu">
                <ul>
                    <li class="nav">
                        <a href="<?php echo URL; ?>index">BERANDA</a>
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
                            <li><a href="<?php echo URL; ?>dataKppn/addDataKppn"><i class="icon-globe icon-white"></i>data KPPN</a></li>
                        </ul>
                    </li>
                    <li class="subnav">
                        <a href="#">KANWIL</a>
                    </li>
                    <li class="subnav">
                        <a href="#">BA 999</a>
                    </li>
                    <li class="subnav">
                        <a href="#">PKN</a>
                    </li>
                    <li class="subnav">
                        <a href="#">APK</a>
                    </li>
                    <li class="nav">
                        <a class="blok" href="#"><img class="profil" src="<?php echo URL; ?>public/img/pic.jpg" /></a>
                    </li>
                </ul>
            </div>
            <script>
                jam();
            </script>





