<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Slideshow_model','slide');
		$this->load->model('Profil_model','profil');
		$this->load->model('Tim_model','tim');
		$this->load->model('Projek_model','projek');
		$this->load->model('Layanan_model','layanan');

	}

	public function index()
	{
		$data = array(
			'title' 	=> 'Beranda',
			'head' 		=> 'Video Animasi',
			'content' 	=> 'beranda',
			'data' 		=> $this->slide->get_data(3),
			'data_kantor' => $this->profil->get_data(),
			'data_tim'		=> $this->tim->get_data(),
			'data_projek' 	=> $this->projek->get_data(),
			'data_layanan'		=> $this->layanan->get_data(),

		);	

		$this->load->view('layouts/master', $data);
	}
}
