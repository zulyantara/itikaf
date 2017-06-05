<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    var $table = 'peserta';

    public function __construct()
    {
        parent::__construct();
    }

    function update_peserta($id, $data)
    {
        $this->db->where('peserta_id', $id);
        $this->db->update('peserta', $data);
    }

    function get_detail_peserta($where)
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

        $qry = $this->db->get('peserta');
        return $qry->num_rows() > 0 ? $qry->row() : FALSE;
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
    
    function get_kota()
    {
        $qry = $this->db->get('kota');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }

    function get_kartu_identitas()
    {
        $qry = $this->db->get('kartu_identitas');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }
}
