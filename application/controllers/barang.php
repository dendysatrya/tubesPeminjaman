<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    private $data_user = array();
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['nama_user'] = $session_data['nama_user'];
            $data['level'] = $session_data['level'];
            $this->data_user['username'] = $data['username'];
            $this->data_user['nama_user'] = $data['nama_user'];
            $this->data_user['level'] = $data['level'];
            $current_controller = $this->router->fetch_class();
        } else {
            redirect('login','refresh');
        }
    }

    public function index() {
    	$this->load->model('barang_model');
    	$data['barang_list'] = $this->barang_model->getDataBarangSemua();
        if ($this->data_user['level'] == 'admin') {
            $this->load->view('Admin/navbar', $this->data_user);
            $this->load->view('Admin/Barang/barang', $data);
        } else {
            $this->load->view('barang', $data);    
        }


    }

    public function create() {
        if ($this->data_user['level'] == 'admin') {
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
        } else {
            redirect('false','refresh');
        }

    }

    public function update($id) {
        if ($this->data_user['level'] == 'admin') { 

         $this->load->model('barang_model');
         $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
         $this->form_validation->set_rules('stok_barang', 'Stok Barang', 'numeric|required');

         $data['barang']=$this->barang_model->getBarang($id);


         if ($this->form_validation->run()==FALSE) {
          $data['error'] = null;
          $this->load->view('Admin/Barang/edit_barang_view', $data);
      } else {
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
        } else {

            $this->barang_model->updateBarang($id);
            $this->load->view('Admin/Barang/sukses_edit_barang');
        }
    }
} else {
    redirect('false','refresh');
}
}

public function delete($id) {
    if ($this->data_user['level'] == 'admin') { 

     $this->load->model('barang_model');

     $data['barang']=$this->barang_model->getBarang($id);
     $this->barang_model->deleteBarang($id);
     $this->load->view('Admin/Barang/sukses_delete_barang');
    } else {
        redirect('false','refresh');
    }
}


}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */


?>