<?php
/**
 * Description of C_Stock
 *
 * @author acer
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Stock {
    
    public function __construct() {
        parent::__Construct();
        $this->load->helper('string');
        $this->load->helper('date');
        $this->load->model('M_Barang');
    }
    
    public function Stock() {
        $this->load->view('Head/V_Header');
        $this->load->view('Head/V_Menu');
        $result['query'] = $this->M_Barang->getStock();
        $this->load->view('V_ReadyStock', $result);
        $this->load->view('Foot/V_Footer');
    }
}
