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
        $this->view->render('admin/dataKppnList');
    }
	
	/*
     * view Data KPPN PER KANWIL
     */

    public function viewDataKppnLvl1() {
        $d_kppn = new DataKppn($this->registry);
        $d_bobot = new DataBobot($this->registry);
        $this->view->bobot = $d_bobot->get_bobot_kppn_lvl3();
        $this->view->dasbor = $d_kppn->get_d_kppn_per_tgl();
        $this->view->data = $d_kppn->get_d_kppn_lvl1();
        $this->view->render('admin/dataKppnLvl1');
    }

    /*
     * view Data KPPN 
     */

    public function viewDataKppnLvl2($kanwil=null) {
        $d_kppn = new DataKppn($this->registry);
        $d_bobot = new DataBobot($this->registry);
        $this->view->bobot = $d_bobot->get_bobot_kppn_lvl3();
        $this->view->dasbor = $d_kppn->get_d_kppn_per_tgl();
        $this->view->data = $d_kppn->get_d_kppn_lvl2($kanwil);
        $this->view->render('admin/dataKppnLvl2');
    }

    /*
     * tambah Data KPPN Level 3
     */

    public function addDataKppnLvl3($id=null){
        $d_kppn = new DataKppn($this->registry);
        if (isset($_POST['add_d_kppn'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_konversi = $_POST['kd_d_konversi'];
            $kd_d_konversi_gagal = $_POST['kd_d_konversi_gagal'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_sp2d_gagal = $_POST['kd_d_sp2d_gagal'];
            $kd_d_lhp = $_POST['kd_d_lhp'];
            $kd_d_lhp_gagal = $_POST['kd_d_lhp_gagal'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_rekon_gagal = $_POST['kd_d_rekon_gagal'];

            $d_kppn->set_kd_d_user($kd_d_user);
            $d_kppn->set_kd_d_tgl($kd_d_tgl);
            $d_kppn->set_kd_d_konversi($kd_d_konversi);
            $d_kppn->set_kd_d_konversi_gagal($kd_d_konversi_gagal);
            $d_kppn->set_kd_d_sp2d($kd_d_sp2d);
            $d_kppn->set_kd_d_sp2d_gagal($kd_d_sp2d_gagal);
            $d_kppn->set_kd_d_lhp($kd_d_lhp);
            $d_kppn->set_kd_d_lhp_gagal($kd_d_lhp_gagal);
            $d_kppn->set_kd_d_rekon($kd_d_rekon);
            $d_kppn->set_kd_d_rekon_gagal($kd_d_rekon_gagal);

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
        $this->view->sp2d = $d_kppn->get_d_kppn_per_tgl(Session::get('id_user'));
        $this->view->data = $d_kppn->get_d_kppn(Session::get('id_user'));
        $this->view->render('admin/dataKppnLvl3');
    }
    
    /*
     * tambah Data KPPN Jakarta 2
     */

    public function addDataKppnLvl3Jkt2($id = null) {
        $d_kppn = new DataKppn($this->registry);
        if (isset($_POST['add_d_kppn'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_konversi = $_POST['kd_d_konversi'];
            $kd_d_konversi_gagal = $_POST['kd_d_konversi_gagal'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_sp2d_gagal = $_POST['kd_d_sp2d_gagal'];
            $kd_d_lhp = $_POST['kd_d_lhp'];
            $kd_d_lhp_gagal = $_POST['kd_d_lhp_gagal'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_rekon_gagal = $_POST['kd_d_rekon_gagal'];

            $d_kppn->set_kd_d_user($kd_d_user);
            $d_kppn->set_kd_d_tgl($kd_d_tgl);
            $d_kppn->set_kd_d_konversi($kd_d_konversi);
            $d_kppn->set_kd_d_konversi_gagal($kd_d_konversi_gagal);
            $d_kppn->set_kd_d_sp2d($kd_d_sp2d);
            $d_kppn->set_kd_d_sp2d_gagal($kd_d_sp2d_gagal);
            $d_kppn->set_kd_d_lhp($kd_d_lhp);
            $d_kppn->set_kd_d_lhp_gagal($kd_d_lhp_gagal);
            $d_kppn->set_kd_d_rekon($kd_d_rekon);
            $d_kppn->set_kd_d_rekon_gagal($kd_d_rekon_gagal);

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
        $this->view->sp2d = $d_kppn->get_d_kppn_per_tgl(Session::get('id_user'));
        $this->view->data = $d_kppn->get_d_kppn(Session::get('id_user'));
        $this->view->render('admin/dataKppnLvl3Jkt2');
    }
    
    /*
     * tambah Data KPPN Jakarta 6
     */

    public function addDataKppnLvl3Jkt6($id = null) {
        $d_kppn = new DataKppn($this->registry);
        if (isset($_POST['add_d_kppn'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_konversi = $_POST['kd_d_konversi'];
            $kd_d_konversi_gagal = $_POST['kd_d_konversi_gagal'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_sp2d_gagal = $_POST['kd_d_sp2d_gagal'];
            $kd_d_lhp = $_POST['kd_d_lhp'];
            $kd_d_lhp_gagal = $_POST['kd_d_lhp_gagal'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_rekon_gagal = $_POST['kd_d_rekon_gagal'];

            $d_kppn->set_kd_d_user($kd_d_user);
            $d_kppn->set_kd_d_tgl($kd_d_tgl);
            $d_kppn->set_kd_d_konversi($kd_d_konversi);
            $d_kppn->set_kd_d_konversi_gagal($kd_d_konversi_gagal);
            $d_kppn->set_kd_d_sp2d($kd_d_sp2d);
            $d_kppn->set_kd_d_sp2d_gagal($kd_d_sp2d_gagal);
            $d_kppn->set_kd_d_lhp($kd_d_lhp);
            $d_kppn->set_kd_d_lhp_gagal($kd_d_lhp_gagal);
            $d_kppn->set_kd_d_rekon($kd_d_rekon);
            $d_kppn->set_kd_d_rekon_gagal($kd_d_rekon_gagal);

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
        $this->view->sp2d = $d_kppn->get_d_kppn_per_tgl_jkt6();
        $this->view->data = $d_kppn->get_d_kppn_jkt6();
        $this->view->render('admin/dataKppnLvl3Jkt6');
    }
	
	/*
	 * ubah data KPPN
	 */
	 
	 public function updDataKppnLvl3() {
        $d_kppn = new DataKppn($this->registry);
        if (isset($_POST['upd_d_kppn'])) {
            $kd_d_kppn = $_POST['kd_d_kppn'];
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_konversi = $_POST['kd_d_konversi'];
            $kd_d_konversi_gagal = $_POST['kd_d_konversi_gagal'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_sp2d_gagal = $_POST['kd_d_sp2d_gagal'];
            $kd_d_lhp = $_POST['kd_d_lhp'];
            $kd_d_lhp_gagal = $_POST['kd_d_lhp_gagal'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_rekon_gagal = $_POST['kd_d_rekon_gagal'];

            $d_kppn->set_kd_d_kppn($kd_d_kppn);
            $d_kppn->set_kd_d_user($kd_d_user);
            $d_kppn->set_kd_d_tgl($kd_d_tgl);
            $d_kppn->set_kd_d_konversi($kd_d_konversi);
            $d_kppn->set_kd_d_konversi_gagal($kd_d_konversi_gagal);
            $d_kppn->set_kd_d_sp2d($kd_d_sp2d);
            $d_kppn->set_kd_d_sp2d_gagal($kd_d_sp2d_gagal);
            $d_kppn->set_kd_d_lhp($kd_d_lhp);
            $d_kppn->set_kd_d_lhp_gagal($kd_d_lhp_gagal);
            $d_kppn->set_kd_d_rekon($kd_d_rekon);
            $d_kppn->set_kd_d_rekon_gagal($kd_d_rekon_gagal);

            if (!$d_kppn->update_d_kppn()) {
                $this->view->d_ubah = $d_kppn;
                $this->view->error = $d_kppn->get_error();
                $this->view->data = $d_kppn->get_d_kppn();
                $this->view->render('admin/dataKppnLvl3');
            } else {
                header('location:' . URL . 'dataKppn/addDataKppnLvl3');
            }
        }
    }

    /*
     * ubah data KPPN Jakarta 2
     * 
     */

    public function updDataKppnLvl3Jkt2() {
        $d_kppn = new DataKppn($this->registry);
        if (isset($_POST['upd_d_kppn'])) {
            $kd_d_kppn = $_POST['kd_d_kppn'];
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_konversi = $_POST['kd_d_konversi'];
            $kd_d_konversi_gagal = $_POST['kd_d_konversi_gagal'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_sp2d_gagal = $_POST['kd_d_sp2d_gagal'];
            $kd_d_lhp = $_POST['kd_d_lhp'];
            $kd_d_lhp_gagal = $_POST['kd_d_lhp_gagal'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_rekon_gagal = $_POST['kd_d_rekon_gagal'];

            $d_kppn->set_kd_d_kppn($kd_d_kppn);
            $d_kppn->set_kd_d_user($kd_d_user);
            $d_kppn->set_kd_d_tgl($kd_d_tgl);
            $d_kppn->set_kd_d_konversi($kd_d_konversi);
            $d_kppn->set_kd_d_konversi_gagal($kd_d_konversi_gagal);
            $d_kppn->set_kd_d_sp2d($kd_d_sp2d);
            $d_kppn->set_kd_d_sp2d_gagal($kd_d_sp2d_gagal);
            $d_kppn->set_kd_d_lhp($kd_d_lhp);
            $d_kppn->set_kd_d_lhp_gagal($kd_d_lhp_gagal);
            $d_kppn->set_kd_d_rekon($kd_d_rekon);
            $d_kppn->set_kd_d_rekon_gagal($kd_d_rekon_gagal);

            if (!$d_kppn->update_d_kppn()) {
                $this->view->d_ubah = $d_kppn;
                $this->view->error = $d_kppn->get_error();
                $this->view->data = $d_kppn->get_d_kppn();
                $this->view->render('admin/dataKppnLvl3Jkt2');
            } else {
                header('location:' . URL . 'dataKppn/addDataKppnLvl3Jkt2');
            }
        }
    }
    
    /*
     * ubah data Jakarta 6
     */

    public function updDataKppnLvl3Jkt6() {
        $d_kppn = new DataKppn($this->registry);
        if (isset($_POST['upd_d_kppn'])) {
            $kd_d_kppn = $_POST['kd_d_kppn'];
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_konversi = $_POST['kd_d_konversi'];
            $kd_d_konversi_gagal = $_POST['kd_d_konversi_gagal'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_sp2d_gagal = $_POST['kd_d_sp2d_gagal'];
            $kd_d_lhp = $_POST['kd_d_lhp'];
            $kd_d_lhp_gagal = $_POST['kd_d_lhp_gagal'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_rekon_gagal = $_POST['kd_d_rekon_gagal'];

            $d_kppn->set_kd_d_kppn($kd_d_kppn);
            $d_kppn->set_kd_d_user($kd_d_user);
            $d_kppn->set_kd_d_tgl($kd_d_tgl);
            $d_kppn->set_kd_d_konversi($kd_d_konversi);
            $d_kppn->set_kd_d_konversi_gagal($kd_d_konversi_gagal);
            $d_kppn->set_kd_d_sp2d($kd_d_sp2d);
            $d_kppn->set_kd_d_sp2d_gagal($kd_d_sp2d_gagal);
            $d_kppn->set_kd_d_lhp($kd_d_lhp);
            $d_kppn->set_kd_d_lhp_gagal($kd_d_lhp_gagal);
            $d_kppn->set_kd_d_rekon($kd_d_rekon);
            $d_kppn->set_kd_d_rekon_gagal($kd_d_rekon_gagal);

            if (!$d_kppn->update_d_kppn()) {
                $this->view->d_ubah = $d_kppn;
                $this->view->error = $d_kppn->get_error();
                $this->view->data = $d_kppn->get_d_kppn();
                $this->view->render('admin/dataKppnLvl3Jkt6');
            } else {
                header('location:' . URL . 'dataKppn/addDataKppnLvl3Jkt6');
            }
        }
    }

    /*
     * hapus data KPPN
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
    
    /*
     * hapus data KPPN 
     * @param kd_d_tetap
     */

    public function delDataKppnLvl3($id) {
        $d_kppn = new DataKppn($this->registry);
        if (is_null($id)) {
            throw new Exception;
            echo "id belum dimasukkan!";
            return;
        }
        $d_kppn->set_kd_d_kppn($id);
        $d_kppn->delete_d_kppn();
        header('location:' . URL . 'dataKppn/addDataKppnLvl3');
    }
	
	/*
     * hapus data KPPN Jakarta 2
     * @param kd_d_tetap
     */

    public function delDataKppnLvl3Jkt2($id) {
        $d_kppn = new DataKppn($this->registry);
        if (is_null($id)) {
            throw new Exception;
            echo "id belum dimasukkan!";
            return;
        }
        $d_kppn->set_kd_d_kppn($id);
        $d_kppn->delete_d_kppn();
        header('location:' . URL . 'dataKppn/addDataKppnLvl3Jkt2');
    }

    /*
     * hapus data KPPN Jakarta 6
     * @param kd_d_tetap
     */
    
    public function delDataKppnLvl3Jkt6($id) {
        $d_kppn = new DataKppn($this->registry);
        if (is_null($id)) {
            throw new Exception;
            echo "id belum dimasukkan!";
            return;
        }
        $d_kppn->set_kd_d_kppn($id);
        $d_kppn->delete_d_kppn();
        header('location:' . URL . 'dataKppn/addDataKppnLvl3Jkt6');
    }

    public function __destruct() {
        ;
    }

}

?>
