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
}
