<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pemesanan');
    }

    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Tiket',
            'isi' => 'frontend/booking/v_booking'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id' => $this->input->post('id'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type'),
            'qty' => $this->input->post('qty'),
        );
        $this->cart->insert($data);
        redirect($redirect_page);
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('pembelian');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]'),
            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Berhasil Diupdate');
        redirect('pembelian');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('home');
    }

    public function cekout()
    {
        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();

        $this->form_validation->set_rules('tgl_booking', 'Tanggal Booking', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Langsung Beli',
                'isi' => 'frontend/booking/v_pesan'
            );
            $this->load->view('frontend/v_wrapper', $data, FALSE);
        } else {
            //simpan ke tabel transaksi
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'id_pemesanan' => $this->input->post('id_pemesanan'),
                'tgl_pemesanan' => date('Y-m-d'),
                'tgl_booking' => $this->input->post('tgl_booking'),
                'total' => $this->input->post('total'),
                'metode_bayar' => $this->input->post('metode_bayar'),
                'status_pembayaran' => '0',
                'status_pemesanan' => '0',
            );
            $this->m_pemesanan->simpan_pemesanan($data);

            //simpan ke tabel rinci transaksi
            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'id_pemesanan' => $this->input->post('id_pemesanan'),
                    'id_tiket' => $item['id'],
                    'qty' => $this->input->post('qty' . $i++),
                );
                $this->m_pemesanan->simpan_detail_pemesanan($data_rinci);
            }

            //simpan tabel pembayaran
            // $pembayaran = array(
            //     'id_pemesanan' => $this->input->post('id_pemesanan'),
            //     'atas_nama' => '0',
            //     'bukti_bayar' => '0'
            // );
            // $this->m_pemesanan->simpan_pembayaran($pembayaran);

            $this->session->set_flashdata('pesan', 'Pesanan Diproses');
            $this->cart->destroy();
            redirect('home');
        }
    }
}
