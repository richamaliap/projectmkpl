<?php

/**
 * Description of C_Login
 *
 * @author acer
 */
class C_Login extends CI_Controller {

    public function __construct() {
        parent::__Construct();
        $this->load->library('session');
    }

    public function validate_credentials() {
        if (filter_input(INPUT_POST, "login")) {
            $Email = filter_input(INPUT_POST, "Email");
            $Password = filter_input(INPUT_POST, "Password");

            $Count = $this->M_Akun->Count($Email, $Password);
            if ($Count != 0) {
                $Email = $this->session->userdata('Email');
                if (filter_input(INPUT_POST, "Email") == 'Warsyto@admin.com') {
                    redirect('C_Site/admin');
                } else {
                    redirect('C_Site/petugas');
                }
            } else {
                redirect('C_Login/validate_credentials');
            }
        } else {
            $this->load->view('Login/V_Template');
        }
    }

}
