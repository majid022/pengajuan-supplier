<?php
	class Model_item extends CI_Model{

		function tampil_data($table){
			return $this->db->get($table)->result();
		}
		function tampil_item($table){
			$this->db->order_by('id_item','asc');
			return $this->db->get($table)->result();
		}
		function tampil_user($table){
			$this->db->order_by('id_user','asc');
			return $this->db->get($table)->result();
		}
		function input_data($data,$tabel){
			$res = $this->db->insert($tabel,$data);
			return $res;
		}
		function edit_data($where,$tabel){
			return $this->db->get_where($tabel,$where);
		}
		function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
		function hapus_data($where,$tabel){
			$this->db->where($where);
			$this->db->delete($tabel);
		}
		function tampil_pengajuan($id_user){
			$this->db->from('tb_item');
			$this->db->join('tb_user','tb_user.id_user=tb_item.user_id');
			$this->db->join('tb_account','tb_account.kode_account=tb_item.des_coa');
			$this->db->where($id_user);
			return $this->db->get()->result();
		}
		function tampil_app_item(){
			$this->db->from('tb_approved_item');
			$this->db->join('tb_user','tb_user.id_user=tb_approved_item.user_id');
			$this->db->order_by('id_app_item','asc');
			return $this->db->get()->result();
		}
		function tampil_approval($id_user){
			$this->db->from('tb_approved_item');
			$this->db->join('tb_user','tb_user.id_user=tb_approved_item.user_id');
			$this->db->order_by('id_app_item','asc');
			$this->db->where($id_user);
			return $this->db->get()->result();
		}
		public function delete_by_id($id_item) {
	        $this->db->where('id_item', $id_item);
	        $this->db->delete('tb_item');
	    }
	    public function delete_item($id_app_item) {
	        $this->db->where('id_app_item', $id_app_item);
	        $this->db->delete('tb_approved_item');
	    }
	     public function delete_user($id_user) {
	        $this->db->where('id_user', $id_user);
	        $this->db->delete('tb_user');
	    }
	    function cetak_excel(){
			$this->db->from('tb_item');
			$this->db->where('status=1');
			return $this->db->get();
		}
		function cetak_multivel($where){
			$this->db->from('tb_item');
			$this->db->join('tb_account','tb_account.kode_account=tb_item.des_coa');
			$this->db->where('status=1');
			$this->db->where($where);
			return $this->db->get();
		}
	}
?>