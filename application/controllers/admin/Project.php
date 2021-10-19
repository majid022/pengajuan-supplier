<?php

class Project extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_project');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Data Produk';
 		$data['project'] = $this->Model_project->tampil_data('tb_project');
 		$this->template->view('admin/view_project',$data);
 	}
 	function tambah(){

		if(trim($this->input->post('nama_project'))==''||trim($this->input->post('kode_project'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'nama_project'    => $this->input->post('nama_project'),
				'kode_project'    => $this->input->post('kode_project'),
				'tgl'  			=> $tgl
			);
			$insert = $this->Model_project->add($data);
			$data = ['execute' => TRUE, 'message' => 'Data Tersimpan'];
		}
		echo json_encode( ['respon' =>$data]);
	}
	public function edit($id_project) {
        $data = $this->Model_project->get_by_id($id_project);

        echo json_encode($data);
    }
    public function update(){
    	if(trim($this->input->post('nama_project'))==''||trim($this->input->post('kode_project'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'id_project'      => $this->input->post('id_project'),
				'nama_project'    => $this->input->post('nama_project'),
				'kode_project'    => $this->input->post('kode_project'),
			);
			 $this->Model_project->update(array('id_project' => $this->input->post('id_project')), $data);
			$data = ['execute' => TRUE, 'message' => 'Data Telah Diubah'];
		}
		echo json_encode( ['respon' =>$data]);
  		
    }

    public function hapus($id_project){
        $id_project = $this->input->post('id_project');
        $this->Model_project->delete_by_id($id_project);
    }
}
?>