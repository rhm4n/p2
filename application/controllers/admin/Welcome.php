<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		if($this->session->userdata('is_login') !== TRUE ){
			redirect('Auth');
		}
		$this->load->model('User_model','user');
		$this->load->model('Pelanggan_model','pelanggan');

	}

	public function index()
	{

		$data = array(
			'title' 	=> 'Dashboard',
			'head' 		=> 'Dashboard',
			'content' 	=> 'admin/dashboard',
			'data_ref'		=> $this->user->get_detail($_SESSION['id']),
			'data_akun'		=> $this->user->get_akun(),
			'data_pelanggan'		=> $this->pelanggan->get_fee($_SESSION['id']),
			'data_booking'		=> $this->pelanggan->get_booking($_SESSION['id']),
			'data_selesai'		=> $this->pelanggan->get_pelanggan_selesai($_SESSION['id']),
		);	

		$this->load->view('admin/layouts/master', $data);
	}

}
?>
