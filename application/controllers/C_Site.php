<?php

/**
 * Description of C_Site
 *
 * @author acer
 */
class C_Site extends CI_Controller {

    function _construct() {
        parent::CI_Controller();
        $this->is_logged_in();
        $this->load->model('M_Barang');
        $this->load->library('session');
        $Email = $_SESSION['Email'];
    }

    function petugas() {
        redirect('C_Barang/index');
    }

    function admin() {
        redirect('C_Barang/ShowBarang');
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            
        }
    }

}
