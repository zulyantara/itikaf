<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo_model extends CI_Model
{
    var $table = 'logo';
    var $column_order = array(null, 'logo_ket'); //set column field database for datatable orderable
    var $column_search = array('logo_ket'); //set column field database for datatable searchable
    var $order = array('logo_id' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query($post)
    {
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($post['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $post['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $post['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($post['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$post['order']['0']['column']], $post['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($post)
    {
        $this->_get_datatables_query($post);
        if($post['length'] != -1)
        {
            $this->db->limit($post['length'], $post['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($post)
    {
        $this->_get_datatables_query($post);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function save_logo($data)
    {
        $this->db->insert('logo', $data);
    }

    function delete_logo($id)
    {
        // delete di table logo
        $this->db->where('logo_id', $id);
        $this->db->delete('logo');
    }

    function truncate_logo()
    {
        $this->db->truncate('logo');
    }

    function count_data($where)
    {
        if ($where !== FALSE)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        $this->db->from("logo");
        return $this->db->count_all_results();
    }
}
