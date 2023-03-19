<?php
class mdl_user extends CI_Model{
    public function get_pengaduan($nik){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('subkategori','subkategori.id_subkategori = pengaduan.id_subkategori');
        $this->db->join('kategori','kategori.id_kategori=subkategori.id_kategori');
        $this->db->where('pengaduan.nik',$nik);
       return  $this->db->get();
    }
    public function get_detail_pengaduan($id_pengaduan){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('subkategori','subkategori.id_subkategori = pengaduan.id_subkategori');
        $this->db->join('kategori','kategori.id_kategori=subkategori.id_kategori');
        $this->db->where('pengaduan.id_pengaduan',$id_pengaduan);
       return  $this->db->get();
    }
    public function get_pengaduan_belum($nik){
     return   $this->db->get_where('pengaduan',['status'=>"0",'nik'=>$nik]);
    }
    public function get_pengaduan_proses($nik){
        return   $this->db->get_where('pengaduan',['status'=>'proses','nik'=>$nik]);
       }
       public function get_pengaduan_selesai($nik){
        return   $this->db->get_where('pengaduan',['status'=>'selesai','nik'=>$nik]);
       }
}