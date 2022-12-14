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
        // $this->form_validation->set_rules('tipe_tiket', 'Tipe Tiket', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('deskripsi_tiket', 'Deskripsi Tiket', 'required', array('required' => '%s Mohon untuk diisi'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/tiket';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']  = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Data Tiket',
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'backend/tiket/v_add'
                );
                $this->load->view('backend/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/tiket' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_tiket' => $this->input->post('nama_tiket'),
                    'harga_tiket' => $this->input->post('harga_tiket'),
                    // 'tipe_tiket' => $this->input->post('tipe_tiket'),
                    'deskripsi_tiket' => $this->input->post('deskripsi_tiket'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_tiket->add($data);

                //menambahkan data ke tabel diskon otomatis
                $id = $this->m_tiket->id_tiket();
                $id_tiket = $id->id;
                $promo = array(
                    'id_tiket' => $id_tiket,
                    'tgl_promo' => date('Y-m-d'),
                    'ket' => '0',
                    'range' => '0'
                );
                $this->m_tiket->add_promo($promo);
                $this->session->set_flashdata('pesan', 'Data Tiket Berhasil Ditambahkan');
                redirect('tiket', 'refresh');
            }
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
        // $this->form_validation->set_rules('tipe_tiket', 'Tipe Tiket', 'required', array('required' => '%s Mohon untuk diisi'));
        $this->form_validation->set_rules('deskripsi_tiket', 'Deskripsi Tiket', 'required', array('required' => '%s Mohon untuk diisi'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/tiket';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']  = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Data Tiket',
                    'tiket' => $this->m_tiket->tiket_detail($id_tiket),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'backend/tiket/v_edit'
                );
                $this->load->view('backend/v_wrapper', $data, FALSE);
            } else {
                //hapus gambar di folder
                $tiket = $this->m_tiket->tiket_detail($id_tiket);
                if ($tiket->gambar !== "") {
                    unlink('./assets/tiket/' . $tiket->gambar);
                }
                //end
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/tiket' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_tiket' => $id_tiket,
                    'nama_tiket' => $this->input->post('nama_tiket'),
                    'harga_tiket' => $this->input->post('harga_tiket'),
                    // 'tipe_tiket' => $this->input->post('tipe_tiket'),
                    'deskripsi_tiket' => $this->input->post('deskripsi_tiket'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_tiket->edit($data);
                $this->session->set_flashdata('pesan', 'Data Tiket Berhasil Ditambahkan');
                redirect('tiket', 'refresh');
            }
            $data = array(
                'id_tiket' => $id_tiket,
                'nama_tiket' => $this->input->post('nama_tiket'),
                'harga_tiket' => $this->input->post('harga_tiket'),
                // 'tipe_tiket' => $this->input->post('tipe_tiket'),
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
        //hapus gambar
        $tiket = $this->m_tiket->tiket_detail($id_tiket);
        if ($tiket->gambar !== "") {
            unlink('./assets/tiket/' . $tiket->gambar);
        }

        $data = array(
            'id_tiket' => $id_tiket,
        );
        $this->m_tiket->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Tiket Berhasil Ditambahkan');
        redirect('tiket', 'refresh');
    }
}
