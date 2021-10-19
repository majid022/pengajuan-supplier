<?php

class Produk extends CI_Controller {
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_produk');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
 	}
 	function index(){
 		$data['lisa']['title_h']        = 'Admin | Data Produk';
 		$data['produk'] = $this->Model_produk->tampil_data('tb_produk');
 		$this->template->view('admin/view_produk',$data);
 	}
 	function tambah(){

		if(trim($this->input->post('nama_produk'))==''||trim($this->input->post('kode_produk'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'nama_produk'    => $this->input->post('nama_produk'),
				'kode_produk'    => $this->input->post('kode_produk'),
				'tgl'  			=> $tgl
			);
			$insert = $this->Model_produk->add($data);
			$data = ['execute' => TRUE, 'message' => 'Data Tersimpan'];
		}
		echo json_encode( ['respon' =>$data]);
	}
	public function edit($id_produk) {
        $data = $this->Model_produk->get_by_id($id_produk);

        echo json_encode($data);
    }
    public function update(){
    	if(trim($this->input->post('nama_produk'))==''||trim($this->input->post('kode_produk'))==''){
			$data = ['execute' => false, 'message' => 'Lengkapi data'];
		}
		else{
			date_default_timezone_get('Asia/Makassar');
	    	$tgl			= date("y-m-d h:i:s");

			$data = array(
				'id_produk'      => $this->input->post('id_produk'),
				'nama_produk'    => $this->input->post('nama_produk'),
				'kode_produk'    => $this->input->post('kode_produk'),
			);
			 $this->Model_produk->update(array('id_produk' => $this->input->post('id_produk')), $data);
			$data = ['execute' => TRUE, 'message' => 'Data Telah Diubah'];
		}
		echo json_encode( ['respon' =>$data]);
  		
    }

    public function hapus($id_produk){
        $id_produk = $this->input->post('id_produk');
        $this->Model_produk->delete_by_id($id_produk);
    }
}
?>