<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mdl_newlogin extends CI_Model {


    public function get_user_data($nik){
        return $this->db->get_where('masyarakat', ['nik' => $nik]);
    }
    public function pengaduan($add)
    {
        $this->db->insert('pengaduan',$add);
    }
    public function data_pengaduan()
    {
      return  $this->db->get('pengaduan');
    }
}