<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
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

    function get_konsumsi()
    {
        $qry = $this->db->get('konsumsi');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }

    function get_sumber_informasi()
    {
        $qry = $this->db->get('sumber_informasi');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }

    function get_row_peserta($where)
    {
        foreach ($where as $key => $val)
        {
            $this->db->where($key, $val);
        }
        $qry = $this->db->get('peserta');
        return $qry->num_rows() > 0 ? $qry->row() : FALSE;
    }

    function get_row_itikaf($where)
    {
        foreach ($where as $key => $val)
        {
            $this->db->where($key, $val);
        }
        $qry = $this->db->get('itikaf');
        return $qry->num_rows();
    }

    function insert_peserta($data)
    {
        $this->db->insert('peserta', $data);
    }

    function insert_itikaf($data)
    {
        $this->db->insert('itikaf', $data);
    }

    function insert_user($data)
    {
        $this->db->insert('users', $data);
    }

    function update_peserta($where, $data)
    {
        foreach ($where as $key => $val)
        {
            $this->db->where($key, $val);
        }
        $this->db->update('peserta', $data);
    }

    function delete_peserta($where)
    {
        foreach ($where as $key => $val)
        {
            $this->db->where($key, $val);
        }
        $this->db->delete('peserta');
    }

    function get_logo()
    {
        $qry = $this->db->get("logo");
        return $qry->num_rows() > 0 ? $qry->row() : FALSE;
    }

    function get_tm()
    {
        $qry = $this->db->get('top_menu');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }

    function get_fa()
    {
        $qry = $this->db->get('footer_add');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }

    function get_ur()
    {
        $this->db->select('ur_id');
        $this->db->where('ur_ket', "peserta");
        $qry = $this->db->get('users_role');
        return $qry->row();
    }

    function check_email($email)
    {
        $this->db->where('peserta_email', $email);
        $qry = $this->db->get('peserta');
        return $qry->num_rows();
    }

    function check_username($username)
    {
        $this->db->where('user_username', $username);
        $qry = $this->db->get('users');
        return $qry->num_rows();
    }
}
