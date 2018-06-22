<?php 
/**
 * summary
 */
class User extends CI_Controller
{
    /**
     * summary
     */
    public function index() {
    	$this->load->model('User_model');
    	$data['user_list'] = $this->User_model->getDataUserSemua();
    	$this->load->view('Admin/User/user', $data);

    }

    public function create() {
    	$this->load->model('User_model');
    	$this->form_validation->set_rules('nama_user', 'Nama User', 'trim|required');
    	$this->form_validation->set_rules('alamat_user', 'Alamat User', 'trim|required');
    	$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password2', 'Confirmation Password', 'required|matches[password]');

    	if ($this->form_validation->run()==FALSE) {
    		$this->load->view('Admin/User/input_user_view');
    	}else {
    		$this->User_model->insertUser();
    		$this->load->view('Admin/User/sukses_input_user');
    	}
    }

    public function update($id) {
    	$this->load->model('User_model');
    	$this->form_validation->set_rules('nama_user', 'Nama User', 'trim|required');
        $this->form_validation->set_rules('alamat_user', 'Alamat User', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('password2', 'Confirmation Password', 'matches[password]');
    	$data['user']=$this->User_model->getUser($id);

    	if ($this->form_validation->run()==FALSE) {
    		$this->load->view('Admin/User/edit_user_view', $data);
    	}else {
    		$this->User_model->updateUser($id);
    		$this->load->view('Admin/User/sukses_edit_user');
    	}
    }

    public function delete($id) {
    	$this->load->model('User_model');

    	$data['user']=$this->User_model->getUser($id);
    	$this->User_model->deleteUser($id);
    	$this->load->view('Admin/User/sukses_delete_user');
    }
}
?>