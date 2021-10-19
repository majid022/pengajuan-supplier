<?php

class Departement extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_departement');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Data Departement';
 		$data['departement'] = $this->Model_departement->tampil_data('tb_departement');
 		$this->template->view('admin/view_departement',$data);
 	}
 	function tambah(){

		if(trim($this->input->post('nama_departement'))==''||trim($this->input->post('kode_departement'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'nama_departement'    => $this->input->post('nama_departement'),
				'kode_departement'    => $this->input->post('kode_departement'),
				'tgl'  			=> $tgl
			);
			$insert = $this->Model_departement->add($data);
			$data = ['execute' => TRUE, 'message' => 'Data Tersimpan'];
		}
		echo json_encode( ['respon' =>$data]);
	}
	public function edit($id_departement) {
        $data = $this->Model_departement->get_by_id($id_departement);

        echo json_encode($data);
    }
    public function update(){
    	if(trim($this->input->post('nama_departement'))==''||trim($this->input->post('kode_departement'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'id_departement'      => $this->input->post('id_departement'),
				'nama_departement'    => $this->input->post('nama_departement'),
				'kode_departement'    => $this->input->post('kode_departement'),
			);
			 $this->Model_departement->update(array('id_departement' => $this->input->post('id_departement')), $data);
			$data = ['execute' => TRUE, 'message' => 'Data Telah Diubah'];
		}
		echo json_encode( ['respon' =>$data]);
  		
    }

    public function hapus($id_departement){
        $id_departement = $this->input->post('id_departement');
        $this->Model_departement->delete_by_id($id_departement);
    }
}
?>