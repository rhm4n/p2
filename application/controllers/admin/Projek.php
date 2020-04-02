<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projek extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		if($this->session->userdata('is_login') !== TRUE ){
			redirect('Auth');
		}
		$this->load->model('Projek_model','projek');
		$this->load->model('Spektek_model','spektek');
		$this->load->model('Rumah_model','rumah');

	}

	public function index()
	{
		$data = array(
			'title' 				=> 'Projek',
			'head' 					=> 'Projek',
			'title_breadcrumb' 		=> 'Daftar Projek',
			'content' 				=> 'admin/projek/index',
			'data'					=> $this->projek->get_detail($_SESSION['id']),
			'data_spektek'			=> $this->spektek->get_detail_id_projek($_SESSION['id']),
		);	


		// print_r($data['data']);
		// die();

		$this->load->view('admin/layouts/master', $data);
	}


	public function input($idEdit = null)
	{
		
		$data = array(
			'title' 				=> 'Informasi Projek',
			'head' 					=> 'Informasi Projek',
			'title_breadcrumb' 		=> 'Input Projek',
			'content' 				=> 'admin/projek/input',
			'data'					=> $this->projek->get_edit($idEdit),
		);	

		$this->load->view('admin/layouts/master', $data);
	}

	public function spektek($id_projek = null, $id_spektek=null)
	{
		
		$data = array(
			'title' 				=> 'Informasi Projek',
			'head' 					=> 'Informasi Projek',
			'title_breadcrumb' 		=> 'Input Projek',
			'content' 				=> 'admin/projek/spektek',
			'lokasi'				=> $this->projek->set_spektek($id_projek),
			'data'					=> $this->spektek->get_data($id_projek),
			'data_edit'				=> $this->spektek->get_data_edit($id_spektek),
		);	

		// print_r($data['data']);
		// die();


		$this->load->view('admin/layouts/master', $data);
	}

	public function save_spektek(){
		$id_projek	 	= $this->input->post('id_projek');
		$data['id_projek'] 	= $id_projek;
		$data['pekerjaan'] 	= $this->input->post('pekerjaan');
		$data['bahan'] 	= $this->input->post('bahan');

		$this->spektek->insert($data);
		redirect('admin/projek/spektek/'.$id_projek);

	}

	public function save()
	{	


		$id 				= $this->input->post('id');
		$lokasi 			= $this->input->post('lokasi');
		$deskripsi 			= $this->input->post('deskripsi');
		$fee				= $this->input->post('fee');

		$fee 				= substr($fee, 4);
		$fee 				= str_replace('.','', $fee);

		$data['fee']		= $fee;
	
		$data['lokasi'] 	= $lokasi;
		$data['id_user'] 	= $_SESSION['id'];	

		//Buat slug
		$string 			= preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $lokasi); 
		$trim 				= trim($string); 
		$slug 				= strtolower(str_replace(",", "", $trim));
		$slug 				= strtolower(str_replace(" ", "-", $slug));
		

		$data['slug'] 	= $slug;

		
		//PROSES UPLOAD FILE
		$filename						= str_replace(" ", "_", time() . '_' . $_FILES['foto']['name']);
		$lampiran						= 'assets/upload/siteplan/' . $filename;

		$config['upload_path']          = './assets/upload/siteplan/';
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
				redirect('admin/projek/input1');
			}else{

				$foto_lama = $this->input->post('foto_lama');
				if($foto_lama != ''){
					unlink("./".$foto_lama);	
				}
			}

		}elseif($_FILES['foto']['name'] == null && $id == ""){
			$this->session->set_flashdata('error', 'Gagal upload gambar');
			redirect('admin/projek/input1');
		}

		if($id == ''){
			$save 	= $this->projek->insert($data);
		}else{
			$save 	= $this->projek->update($data, $id);
		}

		if($save){
			$this->session->set_flashdata("berhasil","Berhasil simpan Data Cabor");
		}else{
			$this->session->set_flashdata("error","Gagal simpan Data Cabor");
		}


		redirect('admin/projek'); 	
		
	}

	public function saveVideo()
	{
		

		$id_projek 		= $this->input->post('id_projek');
		
		//PROSES UPLOAD FILE
		$filename						= str_replace(" ", "_", time() . '_' .$_FILES["foto"]["name"]);
		$lampiran						= 'assets/upload/video/' . $filename;

		$config['upload_path']          = './assets/upload/video';
		$config['allowed_types']        = 'avi|flv|wmv|mp3|mp4';
		$config['max_size']             = 20000;
		$config['remove_spaces'] 		= TRUE;
		$config['file_name'] 			= $filename;


		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('foto')) {

			$error 	= $this->upload->display_errors('', '');
			$data 	= $error;
			$this->session->set_flashdata('error', $data);

		} else {

			$data['video']						= $lampiran;
			$video_lama 		= $this->input->post('video_lama');

			//HAPUS FILE LAMPIRAN
			unlink("./" . $video_lama);

			$this->projek->update($data, $id_projek);
			$this->session->set_flashdata("berhasil", "Berhasil simpan video berita");
		}

		redirect('admin/projek'); 	
	}

	public function jumlah_rumah($id){

		$unit 	= $this->input->post('jumlah');

		for($i = 1; $i <= $unit; $i++){

			$no_rumah = $this->rumah->get_no_rumah($i, $id);

			if($no_rumah != null){
				$no = $no_rumah[0]->no_rumah;

				if($no == $i){
					continue;
				}
			}

			$data['id_projek'] = $id;	
			$data['no_rumah'] = $i;	
			$this->rumah->insert($data);
		}

		$this->session->set_flashdata("notif","Unit Rumah Terbaharui");
		redirect('admin/projek'); 	

	}

	public function delete($id)
	{
		//HAPUS FILE LAMPIRAN
		unlink("./" . $_GET['link1']);
		unlink("./" . $_GET['link2']);

		$this->projek->delete($id);
		$this->session->set_flashdata("berhasil","Berhasil Menghapus");

		redirect('admin/projek'); 	
	}

	public function delete_spektek($id)
	{
		$id_projek = $this->input->post('id_projek');
		$this->spektek->delete($id);
		$this->session->set_flashdata("berhasil","Berhasil Menghapus");

		redirect('admin/projek/spektek/'.$id_projek); 	
	}


}

?>
