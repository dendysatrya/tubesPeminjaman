<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('Peminjaman_model');
	}



	public function semua()
	{
		$data['terpinjam'] = $this->Peminjaman_model->getTerpinjamSemua();
		$this->load->view('Admin/Print/print_semua', $data);
		//$this->pdf->load_view('Admin/Print/print_semua', $data);
	}

	public function belum_kembali()
	{
		$data['terpinjam'] = $this->Peminjaman_model->getTerpinjamBelumKembali();
		$this->load->view('Admin/Print/print_semua', $data);
		//$this->pdf->load_view('Admin/Print/print_semua', $data);
	}

	public function sudah_kembali()
	{
		$data['terpinjam'] = $this->Peminjaman_model->getTerpinjamSudahKembali();
		$this->load->view('Admin/Print/print_semua', $data);
		//$this->pdf->load_view('Admin/Print/print_semua', $data);
	}



}

/* End of file print.php */
/* Location: ./application/controllers/print.php */