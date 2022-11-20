<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_login
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_auth');
	}

	public function login_wisatawan($username, $password)
	{
		$cek = $this->ci->m_auth->login_wisatawan($username, $password);
		if ($cek) {
			$id_wisatawan = $cek->id_wisatawan;
			$nama_wisatawan = $cek->nama_wisatawan;
			$no_hp = $cek->no_hp;
			$jk = $cek->jk;
			$alamat_detail = $cek->alamat_detail;
			$provinsi = $cek->provinsi;
			$kab_kota = $cek->kab_kota;
			$ttl = $cek->ttl;
			$username = $cek->username;

			//session
			$this->ci->session->set_userdata('id_wisatawan', $id_wisatawan);
			$this->ci->session->set_userdata('nama_wisatawan', $nama_wisatawan);
			$this->ci->session->set_userdata('no_hp', $no_hp);
			$this->ci->session->set_userdata('jk', $jk);
			$this->ci->session->set_userdata('alamat_detail', $alamat_detail);
			$this->ci->session->set_userdata('provinsi', $provinsi);
			$this->ci->session->set_userdata('kab_kota', $kab_kota);
			$this->ci->session->set_userdata('ttl', $ttl);
			$this->ci->session->set_userdata('username', $username);

			redirect('home');
		} else {
			$this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
			redirect('pelanggan/login');
		}
	}

	public function proteksi_halaman()
	{
		if ($this->ci->session->userdata('nama_wisatawan') == '') {
			$this->ci->session->set_flashdata('error', 'Anda Belum Masuk');
			redirect('pelanggan/login');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('id_wisatawan');
		$this->ci->session->unset_userdata('nama_wisatawan');
		$this->ci->session->set_userdata('no_hp');
		$this->ci->session->set_userdata('jk');
		$this->ci->session->set_userdata('alamat_detail');
		$this->ci->session->set_userdata('provinsi');
		$this->ci->session->set_userdata('kab_kota');
		$this->ci->session->set_userdata('ttl');
		$this->ci->session->set_userdata('username');
		$this->ci->session->set_flashdata('pesan', 'Berhasil Keluar!!!!');
		redirect('pelanggan/login');
	}
}
