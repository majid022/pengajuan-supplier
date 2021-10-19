<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {

    var $table = 'tb_produk';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function tampil_data($table){
        return $this->db->get($table)->result();
    }

    public function get_by_id($id_produk) {
        $this->db->from($this->table);
        $this->db->where('id_produk', $id_produk);
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

    public function delete_by_id($id_produk) {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete($this->table);
    }
     public function delete_by($id_daftar) {
        $this->db->where('id_daftar', $id_daftar);
        $this->db->delete('tb_daftar_kelas');
    }
}
