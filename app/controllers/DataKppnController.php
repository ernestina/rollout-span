<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataKppnController extends BaseController {
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
        $this->view->render('admin/dataKppn');
    }

    /*
     * tambah data tetap
     */

    public function addDataKppn($id = null) {
        $d_kppn = new DataKppn($this->registry);
        if (isset($_POST['add_d_kppn'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_konversi = $_POST['kd_d_konversi'];
            $kd_d_nrs = $_POST['kd_d_nrs'];
            $kd_d_nrk = $_POST['kd_d_nrk'];
            $kd_d_spm = $_POST['kd_d_spm'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_lhp= $_POST['kd_d_lhp'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_persepsi = $_POST['kd_d_persepsi'];
            $kd_d_terimaan = $_POST['kd_d_terimaan'];
            $kd_d_koreksi = $_POST['kd_d_koreksi'];
            $kd_d_infrastuktur = $_POST['kd_d_infrastruktur'];
            $kd_d_jaringan = $_POST['kd_d_jaringan'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_kppn->set_kd_d_user($kd_d_user);
            $d_kppn->set_kd_d_tgl($kd_d_tgl);
            $d_kppn->set_kd_d_konversi($kd_d_konversi);
            $d_kppn->set_kd_d_nrs($kd_d_nrs);
            $d_kppn->set_kd_d_nrk($kd_d_nrk);
            $d_kppn->set_kd_d_spm($kd_d_spm);
            $d_kppn->set_kd_d_sp2d($kd_d_sp2d);
            $d_kppn->set_kd_d_lhp($kd_d_lhp);
            $d_kppn->set_kd_d_rekon($kd_d_rekon);
            $d_kppn->set_kd_d_persepsi($kd_d_persepsi);
            $d_kppn->set_kd_d_terimaan($kd_d_terimaan);
            $d_kppn->set_kd_d_koreksi($kd_d_koreksi);
            $d_kppn->set_kd_d_infrastruktur($kd_d_infrastuktur);
            $d_kppn->set_kd_d_jaringan($kd_d_jaringan);
            $d_kppn->set_kd_d_masalah($kd_d_masalah);

            if (!$d_kppn->add_d_kppn()) {
                $this->view->d_rekam = $d_kppn;
                $this->view->error = $d_kppn->get_error();
            }
        }
        //var_dump($d_tetap->get_d_tetap());
        if (!is_null($id)) {
            $d_kppn->set_kd_d_kppn($id);
            $this->view->d_ubah = $d_kppn->get_d_kppn_by_id($d_kppn);
        }
        
        $this->view->data = $d_kppn->get_d_kppn();
        $this->view->render('admin/dataKppn');
    }

    /*
     * ubah data tetap
     * @param kd_d_tetap
     */

    public function updDataKppn() {
        $d_kppn = new DataKppn($this->registry);
        if (isset($_POST['upd_d_kppn'])) {
            $kd_d_kppn = $_POST['kd_d_kppn'];
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_konversi = $_POST['kd_d_konversi'];
            $kd_d_nrs = $_POST['kd_d_nrs'];
            $kd_d_nrk = $_POST['kd_d_nrk'];
            $kd_d_spm = $_POST['kd_d_spm'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_lhp= $_POST['kd_d_lhp'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_persepsi = $_POST['kd_d_persepsi'];
            $kd_d_terimaan = $_POST['kd_d_terimaan'];
            $kd_d_koreksi = $_POST['kd_d_koreksi'];
            $kd_d_infrastuktur = $_POST['kd_d_infrastruktur'];
            $kd_d_jaringan = $_POST['kd_d_jaringan'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_kppn->set_kd_d_kppn($kd_d_kppn);
            $d_kppn->set_kd_d_user($kd_d_user);
            $d_kppn->set_kd_d_tgl($kd_d_tgl);
            $d_kppn->set_kd_d_konversi($kd_d_konversi);
            $d_kppn->set_kd_d_nrs($kd_d_nrs);
            $d_kppn->set_kd_d_nrk($kd_d_nrk);
            $d_kppn->set_kd_d_spm($kd_d_spm);
            $d_kppn->set_kd_d_sp2d($kd_d_sp2d);
            $d_kppn->set_kd_d_lhp($kd_d_lhp);
            $d_kppn->set_kd_d_rekon($kd_d_rekon);
            $d_kppn->set_kd_d_persepsi($kd_d_persepsi);
            $d_kppn->set_kd_d_terimaan($kd_d_terimaan);
            $d_kppn->set_kd_d_koreksi($kd_d_koreksi);
            $d_kppn->set_kd_d_infrastruktur($kd_d_infrastuktur);
            $d_kppn->set_kd_d_jaringan($kd_d_jaringan);
            $d_kppn->set_kd_d_masalah($kd_d_masalah);

            if (!$d_kppn->update_d_kppn()) {
                $this->view->d_ubah = $d_kppn;
                $this->view->error = $d_kppn->get_error();
                $this->view->data = $d_kppn->get_d_kppn();
                $this->view->render('admin/dataKppn');
            } else {
                header('location:' . URL . 'dataKppn/addDataKppn');
            }
        }
    }

    /*
     * hapus data tetap
     * @param kd_d_tetap
     */

    public function delDataKppn($id) {
        $d_kppn = new DataKppn($this->registry);
        if (is_null($id)) {
            throw new Exception;
            echo "id belum dimasukkan!";
            return;
        }
        $d_kppn->set_kd_d_kppn($id);
        $d_kppn->delete_d_kppn();
        header('location:' . URL . 'dataKppn/addDataKppn');
    }
	
	public function showDasbor(){
	$d_kppn = new DataKppn($this->registry);
        $this->view->data = $d_kppn->get_d_kppn();
        $this->view->render('dasbor/level1');
	}

    public function __destruct() {
        ;
    }

}

?>
