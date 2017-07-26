<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_fheader extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('fheader_model', 'mm');
        $this->load->model('master_model');
    }

    function index()
    {
        $data['ch'] = 'Modul Footer Header';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_fheader/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $fheader) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $fheader->fhl_header;
            $row[] = "
                <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                    <a href=\"".site_url("cpanel_fheader/edit_data/".$fheader->fhl_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs\" onClick=\"deleteItem('".$fheader->fhl_id."','".$fheader->fhl_header."');\">Delete</button>
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

        $data['ch'] = 'Modul Footer Header';
        $data['cho'] = 'Tambah Data';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_fheader/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul Footer Header';
            $data['cho'] = 'Edit Data';
            $data['res_fhl'] = $this->mm->get_row(array("fhl_id"=>$id));
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_fheader/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
        else
        {
            redirect("cpanel_fheader");
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table footer
        $this->mm->delete($id);
        redirect('cpanel_fheader');
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $fhl_id = $this->input->post('fhl_id');
        $fhl_header = $this->input->post('fhl_header');

        $data_fhl['fhl_header'] = $fhl_header;

        // cek data kembar
        $cek = $this->mm->get_row(array("fhl_header"=>$fhl_header));
        if ($cek !== FALSE)
        {
            redirect("cpanel_fheader");
        }
        else
        {
            // simpan data baru
            if ($this->input->post('simpan') === "simpan")
            {
                $this->_cek_insert();

                // simpan ke table footer
                $this->mm->save($data_fhl);

                redirect('cpanel_fheader');
            }
            // update data
            elseif ($this->input->post('simpan') === "ubah")
            {
                $this->_cek_update();

                // ubah data table footer
                $this->mm->update($fhl_id, $data_fhl);

                redirect('cpanel_fheader');
            }
            // access function without click the button #sok_bahasa_inggris
            else
            {
                redirect('cpanel_fheader');
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
        $arr_where["menu_url"] = "cpanel_fheader";

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
        $arr_where["menu_url"] = "cpanel_fheader";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_fheader");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_fheader";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_fheader");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_fheader";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_fheader");
        }
    }
}
