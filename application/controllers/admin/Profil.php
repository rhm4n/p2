<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		if($this->session->userdata('is_login') !== TRUE ){
			redirect('Auth');
		}
		$this->load->model('Tim_model','tim');
		$this->load->model('Profil_model','profil');
		$this->load->model('Layanan_model','layanan');
		$this->load->model('Tim_model','tim');

	}

	// CLEAR
	public function perusahaan()
	{

		$data = array(
			'title' 	=> 'Profil',
			'head' 		=> 'Profil Perusahaan',
			'content' 	=> 'admin/profil/perusahaan',
			'data'		=> $this->profil->get_data(),
		);	

		$this->load->view('admin/layouts/master', $data);
	}

	// CLEAR
	public function save_perusahaan(){

		$id  			 	= $this->input->post('id');

		// var_dump($id);

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

		$data['nama_pt'] 	= $this->input->post('nama_pt');
		$data['alamat'] 	= $this->input->post('alamat');
		$data['deskripsi'] 	= $this->input->post('deskripsi');
		$data['kontak'] 	= $this->input->post('kontak');

		if($id == ""){
			$this->profil->insert($data);
		}else{
			$this->profil->update($data, $id);
		}

		redirect('admin/profil/perusahaan');

	}

	public function layanan()
	{

		$data = array(
			'title' 	=> 'Profil',
			'head' 		=> 'Layanan Perusahaan',
			'content' 	=> 'admin/profil/view_layanan',
			'data'		=> $this->layanan->get_data(),
		);	

		$this->load->view('admin/layouts/master', $data);
	}

	public function input_layanan($idEdit=null)	{

		$data = $idEdit == null ? null : $this->layanan->get_detail($idEdit);

		$data = array(
			'title' 	=> 'Profil',
			'head' 		=> 'Layanan Perusahaan',
			'content' 	=> 'admin/profil/layanan',
			'data'		=> $data,
		);	

		$this->load->view('admin/layouts/master', $data);
	}



	public function save_layanan(){

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

		$data['jenis_layanan'] 	= $this->input->post('jenis_layanan');
		$data['keterangan'] 	= $this->input->post('keterangan');
		
		if($id == ""){
			$this->layanan->insert($data);
		}else{
			$this->layanan->update($data, $id);
		}

		redirect('admin/profil/layanan');

	}

	public function tim()
	{

		$data = array(
			'title' 	=> 'Profil',
			'head' 		=> 'Tim Kami',
			'content' 	=> 'admin/profil/view_tim',
			'data'		=> $this->tim->get_data(),
		);	

		$this->load->view('admin/layouts/master', $data);
	}

	public function input_tim($idEdit=null)	{

		$data = $idEdit == null ? null : $this->tim->get_detail($idEdit);

		$data = array(
			'title' 	=> 'Profil',
			'head' 		=> 'Tim Kami',
			'content' 	=> 'admin/profil/tim',
			'data'		=> $data,
		);	

		$this->load->view('admin/layouts/master', $data);
	}



	public function save_tim(){

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

		$data['nama'] 	= $this->input->post('nama');
		$data['jabatan'] 	= $this->input->post('jabatan');
		
		if($id == ""){
			$this->tim->insert($data);
		}else{
			$this->tim->update($data, $id);
		}

		redirect('admin/profil/tim');

	}

	public function del_tim($id)
	{
		//HAPUS FILE LAMPIRAN
		$foto = $this->input->post('foto');
		unlink("./" . $foto);
		

		$this->tim->delete($id);
		$this->session->set_flashdata("berhasil","Berhasil Menghapus");

		redirect('admin/profil/tim'); 	
	}

	public function del_layanan($id)
	{
		//HAPUS FILE LAMPIRAN
		$foto = $this->input->post('foto');
		unlink("./" . $foto);
		
		$this->layanan->delete($id);
		$this->session->set_flashdata("berhasil","Berhasil Menghapus");

		redirect('admin/profil/layanan'); 	
	}



}
?>
