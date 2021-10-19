<?php

class User extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_item');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 			$data['lisa']['title_h']        = 'Admin | User';
 			$data['user'] = $this->Model_item->tampil_user('tb_user');
 			$this->template->view('admin/view_user',$data);
 	}
 	public function hapus($id_user){
        $id_user = $this->input->post('id_user');
        $this->Model_item->delete_user($id_user);
    }
    function status(){
		$id_user = $this->input->post('id_user');
		$data = array(
			'aktif' => '0'
		);
		$where = array(
			'id_user' => $id_user
		);
		$ceki = $this->Model_item->update_data($where,$data,'tb_user');
		if($ceki==0){
				$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data user tidak diaktifkan
                            </div>');
			redirect('admin/user');
		}
	}
	function status2(){
		$id_user = $this->input->post('id_user');
		$data = array(
			'aktif' => '1'
		);
		$where = array(
			'id_user' => $id_user
		);
		$ceki = $this->Model_item->update_data($where,$data,'tb_user');
		if($ceki==0){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data user telah diaktifkan
                            </div>');
			redirect('admin/user');
		}
	}
 }
 ?>