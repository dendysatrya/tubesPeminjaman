<?php 

/**
 * summary
 */
class User_model extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {

    }

    public function getDataUserSemua () {
    	$query = $this->db->query("SELECT * FROM user");
        return $query->result_array();
    }

    public function insertUser() {
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'alamat_user' => $this->input->post('alamat_user'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),

        );
        $this->db->insert('user', $data);
    }

    public function getUser($id) {
        $this->db->where('id_user', $id);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function updateUser($id) {
        

        if ($this->input->post('password') != "") {
                $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'alamat_user' => $this->input->post('alamat_user'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            );
        } else {
            $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'alamat_user' => $this->input->post('alamat_user'),
            'username' => $this->input->post('username'),
            );
        }
        

        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function deleteUser($id) {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
}
?>