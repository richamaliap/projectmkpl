<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Barang extends CI_Controller {

    public function __construct() {
        parent::__Construct();
        $this->load->helper('string');
        $this->load->helper('date');
        $this->load->model('M_Barang');
    }

    public function index() {
        $this->load->view('Head/V_Header');
        $this->load->view('Head/V_Menu');
        $result['query'] = $this->M_Barang->ShowBarang();
        $this->load->view('V_Home', $result);
        $this->load->view('Foot/V_Footer');
    }
}
