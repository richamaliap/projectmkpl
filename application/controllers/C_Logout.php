<?php

class C_Logout extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        $this->load->library('session');
    }

    public function logout() {
        if (filter_input(INPUT_POST, "submit")) {
            unset($_SESSION['Email']);
        }
        $this->load->view('Login/V_Template');
        $this->load->view('Foot/V_Footer');
    }

}
