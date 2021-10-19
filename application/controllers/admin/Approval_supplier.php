<?php

class Approval_supplier extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
 		$this->load->library('template');
 		$this->load->model('Model_pengajuan');
 		if ($this->session->userdata('status') != 'login_admin') {
				redirect(base_url("login"));
		}
	}
	function index(){
		$data['lisa']['title_h']        = 'Admin | Approval Pengajuan Supplier';
		$data['pengajuan'] = $this->Model_pengajuan->tampil_app_supplier();
		$this->template->view('admin/view_approval_pengajuan',$data);
	}
	public function hapus($id_app_sup){
        $id_app_sup = $this->input->post('id_app_sup');
        $this->Model_pengajuan->delete_suplier($id_app_sup);
    }
    function edit($id_app_sup){
    	$where = array(
    		'id_app_sup' => $id_app_sup,
    	);
    	$data['lisa']['title_h']        = 'Admin | Edit Approval_supplier Pengajuan Supplier';
    	$data['pe'] = $this->Model_pengajuan->edit_data($where,'tb_approved_supplier')->row();

 		$this->template->view('admin/view_edit_approved_supplier',$data);
    }
    function aksi_update(){
    	$id_app_sup = $this->input->post('id_app_sup');
    	$tgl_acc    = $this->input->post('tgl_acc');
		$this->load->library(array('upload','image_lib'));
			
		$nmfile					    = "bukti_supplier".$tgl_acc;//nama file
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
							'id_app_sup'   => $id_app_sup,
							'tgl_acc'      => $tgl_acc,
							'file_acc'     => $gbr['file_name'],
							'status1'		  => '1',
						);
			}
		}
		else
		{
			$data = array(
				  			'id_app_sup'	  => $id_app_sup,
							'tgl_acc'         => $tgl_acc,
							'status1'		  => '1',
					);
		}
		$where = array(
    		'id_app_sup' => $id_app_sup,
    	);
    	$cek = $this->Model_pengajuan->update_data($where,$data,'tb_approved_supplier');
    	if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data bukti approval pengajuan supplier telah ditambahkan. Proses pengajuan Supplier selesai.
                            </div>');
			redirect('admin/approval_supplier');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data bukti approval  pengajuan supplier tidak berhasil ditambahkan
                            </div>');
			redirect('user/approval_supplier');
		}
    }
}
?>