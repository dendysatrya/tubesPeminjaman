<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	public function getDataBarangSemua () {
    	$query = $this->db->query("SELECT * FROM barang");
		return $query->result_array();
    }

    public function insertBarang() {
    	$data = array(
    			'nama_barang' => $this->input->post('nama_barang'),
    			'stok_barang' => $this->input->post('stok_barang'),
                'foto' => $this->upload->data('file_name'),

    		);
    	$this->db->insert('barang', $data);
    }

    public function getBarang($id) {
    	$this->db->where('id_barang', $id);
    	$query = $this->db->get('barang');
    	return $query->result();
    }

    public function updateBarang($id) {
    	$data = array(
    		'nama_barang' => $this->input->post('nama_barang'),
    		'stok_barang' => $this->input->post('stok_barang'),
            'foto' => $this->upload->data('file_name'),
    		);

    	$this->db->where('id_barang', $id);
    	$this->db->update('barang', $data);
    }

    public function deleteBarang($id) {
    	$this->db->where('id_barang', $id);
    	$this->db->delete('barang');
    }
	

}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */