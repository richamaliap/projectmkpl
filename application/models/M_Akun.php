<?php

/**
 * Description of M_Akun
 *
 * @author acer
 */
class M_Akun extends CI_Model {

    public function Count($NIP, $Password) {
        $data = array('NIP' => $NIP, 'Password' => $Password);
        $this->db->where($data);
        $this->db->from('akun');
        $count = $this->db->count_all_results();
        return $count;
    }

    public function CreateAkun($NIP, $Nama_Dpn, $Nama_Blkg, $Password, $Divisi, $ID, $Email) {
        $data = array('NIP' => $NIP, 'Nama_Dpn' => $Nama_Dpn, 'Password' => $Password, 'Divisi' => $Divisi, 'ID' => $ID,
            'Nama_Blkg' => $Nama_Blkg, 'Email' => $Email);
        return ($this->db->insert('akun', $data));
    }

}
