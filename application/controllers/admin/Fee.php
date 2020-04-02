<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fee extends CI_Controller {

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

		$data = array(
			'title' 				=> 'Fee Marketing',
			'head' 					=> 'Fee Marketing',
			'title_breadcrumb' 		=> 'Fee Marketing',
			'content' 				=> 'admin/fee_marketing',
			'data'					=> $this->pelanggan->get_fee_marketing(),
		);	

		// $eko = $this->pelanggan->get_fee($_SESSION['id']);
		// print_r($data);

		// die();

		$this->load->view('admin/layouts/master', $data);
		
	}
}