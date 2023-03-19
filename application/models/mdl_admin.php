<?php 
class mdl_admin extends CI_Model{
    public function join_subkategori(){
        $this->db->select('*')->from('subkategori')->join('kategori','kategori.id_kategori=subkategori.id_kategori');
        return $this->db->get();
    }
    public function edit_subkategori($id,$edit){
        $this->db->where('id_subkategori',$id);
        $this->db->update('subkategori',$edit);
    }
    public function hapus_subkategori($id){
        $this->db->where('id_subkategori',$id);
        $this->db->delete('subkategori');
    }
    public function edit_kategori($id,$edit){
        $this->db->where('id_kategori',$id);
        $this->db->update('kategori',$edit);
    }
    function hapus_kategori($id){
        $this->db->where('id_kategori',$id);
        $this->db->delete('kategori');
    }
    public function tambah_admin($data_admin){
        $this->db->insert('petugas',$data_admin);
    }
    public function get_admin(){
        return $this->db->get_where('petugas',['level'=>'admin']);
    }
    public function get_petugas(){
        return $this->db->get_where('petugas',['level'=>'petugas']);
    }
    public function ban_admin($id_petugas){
        $status = [
            'active'=>'banned',

        ];
        $this->db->where('id_petugas',$id_petugas);
        $this->db->update('petugas',$status);
    }
    public function aktif_admin($id_petugas){
        $status = [
            'active'=>'aktif',

        ];
        $this->db->where('id_petugas',$id_petugas);
        $this->db->update('petugas',$status);
    }
    public function get_masyarakat(){
        return $this->db->get('masyarakat');
    }
    public function ban_masyarakat($id_masyarakat){
        $status = [
            'active'=>'banned',

        ];
        $this->db->where('id_masyarakat',$id_masyarakat);
        $this->db->update('masyarakat',$status);
    }
    public function aktif_masyarakat($id_masyarakat){
        $status = [
            'active'=>'aktif',

        ];
        $this->db->where('id_masyarakat',$id_masyarakat);
        $this->db->update('masyarakat',$status);
    }
    public function get_pengaduan(){
        $this->db->select('*')
        ->from('pengaduan')
        ->join('masyarakat','masyarakat.nik=pengaduan.nik')
        ->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori')
        ->join('kategori','kategori.id_kategori=subkategori.id_kategori');
        return $this->db->get();
    }
    public function get_pengaduan_proses(){
        $this->db->select('*')
        ->from('pengaduan')
        ->join('masyarakat','masyarakat.nik=pengaduan.nik')
        ->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori')
        ->join('kategori','kategori.id_kategori=subkategori.id_kategori')
        ->where('pengaduan.status','proses');
        return $this->db->get();
    }
    public function get_pengaduan_selesai(){
        $this->db->select('*')
        ->from('pengaduan')
        ->join('masyarakat','masyarakat.nik=pengaduan.nik')
        ->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori')
        ->join('kategori','kategori.id_kategori=subkategori.id_kategori')
        ->where('pengaduan.status','selesai');
        return $this->db->get();
    }
    public function get_pengaduan_belum(){
        $this->db->select('*')
        ->from('pengaduan')
        ->join('masyarakat','masyarakat.nik=pengaduan.nik')
        ->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori')
        ->join('kategori','kategori.id_kategori=subkategori.id_kategori')
        ->where('pengaduan.status',"0");
        return $this->db->get();
    }
    public function detail_pengaduan($id){
        $this->db->select('*')
        ->from('pengaduan')
        ->join('masyarakat','masyarakat.nik=pengaduan.nik')
        ->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori')
        ->join('kategori','kategori.id_kategori=subkategori.id_kategori')
        ->where('pengaduan.id_pengaduan',$id);
        return $this->db->get();
    }
    public function detail_tanggapan($id){
        $this->db->select('*')
        ->from('tanggapan')
        ->join('petugas','petugas.id_petugas=tanggapan.id_petugas')
        ->where('tanggapan.id_pengaduan',$id);
        return $this->db->get();
    }
    public function tambah_tanggapan($id,$insert){
        $this->db->insert('tanggapan',$insert);
        $update_status=[
            'status'=>'proses'
        ];
        $this->db->where('id_pengaduan',$id)->update('pengaduan',$update_status);
        
    }
    public function pengaduan_selesai($id,$update){
        $this->db->where('id_pengaduan',$id)->update('pengaduan',$update);
        
    }

}