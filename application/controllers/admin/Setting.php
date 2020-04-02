<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		if($this->session->userdata('is_login') !== TRUE ){
			redirect('Auth');
		}
		$this->load->model('Slideshow_model','slide');

	}

	public function slideshow()
	{

		$data = array(
			'title' 	=> 'Setting',
			'head' 		=> 'Layanan Perusahaan',
			'content' 	=> 'admin/setting/view_slideshow',
			'data'		=> $this->slide->get_data(),
		);	

		$this->load->view('admin/layouts/master', $data);
	}

	public function input_slideshow($idEdit=null)	{

		$data = $idEdit == null ? null : $this->slide->get_detail($idEdit);

		$data = array(
			'title' 	=> 'Setting',
			'head' 		=> 'Layanan Perusahaan',
			'content' 	=> 'admin/setting/slideshow',
			'data'		=> $data,
		);	

		$this->load->view('admin/layouts/master', $data);
	}



	public function save_slideshow(){

		$id  			 	= $this->input->post('id');

		if($_FILES['foto']['name'] != ''){

			//PROSES UPLOAD FILE
			$filename 						= str_replace(".", "", $_FILES['foto']['name']);
			$filename						= str_replace(" ", "_", time() . '_' . $filename);
			$filename 						= $filename.'.jpg'; 
			
			$lampiran						= 'assets/upload/' . $filename;

			$config['upload_path']          = './assets/upload/';
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['max_size']             = 5000;

			/*Berubah jadi Underscore di Folder*/
			$config['file_name'] 			= $filename;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			
			/*Berunah Ada titiknya di DB*/
			$data['foto']				= $lampiran;

			if (!$this->upload->do_upload('foto')){

				$error 	= $this->upload->display_errors('', '');
				$data 	= $error;
				
				$this->session->set_flashdata('error', $data);
				redirect('admin/projek/input1');
			}else{

				$foto_lama = $this->input->post('foto_lama');
				if($foto_lama != ''){
					unlink("./".$foto_lama);	
				}
			}

		}elseif($_FILES['foto']['name'] == null && $id == ""){
			$data['foto']				= "";
			// $this->session->set_flashdata('error', 'Gagal upload gambar');
			// redirect('admin/projek/input1');

			
		}

		$data['judul'] 	= $this->input->post('judul');
		$data['keterangan'] 	= $this->input->post('keterangan');
		
		
		if($id == ""){
			$this->slide->insert($data);
		}else{
			$this->slide->update($data, $id);
		}

		redirect('admin/setting/slideshow');

	}


	public function del_slideshow($id)
	{
		//HAPUS FILE LAMPIRAN
		$foto = $this->input->post('foto');
		unlink("./" . $foto);
		

		$this->tim->delete($id);
		$this->session->set_flashdata("berhasil","Berhasil Menghapus");

		redirect('admin/setting/slideshow');
	}

}	