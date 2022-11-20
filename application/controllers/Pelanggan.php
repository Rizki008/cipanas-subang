<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
    }

    // List all your items
    public function register()
    {
        $this->form_validation->set_rules('nama_wisatawan', 'Nama Wisatawan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|min_length[11]|max_length[13]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'min_length' => '%s Minimal 11 angka !!!',
            'max_length' => '%s Maksimal 13 angka !!!'
        ));
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('ttl', 'Tempat, Tanggal Lahir', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('kab_kota', 'Kabupaten/Kota', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('alamat_detail', 'Alamat Lengkap', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        // $this->form_validation->set_rules('email', 'Email Pelanggan', 'required|is_unique[pelanggan.email]', array(
        //     'required' => '%s Mohon Untuk Diisi !!!',
        //     'is_unique' => '%s Email Sudah Terdaptar'
        // ));
        $this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('password', 'Password Pelanggan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password Pelanggan', 'required|matches[password]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'matches' => '%s Password Tidak Sama !!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Registrasi Pelanggan',
                'isi' => 'frontend/log/v_register'
            );
            $this->load->view('frontend/log/v_register', $data, FALSE);
        } else {
            $data = array(
                'nama_wisatawan' => $this->input->post('nama_wisatawan'),
                'username' => $this->input->post('username'),
                'no_hp' => $this->input->post('no_hp'),
                'ttl' => $this->input->post('ttl'),
                'jk' => $this->input->post('jk'),
                'password' => $this->input->post('password'),
                'provinsi' => $this->input->post('provinsi'),
                'kab_kota' => $this->input->post('kab_kota'),
                'alamat_detail' => $this->input->post('alamat_detail'),
            );
            $this->m_auth->register($data);
            $this->session->set_flashdata('pesan', 'Pendaftaran Berhasil, Silahkan Untuk Login!!!');
            redirect('pelanggan/login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->pelanggan_login->login_wisatawan($username, $password);
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

/* End of file Pelanggan.php */
