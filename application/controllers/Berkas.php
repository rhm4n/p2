<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Berkas_model','berkas');
		$this->load->model('Pelanggan_model','pelanggan');

	}

	public function index($kode=null){

		$berkas = $this->berkas->get_detail($kode);
		$pelanggan = $this->pelanggan->get_kode($kode);

		$data = array(
			'title' 	=> 'Form Pemberkasan',
			'title_breadcrumb' 	=> 'Form Pemberkasan',
			'head' 		=> 'Form Pemberkasan',
			'content' 	=> 'pemberkasan',
			'kode' 				=> $kode,
			'berkas' 			=> $berkas,
			'pelanggan'			=> $pelanggan

		);	

		$this->load->view('layouts/master_second', $data);
	}


	public function verifikasi()
	{	

		$kode = $this->input->post('kode');
		
		$validasi = $this->pelanggan->get_verifikasi($kode);
		
		if(!$validasi){
			$this->session->set_flashdata("notifpemberkasan","<h4>Maaf!!!</h4><br>Kode Booking Anda Belum Aktif");

			redirect('projek');
		}elseif($validasi[0]->status_berkas >= 4){
			$this->session->set_flashdata("notifpemberkasan","<h4>Maaf!!!</h4><br>Pemberkasan Anda Telah di Tutup");

			redirect('projek');
		}

		redirect('berkas/index/'.$kode);
		
	}

	public function saveKtp(){
		if($_FILES['file']['name'] != ''){
			
			echo "<button class='button button-3d button-mini button-rounded button-white button-light'><i class='icon-ok'></i></button>";
			//echo "<div class='fbox-icon'><i class='icon-ok'></i></div>";
		}

	}

	public function save()
	{	
		
		$id = $this->input->post('id_berkas');
		$kode = $this->input->post('kode_booking');
		$pekerjaan = $this->input->post('pekerjaan');
		
		$data['id_pelanggan'] = $this->input->post('id_pelanggan');;

		if($pekerjaan == 1){
			$file_upload = ['ktp','kk','npwp','ket_nikah','rek_koran','ket_lurah','pas_foto','ket_usaha','ket_penghasilan','situ_siup'];
		}elseif($pekerjaan == 2){
			$file_upload = ['ktp','kk','npwp','ket_nikah','rek_koran','ket_lurah','pas_foto','slip_gaji','spt','sk_terakhir'];
		}else{
			$file_upload = ['ktp','kk','npwp','ket_nikah','rek_koran','ket_lurah','pas_foto','slip_gaji','spt','surat_kerja_swasta'];
		}

		for($i = 0; $i < count($file_upload); $i++){

			// PROSES UPLOAD FILE
			$filename						= str_replace(" ", "_", $kode.'_'.$file_upload[$i].'_'.$_FILES[$file_upload[$i]]['name']);
			$lampiran						= 'assets/upload/berkas_pelanggan/'.$filename;

			$config['upload_path']          = './assets/upload/berkas_pelanggan/';
			$config['allowed_types']        = 'jpg|jpeg|png|pdf';
			$config['max_size']             = 5000;
			$config['file_name'] 						= $filename;

			$file_old = $file_upload[$i].'_lama'; 
			$file_link = $this->input->post($file_old);

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($_FILES[$file_upload[$i]]['name'] != ''){
				
				$data[$file_upload[$i]]				= $lampiran;

				if (!$this->upload->do_upload($file_upload[$i])){
					$error 	= $this->upload->display_errors('', '');
					$data2 	= $error;
					
					$this->session->set_flashdata('error', $data2);
					redirect('Berkas/index/'.$kode);
				}else{
					if($file_link != ''){
						unlink("./".$file_link);	
					}
				}

			}else{
				if($file_link != ''){
					$data[$file_upload[$i]]				= $file_link;	
				}else{
					$data[$file_upload[$i]]				= '';	
				}
			}	
		}
		
		if($id == ''){
			$save 	= $this->berkas->insert($data);
		}else{
			$save 	= $this->berkas->update($data, $id);
		}

		if($save){
			$this->session->set_flashdata("berhasil","Berhasil simpan berkas");
		}else{
			$this->session->set_flashdata("error","Gagal simpan berkas");
		}

		redirect('Berkas/index/'.$kode);
		
	}
}
