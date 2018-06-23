<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index() {
    	$this->load->model('barang_model');
    	$data['barang_list'] = $this->barang_model->getDataBarangSemua();
    	$this->load->view('Admin/Barang/barang', $data);

    }

    public function create() {
    	$this->load->model('barang_model');
    	$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
    	$this->form_validation->set_rules('stok_barang', 'Stok Barang', 'numeric|required');



    	if ($this->form_validation->run()==FALSE) {
    		$error = array('error' => null);
    		$this->load->view('Admin/Barang/input_barang_view', $error);
    	}else {
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = 100000000;
            $config['max_width']  = 10240;
            $config['max_height']  = 7680;
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('userfile')){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('Admin/Barang/input_barang_view', $error);
            }
            else{
                
                $this->barang_model->insertBarang();
                $this->load->view('Admin/Barang/sukses_input_barang');
            }

    		
    		
    	}
    }

    public function update($id) {
    	$this->load->model('barang_model');
    	$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
    	$this->form_validation->set_rules('stok_barang', 'Stok Barang', 'numeric|required');

    	$data['barang']=$this->barang_model->getBarang($id);


    	if ($this->form_validation->run()==FALSE) {
    		$data['error'] = null;
    		$this->load->view('Admin/Barang/edit_barang_view', $data);
    	}else {
    		$config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = 100000000;
            $config['max_width']  = 10240;
            $config['max_height']  = 7680;
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('userfile')){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('Admin/Barang/edit_barang_view', $error);
            }
            else{
                
                $this->barang_model->updateBarang($id);
                $this->load->view('Admin/Barang/sukses_edit_barang');
            }
    	}
    }

    public function delete($id) {
    	$this->load->model('barang_model');

    	$data['barang']=$this->barang_model->getBarang($id);
    	$this->barang_model->deleteBarang($id);
    	$this->load->view('Admin/Barang/sukses_delete_barang');
    }


}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */


?>