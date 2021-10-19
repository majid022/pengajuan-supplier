<?php

class Sbu extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_sbu');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Data sbu';
 		$data['sbu'] = $this->Model_sbu->tampil_data('tb_sbu');
 		$this->template->view('admin/view_sbu',$data);
 	}
 	function tambah(){

		if(trim($this->input->post('nama_sbu'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'nama_sbu'    => $this->input->post('nama_sbu'),
				'tgl'  			=> $tgl
			);
			$insert = $this->Model_sbu->add($data);
			$data = ['execute' => TRUE, 'message' => 'Data Tersimpan'];
		}
		echo json_encode( ['respon' =>$data]);
	}
	public function edit($id_sbu) {
        $data = $this->Model_sbu->get_by_id($id_sbu);

        echo json_encode($data);
    }
    public function update(){
    	if(trim($this->input->post('nama_sbu'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'id_sbu'      => $this->input->post('id_sbu'),
				'nama_sbu'    => $this->input->post('nama_sbu'),
			);
			 $this->Model_sbu->update(array('id_sbu' => $this->input->post('id_sbu')), $data);
			$data = ['execute' => TRUE, 'message' => 'Data Telah Diubah'];
		}
		echo json_encode( ['respon' =>$data]);
  		
    }

    public function hapus($id_sbu){
        $id_sbu = $this->input->post('id_sbu');
        $this->Model_sbu->delete_by_id($id_sbu);
    }
}
?>