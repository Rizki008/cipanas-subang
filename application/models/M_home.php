<?php


defined('BASEPATH') or exit('No direct sctipt access allowed');

class M_home extends CI_Model
{

    public function tiket()
    {
        $this->db->select('*');
        $this->db->from('tiket');
        $this->db->join('promo', 'tiket.id_tiket = promo.id_tiket', 'left');
        $this->db->order_by('tiket.id_tiket', 'desc');
        $this->db->group_by('tiket.id_tiket');
        return $this->db->get()->result();
    }
}
