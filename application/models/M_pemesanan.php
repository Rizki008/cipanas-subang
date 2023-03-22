<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pemesanan extends CI_Model
{
	public function simpan_pemesanan($data)
	{
		$this->db->insert('pemesanan', $data);
	}

	public function simpan_detail_pemesanan($data_rinci)
	{
		$this->db->insert('detail_pemesanan', $data_rinci);
	}

	public function simpan_pembayaran($data)
	{
		$this->db->insert('pembayaran', $data);
	}
	public function penilaian($data)
	{
		$this->db->insert('ulasan', $data);
	}

	public function upload_buktibayar($data)
	{
		$this->db->where('id_pembayaran', $data['id_pembayaran']);
		$this->db->update('pembayaran', $data);
	}
	public function update_status_pembayaran($data)
	{
		$this->db->where('id_pemesanan', $data['id_pemesanan']);
		$this->db->update('pemesanan', $data);
	}

	//informasi pesanan
	public function pesanan()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
		// $this->db->where('status_pemesanan=0');
		$this->db->order_by('id_pemesanan', 'desc');
		return $this->db->get()->result();
	}
	public function belum_bayar()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		$this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
		$this->db->where('status_pemesanan=0');
		$this->db->where('metode_bayar=1');
		$this->db->order_by('pemesanan.id_pemesanan', 'desc');
		$this->db->group_by('detail_pemesanan.id_pemesanan');

		return $this->db->get()->result();
	}

	public function diproses()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		$this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
		$this->db->where('status_pemesanan=1');
		$this->db->where('metode_bayar=1');
		$this->db->order_by('pemesanan.id_pemesanan', 'desc');
		$this->db->group_by('detail_pemesanan.id_pemesanan');
		return $this->db->get()->result();
	}

	public function selesai()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		$this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
		$this->db->where('status_pemesanan=2');
		$this->db->where('metode_bayar=1');
		$this->db->order_by('pemesanan.id_pemesanan', 'desc');
		$this->db->group_by('detail_pemesanan.id_pemesanan');
		return $this->db->get()->result();
	}

	public function batal()
	{
		// $this->db->select('*');
		// $this->db->from('pemesanan');
		// $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		// $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		// $this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
		// $this->db->where('status_pemesanan=3');
		// $this->db->where('metode_bayar=1');
		// $this->db->order_by('pemesanan.id_pemesanan', 'desc');
		// $this->db->group_by('detail_pemesanan.id_pemesanan');
		// return $this->db->get()->result();
		return $this->db->query("SELECT * FROM `pemesanan` LEFT JOIN `detail_pemesanan` ON `pemesanan`.`id_pemesanan` = `detail_pemesanan`.`id_pemesanan` LEFT JOIN `tiket` ON `detail_pemesanan`.`id_tiket` = `tiket`.`id_tiket` WHERE `status_pemesanan` IN (3,6) AND `metode_bayar` = '1' AND `id_wisatawan` =" . $this->session->userdata('id_wisatawan') . " GROUP BY `detail_pemesanan`.`id_pemesanan`  ORDER BY `pemesanan`.`id_pemesanan` DESC;")->result();
	}

	public function belum_bayar_2()
	{
		// $this->db->select('*');
		// $this->db->from('pemesanan');
		// $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		// $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		// $this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
		// $this->db->where('status_pemesanan=0');
		// $this->db->where('metode_bayar=2');
		// $this->db->order_by('pemesanan.id_pemesanan', 'desc');
		// $this->db->group_by('detail_pemesanan.id_pemesanan');

		return $this->db->query("SELECT * FROM pemesanan LEFT JOIN detail_pemesanan ON detail_pemesanan.id_pemesanan=pemesanan.id_pemesanan Left JOIN tiket ON tiket.id_tiket=detail_pemesanan.id_tiket WHERE id_wisatawan=" . $this->session->userdata('id_wisatawan') . " AND status_pemesanan='0' AND metode_bayar='2' GROUP BY `detail_pemesanan`.`id_pemesanan`  ORDER BY `pemesanan`.`id_pemesanan` DESC")->result();
	}

	public function diproses_2()
	{
		// $this->db->select('*');
		// $this->db->from('pemesanan');
		// $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		// $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		// $this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
		// $this->db->where('status_pemesanan=1');
		// $this->db->where('metode_bayar=2');
		// $this->db->order_by('pemesanan.id_pemesanan', 'desc');
		// $this->db->group_by('detail_pemesanan.id_pemesanan');
		return $this->db->query("SELECT * FROM pemesanan LEFT JOIN detail_pemesanan ON detail_pemesanan.id_pemesanan=pemesanan.id_pemesanan Left JOIN tiket ON tiket.id_tiket=detail_pemesanan.id_tiket WHERE id_wisatawan=" . $this->session->userdata('id_wisatawan') . " AND status_pemesanan='1' AND metode_bayar='2' GROUP BY `detail_pemesanan`.`id_pemesanan`  ORDER BY `pemesanan`.`id_pemesanan` DESC")->result();
	}

	public function selesai_2()
	{
		// $this->db->select('*');
		// $this->db->from('pemesanan');
		// $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		// $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		// $this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
		// $this->db->where('status_pemesanan=2');
		// $this->db->where('metode_bayar=2');
		// $this->db->order_by('pemesanan.id_pemesanan', 'desc');
		// $this->db->group_by('detail_pemesanan.id_pemesanan');
		// return $this->db->get()->result();
		return $this->db->query("SELECT * FROM `pemesanan` LEFT JOIN `detail_pemesanan` ON `pemesanan`.`id_pemesanan` = `detail_pemesanan`.`id_pemesanan` LEFT JOIN `tiket` ON `detail_pemesanan`.`id_tiket` = `tiket`.`id_tiket` WHERE `status_pemesanan` ='2' AND `metode_bayar` = '2' AND `id_wisatawan` =" . $this->session->userdata('id_wisatawan') . " GROUP BY `detail_pemesanan`.`id_pemesanan`  ORDER BY `pemesanan`.`id_pemesanan` DESC;")->result();
	}

	public function batal_2()
	{
		// $this->db->select('*');
		// $this->db->from('pemesanan');
		// $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		// $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		// $this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
		// $this->db->where('status_pemesanan=3 or status_pemesanan=6 and metode_bayar=2');
		// $this->db->where('metode_bayar=2');
		// $this->db->order_by('pemesanan.id_pemesanan', 'desc');
		// $this->db->group_by('detail_pemesanan.id_pemesanan');
		return $this->db->query("SELECT * FROM `pemesanan` LEFT JOIN `detail_pemesanan` ON `pemesanan`.`id_pemesanan` = `detail_pemesanan`.`id_pemesanan` LEFT JOIN `tiket` ON `detail_pemesanan`.`id_tiket` = `tiket`.`id_tiket` WHERE `status_pemesanan` IN (3,6) AND `metode_bayar` = '2' AND `id_wisatawan` =" . $this->session->userdata('id_wisatawan') . " GROUP BY `detail_pemesanan`.`id_pemesanan`  ORDER BY `pemesanan`.`id_pemesanan` DESC;")->result();
	}

	public function detail_pesanan($id_pemesanan)
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->where('id_pemesanan', $id_pemesanan);
		return $this->db->get()->row();
	}

	public function detail($id_pemesanan)
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		$this->db->where('pemesanan.id_pemesanan', $id_pemesanan);
		return $this->db->get()->result();
	}
	public function detail_rating($id_pemesanan)
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('ulasan', 'detail_pemesanan.id_detail_pemesanan = ulasan.id_detail_pemesanan', 'left');
		$this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		$this->db->where('pemesanan.id_pemesanan', $id_pemesanan);
		return $this->db->get()->result();
	}

	public function total_pesanan()
	{
		$this->db->where('status_pemesanan=0');
		return $this->db->get('pemesanan')->num_rows();
	}
	public function total_pesanan_proses()
	{
		$this->db->where('status_pemesanan=1');
		return $this->db->get('pemesanan')->num_rows();
	}
	public function total_pesanan_selesai()
	{
		$this->db->where('status_pemesanan=2');
		return $this->db->get('pemesanan')->num_rows();
	}
	public function total_pesanan_batal()
	{
		$this->db->where('status_pemesanan=3');
		return $this->db->get('pemesanan')->num_rows();
	}

	public function pelanggan()
	{
		$this->db->select('*');
		$this->db->from('wisatawan');
		$this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
		$this->db->order_by('id_wisatawan', 'desc');
		return $this->db->get()->result();
	}
}
