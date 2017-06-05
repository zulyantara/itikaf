<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_aktivasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('aktivasi_model','mm');
    }

    function index()
    {
        $data['ch'] = 'Modul Aktivasi';
        // $data["cho"] = "Dashboard I'tikaf";
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_aktivasi/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $aktivasi) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = ucwords($aktivasi->peserta_nama);
            $row[] = $aktivasi->jns_kelamin;
            $row[] = ucwords($aktivasi->kota_ket);
            $row[] = $aktivasi->peserta_hp;
            $row[] = $aktivasi->peserta_foto == "" ? "<div class=\"label label-warning\">Blm Upload Foto</div>" : "<div class=\"label label-success\">Sudah Upload Foto</div>";
            $row[] = $aktivasi->peserta_ktp == "" ? "<div class=\"label label-warning\">Blm Upload KTP</div>" : "<div class=\"label label-success\">Sudah Upload KTP</div>";
            $row[] = "<a href=\"".site_url("cpanel_aktivasi/proses/".$aktivasi->peserta_id)."\" class=\"btn btn-primary\">Aktivasi</a>";

            $data[] = $row;
        }

        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->mm->count_all(),
                        "recordsFiltered" => $this->mm->count_filtered($this->input->post()),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function proses($id)
    {
        $this->_cek_update();

        // update table itikaf, set itikaf_status=1
        $data['itikaf_status'] = 1;
        $where['itikaf_peserta'] = $id;
        $where['itikaf_tahun'] = date('Y');
        $this->mm->update_data($data,$where);
        redirect('cpanel_aktivasi');
    }

    private function _check_auth()
    {
        if ($this->session->userdata('is_logged_in') !== TRUE)
        {
            redirect('auth');
        }
    }

    private function _cek_akses()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_aktivasi";

        $result = $this->am->get_ha("ha_view", $arr_where);
        // var_dump($result);

        if ($result->ha_view === "0" OR $result === FALSE)
        {
            redirect("cpanels");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_aktivasi";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_aktivasi");
        }
    }
}
