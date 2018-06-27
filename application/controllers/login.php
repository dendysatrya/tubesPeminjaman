<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login_view');		
	}

	public function cekLogin(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDb');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login_view');
		} else {
			redirect('barang','refresh');
		}
	}

	public function cekDb($password) {
		$this->load->model('User_model');
		$username = $this->input->post('username');
		$result = $this->User_model->Login($username, $password);
		if ($result) {
			$session = array();
			foreach ($result as $value) {
				$session = array(
						'id_user' =>$value->id_user,
						'nama_user' =>$value->nama_user, 
						'username'=>$value->username,
						'level' =>$value->level
					);
				
				$this->session->set_userdata('logged_in', $session );
			}
			return true;
		} else {
			$this->form_validation->set_message('cekDb', 'Invalid Username or Password');
			return false;
		}
	}

	public function logout() {
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

}


/* End of file login.php */
/* Location: ./application/controllers/login.php */