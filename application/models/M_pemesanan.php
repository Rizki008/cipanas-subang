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


    public function upload_buktibayar($data)
    {
        $this->db->where('id_pemesanan', $data['id_pemesanan']);
        $this->db->update('pemesanan', $data);
    }

    //informasi pesanan
    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('status_pemesanan=0');
        $this->db->order_by('id_pemesanan', 'desc');
        return $this->db->get()->result();
    }

    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('status_pemesanan=1');
        $this->db->order_by('id_pemesanan', 'desc');
        return $this->db->get()->result();
    }

    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('status_pemesanan=2');
        $this->db->order_by('id_pemesanan', 'desc');
        return $this->db->get()->result();
    }

    public function batal()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('status_pemesanan=3');
        $this->db->order_by('id_pemesanan', 'desc');
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
