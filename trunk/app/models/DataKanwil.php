<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataKanwil {

    private $db;
    private $_kd_d_kanwil;
    private $_kd_d_user;
    private $_kd_d_tgl;
    private $_kd_d_rekon;
    private $_kd_d_jaringan;
    private $_kd_d_masalah;
    private $_error;
    private $_valid = TRUE;
    private $_table = 'd_kanwil';
    public $registry;

    /*
     * konstruktor
     */

    public function __construct($registry = Registry) {
        $this->db = $registry->db;
        $this->registry = $registry;
    }

    /*
     * mendapatkan data dari tabel Data Tetap
     * @param limit batas default null
     * return array objek Data Tetap
     */

    public function get_d_kanwil($limit = null, $batas = null) {
        $sql = "SELECT * FROM " . $this->_table . " ORDER BY kd_d_tgl";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_kanwil = new $this($this->registry);
            $d_kanwil->set_kd_d_kanwil($val['kd_d_kanwil']);
            $d_kanwil->set_kd_d_user($val['kd_d_user']);
            $d_kanwil->set_kd_d_tgl($val['kd_d_tgl']);
            $d_kanwil->set_kd_d_rekon($val['kd_d_rekon']);
            $d_kanwil->set_kd_d_jaringan($val['kd_d_jaringan']);
            $d_kanwil->set_kd_d_masalah($val['kd_d_masalah']);

            $data[] = $d_kanwil;
            //var_dump($d_kanwil);
        }

        return $data;
    }

    /*
     * mendapatkan Data Tetap sesuai id
     * @param objek Data Tetap
     * return objek Data Tetap
     */

    public function get_d_kanwil_by_id($d_kanwil = DataKanwil) {
        if (is_null($d_kanwil->get_kd_d_kanwil())) {
            return false;
        }
        $sql = "SELECT * FROM " . $this->_table . " WHERE kd_d_kanwil=" . $d_kanwil->get_kd_d_kanwil();
//        var_dump($sql);
        $result = $this->db->select($sql);
        foreach ($result as $val) {
            $this->set_kd_d_kanwil($val['kd_d_kanwil']);
            $this->set_kd_d_user($val['kd_d_user']);
            $this->set_kd_d_tgl($val['kd_d_tgl']);
            $this->set_kd_d_rekon($val['kd_d_rekon']);
            $this->set_kd_d_jaringan($val['kd_d_jaringan']);
            $this->set_kd_d_masalah($val['kd_d_masalah']);
        }
        return $this;
    }

    /*
     * tambah data Data Tetap
     * param array data array key=>value, nama kolom=>data
     */

    public function add_d_kanwil() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'kd_d_tgl' => $this->get_kd_d_tgl(),
            'kd_d_rekon' => $this->get_kd_d_rekon(),
            'kd_d_jaringan' => $this->get_kd_d_jaringan(),
            'kd_d_masalah' => $this->get_kd_d_masalah()
        );
        $this->validate();
        if (!$this->get_valid())
            return false;
        if (!is_array($data))
            return false;
        return $this->db->insert($this->_table, $data);
    }

    /*
     * update Data Tetap, id harus di set terlebih dahulu
     * param data array
     */

    public function update_d_kanwil() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'kd_d_tgl' => $this->get_kd_d_tgl(),
            'kd_d_rekon' => $this->get_kd_d_rekon(),
            'kd_d_jaringan' => $this->get_kd_d_jaringan(),
            'kd_d_masalah' => $this->get_kd_d_masalah()
        );
        $this->validate();
        if (!$this->get_valid())
            return false;
        if (!is_array($data))
            return false;
        $where = ' kd_d_kanwil=' . $this->get_kd_d_kanwil();
        return $this->db->update($this->_table, $data, $where);
    }

    /*
     * hapus Data Tetap, id harus di set terlebih dahulu
     */

    public function delete_d_kanwil() {
        $where = ' kd_d_kanwil=' . $this->get_kd_d_kanwil();
        $this->db->delete($this->_table, $where);
    }

    public function validate() {
        if ($this->get_kd_d_user() == 0) {
            $this->_error .= "User belum dipilih!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_tgl() == 0) {
            $this->_error .= "Tangal belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_rekon() == "" ) {
            $this->_error .= "Rekon belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_jaringan() == "" ) {
            $this->_error .= "Jaringan belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_masalah() == "" ) {
            $this->_error .= "Masalah belum diinput!</br>";
            $this->_valid = FALSE;
        }
    }

    /*
     * setter
     */

    public function set_kd_d_kanwil($kanwil) {
        $this->_kd_d_kanwil = $kanwil;
    }

    public function set_kd_d_user($user) {
        $this->_kd_d_user = $user;
    }
    
    public function set_kd_d_tgl($tgl) {
        $this->_kd_d_tgl = $tgl;
    }
    
    public function set_kd_d_rekon($rekon) {
        $this->_kd_d_rekon = $rekon;
    }
        
    public function set_kd_d_jaringan($jaringan) {
        $this->_kd_d_jaringan = $jaringan;
    }
    
    public function set_kd_d_masalah($masalah) {
        $this->_kd_d_masalah = $masalah;
    }

    public function set_table($table) {
        $this->_table = $table;
    }

    /*
     * getter
     */

    public function get_kd_d_kanwil($where = null) {
        if (!is_null($where)) {
            $sql = "SELECT kd_d_kanwil FROM '" . $this->_table . "' WHERE '" . $where . "'";
            $result = $this->db->select($sql);
            foreach ($result as $val) {
                $this->set_kd_d_kanwil($val['kd_d_kanwil']);
            }
        }
        return $this->_kd_d_kanwil;
    }

    public function get_kd_d_user() {
        return $this->_kd_d_user;
    }
    
    public function get_kd_d_tgl() {
        return $this->_kd_d_tgl;
    }

    
    public function get_kd_d_rekon() {
        return $this->_kd_d_rekon;
    }
    
    public function get_kd_d_jaringan() {
        return $this->_kd_d_jaringan;
    }
    
    public function get_kd_d_masalah() {
        return $this->_kd_d_masalah;
    }

    public function get_error() {
        return $this->_error;
    }

    public function get_valid() {
        return $this->_valid;
    }

    /*
     * destruktor
     */

    public function __destruct() {
        ;
    }

}

?>
