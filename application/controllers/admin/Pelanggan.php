<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		if($this->session->userdata('is_login') !== TRUE ){
			redirect('Auth');
		}
		$this->load->model('Pelanggan_model','pelanggan');
		$this->load->model('Rumah_model','rumah');

	}

	public function index()
	{
		if($_SESSION['level'] == 1){
			$data = $this->pelanggan->get_data();
		}else{
			$data  = $this->pelanggan->get_detail($_SESSION['id']);
		}

		$data = array(
			'title' 				=> 'Pelanggan',
			'head' 					=> 'Pelanggan',
			'title_breadcrumb' 		=> 'Daftar Pelanggan',
			'content' 				=> 'admin/pelanggan',
			'data'					=> $data,
			'fee'					=> $this->pelanggan->get_fee($_SESSION['id']),
		);	

		// $eko = $this->pelanggan->get_fee($_SESSION['id']);
		// print_r($data);

		// die();

		$this->load->view('admin/layouts/master', $data);
		
	}

	public function transfer_fee(){
		$id = $this->input->post('id_rumah');	
		$data['klaim'] = true;
		$this->rumah->update($data, $id);

		
		$this->session->set_flashdata("notif","Sudah ditransfer");
		redirect('admin/fee'); 	
	}

	public function status_pelanggan($id){
		$status_berkas= $this->input->post('status_berkasan');
		$id_rumah = $this->input->post('id_rumah');

		echo "berkas ".$status_berkas;
		echo "pelanggan ".$id;
		echo "rumah ".$id_rumah;
		

		if($status_berkas == 1){
			/*Tersedia*/
			$data_rumah['status_rumah'] = 1;

		//proses booking sampai pemberkasan	
		}elseif($status_berkas >= 2 && $status_berkas <= 4){
			/*Terbooking*/
			$data_rumah['status_rumah'] = 2;
			
		//sudah akad		
		}elseif($status_berkas == 5){
			/*Terjual*/
			$data_rumah['status_rumah'] = 3;
		}elseif($status_berkas == 6){
			/*Tersedia*/
			$data_rumah['status_rumah'] = 0;
		}

		$data['status_berkas'] = $status_berkas;
		print_r($data_rumah);
		//die();

		$this->rumah->update($data_rumah, $id_rumah);
		$this->pelanggan->update($data, $id);
		redirect('admin/pelanggan'); 	
	}


	public function delete($id)
	{
		$data = $this->pelanggan->delete($id);
		$this->session->set_flashdata("berhasil","Berhasil Menghapus");

		redirect('admin/pelanggan'); 	
	}


}

?>
