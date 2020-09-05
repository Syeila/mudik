<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model('M_user');
        $this->load->library('form_validation');
	}

	public function index()
	{
        //var_dump($this->session->userdata());die();
		$this->load->view('/user/layout/header');
	}

    public function admin()
    {  
        $this->load->view('/layout/header');
    }

     public function mudik()
    {  
        // //var_dump($this->session->userdata('id'));die();
        $data['booking'] = $this->M_user->get_booking()->row();
       // var_dump($data['booking']);die();
        $data['data'] = $this->M_user->get_data_transportasi()->result();
        $this->load->view('user/content/v_mudik',$data);
    }

	public function aksi_login()
	{
            //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = $this->input->post('password', TRUE);

                //checking data via model
                $checking = $this->M_user->login('tb_login', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $row) {

                        $session_data = array(
                            'id'   => $row->id,
                            'username' => $row->username,
                            'password' => $row->password,
                            'level'    => $row->level
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if($this->session->userdata("level") == 'a'){
                           redirect('user/admin');
                        
                        }else{
                             redirect('user/mudik');
                        }

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('login', $data);
                }

            }else{

                $this->load->view('login');
            }

	}

    public function daftar(){
        $level="u";
        $data = array(
         'id'          => $this->input->post("id"),
         'nama'         => $this->input->post("nama"),
         'email'  => $this->input->post("email"),
         'username'       => $this->input->post("username"),
         'password'       => $this->input->post("password"),
         'level'  =>  $level,
        );
      //var_dump($data);die();

        $this->M_user->daftar($data);

        redirect(site_url());
    }

    public function bookingticket()
    {
        $status="Belum Diverifikasi";
        $data = array(
         'id'          => $this->input->post("id"),
         'id_login'          => $this->input->post("id_login"),
         'nama'         => $this->input->post("nama"),
         'transportasi'  => $this->input->post("transportasi"),
         'rute'       => $this->input->post("rute"),
         'jadwal'       => $this->input->post("jadwal"),
         'jumlahpenumpang'       => $this->input->post("jumlahpenumpang"),
         'status'  =>  $status,
        );
  
        $this->M_user->booking($data);

        redirect('user/mudik');
    }

    public function downloadtiket()
    {
       force_download('assets/tiket.jpg',NULL);
    }
}