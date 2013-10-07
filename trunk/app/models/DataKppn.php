<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataKppn {

    private $db;
    private $_kd_d_kppn;
    private $_kd_d_user;
    private $_kd_d_konversi;
    private $_kd_d_nrs;
    private $_kd_d_nrk;
    private $_kd_d_spm;
    private $_kd_d_sp2d;
    private $_kd_d_lhp;
    private $_kd_d_rekon;
    private $_kd_d_infrastruktur;
    private $_kd_d_jaringan;
    private $_error;
    private $_valid = TRUE;
    private $_table = 'd_kppn';
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

    public function get_d_kppn($limit = null, $batas = null) {
        $sql = "SELECT * FROM " . $this->_table . " ";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
            $d_kppn->set_kd_d_kppn($val['kd_d_kppn']);
            $d_kppn->set_kd_d_user($val['kd_d_user']);
            $d_kppn->set_kd_d_konversi($val['kd_d_konversi']);
            $d_kppn->set_kd_d_nrs($val['kd_d_nrs']);
            $d_kppn->set_kd_d_nrk($val['kd_d_nrk']);
            $d_kppn->set_kd_d_spm($val['kd_d_spm']);
            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
            $d_kppn->set_kd_d_lhp($val['kd_d_lhp']);
            $d_kppn->set_kd_d_rekon($val['kd_d_rekon']);
            $d_kppn->set_kd_d_infrastruktur($val['kd_d_infrastruktur']);
            $d_kppn->set_kd_d_jaringan($val['kd_d_jaringan']);

            $data[] = $d_kppn;
            //var_dump($d_kppn);
        }

        return $data;
    }

    /*
     * mendapatkan Data Tetap sesuai id
     * @param objek Data Tetap
     * return objek Data Tetap
     */

    public function get_d_kppn_by_id($d_kppn = DataKppn) {
        if (is_null($d_kppn->get_kd_d_kppn())) {
            return false;
        }
        $sql = "SELECT * FROM " . $this->_table . " WHERE kd_d_kppn=" . $d_kppn->get_kd_d_kppn();
//        var_dump($sql);
        $result = $this->db->select($sql);
        foreach ($result as $val) {
            $this->set_kd_d_kppn($val['kd_d_kppn']);
            $this->set_kd_d_user($val['kd_d_user']);
            $this->set_kd_d_konversi($val['kd_d_konversi']);
            $this->set_kd_d_nrs($val['kd_d_nrs']);
            $this->set_kd_d_nrk($val['kd_d_nrk']);
            $this->set_kd_d_spm($val['kd_d_spm']);
            $this->set_kd_d_sp2d($val['kd_d_s2d']);
            $this->set_kd_d_lhp($val['kd_d_lhp']);
            $this->set_kd_d_rekon($val['kd_d_rekon']);
            $this->set_kd_d_infrastruktur($val['kd_d_infrastruktur']);
            $this->set_kd_d_jaringan($val['kd_d_jaringan']);
        }
        return $this;
    }

    /*
     * tambah data Data Tetap
     * param array data array key=>value, nama kolom=>data
     */

    public function add_d_kppn() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'kd_d_konversi' => $this->get_kd_d_konversi(),
            'kd_d_nrs' => $this->get_kd_d_nrs(),
            'kd_d_nrk' => $this->get_kd_d_nrk(),
            'kd_d_spm' => $this->get_kd_d_spm(),
            'kd_d_sp2d' => $this->get_kd_d_sp2d(),
            'kd_d_lhp' => $this->get_kd_d_lhp(),
            'kd_d_rekon' => $this->get_kd_d_rekon(),
            'kd_d_infrastruktur' => $this->get_kd_d_infrastruktur(),
            'kd_d_jaringan' => $this->get_kd_d_jaringan()
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

    public function update_d_kppn() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'kd_d_konversi' => $this->get_kd_d_konversi(),
            'kd_d_nrs' => $this->get_kd_d_nrs(),
            'kd_d_nrk' => $this->get_kd_d_nrk(),
            'kd_d_spm' => $this->get_kd_d_spm(),
            'kd_d_sp2d' => $this->get_kd_d_sp2d(),
            'kd_d_lhp' => $this->get_kd_d_lhp(),
            'kd_d_rekon' => $this->get_kd_d_rekon(),
            'kd_d_infrastruktur' => $this->get_kd_d_infrastruktur(),
            'kd_d_jaringan' => $this->get_kd_d_jaringan()
        );
        $this->validate();
        if (!$this->get_valid())
            return false;
        if (!is_array($data))
            return false;
        $where = ' kd_d_kppn=' . $this->get_kd_d_kppn();
        return $this->db->update($this->_table, $data, $where);
    }

    /*
     * hapus Data Tetap, id harus di set terlebih dahulu
     */

    public function delete_d_kppn() {
        $where = ' kd_d_kppn=' . $this->get_kd_d_kppn();
        $this->db->delete($this->_table, $where);
    }

    public function validate() {
        if ($this->get_kd_d_user() == 0) {
            $this->_error .= "User belum dipilih!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_konversi() == "") {
            $this->_error .= "Konversi belum diinput!<?br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_nrs() == "" ) {
            $this->_error .= "NRS belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_nrk() == "" ) {
            $this->_error .= "NRK belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_spm() == "" ) {
            $this->_error .= "SPM belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_sp2d() == 0) {
            $this->_error .= "SP2D belum dipilih!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_lhp() == "") {
            $this->_error .= "LHP belum diinput!<?br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_rekon() == "" ) {
            $this->_error .= "Rekon belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_infrastruktur() == "" ) {
            $this->_error .= "Infrastruktur belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_jaringan() == "" ) {
            $this->_error .= "Jaringan belum diinput!</br>";
            $this->_valid = FALSE;
        }
    }

    /*
     * setter
     */

    public function set_kd_d_kppn($kppn) {
        $this->_kd_d_kppn = $kppn;
    }

    public function set_kd_d_user($user) {
        $this->_kd_d_user = $user;
    }
    
    public function set_kd_d_konversi($konversi) {
        $this->_kd_d_konversi = $konversi;
    }

    public function set_kd_d_nrs($nrs) {
        $this->_kd_d_nrs = $nrs;
    }
    
    public function set_kd_d_nrk($nrk) {
        $this->_kd_d_nrk = $nrk;
    }

    public function set_kd_d_spm($spm) {
        $this->_kd_d_spm = $spm;
    }
    
    public function set_kd_d_sp2d($sp2d) {
        $this->_kd_d_sp2d = $sp2d;
    }

    public function set_kd_d_lhp($lhp) {
        $this->_kd_d_lhp = $lhp;
    }
    
    public function set_kd_d_rekon($rekon) {
        $this->_kd_d_rekon = $rekon;
    }

    public function set_kd_d_infrastruktur($infrastruktur) {
        $this->_kd_d_infrastuktur = $infrastruktur;
    }
    
    public function set_kd_d_jaringan($jaringan) {
        $this->_kd_d_jaringan = $jaringan;
    }

    public function set_table($table) {
        $this->_table = $table;
    }

    /*
     * getter
     */

    public function get_kd_d_kppn($where = null) {
        if (!is_null($where)) {
            $sql = "SELECT kd_d_kppn FROM '" . $this->_table . "' WHERE '" . $where . "'";
            $result = $this->db->select($sql);
            foreach ($result as $val) {
                $this->set_kode_in($val['kd_d_kppn']);
            }
        }
        return $this->_kd_d_kppn;
    }

    public function get_kd_d_user() {
        return $this->_kd_d_user;
    }

    public function get_kd_d_konversi() {
        return $this->_kd_d_konversi;
    }

    public function get_kd_d_nrs() {
        return $this->_kd_d_nrs;
    }

    public function get_kd_d_nrk() {
        return $this->_kd_d_nrk;
    }

    public function get_kd_d_spm() {
        return $this->_kd_d_spm;
    }
    
    public function get_kd_d_sp2d() {
        return $this->_kd_d_sp2d;
    }

    public function get_kd_d_lhp() {
        return $this->_kd_d_lhp;
    }

    public function get_kd_d_rekon() {
        return $this->_kd_d_rekon;
    }

    public function get_kd_d_infrastruktur() {
        return $this->_kd_d_infrastuktur;
    }

    public function get_kd_d_jaringan() {
        return $this->_kd_d_jaringan;
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
