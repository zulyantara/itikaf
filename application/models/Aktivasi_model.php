<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivasi_model extends CI_Model
{
    var $table = 'peserta';
    var $column_order = array(null, 'peserta_nama, jns_kelamin, kota_ket, peserta_hp'); //set column field database for datatable orderable
    var $column_search = array('peserta_nama, jns_kelamin, kota_ket, peserta_hp'); //set column field database for datatable searchable
    var $order = array('itikaf_id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query($post)
    {
        $this->db->select("peserta_id, peserta_nama, CASE WHEN peserta_sex='l' THEN 'Ikhwan' ELSE 'Akhwat' END AS jns_kelamin, kota_ket, peserta_hp, peserta_foto, peserta_ktp, user_id");
        $this->db->join('kota', 'kota_id = peserta_kota', 'left');
        $this->db->join('itikaf', 'itikaf_peserta = peserta_id AND itikaf_tahun = '.date('Y'), 'left');
        $this->db->join('users', 'user_peserta = peserta_id', 'left');
        $this->db->where('itikaf_tahun', date('Y'));
        $this->db->where('itikaf_status', 0);
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

    function update_data($data, $where)
    {
        foreach ($where as $key => $val)
        {
            $this->db->where($key, $val);
        }
        $this->db->update("itikaf", $data);
    }
}
