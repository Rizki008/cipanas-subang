<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_promo');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data promo',
            'promo' => $this->m_promo->promo(),
            'isi' => 'backend/promo/v_promo'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function edit($id_promo = NULL)
    {
        $this->form_validation->set_rules('range', 'Besar Promo', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('tgl_promo', 'Tanggal Promo', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('ket', 'Deskripsi Promo', 'required', array('required' => '%s Mohon untuk diisi'));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Data promo',
                'promo' => $this->m_promo->promo_detail($id_promo),
                'isi' => 'backend/promo/v_edit'
            );
            $this->load->view('backend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_promo' => $id_promo,
                'range' => $this->input->post('range'),
                'tgl_promo' => $this->input->post('tgl_promo'),
                'ket' => $this->input->post('ket'),
            );
            $this->m_promo->edit($data);
            $this->session->set_flashdata('pesan', 'Data promo Berhasil Ditambahkan');
            redirect('promo', 'refresh');
        }
        $data = array(
            'title' => 'Data promo',
            'promo' => $this->m_promo->promo_detail($id_promo),
            'isi' => 'backend/tiket/v_edit'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
}
