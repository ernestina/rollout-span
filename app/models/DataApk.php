<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataApk {

    private $db;
    private $_kd_d_apk;
    private $_kd_d_user;
    private $_kd_d_tgl;
    private $_kd_d_akun;
    private $_kd_d_pel;
    private $_kd_d_masalah;
    private $_error;
    private $_valid = TRUE;
    private $_table = 'd_apk';
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

    public function get_d_apk($limit = null, $batas = null) {
        $sql = "SELECT * FROM " . $this->_table . " ORDER BY kd_d_tgl";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_apk = new $this($this->registry);
            $d_apk->set_kd_d_apk($val['kd_d_apk']);
            $d_apk->set_kd_d_user($val['kd_d_user']);
            $d_apk->set_kd_d_tgl($val['kd_d_tgl']);
            $d_apk->set_kd_d_akun($val['kd_d_akun']);
            $d_apk->set_kd_d_pel($val['kd_d_pel']);
            $d_apk->set_kd_d_masalah($val['kd_d_masalah']);

            $data[] = $d_apk;
            //var_dump($d_apk);
        }

        return $data;
    }

    /*
     * mendapatkan Data Tetap sesuai id
     * @param objek Data Tetap
     * return objek Data Tetap
     */

    public function get_d_apk_by_id($d_apk = DataApk) {
        if (is_null($d_apk->get_kd_d_apk())) {
            return false;
        }
        $sql = "SELECT * FROM " . $this->_table . " WHERE kd_d_apk=" . $d_apk->get_kd_d_apk();
//        var_dump($sql);
        $result = $this->db->select($sql);
        foreach ($result as $val) {
            $this->set_kd_d_apk($val['kd_d_apk']);
            $this->set_kd_d_user($val['kd_d_user']);
            $this->set_kd_d_tgl($val['kd_d_tgl']);
            $this->set_kd_d_akun($val['kd_d_akun']);
            $this->set_kd_d_pel($val['kd_d_pel']);
            $this->set_kd_d_masalah($val['kd_d_masalah']);
        }
        return $this;
    }

    /*
     * tambah data Data Tetap
     * param array data array key=>value, nama kolom=>data
     */

    public function add_d_apk() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'kd_d_tgl' => $this->get_kd_d_tgl(),
            'kd_d_akun' => $this->get_kd_d_akun(),
            'kd_d_pel' => $this->get_kd_d_pel(),
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

    public function update_d_apk() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'kd_d_tgl' => $this->get_kd_d_tgl(),
            'kd_d_akun' => $this->get_kd_d_akun(),
            'kd_d_pel' => $this->get_kd_d_pel(),
            'kd_d_masalah' => $this->get_kd_d_masalah()
        );
        $this->validate();
        if (!$this->get_valid())
            return false;
        if (!is_array($data))
            return false;
        $where = ' kd_d_apk=' . $this->get_kd_d_apk();
        return $this->db->update($this->_table, $data, $where);
    }

    /*
     * hapus Data Tetap, id harus di set terlebih dahulu
     */

    public function delete_d_apk() {
        $where = ' kd_d_apk=' . $this->get_kd_d_apk();
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
        if ($this->get_kd_d_akun() == "" ) {
            $this->_error .= "Akun belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_pel() == "" ) {
            $this->_error .= "Pelanggan belum diinput!</br>";
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

    public function set_kd_d_apk($apk) {
        $this->_kd_d_apk = $apk;
    }

    public function set_kd_d_user($user) {
        $this->_kd_d_user = $user;
    }
    
    public function set_kd_d_tgl($tgl) {
        $this->_kd_d_tgl = $tgl;
    }
    
    public function set_kd_d_akun($akun) {
        $this->_kd_d_akun = $akun;
    }
    
    public function set_kd_d_pel($pel) {
        $this->_kd_d_pel = $pel;
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

    public function get_kd_d_apk($where = null) {
        if (!is_null($where)) {
            $sql = "SELECT kd_d_apk FROM '" . $this->_table . "' WHERE '" . $where . "'";
            $result = $this->db->select($sql);
            foreach ($result as $val) {
                $this->set_kd_d_apk($val['kd_d_apk']);
            }
        }
        return $this->_kd_d_apk;
    }

    public function get_kd_d_user() {
        return $this->_kd_d_user;
    }
    
    public function get_kd_d_tgl() {
        return $this->_kd_d_tgl;
    }

    public function get_kd_d_akun() {
        return $this->_kd_d_akun;
    }
    
    public function get_kd_d_pel() {
        return $this->_kd_d_pel;
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
