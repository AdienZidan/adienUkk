<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_admin extends CI_Controller
{

	public function index(){
		$data['user']=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row_array();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/topbar',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer',$data);
	}
	public function kategori()
	{
		$data['user']=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row_array();
		$data['kategori']=$this->db->get('kategori')->result_array();
		$data['join_subkategori']=$this->mdl_admin->join_subkategori()->result_array();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/topbar',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/v_kategori',$data);
		$this->load->view('admin/footer',$data);
	}
// kategori
	public function edit_kategori($id){
		$update_data=[
			'kategori'=>$this->input->post('nama_kategori'),
		];
		$this->mdl_admin->edit_kategori($id,$update_data);
		redirect('c_admin/kategori');
	}
	public function hapus_kategori($id){
		$this->mdl_admin->hapus_kategori($id);
		redirect('c_admin/kategori');
	}
	// subkategori
	public function tambah_kategori(){
		$insert_data=[
			'kategori'=>$this->input->post('nama_kategori'),
		];
		$this->db->insert('kategori',$insert_data);
		redirect('c_admin/kategori');	
	}
	public function tambah_subkategori(){
		$insert_data=[
			'id_kategori'=>$this->input->post('kategori'),
			'subkategori'=>$this->input->post('nama_subkategori'),
		];
		$this->db->insert('subkategori',$insert_data);
		redirect('c_admin/kategori');
	}
	public function masyarakat(Type $var = null)
	{
		$data['title'] = 'Kategori';
		$this->load->view('admin/v_masyarakat', $data);
	}

	// Admin
	public function edit_admin($id)
	{
		$name = $this->input->post('name');
		$role_id = $this->input->post('role_id');

		$update = array(
			'full_name' => $name,
			'role_id' => $role_id,
		);
		$this->db->where('id', $id);
		$this->db->update('user', $update);


		redirect('C_admin');
	}


	public function delete_admin($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
		redirect('C_admin');
	}
	// subkategori
	public function edit_subkategori($id){
		$update_data=[
			'subkategori'=>$this->input->post('nama_subkategori'),
			'id_kategori'=>$this->input->post('kategori'),
		];
		$this->mdl_admin->edit_subkategori($id,$update_data);
		redirect('c_admin/kategori');
		
	}
	public function hapus_subkategori($id){
		$this->mdl_admin->hapus_subkategori($id);
		redirect('c_admin/kategori');
	}
	public function data_admin(){
		$data['user']=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row_array();
		$data['admin']=$this->mdl_admin->get_admin()->result_array();
		$data['petugas']=$this->mdl_admin->get_petugas()->result_array();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/topbar',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/v_data_admin',$data);
		$this->load->view('admin/footer',$data);
	}
	public function tambah_admin(){
		$this->load->library('form_validation');
		$this->form_validation->Set_rules('nama_petugas','Nama_petugas','required');
		$this->form_validation->Set_rules('username','Username','required');
		$this->form_validation->Set_rules('password','Password','required');
		$this->form_validation->Set_rules('telp','telp','required');
		$this->form_validation->Set_rules('level','Level','required');

		if($this->form_validation->run()==false){
			redirect('c_admin/data_admin');
		}else{
			$data_admin=[
				'nama_petugas'=>$this->input->post('nama_petugas'),
				'username'=>$this->input->post('username'),
				'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'telp'=>$this->input->post('telp'),
				'level'=>$this->input->post('level'),
				'active'=>'aktif'
			];
			$this->mdl_admin->tambah_admin($data_admin);
			redirect('c_admin/data_admin');
		}

	}
	public function ban_admin($id_petugas){
		$this->mdl_admin->ban_admin($id_petugas);
		redirect('c_admin/data_admin');
	}
	public function aktif_admin($id_petugas){
		$this->mdl_admin->aktif_admin($id_petugas);
		redirect('c_admin/data_admin');
	}
	public function data_masyarakat(){
		$data['user']=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row_array();
		$data['masyarakat']=$this->mdl_admin->get_masyarakat()->result_array();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/topbar',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/v_data_masyarakat',$data);
		$this->load->view('admin/footer',$data);
	}
	public function ban_masyarakat($id_masyarakat){
		$this->mdl_admin->ban_masyarakat($id_masyarakat);
		redirect('c_admin/data_masyarakat');
	}
	public function aktif_masyarakat($id_masyarakat){
		$this->mdl_admin->aktif_masyarakat($id_masyarakat);
		redirect('c_admin/data_masyarakat');

	}
	public function data_pengaduan(){
		$data['user']=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row_array();
		$status = $this->input->get('s');
		if($status=='selesai'){
			$data['pengaduan']=$this->mdl_admin->get_pengaduan_selesai()->result_array();
		}elseif($status=='proses'){
			$data['pengaduan']=$this->mdl_admin->get_pengaduan_proses()->result_array();
		}elseif($status == 'belum'){
			$data['pengaduan']=$this->mdl_admin->get_pengaduan_belum()->result_array();
		}else{
			$data['pengaduan']=$this->mdl_admin->get_pengaduan()->result_array();
		}


		$this->load->view('admin/header',$data);
		$this->load->view('admin/topbar',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/v_data_pengaduan',$data);
		$this->load->view('admin/footer',$data);
	}
	public function detail_pengaduan($id){
		$data['user']=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row_array();
		$data['data_pengaduan']=$this->mdl_admin->detail_pengaduan($id)->row_array();
		$data['data_tanggapan']=$this->mdl_admin->detail_tanggapan($id)->row_array();
	
		$this->load->view('admin/header',$data);
		$this->load->view('admin/topbar',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/v_detail_pengaduan',$data);
		$this->load->view('admin/footer',$data);
	}
	public function form_tanggapan($id){
		$data['user']=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row_array();
		$data['data_pengaduan']=$this->mdl_admin->detail_pengaduan($id)->row_array();
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/topbar',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/v_form_tanggapan',$data);
		$this->load->view('admin/footer',$data);
	}
	public function tambah_tanggapan($id){
		$user=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row_array();
		$tanggapan = $this->input->post('tanggapan');
		
		$insert=[
			'id_pengaduan'=>$id,
			'tgl_tanggapan'=>date('Y-m=d'),
			'tanggapan'=>$tanggapan,
			'id_petugas'=>$user['id_petugas'],
		];
		$this->mdl_admin->tambah_tanggapan($id,$insert);
		redirect('c_admin/detail_pengaduan/'.$id);
	}
	public function form_selesai($id){
		$data['user']=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row_array();
		$data['data_pengaduan']=$this->mdl_admin->detail_pengaduan($id)->row_array();
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/topbar',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/v_form_selesai',$data);
		$this->load->view('admin/footer',$data);
	}
	public function pengaduan_selesai($id){
		$update=[
			'status'=>'selesai',
		];
		$this->mdl_admin->pengaduan_selesai($id,$update);
		redirect('c_admin/data_pengaduan?s=selesai');
	}

	public function pengaduan_pdf(){
		$status=$this->input->get('s');
		if($status=='semua'){

		 $data['pengaduan']=$this->mdl_admin->get_pengaduan()->result_array();
   
		 }elseif($status=='proses'){
			 $data['pengaduan']=$this->mdl_admin->get_pengaduan_proses()->result_array();
		 
		 }elseif($status=='selesai'){
		 $data['pengaduan']=$this->mdl_admin->get_pengaduan_selesai()->result_array();
		 }
		 else{
		 $data['pengaduan']=$this->mdl_admin->get_pengaduan_belum()->result_array();
		 	
		 }


 

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "pengaduan.pdf";
    $this->pdf->load_view('pengaduan_pdf', $data);
	}


}
