<?php


defined('BASEPATH') or exit('No direct sctipt access allowed');

class M_home extends CI_Model
{

	public function tiket()
	{
		$this->db->select('*');
		$this->db->from('tiket');
		$this->db->join('promo', 'tiket.id_tiket = promo.id_tiket', 'left');
		$this->db->order_by('tiket.id_tiket', 'desc');
		$this->db->group_by('tiket.id_tiket');
		return $this->db->get()->result();
	}
	public function keluarga()
	{
		$this->db->select('*');
		$this->db->from('keluarga');
		$this->db->join('promo', 'keluarga.id_tiket_keluarga = promo.id_tiket_keluarga', 'left');
		$this->db->order_by('keluarga.id_tiket_keluarga', 'desc');
		$this->db->group_by('keluarga.id_tiket_keluarga');
		return $this->db->get()->result();
	}

	public function ulasan()
	{
		return $this->db->query("SELECT * FROM `detail_pemesanan` JOIN ulasan ON detail_pemesanan.id_detail_pemesanan=ulasan.id_detail_pemesanan JOIN pemesanan ON pemesanan.id_pemesanan=detail_pemesanan.id_pemesanan JOIN wisatawan ON pemesanan.id_wisatawan=wisatawan.id_wisatawan WHERE  rating != 0;")->result();
	}

	public function ambil_data($data = null)
	{
		$this->db->select('*');
		$this->db->from('tiket');
		if (!empty($data)) {
			$this->db->like('nama_tiket', $data);
		}
		$this->db->join('promo', 'promo.id_tiket = tiket.id_tiket', 'left');

		$this->db->order_by('tiket.id_tiket', 'desc');
		return $this->db->get()->result();
	}

	public function detail_produk($id_tiket)
	{
		$data['tiket'] = $this->db->query("SELECT * FROM tiket LEFT JOIN promo ON promo.id_tiket=tiket.id_tiket WHERE tiket.id_tiket='" . $id_tiket . "'")->row();
		return $data;
	}

	public function reviews($id_tiket)
	{
		$this->db->select('*');
		$this->db->from('ulasan');
		$this->db->join('detail_pemesanan', 'detail_pemesanan.id_detail_pemesanan = ulasan.id_detail_pemesanan', 'left');
		$this->db->join('tiket', 'tiket.id_tiket = ulasan.id_tiket', 'left');
		$this->db->join('pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('wisatawan', 'wisatawan.id_wisatawan = pemesanan.id_wisatawan', 'left');
		$this->db->where('status_ulasan=1');
		$this->db->where('ulasan.id_tiket', $id_tiket);
		return $this->db->get()->result();
	}
	public function views($id_tiket)
	{
		// $this->db->select_sum('qty');
		// $this->db->select('detail_pemesanan.qty');
		// $this->db->from('detail_pemesanan');
		// $this->db->where('id_tiket', $id_tiket);
		// $this->db->group_by('id_tiket');
		return $this->db->query("SELECT SUM(qty) AS qty FROM `detail_pemesanan` WHERE id_tiket='" . $id_tiket . "' GROUP BY detail_pemesanan.id_tiket;")->result();
	}
	public function views_ulasan($id_tiket)
	{
		return $this->db->query("SELECT SUM(pemesanan.id_wisatawan) AS jml,isi_ulasan FROM `ulasan` LEFT JOIN detail_pemesanan ON detail_pemesanan.id_detail_pemesanan=ulasan.id_detail_pemesanan LEFT JOIN tiket ON tiket.id_tiket=ulasan.id_tiket LEFT JOIN pemesanan ON pemesanan.id_pemesanan=detail_pemesanan.id_pemesanan LEFT JOIN wisatawan ON wisatawan.id_wisatawan=pemesanan.id_wisatawan WHERE status_ulasan=1 AND ulasan.id_tiket='" . $id_tiket . "' GROUP BY ulasan.id_tiket;")->result();
	}
}
