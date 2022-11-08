<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tiket extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tiket');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'tiket' => $this->m_tiket->tiket(),
            'isi' => 'backend/tiket/v_tiket'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_tiket', 'Nama Tiket', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('tipe_tiket', 'Tipe Tiket', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('deskripsi_tiket', 'Deskripsi Tiket', 'required', array('required' => '%s Mohon untuk diisi'));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Data Tiket',
                'isi' => 'backend/tiket/v_add'
            );
            $this->load->view('backend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'nama_tiket' => $this->input->post('nama_tiket'),
                'harga_tiket' => $this->input->post('harga_tiket'),
                'tipe_tiket' => $this->input->post('tipe_tiket'),
                'deskripsi_tiket' => $this->input->post('deskripsi_tiket'),
            );
            $this->m_tiket->add($data);
            $this->session->set_flashdata('pesan', 'Data Tiket Berhasil Ditambahkan');
            redirect('tiket', 'refresh');
        }
        $data = array(
            'title' => 'Data Tiket',
            'isi' => 'backend/tiket/v_add'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function edit($id_tiket = NULL)
    {
        $this->form_validation->set_rules('nama_tiket', 'Nama Tiket', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('tipe_tiket', 'Tipe Tiket', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('deskripsi_tiket', 'Deskripsi Tiket', 'required', array('required' => '%s Mohon untuk diisi'));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Data Tiket',
                'tiket' => $this->m_tiket->tiket_detail($id_tiket),
                'isi' => 'backend/tiket/v_edit'
            );
            $this->load->view('backend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_tiket' => $id_tiket,
                'nama_tiket' => $this->input->post('nama_tiket'),
                'harga_tiket' => $this->input->post('harga_tiket'),
                'tipe_tiket' => $this->input->post('tipe_tiket'),
                'deskripsi_tiket' => $this->input->post('deskripsi_tiket'),
            );
            $this->m_tiket->edit($data);
            $this->session->set_flashdata('pesan', 'Data Tiket Berhasil Ditambahkan');
            redirect('tiket', 'refresh');
        }
        $data = array(
            'title' => 'Data Tiket',
            'tiket' => $this->m_tiket->tiket_detail($id_tiket),
            'isi' => 'backend/tiket/v_edit'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function hapus($id_tiket = null)
    {
        $data = array(
            'id_tiket' => $id_tiket,
        );
        $this->m_tiket->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Tiket Berhasil Ditambahkan');
        redirect('tiket', 'refresh');
    }
}
