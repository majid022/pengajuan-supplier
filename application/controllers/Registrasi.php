<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Model_login');
		
	}
	public function index()
	{
		$this->load->view('view_registrasi');
	}
	public function aksi_registrasi(){
		$namalengkap 	= $this->input->post('namalengkap');
		$departement 	= $this->input->post('departement');
		$branch 	    = $this->input->post('branch');
		$first_name 	= $this->input->post('first_name');
		$last_name  	= $this->input->post('last_name');
		$no_wa 	        = $this->input->post('no_wa');
		$username	 	= $this->input->post('username');
		$password 	 	= $this->input->post('password');
		$email 		 	= $this->input->post('email');
		$no_hp 		 	= $this->input->post('no_hp');
		$alamat 		= $this->input->post('alamat');
		
		date_default_timezone_get('Asia/Makassar');
		$tgl			= date("y-m-d h:i:s");
		$this->load->library(array('upload','image_lib'));
			
		$nmfile					    = "user";//nama file
		$config['upload_path']		= './assets/upload/images/';//penyimpanan
		$config['allowed_types']	= 'gif|jpg|png|jpeg|bmp';//type 
		$config['file_name']		= $nmfile;//

		$this->upload->initialize($config);
		
		if($_FILES['file']['name'])
		{
			if($this->upload->do_upload('file'))
			{
				$gbr = $this->upload->data();
				$data  = array(
							'namalengkap'	  => $namalengkap,
							'departement'	  => $departement,
							'branch'	      => $branch,
							'first_name'	  => $first_name,
							'last_name'	      => $last_name,
							'no_wa'	          => $no_wa,
							'username'   	  => $username,
							'password'   	  => $password,
							'email'			  => $email,
							'no_hp'			  => $no_hp,
							'alamat_user'	  => $alamat,
							'tgl'		 	  => $tgl,
							'aktif'		  => '0',
							'foto'            => $gbr['file_name'],
						);
			}
		}
		else
		{
			$data = array(
							'namalengkap'	  => $namalengkap,
							'departement'	  => $departement,
							'branch'	      => $branch,
							'first_name'	  => $first_name,
							'last_name'	      => $last_name,
							'no_wa'	          => $no_wa,
							'username'   	  => $username,
							'password'   	  => $password,
							'email'			  => $email,
							'no_hp'			  => $no_hp,
							'alamat_user'	  => $alamat,
							'tgl'		 	  => $tgl,
							'aktif'		      => '0',
							'foto'            => 'user.png',
					);
		}
		$cek = $this->Model_login->input_data($data,'tb_user');
		if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                User berhasil mendaftar, silahkan login sebagai user apabila anda telah mendapat persetujuan dari admin.
                            </div>');
			redirect('registrasi');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               User tidak berhasil mendaftar.
                            </div>');
			redirect('registrasi');
		}
	}
}
?>