<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    var $table = 'tb_company';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function tampil_data($table){
        return $this->db->get($table)->result();
    }

    public function get_by_id($id_company) {
        $this->db->from($this->table);
        $this->db->where('id_company', $id_company);
        $query = $this->db->get();

        return $query->row();
    }

    public function add($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id_company) {
        $this->db->where('id_company', $id_company);
        $this->db->delete($this->table);
    }
     public function delete_by($id_daftar) {
        $this->db->where('id_daftar', $id_daftar);
        $this->db->delete('tb_daftar_kelas');
    }
    function jumlah_data($user_id,$table){
        $this->db->from($table);
        $this->db->where('status=1');
        $this->db->where($user_id);

        return $this->db->get()->num_rows();
    }
     function jumlah_data_tidak($user_id,$table){
        $this->db->from($table);
        $this->db->where('status=2');
        $this->db->where($user_id);

        return $this->db->get()->num_rows();
    }
     function jumlah_progres($user_id,$table){
        $this->db->from($table);
        $this->db->where('status=0');
        $this->db->where($user_id);

        return $this->db->get()->num_rows();
    }
     function jumlah_data_approval($user_id,$table){
        $this->db->from($table);
        $this->db->where('status1=1');
        $this->db->where($user_id);

        return $this->db->get()->num_rows();
    }
     function jumlah_data_approval_tidak($user_id,$table){
        $this->db->from($table);
        $this->db->where('status1=0');
        $this->db->where($user_id);

        return $this->db->get()->num_rows();
    }
}
