<?php

defined('BASEPATH') or exit('No direct sctipt access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
    }

    public function masuk()
    {
        $data = array(
            'title' => 'Booking Masuk',
            'masuk' => $this->m_transaksi->masuk(),
            'isi' => 'backend/transaksi/v_masuk'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
    public function verifikasi($id_pemesanan)
    {
        $data = array(
            'id_pemesanan' => $id_pemesanan,
            'status_pemesanan' => 1
        );
        $this->m_transaksi->update($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
        redirect('transaksi/proses');
    }
    public function detail($id_pemesanan)
    {
        $data = array(
            'title' => 'Booking Masuk',
            'detail' => $this->m_transaksi->detail(),
            'isi' => 'backend/transaksi/v_detail'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
    public function ambiltiket($id_pemesanan)
    {
        $data = array(
            'id_pemesanan' => $id_pemesanan,
            'status_pemesanan' => 2
        );
        $this->m_transaksi->update($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
        redirect('transaksi/selesai');
    }
    public function proses()
    {
        $data = array(
            'title' => 'Booking Proses',
            'proses' => $this->m_transaksi->proses(),
            'isi' => 'backend/transaksi/v_proses'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
    public function selesai()
    {
        $data = array(
            'title' => 'Booking Selesai',
            'selesai' => $this->m_transaksi->selesai(),
            'isi' => 'backend/transaksi/v_selesai'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
    public function batal()
    {
        $data = array(
            'title' => 'Booking Batal',
            'batal' => $this->m_transaksi->batal(),
            'isi' => 'backend/transaksi/v_batal'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
}
