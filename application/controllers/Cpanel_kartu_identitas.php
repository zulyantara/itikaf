<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_kartu_identitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('kartu_identitas_model','mm');
        $this->load->model('master_model');
    }

    function index()
    {
        $data['ch'] = 'Modul Kartu Identitas';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_kartu_identitas/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $ki) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $ki->ki_ket;
            $row[] = "
                <div class=\"btn-group\" role=\"group\">
                    <a href=\"".site_url("cpanel_kartu_identitas/edit_data/".$ki->ki_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs\" onClick=\"deleteItem('".$ki->ki_id."','".$ki->ki_ket."');\">Delete</button>
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

        $data['ch'] = 'Modul Kartu Identitas';
        $data['cho'] = 'Tambah Data';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_kartu_identitas/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul Kartu Identitas';
            $data['cho'] = 'Edit Data';
            $data['res_ki'] = $this->mm->get_detail_ki("ki_id=".$id);
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_kartu_identitas/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table kartu_identitas
        $this->mm->delete_ki($id);
        redirect('cpanel_kartu_identitas');
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $ki_id = $this->input->post('ki_id');
        $ki_ket = $this->input->post('ki_ket');

        $data_ki['ki_ket'] = trim($ki_ket);

        // simpan data baru
        if ($this->input->post('simpan') === "simpan")
        {
            $this->_cek_insert();

            // simpan ke table ki
            $data_ki["ki_insert_date"] = date("Y-m-d H:i:s");
            $data_ki["ki_insert_user"] = $this->session->userdata('userId');
            $this->mm->save_ki($data_ki);

            redirect('cpanel_kartu_identitas');
        }
        // update data
        elseif ($this->input->post('simpan') === "ubah")
        {
            $this->_cek_update();

            // ubah data table ki
            $this->mm->update_ki($ki_id, $data_ki);

            redirect('cpanel_kartu_identitas');
        }
        // access function without click the button #sok_bahasa_inggris
        else
        {
            redirect('cpanel_kartu_identitas');
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
        $arr_where["menu_url"] = "cpanel_kartu_identitas";

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
        $arr_where["menu_url"] = "cpanel_kartu_identitas";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_kartu_identitas");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_kartu_identitas";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_kartu_identitas");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_kartu_identitas";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_kartu_identitas");
        }
    }
}
