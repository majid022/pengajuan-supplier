<?php

class Account extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_account');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Data Account';
 		$data['account'] = $this->Model_account->tampil_data('tb_account');
 		$this->template->view('admin/view_account',$data);
 	}
 	function tambah(){

		if(trim($this->input->post('nama_account'))==''||trim($this->input->post('kode_account'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'nama_account'    => $this->input->post('nama_account'),
				'kode_account'    => $this->input->post('kode_account'),
				'tgl'  			=> $tgl
			);
			$insert = $this->Model_account->add($data);
			$data = ['execute' => TRUE, 'message' => 'Data Tersimpan'];
		}
		echo json_encode( ['respon' =>$data]);
	}
	public function edit($id_account) {
        $data = $this->Model_account->get_by_id($id_account);

        echo json_encode($data);
    }
    public function update(){
    	if(trim($this->input->post('nama_account'))==''||trim($this->input->post('kode_account'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'id_account'      => $this->input->post('id_account'),
				'nama_account'    => $this->input->post('nama_account'),
				'kode_account'    => $this->input->post('kode_account'),
			);
			 $this->Model_account->update(array('id_account' => $this->input->post('id_account')), $data);
			$data = ['execute' => TRUE, 'message' => 'Data Telah Diubah'];
		}
		echo json_encode( ['respon' =>$data]);
  		
    }

    public function hapus($id_account){
        $id_account = $this->input->post('id_account');
        $this->Model_account->delete_by_id($id_account);
    }
}
?>