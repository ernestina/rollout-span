<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataPknController extends BaseController {
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
        $this->view->render('admin/dataPkn/addDataPkn');
    }

    /*
     * tambah data tetap
     */

    public function addDataPkn($id = null) {
        $d_pkn = new DataPkn($this->registry);
        if (isset($_POST['add_d_pkn'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_bat = $_POST['kd_d_bat'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_bank = $_POST['kd_d_bank'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_pkn->set_kd_d_user($kd_d_user);
            $d_pkn->set_kd_d_tgl($kd_d_tgl);
            $d_pkn->set_kd_d_bat($kd_d_bat);
            $d_pkn->set_kd_d_sp2d($kd_d_sp2d);
            $d_pkn->set_kd_d_bank($kd_d_bank);
            $d_pkn->set_kd_d_masalah($kd_d_masalah);

            if (!$d_pkn->add_d_pkn()) {
                $this->view->d_rekam = $d_pkn;
                $this->view->error = $d_pkn->get_error();
            }
        }
        //var_dump($d_tetap->get_d_tetap());
        if (!is_null($id)) {
            $d_pkn->set_kd_d_pkn($id);
            $this->view->d_ubah = $d_pkn->get_d_pkn_by_id($d_pkn);
        }
        
        $this->view->data = $d_pkn->get_d_pkn();
        $this->view->render('admin/dataPkn');
    }

    /*
     * ubah data tetap
     * @param kd_d_tetap
     */

    public function updDataPkn() {
        $d_pkn = new DataPkn($this->registry);
        if (isset($_POST['upd_d_pkn'])) {
            $kd_d_pkn = $_POST['kd_d_pkn'];
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_bat = $_POST['kd_d_bat'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_bank = $_POST['kd_d_bank'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_pkn->set_kd_d_pkn($kd_d_pkn);
            $d_pkn->set_kd_d_user($kd_d_user);
            $d_pkn->set_kd_d_tgl($kd_d_tgl);
            $d_pkn->set_kd_d_bat($kd_d_bat);
            $d_pkn->set_kd_d_sp2d($kd_d_sp2d);
            $d_pkn->set_kd_d_bank($kd_d_bank);
            $d_pkn->set_kd_d_masalah($kd_d_masalah);

            if (!$d_pkn->update_d_pkn()) {
                $this->view->d_ubah = $d_pkn;
                $this->view->error = $d_pkn->get_error();
                $this->view->data = $d_pkn->get_d_pkn();
                $this->view->render('admin/dataPkn');
            } else {
                header('location:' . URL . 'dataPkn/addDataPkn');
            }
        }
    }

    /*
     * hapus data tetap
     * @param kd_d_tetap
     */

    public function delDataPkn($id) {
        $d_pkn = new DataPkn($this->registry);
        if (is_null($id)) {
            throw new Exception;
            echo "id belum dimasukkan!";
            return;
        }
        $d_pkn->set_kd_d_pkn($id);
        $d_pkn->delete_d_pkn();
        header('location:' . URL . 'dataPkn/addDataPkn');
    }
	
	public function showDasbor(){
	$d_pkn = new DataPkn($this->registry);
        $this->view->data = $d_pkn->get_d_pkn();
        $this->view->render('dasbor/level1');
	}

    public function __destruct() {
        ;
    }

}

?>
