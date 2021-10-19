<?php

class Profil extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_item');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Profil';
 		$id = $this->session->userdata('id_admin');
	    $where = array(
			'id_admin' => $id
	    );
		$data['ad'] = $this->Model_item->edit_data($where,'tb_admin')->row();
 		$this->template->view('admin/view_profil',$data);
 	}
 	function aksi_update(){
 		$id_admin    	= $this->input->post('id_admin');
 		$namalengkap 	= $this->input->post('namalengkap');
		$username	 	= $this->input->post('username');
		$password 	 	= $this->input->post('password');
		$no_hp 		 	= $this->input->post('no_hp');
		$email 		 	= $this->input->post('email');
		
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
							'id_admin'	      => $id_admin,
							'namalengkap'	  => $namalengkap,
							'username'   	  => $username,
							'password'   	  => $password,
							'no_hp'			  => $no_hp,
							'email'			  => $email,
							'foto'            => $gbr['file_name'],
						);
			}
		}
		else
		{
			$data = array(
							'id_admin'	      => $id_admin,
							'namalengkap'	  => $namalengkap,
							'username'   	  => $username,
							'password'   	  => $password,
							'no_hp'			  => $no_hp,
							'email'			  => $email,
					);
		}
		$where = array(
			'id_admin' => $id_admin,
		);
		$cek = $this->Model_item->update_data($where,$data,'tb_admin');
		if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Berhasil mengubah profil.
                            </div>');
			redirect('admin/profil');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Tidak berhasil mengubah profil.
                            </div>');
			redirect('admin/profil');
		}
 	}
 }
 ?>