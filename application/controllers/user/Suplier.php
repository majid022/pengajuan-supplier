<?php

class Suplier extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_pengajuan');
 		$this->load->model('Model_item');
 		if ($this->session->userdata('status') != 'login') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Pengajuan Supplier';
 		$par_id = $this->session->userdata("id_user");
		$id_user = array('id_user'=> $par_id);
		$data['suplier'] = $this->Model_pengajuan->waiting($id_user);
 		$this->template->view('user/view_suplier',$data);
 	}
 	function tambah_suplier(){
 		$data['lisa']['title_h']        = 'Tambah Data Pengajuan Supplier';
 		$data['sbu']					= $this->Model_pengajuan->tampil_data('tb_sbu');
 		$data['kategori']				= $this->Model_pengajuan->tampil_data('tb_kategori');
 		$data['company']				= $this->Model_pengajuan->tampil_data('tb_company');
 		$data['produk']					= $this->Model_pengajuan->tampil_data('tb_produk');
 		$data['location']				= $this->Model_pengajuan->tampil_data('tb_location');
 		$data['departement']			= $this->Model_pengajuan->tampil_data('tb_departement');
 		$data['project']				= $this->Model_pengajuan->tampil_data('tb_project');
 		$data['future']					= $this->Model_pengajuan->tampil_data('tb_future');
 		$data['intercompany']			= $this->Model_pengajuan->tampil_data('tb_intercompany');
 		$data['account']				= $this->Model_pengajuan->tampil_data('tb_account');
 		$data['usaha']				    = $this->Model_pengajuan->tampil_data('tb_usaha');

 		
 		$this->template->view('user/view_tambah_suplier',$data);
 	}

 	function aksi_tambah(){
 		$user_id			= $this->session->userdata('id_user');
 		$nama_requester		= $this->input->post('nama_requester');
 		$asal_sbu			= $this->input->post('asal_sbu');
 		$tgl_pembuatan		= $this->input->post('tgl_pengajuan');
 		$sign1				= $this->input->post('sign1');
 		$sign2				= $this->input->post('sign2');
 		$sign3				= $this->input->post('sign3');
 		$pos1				= $this->input->post('pos1');
 		$pos2				= $this->input->post('pos2');
 		$pos3				= $this->input->post('pos3');
 		$sig1				= $this->input->post('sig1');
 		$sig2				= $this->input->post('sig2');
 		$sig3				= $this->input->post('sig3');
 		$dos1				= $this->input->post('dos1');
 		$dos2				= $this->input->post('dos2');
 		$dos3				= $this->input->post('dos3');
 		$kategori			= $this->input->post('kategori');
 		$alternate			= $this->input->post('alternate');
 		$usaha				= $this->input->post('usaha');
 		$kode_usaha			= $this->input->post('kode_usaha');
 		$nama_suplier		= $this->input->post('nama_suplier');
 		$nomor_ktp			= $this->input->post('nomor_ktp');
 		$nomor_npwp			= $this->input->post('nomor_npwp');
 		$alamat				= $this->input->post('alamat');
 		$nama_gedung		= $this->input->post('nama_gedung');
 		$nama_jalan			= $this->input->post('nama_jalan');
 		$kel				= $this->input->post('kel');
 		$kec				= $this->input->post('kec');
 		$kota				= $this->input->post('kota');
 		$kode_pos			= $this->input->post('kode_pos');
 		$nama_kontak		= $this->input->post('nama_kontak');
 		$nomor_kantor		= $this->input->post('nomor_kantor');
 		$nomor_ktp			= $this->input->post('nomor_ktp');
 		$nomor_npwp			= $this->input->post('nomor_npwp');
 		$nomor_hanphone	   = $this->input->post('nomor_hanphone');
 		$email				= $this->input->post('email');
 		$company			= $this->input->post('company');
 		$produk				= $this->input->post('produk');
 		$location			= $this->input->post('location');
 		$departement		= $this->input->post('departement');
 		$account			= $this->input->post('account');
 		$project			= $this->input->post('project');
 		$intercompany		= $this->input->post('intercompany');
 		$future				= $this->input->post('future');
 		$nomor_liability	= $this->input->post('liability');

 		
				$data  = array(
					'user_id'			=> $user_id,
					'nama_requester'	=> $nama_requester,
					'asal_sbu'			=> $asal_sbu,
					'tgl_pembuatan'		=> $tgl_pembuatan,
					'sign1'				=> $sign1,
					'sign2'				=> $sign2,
					'sign3'				=> $sign3,
					'pos1'				=> $pos1,
					'pos2'				=> $pos2,
					'pos3'				=> $pos3,
					'sig1'				=> $sig1,
					'sig2'				=> $sig2,
					'sig3'				=> $sig3,
					'dos1'				=> $dos1,
					'dos2'				=> $dos2,
					'dos3'				=> $dos3,
					'kategori'			=> $kategori,
					'alternate'			=> $alternate,
					'usaha'				=> $usaha,
					'kode_usaha'		=> $kode_usaha,
					'nama_suplier'		=> $nama_suplier,
					'nomor_ktp'			=> $nomor_ktp,
					'nomor_npwp'		=> $nomor_npwp,
					'alamat'			=> $alamat,
					'nama_gedung'		=> $nama_gedung,
					'nama_jalan'		=> $nama_jalan,
					'kel'				=> $kel,
					'kec'				=> $kec,
					'kota'				=> $kota,
					'kode_pos'			=> $kode_pos,
					'nama_kontak'		=> $nama_kontak,
					'nomor_kantor'		=> $nomor_kantor,
					'nomor_handphone'	=> $nomor_hanphone,
					'email'				=> $email,
					'company'			=> $company,
					'produk'			=> $produk,
					'location'			=> $location,
					'departement'		=> $departement,
					'account'			=> $account,
					'project'			=> $project,
					'intercompany'		=> $intercompany,
					'future'			=> $future,
					'nomor_liability'	=> $nomor_liability,
					'status'			=> '0',
					'notif'				=> '1',
				);
	
		$cek = $this->Model_pengajuan->input_data($data,'tb_pengajuan');
		if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data pengajuan supplier telah ditambahkan
                            </div>');
			redirect('user/suplier');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data pengajuan supplier tidak berhasil ditambahkan
                            </div>');
			redirect('user/suplier');
		}
			
 	}

 	function get_alternate($kategori){
 		$where = array(
 			'alternate' => $kategori,
 		);

 		$data = $this->Model_pengajuan->edit_data($where,'tb_kategori')->row();
 		if(is_null($data)){
 			$respon = ['execute' => false, 'message' => 'Data Tidak Ditemuka'];
 		}else{
 			$respon = ['execute' => true, 'message' => $data];
 		}
 		echo json_encode(['respon' => $respon]);
 	}
 	function get_usaha($usaha){
 		$where = array(
 			'kode_usaha' => $usaha,
 		);

 		$data = $this->Model_pengajuan->edit_data($where,'tb_usaha')->row();
 		if(is_null($data)){
 			$respon = ['execute' => false, 'message' => 'Data Tidak Ditemuka'];
 		}else{
 			$respon = ['execute' => true, 'message' => $data];
 		}
 		echo json_encode(['respon' => $respon]);
 	}
 	function get_company($nama_company){
 		$where = array(
 			'kode_company' => $nama_company,
 		);

 		$data = $this->Model_pengajuan->edit_data($where,'tb_company')->row();
 		if(is_null($data)){
 			$respon = ['execute' => false, 'message' => 'Data Tidak Ditemuka'];
 		}else{
 			$respon = ['execute' => true, 'message' => $data];
 		}
 		echo json_encode(['respon' => $respon]);
 	}
 	function get_produk($nama_produk){
 		$where = array(
 			'kode_produk' => $nama_produk,
 		);

 		$data = $this->Model_pengajuan->edit_data($where,'tb_produk')->row();
 		if(is_null($data)){
 			$respon = ['execute' => false, 'message' => 'Data Tidak Ditemuka'];
 		}else{
 			$respon = ['execute' => true, 'message' => $data];
 		}
 		echo json_encode(['respon' => $respon]);
 	}
 	function get_location($nama_location){
 		$where = array(
 			'kode_location' => $nama_location,
 		);

 		$data = $this->Model_pengajuan->edit_data($where,'tb_location')->row();
 		if(is_null($data)){
 			$respon = ['execute' => false, 'message' => 'Data Tidak Ditemuka'];
 		}else{
 			$respon = ['execute' => true, 'message' => $data];
 		}
 		echo json_encode(['respon' => $respon]);
 	}
 	function get_departement($nama_departement){
 		$where = array(
 			'kode_departement' => $nama_departement,
 		);

 		$data = $this->Model_pengajuan->edit_data($where,'tb_departement')->row();
 		if(is_null($data)){
 			$respon = ['execute' => false, 'message' => 'Data Tidak Ditemuka'];
 		}else{
 			$respon = ['execute' => true, 'message' => $data];
 		}
 		echo json_encode(['respon' => $respon]);
 	}
 	function get_account($nama_account){
 		$where = array(
 			'kode_account' => $nama_account,
 		);

 		$data = $this->Model_pengajuan->edit_data($where,'tb_account')->row();
 		if(is_null($data)){
 			$respon = ['execute' => false, 'message' => 'Data Tidak Ditemuka'];
 		}else{
 			$respon = ['execute' => true, 'message' => $data];
 		}
 		echo json_encode(['respon' => $respon]);
 	}
 	function get_project($nama_project){
 		$where = array(
 			'kode_project' => $nama_project,
 		);

 		$data = $this->Model_pengajuan->edit_data($where,'tb_project')->row();
 		if(is_null($data)){
 			$respon = ['execute' => false, 'message' => 'Data Tidak Ditemuka'];
 		}else{
 			$respon = ['execute' => true, 'message' => $data];
 		}
 		echo json_encode(['respon' => $respon]);
 	}
 	function get_intercompany($nama_intercompany){
 		$where = array(
 			'kode_intercompany' => $nama_intercompany,
 		);

 		$data = $this->Model_pengajuan->edit_data($where,'tb_intercompany')->row();
 		if(is_null($data)){
 			$respon = ['execute' => false, 'message' => 'Data Tidak Ditemuka'];
 		}else{
 			$respon = ['execute' => true, 'message' => $data];
 		}
 		echo json_encode(['respon' => $respon]);
 	}
 	function get_future($nama_future){
 		$where = array(
 			'kode_future' => $nama_future,
 		);

 		$data = $this->Model_pengajuan->edit_data($where,'tb_future')->row();
 		if(is_null($data)){
 			$respon = ['execute' => false, 'message' => 'Data Tidak Ditemuka'];
 		}else{
 			$respon = ['execute' => true, 'message' => $data];
 		}
 		echo json_encode(['respon' => $respon]);
 	}
 	public function hapus($id_pengajuan){
        $id_pengajuan = $this->input->post('id_pengajuan');
        $this->Model_pengajuan->delete_by_id($id_pengajuan);
    }
    function edit_suplier($id_pengajuan){
 		$data['lisa']['title_h']        = 'Tambah Data Pengajuan Supplier';
 		$data['sbu']					= $this->Model_pengajuan->tampil_data('tb_sbu');
 		$data['kategori']				= $this->Model_pengajuan->tampil_data('tb_kategori');
 		$data['company']				= $this->Model_pengajuan->tampil_data('tb_company');
 		$data['produk']					= $this->Model_pengajuan->tampil_data('tb_produk');
 		$data['location']				= $this->Model_pengajuan->tampil_data('tb_location');
 		$data['departement']			= $this->Model_pengajuan->tampil_data('tb_departement');
 		$data['project']				= $this->Model_pengajuan->tampil_data('tb_project');
 		$data['future']					= $this->Model_pengajuan->tampil_data('tb_future');
 		$data['intercompany']			= $this->Model_pengajuan->tampil_data('tb_intercompany');
 		$data['account']				= $this->Model_pengajuan->tampil_data('tb_account');
 		$data['usaha']				    = $this->Model_pengajuan->tampil_data('tb_usaha');
 		$where = array(
				'id_pengajuan' => $id_pengajuan
		);

		$data['sup'] = $this->Model_pengajuan->edit_data($where,'tb_pengajuan')->row();
 		
 		$this->template->view('user/view_edit_supplier',$data);
 	}
 	function aksi_update(){
 		$id_pengajuan		= $this->input->post('id_pengajuan');
 		$user_id			= $this->session->userdata('id_user');
 		$nama_requester		= $this->input->post('nama_requester');
 		$asal_sbu			= $this->input->post('asal_sbu');
 		$tgl_pembuatan		= $this->input->post('tgl_pengajuan');
 		$sign1				= $this->input->post('sign1');
 		$sign2				= $this->input->post('sign2');
 		$sign3				= $this->input->post('sign3');
 		$pos1				= $this->input->post('pos1');
 		$pos2				= $this->input->post('pos2');
 		$pos3				= $this->input->post('pos3');
 		$sig1				= $this->input->post('sig1');
 		$sig2				= $this->input->post('sig2');
 		$sig3				= $this->input->post('sig3');
 		$dos1				= $this->input->post('dos1');
 		$dos2				= $this->input->post('dos2');
 		$dos3				= $this->input->post('dos3');
 		$kategori			= $this->input->post('kategori');
 		$alternate			= $this->input->post('alternate');
 		$usaha				= $this->input->post('usaha');
 		$kode_usaha			= $this->input->post('kode_usaha');
 		$nama_suplier		= $this->input->post('nama_suplier');
 		$nomor_ktp			= $this->input->post('nomor_ktp');
 		$nomor_npwp			= $this->input->post('nomor_npwp');
 		$alamat				= $this->input->post('alamat');
 		$nama_gedung		= $this->input->post('nama_gedung');
 		$nama_jalan			= $this->input->post('nama_jalan');
 		$kel				= $this->input->post('kel');
 		$kec				= $this->input->post('kec');
 		$kota				= $this->input->post('kota');
 		$kode_pos			= $this->input->post('kode_pos');
 		$nama_kontak		= $this->input->post('nama_kontak');
 		$nomor_kantor		= $this->input->post('nomor_kantor');
 		$nomor_ktp			= $this->input->post('nomor_ktp');
 		$nomor_npwp			= $this->input->post('nomor_npwp');
 		$nomor_hanphone	   = $this->input->post('nomor_hanphone');
 		$email				= $this->input->post('email');
 		$company			= $this->input->post('company');
 		$produk				= $this->input->post('produk');
 		$location			= $this->input->post('location');
 		$departement		= $this->input->post('departement');
 		$account			= $this->input->post('account');
 		$project			= $this->input->post('project');
 		$intercompany		= $this->input->post('intercompany');
 		$future				= $this->input->post('future');
 		$nomor_liability	= $this->input->post('liability');

 		
			$data  = array(
				'id_pengajuan'		=> $id_pengajuan,
				'user_id'			=> $user_id,
				'nama_requester'	=> $nama_requester,
				'asal_sbu'			=> $asal_sbu,
				'tgl_pembuatan'		=> $tgl_pembuatan,
				'sign1'				=> $sign1,
				'sign2'				=> $sign2,
				'sign3'				=> $sign3,
				'pos1'				=> $pos1,
				'pos2'				=> $pos2,
				'pos3'				=> $pos3,
				'sig1'				=> $sig1,
				'sig2'				=> $sig2,
				'sig3'				=> $sig3,
				'dos1'				=> $dos1,
				'dos2'				=> $dos2,
				'dos3'				=> $dos3,
				'kategori'			=> $kategori,
				'alternate'			=> $alternate,
				'usaha'				=> $usaha,
				'kode_usaha'		=> $kode_usaha,
				'nama_suplier'		=> $nama_suplier,
				'nomor_ktp'			=> $nomor_ktp,
				'nomor_npwp'		=> $nomor_npwp,
				'alamat'			=> $alamat,
				'nama_gedung'		=> $nama_gedung,
				'nama_jalan'		=> $nama_jalan,
				'kel'				=> $kel,
				'kec'				=> $kec,
				'kota'				=> $kota,
				'kode_pos'			=> $kode_pos,
				'nama_kontak'		=> $nama_kontak,
				'nomor_kantor'		=> $nomor_kantor,
				'nomor_handphone'	=> $nomor_hanphone,
				'email'				=> $email,
				'company'			=> $company,
				'produk'			=> $produk,
				'location'			=> $location,
				'departement'		=> $departement,
				'account'			=> $account,
				'project'			=> $project,
				'intercompany'		=> $intercompany,
				'future'			=> $future,
				'nomor_liability'	=> $nomor_liability,
			);
			
		$where = array(
			'id_pengajuan' => $id_pengajuan,
		);
		$cek = $this->Model_pengajuan->update_data($where,$data,'tb_pengajuan');
		if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data pengajuan supplier telah diubah
                            </div>');
			redirect('user/suplier');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data pengajuan supplier tidak berhasil diubah
                            </div>');
			redirect('user/suplier');
		}
	}
	function multipel_supplier($afterAcc = null){
		if($this->input->post('setuju')){
			$id_item = $this->input->post('item');
			if(is_null($id_item)){
	 			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                Tidak ada data pengajuan item yang dipilih
	                            </div>');
				if (is_null($afterAcc)) {
					redirect('user/suplier/wait_for_approve');
				}
				else {
					redirect('user/suplier/has_approved');
				}
	 		}
			else if(is_array($id_item)||is_object($id_item)){
				foreach($id_item as $item){
					if($this->session->userdata('level-user') == 2) {
						$data = array(
							'status'=> 1,
							'status_finance' => 1,
							'tgl_finance' => date('Y-m-d')
						);
					}
					else {
						$data = array(
							'status'=> 1,
							'status_procurement' => 1,
							'tgl_procurementd' => date('Y-m-d')
						);
					}
					$where = array(
						'id_item' =>$item
					);
					$this->Model_item->update_data($where,$data,'tb_item');
				}
				$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data pengajuan item telah disetujui
                            </div>');
				if (is_null($afterAcc)) {
					redirect('user/suplier/wait_for_approve');
				}
				else {
					redirect('user/suplier/has_approved');
				}

			}
		}
		elseif($this->input->post('tidak')){
			$id_item = $this->input->post('item');
			if(is_null($id_item)){
	 			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                Tidak ada data pengajuan item yang dipilih
	                            </div>');
				if (is_null($afterAcc)) {
					redirect('user/suplier/wait_for_approve');
				}
				else {
					redirect('user/suplier/has_approved');
				}
	 		}
			else if(is_array($id_item)||is_object($id_item)){
				foreach($id_item as $item){
					if($this->session->userdata('level-user') == 2) {
						$data = array(
							'status'=> 1,
							'status_finance' => 2,
							'tgl_finance' => date('Y-m-d')
						);
					}
					else {
						$data = array(
							'status'=> 1,
							'status_procurement' => 2,
							'tgl_procurementd' => date('Y-m-d')
						);
					}
					$where = array(
						'id_item' =>$item,
						'status' => 1
					);

					$this->Model_item->update_data($where,$data,'tb_item');
				}
				$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data pengajuan item tidak disetujui
                            </div>');
				if (is_null($afterAcc)) {
					redirect('user/suplier/wait_for_approve');
				}
				else {
					redirect('user/suplier/has_approved');
				}

			}
		}
		elseif ($this->input->post('cetak')) {
			$id_item = $this->input->post('item');
			if(is_null($id_item)){
	 			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                Tidak ada data pengajuan item yang dipilih
	                            </div>');
				if (is_null($afterAcc)) {
					redirect('user/suplier/wait_for_approve');
				}
				else {
					redirect('user/suplier/has_approved');
				}
	 		}else{
				$fg = [];
					$data = [];
				if(is_array($id_item)||is_object($id_item)){
					foreach($id_item as $item){
						$where = array(
							'id_item' => $item
						);
					  	$fg['item'] = $this->Model_item->cetak_multivel($where)->result();
						$data[] = $fg;
					}
				}
			    $this->load->view('admin/view_cetak',['hasil' => $data]);
			}
		}
	}

	public function wait_for_approve()
	{
		$data['lisa']['title_h']        = 'Admin | Data Pengajuan Item';
		if ($this->session->userdata('level-user') == 2) {
			$data['item'] = $this->Model_item->db->where(['status' => 1, 'status_finance' => 0])->get('tb_item')->result();
		}
		else {
			$data['item'] = $this->Model_item->db->where(['status' => 1, 'status_procurement' => 0])->get('tb_item')->result();
		}
		// $data['item'] = $this->Model_item->edit_data(['status' => 0], 'tb_item')->result();
		$data['allow_approved'] = true;
		$this->template->view('user/sup-wait-for-approve',$data);
	}

	public function detail($id)
	{
		$data['lisa']['title_h']        = 'Detail Data Pengajuan Item';
 		$data['usaha']                  = $this->Model_item->tampil_data('tb_usaha');
 		$data['sbu']					= $this->Model_item->tampil_data('tb_sbu');
 		$data['des_coa']				= $this->Model_item->tampil_data('tb_account');
 		$data['satuan']					= $this->Model_item->tampil_data('tb_satuan');
 		$where = array(
				'id_item' => $id,
		);

		$data['item'] = $this->Model_item->edit_data($where,'tb_item')->row();

 		$this->template->view('user/detail-sup',$data);
	}

	public function do_approved($id)
	{
		if($this->session->userdata('level-user') == 2)
    		$by = 2;
    	else 
    		$by = 3;
		$this->Model_item->update_data(['id_item' => $id], ['status' => 1, 'approve_by' => $by], 'tb_item');
		redirect(['user/suplier/detail/'.$id]);
	}

	public function approve_multi()
	{
		if($this->session->userdata('level-user') == 2)
    		$by = 2;
    	else 
    		$by = 3;
		if($this->input->post('setuju')){
			$id_item = $this->input->post('item');
			if(is_null($id_item)){
	 			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                Tidak ada data pengajuan item yang dipilih
	                            </div>');
				redirect('user/suplier/wait_for_approve');
	 		}
			else if(is_array($id_item)||is_object($id_item)){
				foreach($id_item as $item){
					$data = array(
						'status'=>'1',
						'approve_by' => $by
					);
					$where = array(
						'id_item' =>$item
					);

					$this->Model_item->update_data($where,$data,'tb_item');
				}
				$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data pengajuan item telah disetujui
                            </div>');
					redirect('user/suplier/wait_for_approve');

			}
		}
	}

	public function has_approved()
	{
		$data['lisa']['title_h']        = 'Admin | Data Pengajuan Item';
		$data['item'] = $this->Model_item->edit_data(['status' => 1], 'tb_item')->result();
		$data['allow_approved'] = false;
		$this->template->view('user/sup-wait-for-approve',$data);
	}

	public function detailSuplier($id)
	{
		$model = $this->Model_pengajuan->detailSuplier('tb_pengajuan', ['id_pengajuan' => $id]);
    	$data['lisa']['title_h'] = 'Detail Supplier';
    	$data['model'] = $model;
    	$this->template->view('user/detail-pengajuan-suplier', $data);
	}

	public function detailItem($id)
	{
		$this->Model_item->db()->where(['id_item' => $id]);
		$this->Model_item->db()->join('tb_account','tb_account.kode_account=tb_item.des_coa');

		$model = $this->Model_item->db()->get('tb_item')->row();
    	$data['lisa']['title_h'] = 'Detail Item';
    	$data['model'] = $model;
    	$this->template->view('admin/detail-pengajuan-item', $data);
	}
}?>