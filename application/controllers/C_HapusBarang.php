<?php

/**
 * Description of C_HapusBarang
 *
 * @author acer
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_HapusBarang extends CI_Controller {

    public function Hapus($SerialNumber) {
        $this->load->model('M_Barang');
        $result = $this->M_Barang->DeleteBarang($SerialNumber);
        $result['query'] = $this->M_Barang->ShowBarang();
        redirect('C_Barang/ShowBarang');
    }

}
