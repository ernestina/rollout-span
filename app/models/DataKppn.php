<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataKppn {

    private $db;
    private $_kd_d_kppn;
    private $_kd_d_user;
    private $_kd_d_tgl;
    private $_kd_d_konversi;
    private $_kd_d_nrs;
    private $_kd_d_nrk;
    private $_kd_d_spm;
    private $_kd_d_sp2d;
    private $_kd_d_lhp;
    private $_kd_d_rekon;
    private $_kd_d_persepsi;
    private $_kd_d_terimaan;
    private $_kd_d_koreksi;
    private $_kd_d_infrastruktur;
    private $_kd_d_jaringan;
    private $_kd_d_masalah;
    private $_error;
    private $_valid = TRUE;
    private $_table = 'd_kppn';
    private $_t_tetap = 'd_tetap';
    private $_kd_r_unit;
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
     * $sql = "SELECT a.KD_FAKUL as KD_FAKUL,
                b.NM_UNIV as KD_UNIV,
                a.NM_FAKUL as NM_FAKUL,
                a.ALMT_FAKUL as ALMT_FAKUL,
                a.TELP_FAKUL as TELP_FAKUL
                FROM " . $this->_table . " a
                LEFT JOIN " . $this->_tb_univ . " b ON a.KD_UNIV=b.KD_UNIV";
     */

    public function get_d_kppn($limit = null, $batas = null) {
        $sql = "SELECT a.* , b.* FROM " . $this->_table . "  a 
                LEFT JOIN " . $this->_t_tetap. " b 
                ON a.kd_d_user = b.kd_d_tetap ORDER BY kd_d_tgl";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
            $d_kppn->set_kd_d_kppn($val['kd_d_kppn']);
            $d_kppn->set_kd_d_user($val['kd_r_unit']);
            $d_kppn->set_kd_d_tgl($val['kd_d_tgl']);
            $d_kppn->set_kd_d_konversi($val['kd_d_konversi']);
            $d_kppn->set_kd_d_nrs($val['kd_d_nrs']);
            $d_kppn->set_kd_d_nrk($val['kd_d_nrk']);
            $d_kppn->set_kd_d_spm($val['kd_d_spm']);
            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
            $d_kppn->set_kd_d_lhp($val['kd_d_lhp']);
            $d_kppn->set_kd_d_rekon($val['kd_d_rekon']);
            $d_kppn->set_kd_d_persepsi($val['kd_d_persepsi']);
            $d_kppn->set_kd_d_terimaan($val['kd_d_terimaan']);
            $d_kppn->set_kd_d_koreksi($val['kd_d_koreksi']);
            $d_kppn->set_kd_d_infrastruktur($val['kd_d_infrastruktur']);
            $d_kppn->set_kd_d_jaringan($val['kd_d_jaringan']);
            $d_kppn->set_kd_d_masalah($val['kd_d_masalah']);
            $d_kppn->set_kd_r_unit($val['kd_r_unit']);

            $data[] = $d_kppn;
            //var_dump($d_kppn);
        }

        return $data;
    }
    
    public function get_d_kppn_per_tgl($limit = null, $batas = null) {
        $sql = "SELECT kd_d_tgl, sum(kd_d_sp2d) as kd_d_sp2d, sum(kd_d_spm) as kd_d_spm
                FROM " . $this->_table . "  a 
                GROUP BY kd_d_tgl";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
            $d_kppn->set_kd_d_tgl($val['kd_d_tgl']);
            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
            $d_kppn->set_kd_d_spm($val['kd_d_spm']);
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
        $result = $this->db->select($sql);
        foreach ($result as $val) {
            $this->set_kd_d_kppn($val['kd_d_kppn']);
            $this->set_kd_d_user($val['kd_d_user']);
            $this->set_kd_d_tgl($val['kd_d_tgl']);
            $this->set_kd_d_konversi($val['kd_d_konversi']);
            $this->set_kd_d_nrs($val['kd_d_nrs']);
            $this->set_kd_d_nrk($val['kd_d_nrk']);
            $this->set_kd_d_spm($val['kd_d_spm']);
            $this->set_kd_d_sp2d($val['kd_d_sp2d']);
            $this->set_kd_d_lhp($val['kd_d_lhp']);
            $this->set_kd_d_rekon($val['kd_d_rekon']);
            $this->set_kd_d_persepsi($val['kd_d_persepsi']);
            $this->set_kd_d_terimaan($val['kd_d_terimaan']);
            $this->set_kd_d_koreksi($val['kd_d_koreksi']);
            $this->set_kd_d_infrastruktur($val['kd_d_infrastruktur']);
            $this->set_kd_d_jaringan($val['kd_d_jaringan']);
            $this->set_kd_d_masalah($val['kd_d_masalah']);
            $this->set_kd_r_unit($val['kd_r_unit']);
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
            'kd_d_tgl' => $this->get_kd_d_tgl(),
            'kd_d_konversi' => $this->get_kd_d_konversi(),
            'kd_d_nrs' => $this->get_kd_d_nrs(),
            'kd_d_nrk' => $this->get_kd_d_nrk(),
            'kd_d_spm' => $this->get_kd_d_spm(),
            'kd_d_sp2d' => $this->get_kd_d_sp2d(),
            'kd_d_lhp' => $this->get_kd_d_lhp(),
            'kd_d_rekon' => $this->get_kd_d_rekon(),
            'kd_d_persepsi' => $this->get_kd_d_persepsi(),
            'kd_d_terimaan' => $this->get_kd_d_terimaan(),
            'kd_d_koreksi' => $this->get_kd_d_koreksi(),
            'kd_d_infrastruktur' => $this->get_kd_d_infrastruktur(),
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

    public function update_d_kppn() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'kd_d_tgl' => $this->get_kd_d_tgl(),
            'kd_d_konversi' => $this->get_kd_d_konversi(),
            'kd_d_nrs' => $this->get_kd_d_nrs(),
            'kd_d_nrk' => $this->get_kd_d_nrk(),
            'kd_d_spm' => $this->get_kd_d_spm(),
            'kd_d_sp2d' => $this->get_kd_d_sp2d(),
            'kd_d_lhp' => $this->get_kd_d_lhp(),
            'kd_d_rekon' => $this->get_kd_d_rekon(),
            'kd_d_persepsi' => $this->get_kd_d_persepsi(),
            'kd_d_terimaan' => $this->get_kd_d_terimaan(),
            'kd_d_koreksi' => $this->get_kd_d_koreksi(),
            'kd_d_infrastruktur' => $this->get_kd_d_infrastruktur(),
            'kd_d_jaringan' => $this->get_kd_d_jaringan(),
            'kd_d_masalah' => $this->get_kd_d_masalah()
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
        if ($this->get_kd_d_tgl() == 0) {
            $this->_error .= "Tangal belum diinput!</br>";
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
        if ($this->get_kd_d_persepsi() == "" ) {
            $this->_error .= "Persepsi belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_terimaan() == "" ) {
            $this->_error .= "Terimaan belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_koreksi() == "" ) {
            $this->_error .= "Koreksi belum diinput!</br>";
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
        if ($this->get_kd_d_masalah() == "" ) {
            $this->_error .= "Masalah belum diinput!</br>";
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
    
    public function set_kd_d_tgl($tgl) {
        $this->_kd_d_tgl = $tgl;
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
    
    public function set_kd_d_persepsi($persepsi) {
        $this->_kd_d_persepsi = $persepsi;
    }
    
    public function set_kd_d_terimaan($terimaan) {
        $this->_kd_d_terimaan = $terimaan;
    }
    
    public function set_kd_d_koreksi($koreksi) {
        $this->_kd_d_koreksi = $koreksi;
    }

    public function set_kd_d_infrastruktur($infrastruktur) {
        $this->_kd_d_infrastuktur = $infrastruktur;
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
    
    public function set_kd_r_unit($unit) {
        $this->_kd_r_unit = $unit;
    }

    /*
     * getter
     */

    public function get_kd_d_kppn($where = null) {
        if (!is_null($where)) {
            $sql = "SELECT kd_d_kppn FROM '" . $this->_table . "' WHERE '" . $where . "'";
            $result = $this->db->select($sql);
            foreach ($result as $val) {
                $this->set_kd_d_kppn($val['kd_d_kppn']);
            }
        }
        return $this->_kd_d_kppn;
    }

    public function get_kd_d_user() {
        return $this->_kd_d_user;
    }
    
    public function get_kd_d_tgl() {
        return $this->_kd_d_tgl;
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
    
    public function get_kd_d_persepsi() {
        return $this->_kd_d_persepsi;
    }
    
    public function get_kd_d_terimaan() {
        return $this->_kd_d_terimaan;
    }
    
    public function get_kd_d_koreksi() {
        return $this->_kd_d_koreksi;
    }

    public function get_kd_d_infrastruktur() {
        return $this->_kd_d_infrastuktur;
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
    
    public function get_kd_r_unit() {
        return $this->_kd_r_unit;
    }

    /*
     * destruktor
     */

    public function __destruct() {
        ;
    }

}

?>
