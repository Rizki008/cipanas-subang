<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function user()
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->order_by('id_admin', 'desc');
		return $this->db->get()->result();
	}

	public function detail_user($id_admin)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_admin', $id_admin);
		return $this->db->get()->row();
	}
	public function detail_wisatawan($id_wisatawan)
	{
		$this->db->select('*');
		$this->db->from('wisatawan');
		$this->db->where('id_wisatawan', $id_wisatawan);
		return $this->db->get()->row();
	}

	public function add($data)
	{
		$this->db->insert('admin', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_admin', $data['id_admin']);
		$this->db->update('admin', $data);
	}
	public function update_gratis($data)
	{
		$this->db->where('id_wisatawan', $data['id_wisatawan']);
		$this->db->update('wisatawan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_admin', $data['id_admin']);
		$this->db->delete('admin');
	}

	public function pelanggan()
	{
		$this->db->select('*, SUM(pemesanan.id_wisatawan) AS jml');
		$this->db->from('wisatawan');
		$this->db->join('pemesanan', 'pemesanan.id_wisatawan = wisatawan.id_wisatawan', 'left');
		$this->db->order_by('wisatawan.id_wisatawan', 'desc');
		$this->db->group_by('pemesanan.id_wisatawan');
		return $this->db->get()->result();
	}
}
