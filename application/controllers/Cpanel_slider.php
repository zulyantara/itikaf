<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_slider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('slider_model','mm');
    }

    function index()
    {
        $data['ch'] = 'Modul Slider';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_slider/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $slider) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = "<img src=\"".base_url("slider/".$slider->slider_src)."\">";

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

        $data['ch'] = 'Modul Slider';
        $data['cho'] = 'Tambah Data';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_slider/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function do_upload()
    {
        $this->_cek_insert();

        if ($this->input->post('simpan') === "upload")
        {
            // hitung jumlah data di table slider
            $jml_slider = $this->mm->count_data(FALSE);
            // var_dump($jml_slider);exit;

            $config['file_name']            = "slider_".$jml_slider;
            $config['upload_path']          = './slider';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1024;
            $config['max_width']            = 800;
            $config['max_height']           = 400;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userFileSlider'))
            {
                $data['ch'] = 'Modul Slider';
                $data['cho'] = 'Upload';
                $data['error'] = $this->upload->display_errors();

                $this->load->view('template/header_cpanel', $data);
                $this->load->view('cpanel_slider/form', $data);
                $this->load->view('template/footer_cpanel', $data);
            }
            else
            {
                $upload_data = $this->upload->data();

                // hitung data slider
                $jml_slider = $this->mm->count_data(FALSE);
                if ($jml_slider == 0)
                {
                    $data["slider_active"] = 1;
                }
                else
                {
                    $data["slider_active"] = 0;
                }
                $data_slider["slider_src"] = $upload_data["file_name"];
                $data_slider["slider_alt"] = strtolower($this->input->post('alt'));
                $this->mm->save_slider($data_slider);

                redirect('cpanel_slider');
            }
        }
        else
        {
            redirect('cpanel_slider');
        }
    }

    function kosongkan_data()
    {
        $this->_cek_delete();

        $this->load->helper('file');
        delete_files('./slider/');

        $this->mm->truncate_slider();
        redirect('cpanel_slider');
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
        $arr_where["menu_url"] = "cpanel_slider";

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
        $arr_where["menu_url"] = "cpanel_slider";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_slider");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_slider";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_slider");
        }
    }
}
