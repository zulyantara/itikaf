<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanels extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->load->model('cpanel_model', 'cm');
        $this->load->model('master_model');
    }

    function index()
    {
        $chart_data_total = "";
        $res_pi = $this->cm->get_total_peserta();
        if ($res_pi !== FALSE)
        {
            foreach ($res_pi as $row)
            {
                $chart_data_total .= "{year:'".$row->itikaf_tahun."', total:".$row->total."}, ";
            }
            $chart_data_total = substr($chart_data_total, 0, -2);
        }
        $data["chart_data_total"] = $chart_data_total;

        $chart_data_total_aktif = "";
        $res_pi_aktif = $this->cm->get_total_peserta_aktif();
        if ($res_pi_aktif !== FALSE)
        {
            foreach ($res_pi_aktif as $row_aktif)
            {
                $chart_data_total_aktif .= "{year:'".$row_aktif->itikaf_tahun."', total:".$row_aktif->total."}, ";
            }
            $chart_data_total_aktif = substr($chart_data_total_aktif, 0, -2);
        }
        $data["chart_data_total_aktif"] = $chart_data_total_aktif;

        $chart_data_l = "";
        $res_pi_aktif_l = $this->cm->get_total_peserta_aktif_l();
        if ($res_pi_aktif_l !== FALSE)
        {
            foreach ($res_pi_aktif_l as $row_l)
            {
                $chart_data_l .= "{year:'".$row_l->itikaf_tahun."', total:".$row_l->total."}, ";
            }
            $chart_data_l = substr($chart_data_l, 0, -2);
        }
        $data["chart_data_l"] = $chart_data_l;

        $chart_data_p = "";
        $res_pi_aktif_p = $this->cm->get_total_peserta_aktif_p();
        if ($res_pi_aktif_p !== FALSE)
        {
            foreach ($res_pi_aktif_p as $row_p)
            {
                $chart_data_p .= "{year:'".$row_p->itikaf_tahun."', total:".$row_p->total."}, ";
            }
            $chart_data_p = substr($chart_data_p, 0, -2);
        }
        $data["chart_data_p"] = $chart_data_p;

        $total_peserta = $this->cm->get_row_total_peserta();
        $data["total_peserta"] = $total_peserta !== FALSE ? $total_peserta->total : 0;

        $total_peserta_aktif = $this->cm->get_row_total_peserta_aktif();
        $data["total_peserta_aktif"] = $total_peserta_aktif !== FALSE ? $total_peserta_aktif->total : 0;

        $total_peserta_l = $this->cm->get_row_total_peserta_l();
        $data["total_peserta_l"] = $total_peserta_l !== FALSE ? $total_peserta_l->total : 0;

        $total_peserta_p = $this->cm->get_row_total_peserta_p();
        $data["total_peserta_p"] = $total_peserta_p !== FALSE ? $total_peserta_p->total : 0;

        $data['ch'] = 'CPanel';
        $data["cho"] = "Dashboard I'tikaf";
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    private function _check_auth()
    {
        if ($this->session->userdata('is_logged_in') !== TRUE)
        {
            redirect('auth');
        }
    }
}
