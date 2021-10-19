<?php

class Usaha extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_usaha');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Data Jenis Usaha';
 		$data['usaha'] = $this->Model_usaha->tampil_data('tb_usaha');
 		$this->template->view('admin/view_usaha',$data);
 	}
 	function tambah(){

		if(trim($this->input->post('jenis_usaha'))==''||trim($this->input->post('kode_usaha'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'jenis_usaha'    => $this->input->post('jenis_usaha'),
				'kode_usaha'   	 => $this->input->post('kode_usaha'),
				'tgl_pembuatan'  => $tgl
			);
			$insert = $this->Model_usaha->add($data);
			$data = ['execute' => TRUE, 'message' => 'Data Tersimpan'];
		}
		echo json_encode( ['respon' =>$data]);
	}
	public function edit($id_usaha) {
        $data = $this->Model_usaha->get_by_id($id_usaha);

        echo json_encode($data);
    }
    public function update(){
    	if(trim($this->input->post('jenis_usaha'))==''||trim($this->input->post('kode_usaha'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'id_usaha'       => $this->input->post('id_usaha'),
				'jenis_usaha'    => $this->input->post('jenis_usaha'),
				'kode_usaha'   	 => $this->input->post('kode_usaha'),
				'tgl_pembuatan'  => $tgl
			);
			 $this->Model_usaha->update(array('id_usaha' => $this->input->post('id_usaha')), $data);
			$data = ['execute' => TRUE, 'message' => 'Data Telah Diubah'];
		}
		echo json_encode( ['respon' =>$data]);
  		
    }

    public function hapus($id_usaha){
        $id_usaha = $this->input->post('id_usaha');
        $this->Model_usaha->delete_by_id($id_usaha);
    }
}
?>