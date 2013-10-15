<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$akses = array();
$akses['Auth'] = array(
    'login',
    'logout'
);

/*
 * akses modul Data Tetap
 */
$akses['dataTetap'] = array(
    '__construct',
    'index',
    'addDataTetap',
    'updDataTetap',
    'delDataTetap',
    '__destruct'
);

/*
 * akses modul Data User
 */
$akses['dataUser'] = array(
    '__construct',
    'index',
    'addDataUser',
    'updDataUser',
    'delDataUser',
    '__destruct'
);

/*
 * akses modul Data UserBobot
 */
$akses['dataBobot'] = array(
    '__construct',
    'index',
    'viewDataBobot',
    '__destruct'
);

/*
 * akses modul data KPPN
 */
$akses['dataKppn'] = array(
    '__construct',
    'index',
    'addDataKppnLvl3Jkt2',
    'addDataKppnLvl3Jkt6',
    'updDataKppnLvl3Jkt2',
    'updDataKppnLvl3Jkt6',
    'delDataKppnLvl3Jkt2',
    'delDataKppnLvl3Jkt6',
    'delDataKppn',
    'viewDataKppn',
    '__destruct'
);

/*
 * akses modul data BA.999
 */
$akses['dataBa'] = array(
    '__construct',
    'index',
    'addDataBa',
    'updDataBa',
    'delDataBa',
    '__destruct'
);

/*
 * akses modul data BA.999
 */
$akses['dataBa'] = array(
    '__construct',
    'index',
    'addDataPkn',
    'updDataPkn',
    'delDataPkn',
    '__destruct'
);
?>
