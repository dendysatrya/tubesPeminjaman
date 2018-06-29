<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	private $data_user = array();
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id_user'] = $session_data['id_user'];
			$data['username'] = $session_data['username'];
			$data['nama_user'] = $session_data['nama_user'];
			$data['level'] = $session_data['level'];
			$this->data_user['id_user'] = $data['id_user'];
			$this->data_user['username'] = $data['username'];
			$this->data_user['nama_user'] = $data['nama_user'];
			$this->data_user['level'] = $data['level'];
			$current_controller = $this->router->fetch_class();
		} else {
			redirect('login','refresh');
		}
	}

	public function pinjam($id)
	{
		$this->load->model('Peminjaman_model');


		$data['barang'] = $this->Peminjaman_model->getPeminjamanBarang2($id);
		$data['id_user'] = $this->data_user['id_user'];

		

		$this->form_validation->set_rules('id_barang', 'ID Barang', 'trim|required');
		$this->form_validation->set_rules('id_user', 'ID User', 'trim|required');
		$this->form_validation->set_rules('jumlah_pinjam', 'Jumlah Pinjam', 'trim|required|numeric');

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('form_peminjaman', $data);
		}else {
			$this->Peminjaman_model->insertPeminjaman();
			$this->load->view('sukses_pinjam');
		}

	}

	public function request()
	{
		if ($this->data_user['level'] == 'admin') {
			$this->load->model('Peminjaman_model');

			$data['list'] = $this->Peminjaman_model->getPeminjamanBelumDisetujui();

			$this->load->view('Admin/navbar', $this->data_user);
			$this->load->view('Admin/Peminjaman/req_setuju', $data);	


			
		} else {
			redirect('false','refresh');
		}
	}

	public function setujui($id)
	{
		if ($this->data_user['level'] == 'admin') {
			$this->load->model('Peminjaman_model');
			$this->Peminjaman_model->validasiPersetujuan($id);
			$this->load->view('Admin/navbar', $this->data_user);
			$this->load->view('Admin/Peminjaman/sukses_setuju');	


			
		} else {
			redirect('false','refresh');
		}
	}
}

/* End of file peminjaman.php */
/* Location: ./application/controllers/peminjaman.php */