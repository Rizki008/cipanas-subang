<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pemesanan extends CI_Model
{
    public function simpan_pemesanan($data)
    {
        $this->db->insert('pemesanan', $data);
    }

    public function simpan_detail_pemesanan($data_rinci)
    {
        $this->db->insert('detail_pemesanan', $data_rinci);
    }

    public function simpan_pembayaran($data)
    {
        $this->db->insert('pembayaran', $data);
    }
    public function penilaian($data)
    {
        $this->db->insert('ulasan', $data);
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('id_pembayaran', $data['id_pembayaran']);
        $this->db->update('pembayaran', $data);
    }
    public function update_status_pembayaran($data)
    {
        $this->db->where('id_pemesanan', $data['id_pemesanan']);
        $this->db->update('pemesanan', $data);
    }

    //informasi pesanan
    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
        // $this->db->where('status_pemesanan=0');
        $this->db->order_by('id_pemesanan', 'desc');
        return $this->db->get()->result();
    }
    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
        $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
        $this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
        $this->db->where('status_pemesanan=0');
        $this->db->order_by('pemesanan.id_pemesanan', 'desc');
        $this->db->group_by('detail_pemesanan.id_pemesanan');

        return $this->db->get()->result();
    }

    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
        $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
        $this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
        $this->db->where('status_pemesanan=1');
        $this->db->order_by('pemesanan.id_pemesanan', 'desc');
        $this->db->group_by('detail_pemesanan.id_pemesanan');
        return $this->db->get()->result();
    }

    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
        $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
        $this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
        $this->db->where('status_pemesanan=2');
        $this->db->order_by('pemesanan.id_pemesanan', 'desc');
        $this->db->group_by('detail_pemesanan.id_pemesanan');
        return $this->db->get()->result();
    }

    public function batal()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
        $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
        $this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
        $this->db->where('status_pemesanan=3');
        $this->db->order_by('pemesanan.id_pemesanan', 'desc');
        $this->db->group_by('detail_pemesanan.id_pemesanan');
        return $this->db->get()->result();
    }

    public function detail($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
        $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
        $this->db->where('pemesanan.id_pemesanan', $id_pemesanan);
        return $this->db->get()->result();
    }
}
