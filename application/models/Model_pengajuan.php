<?php
class Model_pengajuan extends CI_Model
{
	function tampil_data($table)
	{
		return $this->db->get($table)->result();
	}
	function cetak_excel()
	{
		$this->db->from('tb_pengajuan');
		$this->db->join('tb_kategori', 'tb_kategori.alternate=tb_pengajuan.kategori');
		$this->db->where('status=1');
		return $this->db->get();
	}
	function cetak_multipel($where)
	{
		$this->db->from('tb_pengajuan');
		$this->db->join('tb_kategori', 'tb_kategori.alternate=tb_pengajuan.kategori');
		$this->db->where('status=1');
		$this->db->where($where);
		return $this->db->get();
	}
	function pengajuan()
	{
		$this->db->from('tb_pengajuan');
		$this->db->join('tb_kategori', 'tb_kategori.alternate=tb_pengajuan.kategori');
		$this->db->join('tb_usaha', 'tb_usaha.kode_usaha=tb_pengajuan.usaha');
		$this->db->order_by('id_pengajuan', 'asc');
		$this->db->where(['status' => 0]);
		// $this->db->or_where(['status_finance' => 0]);
		// $this->db->or_where(['status_procurement' => 0]);
		return $this->db->get();
	}
	function tampil_app_supplier()
	{
		$sess = $this->session->userdata('akses');
		if ($sess == 'shp') {
			$wh = 1;
		} else {
			$wh = 0;
		}
		$this->db->from('tb_approved_supplier');
		$this->db->join('tb_user', 'tb_user.id_user=tb_approved_supplier.user_id');
		$this->db->where('status', $wh);
		$this->db->order_by('id_app_sup', 'asc');
		return $this->db->get()->result();
	}
	function input_data($data, $tabel)
	{
		$res = $this->db->insert($tabel, $data);
		return $res;
	}
	function edit_data($where, $tabel)
	{
		return $this->db->get_where($tabel, $where);
	}
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);

		$this->db->from('tb_pengajuan');
		$this->db->join('tb_user', 'tb_user.id_user=tb_pengajuan.user_id');
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function hapus_data($where, $tabel)
	{
		$this->db->where($where);
		$this->db->delete($tabel);
	}
	function tampil_pengajuan($id_user)
	{
		$this->db->from('tb_pengajuan');
		$this->db->join('tb_user', 'tb_user.id_user=tb_pengajuan.user_id');
		$this->db->join('tb_kategori', 'tb_kategori.alternate=tb_pengajuan.kategori');
		$this->db->join('tb_usaha', 'tb_usaha.kode_usaha=tb_pengajuan.usaha');
		$this->db->order_by('id_pengajuan', 'asc');
		$this->db->where($id_user);
		return $this->db->get()->result();
	}

	function waiting($id_user)
	{
		$this->db->from('tb_pengajuan');
		$this->db->join('tb_user', 'tb_user.id_user=tb_pengajuan.user_id');
		$this->db->join('tb_kategori', 'tb_kategori.alternate=tb_pengajuan.kategori');
		$this->db->join('tb_usaha', 'tb_usaha.kode_usaha=tb_pengajuan.usaha');
		$this->db->order_by('id_pengajuan', 'asc');
		$this->db->where($id_user);
		$this->db->where(['status' => 0]);
		$this->db->or_where(['status_finance' => 0]);
		$this->db->or_where(['status_procurement' => 0]);
		return $this->db->get()->result();
	}

	function tampil_approval($id_user)
	{
		$this->db->from('tb_pengajuan');
		$this->db->join('tb_user', 'tb_user.id_user=tb_pengajuan.user_id');
		$this->db->order_by('tgl_pembuatan', 'asc');
		$this->db->where($id_user);
		return $this->db->get()->result();
	}

	function hasApprove($id_user = null)
	{
		$this->db->from('tb_pengajuan');
		$this->db->join('tb_user', 'tb_user.id_user=tb_pengajuan.user_id');
		$this->db->join('tb_kategori', 'tb_kategori.alternate=tb_pengajuan.kategori');
		$this->db->order_by('tgl_pembuatan', 'asc');
		if (!is_null($id_user)) {
			$this->db->where(['id_user' => $id_user]);
		}
		$this->db->where(['status' => 1, 'status_finance' => 1, 'status_procurement' => 1]);
		return $this->db->get()->result();
	}

	function hasApproveByAdmin($id_user = null)
	{
		$this->db->from('tb_pengajuan');
		$this->db->join('tb_user', 'tb_user.id_user=tb_pengajuan.user_id');
		$this->db->join('tb_kategori', 'tb_kategori.alternate=tb_pengajuan.kategori');
		$this->db->order_by('tgl_pembuatan', 'asc');
		if (!is_null($id_user)) {
			$this->db->where(['id_user' => $id_user]);
		}
		$this->db->where(['status' => 1]);
		$this->db->or_where(['status' => 2]);
		return $this->db->get()->result();
	}

	public function delete_by_id($id_pengajuan)
	{
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->delete('tb_pengajuan');
	}
	public function delete_suplier($id_app_sup)
	{
		$this->db->where('id_app_sup', $id_app_sup);
		$this->db->delete('tb_approved_supplier');
	}
	function pemberitahuan_pengajuan_baru()
	{

		return $this->db->query("SELECT * from tb_pengajuan where notif='0' ")->num_rows();
	}
	public function ubah_notif_pengajuan($where, $data)
	{
		$this->db->update('tb_pengajuan', $data, $where);
		return $this->db->affected_rows();
	}
	function jumlah_data($table)
	{
		$this->db->from($table);
		$this->db->where('status=1');

		return $this->db->get()->num_rows();
	}
	function jumlah_data_tidak($table)
	{
		$this->db->from($table);
		$this->db->where('status=2');

		return $this->db->get()->num_rows();
	}
	function jumlah_progres($table)
	{
		$this->db->from($table);
		$this->db->where('status=0');

		return $this->db->get()->num_rows();
	}
	function jumlah_data_approval($table)
	{
		$this->db->from($table);
		$this->db->where('status1=1');

		return $this->db->get()->num_rows();
	}
	function jumlah_data_approval_tidak($table)
	{
		$this->db->from($table);
		$this->db->where('status1=0');

		return $this->db->get()->num_rows();
	}
	function jumlah_user($table)
	{
		$this->db->from($table);
		$this->db->where('aktif=1');

		return $this->db->get()->num_rows();
	}
	function jumlah_tidak_aktif($table)
	{
		$this->db->from($table);
		$this->db->where('aktif=0');

		return $this->db->get()->num_rows();
	}

	public function all($tableName, $condition)
	{
		$this->db->join('tb_kategori', 'tb_kategori.alternate=tb_pengajuan.kategori');
		return $this->db->get_where($tableName, $condition)->result();
	}

	public function detailSuplier($table, $condition)
	{
		$this->db->from($table);
		$this->db->join('tb_kategori', 'tb_kategori.alternate=tb_pengajuan.kategori');
		$this->db->where($condition);
		return $this->db->get()->row();
	}

	public function db()
	{
		return $this->db;
	}
}
