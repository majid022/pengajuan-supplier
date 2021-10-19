<?php

class Profil extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_item');
 		if ($this->session->userdata('status') != 'login') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Profil';
 		$id = $this->session->userdata('id_user');
	    $where = array(
			'id_user' => $id
	    );
		$data['us'] = $this->Model_item->edit_data($where,'tb_user')->row();
 		$this->template->view('user/view_profil',$data);
 	}
 	function aksi_update(){
 		$id_user    	= $this->input->post('id_user');
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
							'id_user'	      => $id_user,
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
							'foto'            => $gbr['file_name'],
						);
			}
		}
		else
		{
			$data = array(
							'id_user'	      => $id_user,
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
					);
		}
		$where = array(
			'id_user' => $id_user,
		);
		$cek = $this->Model_item->update_data($where,$data,'tb_user');
		if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                User berhasil megubah profil.
                            </div>');
			redirect('user/profil');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               User tidak berhasil mengubah profil.
                            </div>');
			redirect('user/profil');
		}
 	}
 }
 ?>