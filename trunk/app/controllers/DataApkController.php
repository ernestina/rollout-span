<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataApkController extends BaseController {
    /*
     * Konstruktor
     */

    public function __construct($registry) {
        parent::__construct($registry);
    }

    /*
     * Index
     */

    public function index() {
        $this->view->render('admin/dataApk/addDataApk');
    }

    /*
     * tambah data tetap
     */

    public function addDataApk($id = null) {
        $d_apk = new DataApk($this->registry);
        if (isset($_POST['add_d_apk'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_akun = $_POST['kd_d_akun'];
            $kd_d_pel = $_POST['kd_d_pel'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_apk->set_kd_d_user($kd_d_user);
            $d_apk->set_kd_d_tgl($kd_d_tgl);
            $d_apk->set_kd_d_akun($kd_d_akun);
            $d_apk->set_kd_d_pel($kd_d_pel);
            $d_apk->set_kd_d_masalah($kd_d_masalah);

            if (!$d_apk->add_d_apk()) {
                $this->view->d_rekam = $d_apk;
                $this->view->error = $d_apk->get_error();
            }
        }
        //var_dump($d_tetap->get_d_tetap());
        if (!is_null($id)) {
            $d_apk->set_kd_d_apk($id);
            $this->view->d_ubah = $d_apk->get_d_apk_by_id($d_apk);
        }
        
        $this->view->data = $d_apk->get_d_apk();
        $this->view->render('admin/dataApk');
    }

    /*
     * ubah data tetap
     * @param kd_d_tetap
     */

    public function updDataAPk() {
        $d_apk = new DataApk($this->registry);
        if (isset($_POST['upd_d_apk'])) {
            $kd_d_apk = $_POST['kd_d_apk'];
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_akun = $_POST['kd_d_akun'];
            $kd_d_pel = $_POST['kd_d_pel'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_apk->set_kd_d_apk($kd_d_apk);
            $d_apk->set_kd_d_user($kd_d_user);
            $d_apk->set_kd_d_tgl($kd_d_tgl);
            $d_apk->set_kd_d_akun($kd_d_akun);
            $d_apk->set_kd_d_pel($kd_d_pel);
            $d_apk->set_kd_d_masalah($kd_d_masalah);

            if (!$d_apk->update_d_apk()) {
                $this->view->d_ubah = $d_apk;
                $this->view->error = $d_apk->get_error();
                $this->view->data = $d_apk->get_d_apk();
                $this->view->render('admin/dataApk');
            } else {
                header('location:' . URL . 'dataApk/addDataApk');
            }
        }
    }

    /*
     * hapus data tetap
     * @param kd_d_tetap
     */

    public function delDataApk($id) {
        $d_apk = new DataApk($this->registry);
        if (is_null($id)) {
            throw new Exception;
            echo "id belum dimasukkan!";
            return;
        }
        $d_apk->set_kd_d_apk($id);
        $d_apk->delete_d_apk();
        header('location:' . URL . 'dataApk/addDataApk');
    }
	
	public function showDasbor(){
	$d_apk = new DataApk($this->registry);
        $this->view->data = $d_apk->get_d_apk();
        $this->view->render('dasbor/level1');
	}

    public function __destruct() {
        ;
    }

}

?>
