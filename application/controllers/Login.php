<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Model_login');
		
	}
	public function index()
	{
		$this->load->view('view_login');
	}
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
				'username' => $username,
				'password' => $password
			);
		//seleksi untk admin
		$cek = $this->Model_login->cek_login("tb_admin",$where);
		if($cek->num_rows() > 0){
			foreach ($cek->result() as $row)
			{
				$data_session = array(
					'username' 		=> $username,
					'password'		=> $password,
					'status' 		=>"login_admin",
					'namalengkap'	=> $row->namalengkap,
					'email'			=> $row->email,
					'id_admin'		=> $row->id_admin,
					'foto' 			=> $row->foto,
					'sidebar' 		=> 'admin',
					// 'akses' 		=> $row->akses,
					);
			
			$this->session->set_userdata($data_session);
			redirect('admin/beranda','refresh');
				
			}
		}
		else
		{
			$cekki = $this->Model_login->cek_login("tb_user",$where);
			if($cekki->num_rows() > 0){
				foreach ($cekki->result() as $ro)
				{
					$data_session = array(
						'username' 		=> $username,
						'password' 		=> $password,
						'status' 		=>"login",
						'first_name'	=> $ro->first_name,
						'last_name'		=> $ro->last_name,
						'id_user'		=> $ro->id_user,
						'foto' 			=> $ro->foto,
						'branch' 		=> $ro->branch,
						'departement' 	=> $ro->departement,
						'sidebar'		=> 'user',
						'level-user' => (int)$ro->level_user
					);
				$qad = $cekki->row();
				if($username == $qad->username && $password == $qad->password){
					if($qad->aktif == '0'){
						$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Maaf akun anda belum disetujui admin.
                            </div>');
					redirect('login','refresh');
					}
					elseif ($qad->aktif == '1'){
						$this->session->set_userdata($data_session);
						redirect('user/beranda','refresh');
					}
				}	
				
				}
			}
			else {
					$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Username atau password salah.
                            </div>');
					redirect('login','refresh');
			}
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
