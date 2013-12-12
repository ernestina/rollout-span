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
    private $_kd_d_konversi_gagal;
    private $_kd_d_konversi_persen;
    private $_kd_d_sp2d;
    private $_kd_d_sp2d_gagal;
    private $_kd_d_sp2d_persen;
    private $_kd_d_lhp;
    private $_kd_d_lhp_gagal;
    private $_kd_d_rekon;
    private $_kd_d_rekon_gagal;
    private $_kd_d_rekon_persen;
    private $_kd_d_kppn_lvl2;
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

    public function get_d_kppn($kd_user=null, $limit = null, $batas = null) {

        $sql = "SELECT a.* , b.* FROM " . $this->_table . "  a 
                LEFT JOIN " . $this->_t_tetap . " b 
                ON a.kd_d_user = b.kd_d_tetap";
        if(!is_null($kd_user)) $sql .= " WHERE a.kd_d_user=".$kd_user;
        $sql .=  " ORDER BY kd_d_tgl desc";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        
            $data = array();   
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
            $d_kppn->set_kd_d_kppn($val['kd_d_kppn']);
            $d_kppn->set_kd_d_user($val['kd_d_user']);
            $d_kppn->set_kd_d_tgl(date("d/m/y", strtotime($val['kd_d_tgl'])));
            $d_kppn->set_kd_d_konversi($val['kd_d_konversi']);
            $d_kppn->set_kd_d_konversi_gagal($val['kd_d_konversi_gagal']);
            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
            $d_kppn->set_kd_d_sp2d_gagal($val['kd_d_sp2d_gagal']);
            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
            $d_kppn->set_kd_d_lhp($val['kd_d_lhp']);
            $d_kppn->set_kd_d_lhp_gagal($val['kd_d_lhp_gagal']);
            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
            $d_kppn->set_kd_d_rekon($val['kd_d_rekon']);
            $d_kppn->set_kd_d_rekon_gagal($val['kd_d_rekon_gagal']);
            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));

            $data[] = $d_kppn;
            //var_dump($d_kppn);
        }

        return $data;
    }
	
	public function get_d_kppn_lvl1($kd_user=null, $limit = null, $batas = null) {
		$sql="SELECT kd_d_user, substr(nama_user,20) nama_user
				FROM d_user
				WHERE kd_r_jenis = 3";
		if (!is_null($limit) AND !is_null($batas)) {
			$sql .= " LIMIT " . $limit . "," . $batas;
        }
		
		// SELECT 
		// avg(a.kd_d_konversi)/((a.kd_d_konversi)+(a.kd_d_konversi_gagal))*100 as konversi , 
		// avg(a.kd_d_sp2d)/((a.kd_d_sp2d)+(a.kd_d_sp2d_gagal))*100 as sp2d ,
		// avg(a.kd_d_lhp)/((a.kd_d_lhp)+(a.kd_d_lhp_gagal))*100 as lhp ,
		// avg(a.kd_d_rekon)/((a.kd_d_rekon)+(a.kd_d_rekon_gagal))*100 as rekon ,
		// b.kd_d_user, 
		// b.nama_user FROM d_kppn a 
		// LEFT JOIN d_user b 
		// ON a.kd_d_user = b.kd_d_user
		// WHERE (a.kd_d_user between 10000 and 10999 )
		
        
        $result = $this->db->select($sql);
        
        $data = array();   
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
			$kd_d_user = $val['kd_d_user'];
			$plus=$kd_d_user+999;
            $d_kppn->set_kd_d_kppn($val['nama_user']);
            $d_kppn->set_kd_d_user($kd_d_user);
			$sql2="SELECT 
					avg (kd_d_konversi/(kd_d_konversi+kd_d_konversi_gagal)*100) as kd_d_konversi_persen ,
					avg (kd_d_sp2d/(kd_d_sp2d+kd_d_sp2d_gagal)*100) as kd_d_sp2d_persen ,
					avg (kd_d_lhp/(kd_d_lhp+kd_d_lhp_gagal)*100) as kd_d_lhp_persen ,
					avg (kd_d_rekon/(kd_d_rekon+kd_d_rekon_gagal)*100) as kd_d_rekon_persen
					FROM d_kppn
					WHERE (kd_d_user between ".$kd_d_user." and ".$plus." )";
			$result2 = $this->db->select($sql2);
			foreach ($result2 as $val2) {
            $d_kppn->set_kd_d_konversi_persen(ceil($val2['kd_d_konversi_persen']));
			$d_kppn->set_kd_d_sp2d_persen(ceil($val2['kd_d_sp2d_persen']));
			$d_kppn->set_kd_d_lhp_persen(ceil($val2['kd_d_lhp_persen']));
			$d_kppn->set_kd_d_rekon_persen(ceil($val2['kd_d_rekon_persen']));
			}

            $data[] = $d_kppn;
            //var_dump($d_kppn);
        }

        return $data;
    }
	
	public function get_d_kppn_lvl2($kanwil=null, $limit = null, $batas = null) {
		$plus=$kanwil+999;
        $sql = "SELECT 
				a.kd_d_user, 
				substr(b.nama_user,6) nama_user,
				substr(c.nama_user, 20 ) nama_kanwil,
				avg(kd_d_konversi/(kd_d_konversi+kd_d_konversi_gagal)*100) as kd_d_konversi_persen ,
				avg(kd_d_sp2d/(kd_d_sp2d+kd_d_sp2d_gagal)*100) as kd_d_sp2d_persen ,
				avg(kd_d_lhp/(kd_d_lhp+kd_d_lhp_gagal)*100) as kd_d_lhp_persen ,
				avg(kd_d_rekon/(kd_d_rekon+kd_d_rekon_gagal)*100) as kd_d_rekon_persen
				FROM d_kppn a 
				LEFT JOIN d_user b ON a.kd_d_user = b.kd_d_user
				LEFT JOIN d_user c ON c.kd_d_user =".$kanwil."
				WHERE (a.kd_d_user between ".$kanwil." and ".$plus.")
				GROUP BY a.kd_d_user";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        
        $data = array();   
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
            $d_kppn->set_kd_d_kppn($val['nama_user']);
			$d_kppn->set_kd_d_kanwil($val['nama_kanwil']);
            $d_kppn->set_kd_d_user($val['kd_d_user']);
            $d_kppn->set_kd_d_konversi_persen(ceil($val['kd_d_konversi_persen']));
			$d_kppn->set_kd_d_sp2d_persen(ceil($val['kd_d_sp2d_persen']));
			$d_kppn->set_kd_d_lhp_persen(ceil($val['kd_d_lhp_persen']));
			$d_kppn->set_kd_d_rekon_persen(ceil($val['kd_d_rekon_persen']));

            $data[] = $d_kppn;
            //var_dump($d_kppn);
        }

        return $data;
    }
	
	public function get_d_kppn_lvl3($kppn=null, $limit = null, $batas = null) {
        $sql = "SELECT a . * , b.nama_user
				FROM d_kppn a
				LEFT JOIN d_user b ON a.kd_d_user = b.kd_d_user
				WHERE a.kd_d_user =".$kppn." 
				ORDER BY a.kd_d_tgl DESC ";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        
        $data = array();   
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
            $d_kppn->set_kd_d_kppn($val['nama_user']);
            $d_kppn->set_kd_d_user($val['kd_d_user']);
            $d_kppn->set_kd_d_tgl(date("d/m/y", strtotime($val['kd_d_tgl'])));
            $d_kppn->set_kd_d_konversi($val['kd_d_konversi']);
            $d_kppn->set_kd_d_konversi_gagal($val['kd_d_konversi_gagal']);
            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
            $d_kppn->set_kd_d_sp2d_gagal($val['kd_d_sp2d_gagal']);
            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
            $d_kppn->set_kd_d_lhp($val['kd_d_lhp']);
            $d_kppn->set_kd_d_lhp_gagal($val['kd_d_lhp_gagal']);
            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
            $d_kppn->set_kd_d_rekon($val['kd_d_rekon']);
            $d_kppn->set_kd_d_rekon_gagal($val['kd_d_rekon_gagal']);
            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));

            $data[] = $d_kppn;
            //var_dump($d_kppn);
        }

        return $data;
    }

    public function get_d_kppn_per_tgl($kd_user=null, $limit = null, $batas = null) {
        $sql = "SELECT *
                FROM " . $this->_table . "  a";
        if(!is_null($kd_user)) $sql .= " WHERE kd_d_user=".$kd_user;
        $sql .= " GROUP BY kd_d_tgl, kd_d_user";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        
        $data = array();
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
            $d_kppn->set_kd_d_user($val['kd_d_user']);
            $d_kppn->set_kd_d_tgl($val['kd_d_tgl']);
            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
            $data[] = $d_kppn;
            //var_dump($d_kppn);
        }

        return $data;
    }

    /*
     * data seluruh kanwil 
     */

    public function get_d_kanwil(){
        $d_kppn = $this->get_d_kppn();
        $sql = "SELECT kd_d_user, nama_user FROM d_user WHERE kd_r_jenis=3";
        $d_kanwil = $this->db->select($sql);
        $return = array();
        $bobot = new DataBobot($this->registry);
        $bobot = $bobot->get_bobot();
        $k=0;
        $s=0;
        $l=0;
        $r=0;
        foreach ($bobot as $bot) {
            $k=$bot->get_konversi()/100;
            $s=$bot->get_sp2d()/100;
            $l=$bot->get_lhp()/100;
            $r=$bot->get_rekon()/100;
        }
        foreach ($d_kppn as $key => $val) {
            foreach ($d_kanwil as $value) {
                $kd_kppn = (int) $val->get_kd_d_user();
                $kd_kanwil = (int) $value['kd_d_user'];
                $nm_kanwil = $value['nama_user'];
                $is_data = $kd_kppn<=($kd_kanwil+999) && $kd_kppn>$kd_kanwil;
                if($is_data){
                    /*echo $val->get_kd_d_konversi_persen()." ".$val->get_kd_d_sp2d_persen()." ".$val->get_kd_d_lhp_persen()." ".$val->get_kd_d_rekon_persen()." ".
                                    ($val->get_kd_d_konversi_persen()/4 +
                                    $val->get_kd_d_sp2d_persen()/5+
                                    ($val->get_kd_d_lhp_persen()*3/10)+
                                    ($val->get_kd_d_rekon_persen()/4))."--</br>";*/

                    $data_insert = ($k*$val->get_kd_d_konversi_persen() +
                                    $s*$val->get_kd_d_sp2d_persen()+
                                    $l*$val->get_kd_d_lhp_persen()+
                                    $r*$val->get_kd_d_rekon_persen());
                    if(array_key_exists($kd_kanwil, $return)){
                        $tmp_value = $return[$kd_kanwil]['sum']*$return[$kd_kanwil]['sum'];
                        $tmp_konversi = $return[$kd_kanwil]['konversi']*$return[$kd_kanwil]['sum'];
                        $tmp_sp2d = $return[$kd_kanwil]['sp2d']*$return[$kd_kanwil]['sum'];
                        $tmp_lhp = $return[$kd_kanwil]['lhp']*$return[$kd_kanwil]['sum'];
                        $tmp_rekon = $return[$kd_kanwil]['rekon']*$return[$kd_kanwil]['sum'];
                        $return[$kd_kanwil]['jml_data']++;
                        $return[$kd_kanwil]['konversi'] = ($tmp_konversi+$val->get_kd_d_konversi_persen())/$return[$kd_kanwil]['sum'];
                        $return[$kd_kanwil]['sp2d'] = ($tmp_sp2d+$val->get_kd_d_sp2d_persen())/$return[$kd_kanwil]['sum'];
                        $return[$kd_kanwil]['lhp'] = ($tmp_lhp+$val->get_kd_d_lhp_persen())/$return[$kd_kanwil]['sum'];
                        $return[$kd_kanwil]['rekon'] = ($tmp_rekon+$val->get_kd_d_rekon_persen())/$return[$kd_kanwil]['sum'];
                        $return[$kd_kanwil]['sum'] = ($tmp_value+$data_insert)/$return[$kd_kanwil]['sum'];
                    }else{
                        $tmp = explode(" ", $nm_kanwil);
                        $len = count($tmp);
                        $singkat_kanwil = $tmp[$len-1];
                        $return[$kd_kanwil] = array();
                        $return[$kd_kanwil]['jml_data'] = 1;
                        $return[$kd_kanwil]['nm_kanwil'] = $nm_kanwil;
                        $return[$kd_kanwil]['singkat_kanwil'] = $singkat_kanwil;
                        $return[$kd_kanwil]['konversi'] = $val->get_kd_d_konversi_persen();
                        $return[$kd_kanwil]['sp2d'] = $val->get_kd_d_sp2d_persen();
                        $return[$kd_kanwil]['lhp'] = $val->get_kd_d_lhp_persen();
                        $return[$kd_kanwil]['rekon'] = $val->get_kd_d_rekon_persen();
                        $return[$kd_kanwil]['sum'] = $data_insert;
                    }
                }
            }
        }

        /*
         * menghapus data pertama tiap array data yg berisi data pembagi
         */
        foreach ($return as $key => $value) {
            $tmp = array_shift($return[$key]);
        }
        return $return;
    }

    public function get_d_kppn_jkt2($limit = null, $batas = null) {
        $sql = "SELECT a.* , b.* FROM " . $this->_table . "  a 
                LEFT JOIN " . $this->_t_tetap . " b 
                ON a.kd_d_user = b.kd_d_tetap where a.kd_d_user = 10002 ORDER BY kd_d_tgl desc";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
            $d_kppn->set_kd_d_kppn($val['kd_d_kppn']);
            $d_kppn->set_kd_d_user($val['kd_r_unit']);
            $d_kppn->set_kd_d_tgl(date("d/m/y", strtotime($val['kd_d_tgl'])));
            $d_kppn->set_kd_d_konversi($val['kd_d_konversi']);
            $d_kppn->set_kd_d_konversi_gagal($val['kd_d_konversi_gagal']);
            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
            $d_kppn->set_kd_d_sp2d_gagal($val['kd_d_sp2d_gagal']);
            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
            $d_kppn->set_kd_d_lhp($val['kd_d_lhp']);
            $d_kppn->set_kd_d_lhp_gagal($val['kd_d_lhp_gagal']);
            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
            $d_kppn->set_kd_d_rekon($val['kd_d_rekon']);
            $d_kppn->set_kd_d_rekon_gagal($val['kd_d_rekon_gagal']);
            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));

            $data[] = $d_kppn;
            //var_dump($d_kppn);
        }

        return $data;
    }

    public function get_d_kppn_per_tgl_jkt2($limit = null, $batas = null) {
        $sql = "SELECT *
                FROM " . $this->_table . "  a  where a.kd_d_user = 10002
                GROUP BY kd_d_tgl";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
            $d_kppn->set_kd_d_tgl($val['kd_d_tgl']);
            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
            $data[] = $d_kppn;
            //var_dump($d_kppn);
        }

        return $data;
    }

    public function get_d_kppn_jkt6($limit = null, $batas = null) {
        $sql = "SELECT a.* , b.* FROM " . $this->_table . "  a 
                LEFT JOIN " . $this->_t_tetap . " b 
                ON a.kd_d_user = b.kd_d_tetap where a.kd_d_user = 10006 ORDER BY kd_d_tgl desc";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
            $d_kppn->set_kd_d_kppn($val['kd_d_kppn']);
            $d_kppn->set_kd_d_user($val['kd_r_unit']);
            $d_kppn->set_kd_d_tgl(date("d/m/y", strtotime($val['kd_d_tgl'])));
            $d_kppn->set_kd_d_konversi($val['kd_d_konversi']);
            $d_kppn->set_kd_d_konversi_gagal($val['kd_d_konversi_gagal']);
            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
            $d_kppn->set_kd_d_sp2d_gagal($val['kd_d_sp2d_gagal']);
            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
            $d_kppn->set_kd_d_lhp($val['kd_d_lhp']);
            $d_kppn->set_kd_d_lhp_gagal($val['kd_d_lhp_gagal']);
            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
            $d_kppn->set_kd_d_rekon($val['kd_d_rekon']);
            $d_kppn->set_kd_d_rekon_gagal($val['kd_d_rekon_gagal']);
            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));

            $data[] = $d_kppn;
            //var_dump($d_kppn);
        }

        return $data;
    }

    public function get_d_kppn_per_tgl_jkt6($limit = null, $batas = null) {
        $sql = "SELECT *
                FROM " . $this->_table . "  a  where a.kd_d_user = 10006
                GROUP BY kd_d_tgl";
        if (!is_null($limit) AND !is_null($batas)) {
            $sql .= " LIMIT " . $limit . "," . $batas;
        }
        $result = $this->db->select($sql);
        $data = array();
        foreach ($result as $val) {
            $d_kppn = new $this($this->registry);
            $d_kppn->set_kd_d_tgl($val['kd_d_tgl']);
            $d_kppn->set_kd_d_konversi_persen(ceil(($val['kd_d_konversi'])/(($val['kd_d_konversi'])+($val['kd_d_konversi_gagal']))*100));
            $d_kppn->set_kd_d_sp2d_persen(ceil(($val['kd_d_sp2d'])/(($val['kd_d_sp2d'])+($val['kd_d_sp2d_gagal']))*100));
            $d_kppn->set_kd_d_lhp_persen(ceil(($val['kd_d_lhp'])/(($val['kd_d_lhp'])+($val['kd_d_lhp_gagal']))*100));
            $d_kppn->set_kd_d_rekon_persen(ceil(($val['kd_d_rekon'])/(($val['kd_d_rekon'])+($val['kd_d_rekon_gagal']))*100));
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
            $d_kppn->set_kd_d_user($val['kd_d_user']);
            $d_kppn->set_kd_d_kppn($val['kd_d_kppn']);
            $d_kppn->set_kd_d_user($val['kd_r_unit']);
            $d_kppn->set_kd_d_tgl($val['kd_d_tgl']);
            $d_kppn->set_kd_d_konversi($val['kd_d_konversi']);
            $d_kppn->set_kd_d_konversi_gagal($val['kd_d_konversi_gagal']);
            $d_kppn->set_kd_d_sp2d($val['kd_d_sp2d']);
            $d_kppn->set_kd_d_sp2d_gagal($val['kd_d_sp2d_gagal']);
            $d_kppn->set_kd_d_lhp($val['kd_d_lhp']);
            $d_kppn->set_kd_d_lhp_gagal($val['kd_d_lhp_gagal']);
            $d_kppn->set_kd_d_rekon($val['kd_d_rekon']);
            $d_kppn->set_kd_d_rekon_gagal($val['kd_d_rekon_gagal']);
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
            'kd_d_konversi_gagal' => $this->get_kd_d_konversi_gagal(),
            'kd_d_sp2d' => $this->get_kd_d_sp2d(),
            'kd_d_sp2d_gagal' => $this->get_kd_d_sp2d_gagal(),
            'kd_d_lhp' => $this->get_kd_d_lhp(),
            'kd_d_lhp_gagal' => $this->get_kd_d_lhp_gagal(),
            'kd_d_rekon' => $this->get_kd_d_rekon(),
            'kd_d_rekon_gagal' => $this->get_kd_d_rekon_gagal(),
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
            'kd_d_konversi_gagal' => $this->get_kd_d_konversi_gagal(),
            'kd_d_sp2d' => $this->get_kd_d_sp2d(),
            'kd_d_sp2d_gagal' => $this->get_kd_d_sp2d_gagal(),
            'kd_d_lhp' => $this->get_kd_d_lhp(),
            'kd_d_lhp_gagal' => $this->get_kd_d_lhp_gagal(),
            'kd_d_rekon' => $this->get_kd_d_rekon(),
            'kd_d_rekon_gagal' => $this->get_kd_d_rekon_gagal(),
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
        if ($this->get_kd_d_user() == "") {
            $this->_error .= "User belum dipilih!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_tgl() == "") {
            $this->_error .= "Tangal belum diinput!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_konversi() == "") {
            $this->_error .= "Konversi belum diinput!<?br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_konversi_gagal() == "") {
            $this->_error .= "Konversi belum diinput!<?br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_sp2d() == "") {
            $this->_error .= "SP2D belum dipilih!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_sp2d_gagal() == "") {
            $this->_error .= "SP2D belum dipilih!</br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_lhp() == "") {
            $this->_error .= "LHP belum diinput!<?br>";
            $this->_valid = FALSE;
        }
        if ($this->get_kd_d_lhp_gagal() == "") {
            $this->_error .= "LHP belum diinput!<?br>";
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
    }

    /*
     * setter
     */

    public function set_kd_d_kppn($kppn) {
        $this->_kd_d_kppn = $kppn;
    }

    public function set_kd_d_kanwil($kanwil) {
        $this->_kd_d_kanwil = $kanwil;
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

    public function set_kd_d_konversi_gagal($konversi_gagal) {
        $this->_kd_d_konversi_gagal = $konversi_gagal;
    }
    
    public function set_kd_d_konversi_persen($konversi_persen) {
        $this->_kd_d_konversi_persen = $konversi_persen;
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

    public function set_kd_d_lhp($lhp) {
        $this->_kd_d_lhp = $lhp;
    }

    public function set_kd_d_lhp_gagal($lhp_gagal) {
        $this->_kd_d_lhp_gagal = $lhp_gagal;
    }
    
    public function set_kd_d_lhp_persen($lhp_persen) {
        $this->_kd_d_lhp_persen = $lhp_persen;
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
	public function get_kd_d_kanwil() {
        return $this->_kd_d_kanwil;
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

    public function get_kd_d_konversi_gagal() {
        return $this->_kd_d_konversi_gagal;
    }
    
    public function get_kd_d_konversi_persen() {
        return $this->_kd_d_konversi_persen;
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

    public function get_kd_d_lhp() {
        return $this->_kd_d_lhp;
    }

    public function get_kd_d_lhp_gagal() {
        return $this->_kd_d_lhp_gagal;
    }
    
    public function get_kd_d_lhp_persen() {
        return $this->_kd_d_lhp_persen;
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
