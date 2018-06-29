<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

	public function getDataPeminjamanSemua () {
		$query = $this->db->query("SELECT * FROM peminjaman");
		return $query->result_array();
	}

	public function getPeminjamanBarang ($id) {
		$query = $this->db->query("SELECT * FROM peminjaman JOIN barang ON id_barang = fk_barang WHERE fk_barang = $id");
		return $query->result_array();
	}
	public function getPeminjamanByID ($id) {
		$query = $this->db->query("SELECT * FROM peminjaman JOIN barang ON id_barang = fk_barang WHERE id_peminjaman = $id");
		return $query->result_array();
	}
	public function getPeminjamanBelumDisetujui () {
		$query = $this->db->query("SELECT pe.id_peminjaman, ba.stok_tersedia, ba.nama_barang, us.nama_user, pe.jumlah_pinjam, ba.foto FROM peminjaman AS pe JOIN (SELECT b.id_barang, b.nama_barang, b.stok_barang, COALESCE(p.total_dipinjam,0) AS total_dipinjam, (b.stok_barang-COALESCE(total_dipinjam,0)) AS stok_tersedia , b.foto FROM barang AS b LEFT OUTER JOIN (SELECT fk_barang, SUM(jumlah_pinjam) AS total_dipinjam FROM peminjaman WHERE persetujuan = 'sudah' AND pengembalian='belum' GROUP BY fk_barang) AS p ON b.id_barang = p.fk_barang) AS ba ON ba.id_barang = pe.fk_barang JOIN user AS us ON us.id_user = pe.fk_user WHERE pe.persetujuan = 'belum'");
		return $query->result_array();
	}

	public function getPeminjamanBarang2 ($id) {
		$query = $this->db->query("SELECT b.id_barang, b.nama_barang, b.stok_barang, COALESCE(p.total_dipinjam,0) AS total_dipinjam, (b.stok_barang-COALESCE(total_dipinjam,0)) AS stok_tersedia , b.foto FROM barang AS b LEFT OUTER JOIN (SELECT fk_barang, SUM(jumlah_pinjam) AS total_dipinjam FROM peminjaman WHERE persetujuan = 'sudah' AND pengembalian='belum' GROUP BY fk_barang) AS p ON b.id_barang = p.fk_barang WHERE id_barang = $id");
		return $query->result_array();
	}


	public function insertPeminjaman() {
		$data = array(
			'fk_barang' => $this->input->post('id_barang'),
			'fk_user' => $this->input->post('id_user'),
			'jumlah_pinjam' => $this->input->post('jumlah_pinjam'),
			'persetujuan' => 'belum',
			'pengembalian' => 'belum',

		);
		$this->db->insert('peminjaman', $data);
	}

	public function getPeminjaman($id) {
		$this->db->where('id_peminjaman', $id);
		$query = $this->db->get('peminjaman');
		return $query->result();
	}

	public function validasiPersetujuan($id) {
		$data = array(
			'persetujuan' => 'sudah',
		);

		$this->db->where('id_peminjaman', $id);
		$this->db->update('peminjaman', $data);
	}

	public function validasiPengembalian($id) {
		$data = array(
			'pengembalian' => 'sudah',
		);

		$this->db->where('id_peminjaman', $id);
		$this->db->update('peminjaman', $data);
	}
	

}

/* End of file Peminjaman_model.php */
/* Location: ./application/models/Peminjaman_model.php */