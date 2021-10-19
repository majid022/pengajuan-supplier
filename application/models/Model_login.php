<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {
 
	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	function input_data($data,$tabel){
		$res = $this->db->insert($tabel,$data);
		return $res;
	}
	
}
