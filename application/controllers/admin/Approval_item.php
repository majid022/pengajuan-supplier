<?php

class Approval_item extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_item');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
	}
	function index(){
		$data['lisa']['title_h']        = 'Admin | Approval Pengajuan Item';
		$data['item'] = $this->Model_item->tampil_app_item();
		$this->template->view('admin/view_approval_item',$data);
	}
	public function hapus($id_app_item){
        $id_app_item = $this->input->post('id_app_item');
        $this->Model_item->delete_suplier($id_app_item);
    }
    function edit($id_app_item){
    	$where = array(
    		'id_app_item' => $id_app_item,
    	);
    	$data['lisa']['title_h']        = 'Admin | Edit Approval Pengajuan Item';
    	$data['it'] = $this->Model_item->edit_data($where,'tb_approved_item')->row();

 		$this->template->view('admin/view_edit_approved_item',$data);
    }
    function aksi_update(){
    	$id_app_item = $this->input->post('id_app_item');
    	$tgl_acc = $this->input->post('tgl_acc');
		$this->load->library(array('upload','image_lib'));
			
		$nmfile					    = "bukti_item".$tgl_acc;//nama file
		$config['upload_path']		= './assets/upload/finish/';//penyimpanan
		$config['allowed_types']	= 'xls|xlsx';//type 
		$config['file_name']		= $nmfile;//

		$this->upload->initialize($config);
		
		if($_FILES['file_acc']['name'])
		{
			if($this->upload->do_upload('file_acc'))
			{
				$gbr = $this->upload->data();
				$data  = array(
							'id_app_item'   => $id_app_item,
							'tgl_acc'      => $tgl_acc,
							'file_acc'     => $gbr['file_name'],
							'status1'		  => '1',
						);
			}
		}
		else
		{
			$data = array(
				  			'id_app_item'	  => $id_app_item,
							'tgl_acc'         => $tgl_acc,
							'status1'		  => '1',
					);
		}
		$where = array(
    		'id_app_item' => $id_app_item,
    	);
    	$cek = $this->Model_item->update_data($where,$data,'tb_approved_item');
    	if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data bukti approval pengajuan item telah ditambahkan. Proses pengajuan item selesai.
                            </div>');
			redirect('admin/approval_item');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data bukti approval  pengajuan item tidak berhasil ditambahkan
                            </div>');
			redirect('user/approval_item');
		}
    }
}
?>