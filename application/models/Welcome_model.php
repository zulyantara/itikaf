<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_slider()
    {
        $qry = $this->db->get('slider');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }

    function count_slider()
    {
        $qry = $this->db->get('slider');
        return $qry->num_rows();
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

    function get_count_peserta_inactive()
    {
        $this->db->where('itikaf_status', 0);
        $this->db->join('itikaf', 'peserta_id = itikaf_peserta', 'left');
        return $this->db->count_all_results("peserta");
    }
}
