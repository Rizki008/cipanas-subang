<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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
        $this->form_validation->set_rules('nama_user', 'Nama user', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('password', 'password', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('level_user', 'Level User', 'required', array('required' => '%s Mohon untuk diisi'));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Data User',
                'isi' => 'backend/user/v_add'
            );
            $this->load->view('backend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'nama_user' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level_user' => $this->input->post('level_user'),
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

    public function edit($id_user = NULL)
    {
        $this->form_validation->set_rules('nama_user', 'Nama Tiket', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('username', 'Harga Tiket', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('password', 'Tipe Tiket', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('level_user', 'Deskripsi Tiket', 'required', array('required' => '%s Mohon untuk diisi'));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Data User',
                'user' => $this->m_user->user_detail($id_user),
                'isi' => 'backend/tiket/v_edit'
            );
            $this->load->view('backend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_user' => $id_user,
                'nama_user' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level_user' => $this->input->post('level_user'),
            );
            $this->m_user->edit($data);
            $this->session->set_flashdata('pesan', 'Data user Berhasil Ditambahkan');
            redirect('user', 'refresh');
        }
        $data = array(
            'title' => 'Data user',
            'user' => $this->m_user->user_detail($id_user),
            'isi' => 'backend/user/v_edit'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function hapus($id_user = null)
    {
        $data = array(
            'id_user' => $id_user,
        );
        $this->m_user->hapus($data);
        $this->session->set_flashdata('pesan', 'Data user Berhasil Ditambahkan');
        redirect('user', 'refresh');
    }
}
