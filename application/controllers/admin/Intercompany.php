<?php

class Intercompany extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_intercompany');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Data intercompany';
 		$data['intercompany'] = $this->Model_intercompany->tampil_data('tb_intercompany');
 		$this->template->view('admin/view_intercompany',$data);
 	}
 	function tambah(){

		if(trim($this->input->post('nama_intercompany'))==''||trim($this->input->post('kode_intercompany'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'nama_intercompany'    => $this->input->post('nama_intercompany'),
				'kode_intercompany'    => $this->input->post('kode_intercompany'),
				'tgl'  			=> $tgl
			);
			$insert = $this->Model_intercompany->add($data);
			$data = ['execute' => TRUE, 'message' => 'Data Tersimpan'];
		}
		echo json_encode( ['respon' =>$data]);
	}
	public function edit($id_intercompany) {
        $data = $this->Model_intercompany->get_by_id($id_intercompany);

        echo json_encode($data);
    }
    public function update(){
    	if(trim($this->input->post('nama_intercompany'))==''||trim($this->input->post('kode_intercompany'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'id_intercompany'      => $this->input->post('id_intercompany'),
				'nama_intercompany'    => $this->input->post('nama_intercompany'),
				'kode_intercompany'    => $this->input->post('kode_intercompany'),
			);
			 $this->Model_intercompany->update(array('id_intercompany' => $this->input->post('id_intercompany')), $data);
			$data = ['execute' => TRUE, 'message' => 'Data Telah Diubah'];
		}
		echo json_encode( ['respon' =>$data]);
  		
    }

    public function hapus($id_intercompany){
        $id_intercompany = $this->input->post('id_intercompany');
        $this->Model_intercompany->delete_by_id($id_intercompany);
    }
}
?>