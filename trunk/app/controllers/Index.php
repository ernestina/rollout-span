<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Index extends BaseController {

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function index() {
        //echo Session::get('role');
        if (Session::get('role') == ADMIN || Session::get('role') == JARINGAN) {
            $d_bobot = new DataBobot($this->registry);
            $this->view->bobot = $d_bobot->get_bobot();
            $d_kppn = new DataKppn($this->registry);
            $this->view->kppn = $d_kppn->get_d_kppn_per_tgl();
            $d_ba = new DataBa($this->registry);
            $this->view->ba = $d_ba->get_d_ba_per_tgl();
            $d_pkn = new DataPkn($this->registry);
            $this->view->pkn = $d_pkn->get_d_pkn_per_tgl();
            $this->view->render('dasbor/level1');
        } elseif (Session::get('role') == KPPN) {
            header('location:' . URL . 'dataKppn/addDataKppnLvl3');
        } elseif (Session::get('role') == BA999) {
            header('location:' . URL . 'dataBa/adddataBa');
        } elseif (Session::get('role') == PKN) {
            header('location:' . URL . 'dataPkn/addDataPkn');
        } else {
            header('location:' . URL . 'auth/login');
        }
    }

}
