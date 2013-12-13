<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataPkn {

    private $db;
    private $_kd_d_pkn;
    private $_kd_d_user;
    private $_kd_d_tgl;
    private $_kd_d_sp2d;
    private $_kd_d_sp2d_gagal;
    private $_kd_d_sp2d_persen;
    private $_kd_d_spt;
    private $_kd_d_spt_gagal;
    private $_kd_d_spt_persen;
    private $_error;
    private $_valid = TRUE;
    private $_table = 'd_pkn';
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

    public function get_d_pkn($limit = null, $batas = null) {
        $sql = "SELECT * FROM " . $this->_table . " ORDER BY kd_d_tgl desc";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_pkn = new $this($this->registry);
            $d_pkn->set_kd_d_pkn($val['kd_d_pkn']);
            $d_pkn->set_kd_d_user($val['kd_d_user']);
            $d_pkn->set_kd_d_tgl($val['kd_d_tgl']);
            $d_pkn->set_kd_d_sp2d($val['kd_d_sp2d']);
            $d_pkn->set_kd_d_sp2d_gagal($val['kd_d_sp2d_gagal']);
			if (($val['kd_d_sp2d']) + ($val['kd_d_sp2d_gagal'])==0){
			   $d_pkn->set_kd_d_sp2d_persen(100);
			} else {
			   $d_pkn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d']) / (($val['kd_d_sp2d']) + ($val['kd_d_sp2d_gagal'])) * 100));
			}
            $d_pkn->set_kd_d_spt($val['kd_d_spt']);
            $d_pkn->set_kd_d_spt_gagal($val['kd_d_spt_gagal']);
            if (($val['kd_d_spt']) + ($val['kd_d_spt_gagal'])==0){
			   $d_pkn->set_kd_d_spt_persen(100);
			} else {
			   $d_pkn->set_kd_d_spt_persen(ceil(($val['kd_d_spt']) / (($val['kd_d_spt']) + ($val['kd_d_spt_gagal'])) * 100));
			}

            $data[] = $d_pkn;
            //var_dump($d_pkn);
        }

        return $data;
    }

    public function get_d_pkn_per_tgl($limit = null, $batas = null) {
        $sql = "SELECT * FROM " . $this->_table . " GROUP BY kd_d_tgl asc";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_pkn = new $this($this->registry);
            $d_pkn->set_kd_d_user($val['kd_d_user']);
            $d_pkn->set_kd_d_tgl($val['kd_d_tgl']);
            if (($val['kd_d_sp2d']) + ($val['kd_d_sp2d_gagal'])==0){
			   $d_pkn->set_kd_d_sp2d_persen(100);
			} else {
			   $d_pkn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d']) / (($val['kd_d_sp2d']) + ($val['kd_d_sp2d_gagal'])) * 100));
			}
            if (($val['kd_d_spt']) + ($val['kd_d_spt_gagal'])==0){
			   $d_pkn->set_kd_d_spt_persen(100);
			} else {
			   $d_pkn->set_kd_d_spt_persen(ceil(($val['kd_d_spt']) / (($val['kd_d_spt']) + ($val['kd_d_spt_gagal'])) * 100));
			}

            $data[] = $d_pkn;
            //var_dump($d_pkn);
        }

        return $data;
    }

    /*
     * mendapatkan Data Tetap sesuai id
     * @param objek Data Tetap
     * return objek Data Tetap
     */

    public function get_d_pkn_by_id($d_pkn = DataPkn) {
        if (is_null($d_pkn->get_kd_d_pkn())) {
            return false;
        }
        $sql = "SELECT * FROM " . $this->_table . " WHERE kd_d_pkn=" . $d_pkn->get_kd_d_pkn();
//        var_dump($sql);
        $result = $this->db->select($sql);
        foreach ($result as $val) {
            $d_pkn->set_kd_d_pkn($val['kd_d_pkn']);
            $d_pkn->set_kd_d_user($val['kd_d_user']);
            $d_pkn->set_kd_d_tgl($val['kd_d_tgl']);
            $d_pkn->set_kd_d_sp2d($val['kd_d_sp2d']);
            $d_pkn->set_kd_d_sp2d_gagal($val['kd_d_sp2d_gagal']);
            if (($val['kd_d_sp2d']) + ($val['kd_d_sp2d_gagal'])==0){
			   $d_pkn->set_kd_d_sp2d_persen(100);
			} else {
			   $d_pkn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d']) / (($val['kd_d_sp2d']) + ($val['kd_d_sp2d_gagal'])) * 100));
			}
            $d_pkn->set_kd_d_spt($val['kd_d_spt']);
            $d_pkn->set_kd_d_spt_gagal($val['kd_d_spt_gagal']);
            if (($val['kd_d_spt']) + ($val['kd_d_spt_gagal'])==0){
			   $d_pkn->set_kd_d_spt_persen(100);
			} else {
			   $d_pkn->set_kd_d_spt_persen(ceil(($val['kd_d_spt']) / (($val['kd_d_spt']) + ($val['kd_d_spt_gagal'])) * 100));
			}
        }
        return $this;
    }

    /*
     * tambah data Data Tetap
     * param array data array key=>value, nama kolom=>data
     */

    public function add_d_pkn() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'kd_d_tgl' => $this->get_kd_d_tgl(),
            'kd_d_sp2d' => $this->get_kd_d_sp2d(),
            'kd_d_sp2d_gagal' => $this->get_kd_d_sp2d_gagal(),
            'kd_d_spt' => $this->get_kd_d_spt(),
            'kd_d_spt_gagal' => $this->get_kd_d_spt_gagal()
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

    public function update_d_pkn() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'kd_d_tgl' => $this->get_kd_d_tgl(),
            'kd_d_sp2d' => $this->get_kd_d_sp2d(),
            'kd_d_sp2d_gagal' => $this->get_kd_d_sp2d_gagal(),
            'kd_d_spt' => $this->get_kd_d_spt(),
            'kd_d_spt_gagal' => $this->get_kd_d_spt_gagal()
        );
        $this->validate();
        if (!$this->get_valid())
            return false;
        if (!is_array($data))
            return false;
        $where = ' kd_d_pkn=' . $this->get_kd_d_pkn();
        return $this->db->update($this->_table, $data, $where);
    }

    /*
     * hapus Data Tetap, id harus di set terlebih dahulu
     */

    public function delete_d_pkn() {
        $where = ' kd_d_pkn=' . $this->get_kd_d_pkn();
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
        if ($this->get_kd_d_sp2d() == "") {
            $this->_error .= "SP2D belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_sp2d_gagal() == "") {
            $this->_error .= "SP2D belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_spt() == "") {
            $this->_error .= "SPT Jaringan belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_spt() == "") {
            $this->_error .= "SPT belum diinput!</br>";
            $this->_valid = FALSE;
        }
    }

    public function is_double_data($tgl){
        $sql = "SELECT COUNT(*) as hitung FROM ".$this->_table." WHERE kd_d_tgl='".$tgl."'";
        $return = 0;
        $data = $this->db->select($sql);
        foreach ($data as $key => $value) {
            $return = $value['hitung'];
        }

        return $return;
    }

    /*
     * setter
     */

    public function set_kd_d_pkn($pkn) {
        $this->_kd_d_pkn = $pkn;
    }

    public function set_kd_d_user($user) {
        $this->_kd_d_user = $user;
    }

    public function set_kd_d_tgl($tgl) {
        $this->_kd_d_tgl = $tgl;
    }

    public function set_kd_d_sp2d($sp2d) {
        $this->_kd_d_sp2d = $sp2d;
    }

    public function set_kd_d_sp2d_gagal($sp2d_gagal) {
        $this->_kd_d_sp2d_gagal = $sp2d_gagal;
    }

    public function set_kd_d_sp2d_persen($sp2d_persen) {
        $this->_kd_d_sp2d_persen = $sp2d_persen;
    }

    public function set_kd_d_spt($spt) {
        $this->_kd_d_spt = $spt;
    }

    public function set_kd_d_spt_gagal($spt_gagal) {
        $this->_kd_d_spt_gagal = $spt_gagal;
    }

    public function set_kd_d_spt_persen($spt_persen) {
        $this->_kd_d_spt_persen = $spt_persen;
    }

    public function set_table($table) {
        $this->_table = $table;
    }

    /*
     * getter
     */

    public function get_kd_d_pkn($where = null) {
        if (!is_null($where)) {
            $sql = "SELECT kd_d_pkn FROM '" . $this->_table . "' WHERE '" . $where . "'";
            $result = $this->db->select($sql);
            foreach ($result as $val) {
                $this->set_kd_d_pkn($val['kd_d_pkn']);
            }
        }
        return $this->_kd_d_pkn;
    }

    public function get_kd_d_user() {
        return $this->_kd_d_user;
    }

    public function get_kd_d_tgl() {
        return $this->_kd_d_tgl;
    }

    public function get_kd_d_sp2d() {
        return $this->_kd_d_sp2d;
    }

    public function get_kd_d_sp2d_gagal() {
        return $this->_kd_d_sp2d_gagal;
    }

    public function get_kd_d_sp2d_persen() {
        return $this->_kd_d_sp2d_persen;
    }

    public function get_kd_d_spt() {
        return $this->_kd_d_spt;
    }

    public function get_kd_d_spt_gagal() {
        return $this->_kd_d_spt_gagal;
    }

    public function get_kd_d_spt_persen() {
        return $this->_kd_d_spt_persen;
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
