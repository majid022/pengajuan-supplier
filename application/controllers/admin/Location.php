<?php

class Location extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_location');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Data location';
 		$data['location'] = $this->Model_location->tampil_data('tb_location');
 		$this->template->view('admin/view_location',$data);
 	}
 	function tambah(){

		if(trim($this->input->post('nama_location'))==''||trim($this->input->post('kode_location'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'nama_location'    => $this->input->post('nama_location'),
				'kode_location'    => $this->input->post('kode_location'),
				'tgl'  			=> $tgl
			);
			$insert = $this->Model_location->add($data);
			$data = ['execute' => TRUE, 'message' => 'Data Tersimpan'];
		}
		echo json_encode( ['respon' =>$data]);
	}
	public function edit($id_location) {
        $data = $this->Model_location->get_by_id($id_location);

        echo json_encode($data);
    }
    public function update(){
    	if(trim($this->input->post('nama_location'))==''||trim($this->input->post('kode_location'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'id_location'      => $this->input->post('id_location'),
				'nama_location'    => $this->input->post('nama_location'),
				'kode_location'    => $this->input->post('kode_location'),
			);
			 $this->Model_location->update(array('id_location' => $this->input->post('id_location')), $data);
			$data = ['execute' => TRUE, 'message' => 'Data Telah Diubah'];
		}
		echo json_encode( ['respon' =>$data]);
  		
    }

    public function hapus($id_location){
        $id_location = $this->input->post('id_location');
        $this->Model_location->delete_by_id($id_location);
    }
}
?>