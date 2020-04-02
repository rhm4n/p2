<?php 

class Auth extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('User_model','user');

	}

	function index(){
		$this->session->sess_destroy();
		$data = array(
			'title' 	=> 'Daftar Marketing',
			'head' 		=> 'Pendaftaran Gratis',
			'content' 	=> 'daftar',
		);	

		$this->load->view('layouts/master_second', $data);
	}

	function login_process(){
		

		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$data = $this->user->get_user_login($username, $password);  

		if($data){ 

			if($data[0]->status !== '1'){

				$this->session->set_flashdata('error', 'Maaf, User anda tidak aktif !');
				redirect("auth");

			}else{

				$data_session = array(
					'id' 					=> $data[0]->id,  
					'nama' 					=> $data[0]->nama,  
					'username' 				=> $data[0]->username,  
					'level' 				=> $data[0]->level,  
					'is_login' 				=> TRUE
				);

				$this->session->set_userdata($data_session);
				redirect("admin/Welcome");
			}

		}else{
			$this->session->set_flashdata('error', 'Username / Password salah !');
			redirect("auth");
		}		 

	}

	function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}

}