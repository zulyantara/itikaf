<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_flink extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('flink_model', 'mm');
    }

    function index()
    {
        $data['ch'] = 'Modul Footer Link';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_flink/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $flink) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $flink->fl_ket;
            $row[] = $flink->fl_link;
            $row[] = $flink->fhl_header;
            $row[] = "
                <div class=\"btn-group\" role=\"group\">
                    <a href=\"".site_url("cpanel_flink/edit_data/".$flink->fl_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs\" onClick=\"deleteItem('".$flink->fl_id."','".$flink->fl_ket."');\">Delete</button>
                </div>";

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

        $data['ch'] = 'Modul Footer Link';
        $data['cho'] = 'Tambah Data';
        $data["res_fhl"] = $this->mm->get_result_fhl();
        $data["res_pages"] = $this->mm->get_pages();
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_flink/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul Footer Link';
            $data['cho'] = 'Edit Data';
            $data['res_flink'] = $this->mm->get_row(array("fl_id"=>$id));
            $data["res_fhl"] = $this->mm->get_result_fhl();
            $data["res_pages"] = $this->mm->get_pages();
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_flink/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table footer
        $this->mm->delete($id);
        redirect('cpanel_flink');
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $fl_id = $this->input->post('fl_id');
        $fl_ket = trim($this->input->post('fl_ket'));
        if ($this->input->post('fl_link_int') == "")
        {
            $fl_link = trim($this->input->post('fl_link_ext'));
        }
        else
        {
            $fl_link = trim($this->input->post('fl_link_int'));
        }
        // echo $fl_link;exit;
        $fl_fhl = $this->input->post('fl_fhl');

        $data_fl['fl_ket'] = $fl_ket;
        $data_fl['fl_link'] = $fl_link;
        $data_fl['fl_fhl'] = $fl_fhl;

        // cek data kembar
        $wcek['fl_ket'] = $fl_ket;
        $wcek['fl_link'] = $fl_link;
        $wcek['fl_fhl'] = $fl_fhl;
        $cek = $this->mm->get_row($wcek);
        if ($cek !== FALSE)
        {
            redirect("cpanel_flink");
        }
        else
        {
            // simpan data baru
            if ($this->input->post('simpan') === "simpan")
            {
                $this->_cek_insert();

                // simpan ke table footer
                $this->mm->save($data_fl);

                redirect('cpanel_flink');
            }
            // update data
            elseif ($this->input->post('simpan') === "ubah")
            {
                $this->_cek_update();

                // ubah data table footer
                $this->mm->update($fl_id, $data_fl);

                redirect('cpanel_flink');
            }
            // access function without click the button #sok_bahasa_inggris
            else
            {
                redirect('cpanel_flink');
            }
        }
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
        $arr_where["menu_url"] = "cpanel_flink";

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
        $arr_where["menu_url"] = "cpanel_flink";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_flink");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_flink";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_flink");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_flink";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_flink");
        }
    }
}
