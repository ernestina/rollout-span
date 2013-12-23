<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataMasalah {

    private $db;
    private $_kd_d_mslh;
    private $_kd_d_user;
    private $_tgl_mslh;
    private $_masalah;
    private $_error;
    private $_valid = TRUE;
    private $_table = 'd_mslh';
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

    public function get_d_mslh($limit = null, $batas = null) {
        $id_user = Session::get('id_user');
        $sql = "SELECT 
				a.kd_d_mslh kd_d_mslh,
				a.tgl_mslh tgl_mslh,
				a.masalah masalah,
				b.nama_user nama_user
				FROM " . $this->_table . " a
				LEFT JOIN d_user b ON a.kd_d_user = b.kd_d_user ";
        if ($id_user != 1) {
            $sql .= " WHERE a.kd_d_user= " . $id_user;
        }
        $sql .= " ORDER BY a.tgl_mslh desc";


        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_mslh = new $this($this->registry);
            $d_mslh->set_kd_d_mslh($val['kd_d_mslh']);
            $d_mslh->set_kd_d_user($val['nama_user']);
            $d_mslh->set_tgl_mslh($val['tgl_mslh']);
            $d_mslh->set_masalah($val['masalah']);

            $data[] = $d_mslh;
            //var_dump($d_mslh);
        }

        return $data;
    }

    public function get_d_mslh_per_tgl($limit = null, $batas = null) {
        $sql = "SELECT * FROM " . $this->_table . " GROUP BY tgl_mslh asc";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_mslh = new $this($this->registry);
            $d_mslh->set_kd_d_user($val['kd_d_user']);
            $d_mslh->set_tgl_mslh($val['tgl_mslh']);
            $d_mslh->set_masalah($val['masalah']);

            $data[] = $d_mslh;
            //var_dump($d_pkn);
        }

        return $data;
    }

    /*
     * mendapatkan Data Tetap sesuai id
     * @param objek Data Tetap
     * return objek Data Tetap
     */

    public function get_d_mslh_by_id($d_mslh = DataMasalah) {
        if (is_null($d_mslh->get_kd_d_mslh())) {
            return false;
        }
        $sql = "SELECT * FROM " . $this->_table . " WHERE kd_d_mslh=" . $d_mslh->get_kd_d_mslh();
//      var_dump($sql);
        $result = $this->db->select($sql);
        foreach ($result as $val) {
            $d_mslh->set_kd_d_mslh($val['kd_d_mslh']);
            $d_mslh->set_kd_d_user($val['kd_d_user']);
            $d_mslh->set_tgl_mslh($val['tgl_mslh']);
            $d_mslh->set_masalah($val['masalah']);
        }
        return $this;
    }

    /*
     * tambah data Data Tetap
     * param array data array key=>value, nama kolom=>data
     */

    public function add_d_mslh() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'tgl_mslh' => $this->get_tgl_mslh(),
            'masalah' => $this->get_masalah()
        );
        $this->validate();
        if (!$this->get_valid()) {
            return false;
        }
        if (!is_array($data)) {
            return false;
        }
        return $this->db->insert($this->_table, $data);
    }

    /*
     * update Data Tetap, id harus di set terlebih dahulu
     * param data array
     */

    public function update_d_mslh() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'tgl_mslh' => $this->get_tgl_mslh(),
            'masalah' => $this->get_masalah()
        );
        $this->validate();
        if (!$this->get_valid()) {
            return false;
        }
        if (!is_array($data)) {
            return false;
        }
        $where = ' kd_d_mslh=' . $this->get_kd_d_mslh();
        return $this->db->update($this->_table, $data, $where);
    }

    /*
     * hapus Data Tetap, id harus di set terlebih dahulu
     */

    public function delete_d_mslh() {
        $where = ' kd_d_mslh=' . $this->get_kd_d_mslh();
        $this->db->delete($this->_table, $where);
    }

    public function validate() {
        if ($this->get_kd_d_user() == 0) {
            $this->_error .= "User belum dipilih!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_tgl_mslh() == 0) {
            $this->_error .= "Tangal belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_masalah() == "") {
            $this->_error .= "Masalah belum diinput!</br>";
            $this->_valid = FALSE;
        }
    }

    /*
     * setter
     */

    public function set_kd_d_mslh($mslh) {
        $this->_kd_d_mslh = $mslh;
    }

    public function set_kd_d_user($user) {
        $this->_kd_d_user = $user;
    }

    public function set_tgl_mslh($tgl) {
        $this->_tgl_mslh = $tgl;
    }

    public function set_masalah($bmslh) {
        $this->_masalah = $bmslh;
    }

    public function set_table($table) {
        $this->_table = $table;
    }

    /*
     * getter
     */

    public function get_kd_d_mslh($where = null) {
        if (!is_null($where)) {
            $sql = "SELECT kd_d_mslh FROM '" . $this->_table . "' WHERE '" . $where . "'";
            $result = $this->db->select($sql);
            foreach ($result as $val) {
                $this->set_kd_d_mslh($val['kd_d_mslh']);
            }
        }
        return $this->_kd_d_mslh;
    }

    public function get_kd_d_user() {
        return $this->_kd_d_user;
    }

    public function get_tgl_mslh() {
        return $this->_tgl_mslh;
    }

    public function get_masalah() {
        return $this->_masalah;
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
        
    }

}