<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    //informasi pesanan
    public function masuk()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
        $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
        $this->db->where('status_pemesanan=0');
        $this->db->order_by('pemesanan.id_pemesanan', 'desc');
        $this->db->group_by('detail_pemesanan.id_pemesanan');

        return $this->db->get()->result();
    }

    public function proses()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
        $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
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
        $this->db->where('status_pemesanan=3');
        $this->db->order_by('pemesanan.id_pemesanan', 'desc');
        $this->db->group_by('detail_pemesanan.id_pemesanan');
        return $this->db->get()->result();
    }

    public function detail_pesanan($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->get()->row();
    }
}
