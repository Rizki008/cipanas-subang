<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'isi' => 'v_admin'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function login()
    {
        $this->form_validation->set_rules('username_admin', 'username', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password_admin', 'password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $username_admin = $this->input->post('username_admin');
            $password_admin = $this->input->post('password_admin');
            $this->pelanggan_login->login($username_admin, $password_admin);
        }
        $data = array(
            'title' => 'Masuk Pelanggan',
            'isi' => 'frontend/log/v_login'
        );
        $this->load->view('frontend/log/v_login', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }
}
