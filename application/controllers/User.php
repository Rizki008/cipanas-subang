<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pemesanan');
		$this->load->model('m_user');
	}

	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'user' => $this->m_user->user(),
			'isi' => 'backend/user/v_user'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required', array('required' => '%s Mohon untuk diisi'));
		$this->form_validation->set_rules('username_admin', 'username', 'required', array('required' => '%s Mohon untuk diisi'));
		$this->form_validation->set_rules('password_admin', 'password', 'required', array('required' => '%s Mohon untuk diisi'));
		$this->form_validation->set_rules('level_admin', 'Level Admin', 'required', array('required' => '%s Mohon untuk diisi'));


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Data Admin',
				'isi' => 'backend/user/v_add'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'nama_admin' => $this->input->post('nama_admin'),
				'username_admin' => $this->input->post('username_admin'),
				'password_admin' => $this->input->post('password_admin'),
				'level_admin' => $this->input->post('level_admin'),
			);
			$this->m_user->add($data);
			$this->session->set_flashdata('pesan', 'Data User Berhasil Ditambahkan');
			redirect('user', 'refresh');
		}
		$data = array(
			'title' => 'Data User',
			'isi' => 'backend/user/v_add'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	public function edit($id_admin = NULL)
	{
		$this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required', array('required' => '%s Mohon untuk diisi'));
		$this->form_validation->set_rules('username_admin', 'Userna,e', 'required', array('required' => '%s Mohon untuk diisi'));
		$this->form_validation->set_rules('password_admin', 'Password', 'required', array('required' => '%s Mohon untuk diisi'));
		$this->form_validation->set_rules('level_admin', 'Level Admin', 'required', array('required' => '%s Mohon untuk diisi'));


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Data User',
				'user' => $this->m_user->detail_user($id_admin),
				'isi' => 'backend/user/v_edit'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_admin' => $id_admin,
				'nama_admin' => $this->input->post('nama_admin'),
				'username_admin' => $this->input->post('username_admin'),
				'password_admin' => $this->input->post('password_admin'),
				'level_admin' => $this->input->post('level_admin'),
			);
			$this->m_user->edit($data);
			$this->session->set_flashdata('pesan', 'Data user Berhasil Ditambahkan');
			redirect('user', 'refresh');
		}
		$data = array(
			'title' => 'Data user',
			'user' => $this->m_user->detail_user($id_admin),
			'isi' => 'backend/user/v_edit'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	public function hapus($id_admin = null)
	{
		$data = array(
			'id_admin' => $id_admin,
		);
		$this->m_user->hapus($data);
		$this->session->set_flashdata('pesan', 'Data user Berhasil Ditambahkan');
		redirect('user', 'refresh');
	}

	public function pelanggan()
	{
		$data = array(
			'title' => 'Data Wisatawan',
			'pelanggan' => $this->m_user->pelanggan(),
			'isi' => 'backend/pelanggan/v_pelanggan'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}


	public function update_wisatawan($id_wisatawan = NULL)
	{
		$this->form_validation->set_rules('gratis_tiket', 'gratis tiket', 'required', array('required' => '%s Mohon untuk diisi'));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Data User',
				'user' => $this->m_user->detail_wisatawan($id_wisatawan),
				'isi' => 'backend/pelanggan/v_edit'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_wisatawan' => $id_wisatawan,
				'gratis_tiket' => $this->input->post('gratis_tiket'),
			);
			$this->m_user->update_gratis($data);
			$this->session->set_flashdata('pesan', 'Data user Berhasil Ditambahkan');
			redirect('user/pelanggan', 'refresh');
		}
		$data = array(
			'title' => 'Data user',
			'user' => $this->m_user->detail_wisatawan($id_wisatawan),
			'isi' => 'backend/pelanggan/v_edit'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
}
