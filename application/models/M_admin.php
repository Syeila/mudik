<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	var $table = 'data_transportasi';
	var $column_order = array('id', 'transportasi', 'rute', 'jadwal', 'slot', null); //set column field database for datatable orderable
	var $column_search = array('id', 'transportasi', 'rute', 'jadwal', 'slot'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'desc'); // default order 

	private function _get_datatables_query()
	{
		
		$this->db->from('data_transportasi');
		// echo "<pre>";
		// print_r($test);die();
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1){
			$this->db->limit($_POST['length'], $_POST['start']);	
		}
		$query = $this->db->get();
		// echo "<pre>";
		// echo $this->db->last_query();die;
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function save($data)
    {
        $this->db->insert('data_transportasi', $data);
        return $this->db->insert_id();
    }

    public function get_by_id($id)
    {
        $this->db->from('data_transportasi');
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update('data_transportasi', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_transportasi');
    }

    public function edit_by_id($id)
    {
        $this->db->from('data_transportasi');
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function status($data, $id)
	{
		$this->db->where('id',$id);
		$query = $this->db->update("tb_booking", $data);
		// var_dump($id); die();
        if($query)
        {
            return true;
        }else
        {
            return false;
        }
	}


    public function get_booking()
    {
        return $this->db->get('tb_booking');
    }
	
}