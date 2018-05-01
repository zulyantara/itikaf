<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    // menghitung peserta tidak aktif
    function count_peserta_0()
    {
        $this->db->where('itikaf_status', 0);
        $this->db->join('itikaf', 'itikaf_peserta = peserta_id');
        $qry = $this->db->get('peserta');
        return $qry->num_rows();
    }

    function count_peserta_today()
    {
        $this->db->like('peserta_insert_date', date("Y-m-d"), "after");
        $this->db->join('itikaf', 'itikaf_peserta = peserta_id');
        $qry = $this->db->get('peserta');
        // echo $this->db->like('peserta_insert_date', date("Y-m-d"), "after")->join('itikaf', 'itikaf_peserta = peserta_id')->get_compiled_select("peserta");exit;
        return $qry->num_rows();
    }
}
