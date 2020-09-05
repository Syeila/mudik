<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mudik extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model('M_admin');
	}

	public function index()
	{
		$this->load->view('/layout/header');
	}

	public function get_transportasi()
	{
		$this->load->view('/layout/header');
		$this->load->view('/content/v_transportasi');
	}

    public function get_penumpang()
    {
        $data['data'] = $this->M_admin->get_booking()->result();
        $this->session->set_userdata($data);
        $this->load->view('/layout/header');
        $this->load->view('/content/v_verifikasi',$data);
    }

     public function get_dashboard()
    {
        $this->load->view('/layout/header');
        $this->load->view('/content/v_dashboard');
    }

	public function datatables()
	{
		$transportasi = $this->M_admin->get_datatables();
        // echo "<pre>";
        // print_r($transportasi);die();
        $data = array();
        $no = $_POST['start']+1;
        
        foreach ($transportasi as $field) {
                
                $row = array();

                $row[] = $no++;
                $row[] = $field->transportasi;
                $row[] = $field->rute;
                $row[] = $field->jadwal;
                $row[] = $field->slot;
             
                //add html for action
                $row[] = '<a class="btn btn-link btn-warning btn-sm" href="javascript:void(0)" 
                                title="Edit" onclick="ajax_edit('."'".$field->id."'".')">
                                <i class="fa fa-edit"></i>
                         </a>
                         <a class="btn btn-link btn-danger btn-sm" href="javascript:void(0)" 
                                title="Hapus" onclick="ajax_delete('."'".$field->id."'".')">
                                <i class="fa fa-trash"></i>
                         </a>';
        
                $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_admin->count_all(),
                        "recordsFiltered" => $this->M_admin->count_filtered(),
                        "data" => $data,
        );
        //output to json format
        echo json_encode($output);
	}

	
	private function validate()
	{
		$data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('transportasi') == '')
        {
            $data['inputerror'][] = 'transportasi';
            $data['error_string'][] = 'Nama Transportasi is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('jadwal') == '')
        {
            $data['inputerror'][] = 'jadwal';
            $data['error_string'][] = 'Jadwal is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('rute') == '')
        {
            $data['inputerror'][] = 'rute';
            $data['error_string'][] = 'Rute is required';
            $data['status'] = FALSE;
        }


        if($this->input->post('slot') == '')
        {
            $data['inputerror'][] = 'slot';
            $data['error_string'][] = 'Slot is required';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
	}

	public function store()
    {
        
        $this->validate();
          
            $data = array(
                // 'transportasi' => sha1(md5($this->input->post('transportasi'))),
                'transportasi' => $this->input->post('transportasi'),
                'jadwal' => $this->input->post('jadwal'),
                'rute' => $this->input->post('rute'),  
                'slot' => $this->input->post('slot'),     
            );

            // echo "<pre>";
            // print_r($data);die();
         
            $insert = $this->M_admin->save($data);
            
            echo json_encode(array('status' => TRUE));

    }

    public function edit($id)
    {
    	$data = $this->M_admin->edit_by_id($id);
        echo json_encode($data);
    }

    public function update()
    {
		$this->validate();
          
            $data = array(
                'transportasi' => $this->input->post('transportasi'),
                'jadwal' => $this->input->post('jadwal'),
                'rute' => $this->input->post('rute'),
                'slot' => $this->input->post('slot'),
            );

        $id = array('id' => $this->input->post('id'));
        $this->M_admin->update($id, $data);
    	echo json_encode(array("status" => TRUE));    	
    }

    public function destroy($id)
    {
        $this->M_admin->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function verfikasitiket()
    {
        $id = $this->input->post("id");
        $data = array(

         'status'  => $this->input->post("status"),
        );
            
        
        $this->M_admin->status($data, $id);

        redirect('mudik/get_penumpang');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('/user/layout/header');
    }

}
