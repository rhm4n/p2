<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('User_model','user');

	}


	public function save()
	{	

		//PROSES UPLOAD FILE
		$filename						= str_replace(" ", "_", time() . '_' . $_FILES['foto']['name']);
		$lampiran						= 'assets/upload/berkas_marketing/' . $filename;

		$config['upload_path']          = './assets/upload/berkas_marketing/';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 5000;


		/*Berubah jadi Underscore di Folder*/
		$config['file_name'] 			= $filename;

		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		if($_FILES['foto']['name'] != ''){
			
			/*Berunah Ada titiknya di DB*/
			$data['foto']				= $lampiran;

			if (!$this->upload->do_upload('foto')){

				$error 	= $this->upload->display_errors('', '');
				$data 	= $error;
				
				$this->session->set_flashdata('error', $data);
				redirect('auth'); 	
			
			}

		}elseif($_FILES['foto']['name'] == null ){
			$this->session->set_flashdata('error', 'Gagal upload Berkas');
			redirect('auth');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data['nama'] 		= $this->input->post('nama');
		$data['no_hp'] 		= $this->input->post('no_hp');
		$data['alamat'] 	= $this->input->post('alamat');
		$data['no_rek'] 	= $this->input->post('no_rek');
		$data['an_rek'] 	= $this->input->post('an_rek');
		$data['bank'] 	= $this->input->post('bank');
		
		$data['username']	= $username;
		$data['password']	= md5($password);
		
		$this->user->insert($data);
		$this->session->set_flashdata("notif","Username Anda : ".$username.'<br>Password : '.$password);
		
		redirect('auth'); 	
	}
}
