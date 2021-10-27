<?php

class Item extends CI_Controller
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
		$data['lisa']['title_h']        = 'Admin | Data Pengajuan Item';
		$data['item'] = $this->Model_item->tampil_item('tb_item');
		$this->template->view('admin/view_pengajuan_item',$data);
	}
	function cetak(){
		$data['item'] = $this->Model_item->cetak_excel()->result();
		$this->load->view('admin/view_cetak_item',$data);
	}
	function status(){
		$id_item = $this->input->post('id_item');
		$data = array(
			'status' => '0'
		);
		$where = array(
			'id_item' => $id_item
		);
		$ceki = $this->Model_item->update_data($where,$data,'tb_item');
		if($ceki==0){
				$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data pengajuan item tidak disetujui
                            </div>');
			redirect('admin/item');
		}
	}
	function status2(){
		$id_item = $this->input->post('id_item');
		$data = array(
			'status' => '1'
		);
		$where = array(
			'id_item' => $id_item
		);
		$ceki = $this->Model_item->update_data($where,$data,'tb_item');
		if($ceki==0){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data pengajuan item telah disetujui
                            </div>');
			redirect('admin/item');
		}
	}
	function multipel_item(){
		if($this->input->post('setuju')){
			$id_item = $this->input->post('item');
			if(is_null($id_item)){
	 			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                Tidak ada data pengajuan item yang dipilih
	                            </div>');
				redirect('admin/item');
	 		}
			else if(is_array($id_item)||is_object($id_item)){
				foreach($id_item as $item){
					$data = array(
						'status'=>'1'
					);
					$where = array(
						'id_item' =>$item
					);

					$this->Model_item->update_data($where,$data,'tb_item');
				}
				$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data pengajuan item telah disetujui
                            </div>');
					redirect('admin/item','refresh');

			}
		}
		elseif($this->input->post('tidak')){
			$id_item = $this->input->post('item');
			if(is_null($id_item)){
	 			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                Tidak ada data pengajuan item yang dipilih
	                            </div>');
				redirect('admin/item');
	 		}
			else if(is_array($id_item)||is_object($id_item)){
				foreach($id_item as $item){
					$data = array(
						'status'=>'2'
					);
					$where = array(
						'id_item' =>$item
					);

					$this->Model_item->update_data($where,$data,'tb_item');
				}
				$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data pengajuan item tidak disetujui
                            </div>');
					redirect('admin/item','refresh');

			}
		}
		elseif ($this->input->post('cetak')) {
			$id_item = $this->input->post('item');
			if(is_null($id_item)){
	 			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                Tidak ada data pengajuan item yang dipilih
	                            </div>');
				redirect('admin/item');
	 		}else{
				$fg = [];
					$data = [];
				if(is_array($id_item)||is_object($id_item)){
					foreach($id_item as $item){
						$where = array(
							'id_item' => $item
						);
					  	$fg['item'] = $this->Model_item->cetak_multivel($where)->result();
						$data[] = $fg;
					}
				}
			    $this->load->view('admin/view_cetak',['hasil' => $data]);
			}
		}
	}
	function edit_item($id_item){
 		$data['lisa']['title_h']        = 'Edit Data Pengajuan Item';
 		$data['usaha']                  = $this->Model_item->tampil_data('tb_usaha');
 		$data['sbu']					= $this->Model_item->tampil_data('tb_sbu');
 		$data['des_coa']				= $this->Model_item->tampil_data('tb_account');
 		$data['satuan']					= $this->Model_item->tampil_data('tb_satuan');
 		$where = array(
				'id_item' => $id_item,
		);

		$data['item'] = $this->Model_item->edit_data($where,'tb_item')->row();

 		$this->template->view('admin/view_edit_item',$data);
 	}
 	function get_account($nama_account){
 		$where = array(
 			'kode_account' => $nama_account,
 		);

 		$data = $this->Model_item->edit_data($where,'tb_account')->row();
 		if(is_null($data)){
 			$respon = ['execute' => false, 'message' => 'Data Tidak Ditemuka'];
 		}else{
 			$respon = ['execute' => true, 'message' => $data];
 		}
 		echo json_encode(['respon' => $respon]);
 	}
 	public function hapus($id_item = null){
        $id_item = $this->input->post('id_item');
        $this->Model_item->delete_by_id($id_item);
    }

    function aksi_update(){
 		$user_id			= $this->session->userdata('id_user');
 		$id_item			= $this->input->post('id_item');
 		$nama_re			= $this->input->post('nama_re');
 		$asal_sbu			= $this->input->post('asal_sbu');
 		$tgl_pe			    = $this->input->post('tgl_pen');
 		$sign1				= $this->input->post('sign1');
 		$sign2				= $this->input->post('sign2');
 		$sign3				= $this->input->post('sign3');
 		$pos1				= $this->input->post('pos1');
 		$pos2				= $this->input->post('pos2');
 		$pos3				= $this->input->post('pos3');
 		$sig1				= $this->input->post('sig1');
 		$sig2				= $this->input->post('sig2');
 		$sig3				= $this->input->post('sig3');
 		$dos1				= $this->input->post('dos1');
 		$dos2				= $this->input->post('dos2');
 		$dos3				= $this->input->post('dos3');
 		$des_item			= $this->input->post('des_item');
 		$jenis_item			= $this->input->post('jenis_item');
 		$satuan				= $this->input->post('satuan');
 		$harga				= $this->input->post('harga');
 		$des_coa			= $this->input->post('des_coa');
 		$coa				= $this->input->post('kode_account');
 		$jenis_item_coa		= $this->input->post('jenis_item_coa');
 		
				$data  = array(
					'id_item'			=> $id_item,
					'user_id'			=> $user_id,
					'nama_re'			=> $nama_re,
					'asal_sbu'			=> $asal_sbu,
					'tgl_pe'			=> $tgl_pe,
					'sign1'				=> $sign1,
					'sign2'				=> $sign2,
					'sign3'				=> $sign3,
					'pos1'				=> $pos1,
					'pos2'				=> $pos2,
					'pos3'				=> $pos3,
					'sig1'				=> $sig1,
					'sig2'				=> $sig2,
					'sig3'				=> $sig3,
					'dos1'				=> $dos1,
					'dos2'				=> $dos2,
					'dos3'				=> $dos3,
					'des_item'			=>$des_item,
					'jenis_item'		=>$jenis_item,
					'satuan'			=>$satuan,
					'harga'				=>$harga,
					'des_coa'			=>$des_coa,
					'coa'				=>$coa,
					'jenis_item_coa'	=>$jenis_item_coa,
				);
			
		$where = array (
			'id_item' => $id_item,
		);
		$cek = $this->Model_item->update_data($where,$data,'tb_item');
		if($cek=1){
			$this->session->set_flashdata('message', '<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data pengajuan item telah diubah
                            </div>');
			redirect('admin/item');
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               Data pengajuan item tidak diubah
                            </div>');
			redirect('admin/item');
		}
 	}
}
?>