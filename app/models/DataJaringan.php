<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataJaringan {

    private $db;
    private $_kd_d_jar;
    private $_kd_d_user;
    private $_tgl_jar;
    private $_jaringan;
    private $_error;
    private $_valid = TRUE;
    private $_table = 'd_jar';
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

    public function get_d_jar($limit = null, $batas = null) {
        $id_user = Session::get('$id_user');
        $sql = "SELECT 
				a.kd_d_jar kd_d_jar,
				a.tgl_jar tgl_jar,
				a.jaringan jaringan,
				b.nama_user nama_user
				FROM " . $this->_table . " a
				LEFT JOIN d_user b ON a.kd_d_user = b.kd_d_user ";
        if ($id_user >= 1000) {
            $sql .= " WHERE a.kd_d_user= " . $id_user;
        }
        $sql .= " ORDER BY a.tgl_jar desc";


        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_jar = new $this($this->registry);
            $d_jar->set_kd_d_jar($val['kd_d_jar']);
            $d_jar->set_kd_d_user($val['nama_user']);
            $d_jar->set_tgl_jar($val['tgl_jar']);
            $d_jar->set_jaringan($val['jaringan']);

            $data[] = $d_jar;
            //var_dump($d_jar);
        }

        return $data;
    }

    public function get_d_jar_per_tgl($limit = null, $batas = null) {
        $sql = "SELECT * FROM " . $this->_table . " GROUP BY tgl_jar asc";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_jar = new $this($this->registry);
            $d_jar->set_kd_d_user($val['kd_d_user']);
            $d_jar->set_tgl_jar($val['tgl_jar']);
            $d_jar->set_jaringan($val['jaringan']);

            $data[] = $d_jar;
            //var_dump($d_pkn);
        }

        return $data;
    }

    /*
     * mendapatkan Data Tetap sesuai id
     * @param objek Data Tetap
     * return objek Data Tetap
     */

    public function get_d_jar_by_id($d_jar = DataJaringan) {
        if (is_null($d_jar->get_kd_d_jar())) {
            return false;
        }
        $sql = "SELECT * FROM " . $this->_table . " WHERE kd_d_jar=" . $d_jar->get_kd_d_jar();
//      var_dump($sql);
        $result = $this->db->select($sql);
        foreach ($result as $val) {
            $d_jar->set_kd_d_jar($val['kd_d_jar']);
            $d_jar->set_kd_d_user($val['kd_d_user']);
            $d_jar->set_tgl_jar($val['tgl_jar']);
            $d_jar->set_jaringan($val['jaringan']);
        }
        return $this;
    }

    /*
     * tambah data Data Tetap
     * param array data array key=>value, nama kolom=>data
     */

    public function add_d_jar() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'tgl_jar' => $this->get_tgl_jar(),
            'jaringan' => $this->get_jaringan()
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

    public function update_d_jar() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'tgl_jar' => $this->get_tgl_jar(),
            'jaringan' => $this->get_jaringan()
        );
        $this->validate();
        if (!$this->get_valid()) {
            return false;
        }
        if (!is_array($data)) {
            return false;
        }
        $where = ' kd_d_jar=' . $this->get_kd_d_jar();
        return $this->db->update($this->_table, $data, $where);
    }

    /*
     * hapus Data Tetap, id harus di set terlebih dahulu
     */

    public function delete_d_jar() {
        $where = ' kd_d_jar=' . $this->get_kd_d_jar();
        $this->db->delete($this->_table, $where);
    }

    public function validate() {
        if ($this->get_kd_d_user() == 0) {
            $this->_error .= "User belum dipilih!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_tgl_jar() == 0) {
            $this->_error .= "Tangal belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_jaringan() == "") {
            $this->_error .= "Masalah belum diinput!</br>";
            $this->_valid = FALSE;
        }
    }

    /*
     * setter
     */

    public function set_kd_d_jar($jar) {
        $this->_kd_d_jar = $jar;
    }

    public function set_kd_d_user($user) {
        $this->_kd_d_user = $user;
    }

    public function set_tgl_jar($tgl) {
        $this->_tgl_jar = $tgl;
    }

    public function set_jaringan($jar) {
        $this->_jaringan = $jar;
    }

    public function set_table($table) {
        $this->_table = $table;
    }

    /*
     * getter
     */

    public function get_kd_d_jar($where = null) {
        if (!is_null($where)) {
            $sql = "SELECT kd_d_jar FROM '" . $this->_table . "' WHERE '" . $where . "'";
            $result = $this->db->select($sql);
            foreach ($result as $val) {
                $this->set_kd_d_jar($val['kd_d_jar']);
            }
        }
        return $this->_kd_d_jar;
    }

    public function get_kd_d_user() {
        return $this->_kd_d_user;
    }

    public function get_tgl_jar() {
        return $this->_tgl_jar;
    }

    public function get_jaringan() {
        return $this->_jaringan;
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