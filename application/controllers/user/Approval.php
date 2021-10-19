<?php

class Approval extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_pengajuan');
 		if ($this->session->userdata('status') != 'login') {
				redirect(base_url("login"));
		}
	}
	function index(){
		$data['lisa']['title_h']        = 'Approval Pengajuan Supplier';
		$par_id = $this->session->userdata("id_user");
		$id_user = array('id_user'=> $par_id);
		$data['pengajuan'] = $this->Model_pengajuan->tampil_approval($id_user);
		$this->template->view('user/view_approved_pengajuan',$data);
	}
	function tambah(){
		$data['lisa']['title_h']        = 'Approval Pengajuan Supplier';
		$this->template->view('user/view_tambah_approved_pengajuan',$data);
	}
	function aksi_tambah(){
		$user_id	   = $this->session->userdata('id_user');
		$tgl_pengajuan = $this->input->post('tgl_pengajuan');
		$this->load->library(array('upload','image_lib'));
			
		$nmfile					    = "Approval_pengajuan".$tgl_pengajuan;//nama file
		$config['upload_path']		= './assets/upload/pengajuan/';//penyimpanan
		$config['allowed_types']	= 'gif|jpg|png|jpeg|bmp|pdf';//type 
		$config['file_name']		= $nmfile;//

		$this->upload->initialize($config);
		
		if($_FILES['file']['name'])
		{
			if($this->upload->do_upload('file'))
			{
				$gbr = $this->upload->data();
				$data  = array(
							'user_id'		  => $user_id,
							'tgl_pengajuan'   => $tgl_pengajuan,
							'file_diajukan'   => $gbr['file_name'],
							'status1'		  => '0',
						);
			}
		}
		else
		{
			$data = array(
							'user_id'		  => $user_id,
							'tgl_pengajuan'   => $tgl_pengajuan,
							'status1'		  => '0',
					);
		}
		$cek = $this->Model_pengajuan->input_data($data,'tb_approved_supplier');
		if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data approval pengajuan supplier telah ditambahkan
                            </div>');
			redirect('user/approval');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data approval pengajuan supplier tidak berhasil ditambahkan
                            </div>');
			redirect('user/approval');
		}
	}
	public function hapus($id_app_sup){
        $id_app_sup = $this->input->post('id_app_sup');
        $this->Model_pengajuan->delete_suplier($id_app_sup);
    }
    function edit($id_app_sup){
    	$where = array(
    		'id_app_sup' => $id_app_sup,
    	);
    	$data['lisa']['title_h']        = 'Edit Approval Pengajuan Supplier';
    	$data['pe'] = $this->Model_pengajuan->edit_data($where,'tb_approved_supplier')->row();

 		$this->template->view('user/view_edit',$data);
    }
    function aksi_update(){
    	$id_app_sup = $this->input->post('id_app_sup');
    	$tgl_pengajuan = $this->input->post('tgl_pengajuan');
		$this->load->library(array('upload','image_lib'));
			
		$nmfile					    = "Approval_pengajuan".$tgl_pengajuan;//nama file
		$config['upload_path']		= './assets/upload/pengajuan/';//penyimpanan
		$config['allowed_types']	= 'gif|jpg|png|jpeg|bmp|pdf';//type 
		$config['file_name']		= $nmfile;//

		$this->upload->initialize($config);
		
		if($_FILES['file']['name'])
		{
			if($this->upload->do_upload('file'))
			{
				$gbr = $this->upload->data();
				$data  = array(
							'id_app_sup'	  => $id_app_sup,
							'tgl_pengajuan'   => $tgl_pengajuan,
							'file_diajukan'   => $gbr['file_name'],
							'status1'		  => '0',
						);
			}
		}
		else
		{
			$data = array(
				  			'id_app_sup'	  => $id_app_sup,
							'tgl_pengajuan'   => $tgl_pengajuan,
							'status1'		  => '0',
					);
		}
		$where = array(
    		'id_app_sup' => $id_app_sup,
    	);
    	$cek = $this->Model_pengajuan->update_data($where,$data,'tb_approved_supplier');
    	if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data approval pengajuan supplier telah diubah
                            </div>');
			redirect('user/approval');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data approval pengajuan supplier tidak berhasil diubah
                            </div>');
			redirect('user/approval');
		}
    }
}
?>