<?php

class Kategori extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_kategori');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Data kategori';
 		$data['kategori'] = $this->Model_kategori->tampil_data('tb_kategori');
 		$this->template->view('admin/view_kategori',$data);
 	}
 	function tambah(){

		if(trim($this->input->post('kategori'))==''||trim($this->input->post('alternate'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'kategori_nama' => $this->input->post('kategori'),
				'alternate'   	=> $this->input->post('alternate'),
				'tgl'  		  	=> $tgl
			);
			$insert = $this->Model_kategori->add($data);
			$data = ['execute' => TRUE, 'message' => 'Data Tersimpan'];
		}
		echo json_encode( ['respon' =>$data]);
	}
	public function edit($id_kategori) {
        $data = $this->Model_kategori->get_by_id($id_kategori);

        echo json_encode($data);
    }
    public function update(){
    	if(trim($this->input->post('kategori'))==''||trim($this->input->post('alternate'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'id_kategori' 	=> $this->input->post('id_kategori'),
				'kategori_nama' => $this->input->post('kategori'),
				'alternate'   	=> $this->input->post('alternate'),
			);
			 $this->Model_kategori->update(array('id_kategori' => $this->input->post('id_kategori')), $data);
			$data = ['execute' => TRUE, 'message' => 'Data Telah Diubah'];
		}
		echo json_encode( ['respon' =>$data]);
  		
    }

    public function hapus($id_kategori){
        $id_kategori = $this->input->post('id_kategori');
        $this->Model_kategori->delete_by_id($id_kategori);
    }
}
?>