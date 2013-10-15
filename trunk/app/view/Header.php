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
        <script src="<?php echo URL; ?>public/js/Chart.js"></script>
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
    <header><img src="<?php echo URL; ?>public/img/span-putih.png" width="40px" height="48px"></header>
    <body>
    <center>
        <div style="float: top">Willkomnen 
            <?php
            echo Session::get('user') . '</br>anda login sebagai ';
            if (Session::get('role') == 1) {
                echo 'admin';
            } elseif (Session::get('role') == 2) {
                echo 'kppn';
            } elseif (Session::get('role') == 4) {
                echo 'BA.999';
            } elseif (Session::get('role') == 5) {
                echo 'PKN';
            } else {
                echo "anda ilegal";
            }
            ?></div></center>
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
                <?php
                if (Session::get('role') == 1) {
                    echo '<li class="nav">
                    <a href=' . URL . 'index>BERANDA</a>
                </li>';

                    echo '<li class="subnav">
                    <a href=' . URL . 'dataTetap/addDataTetap>ADMIN</a>
                    <ul>
                        <li><a href=' . URL . 'dataBobot/viewDataBobot><i class="icon-globe icon-white"></i>Data Bobot</a></li>
                        <li><a href=' . URL . 'dataTetap/addDataTetap><i class="icon-globe icon-white"></i>Data Tetap</a></li>
                        <li><a href=' . URL . 'dataUser/addDataUser><i class="icon-globe icon-white"></i>Data User</a></li>
                    </ul>
                </li>';
                }
                ?>
                <?php
                if (Session::get('role') == 1 OR Session::get('role') == 2) {
                    if (Session::get('role') == 1) {
                        echo'<li class="subnav">
                            <a href=' . URL . 'dataKppn/viewDataKppnLvl2>KPPN</a>
                            <ul>
                            <li><a href=' . URL . 'dataKppn/addDataKppnLvl3Jkt2><i class="icon-globe icon-white"></i>data KPPN Jakart II</a></li>
                            <li><a href=' . URL . 'dataKppn/addDataKppnLvl3Jkt6><i class="icon-globe icon-white"></i>data KPPN Jakart VI</a></li>
                            </ul>
                            </li>';
                    }
                    if (Session::get('user') == "KPPN JAKARTA II") {
                        echo '<li class="subnav">
                             <a href=' . URL . 'dataKppn/addDataKppnLvl3Jkt2><i class="icon-globe icon-white"></i>data KPPN Jakart II</a>
                             </li>';
                    }
                    if (Session::get('user') == "KPPN JAKARTA VI") {
                        echo '<li>
                            <a href=' . URL . 'dataKppn/addDataKppnLvl3Jkt6><i class="icon-globe icon-white"></i>data KPPN Jakart VI</a>
                            </li>';
                    }
                }
                ?>
                <?php
                if (Session::get('role') == 1 OR Session::get('role') == 4) {
                    echo '<li class="subnav">
                    <a href=' . URL . 'dataBa/addDataBa>BA 999</a>
                </li>';
                }
                ?>
                <?php
                if (Session::get('role') == 1 OR Session::get('role') == 5) {
                    echo '<li class="subnav">
                    <a href=' . URL . 'dataPkn/addDataPkn>PKN</a>
                </li>';
                }
                ?>
                <li class="subnav">
                    <a href="<?php echo URL; ?>auth/logout">Logout</a>
                </li>
            </ul>
        </div>
        <script>
            jam();
        </script>




