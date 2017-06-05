<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu_identitas_model extends CI_Model
{
    var $table = 'kartu_identitas';
    var $column_order = array(null, 'ki_ket'); //set column field database for datatable orderable
    var $column_search = array('ki_ket'); //set column field database for datatable searchable
    var $order = array('ki_id' => 'desc'); // default order

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

    function save_ki($data)
    {
        $this->db->insert('kartu_identitas', $data);
    }

    function update_ki($id, $data)
    {
        $this->db->where('ki_id', $id);
        $this->db->update('kartu_identitas', $data);
    }

    function get_detail_ki($where)
    {
        if (is_array($where))
        {
            foreach ($where as $key_where => $val_where)
            {
                $this->db->where($key_where, $val_where);
            }
        }
        else
        {
            $this->db->where($where);
        }

        $qry = $this->db->get('kartu_identitas');
        return $qry->num_rows() > 0 ? $qry->row() : FALSE;
    }

    function delete_ki($id)
    {
        // delete di table kartu_identitas
        $this->db->where('ki_id', $id);
        $this->db->delete('kartu_identitas');
    }

    function count_data($table, $where)
    {
        foreach ($where as $key => $value)
        {
            $this->db->where($key, $value);
        }
        $this->db->from($table);
        return $this->db->count_all_results();
    }
}
