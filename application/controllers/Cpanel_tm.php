<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_tm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('tm_model', 'mm');
    }

    function index()
    {
        $data['ch'] = 'Modul Top Menu';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_tm/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $tm) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $tm->tm_ket;
            $row[] = $tm->tm_url;
            $row[] = "
                <div class=\"btn-group\" role=\"group\">
                    <a href=\"".site_url("cpanel_tm/edit_data/".$tm->tm_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs\" onClick=\"deleteItem('".$tm->tm_id."','".$tm->tm_ket."');\">Delete</button>
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

        $data['ch'] = 'Modul Top Menu';
        $data['cho'] = 'Tambah Data';
        $data["res_pages"] = $this->mm->get_pages();
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_tm/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul Top Menu';
            $data['cho'] = 'Edit Data';
            $data["res_pages"] = $this->mm->get_pages();
            $data['res_tm'] = $this->mm->get_row(array("tm_id"=>$id));
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_tm/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table footer
        $this->mm->delete($id);
        redirect('cpanel_tm');
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $tm_id = $this->input->post('tm_id');
        $tm_ket = trim($this->input->post('tm_ket'));
        $tm_url = trim($this->input->post('tm_url'));

        $data_tm['tm_ket'] = $tm_ket;
        $data_tm['tm_url'] = $tm_url;

        // cek data kembar
        $wcek['tm_ket'] = $tm_ket;
        $wcek['tm_url'] = $tm_url;
        $cek = $this->mm->get_row($wcek);
        if ($cek !== FALSE)
        {
            redirect("cpanel_tm");
        }
        else
        {
            // simpan data baru
            if ($this->input->post('simpan') === "simpan")
            {
                $this->_cek_insert();

                // simpan ke table footer
                $this->mm->save($data_tm);

                redirect('cpanel_tm');
            }
            // update data
            elseif ($this->input->post('simpan') === "ubah")
            {
                $this->_cek_update();

                // ubah data table footer
                $this->mm->update($tm_id, $data_tm);

                redirect('cpanel_tm');
            }
            // access function without click the button #sok_bahasa_inggris
            else
            {
                redirect('cpanel_tm');
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
        $arr_where["menu_url"] = "cpanel_tm";

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
        $arr_where["menu_url"] = "cpanel_tm";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_tm");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_tm";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_tm");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_tm";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_tm");
        }
    }
}
