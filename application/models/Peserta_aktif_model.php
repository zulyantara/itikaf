<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_aktif_model extends CI_Model
{
    var $table = 'peserta';
    var $column_order = array(null, 'peserta_nama','peserta_hp','itikaf_mulai','konsumsi_ket'); //set column field database for datatable orderable
    var $column_search = array( 'peserta_nama','peserta_hp','itikaf_mulai','konsumsi_ket'); //set column field database for datatable searchable
    var $order = array('peserta_id' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query($post)
    {
        $this->db->select("peserta_id,peserta_nama,peserta_hp,itikaf_mulai,konsumsi_ket,peserta_foto,peserta_ktp");
        $this->db->join('itikaf', 'itikaf_peserta = peserta_id', 'left');
        $this->db->join('konsumsi', 'konsumsi_id = itikaf_konsumsi', 'left');
        $this->db->where('itikaf_tahun', date('Y'));
        $this->db->where('itikaf_status', 1);
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

    function save_peserta($data)
    {
        $this->db->insert('peserta', $data);
    }

    function update_peserta($id, $data)
    {
        $this->db->where('peserta_id', $id);
        $this->db->update('peserta', $data);
    }

    function get_detail_peserta($where)
    {
        $this->db->join('kota', 'kota_id = peserta_kota', 'left');
        $this->db->join('kartu_identitas', 'ki_id = peserta_kartu_identitas', 'left');

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

    function delete_peserta($id)
    {
        // delete di table peserta
        $this->db->where('peserta_id', $id);
        $this->db->delete('peserta');
    }

    function delete_itikaf($id)
    {
        $this->db->where('itikaf_peserta', $id);
        $this->db->delete('itikaf');
    }

    function delete_user($id)
    {
        $this->db->where('user_peserta', $id);
        $this->db->delete('users');
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

    function get_peserta()
    {
        $this->db->where('itikaf_tahun', date("Y"));
        $this->db->where('itikaf_status', 1);
        $this->db->join('itikaf', 'peserta_id = itikaf_peserta', 'left');
        $this->db->join('kota', 'kota_id = peserta_kota', 'left');
        $this->db->join('konsumsi', 'konsumsi_id = itikaf_konsumsi', 'left');
        $this->db->join('sumber_informasi', 'si_id = itikaf_sumber_informasi', 'left');
        $qry = $this->db->get('peserta');
        return $qry->result();
    }
}
