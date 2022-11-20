<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{

    public function lap_hari($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('detail_pemesanan');
        $this->db->join('pemesanan', 'detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan', 'left');
        $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
        $this->db->where('DAY(pemesanan.tgl_pemesanan)', $tanggal);
        $this->db->where('MONTH(pemesanan.tgl_pemesanan)', $bulan);
        $this->db->where('YEAR(pemesanan.tgl_pemesanan)', $tahun);
        $this->db->where('status_pemesanan=1');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    public function lap_bulan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('detail_pemesanan');
        $this->db->join('pemesanan', 'detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan', 'left');
        $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
        $this->db->where('MONTH(pemesanan.tgl_pemesanan)', $bulan);
        $this->db->where('YEAR(pemesanan.tgl_pemesanan)', $tahun);
        $this->db->where('status_pemesanan=1');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    public function lap_tahun($tahun)
    {
        $this->db->select('*');
        $this->db->from('detail_pemesanan');
        $this->db->join('pemesanan', 'detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan', 'left');
        $this->db->join('tiket', 'detail_pemesanan.id_tiket = tiket.id_tiket', 'left');
        $this->db->where('YEAR(pemesanan.tgl_pemesanan)', $tahun);
        $this->db->where('status_pemesanan=1');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
}
