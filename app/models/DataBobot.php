<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataBobot {

    private $db;
    private $_konversi;
    private $_sp2d;
    private $_lhp;
    private $_rekon;
    private $_spm_ba;
    private $_kontrak_ba;
    private $_rekon_ba;
    private $_sp2d_pkn;
    private $_spt_pkn;
    private $_kppn;
    private $_ba;
    private $_pkn;
    private $_error;
    private $_valid = TRUE;
    private $_table = 'd_bobot';
    public $registry;

    /*
     * konstruktor
     */

    public function __construct($registry = Registry) {
        $this->db = $registry->db;
        $this->registry = $registry;
    }

    public function get_bobot() {
        $sql = "SELECT *
                FROM " . $this->_table;
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_bobot = new $this($this->registry);
            $d_bobot->set_konversi($val['konversi']);
            $d_bobot->set_sp2d($val['sp2d']);
            $d_bobot->set_lhp($val['lhp']);
            $d_bobot->set_rekon($val['rekon']);
            $d_bobot->set_spm_ba($val['spm_ba']);
            $d_bobot->set_rekon_ba($val['rekon_ba']);
            $d_bobot->set_kontrak_ba($val['kontrak_ba']);
            $d_bobot->set_sp2d_pkn($val['sp2d_pkn']);
            $d_bobot->set_spt_pkn($val['spt_pkn']);
            $d_bobot->set_kppn($val['kppn']);
            $d_bobot->set_ba($val['ba']);
            $d_bobot->set_pkn($val['pkn']);

            $data[] = $d_bobot;
        }
        return $data;
    }

    public function get_bobot_kppn_lvl3() {
        $sql = "SELECT *
                FROM " . $this->_table;
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_bobot = new $this($this->registry);
            $d_bobot->set_konversi($val['konversi']);
            $d_bobot->set_sp2d($val['sp2d']);
            $d_bobot->set_lhp($val['lhp']);
            $d_bobot->set_rekon($val['rekon']);

            $data[] = $d_bobot;
        }
        return $data;
    }

    public function get_bobot_ba_lvl2() {
        $sql = "SELECT *
                FROM " . $this->_table;
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_bobot = new $this($this->registry);
            $d_bobot->set_spm_ba($val['spm_ba']);
            $d_bobot->set_rekon_ba($val['rekon_ba']);
            $d_bobot->set_kontrak_ba($val['kontrak_ba']);

            $data[] = $d_bobot;
        }
        return $data;
    }

    public function get_bobot_pkn_lvl2() {
        $sql = "SELECT *
                FROM " . $this->_table;
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_bobot = new $this($this->registry);
            $d_bobot->set_sp2d_pkn($val['sp2d_pkn']);
            $d_bobot->set_spt_pkn($val['spt_pkn']);

            $data[] = $d_bobot;
        }
        return $data;
    }

    public function get_bobot_lvl1() {
        $sql = "SELECT *
                FROM " . $this->_table;
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_bobot = new $this($this->registry);
            $d_bobot->set_kppn($val['kppn']);
            $d_bobot->set_ba($val['ba']);
            $d_bobot->set_pkn($val['pkn']);

            $data[] = $d_bobot;
        }
        return $data;
    }

    public function update_d_bobot() {
        $data = array(
            'konversi' => $this->get_konversi(),
            'sp2d' => $this->get_sp2d(),
            'lhp' => $this->get_lhp(),
            'rekon' => $this->get_rekon(),
            'spm_ba' => $this->get_spm_ba(),
            'rekon_ba' => $this->get_rekon_ba(),
            'kontrak_ba' => $this->get_kontrak_ba(),
            'sp2d_pkn' => $this->get_sp2d_pkn(),
            'spt_pkn' => $this->get_spt_pkn(),
            'kppn' => $this->get_kppn(),
            'ba' => $this->get_ba(),
            'pkn' => $this->get_pkn()
        );
        $this->validate();
        if (!$this->get_valid()) {
            return false;
        }
        if (!is_array($data)) {
            return false;
        }
        $where = '1';
        return $this->db->update($this->_table, $data, $where);
    }

    public function validate() {
        if ($this->get_konversi() == "") {
            $this->_error .= "konversi belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_sp2d() == "") {
            $this->_error .= "SP2D belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_lhp() == "") {
            $this->_error .= "LHP belum diinput!<?br>";
            $this->_valid = FALSE;
        }
        if ($this->get_rekon() == "") {
            $this->_error .= "Rekon belum diinput!<?br>";
            $this->_valid = FALSE;
        }
        if ($this->get_spm_ba() == "") {
            $this->_error .= "SPM BA.999 belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_rekon_ba() == "") {
            $this->_error .= "Rekon BA.999 belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kontrak_ba() == "") {
            $this->_error .= "Kontrak BA.999 belum diinput!<?br>";
            $this->_valid = FALSE;
        }
        if ($this->get_sp2d_pkn() == "") {
            $this->_error .= "SP2D PKN belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_spt_pkn() == "") {
            $this->_error .= "SPT PKN belum diinput!</br>";
            $this->_valid = FALSE;
        }

        if ($this->get_kppn() == "") {
            $this->_error .= "KPPN belum diinput!</br>";
            $this->_valid = FALSE;
        }

        if ($this->get_ba() == "") {
            $this->_error .= "BA.999 belum diinput!</br>";
            $this->_valid = FALSE;
        }

        if ($this->get_pkn() == "") {
            $this->_error .= "PKN belum diinput!</br>";
            $this->_valid = FALSE;
        }
    }

    /*
     * setter
     */

    public function set_konversi($konversi) {
        $this->_konversi = $konversi;
    }

    public function set_sp2d($sp2d) {
        $this->_sp2d = $sp2d;
    }

    public function set_lhp($lhp) {
        $this->_lhp = $lhp;
    }

    public function set_rekon($rekon) {
        $this->_rekon = $rekon;
    }

    public function set_spm_ba($spm_ba) {
        $this->_spm_ba = $spm_ba;
    }

    public function set_rekon_ba($rekon_ba) {
        $this->_rekon_ba = $rekon_ba;
    }

    public function set_kontrak_ba($kontrak_ba) {
        $this->_kontrak_ba = $kontrak_ba;
    }

    public function set_sp2d_pkn($sp2d_pkn) {
        $this->_sp2d_pkn = $sp2d_pkn;
    }

    public function set_spt_pkn($spt_pkn) {
        $this->_spt_pkn = $spt_pkn;
    }

    public function set_kppn($kppn) {
        $this->_kppn = $kppn;
    }

    public function set_ba($ba) {
        $this->_ba = $ba;
    }

    public function set_pkn($pkn) {
        $this->_pkn = $pkn;
    }

    /*
     * getter
     */

    public function get_konversi() {
        return $this->_konversi;
    }

    public function get_sp2d() {
        return $this->_sp2d;
    }

    public function get_lhp() {
        return $this->_lhp;
    }

    public function get_rekon() {
        return $this->_rekon;
    }

    public function get_spm_ba() {
        return $this->_spm_ba;
    }

    public function get_rekon_ba() {
        return $this->_rekon_ba;
    }

    public function get_kontrak_ba() {
        return $this->_kontrak_ba;
    }

    public function get_sp2d_pkn() {
        return $this->_sp2d_pkn;
    }

    public function get_spt_pkn() {
        return $this->_spt_pkn;
    }

    public function get_kppn() {
        return $this->_kppn;
    }

    public function get_ba() {
        return $this->_ba;
    }

    public function get_pkn() {
        return $this->_pkn;
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