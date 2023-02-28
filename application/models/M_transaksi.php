<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
	//jumlah akumulasi
	public function tot_tiket()
	{
		$this->db->select_sum('qty');
		return $this->db->get('detail_pemesanan')->num_rows();
	}

	public function tot_uang()
	{
		$this->db->select_sum('total');
		$this->db->from('pemesanan');
		return $this->db->get()->num_rows();
	}

	public function tot_wisatawan()
	{
		return $this->db->get('wisatawan')->num_rows();
	}

	public function tot_boking()
	{
		$this->db->where('status_pemesanan=0');
		return $this->db->get('pemesanan')->num_rows();
	}

	//informasi pesanan
	public function masuk()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		$this->db->where('status_pemesanan=0');
		$this->db->order_by('pemesanan.id_pemesanan', 'desc');
		$this->db->group_by('detail_pemesanan.id_pemesanan');
		return $this->db->get()->result();
	}

	public function update($data)
	{
		$this->db->where('id_pemesanan', $data['id_pemesanan']);
		$this->db->update('pemesanan', $data);
	}

	public function proses()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		$this->db->where('status_pemesanan=1');
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
		$this->db->where('status_pemesanan=2');
		$this->db->order_by('pemesanan.id_pemesanan', 'desc');
		$this->db->group_by('detail_pemesanan.id_pemesanan');
		return $this->db->get()->result();
	}

	public function batal()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		$this->db->where('status_pemesanan=3');
		$this->db->order_by('pemesanan.id_pemesanan', 'desc');
		$this->db->group_by('detail_pemesanan.id_pemesanan');
		return $this->db->get()->result();
	}

	public function detail_pesanan($id_pemesanan)
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('pembayaran', 'pembayaran.id_pemesanan = pemesanan.id_pemesanan', 'left');
		$this->db->join('detail_pemesanan', 'detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan', 'left');
		$this->db->join('tiket', 'tiket.id_tiket = detail_pemesanan.id_tiket', 'left');
		$this->db->join('promo', 'promo.id_tiket = tiket.id_tiket', 'left');
		$this->db->where('pemesanan.id_pemesanan', $id_pemesanan);
		return $this->db->get()->result();
	}

	public function grafik()
	{
		$this->db->select_sum('qty');
		$this->db->select('tiket.nama_tiket');
		//$this->db->select('rinci_transaksi.qty');
		$this->db->from('detail_pemesanan');
		$this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
		$this->db->group_by('detail_pemesanan.id_tiket');
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}

	public function grafik_kelamin()
	{
		return $this->db->query("SELECT SUM(qty) as hasil, jk FROM detail_pemesanan JOIN pemesanan ON detail_pemesanan.id_pemesanan=pemesanan.id_pemesanan JOIN wisatawan ON pemesanan.id_wisatawan=wisatawan.id_wisatawan GROUP BY wisatawan.jk")->result();
	}
	public function grafik_datang()
	{
		return $this->db->query("SELECT SUM(pemesanan.id_wisatawan) as datang, nama_wisatawan FROM detail_pemesanan JOIN pemesanan ON detail_pemesanan.id_pemesanan=pemesanan.id_pemesanan JOIN wisatawan ON pemesanan.id_wisatawan=wisatawan.id_wisatawan GROUP BY wisatawan.id_wisatawan")->result();
	}

	//TRANSAKSI LANGSUNG
	public function produk()
	{
		$this->db->select('*');
		$this->db->from('tiket');
		$this->db->join('promo', 'promo.id_tiket = tiket.id_tiket', 'left');
		// $this->db->where('stock>=1');
		$this->db->order_by('tiket.id_tiket', 'desc');
		$this->db->limit(6);
		return $this->db->get()->result();
	}
	public function simpan_transaksi_langsung($data)
	{
		$this->db->insert('transaksi_langsung', $data);
	}
	public function simpan_rinci_langsung($data_rinci_langsung)
	{
		$this->db->insert('rinci_langsung', $data_rinci_langsung);
	}
	public function update_order_langsung($data)
	{
		$this->db->where('id_pesan', $data['id_pesan']);
		$this->db->update('transaksi_langsung', $data);
	}
	public function pesanan_langsung()
	{
		$this->db->select('*');
		$this->db->from('transaksi_langsung');
		// $this->db->join('rinci_langsung', 'transaksi_langsung.no_jual=rinci_langsung.no_jual', 'left');
		$this->db->where('status_beli=0');
		$this->db->order_by('id_pesan', 'desc');
		return $this->db->get()->result();
	}
	public function pesanan_langsung_selesai()
	{
		$this->db->select('*');
		$this->db->from('transaksi_langsung');
		// $this->db->join('rinci_langsung', 'transaksi_langsung.no_jual=rinci_langsung.no_jual', 'left');
		$this->db->where('status_beli=1');
		$this->db->order_by('id_pesan', 'desc');
		return $this->db->get()->result();
	}
}
