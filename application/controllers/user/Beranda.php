<?php

class Beranda extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model');
 		if ($this->session->userdata('status') != 'login') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Beranda User';
 		$par_id = $this->session->userdata("id_user");
		$user_id = array('user_id'=> $par_id);
		$data['sup'] = $this->Model->jumlah_data($user_id,'tb_pengajuan');
		$data['progres'] = $this->Model->jumlah_progres($user_id,'tb_pengajuan');
		$data['tidak_sup'] = $this->Model->jumlah_data_tidak($user_id,'tb_pengajuan');
		
		$data['item'] = $this->Model->jumlah_data($user_id,'tb_item');
		$data['tidak_item'] = $this->Model->jumlah_data_tidak($user_id,'tb_item');
		$data['progres_item'] = $this->Model->jumlah_progres($user_id,'tb_item');

		$data['app_sup'] = $this->Model->jumlah_data_approval($user_id,'tb_approved_supplier');
		$data['app_item'] = $this->Model->jumlah_data_approval($user_id,'tb_approved_item');
		$data['tidak_app_sup'] = $this->Model->jumlah_data_approval_tidak($user_id,'tb_approved_supplier');
		$data['tidak_app_item'] = $this->Model->jumlah_data_approval_tidak($user_id,'tb_approved_item');
 		$this->template->view('user/view_beranda',$data);
 	}
 }
 ?>