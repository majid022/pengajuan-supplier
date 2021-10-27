<?php

class Approval_item extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_item');
 		if ($this->session->userdata('status') != 'login') {
				redirect(base_url("login"));
		}
	}
	function index(){
		$data['lisa']['title_h']        = 'Approval Pengajuan Item';
		$par_id = $this->session->userdata("id_user");
		$data['item'] = $this->Model_item->hasApprove();
		$this->template->view('user/view_approved_item',$data);
	}
	
	function tambah_item(){
		$data['lisa']['title_h']        = 'Approval Pengajuan item';
		$this->template->view('user/view_tambah_approved_item',$data);
	}
	function aksi_tambah(){
		$user_id	   = $this->session->userdata('id_user');
		$tgl_pengajuan = $this->input->post('tgl_pengajuan');
		$this->load->library(array('upload','image_lib'));
			
		$nmfile					    = "Approval_item".$tgl_pengajuan;//nama file
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
		$cek = $this->Model_item->input_data($data,'tb_approved_item');
		if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data approval pengajuan item telah ditambahkan
                            </div>');
			redirect('user/approval_item');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data approval pengajuan item tidak berhasil ditambahkan
                            </div>');
			redirect('user/approval_item');
		}
	}
	public function hapus($id_app_item){
        $id_app_item = $this->input->post('id_app_item');
        $this->Model_item->delete_item($id_app_item);
    }
    function edit($id_app_item){
    	$where = array(
    		'id_app_item' => $id_app_item,
    	);
    	$data['lisa']['title_h']        = 'Edit Approved Pengajuan item';
    	$data['it'] = $this->Model_item->edit_data($where,'tb_approved_item')->row();

 		$this->template->view('user/view_editt',$data);
    }
    function aksi_update(){
    	$id_app_item = $this->input->post('id_app_item');
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
							'id_app_item'	  => $id_app_item,
							'tgl_pengajuan'   => $tgl_pengajuan,
							'file_diajukan'   => $gbr['file_name'],
							'status1'		  => '0',
						);
			}
		}
		else
		{
			$data = array(
				  			'id_app_item'	  => $id_app_item,
							'tgl_pengajuan'   => $tgl_pengajuan,
							'status1'		  => '0',
					);
		}
		$where = array(
    		'id_app_item' => $id_app_item,
    	);
    	$cek = $this->Model_item->update_data($where,$data,'tb_approved_item');
    	if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data approval pengajuan item telah diubah
                            </div>');
			redirect('user/approval_item');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data approval pengajuan item tidak berhasil diubah
                            </div>');
			redirect('user/approval_item');
		}
    }

    public function detailItem($id)
    {
    	$model = $this->Model_item->detail('tb_item', ['id_item' => $id])->row();
    	$data = [
    		'model' => $model,
    		'lisa' => [
    			'title_h' => 'Detai Item'
    		]
    	];
    	$this->template->view('user/detail-item',$data);
    }
}
?>