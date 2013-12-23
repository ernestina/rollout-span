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
     * tambah data BA.999
     */

    public function addDataBa($id = null) {
        $d_ba = new DataBa($this->registry);
        $d_bobot = new DataBobot($this->registry);
        $this->view->bobot = $d_bobot->get_bobot_ba_lvl2();
        if (isset($_POST['add_d_ba'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_user_ba = $_POST['kd_d_user_ba'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_spm = $_POST['kd_d_spm'];
            $kd_d_spm_gagal = $_POST['kd_d_spm_gagal'];
            $kd_d_rekon = $_POST['kd_d_rekon'];
            $kd_d_rekon_gagal = $_POST['kd_d_rekon_gagal'];
            $kd_d_kontrak = $_POST['kd_d_kontrak'];
            $kd_d_kontrak_gagal = $_POST['kd_d_kontrak_gagal'];

            $d_ba->set_kd_d_user($kd_d_user);
            $d_ba->set_kd_d_user_ba($kd_d_user_ba);
            $d_ba->set_kd_d_tgl($kd_d_tgl);
            $d_ba->set_kd_d_spm($kd_d_spm);
            $d_ba->set_kd_d_spm_gagal($kd_d_spm_gagal);
            $d_ba->set_kd_d_rekon($kd_d_rekon);
            $d_ba->set_kd_d_rekon_gagal($kd_d_rekon_gagal);
            $d_ba->set_kd_d_kontrak($kd_d_kontrak);
            $d_ba->set_kd_d_kontrak_gagal($kd_d_kontrak_gagal);

            if (!$d_ba->add_d_ba()) {
                $this->view->d_rekam = $d_ba;
                $this->view->error = $d_ba->get_error();
            }
        }
        if (!is_null($id)) {
            $d_ba->set_kd_d_ba($id);
            $this->view->d_ubah = $d_ba->get_d_ba_by_id($d_ba);
        }

        $this->view->dasbor = $d_ba->get_d_ba_per_tgl();
        $this->view->data = $d_ba->get_d_ba();
        $this->view->render('admin/dataBa');
    }

    /*
     * update data BA.999
     * 
     */

    public function updDataBa() {
        $d_ba = new DataBa($this->registry);
        $d_bobot = new DataBobot($this->registry);
        $this->view->bobot = $d_bobot->get_bobot_ba_lvl2();
        //if (isset($_POST['upd_d_ba'])) {
        $kd_d_ba = $_POST['kd_d_ba'];
        $kd_d_user = $_POST['kd_d_user'];
        $kd_d_user_ba = $_POST['kd_d_user_ba'];
        $kd_d_tgl = $_POST['kd_d_tgl'];
        $kd_d_spm = $_POST['kd_d_spm'];
        $kd_d_spm_gagal = $_POST['kd_d_spm_gagal'];
        $kd_d_rekon = $_POST['kd_d_rekon'];
        $kd_d_rekon_gagal = $_POST['kd_d_rekon_gagal'];
        $kd_d_kontrak = $_POST['kd_d_kontrak'];
        $kd_d_kontrak_gagal = $_POST['kd_d_kontrak_gagal'];

        $d_ba->set_kd_d_ba($kd_d_ba);
        $d_ba->set_kd_d_user($kd_d_user);
        $d_ba->set_kd_d_user_ba($kd_d_user_ba);
        $d_ba->set_kd_d_tgl($kd_d_tgl);
        $d_ba->set_kd_d_spm($kd_d_spm);
        $d_ba->set_kd_d_spm_gagal($kd_d_spm_gagal);
        $d_ba->set_kd_d_rekon($kd_d_rekon);
        $d_ba->set_kd_d_rekon_gagal($kd_d_rekon_gagal);
        $d_ba->set_kd_d_kontrak($kd_d_kontrak);
        $d_ba->set_kd_d_kontrak_gagal($kd_d_kontrak_gagal);

        if (!$d_ba->update_d_ba()) {
            $this->view->dasbor = $d_ba->get_d_ba_per_tgl();
            $this->view->d_ubah = $d_ba;
            $this->view->error = $d_ba->get_error();
            $this->view->data = $d_ba->get_d_ba();
            $this->view->render('admin/dataBa');
        } else {
            $this->view->dasbor = $d_ba->get_d_ba_per_tgl();
            header('location:' . URL . 'dataBa/addDataBa');
        }
        //}
    }

    /*
     * hapus data BA.999
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

    /*
     * cek data dobel ketika input data
     */

    public function is_double_data() {
        $kd_user = $_POST['jenis'];
        $tgl = $_POST['tgl'];
        $kppn = new DataBa($this->registry);
        $count = $kppn->is_double_data($kd_user, $tgl);
        echo $count;
    }

    /*
     * paging halaman
     */

    public function data_nav() {
        $hal = $_POST['halaman'];
        $max = $_POST['max_data'];
        $ba = new DataBa($this->registry);
        $d_ba = $ba->get_d_ba();
        $count = count($d_ba);
        $jml_hal = ceil($count / $max);
        $start = ($hal - 1) * $max;
        //$end = (($hal-1)*$max)+$max;
        $this->view->mulai = $start + 1;
        $this->view->data = array_slice($d_ba, $start, $max);
        $this->view->load('admin/tableDataBa');
    }

    /*
     * paging halaman
     */

    public function get_data_ba_array() {
        $ba = new DataBa($this->registry);
        $d_ba = $ba->get_d_ba();
        $return = array();
        foreach ($d_ba as $key => $val) {
            $tmp = array();
            $tmp['kd_d_ba'] = $val->get_kd_d_user_ba();
            $tmp['kd_d_user'] = $val->get_kd_d_user();
            $tmp['kd_d_user_ba'] = $val->get_kd_d_user_ba();
            $tmp['kd_d_tgl'] = $val->get_kd_d_tgl();
            $tmp['kd_d_spm'] = $val->get_kd_d_spm();
            $tmp['kd_d_spm_gagal'] = $val->get_kd_d_spm_gagal();
            $tmp['kd_d_rekon'] = $val->get_kd_d_rekon();
            $tmp['kd_d_rekon_gagal'] = $val->get_kd_d_rekon_gagal();
            $tmp['kd_d_kontrak'] = $val->get_kd_d_kontrak();
            $tmp['kd_d_kontrak_gagal'] = $val->get_kd_d_kontrak_gagal();
            $tmp['kd_d_kontrak_persen'] = $val->get_kd_d_kontrak_persen();
            $tmp['kd_d_spm_persen'] = $val->get_kd_d_spm_persen();
            $tmp['kd_d_rekon_persen'] = $val->get_kd_d_rekon_persen();
            $return[$val->get_kd_d_tgl()] = $tmp;
        }

        echo json_encode($return);
    }

    public function __destruct() {
        
    }
}