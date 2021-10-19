<?php

class Beranda extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_sbu');
 		$this->load->model('Model_pengajuan');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Beranda User';
 		$data['status'] = $this->Model_pengajuan->pemberitahuan_pengajuan_baru();
 		
 		$data['sup'] 			= $this->Model_pengajuan->jumlah_data('tb_pengajuan');
		$data['item'] 			= $this->Model_pengajuan->jumlah_data('tb_item');
		$data['tidak_sup'] 		= $this->Model_pengajuan->jumlah_data_tidak('tb_pengajuan');
		$data['progres'] 		= $this->Model_pengajuan->jumlah_progres('tb_pengajuan');
		$data['tidak_item'] 	= $this->Model_pengajuan->jumlah_data_tidak('tb_item');
		$data['progres_item'] 	= $this->Model_pengajuan->jumlah_progres('tb_item');

		$data['app_sup'] 		= $this->Model_pengajuan->jumlah_data_approval('tb_approved_supplier');
		$data['app_item'] 		= $this->Model_pengajuan->jumlah_data_approval('tb_approved_item');
		$data['tidak_app_sup'] 	= $this->Model_pengajuan->jumlah_data_approval_tidak('tb_approved_supplier');
		$data['tidak_app_item'] = $this->Model_pengajuan->jumlah_data_approval_tidak('tb_approved_item');

		$data['user']			= $this->Model_pengajuan->jumlah_user('tb_user');
		$data['user_taktif']	= $this->Model_pengajuan->jumlah_tidak_aktif('tb_user');

 		$this->template->view('admin/view_beranda',$data);
 	}
 	function status_notif(){
 		$data = array(
			'notif' => '1'
		);
		$where = array(
			'id_pengajuan' => $id_pengajuan
		);
		 $this->Model_pengajuan->ubah_notif_pengajuan($id_pengajuan,$data);
			redirect('supplier/beranda');
 	}
 }
 ?>