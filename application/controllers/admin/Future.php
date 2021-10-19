<?php

class Future extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_future');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Data future';
 		$data['future'] = $this->Model_future->tampil_data('tb_future');
 		$this->template->view('admin/view_future',$data);
 	}
 	function tambah(){

		if(trim($this->input->post('nama_future'))==''||trim($this->input->post('kode_future'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'nama_future'    => $this->input->post('nama_future'),
				'kode_future'    => $this->input->post('kode_future'),
				'tgl'  			=> $tgl
			);
			$insert = $this->Model_future->add($data);
			$data = ['execute' => TRUE, 'message' => 'Data Tersimpan'];
		}
		echo json_encode( ['respon' =>$data]);
	}
	public function edit($id_future) {
        $data = $this->Model_future->get_by_id($id_future);

        echo json_encode($data);
    }
    public function update(){
    	if(trim($this->input->post('nama_future'))==''||trim($this->input->post('kode_future'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'id_future'      => $this->input->post('id_future'),
				'nama_future'    => $this->input->post('nama_future'),
				'kode_future'    => $this->input->post('kode_future'),
			);
			 $this->Model_future->update(array('id_future' => $this->input->post('id_future')), $data);
			$data = ['execute' => TRUE, 'message' => 'Data Telah Diubah'];
		}
		echo json_encode( ['respon' =>$data]);
  		
    }

    public function hapus($id_future){
        $id_future = $this->input->post('id_future');
        $this->Model_future->delete_by_id($id_future);
    }
}
?>