<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    var $table = 'users';
    var $column_order = array(null, 'user_username', 'peserta_nama', 'peserta_email', 'ur_ket'); //set column field database for datatable orderable
    var $column_search = array('user_username', 'peserta_nama', 'peserta_email', 'ur_ket'); //set column field database for datatable searchable
    var $order = array('user_id' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query($post)
    {
        $this->db->select("user_id, user_username, peserta_nama, peserta_email, ur_ket, CASE WHEN user_active=1 THEN 'Aktif' ELSE 'Tidak Aktif' END AS user_active");
        $this->db->join('users_role', 'ur_id = user_ur', 'left');
        $this->db->join('peserta', 'peserta_id = user_peserta', 'left');

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

    function save_user($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update_user($id, $data)
    {
        $this->db->where('user_id', $id);
        $this->db->update($this->table, $data);
    }

    function get_detail_user($where)
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

        $qry = $this->db->get($this->table);
        return $qry->num_rows() > 0 ? $qry->row() : FALSE;
    }

    function get_ur()
    {
        $qry = $this->db->get('users_role');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }

    function delete_user($id)
    {
        // delete di table user
        $this->db->where('user_id', $id);
        $this->db->delete($this->table);
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
