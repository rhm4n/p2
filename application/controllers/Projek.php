<?php

class Projek extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Projek_model','projek');
		$this->load->model('Rumah_model','rumah');
		$this->load->model('Pelanggan_model','pelanggan');
		$this->load->model('Spektek_model','spektek');
		$this->load->model('User_model','user');

	}

	public function index()
	{
				
		$data = array(
			'title' 	=> 'Project',
			'head' 		=> 'Video Animasi',
			'content' 	=> 'project',
			'data' 	=> $this->projek->get_data(),

		);	

		$this->load->view('layouts/master_second', $data);
	}

	function copylink($ref){
		
		$cek = $this->user->get_kode($ref);
		if($cek){
			$data_session = array(
				'kode' 		=> $ref,  
			);
			
			$this->session->set_userdata($data_session);		
		}

		
		redirect('projek');
	}

	public function view($slug){
		
		if(isset($slug)){
			$data = $this->projek->get_posting($slug);
		}else{
			$data = null;
		}

		$data = array(
			'title' 	=> 'Project',
			'head' 		=> 'Video Animasi',
			'content' 	=> 'project_view',
			'class_header' => '', //Gunakan no_sticky jika ingin menghilangkan menu diatas nya sebaliknya gunakan sticky_header ut munculkan keduanya atau hilangkan kodenya
			'info'			=> $data,
			'infoRumah'		=> $this->rumah->get_data($slug),
			'infoSpektek'	=> $this->spektek->get_detail($slug),
			'data_rumah'	=> $this->rumah->get_count_rumah($slug),
			'data_pelanggan' => $this->pelanggan->get_data(),
			'info_rumah' => $this->rumah->info_rumah($slug),
			'info_terjual' => $this->rumah->info_terjual($slug),
			'info_tanda_jadi' => $this->rumah->info_tanda_jadi($slug),
			'info_terbooking' => $this->rumah->info_terbooking($slug),

		);	

		// print_r($data['info_terbooking']);
		// die();


		$this->load->view('layouts/master_second', $data);	
	}

	
}
