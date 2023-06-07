<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
	}
	public function index()
	{
		$data = array(
			'title' => 'Cipanas Subang',
			'tiket' => $this->m_home->tiket(),
			'ulasan' => $this->m_home->ulasan(),
			'isi' => 'v_home'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function search()
	{
		$keyword = $this->input->get('keyword');
		$data = array(
			'keyword'    => $keyword,
			'pencarian' => $this->m_home->ambil_data($keyword),
			'isi'        => 'frontend/pencarian/v_pencarian'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function detail_produk($id_tiket = null)
	{
		$data = array(
			'title' => 'Detail Produk',
			'data' => $this->m_home->detail_produk($id_tiket),
			'reviews' => $this->m_home->reviews($id_tiket),
			'views' => $this->m_home->views($id_tiket),
			'views_ulasan' => $this->m_home->views_ulasan($id_tiket),
			'isi' => 'frontend/booking/v_detail'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}
