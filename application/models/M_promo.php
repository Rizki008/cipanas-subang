<?php

defined('BASEPATH') or exit('No direct sctipt access allowed');

class M_promo extends CI_Model
{

	public function promo()
	{
		$this->db->select('*');
		$this->db->from('promo');
		$this->db->join('keluarga', 'keluarga.id_tiket_keluarga = promo.id_tiket_keluarga', 'left');
		$this->db->join('tiket', 'promo.id_tiket = tiket.id_tiket', 'left');
		$this->db->order_by('id_promo', 'desc');
		return $this->db->get()->result();
	}
	public function promo_detail($id_promo)
	{
		$this->db->select('*');
		$this->db->from('promo');
		$this->db->join('tiket', 'promo.id_tiket = tiket.id_tiket', 'left');
		$this->db->where('id_promo', $id_promo);
		return $this->db->get()->row();
	}

	public function edit($data)
	{
		$this->db->where('id_promo', $data['id_promo']);
		$this->db->update('promo', $data);
	}
}
