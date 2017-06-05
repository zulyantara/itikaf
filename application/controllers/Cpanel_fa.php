<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_fa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('fa_model', 'mm');
    }

    function index()
    {
        $data['ch'] = 'Modul Additional Footer';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_fa/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $fa) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $fa->fa_ket;
            $row[] = $fa->fa_url;
            $row[] = "
                <div class=\"btn-group\" role=\"group\">
                    <a href=\"".site_url("cpanel_fa/edit_data/".$fa->fa_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs\" onClick=\"deleteItem('".$fa->fa_id."','".$fa->fa_ket."');\">Delete</button>
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

        $data['ch'] = 'Modul Additional Footer';
        $data['cho'] = 'Tambah Data';
        $data["res_pages"] = $this->mm->get_pages();
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_fa/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul Additional Footer';
            $data['cho'] = 'Edit Data';
            $data["res_pages"] = $this->mm->get_pages();
            $data['res_fa'] = $this->mm->get_row(array("fa_id"=>$id));
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_fa/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table footer
        $this->mm->delete($id);
        redirect('cpanel_fa');
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $fa_id = $this->input->post('fa_id');
        $fa_ket = trim($this->input->post('fa_ket'));
        $fa_url = trim($this->input->post('fa_url'));
        $fa_url_ext = trim($this->input->post('fa_url_ext'));

        if ($fa_url == "")
        {
            $url = $fa_url_ext;
        }
        else
        {
            $url = $fa_url;
        }

        $data_fa['fa_ket'] = $fa_ket;
        $data_fa['fa_url'] = $url;

        // cek data kembar
        $wcek['fa_ket'] = $fa_ket;
        $wcek['fa_url'] = $fa_url;
        $cek = $this->mm->get_row($wcek);
        if ($cek !== FALSE)
        {
            redirect("cpanel_fa");
        }
        else
        {
            // simpan data baru
            if ($this->input->post('simpan') === "simpan")
            {
                $this->_cek_insert();

                // simpan ke table footer
                $this->mm->save($data_fa);

                redirect('cpanel_fa');
            }
            // update data
            elseif ($this->input->post('simpan') === "ubah")
            {
                $this->_cek_update();

                // ubah data table footer
                $this->mm->update($fa_id, $data_fa);

                redirect('cpanel_fa');
            }
            // access function without click the button #sok_bahasa_inggris
            else
            {
                redirect('cpanel_fa');
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
        $arr_where["menu_url"] = "cpanel_fa";

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
        $arr_where["menu_url"] = "cpanel_fa";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_fa");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_fa";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_fa");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_fa";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_fa");
        }
    }
}
