<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pemesanan');
	}

	public function index()
	{
		$data = array(
			'title' => 'Pesanan Saya',
			'pesanan' => $this->m_pemesanan->pesanan(),
			'belum_bayar' => $this->m_pemesanan->belum_bayar(),
			'wisatawan' => $this->m_pemesanan->pelanggan(),
			'diproses' => $this->m_pemesanan->diproses(),
			'selesai' => $this->m_pemesanan->selesai(),
			'batal' => $this->m_pemesanan->batal(),
			'belum_bayar_2' => $this->m_pemesanan->belum_bayar_2(),
			'diproses_2' => $this->m_pemesanan->diproses_2(),
			'selesai_2' => $this->m_pemesanan->selesai_2(),
			'batal_2' => $this->m_pemesanan->batal_2(),
			'isi' => 'frontend/pesanan/v_pesanan'
		);
		// echo $this->db->last_query();
		// die();
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}


	//-------------------- PEMBAYARAN --------------------
	public function bayar($id_pemesanan)
	{
		$this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/bukti_bayar';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "bukti_bayar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Pembayaran',
					'pesanan' => $this->m_pemesanan->detail_pesanan($id_pemesanan),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'frontend/pesanan/v_bayar'
				);
				$this->load->view('frontend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/bukti_bayar' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_pemesanan' => $id_pemesanan,
					'atas_nama' => $this->input->post('atas_nama'),
					'bukti_bayar' => $upload_data['uploads']['file_name'],
				);
				$this->m_pemesanan->simpan_pembayaran($data);

				$status = array(
					'id_pemesanan' => $id_pemesanan,
					'status_pembayaran' => '1',
				);
				$this->m_pemesanan->update_status_pembayaran($status);

				$this->session->set_flashdata('pesan', 'Data Berhasil DiUpload !!!');
				redirect('Pemesanan');
			}
		}

		$data = array(
			'title' => 'Pembayaran',
			'pesanan' => $this->m_pemesanan->detail_pesanan($id_pemesanan),
			// 'rekening' => $this->m_pemesanan->rekening(),
			'isi' => 'frontend/pesanan/v_bayar'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	##batal beli tiket
	public function batal($id_pemesanan)
	{
		$data = array(
			'id_pemesanan' => $id_pemesanan,
			'status_pemesanan' => '3',
		);
		$this->m_pemesanan->update_status_pembayaran($data);
		$this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
		redirect('pemesanan');
	}
	#detail tiket dibeli
	public function detail($id_pemesanan)
	{
		$data = array(
			'title' => 'Pesanan Saya',
			'detail' => $this->m_pemesanan->detail($id_pemesanan),
			'isi' => 'frontend/pesanan/v_detail'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	//ulasan
	public function ulasan($id_pemesanan)
	{
		$data = array(
			'title' => 'Pesanan Saya',
			'ulasan' => $this->m_pemesanan->detail_rating($id_pemesanan),
			'isi' => 'frontend/ulasan/v_ulasan'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	public function rating($id_pemesanan)
	{
		$data = array(
			'id_ulasan' => $this->input->post('id_ulasan'),
			'rating' => $this->input->post('rating'),
			'isi_ulasan' => $this->input->post('isi_ulasan'),
			'tgl_ulasan' => date('Y-m-d'),
			'status_ulasan' => 1,
		);
		$this->db->where('id_ulasan', $data['id_ulasan']);
		$this->db->update('ulasan', $data);
		redirect('pemesanan/ulasan/' . $id_pemesanan);
	}
}
