<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataBa {

    private $db;
    private $_kd_d_ba;
    private $_kd_d_user;
    private $_kd_d_user_ba;
    private $_kd_d_tgl;
    private $_kd_d_spm;
    private $_kd_d_spm_gagal;
    private $_kd_d_spm_persen;
    private $_kd_d_rekon;
    private $_kd_d_rekon_gagal;
    private $_kd_d_rekon_persen;
    private $_kd_d_kontrak;
    private $_kd_d_kontrak_gagal;
    private $_kd_d_kontrak_persen;
    private $_error;
    private $_valid = TRUE;
    private $_table = 'd_ba';
    public $registry;

    /*
     * konstruktor
     */

    public function __construct($registry = Registry) {
        $this->db = $registry->db;
        $this->registry = $registry;
    }

    /*
     * mendapatkan data dari tabel Data BA.999
     * @param limit batas default null
     * return array objek Data BA.999
     */

    public function get_d_ba($limit = null, $batas = null) {
        $sql = "SELECT * FROM " . $this->_table . " ORDER BY kd_d_tgl desc ";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_ba = new $this($this->registry);
            $d_ba->set_kd_d_ba($val['kd_d_ba']);
            $d_ba->set_kd_d_user($val['kd_d_user']);
            $d_ba->set_kd_d_user_ba($val['kd_d_user_ba']);
            $d_ba->set_kd_d_tgl($val['kd_d_tgl']);
            $d_ba->set_kd_d_spm($val['kd_d_spm']);
            $d_ba->set_kd_d_spm_gagal($val['kd_d_spm_gagal']);
			if (($val['kd_d_spm'])+($val['kd_d_spm_gagal'])==0){
			    //$d_ba->set_kd_d_spm_persen(100);
                $d_ba->set_kd_d_spm_persen(-1);
			} else {
			    $d_ba->set_kd_d_spm_persen(ceil(($val['kd_d_spm'])/(($val['kd_d_spm'])+($val['kd_d_spm_gagal']))*100));
			}
            $d_ba->set_kd_d_rekon($val['kd_d_rekon']);
            $d_ba->set_kd_d_rekon_gagal($val['kd_d_rekon_gagal']);
            if (($val['kd_d_rekon'])+($val['kd_d_rekon_gagal'])==0){
			    //$d_ba->set_kd_d_rekon_persen(100);
                $d_ba->set_kd_d_rekon_persen(-1);
			} else {
			    $d_ba->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
			}
            $d_ba->set_kd_d_kontrak($val['kd_d_kontrak']);
            $d_ba->set_kd_d_kontrak_gagal($val['kd_d_kontrak_gagal']);
            if (($val['kd_d_kontrak'])+($val['kd_d_kontrak_gagal'])==0){
			    //$d_ba->set_kd_d_kontrak_persen(100);
                $d_ba->set_kd_d_kontrak_persen(-1);
			} else {
			    $d_ba->set_kd_d_kontrak_persen(ceil(($val['kd_d_kontrak'])/(($val['kd_d_kontrak'])+($val['kd_d_kontrak_gagal']))*100));
			}

            $data[] = $d_ba;
            //var_dump($d_ba);
        }

        return $data;
    }
    
    public function get_d_ba_per_tgl($limit = null, $batas = null) {
        $sql = "SELECT 
				kd_d_user,
				kd_d_tgl,
				sum(kd_d_spm) as kd_d_spm,
				sum(kd_d_spm_gagal) as kd_d_spm_gagal, 
				sum(kd_d_rekon) as kd_d_rekon,
				sum(kd_d_rekon_gagal) as kd_d_rekon_gagal, 
				sum(kd_d_kontrak) as kd_d_kontrak,
				sum(kd_d_kontrak_gagal) as kd_d_kontrak_gagal
                FROM " . $this->_table . " 
                GROUP BY kd_d_tgl asc";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_ba = new $this($this->registry);
            $d_ba->set_kd_d_user($val['kd_d_user']);
            $d_ba->set_kd_d_tgl($val['kd_d_tgl']);
            if (($val['kd_d_spm'])+($val['kd_d_spm_gagal'])==0){
			    $d_ba->set_kd_d_spm_persen(100);
			} else {
			    $d_ba->set_kd_d_spm_persen(ceil(($val['kd_d_spm'])/(($val['kd_d_spm'])+($val['kd_d_spm_gagal']))*100));
			}
            if (($val['kd_d_rekon'])+($val['kd_d_rekon_gagal'])==0){
			    $d_ba->set_kd_d_rekon_persen(100);
			} else {
			    $d_ba->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
			}
            if (($val['kd_d_kontrak'])+($val['kd_d_kontrak_gagal'])==0){
			    $d_ba->set_kd_d_kontrak_persen(100);
			} else {
			    $d_ba->set_kd_d_kontrak_persen(ceil(($val['kd_d_kontrak'])/(($val['kd_d_kontrak'])+($val['kd_d_kontrak_gagal']))*100));
			}

            $data[] = $d_ba;
            //var_dump($this);
        }

        return $data;
    }

    /*
     * mendapatkan Data BA.999 sesuai id
     * @param objek Data BA.999
     * return objek Data BA.999
     */

    public function get_d_ba_by_id($d_ba = DataBa) {
        if (is_null($d_ba->get_kd_d_ba())) {
            return false;
        }
        $sql = "SELECT * FROM " . $this->_table . " WHERE kd_d_ba=" . $d_ba->get_kd_d_ba();
//        var_dump($sql);
        $result = $this->db->select($sql);
        foreach ($result as $val) {
            $d_ba->set_kd_d_ba($val['kd_d_ba']);
            $d_ba->set_kd_d_user($val['kd_d_user']);
            $d_ba->set_kd_d_user_ba($val['kd_d_user_ba']);
            $d_ba->set_kd_d_tgl($val['kd_d_tgl']);
            $d_ba->set_kd_d_spm($val['kd_d_spm']);
            $d_ba->set_kd_d_spm_gagal($val['kd_d_spm_gagal']);
            if (($val['kd_d_spm'])+($val['kd_d_spm_gagal'])==0){
			    $d_ba->set_kd_d_spm_persen(100);
			} else {
			    $d_ba->set_kd_d_spm_persen(ceil(($val['kd_d_spm'])/(($val['kd_d_spm'])+($val['kd_d_spm_gagal']))*100));
			}
            $d_ba->set_kd_d_rekon($val['kd_d_rekon']);
            $d_ba->set_kd_d_rekon_gagal($val['kd_d_rekon_gagal']);
            if (($val['kd_d_rekon'])+($val['kd_d_rekon_gagal'])==0){
			    $d_ba->set_kd_d_rekon_persen(100);
			} else {
			    $d_ba->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
			}
            $d_ba->set_kd_d_kontrak($val['kd_d_kontrak']);
            $d_ba->set_kd_d_kontrak_gagal($val['kd_d_kontrak_gagal']);
            if (($val['kd_d_kontrak'])+($val['kd_d_kontrak_gagal'])==0){
			    $d_ba->set_kd_d_kontrak_persen(100);
			} else {
			    $d_ba->set_kd_d_kontrak_persen(ceil(($val['kd_d_kontrak'])/(($val['kd_d_kontrak'])+($val['kd_d_kontrak_gagal']))*100));
			}
        }
        return $this;
    }

    /*
     * tambah data Data BA.999
     * param array data array key=>value, nama kolom=>data
     */

    public function add_d_ba() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'kd_d_user_ba' => $this->get_kd_d_user_ba(),
            'kd_d_tgl' => $this->get_kd_d_tgl(),
            'kd_d_spm' => $this->get_kd_d_spm(),
            'kd_d_spm_gagal' => $this->get_kd_d_spm_gagal(),
            'kd_d_rekon' => $this->get_kd_d_rekon(),
            'kd_d_rekon_gagal' => $this->get_kd_d_rekon_gagal(),
            'kd_d_kontrak' => $this->get_kd_d_kontrak(),
            'kd_d_kontrak_gagal' => $this->get_kd_d_kontrak_gagal()
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
     * update Data BA.999, id harus di set terlebih dahulu
     * param data array
     */

    public function update_d_ba() {
        $data = array(
            'kd_d_user' => $this->get_kd_d_user(),
            'kd_d_user_ba' => $this->get_kd_d_user_ba(),
            'kd_d_tgl' => $this->get_kd_d_tgl(),
            'kd_d_spm' => $this->get_kd_d_spm(),
            'kd_d_spm_gagal' => $this->get_kd_d_spm_gagal(),
            'kd_d_rekon' => $this->get_kd_d_rekon(),
            'kd_d_rekon_gagal' => $this->get_kd_d_rekon_gagal(),
            'kd_d_kontrak' => $this->get_kd_d_kontrak(),
            'kd_d_kontrak_gagal' => $this->get_kd_d_kontrak_gagal()
        );
        $this->validate();
        if (!$this->get_valid()) {
            return false;
        }
        if (!is_array($data)) {
            return false;
        }
        $where = ' kd_d_ba=' . $this->get_kd_d_ba();
        return $this->db->update($this->_table, $data, $where);
    }

    /*
     * hapus Data BA.999, id harus di set terlebih dahulu
     */

    public function delete_d_ba() {
        $where = ' kd_d_ba=' . $this->get_kd_d_ba();
        $this->db->delete($this->_table, $where);
    }

    /*
     * cek data kosong
     * return pembagi
     */
    public static function getPembagi($obj = DataBa){
        $d_bobot = new DataBobot($obj->registry);
        $bobot = $d_bobot->get_bobot_ba_lvl2();
        $bot = array();
        foreach ($bobot as $val) {
            $r = ($obj->get_kd_d_spm_persen()<0)?0:$val->get_spm_ba();
            $s = ($obj->get_kd_d_rekon_persen()<0)?0:$val->get_rekon_ba();
            $t = ($obj->get_kd_d_kontrak_persen()<0)?0:$val->get_kontrak_ba();
        }

        return $r+$s+$t;
    }

    public function validate() {
        if ($this->get_kd_d_user() == "") {
            $this->_error .= "User belum dipilih!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_user_ba() == "") {
            $this->_error .= "User BA belum dipilih!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_tgl() == "") {
            $this->_error .= "Tangal belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_spm() == "") {
            $this->_error .= "SPM belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_spm_gagal() == "") {
            $this->_error .= "SPM belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_rekon() == "") {
            $this->_error .= "Rekon belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_rekon_gagal() == "") {
            $this->_error .= "Rekon belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_kontrak() == "") {
            $this->_error .= "Kontrak belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_kontrak() == "") {
            $this->_error .= "Kontrak gagal belum diinput!</br>";
            $this->_valid = FALSE;
        }

        /*if($this->is_double_data($this->get_kd_d_user_ba(),$this->get_kd_d_tgl())>0){
            $this->_valid = FALSE;
        }*/
    }

    public function is_double_data($kd_user, $tgl){
        $sql = "SELECT COUNT(*) as hitung FROM ".$this->_table." WHERE kd_d_user_ba=".$kd_user." AND kd_d_tgl='".$tgl."'";
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

    public function set_kd_d_ba($ba) {
        $this->_kd_d_ba = $ba;
    }

    public function set_kd_d_user($user) {
        $this->_kd_d_user = $user;
    }

    public function set_kd_d_user_ba($user_ba) {
        $this->_kd_d_user_ba = $user_ba;
    }

    public function set_kd_d_tgl($tgl) {
        $this->_kd_d_tgl = $tgl;
    }

    public function set_kd_d_spm($spm) {
        $this->_kd_d_spm = $spm;
    }

    public function set_kd_d_spm_gagal($spm_gagal) {
        $this->_kd_d_spm_gagal = $spm_gagal;
    }

    public function set_kd_d_spm_persen($spm_persen) {
        $this->_kd_d_spm_persen = $spm_persen;
    }

    public function set_kd_d_rekon($rekon) {
        $this->_kd_d_rekon = $rekon;
    }

    public function set_kd_d_rekon_gagal($rekon_gagal) {
        $this->_kd_d_rekon_gagal = $rekon_gagal;
    }

    public function set_kd_d_rekon_persen($rekon_persen) {
        $this->_kd_d_rekon_persen = $rekon_persen;
    }

    public function set_kd_d_kontrak($kontrak) {
        $this->_kd_d_kontrak = $kontrak;
    }

    public function set_kd_d_kontrak_gagal($kontrak_gagal) {
        $this->_kd_d_kontrak_gagal = $kontrak_gagal;
    }

    public function set_kd_d_kontrak_persen($kontrak_persen) {
        $this->_kd_d_kontrak_persen = $kontrak_persen;
    }

    public function set_table($table) {
        $this->_table = $table;
    }

    /*
     * getter
     */

    public function get_kd_d_ba($where = null) {
        if (!is_null($where)) {
            $sql = "SELECT kd_d_ba FROM '" . $this->_table . "' WHERE '" . $where . "'";
            $result = $this->db->select($sql);
            foreach ($result as $val) {
                $this->set_kd_d_ba($val['kd_d_ba']);
            }
        }
        return $this->_kd_d_ba;
    }

    public function get_kd_d_user() {
        return $this->_kd_d_user;
    }

    public function get_kd_d_user_ba() {
        return $this->_kd_d_user_ba;
    }

    public function get_kd_d_tgl() {
        return $this->_kd_d_tgl;
    }

    public function get_kd_d_spm() {
        return $this->_kd_d_spm;
    }

    public function get_kd_d_spm_gagal() {
        return $this->_kd_d_spm_gagal;
    }

    public function get_kd_d_spm_persen() {
        return $this->_kd_d_spm_persen;
    }

    public function get_kd_d_rekon() {
        return $this->_kd_d_rekon;
    }

    public function get_kd_d_rekon_gagal() {
        return $this->_kd_d_rekon_gagal;
    }
    
    public function get_kd_d_rekon_persen() {
        return $this->_kd_d_rekon_persen;
    }

    public function get_kd_d_kontrak() {
        return $this->_kd_d_kontrak;
    }

    public function get_kd_d_kontrak_gagal() {
        return $this->_kd_d_kontrak_gagal;
    }

    public function get_kd_d_kontrak_persen() {
        return $this->_kd_d_kontrak_persen;
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