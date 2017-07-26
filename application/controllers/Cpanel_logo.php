<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_logo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('logo_model','mm');
        $this->load->model('master_model');
    }

    function index()
    {
        $data['ch'] = 'Modul Logo';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_logo/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $logo) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = "<img src=\"".base_url("logo/".$logo->logo_ket)."\">";
            $row[] = "<button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat\" onClick=\"deleteItem('".$logo->logo_id."','".$logo->logo_ket."');\">Delete</button>";

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

    function tambah_data()
    {
        $this->_cek_insert();

        $data['ch'] = 'Modul Logo';
        $data['cho'] = 'Tambah Data';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_logo/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function do_upload()
    {
        $this->_cek_insert();

        if ($this->input->post('simpan') === "upload")
        {
            $config['file_name']            = "logo";
            $config['upload_path']          = './logo';
            $config['allowed_types']        = 'gif|jpg|jpeg|png|svg';
            $config['max_size']             = 1024;
            // $config['max_width']            = 400;
            $config['max_height']           = 130;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userFileLogo'))
            {
                $data['ch'] = 'Modul Logo';
                $data['cho'] = 'Upload';
                $data['error'] = $this->upload->display_errors();

                $this->load->view('template/header_cpanel', $data);
                $this->load->view('cpanel_logo/form', $data);
                $this->load->view('template/footer_cpanel', $data);
            }
            else
            {
                $upload_data = $this->upload->data();
                $data_logo["logo_ket"] = $upload_data["file_name"];
                $this->mm->save_logo($data_logo);

                redirect('cpanel_logo');
            }
        }
        else
        {
            redirect('cpanel_logo');
        }
    }

    function kosongkan_data()
    {
        $this->_cek_delete();

        $this->load->helper('file');
        delete_files('./logo/');

        $this->mm->truncate_logo();
        redirect('cpanel_logo');
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
        $arr_where["menu_url"] = "cpanel_logo";

        $result = $this->am->get_ha("ha_view", $arr_where);
        // var_dump($result);

        if ($result->ha_view === "0" OR $result === FALSE)
        {
            redirect("cpanels");
        }
    }

    private function _cek_insert()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_logo";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_logo");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_logo";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_logo");
        }
    }
}
