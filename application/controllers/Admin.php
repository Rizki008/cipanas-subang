<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
            $this->admin_login->login($username_admin, $password_admin);
        }
        $data = array(
            'title' => 'Masuk Pelanggan',
            'isi' => 'backend/log/v_login'
        );
        $this->load->view('backend/log/v_login', $data, FALSE);
    }

    public function logout()
    {
        $this->admin_login->logout();
    }
}
