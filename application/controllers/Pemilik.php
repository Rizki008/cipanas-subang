<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'isi' => 'v_pemilik'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }
}
