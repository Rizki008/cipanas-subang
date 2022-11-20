<?php
defined('BASEPATH') or exit('No direct script access allowes');

class M_auth extends CI_Model
{
	public function login($username_admin, $password_admin)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where(array(
			'username_admin' => $username_admin,
			'password_admin' => $password_admin
		));
		return $this->db->get()->row();
	}

	public function register($data)
	{
		$this->db->insert('wisatawan', $data);
	}

	public function login_wisatawan($username, $password)
	{
		$this->db->select('*');
		$this->db->from('wisatawan');
		$this->db->where(array(
			'username' => $username,
			'password' => $password
		));
		return $this->db->get()->row();
	}
}
