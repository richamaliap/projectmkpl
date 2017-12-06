<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of C_Akun
 *
 * @author acer
 */
class C_Akun extends CI_Controller {

    public function __construct() {
        parent::__Construct();
        $this->load->model('M_Akun');
        $this->load->library('session');
    }

    public function getNIP() {
        $NIP = filter_input(INPUT_POST, "NIP");
        return $NIP;
    }

    public function getNama_Dpn() {
        $Nama_Dpn = filter_input(INPUT_POST, "Nama_Dpn");
        return $Nama_Dpn;
    }

    public function getNama_Blkg() {
        $Nama_Blkg = filter_input(INPUT_POST, "Nama_Blkg");
        return $Nama_Blkg;
    }

    public function getPassword() {
        $Password = filter_input(INPUT_POST, "Password");
        return $Password;
    }

    public function getDivisi() {
        $Divisi = filter_input(INPUT_POST, "Divisi");
        return $Divisi;
    }

    public function getEmail() {
        $Email = filter_input(INPUT_POST, "Email");
        return $Email;
    }

    public function getCount() {
        $count = $this->M_Akun->HowManyUsers();
        return $count;
    }

    public function getID() {
        $count = $this->getCount();
        $ID = 1 + ($count);
        return $ID;
    }

    public function checkFormAkun() {
        $this->form_validation->set_rules('NIP', 'NIP', 'trim|required|min_length[7]|max_length[20]');
        $this->form_validation->set_rules('Nama_Dpn', 'Nama_Dpn', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('Nama_Blkg', 'Nama_Blkg', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('Divisi', 'Divisi', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required|min_length[6]|max_length[32]');
        $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
    }

    public function checkResult($result, $SignUp) {
        if ($result) {
            if ($SignUp == '1'){
            $result['query'] = $this->M_Akun->ShowAkun();
            redirect('C_Akun/Akun');
            }else{
                redirect('C_login/validate_credentials');
            }
        }else {
            echo "<div class='success'>";
            echo "Gagal";
            echo "<a href='" . base_url('index.php/C_Akun/TambahAkun') . "'>Kembali ke Halaman Utama</a>";
            echo "</div>";
        }
    }

    public function AkunBaru() {
        $this->load->view('Head/V_HeaderCAccount');
        if (filter_input(INPUT_POST, "cancel")) {
            redirect('C_Login/validate_credentials');
        } else if (filter_input(INPUT_POST, "submit")) {
            $this->checkFormAkun();
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('V_TambahAkun');
            } else {
                $NIP = $this->getNIP();
                $Nama_Dpn = $this->getNama_Dpn();
                $Nama_Blkg = $this->getNama_Blkg();
                $Password = $this->getPassword();
                $Divisi = $this->getDivisi();
                $Email = $this->getEmail();
                $count = $this->getCount();
                $ID = $this->getID();
                $SignUp = '0';

                $result = $this->M_Akun->CreateAkun($NIP, $Nama_Dpn, $Nama_Blkg, $Password, $Divisi, $ID, $Email);
                $this->checkResult($result, $SignUp);
            }
        } else {
            $this->load->view('V_TambahAkun');
        }
        $this->load->view('Foot/V_Footer');
    }

}
