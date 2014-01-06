<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataJaringanController extends BaseController {
    /*
     * Konstruktor
     */

    public function __construct($registry) {
        parent::__construct($registry);
        //$this->kd_d_user = Session::get('kd_d_user');
    }

    /*
     * Index
     */

    public function index() {
        $this->view->render('admin/dataJaringan/addDataJaringan');
    }

    /*
     * tambah data Masalah
     */

    public function addDataJaringan($id = null) {
        $d_jar = new DataJaringan($this->registry);
        //$d_bobot = new DataBobot($this->registry);
        //$this->view->bobot = $d_bobot->get_bobot_pkn_lvl2();
        if (isset($_POST['add_d_jar'])) {
            $kd_d_user = Session::get('id_user');
            $tgl_jar = $_POST['tgl_jar'];
            $jar = $_POST['jar'];

            $d_jar->set_kd_d_user($kd_d_user);
            $d_jar->set_tgl_jar($tgl_jar);
            $d_jar->set_jar($jar);

            if (!$d_jar->add_d_jar()) {
                $this->view->d_rekam = $d_jar;
                $this->view->error = $d_jar->get_error();
            }
        }
        //var_dump($d_tetap->get_d_tetap());
        if (!is_null($id)) {
            $d_jar->set_kd_d_jar($id);
            $this->view->d_ubah = $d_jar->get_d_jar_by_id($d_jar);
        }


        //$this->view->dasbor = $d_mslh->get_d_pkn_per_tgl();
        $this->view->data = $d_jar->get_d_jar();
        $this->view->render('admin/dataJaringan');
    }

    /*
     * ubah data PKN
     * 
     */

    public function updDataJaringan() {
        $d_jar = new DataJaringan($this->registry);
        //$d_bobot = new DataBobot($this->registry);
        //$this->view->bobot = $d_bobot->get_bobot_pkn_lvl2();
        if (isset($_POST['upd_d_jar'])) {
            $kd_d_jar = $_POST['kd_d_jar'];
            $kd_d_user = Session::get('id_user');
            $tgl_jar = $_POST['tgl_jar'];
            $jaringan = $_POST['jaringan'];

            $d_jar->set_kd_d_jar($kd_d_jar);
            $d_jar->set_kd_d_user($kd_d_user);
            $d_jar->set_tgl_jar($tgl_jar);
            $d_jar->set_jaringan($jaringan);

            if (!$d_jar->update_d_jar()) {
                $this->view->d_ubah = $d_jar;
                //$this->view->dasbor = $d_pkn->get_d_pkn_per_tgl();
                $this->view->error = $d_jar->get_error();
                $this->view->data = $d_jar->get_d_jar();
                $this->view->render('admin/dataJaringan');
            } else {
                //$this->view->dasbor = $d_pkn->get_d_pkn_per_tgl();
                header('location:' . URL . 'dataJaringan/addDataJaringan');
            }
        }
    }

    /*
     * hapus data PKN
     * @param kd_d_pkn
     */

    public function delDataJaringan($id) {
        $d_jar = new DataJaringan($this->registry);
        if (is_null($id)) {
            throw new Exception;
            echo "id belum dimasukkan!";
            return;
        }
        $d_jar->set_kd_d_jar($id);
        $d_jar->delete_d_jar();
        header('location:' . URL . 'dataJaringan/addDataJaringan');
    }

    /*
     * DESTRUKTOR
     */

    public function __destruct() {
        
    }

}