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

    public function wait_for_approve()
    {
    	$model = $this->Model_pengajuan->all('tb_pengajuan', ['status' => 0]);
    	$data['lisa']['title_h']        = 'Approval Pengajuan Supplier';
    	$data['suplier'] = $model;
    	$data['allow_approved'] = true;
		$this->template->view('user/wait-for-approve',$data);
    }


    public function detail($id)
    {
    	$data['lisa']['title_h']        = 'Detail Data';
 		$data['sbu']					= $this->Model_pengajuan->tampil_data('tb_sbu');
 		$data['kategori']				= $this->Model_pengajuan->tampil_data('tb_kategori');
 		$data['company']				= $this->Model_pengajuan->tampil_data('tb_company');
 		$data['produk']					= $this->Model_pengajuan->tampil_data('tb_produk');
 		$data['location']				= $this->Model_pengajuan->tampil_data('tb_location');
 		$data['departement']			= $this->Model_pengajuan->tampil_data('tb_departement');
 		$data['project']				= $this->Model_pengajuan->tampil_data('tb_project');
 		$data['future']					= $this->Model_pengajuan->tampil_data('tb_future');
 		$data['intercompany']			= $this->Model_pengajuan->tampil_data('tb_intercompany');
 		$data['account']				= $this->Model_pengajuan->tampil_data('tb_account');
 		$data['usaha']				    = $this->Model_pengajuan->tampil_data('tb_usaha');
 		$data['sup'] = $this->Model_pengajuan->edit_data(['id_pengajuan' => $id],'tb_pengajuan')->row();
 		$this->template->view('user/detail-approval',$data);
    }

    public function has_approved()
    {
    	$model = $this->Model_pengajuan->all('tb_pengajuan', ['status' => 1]);
    	$data['lisa']['title_h']        = 'Approval Pengajuan Supplier';
    	$data['suplier'] = $model;
    	$data['allow_approved'] = false;
		$this->template->view('user/wait-for-approve',$data);
    }

    public function do_approved($id)
    {
    	if($this->session->userdata('level-user') == 2)
    		$by = 2;
    	else 
    		$by = 3;
    	$this->Model_pengajuan->update_data(['id_pengajuan' => $id], ['status' => 1, 'approve_by' => $by], 'tb_pengajuan');
    	redirect(['user/approval/detail/'.$id]);
    }

    public function approve_multi()
    {
    	if($this->input->post('setuju')){
			$id_pengajuan = $this->input->post('pengajuan');
			if(is_null($id_pengajuan)){
	 			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                Tidak ada data pengajuan supplier yang dipilih
	                            </div>');
				redirect('user/approval/wait_for_approve');
 		    }
			else if (is_array($id_pengajuan) || is_object($id_pengajuan)){
			    if($this->session->userdata('level-user') == 2)
		    		$by = 2;
		    	else 
		    		$by = 3;
			    foreach($id_pengajuan as $row){
					$data 		= array(
						'id_pengajuan' => $row, 'status'=>1, 'approve_by' => $by
					);
					$where = array(
						'id_pengajuan'=>$row
					);
					$this->Model_pengajuan->update_data($where,$data,'tb_pengajuan');
					
				}
				$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data pengajuan supplier telah disetujui
                            </div>');
				redirect('user/approval/wait_for_approve');
			}
		}
    }
}
?>