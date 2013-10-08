<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataSmiController extends BaseController {
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
        $this->view->render('admin/dataSmi/addDataSmi');
    }

    /*
     * tambah data tetap
     */

    public function addDataSmi($id = null) {
        $d_smi = new DataSmi($this->registry);
        if (isset($_POST['add_d_smi'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_akun = $_POST['kd_d_akun'];
            $kd_d_pel = $_POST['kd_d_pel'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_smi->set_kd_d_user($kd_d_user);
            $d_smi->set_kd_d_tgl($kd_d_tgl);
            $d_smi->set_kd_d_akun($kd_d_akun);
            $d_smi->set_kd_d_pel($kd_d_pel);
            $d_smi->set_kd_d_masalah($kd_d_masalah);

            if (!$d_smi->add_d_smi()) {
                $this->view->d_rekam = $d_smi;
                $this->view->error = $d_smi->get_error();
            }
        }
        //var_dump($d_tetap->get_d_tetap());
        if (!is_null($id)) {
            $d_smi->set_kd_d_smi($id);
            $this->view->d_ubah = $d_smi->get_d_smi_by_id($d_smi);
        }
        
        $this->view->data = $d_smi->get_d_smi();
        $this->view->render('admin/dataSmi');
    }

    /*
     * ubah data tetap
     * @param kd_d_tetap
     */

    public function updDataSmi() {
        $d_smi = new DataSmi($this->registry);
        if (isset($_POST['upd_d_smi'])) {
            $kd_d_smi = $_POST['kd_d_smi'];
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_akun = $_POST['kd_d_akun'];
            $kd_d_pel = $_POST['kd_d_pel'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_smi->set_kd_d_smi($kd_d_smi);
            $d_smi->set_kd_d_user($kd_d_user);
            $d_smi->set_kd_d_tgl($kd_d_tgl);
            $d_smi->set_kd_d_akun($kd_d_akun);
            $d_smi->set_kd_d_pel($kd_d_pel);
            $d_smi->set_kd_d_masalah($kd_d_masalah);

            if (!$d_smi->update_d_smi()) {
                $this->view->d_ubah = $d_smi;
                $this->view->error = $d_smi->get_error();
                $this->view->data = $d_smi->get_d_smi();
                $this->view->render('admin/dataSmi');
            } else {
                header('location:' . URL . 'dataSmi/addDataSmi');
            }
        }
    }

    /*
     * hapus data tetap
     * @param kd_d_tetap
     */

    public function delDataSmi($id) {
        $d_smi = new DataSmi($this->registry);
        if (is_null($id)) {
            throw new Exception;
            echo "id belum dimasukkan!";
            return;
        }
        $d_smi->set_kd_d_smi($id);
        $d_smi->delete_d_smi();
        header('location:' . URL . 'dataSmi/addDataSmi');
    }
	
	public function showDasbor(){
	$d_smi = new DataSmi($this->registry);
        $this->view->data = $d_smi->get_d_smi();
        $this->view->render('dasbor/level1');
	}

    public function __destruct() {
        ;
    }

}

?>
