<?php

/**
 * Description of C_TambahBarang
 *
 * @author acer
 */
class C_TambahBarang extends CI_Controller {

    public function __construct() {
        parent::__Construct();
        $this->load->helper('string');
        $this->load->helper('date');
        $this->load->model('M_Barang');
    }

    public function isNotPindah($String) {
        if ($String == 'Pindah') {
            $this->form_validation->set_message('isNotPindah', 'The Status field can not be Pindah');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkLokasi2() {
        $this->form_validation->set_rules('Lokasi2', 'Lokasi2', 'required');
    }

    public function checkStatus() {
        $this->form_validation->set_rules('Status', 'Status', 'required|callback_isNotPindah');
    }

    public function checkFormTambahBarang() {
        $this->form_validation->set_rules('Divisi', 'Divisi', 'required');
        $this->form_validation->set_rules('SerialNumber', 'SerialNumber', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('TipeBarang', 'TipeBarang', 'required');
        $this->form_validation->set_rules('NamaBarang', 'NamaBarang', 'trim|required|min_length[2]|max_length[64]');
        $this->form_validation->set_rules('Lokasi1', 'Lokasi1', 'required');
        $this->form_validation->set_rules('TanggalBuat', 'TanggalBuat');
        $this->form_validation->set_rules('Status', 'Status', 'required');
    }

    public function getID() {
        $ID = random_string('numeric', 2);
        return $ID;
    }

    public function getDivisi() {
        $Divisi = filter_input(INPUT_POST, "Divisi");
        return $Divisi;
    }

    public function getSerialNumber() {
        $SerialNumber = strtoupper(filter_input(INPUT_POST, "SerialNumber"));
        return $SerialNumber;
    }

    public function getTipeBarang() {
        $TipeBarang = strtoupper(filter_input(INPUT_POST, "TipeBarang"));
        return $TipeBarang;
    }

    public function getNamaBarang() {
        $NamaBarang = strtoupper(filter_input(INPUT_POST, "NamaBarang"));
        return $NamaBarang;
    }

    public function getLokasi1() {
        $Lokasi1 = filter_input(INPUT_POST, "Lokasi1");
        return $Lokasi1;
    }

    public function getLokasi2() {
        $Lokasi2 = filter_input(INPUT_POST, "Lokasi2");
        return $Lokasi2;
    }

    public function getLastUpdate() {
        $LastUpdate = mdate('%Y-%m-%d %h:%i:%s', now());
        return $LastUpdate;
    }

    public function getStatus() {
        $Status = filter_input(INPUT_POST, "Status");
        return $Status;
    }

    public function checkResult($result) {
        if ($result) {
            $result['query'] = $this->M_Barang->ShowBarang();
            redirect('C_Barang/index');
        } else {
            echo "<div class='success'>";
            echo "Gagal";
            echo "<a href='" . base_url('index.php/C_Barang/TambahBarang') . "'>Kembali ke Halaman Utama</a>";
            echo "</div>";
        }
    }

    public function TambahBarangAdmin() {
        $this->load->view('Head/V_Header');
        $this->load->view('Head/V_MenuAdmin');
        if (filter_input(INPUT_POST, "cancel")) {
            redirect('C_Barang/ShowBarang');
        } else if (filter_input(INPUT_POST, "submit")) {
            $this->checkFormTambahBarang();
            $this->checkLokasi2();
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('V_TambahBarangAdmin');
            } else {
                $Divisi = $this->getDivisi();
                $SerialNumber = $this->getSerialNumber();
                $TipeBarang = $this->getTipeBarang();
                $NamaBarang = $this->getNamaBarang();
                $Lokasi1 = $this->getLokasi1();
                $Lokasi2 = $this->getLokasi2();
                $TanggalBuat = $this->getLastUpdate();
                $LastUpdate = $TanggalBuat;
                $Status = $this->getStatus();

                $result = $this->M_Barang->CreateBarang($SerialNumber, $Divisi, $TipeBarang, $NamaBarang, $Lokasi1, $Lokasi2, $TanggalBuat, $LastUpdate, $Status);
                $this->checkResult($result);
            }
        } else {
            $this->load->view('V_TambahBarangAdmin');
        }
        $this->load->view('Foot/V_Footer');
    }

    public function TambahBarang() {
        $this->load->view('Head/V_Header');
        $this->load->view('Head/V_Menu');
        if (filter_input(INPUT_POST, "cancel")) {
            redirect('C_Barang/index');
        } else if (filter_input(INPUT_POST, "submit")) {
            $this->checkFormTambahBarang();
            $this->checkStatus();
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('V_TambahBarang');
            } else {
                $Divisi = $this->getDivisi();
                $SerialNumber = $this->getSerialNumber();
                $TipeBarang = $this->getTipeBarang();
                $NamaBarang = $this->getNamaBarang();
                $Lokasi1 = $this->getLokasi1();
                $Lokasi2 = $Lokasi1;
                $TanggalBuat = $this->getLastUpdate();
                $LastUpdate = $TanggalBuat;
                $Status = $this->getStatus();

                $result = $this->M_Barang->CreateBarang($SerialNumber, $Divisi, $TipeBarang, $NamaBarang, $Lokasi1, $Lokasi2, $TanggalBuat, $LastUpdate, $Status);
                $this->checkResult($result);
            }
        } else {
            $this->load->view('V_TambahBarang');
        }
        $this->load->view('Foot/V_Footer');
    }

}
