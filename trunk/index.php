<?php 

/*
 * error reporting on
 */

error_reporting(E_ALL ^ E_NOTICE);

/*
 * define the sitepath beasiswa/
 */

$sitepath = realpath(dirname(__FILE__));
define('ROOT',$sitepath);

//echo $sitepath;

/*
 * define the sitepath url
 */

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/dasbor/';
//echo $base_url;
define('URL',$base_url);

/*
 * define role
 */
define('KPPN',2);
define('KANWIL',3);
define('ADMIN',1);
define('PKN',5);
define('BA999',4);

$path = array(
    ROOT.'/libs/',
    ROOT.'/app/controllers/',
    ROOT.'/app/models/'
);

//include ROOT.'/config/config.php';
include ROOT.'/libs/Autoloader.php';
include ROOT.'/libs/config.php';
include ROOT.'/app/akses.php';

Autoloader::setCacheFilePath(ROOT.'/libs/cache.txt');
Autoloader::setClassPaths($path);
Autoloader::register();
$registry = new Registry();
$registry->upload = new Upload();
$registry->view = new View();
$registry->db = new Database();
$registry->auth = new Auth();
$registry->auth->add_roles('admin');
$registry->auth->add_access('dataTetap','admin',$akses['DataTetap']);
$registry->auth->add_access('dataUser','admin',$akses['DataUser']);
$registry->auth->add_access('dataBobot','admin',$akses['DataBobot']);
$registry->auth->add_access('dataKppn','admin',$akses['DataKppn']);
$registry->auth->add_access('auth','admin','logout');
$registry->auth->add_roles('kppn');
$registry->auth->add_access('dataKppn','kppn',$akses['DataKppn']);
$registry->auth->add_access('auth','kppn','logout');
$registry->auth->add_roles('ba');
$registry->auth->add_access('dataBa','ba',$akses['DataBa']);
$registry->auth->add_access('auth','ba','logout');
$registry->auth->add_roles('pkn');
$registry->auth->add_access('dataPkn','pkn',$akses['DataPkn']);
$registry->auth->add_access('auth','pkn','logout');
$registry->auth->add_access('auth','guest',$akses['Auth']);
$registry->exception = new ClassException();
$registry->bootstrap = new Bootstrap($registry);

$registry->bootstrap->loader();


?>