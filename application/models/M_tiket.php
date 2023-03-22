<?php


defined('BASEPATH') or exit('No direct sctipt access allowed');

class M_tiket extends CI_Model
{

	public function tiket()
	{
		$this->db->select('*');
		$this->db->from('tiket');
		$this->db->order_by('id_tiket', 'desc');
		return $this->db->get()->result();
	}
	public function tiket_detail($id_tiket)
	{
		$this->db->select('*');
		$this->db->from('tiket');
		$this->db->where('id_tiket', $id_tiket);
		// $this->db->order_by('id_tiket', 'desc');
		return $this->db->get()->row();
	}

	public function add($data)
	{
		$this->db->insert('tiket', $data);
	}
	public function id_tiket()
	{
		return $this->db->query('SELECT max(id_tiket) as id FROM tiket')->row();
	}
	public function add_promo($data)
	{
		$this->db->insert('promo', $data);
	}
	public function edit($data)
	{
		$this->db->where('id_tiket', $data['id_tiket']);
		$this->db->update('tiket', $data);
	}
	public function hapus($data)
	{
		$this->db->where('id_tiket', $data['id_tiket']);
		$this->db->delete('tiket', $data);
	}

	// KELUARGA
	public function tiket_keluarga()
	{
		$this->db->select('*');
		$this->db->from('keluarga');
		$this->db->order_by('id_tiket_keluarga', 'desc');
		return $this->db->get()->result();
	}
	public function tiket_detail_keluarga($id_tiket_keluarga)
	{
		$this->db->select('*');
		$this->db->from('keluarga');
		$this->db->where('id_tiket_keluarga', $id_tiket_keluarga);
		// $this->db->order_by('id_tiket', 'desc');
		return $this->db->get()->row();
	}
	public function add_keluarga($data)
	{
		$this->db->insert('keluarga', $data);
	}
	public function id_tiket_keluarga()
	{
		return $this->db->query('SELECT max(id_tiket_keluarga) as id FROM keluarga')->row();
	}
	public function edit_keluarga($data)
	{
		$this->db->where('id_tiket_keluarga', $data['id_tiket_keluarga']);
		$this->db->update('keluarga', $data);
	}
	public function hapus_keluarga($data)
	{
		$this->db->where('id_tiket_keluarga', $data['id_tiket_keluarga']);
		$this->db->delete('keluarga', $data);
	}
}
