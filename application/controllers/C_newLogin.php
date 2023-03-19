<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_NewLogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	// Login User
	public function index()
	{
		$check = $this->db->get('petugas')->row_array();
		if($check==null){
			redirect('C_newLogin/setup');
		}
		
		$this->form_validation->set_rules('nik', 'Nik', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		

		if ($this->form_validation->run() == false) {

			// Gagal Validasi Login
			$data['title'] = 'Login Account';
			$this->load->view('v_newLogin', $data);
		} else {

			// Lolos Validasi Login
			$this->_login();
		}
	}

	private function _login()
	{

		$nik = $this->input->post('nik');
		$password = $this->input->post('password');

		$this->load->model('mdl_newlogin');

		$user = $this->mdl_newlogin->get_user_data($nik)->row_array();

		// jika user ada 
		if ($user) {

			// cek password
			if (password_verify($password, $user['password'])) { 

				$captcha_response = trim($this->input->post('g-recaptcha-response'));

				if ($captcha_response != '') {
					$keySecret = '6Lc208cjAAAAAIXgG0s33HxCrwgnZ9Dhj9kprEvK';

					$check = array(
						'secret'		=>	$keySecret,
						'response'		=>	$this->input->post('g-recaptcha-response')
					);
				}

				

					$data = [
						'nik' => $user['nik'],
						'password' => $user['password'],
						'id'=>$user['id'],
						'email'=>$user['email'],
						'username'=>$user['username']
					];

					// kondisi
					$this->session->set_userdata($data);
					if ($this->form_validation->run() == true ) {
						
						redirect('c_Dashboard');

					} else {
						
						redirect('c_NewLogin/index');
					}

				

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Wrong password !
				  </div>');
				redirect('c_NewLogin/index');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Nik is not registered !
			  </div>');
			redirect('c_NewLogin/index');
		}
	}


	public function register()
	{
		
		$this->form_validation->set_rules('nik', 'Nik', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('telp', 'Telpon', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
			'matches' => 'password dont match !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {

			$data['title'] = 'Register Account';
			$this->load->view('v_newRegister', $data);
		} else {

			$data = array(
				'id_masyarakat' => htmlspecialchars($this->input->post('id_masyarakat', true)),
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'telpon' => htmlspecialchars($this->input->post('telp', true)),
				'password' => password_hash(($this->input->post('password1')), PASSWORD_DEFAULT),
			);

			$this->db->insert('masyarakat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation your account has been created !
		  	</div>');
			redirect('c_NewLogin');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('access_token');
			  $this->session->unset_userdata('user_data');
			  $this->session->sess_destroy();
		$this->session->unset_userdata('nik');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You have been logout !
		  	</div>');
			  
		redirect('c_NewLogin');
	}

	public function setup()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'matches' => 'password dont match !'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('telp', 'telp', 'required|trim');


        if ($this->form_validation->run() == false) {

            $data['title'] = 'Register Account';
            $this->load->view('admin/V_SetupAdmin', $data);
        } else {

            $data = array(
                'nama_petugas' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telp' => htmlspecialchars($this->input->post('telp', true)),
                'level'=>'admin',
				'active'=>'aktif'
            );

            $this->db->insert('petugas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation your account has been created !
		  	</div>');
            redirect('C_newLogin/login_admin');
        }
    }


    public function login_admin(){
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == false) {
                // Gagal validasi
                $this->load->view('admin/V_loginAdmin');
            } else {

                // Lolos validasi
                $this->_login_admin();
            }
    }

    
    private function _login_admin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $masyarakat = $this->db->get_where('petugas', ['username' => $username])->row_array();

        // jika usernya ada
        if ($masyarakat) {

            // cek password
            if (password_verify($password, $masyarakat['password'])) {

 
                    $data = [
                        'username' => $masyarakat['username'],
                        'password' => $masyarakat['password'],
                    ];

                    // kondisi
                    $this->session->set_userdata($data);
                    if ($this->form_validation->run() == true) {

                        // redirect('d');
                        redirect('c_admin');

                    } else {

                        redirect('C_newLogin');
                    }
        
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Wrong password !
		  	</div>');
                redirect('C_newLogin/login_admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			NIK is not registered !
		  	</div>');
			redirect('C_newLogin/login_admin');
        }
    }
}