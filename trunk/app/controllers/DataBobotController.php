<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataBobotController extends BaseController {
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
        $this->view->render('admin/dataBobotr');
    }

    /*
     * melihat dan merubah data Bobot
     * 
     */

    public function viewDataBobot() {
        $d_bobot = new DataBobot($this->registry);
        if (isset($_POST['upd_bobot'])) {
            $konversi = $_POST['konversi'];
            $sp2d = $_POST['sp2d'];
            $lhp = $_POST['lhp'];
            $rekon = $_POST['rekon'];
            $spm_ba = $_POST['spm_ba'];
            $rekon_ba = $_POST['rekon_ba'];
            $kontrak_ba = $_POST['kontrak_ba'];
            $sp2d_pkn = $_POST['sp2d_pkn'];
            $spt_pkn = $_POST['spt_pkn'];
            $kppn = $_POST['kppn'];
            $ba = $_POST['ba'];
            $pkn = $_POST['pkn'];

            $d_bobot->set_konversi($konversi);
            $d_bobot->set_sp2d($sp2d);
            $d_bobot->set_lhp($lhp);
            $d_bobot->set_rekon($rekon);
            $d_bobot->set_spm_ba($spm_ba);
            $d_bobot->set_rekon_ba($rekon_ba);
            $d_bobot->set_kontrak_ba($kontrak_ba);
            $d_bobot->set_sp2d_pkn($sp2d_pkn);
            $d_bobot->set_spt_pkn($spt_pkn);
            $d_bobot->set_kppn($kppn);
            $d_bobot->set_ba($ba);
            $d_bobot->set_pkn($pkn);

            if (!$d_bobot->update_d_bobot()) {
                $this->view->error = $d_bobot->get_error();
                $this->view->data = $d_bobot->get_bobot();
                $this->view->render('admin/dataBobot');
            } else {
                header('location:' . URL . 'dataBobot/viewDataBobot');
            }
        }
        $this->view->data = $d_bobot->get_bobot();
        $this->view->render('admin/dataBobot');
    }

    public function __destruct() {
        
    }

}