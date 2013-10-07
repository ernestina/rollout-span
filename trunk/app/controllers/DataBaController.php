<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataBaController extends BaseController {
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
        $this->view->render('admin/dataBa/addDataBa');
    }

    /*
     * tambah data tetap
     */

    public function addDataBa($id = null) {
        $d_ba = new DataBa($this->registry);
        if (isset($_POST['add_d_ba'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_bayar = $_POST['kd_d_bayar'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_jaringan = $_POST['kd_d_jaringan'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_ba->set_kd_d_user($kd_d_user);
            $d_ba->set_kd_d_tgl($kd_d_tgl);
            $d_ba->set_kd_d_bayar($kd_d_bayar);
            $d_ba->set_kd_d_rekon($kd_d_rekon);
            $d_ba->set_kd_d_jaringan($kd_d_jaringan);
            $d_ba->set_kd_d_masalah($kd_d_masalah);

            if (!$d_ba->add_d_ba()) {
                $this->view->d_rekam = $d_ba;
                $this->view->error = $d_ba->get_error();
            }
        }
        //var_dump($d_tetap->get_d_tetap());
        if (!is_null($id)) {
            $d_ba->set_kd_d_ba($id);
            $this->view->d_ubah = $d_ba->get_d_ba_by_id($d_ba);
        }
        
        $this->view->data = $d_ba->get_d_ba();
        $this->view->render('admin/dataBa');
    }

    /*
     * ubah data tetap
     * @param kd_d_tetap
     */

    public function updDataBa() {
        $d_ba = new DataBa($this->registry);
        if (isset($_POST['upd_d_ba'])) {
            $kd_d_ba = $_POST['kd_d_ba'];
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_bayar = $_POST['kd_d_bayar'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_jaringan = $_POST['kd_d_jaringan'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_ba->set_kd_d_ba($kd_d_ba);
            $d_ba->set_kd_d_user($kd_d_user);
            $d_ba->set_kd_d_tgl($kd_d_tgl);
            $d_ba->set_kd_d_bayar($kd_d_bayar);
            $d_ba->set_kd_d_rekon($kd_d_rekon);
            $d_ba->set_kd_d_jaringan($kd_d_jaringan);
            $d_ba->set_kd_d_masalah($kd_d_masalah);

            if (!$d_ba->update_d_ba()) {
                $this->view->d_ubah = $d_ba;
                $this->view->error = $d_ba->get_error();
                $this->view->data = $d_ba->get_d_ba();
                $this->view->render('admin/dataBa');
            } else {
                header('location:' . URL . 'dataBa/addDataBa');
            }
        }
    }

    /*
     * hapus data tetap
     * @param kd_d_tetap
     */

    public function delDataBa($id) {
        $d_ba = new DataBa($this->registry);
        if (is_null($id)) {
            throw new Exception;
            echo "id belum dimasukkan!";
            return;
        }
        $d_ba->set_kd_d_ba($id);
        $d_ba->delete_d_ba();
        header('location:' . URL . 'dataBa/addDataBa');
    }
	
	public function showDasbor(){
	$d_ba = new DataBa($this->registry);
        $this->view->data = $d_ba->get_d_ba();
        $this->view->render('dasbor/level1');
	}

    public function __destruct() {
        ;
    }

}

?>
