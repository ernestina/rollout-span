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
     * tambah data PKN
     */

    public function addDataPkn($id = null) {
        $d_pkn = new DataPkn($this->registry);
        $d_bobot = new DataBobot($this->registry);
        $this->view->bobot = $d_bobot->get_bobot_pkn_lvl2();
        if (isset($_POST['add_d_pkn'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_sp2d_gagal = $_POST['kd_d_sp2d_gagal'];
            $kd_d_spt = $_POST['kd_d_spt'];
            $kd_d_spt_gagal = $_POST['kd_d_spt_gagal'];

            $d_pkn->set_kd_d_user($kd_d_user);
            $d_pkn->set_kd_d_tgl($kd_d_tgl);
            $d_pkn->set_kd_d_sp2d($kd_d_sp2d);
            $d_pkn->set_kd_d_sp2d_gagal($kd_d_sp2d_gagal);
            $d_pkn->set_kd_d_spt($kd_d_spt);
            $d_pkn->set_kd_d_spt_gagal($kd_d_spt_gagal);

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

        $this->view->dasbor = $d_pkn->get_d_pkn_per_tgl();
        $this->view->data = $d_pkn->get_d_pkn();
        $this->view->render('admin/dataPkn');
    }

    /*
     * ubah data PKN
     * 
     */

    public function updDataPkn() {
        $d_pkn = new DataPkn($this->registry);
        $d_bobot = new DataBobot($this->registry);
        $this->view->bobot = $d_bobot->get_bobot_pkn_lvl2();
        //if (isset($_POST['upd_d_pkn'])) {
            $kd_d_pkn = $_POST['kd_d_pkn'];
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_sp2d = $_POST['kd_d_sp2d'];
            $kd_d_sp2d_gagal = $_POST['kd_d_sp2d_gagal'];
            $kd_d_spt = $_POST['kd_d_spt'];
            $kd_d_spt_gagal = $_POST['kd_d_spt_gagal'];

            $d_pkn->set_kd_d_pkn($kd_d_pkn);
            $d_pkn->set_kd_d_user($kd_d_user);
            $d_pkn->set_kd_d_tgl($kd_d_tgl);
            $d_pkn->set_kd_d_sp2d($kd_d_sp2d);
            $d_pkn->set_kd_d_sp2d_gagal($kd_d_sp2d_gagal);
            $d_pkn->set_kd_d_spt($kd_d_spt);
            $d_pkn->set_kd_d_spt_gagal($kd_d_spt_gagal);

            if (!$d_pkn->update_d_pkn()) {
                $this->view->d_ubah = $d_pkn;
                $this->view->dasbor = $d_pkn->get_d_pkn_per_tgl();
                $this->view->error = $d_pkn->get_error();
                $this->view->data = $d_pkn->get_d_pkn();
                $this->view->render('admin/dataPkn');
            } else {
                $this->view->dasbor = $d_pkn->get_d_pkn_per_tgl();
                header('location:' . URL . 'dataPkn/addDataPkn');
            }
        //}
    }

    /*
     * hapus data PKN
     * @param kd_d_pkn
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

    /*
     * cek data dobel ketika input data
     */

    public function is_double_data(){
        $tgl = $_POST['tgl'];
        $kppn = new DataPkn($this->registry);
        $count = $kppn->is_double_data($tgl);
        echo $count;
    }

    /*
     * paging halaman
     */
    public function data_nav(){
        $hal = $_POST['halaman']; echo $hal."-";
        $max = $_POST['max_data'];
        $pkn = new DataPkn($this->registry);
        $d_pkn = $pkn->get_d_pkn();
        $count = count($d_pkn);
        $jml_hal = ceil($count/$max);
        $start = ($hal-1)*$max; echo $start."-";
        //$end = $start+$max; echo $end."<br>";
        $this->view->data = array_slice($d_pkn, $start,$max);
        $this->view->load('admin/tableDataPkn');
    }

    /*
     * paging halaman
     */
    public function get_data_pkn_array(){
        $pkn = new DataPkn($this->registry);
        $d_pkn = $pkn->get_d_pkn();
        $return = array();
        foreach ($d_pkn as $key => $val) {
            $tmp = array();
            $tmp['kd_d_pkn'] = $val->get_kd_d_pkn();
            $tmp['kd_d_user'] = $val->get_kd_d_user();
            $tmp['kd_d_tgl'] = $val->get_kd_d_tgl();
            $tmp['kd_d_sp2d'] = $val->get_kd_d_sp2d();
            $tmp['kd_d_sp2d_gagal'] = $val->get_kd_d_sp2d_gagal();
            $tmp['kd_d_spt'] = $val->get_kd_d_spt();
            $tmp['kd_d_spt_gagal'] = $val->get_kd_d_spt_gagal();
            $tmp['kd_d_sp2d_persen'] = $val->get_kd_d_sp2d_persen();
            $tmp['kd_d_spt_persen'] = $val->get_kd_d_spt_persen();
            $return[$val->get_kd_d_tgl()] = $tmp;
        }

        echo json_encode($return);
    }

    /*
     * DESTRUKTOR
     */

    public function __destruct() {
        ;
    }

}

?>
