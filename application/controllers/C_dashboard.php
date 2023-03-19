<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_Dashboard extends CI_Controller {

	public function index()
	{

		$this->load->model('mdl_newlogin');

		// manggil nama user yang login menggunakan model
		// $data['user'] = $this->mdl_newlogin->get_user_data($this->session->userdata('username'))->row_array();

		// manggil nama user yang login menggunakan controler
		$data['user']=$this->db->get_where('masyarakat',['username'=>$this->session->userdata('username')])->row_array(); 
		
		$data['title'] = 'Dashboard';
		$this->load->view('user/header',$data);
		$this->load->view('user/topbar',$data);
		$this->load->view('user/sidebar',$data);
		$this->load->view('user/dashboard',$data);
		$this->load->view('user/footer',$data);
	}

	public function form_pengaduan()
	{$data['user']=$this->db->get_where('masyarakat',['nik'=>$this->session->userdata('nik')])->row_array(); 
		
		$data['kategori']=$this->db->get('kategori')->result_array();
		$data['subkategori']=$this->db->get('subkategori')->result_array();
		$this->load->view('user/header',$data);
		$this->load->view('user/topbar',$data);
		$this->load->view('user/sidebar',$data);
		$this->load->view('user/v_pengaduan',$data);
		$this->load->view('user/footer',$data);

	}
	public function tambahpengaduan()
	{
		$config['upload_path']          = './assets/uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		

		$this->load->library('upload', $config);

		 $this->upload->do_upload('foto');
		 $uploaded_data = $this->upload->data();
		 $foto=$uploaded_data['file_name'];
				

		$user=$this->db->get_where('masyarakat',['nik'=>$this->session->userdata('nik')])->row_array(); 
		$insert_data=[
			'tgl_pengaduan'=>date('Y-m-d'),
			'nik'=>$user['nik'],
			'id_subkategori'=>$this->input->post('subkategori'),
			'isi_laporan'=>$this->input->post('isi_pengaduan'),
			'foto'=>$foto,
			'status'=>'0'
		];
		$this->db->insert('pengaduan',$insert_data);
		redirect('c_dashboard/form_pengaduan');
	}
	public function riwayat_pengaduan(){
		$data['user']=$this->db->get_where('masyarakat',['nik'=>$this->session->userdata('nik')])->row_array(); 
		$user=$this->db->get_where('masyarakat',['nik'=>$this->session->userdata('nik')])->row_array(); 
		$data['riwayat']=$this->mdl_user->get_pengaduan($user['nik'])->result_array();
		$data['jumlah_pengaduan']=$this->mdl_user->get_pengaduan($user['nik'])->num_rows();
		$data['belum']=$this->mdl_user->get_pengaduan_belum($user['nik'])->num_rows();
		$data['proses']=$this->mdl_user->get_pengaduan_proses($user['nik'])->num_rows();
		$data['selesai']=$this->mdl_user->get_pengaduan_selesai($user['nik'])->num_rows();
		$this->load->view('user/header',$data);
		$this->load->view('user/topbar',$data);
		$this->load->view('user/sidebar',$data);
		$this->load->view('user/v_riwayat_pengaduan',$data);
		$this->load->view('user/footer',$data);

	}
	public function detail_pengaduan($id_pengaduan){
		$data['user']=$this->db->get_where('masyarakat',['nik'=>$this->session->userdata('nik')])->row_array(); 
		$data['pengaduan']=$this->mdl_user->get_detail_pengaduan($id_pengaduan)->row_array();
		
		$this->load->view('user/header',$data);
		$this->load->view('user/topbar',$data);
		$this->load->view('user/sidebar',$data);
		$this->load->view('user/v_detail_pengaduan',$data);
		$this->load->view('user/footer',$data);
	}




}