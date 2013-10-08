<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataDjpuController extends BaseController {
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
        $this->view->render('admin/dataDjpu/addDataDjpu');
    }

    /*
     * tambah data tetap
     */

    public function addDataDjpu($id = null) {
        $d_djpu = new DataDjpu($this->registry);
        if (isset($_POST['add_d_djpu'])) {
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_node = $_POST['kd_d_node'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_djpu->set_kd_d_user($kd_d_user);
            $d_djpu->set_kd_d_tgl($kd_d_tgl);
            $d_djpu->set_kd_d_node($kd_d_node);
            $d_djpu->set_kd_d_masalah($kd_d_masalah);

            if (!$d_djpu->add_d_djpu()) {
                $this->view->d_rekam = $d_djpu;
                $this->view->error = $d_djpu->get_error();
            }
        }
        //var_dump($d_tetap->get_d_tetap());
        if (!is_null($id)) {
            $d_djpu->set_kd_d_djpu($id);
            $this->view->d_ubah = $d_djpu->get_d_djpu_by_id($d_djpu);
        }
        
        $this->view->data = $d_djpu->get_d_djpu();
        $this->view->render('admin/dataDjpu');
    }

    /*
     * ubah data tetap
     * @param kd_d_tetap
     */

    public function updDataDjpu() {
        $d_djpu = new DataDjpu($this->registry);
        if (isset($_POST['upd_d_djpu'])) {
            $kd_d_djpu = $_POST['kd_d_djpu'];
            $kd_d_user = $_POST['kd_d_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_node = $_POST['kd_d_node'];
            $kd_d_masalah = $_POST['kd_d_masalah'];

            $d_djpu->set_kd_d_djpu($kd_d_djpu);
            $d_djpu->set_kd_d_user($kd_d_user);
            $d_djpu->set_kd_d_tgl($kd_d_tgl);
            $d_djpu->set_kd_d_node($kd_d_node);
            $d_djpu->set_kd_d_masalah($kd_d_masalah);

            if (!$d_djpu->update_d_djpu()) {
                $this->view->d_ubah = $d_djpu;
                $this->view->error = $d_djpu->get_error();
                $this->view->data = $d_djpu->get_d_djpu();
                $this->view->render('admin/dataDjpu');
            } else {
                header('location:' . URL . 'dataDjpu/addDataDjpu');
            }
        }
    }

    /*
     * hapus data tetap
     * @param kd_d_tetap
     */

    public function delDataDjpu($id) {
        $d_djpu = new DataDjpu($this->registry);
        if (is_null($id)) {
            throw new Exception;
            echo "id belum dimasukkan!";
            return;
        }
        $d_djpu->set_kd_d_djpu($id);
        $d_djpu->delete_d_djpu();
        header('location:' . URL . 'dataDjpu/addDataDjpu');
    }
	
	public function showDasbor(){
	$d_djpu = new DataDjpu($this->registry);
        $this->view->data = $d_djpu->get_d_djpu();
        $this->view->render('dasbor/level1');
	}

    public function __destruct() {
        ;
    }

}

?>
