<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_total_peserta()
    {
        $this->db->select('COUNT(*) AS total, itikaf_tahun');
        $this->db->group_by('itikaf_tahun');
        $this->db->join('peserta', 'peserta_id = itikaf_peserta', 'left');
        $qry = $this->db->get('itikaf');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }

    function get_row_total_peserta()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->join('peserta', 'peserta_id = itikaf_peserta', 'left');
        $qry = $this->db->get('itikaf');
        return $qry->num_rows() > 0 ? $qry->row() : FALSE;
    }

    function get_row_total_peserta_aktif()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->where('itikaf_status', 1);
        $this->db->join('peserta', 'peserta_id = itikaf_peserta', 'left');
        $qry = $this->db->get('itikaf');
        return $qry->num_rows() > 0 ? $qry->row() : FALSE;
    }

    function get_row_total_peserta_l()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->where('peserta_sex', "l");
        $this->db->where('itikaf_status', 1);
        $this->db->group_by('itikaf_tahun');
        $this->db->join('peserta', 'peserta_id = itikaf_peserta', 'left');
        $qry = $this->db->get('itikaf');
        return $qry->num_rows() > 0 ? $qry->row() : FALSE;
    }

    function get_row_total_peserta_p()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->where('peserta_sex', "p");
        $this->db->where('itikaf_status', 1);
        $this->db->join('peserta', 'peserta_id = itikaf_peserta', 'left');
        $qry = $this->db->get('itikaf');
        return $qry->num_rows() > 0 ? $qry->row() : FALSE;
    }

    function get_total_peserta_aktif()
    {
        $this->db->select('COUNT(*) AS total, itikaf_tahun');
        $this->db->where('itikaf_status', 1);
        $this->db->group_by('itikaf_tahun');
        $this->db->join('peserta', 'peserta_id = itikaf_peserta', 'left');
        $qry = $this->db->get('itikaf');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }

    function get_total_peserta_aktif_l()
    {
        $this->db->select('COUNT(*) AS total, itikaf_tahun');
        $this->db->where('itikaf_status', 1);
        $this->db->where('peserta_sex', 'l');
        $this->db->group_by('itikaf_tahun');
        $this->db->join('peserta', 'peserta_id = itikaf_peserta', 'left');
        $qry = $this->db->get('itikaf');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }

    function get_total_peserta_aktif_p()
    {
        $this->db->select('COUNT(*) AS total, itikaf_tahun');
        $this->db->where('itikaf_status', 1);
        $this->db->where('peserta_sex', 'p');
        $this->db->group_by('itikaf_tahun');
        $this->db->join('peserta', 'peserta_id = itikaf_peserta', 'left');
        $qry = $this->db->get('itikaf');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }
}
