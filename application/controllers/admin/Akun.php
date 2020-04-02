<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		if($this->session->userdata('is_login') !== TRUE ){
			redirect('Auth');
		}
		$this->load->model('User_model','user');

	}

	public function index()
	{

		$data = array(
			'title' 				=> 'Akun Marketing',
			'head' 					=> 'Akun Marketing',
			'title_breadcrumb' 		=> 'Daftar Akun',
			'content' 				=> 'admin/akun_marketing',
			'data'					=> $this->user->get_data(),
		);	

		$this->load->view('admin/layouts/master', $data);
	}

	public function kode_referral()
	{

		$data = array(
			'title' 				=> 'Kode Referral',
			'head' 					=> 'Kode Referral',
			'title_breadcrumb' 		=> 'Referral Form',
			'content' 				=> 'admin/kode_referral',
			'data'					=> $this->user->get_detail($_SESSION['id']),
		);	

		$this->load->view('admin/layouts/master', $data);
	}

	public function save_kode()
	{	
		$id 				= $_SESSION['id'];
		
		$chartKode = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$kode = substr(str_shuffle($chartKode), 0, 6);
		$data['referral'] 	= $kode.$id;
		
		$this->user->update($data,$id);
		$this->session->set_flashdata("berhasil","Kode Referral Anda siap digunakan!!");
		
		redirect('admin/akun/kode_referral'); 	
	}

	public function status_akun(){
		$status= $this->input->post('status');
		$id = $this->input->post('id');

		// echo $status;
		// echo $id;
		// die();


		$data['status'] = $status;
		

		$this->user->update($data, $id);
		
		echo "Berhasil";
	}

	public function del_akun($id)
	{

		//HAPUS FILE LAMPIRAN
		unlink("./" . $_GET['link']);
		
		$this->user->delete($id);
		$this->session->set_flashdata("berhasil","Berhasil Menghapus");

		redirect('admin/akun'); 	
	}


}

?>
