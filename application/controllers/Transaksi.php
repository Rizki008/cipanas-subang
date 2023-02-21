<?php

defined('BASEPATH') or exit('No direct sctipt access allowed');

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi');
		$this->load->model('m_pemesanan');
	}

	public function masuk()
	{
		$data = array(
			'title' => 'Booking Masuk',
			'masuk' => $this->m_transaksi->masuk(),
			'isi' => 'backend/transaksi/v_masuk'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function verifikasi($id_pemesanan)
	{
		$data = array(
			'id_pemesanan' => $id_pemesanan,
			'status_pemesanan' => 1
		);
		$this->m_transaksi->update($data);
		$this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
		redirect('transaksi/proses');
	}
	public function detail($id_pemesanan)
	{
		$data = array(
			'title' => 'Booking Masuk',
			'detail_pesanan' => $this->m_transaksi->detail_pesanan($id_pemesanan),
			'isi' => 'backend/transaksi/v_detail'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function ambiltiket($id_pemesanan)
	{
		$data = array(
			'id_pemesanan' => $id_pemesanan,
			'status_pemesanan' => 2
		);
		$this->m_transaksi->update($data);
		$this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
		redirect('transaksi/selesai');
	}
	public function proses()
	{
		$data = array(
			'title' => 'Booking Proses',
			'proses' => $this->m_transaksi->proses(),
			'isi' => 'backend/transaksi/v_proses'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function selesai()
	{
		$data = array(
			'title' => 'Booking Selesai',
			'selesai' => $this->m_transaksi->selesai(),
			'isi' => 'backend/transaksi/v_selesai'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
	public function batal()
	{
		$data = array(
			'title' => 'Booking Batal',
			'batal' => $this->m_transaksi->batal(),
			'isi' => 'backend/transaksi/v_batal'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//TRANSAKSI LANGSUNG DI TEMPAT
	public function transaksi_langsung()
	{
		$data = array(
			'title' => 'Transaksi Langsung',
			'produk' => $this->m_transaksi->produk(),
			'pesanan_langsung' => $this->m_transaksi->pesanan_langsung(),
			'pesanan_langsung_selesai' => $this->m_transaksi->pesanan_langsung_selesai(),
			'isi' => 'backend/transaksi_langsung/v_transaksi'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	public function pesan()
	{
		$id_tiket = $this->input->post('id_tiket');
		$data = array(
			'id' => $this->input->post('id'),
			'qty' => $this->input->post('qty'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('pesan', 'Berhasil');
		redirect('transaksi/transaksi_langsung/' . $id_tiket);
	}

	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('transaksi/transaksi_langsung');
	}

	public function checkout()
	{
		// $id_produk = $this->input->post('id_produk');
		$data = array(
			'no_jual' => $this->input->post('no_jual'),
			'tgl_beli' => date('Y-m-d'),
			'total_harga' => $this->input->post('total_harga'),
			'status_beli' => '0',
		);
		$this->m_transaksi->simpan_transaksi_langsung($data);
		//simppan belanja langsung ke rinci
		$i = 1;
		foreach ($this->cart->contents() as $item) {
			$data_rinci_langsung = array(
				'no_jual' => $this->input->post('no_jual'),
				'id_tiket' => $item['id'],
				'tgl_jual' => date('Y-m-d'),
				'qty' => $this->input->post('qty' . $i++)
			);
			$this->m_transaksi->simpan_rinci_langsung($data_rinci_langsung);
		}
		$this->cart->destroy();
		redirect('transaksi/transaksi_langsung');
	}

	public function bayar($id_pesan)
	{
		$data = array(
			'id_pesan' => $id_pesan,
			'Jumlah_bayar' => $this->input->post('Jumlah_bayar'),
			'status_beli' => 1
		);
		$this->m_transaksi->update_order_langsung($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Batalkan');
		redirect('transaksi/transaksi_langsung');
	}
}
