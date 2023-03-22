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
}
