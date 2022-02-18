<?php

class Supplier extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('Model_pengajuan');
		if ($this->session->userdata('status') != 'login_admin') {
			redirect(base_url("login"));
		}
	}
	function index(){
		$sql = "UPDATE tb_pengajuan set notif=0 ";
		$this->db->query($sql);
		$data['lisa']['title_h']        = 'Admin | Data Pengajuan Supplier';
		$data['suplier'] = $this->Model_pengajuan->pengajuan()->result();
		$this->template->view('admin/view_pengajuan_supplier',$data);
	}
	function status(){
		$id_pengajuan = $this->input->post('id_pengajuan');
		$data = array(
			'status' => '0'
		);
		$where = array(
			'id_pengajuan' => $id_pengajuan
		);
		$ceki = $this->Model_pengajuan->update_data($where,$data,'tb_pengajuan');
		if($ceki==0){
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				Data pengajuan supplier tidak disetujui
				</div>');
			redirect('admin/supplier');
		}
	}
	function status2(){
		$id_pengajuan = $this->input->post('id_pengajuan');
		$data = array(
			'status' => '1'
		);
		$where = array(
			'id_pengajuan' => $id_pengajuan
		);
		$ceki = $this->Model_pengajuan->update_data($where,$data,'tb_pengajuan');
		if($ceki==0){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				Data pengajuan supplier telah disetujui
				</div>');
			redirect('admin/supplier');
		}
	}
	function multipel_supplier($afterAcc = null){
        // Konfigurasi email
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'kalla.group02@gmail.com',
			'smtp_pass'   => 'k@llagroup02',
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];

		if($this->input->post('setuju')){
			$id_pengajuan = $this->input->post('pengajuan');
			if(is_null($id_pengajuan)){
				$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					Tidak ada data pengajuan supplier yang dipilih
					</div>');
				redirect('admin/supplier');
			}
			else if (is_array($id_pengajuan) || is_object($id_pengajuan))
			{
				foreach($id_pengajuan as $row){
					$data = array(
						'id_pengajuan' => $row, 
						'status' => 1,
						'tgl_selesai' => date('Y-m-d'),
					);
					$where = array(
						'id_pengajuan' => $row,
					);	
					$data = $this->Model_pengajuan->update_data($where,$data,'tb_pengajuan');
					
					$email = $data[0]['email'];	
					$sbu = $data[0]['asal_sbu'];
					$this->load->library('email');
					$this->email->initialize($config);
					$this->email->from('kalla.group02@gmail.com', 'kalla-group.com');
					$this->email->to($email);
					$this->email->subject('Pengajuan Supplier Disetujui');
					$this->email->message("Pengajuan data supplier anda untuk ".$sbu." telah disetujui oleh admin");
					$this->email->send();
				}

				$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					Data pengajuan supplier telah disetujui
					</div>');
				redirect('admin/supplier','refresh');

			}
		}
		elseif($this->input->post('tidak')){
			$id_pengajuan = $this->input->post('pengajuan');
			
			if(is_null($id_pengajuan)){
				$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					Tidak ada data pengajuan supplier yang dipilih
					</div>');
				if (is_null($afterAcc)) {
					redirect('admin/supplier');
				}
				else {
					redirect('admin/approval_supplier');
				}
			}
			else if (is_array($id_pengajuan) || is_object($id_pengajuan))
			{
				foreach($id_pengajuan as $row){
					$data 		= array(
						'id_pengajuan' => $row,
						'status' => 2,
						'tgl_selesai' => date('Y-m-d'),
					);
					$where = array(
						'id_pengajuan'=>$row,
						// 'status' => 1
					);
					$this->Model_pengajuan->update_data($where,$data,'tb_pengajuan');

					$data = $this->Model_pengajuan->update_data($where,$data,'tb_pengajuan');
					$email = $data[0]['email'];
					$sbu = $data[0]['asal_sbu'];
					$this->load->library('email');
					$this->email->initialize($config);
					$this->email->from('kalla.group02@gmail.com', 'kalla-group.com');
					$this->email->to($email);
					$this->email->subject('Pengajuan Supplier Ditolak');
					$this->email->message("Pengajuan data supplier anda untuk ".$sbu." tidak disetujui oleh admin");
					$this->email->send();

				}

				$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					Data pengajuan supplier tidak disetujui
					</div>');
				if (is_null($afterAcc)) {
					redirect('admin/supplier');
				}
				else {
					redirect('admin/approval_supplier');
				}
			}
		}
		elseif($this->input->post('cetak')){

			$id_pengajuan = $this->input->post('pengajuan');
			if(is_null($id_pengajuan)){
				$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					Tidak ada data pengajuan supplier yang dipilih
					</div>');
				redirect('admin/supplier');
			}
			else{
				$fg = [];
				$data = [];
				if(is_array($id_pengajuan)||is_object($id_pengajuan)){
					foreach($id_pengajuan as $row){
						$where = array(
							'id_pengajuan' => $row
						);
						$fg['pengajuan'] = $this->Model_pengajuan->cetak_multipel($where)->result();
						$data[] = $fg;
					}
				}
				$this->load->view('admin/view_cetak_excel',['hasil' => $data]);
			}
		}
		
	}
	
	public function hapus($id_pengajuan){
		$id_pengajuan = $this->input->post('id_pengajuan');
		$this->Model_pengajuan->delete_by_id($id_pengajuan);
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

	function edit_pengajuan($id_pengajuan){
		$data['lisa']['title_h']        = 'Admin | Edit Data Pengajuan Supplier';
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

		$this->template->view('admin/view_edit_pengajuan',$data);
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
			redirect('admin/supplier');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				Data pengajuan supplier tidak berhasil diubah
				</div>');
			redirect('admin/supplier');
		}
	}
	function cetak_excel(){
		$data['pengajuan'] = $this->Model_pengajuan->cetak_excel()->result();
		$this->load->view('admin/view_cetak_pengajuan',$data);
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

	public function detailSuplier($id)
	{
		$model = $this->Model_pengajuan->detailSuplier('tb_pengajuan', ['id_pengajuan' => $id]);
		$data = [
			'model' => $model,
			'lisa' => [
				'title_h' => 'Detail Supplier'
			]
		];
		$this->template->view('admin/detail-pengajuan-suplier',$data);
	}
}
?>