<?php

/**
 * Description of C_Edit
 *
 * @author acer
 */
class C_Edit extends CI_Controller{

    public function __construct() {
        parent::__Construct();
        $this->load->helper('string');
        $this->load->helper('date');
        $this->load->model('M_Barang');
    }

    public function checkFormEdit() {
        $this->form_validation->set_rules('Divisi', 'Divisi', 'required');
        $this->form_validation->set_rules('SerialNumber', 'SerialNumber', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('TipeBarang', 'TipeBarang', 'required');
        $this->form_validation->set_rules('NamaBarang', 'NamaBarang', 'trim|required|min_length[5]|max_length[64]');
        $this->form_validation->set_rules('Lokasi1', 'Lokasi1', 'required');
        $this->form_validation->set_rules('Lokasi2', 'Lokasi2', 'required');
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
            redirect('C_Barang/ShowBarang');
        } else {
            echo "<div class='success'>";
            echo "Gagal";
            echo "<a href='" . base_url('index.php/C_Barang/Edit') . "'>Kembali ke Halaman Utama</a>";
            echo "</div>";
        }
    }

    public function Edit($SerialNumber) {
        $this->load->view('Head/V_Header');
        $this->load->view('Head/V_MenuAdmin');
        $result['data'] = $this->M_Barang->GetDataBarang($SerialNumber);
        if (filter_input(INPUT_POST, "cancel")) {
            redirect('C_Barang/ShowBarang');
        } else if (filter_input(INPUT_POST, "submit")) {
            $this->checkFormEdit();
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('V_TambahBarang');
            } else {
                $Divisi = $this->getDivisi();
                $SerialNumber = $this->getSerialNumber();
                $TipeBarang = $this->getTipeBarang();
                $NamaBarang = $this->getNamaBarang();
                $Lokasi1 = $this->getLokasi1();
                $Lokasi2 = $this->getLokasi2();
                $LastUpdate = $this->getLastUpdate();
                $Status = $this->getStatus();
                $ID = $this->getID();

//                if ($Status == 'Tersedia') {
//                    $Ready = 1 + ($this->M_Barang->CountReadyStock($TipeBarang));
//                    $this->M_Barang->CreateReadyStock($ID, $TipeBarang, $Ready);
//                } else if ($Status == 'Terpakai') {
//                    $Used = 1 + ($this->M_Barang->CountUsed($TipeBarang));
//                    $this->M_Barang->CreateUsed($ID, $TipeBarang, $Used);
//                }

                $result = $this->M_Barang->Update($SerialNumber, $Divisi, $TipeBarang, $NamaBarang, $Lokasi1, $Lokasi2, $LastUpdate, $Status);
                $this->checkResult($result);
            }
        } else {
            $this->load->view('V_EditBarang', $result);
        }
        $this->load->view('Foot/V_Footer');
    }

}