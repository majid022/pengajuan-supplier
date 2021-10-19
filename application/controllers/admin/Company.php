<?php

class Company extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Data Company';
 		$data['company'] = $this->Model->tampil_data('tb_company');
 		$this->template->view('admin/view_company',$data);
 	}
 	function tambah(){

		if(trim($this->input->post('nama_company'))==''||trim($this->input->post('kode_company'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'nama_company'    => $this->input->post('nama_company'),
				'kode_company'    => $this->input->post('kode_company'),
				'tgl'  			=> $tgl
			);
			$insert = $this->Model->add($data);
			$data = ['execute' => TRUE, 'message' => 'Data Tersimpan'];
		}
		echo json_encode( ['respon' =>$data]);
	}
	public function edit($id_company) {
        $data = $this->Model->get_by_id($id_company);

        echo json_encode($data);
    }
    public function update(){
    	if(trim($this->input->post('nama_company'))==''||trim($this->input->post('kode_company'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'id_company'      => $this->input->post('id_company'),
				'nama_company'    => $this->input->post('nama_company'),
				'kode_company'    => $this->input->post('kode_company'),
			);
			 $this->Model->update(array('id_company' => $this->input->post('id_company')), $data);
			$data = ['execute' => TRUE, 'message' => 'Data Telah Diubah'];
		}
		echo json_encode( ['respon' =>$data]);
  		
    }

    public function hapus($id_company){
        $id_company = $this->input->post('id_company');
        $this->Model->delete_by_id($id_company);
    }
}
?>