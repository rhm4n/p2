<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Pelanggan_model','pelanggan');
		$this->load->model('Rumah_model','rumah');

	}


	public function save(){

		$chartKode = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$kode = substr(str_shuffle($chartKode), 0, 4);
		
		$data['kode_booking'] 	= $kode;

		if(empty($this->input->post('referral'))){
			$ref = '2KZ8RV4';
		}else{
			$ref = $this->input->post('referral');
		}

		$id_rumah = $this->input->post('id_rumah');

		$date =  date_create(date("Y-M-d"));
		date_add($date , date_interval_create_from_date_string('7 days'));

		$batas_waktu =  date_format($date, 'Y-m-d');

		// echo date("d-m-Y");
		// echo " - ".$batas_waktu;
		// die();
		
		$data['referral'] 		= $ref;
		$data['id_rumah'] 		= $id_rumah;
		$data['nama'] 			= $this->input->post('nama');
		$data['no_hp']			= $this->input->post('no_hp');
		$data['email']			= $this->input->post('email');
		$data['pekerjaan']		= $this->input->post('pekerjaan');
		$data['batas_waktu']	= $batas_waktu; 
		$data['status_berkas']	=  1; 

		$data_rumah['status_rumah'] = 1;


		$this->pelanggan->insert($data);
		$this->rumah->update($data_rumah, $id_rumah);

		$this->session->set_flashdata("notif","Catat / FOTO Kode Booking Anda <br><h4>Kode Booking Anda : ".$kode."</h4>");
		$this->session->set_flashdata("kode", $kode);
		redirect('beranda');
	}
}
