<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pemesanan');
    }

    public function index()
    {
        $data = array(
            'title' => 'Pesanan Saya',
            'pesanan' => $this->m_pemesanan->pesanan(),
            'belum_bayar' => $this->m_pemesanan->belum_bayar(),
            'diproses' => $this->m_pemesanan->diproses(),
            'selesai' => $this->m_pemesanan->selesai(),
            'isi' => 'frontend/pesanan/v_pesanan'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function belum_bayar()
    {
        $data = array(
            'title' => 'Pesanan Masuk',
            'belum_bayar' => $this->m_pemesanan->belum_bayar(),
            'isi' => 'frontend/pesanan/v_pesanan'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }
    public function diproses()
    {
        $data = array(
            'title' => 'Pesanan Diproses',
            'diproses' => $this->m_pemesanan->diproses(),
            'isi' => 'frontend/pesanan/v_pesanan_saya'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }
    public function selesai()
    {
        $data = array(
            'title' => 'Pesanan Selesai',
            'selesai' => $this->m_pemesanan->selesai(),
            'isi' => 'frontend/pesanan/v_pesanan_saya'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }
    public function batal()
    {
        $data = array(
            'title' => 'Pesanan Batal',
            'batal' => $this->m_pemesanan->batal(),
            'isi' => 'frontend/pesanan/v_pesanan_saya'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    //-------------------- PEMBAYARAN --------------------
    public function bayar($id_pemesanan)
    {
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_bayar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "bukti_bayar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Pembayaran',
                    'pesanan' => $this->m_pemesanan->detail_pesanan($id_pemesanan),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'frontend/pesanan/v_bayar'
                );
                $this->load->view('frontend/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_bayar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_pemesanan' => $id_pemesanan,
                    'atas_nama' => $this->input->post('atas_nama'),
                    'bukti_bayar' => $upload_data['uploads']['file_name'],
                );
                $this->m_pemesanan->simpan_pembayaran($data);

                $status = array(
                    'id_pemesanan' => $id_pemesanan,
                    'status_pembayaran' => '1',
                );
                $this->m_pemesanan->update_status_pembayaran($status);

                $this->session->set_flashdata('pesan', 'Data Berhasil DiUpload !!!');
                redirect('Pemesanan');
            }
        }

        $data = array(
            'title' => 'Pembayaran',
            'pesanan' => $this->m_pemesanan->detail_pesanan($id_pemesanan),
            // 'rekening' => $this->m_pemesanan->rekening(),
            'isi' => 'frontend/pesanan/v_bayar'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function diterima($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => 3
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Diterima');
        redirect('pesanan_saya');
    }

    public function dibatalkan($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => 4
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
        redirect('pesanan_saya');
    }

    //detail data order
    public function detail($no_order)
    {
        $data = array(
            'title' => 'Pesanan',
            'pesanan_detail' => $this->m_pemesanan->pesanan_detail($no_order),
            'info' => $this->m_pemesanan->info($no_order),
            'isi' =>  'frontend/pesanan/v_detail_pesanan'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    //pemesanan selesai deteail & review produk
    public function detail_selesai($no_order)
    {
        $this->form_validation->set_rules('isi', 'Catatan', 'required', array('required' => '%s Mohon untuk Diisi!!!'));
        $this->form_validation->set_rules('nama_pelanggan', 'Catatan', 'required', array('required' => '%s Mohon untuk Diisi!!!'));

        $data = array(
            'title' => 'Pesanan',
            'pesanan_detail' => $this->m_pemesanan->pesanan_detail($no_order),
            'info' => $this->m_pemesanan->info($no_order),
            'isi' =>  'frontend/pesanan/v_detail_selesai'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function insert_riview()
    {
        $data['insert'] = $this->m_pemesanan->insert_riview();
        $this->session->set_flashdata('pesan', 'Berhasil Memberi Riview');
        redirect('pesanan_saya');
    }
}
