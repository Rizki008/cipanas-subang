<?php
defined('BASEPATH') or exit('No direct script access allowes');

class M_auth extends CI_Model
{
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array(
			'username' => $username,
			'password' => $password
		));
		return $this->db->get()->row();
	}

	public function register($data)
	{
		$this->db->insert('user', $data);
	}

	// public function login_pelanggan($email, $password)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('user');
	// 	$this->db->where(array(
	// 		'email' => $email,
	// 		'password' => $password
	// 	));
	// 	return $this->db->get()->row();
	// }
}
