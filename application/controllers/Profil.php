<?php

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Projek_model','projek');
		$this->load->model('Rumah_model','rumah');
		$this->load->model('Spektek_model','spektek');
		$this->load->model('Profil_model','profil');
		$this->load->model('Layanan_model','layanan');
		$this->load->model('Tim_model','tim');

	}

	public function perusahaan(){
		$data = array(
			'title' 	=> 'Profil',
			'head' 		=> 'Tentang Perusahaan',
			'content' 	=> 'profil/perusahaan',
			'data'		=> $this->profil->get_data(),
		);	

		$this->load->view('layouts/master_second', $data);
	}

	public function portofolio(){
		$data = array(
			'title' 	=> 'Profil',
			'head' 		=> 'Portofolio',
			'content' 	=> 'profil/portofolio',
			'data'		=> $this->layanan->get_data(),
		);	

		$this->load->view('layouts/master_second', $data);
	}

	public function kontak(){
		$data = array(
			'title' 	=> 'Profil',
			'head' 		=> 'Kontak Perusahaan',
			'content' 	=> 'profil/kontak',
			'data'		=> $this->profil->get_data(),
		);	

		$this->load->view('layouts/master_second', $data);
	}

	public function tim(){
		$data = array(
			'title' 	=> 'Profil',
			'head' 		=> 'Tim Kami',
			'content' 	=> 'profil/tim',
			'data'		=> $this->tim->get_data(),
		);	

		$this->load->view('layouts/master_second', $data);
	}

}
