<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    //jumlah akumulasi
    public function tot_tiket()
    {
        $this->db->select_sum('qty');
        return $this->db->get('detail_pemesanan')->num_rows();
    }

    public function tot_uang()
    {
        $this->db->select_sum('total');
        $this->db->from('pemesanan');
        return $this->db->get()->num_rows();
    }

    public function tot_wisatawan()
    {
        return $this->db->get('wisatawan')->num_rows();
    }

    public function tot_boking()
    {
        $this->db->where('status_pemesanan=0');
        return $this->db->get('pemesanan')->num_rows();
    }

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

    public function update($data)
    {
        $this->db->where('id_pemesanan', $data['id_pemesanan']);
        $this->db->update('pemesanan', $data);
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

    public function grafik()
    {
        $this->db->select_sum('qty');
        $this->db->select('tiket.nama_tiket');
        //$this->db->select('rinci_transaksi.qty');
        $this->db->from('detail_pemesanan');
        $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
        $this->db->group_by('detail_pemesanan.id_tiket');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
}
