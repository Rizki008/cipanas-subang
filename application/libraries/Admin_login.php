<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_login
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_auth');
	}

	public function login($username_admin, $password_admin)
	{
		$cek = $this->ci->m_auth->login($username_admin, $password_admin);
		if ($cek) {
			$id_admin = $cek->id_admin;
			$nama_admin = $cek->nama_admin;
			$no_tlpn_admin = $cek->no_tlpn_admin;

			$alamat_admin = $cek->alamat_admin;

			$username_admin = $cek->username_admin;
			$level_admin = $cek->level_admin;

			//session
			$this->ci->session->set_userdata('id_admin', $id_admin);
			$this->ci->session->set_userdata('nama_admin', $nama_admin);
			// $this->ci->session->set_userdata('email', $email);
			$this->ci->session->set_userdata('no_tlpn_admin', $no_tlpn_admin);
			$this->ci->session->set_userdata('alamat_admin', $alamat_admin);
			$this->ci->session->set_userdata('username_admin', $username_admin);
			$this->ci->session->set_userdata('level_admin', $level_admin);

			if ($level_admin == 1) {
				redirect('admin');
			} elseif ($level_admin == 2) {
				redirect('pemilik');
			}
		} else {
			$this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
			redirect('admin/login');
		}
	}

	public function proteksi_halaman()
	{
		if ($this->ci->session->userdata('nama_admin') == '') {
			$this->ci->session->set_flashdata('error', 'Anda Belum Masuk');
			redirect('admin/login');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('id_admin');
		$this->ci->session->unset_userdata('nama_admin');
		$this->ci->session->set_userdata('no_tlpn_admin');
		$this->ci->session->set_userdata('alamat_admin');
		$this->ci->session->set_userdata('username_admin');
		$this->ci->session->unset_userdata('level_admin');
		$this->ci->session->set_flashdata('pesan', 'Berhasil Keluar!!!!');
		redirect('admin/login');
	}
}
