<?php

/**
 * Description of M_Akun
 *
 * @author acer
 */
class M_Akun extends CI_Model {

    public function ShowAkun() {
        $query = $this->db->get('akun');
        return $query->result();
    }

    public function Count($Email, $Password) {
        $data = array('Email' => $Email, 'Password' => $Password);
        $this->db->where($data);
        $this->db->from('akun');
        $count = $this->db->count_all_results();
        return $count;
    }

    public function HowManyUsers() {
        $query = $this->db->query('SELECT * FROM akun');
        return $query->num_rows();
    }

    public function getData($NIP) {
        $this->db->where('NIP', $NIP);
        $result = $this->db->get('akun');
        return $result->row_array();
    }

    public function getPassword($Password) {
        $this->db->where('Password', $Password);
        $query = $this->db->get('akun');
        return $query->result();
    }

    public function CreateAkun($NIP, $Nama_Dpn, $Nama_Blkg, $Password, $Divisi, $ID, $Email) {
        $data = array('NIP' => $NIP, 'Nama_Dpn' => $Nama_Dpn, 'Password' => $Password, 'Divisi' => $Divisi, 'ID' => $ID,
            'Nama_Blkg' => $Nama_Blkg, 'Email' => $Email);
        return ($this->db->insert('akun', $data));
    }

    public function DeleteAkun($NIP) {
        $this->db->where('NIP', $NIP);
        return($this->db->delete('akun'));
    }

    public function Update($NIP, $Nama_Dpn, $Nama_Blkg, $Password, $Divisi, $Email) {
        $data = array('NIP' => $NIP, 'Nama_Dpn' => $Nama_Dpn, 'Password' => $Password, 'Divisi' => $Divisi,
            'Nama_Blkg' => $Nama_Blkg, 'Email' => $Email);
        $this->db->where('NIP', $NIP);
        return($this->db->update('akun', $data));
    }

}
