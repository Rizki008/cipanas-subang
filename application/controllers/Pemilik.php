<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi');
	}


	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'tot_boking' => $this->m_transaksi->tot_boking(),
			'tot_uang' => $this->m_transaksi->tot_uang(),
			'tot_tiket' => $this->m_transaksi->tot_tiket(),
			'tot_wisatawan' => $this->m_transaksi->tot_wisatawan(),
			'grafik' => $this->m_transaksi->grafik(),
			'grafik_kelamin' => $this->m_transaksi->grafik_kelamin(),
			'isi' => 'v_pemilik'
		);
		$this->load->view('pemilik/v_wrapper', $data, FALSE);
	}
}
