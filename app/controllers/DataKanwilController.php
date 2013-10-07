<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataKanwilController extends BaseController {
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
        $this->view->render('admin/dataKanwil/addDataKanwil');
    }

    /*
     * tambah data tetap
     */

    public function addDataKanwil($id = null) {
        $d_kanwil = new DataKanwil($this->registry);
        if (isset($_POST['add_d_kanwil'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_jaringan = $_POST['kd_d_jaringan'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_kanwil->set_kd_d_user($kd_d_user);
            $d_kanwil->set_kd_d_tgl($kd_d_tgl);
            $d_kanwil->set_kd_d_rekon($kd_d_rekon);
            $d_kanwil->set_kd_d_jaringan($kd_d_jaringan);
            $d_kanwil->set_kd_d_masalah($kd_d_masalah);

            if (!$d_kanwil->add_d_kanwil()) {
                $this->view->d_rekam = $d_kanwil;
                $this->view->error = $d_kanwil->get_error();
            }
        }
        //var_dump($d_tetap->get_d_tetap());
        if (!is_null($id)) {
            $d_kanwil->set_kd_d_kanwil($id);
            $this->view->d_ubah = $d_kanwil->get_d_kanwil_by_id($d_kanwil);
        }
        
        $this->view->data = $d_kanwil->get_d_kanwil();
        $this->view->render('admin/dataKanwil');
    }

    /*
     * ubah data tetap
     * @param kd_d_tetap
     */

    public function updDataKanwil() {
        $d_kanwil = new DataKanwil($this->registry);
        if (isset($_POST['upd_d_kanwil'])) {
            $kd_d_kanwil = $_POST['kd_d_kanwil'];
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_jaringan = $_POST['kd_d_jaringan'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_kanwil->set_kd_d_kanwil($kd_d_kanwil);
            $d_kanwil->set_kd_d_user($kd_d_user);
            $d_kanwil->set_kd_d_tgl($kd_d_tgl);
            $d_kanwil->set_kd_d_rekon($kd_d_rekon);
            $d_kanwil->set_kd_d_jaringan($kd_d_jaringan);
            $d_kanwil->set_kd_d_masalah($kd_d_masalah);

            if (!$d_kanwil->update_d_kanwil()) {
                $this->view->d_ubah = $d_kanwil;
                $this->view->error = $d_kanwil->get_error();
                $this->view->data = $d_kanwil->get_d_kanwil();
                $this->view->render('admin/dataKanwil');
            } else {
                header('location:' . URL . 'dataKanwil/addDataKanwil');
            }
        }
    }

    /*
     * hapus data tetap
     * @param kd_d_tetap
     */

    public function delDataKanwil($id) {
        $d_kanwil = new DataKanwil($this->registry);
        if (is_null($id)) {
            throw new Exception;
            echo "id belum dimasukkan!";
            return;
        }
        $d_kanwil->set_kd_d_kanwil($id);
        $d_kanwil->delete_d_kanwil();
        header('location:' . URL . 'dataKanwil/addDataKanwil');
    }
	
	public function showDasbor(){
	$d_kanwil = new DataKanwil($this->registry);
        $this->view->data = $d_kanwil->get_d_kanwil();
        $this->view->render('dasbor/level1');
	}

    public function __destruct() {
        ;
    }

}

?>
