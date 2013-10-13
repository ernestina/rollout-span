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
    
    public function get_bobot_kppn_lvl3(){
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
    
    public function get_bobot_ba_lvl2(){
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
//
//    public function get_d_kppn($limit = null, $batas = null) {
//        $sql = "SELECT a.* , b.* FROM " . $this->_table . "  a 
//                LEFT JOIN " . $this->_t_tetap . " b 
//                ON a.kd_d_user = b.kd_d_tetap ORDER BY kd_d_tgl desc";
//        if (!is_null($limit) AND !is_null($batas)) {
//            $sql .= " LIMIT " . $limit . "," . $batas;
//        }
//        $result = $this->db->select($sql);
//        $data = array();
//        foreach ($result as $val) {
//            $d_kppn = new $this($this->registry);
//            $d_kppn->set_kd_d_kppn($val['kd_d_kppn']);
//            $d_kppn->set_kd_d_user($val['kd_d_user']);
//            $d_kppn->set_kd_d_tgl(date("d/m/y", strtotime($val['kd_d_tgl'])));
//            $d_kppn->set_kd_d_konversi($val['kd_d_konversi']);
//            $d_kppn->set_kd_d_konversi_gagal($val['kd_d_konversi_gagal']);
//            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
//            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
//            $d_kppn->set_kd_d_sp2d_gagal($val['kd_d_sp2d_gagal']);
//            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
//            $d_kppn->set_kd_d_lhp($val['kd_d_lhp']);
//            $d_kppn->set_kd_d_lhp_gagal($val['kd_d_lhp_gagal']);
//            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
//            $d_kppn->set_kd_d_rekon($val['kd_d_rekon']);
//            $d_kppn->set_kd_d_rekon_gagal($val['kd_d_rekon_gagal']);
//            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
//
//            $data[] = $d_kppn;
//            //var_dump($d_kppn);
//        }
//
//        return $data;
//    }
//
//    public function get_d_kppn_per_tgl($limit = null, $batas = null) {
//        $sql = "SELECT *
//                FROM " . $this->_table . "  a  
//                GROUP BY kd_d_tgl";
//        if (!is_null($limit) AND !is_null($batas)) {
//            $sql .= " LIMIT " . $limit . "," . $batas;
//        }
//        $result = $this->db->select($sql);
//        $data = array();
//        foreach ($result as $val) {
//            $d_kppn = new $this($this->registry);
//            $d_kppn->set_kd_d_tgl($val['kd_d_tgl']);
//            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
//            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
//            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
//            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
//            $data[] = $d_kppn;
//            //var_dump($d_kppn);
//        }
//
//        return $data;
//    }
//
//    public function get_d_kppn_jkt2($limit = null, $batas = null) {
//        $sql = "SELECT a.* , b.* FROM " . $this->_table . "  a 
//                LEFT JOIN " . $this->_t_tetap . " b 
//                ON a.kd_d_user = b.kd_d_tetap where a.kd_d_user = 10002 ORDER BY kd_d_tgl desc";
//        if (!is_null($limit) AND !is_null($batas)) {
//            $sql .= " LIMIT " . $limit . "," . $batas;
//        }
//        $result = $this->db->select($sql);
//        $data = array();
//        foreach ($result as $val) {
//            $d_kppn = new $this($this->registry);
//            $d_kppn->set_kd_d_kppn($val['kd_d_kppn']);
//            $d_kppn->set_kd_d_user($val['kd_r_unit']);
//            $d_kppn->set_kd_d_tgl(date("d/m/y", strtotime($val['kd_d_tgl'])));
//            $d_kppn->set_kd_d_konversi($val['kd_d_konversi']);
//            $d_kppn->set_kd_d_konversi_gagal($val['kd_d_konversi_gagal']);
//            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
//            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
//            $d_kppn->set_kd_d_sp2d_gagal($val['kd_d_sp2d_gagal']);
//            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
//            $d_kppn->set_kd_d_lhp($val['kd_d_lhp']);
//            $d_kppn->set_kd_d_lhp_gagal($val['kd_d_lhp_gagal']);
//            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
//            $d_kppn->set_kd_d_rekon($val['kd_d_rekon']);
//            $d_kppn->set_kd_d_rekon_gagal($val['kd_d_rekon_gagal']);
//            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
//
//            $data[] = $d_kppn;
//            //var_dump($d_kppn);
//        }
//
//        return $data;
//    }
//
//    public function get_d_kppn_per_tgl_jkt2($limit = null, $batas = null) {
//        $sql = "SELECT *
//                FROM " . $this->_table . "  a  where a.kd_d_user = 10002
//                GROUP BY kd_d_tgl";
//        if (!is_null($limit) AND !is_null($batas)) {
//            $sql .= " LIMIT " . $limit . "," . $batas;
//        }
//        $result = $this->db->select($sql);
//        $data = array();
//        foreach ($result as $val) {
//            $d_kppn = new $this($this->registry);
//            $d_kppn->set_kd_d_tgl($val['kd_d_tgl']);
//            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
//            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
//            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
//            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
//            $data[] = $d_kppn;
//            //var_dump($d_kppn);
//        }
//
//        return $data;
//    }
//
//    public function get_d_kppn_jkt6($limit = null, $batas = null) {
//        $sql = "SELECT a.* , b.* FROM " . $this->_table . "  a 
//                LEFT JOIN " . $this->_t_tetap . " b 
//                ON a.kd_d_user = b.kd_d_tetap where a.kd_d_user = 10006 ORDER BY kd_d_tgl desc";
//        if (!is_null($limit) AND !is_null($batas)) {
//            $sql .= " LIMIT " . $limit . "," . $batas;
//        }
//        $result = $this->db->select($sql);
//        $data = array();
//        foreach ($result as $val) {
//            $d_kppn = new $this($this->registry);
//            $d_kppn->set_kd_d_kppn($val['kd_d_kppn']);
//            $d_kppn->set_kd_d_user($val['kd_r_unit']);
//            $d_kppn->set_kd_d_tgl(date("d/m/y", strtotime($val['kd_d_tgl'])));
//            $d_kppn->set_kd_d_konversi($val['kd_d_konversi']);
//            $d_kppn->set_kd_d_konversi_gagal($val['kd_d_konversi_gagal']);
//            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
//            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
//            $d_kppn->set_kd_d_sp2d_gagal($val['kd_d_sp2d_gagal']);
//            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
//            $d_kppn->set_kd_d_lhp($val['kd_d_lhp']);
//            $d_kppn->set_kd_d_lhp_gagal($val['kd_d_lhp_gagal']);
//            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
//            $d_kppn->set_kd_d_rekon($val['kd_d_rekon']);
//            $d_kppn->set_kd_d_rekon_gagal($val['kd_d_rekon_gagal']);
//            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
//
//            $data[] = $d_kppn;
//            //var_dump($d_kppn);
//        }
//
//        return $data;
//    }
//
//    public function get_d_kppn_per_tgl_jkt6($limit = null, $batas = null) {
//        $sql = "SELECT *
//                FROM " . $this->_table . "  a  where a.kd_d_user = 10006
//                GROUP BY kd_d_tgl";
//        if (!is_null($limit) AND !is_null($batas)) {
//            $sql .= " LIMIT " . $limit . "," . $batas;
//        }
//        $result = $this->db->select($sql);
//        $data = array();
//        foreach ($result as $val) {
//            $d_kppn = new $this($this->registry);
//            $d_kppn->set_kd_d_tgl($val['kd_d_tgl']);
//            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
//            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
//            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
//            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
//            $data[] = $d_kppn;
//            //var_dump($d_kppn);
//        }
//
//        return $data;
//    }
//
//    /*
//     * mendapatkan Data Tetap sesuai id
//     * @param objek Data Tetap
//     * return objek Data Tetap
//     */
//
//    public function get_d_kppn_by_id($d_kppn = DataKppn) {
//        if (is_null($d_kppn->get_kd_d_kppn())) {
//            return false;
//        }
//        $sql = "SELECT * FROM " . $this->_table . " WHERE kd_d_kppn=" . $d_kppn->get_kd_d_kppn();
//        $result = $this->db->select($sql);
//        foreach ($result as $val) {
//            $d_kppn->set_kd_d_user($val['kd_d_user']);
//            $d_kppn->set_kd_d_kppn($val['kd_d_kppn']);
//            $d_kppn->set_kd_d_user($val['kd_r_unit']);
//            $d_kppn->set_kd_d_tgl($val['kd_d_tgl']);
//            $d_kppn->set_kd_d_konversi($val['kd_d_konversi']);
//            $d_kppn->set_kd_d_konversi_gagal($val['kd_d_konversi_gagal']);
//            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
//            $d_kppn->set_kd_d_sp2d_gagal($val['kd_d_sp2d_gagal']);
//            $d_kppn->set_kd_d_lhp($val['kd_d_lhp']);
//            $d_kppn->set_kd_d_lhp_gagal($val['kd_d_lhp_gagal']);
//            $d_kppn->set_kd_d_rekon($val['kd_d_rekon']);
//            $d_kppn->set_kd_d_rekon_gagal($val['kd_d_rekon_gagal']);
//        }
//        return $this;
//    }
//
//    /*
//     * tambah data Data Tetap
//     * param array data array key=>value, nama kolom=>data
//     */
//
//    public function add_d_kppn() {
//        $data = array(
//            'kd_d_user' => $this->get_kd_d_user(),
//            'kd_d_tgl' => $this->get_kd_d_tgl(),
//            'kd_d_konversi' => $this->get_kd_d_konversi(),
//            'kd_d_konversi_gagal' => $this->get_kd_d_konversi_gagal(),
//            'kd_d_sp2d' => $this->get_kd_d_sp2d(),
//            'kd_d_sp2d_gagal' => $this->get_kd_d_sp2d_gagal(),
//            'kd_d_lhp' => $this->get_kd_d_lhp(),
//            'kd_d_lhp_gagal' => $this->get_kd_d_lhp_gagal(),
//            'kd_d_rekon' => $this->get_kd_d_rekon(),
//            'kd_d_rekon_gagal' => $this->get_kd_d_rekon_gagal(),
//            );
//        $this->validate();
//        if (!$this->get_valid())
//            return false;
//        if (!is_array($data))
//            return false;
//        return $this->db->insert($this->_table, $data);
//    }
//
//    /*
//     * update Data Tetap, id harus di set terlebih dahulu
//     * param data array
//     */
//
//    public function update_d_kppn() {
//        $data = array(
//            'kd_d_user' => $this->get_kd_d_user(),
//            'kd_d_tgl' => $this->get_kd_d_tgl(),
//            'kd_d_konversi' => $this->get_kd_d_konversi(),
//            'kd_d_konversi_gagal' => $this->get_kd_d_konversi_gagal(),
//            'kd_d_sp2d' => $this->get_kd_d_sp2d(),
//            'kd_d_sp2d_gagal' => $this->get_kd_d_sp2d_gagal(),
//            'kd_d_lhp' => $this->get_kd_d_lhp(),
//            'kd_d_lhp_gagal' => $this->get_kd_d_lhp_gagal(),
//            'kd_d_rekon' => $this->get_kd_d_rekon(),
//            'kd_d_rekon_gagal' => $this->get_kd_d_rekon_gagal(),
//        );
//        $this->validate();
//        if (!$this->get_valid())
//            return false;
//        if (!is_array($data))
//            return false;
//        $where = ' kd_d_kppn=' . $this->get_kd_d_kppn();
//        return $this->db->update($this->_table, $data, $where);
//    }
//
//    /*
//     * hapus Data Tetap, id harus di set terlebih dahulu
//     */
//
//    public function delete_d_kppn() {
//        $where = ' kd_d_kppn=' . $this->get_kd_d_kppn();
//        $this->db->delete($this->_table, $where);
//    }
//
//    public function validate() {
//        if ($this->get_kd_d_user() == "") {
//            $this->_error .= "User belum dipilih!</br>";
//            $this->_valid = FALSE;
//        }
//        if ($this->get_kd_d_tgl() == "") {
//            $this->_error .= "Tangal belum diinput!</br>";
//            $this->_valid = FALSE;
//        }
//        if ($this->get_kd_d_konversi() == "") {
//            $this->_error .= "Konversi belum diinput!<?br>";
//            $this->_valid = FALSE;
//        }
//        if ($this->get_kd_d_konversi_gagal() == "") {
//            $this->_error .= "Konversi belum diinput!<?br>";
//            $this->_valid = FALSE;
//        }
//        if ($this->get_kd_d_sp2d() == "") {
//            $this->_error .= "SP2D belum dipilih!</br>";
//            $this->_valid = FALSE;
//        }
//        if ($this->get_kd_d_sp2d_gagal() == "") {
//            $this->_error .= "SP2D belum dipilih!</br>";
//            $this->_valid = FALSE;
//        }
//        if ($this->get_kd_d_lhp() == "") {
//            $this->_error .= "LHP belum diinput!<?br>";
//            $this->_valid = FALSE;
//        }
//        if ($this->get_kd_d_lhp_gagal() == "") {
//            $this->_error .= "LHP belum diinput!<?br>";
//            $this->_valid = FALSE;
//        }
//        if ($this->get_kd_d_rekon() == "") {
//            $this->_error .= "Rekon belum diinput!</br>";
//            $this->_valid = FALSE;
//        }
//        if ($this->get_kd_d_rekon_gagal() == "") {
//            $this->_error .= "Rekon belum diinput!</br>";
//            $this->_valid = FALSE;
//        }
//    }

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
