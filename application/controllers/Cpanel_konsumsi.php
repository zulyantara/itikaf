<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_konsumsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('konsumsi_model','mm');
        $this->load->model('master_model');
    }

    function index()
    {
        $data['ch'] = 'Modul Konsumsi';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_konsumsi/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $konsumsi) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $konsumsi->konsumsi_ket;
            $row[] = "
                <div class=\"btn-group\" role=\"group\">
                    <a href=\"".site_url("cpanel_konsumsi/edit_data/".$konsumsi->konsumsi_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs\" onClick=\"deleteItem('".$konsumsi->konsumsi_id."','".$konsumsi->konsumsi_ket."');\">Delete</button>
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

        $data['ch'] = 'Modul Konsumsi';
        $data['cho'] = 'Tambah Data';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_konsumsi/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul Konsumsi';
            $data['cho'] = 'Edit Data';
            $data['res_konsumsi'] = $this->mm->get_detail_konsumsi("konsumsi_id=".$id);
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_konsumsi/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table konsumsi
        $this->mm->delete_konsumsi($id);
        redirect('cpanel_konsumsi');
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $konsumsi_id = $this->input->post('konsumsi_id');
        $konsumsi_ket = $this->input->post('konsumsi_ket');

        $data_konsumsi['konsumsi_ket'] = trim($konsumsi_ket);

        // simpan data baru
        if ($this->input->post('simpan') === "simpan")
        {
            $this->_cek_insert();

            // simpan ke table konsumsi
            $data_konsumsi["konsumsi_insert_date"] = date("Y-m-d H:i:s");
            $data_konsumsi["konsumsi_insert_user"] = $this->session->userdata('userId');
            $this->mm->save_konsumsi($data_konsumsi);

            redirect('cpanel_konsumsi');
        }
        // update data
        elseif ($this->input->post('simpan') === "ubah")
        {
            $this->_cek_update();

            // ubah data table konsumsi
            $this->mm->update_konsumsi($konsumsi_id, $data_konsumsi);

            redirect('cpanel_konsumsi');
        }
        // access function without click the button #sok_bahasa_inggris
        else
        {
            redirect('cpanel_konsumsi');
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
        $arr_where["menu_url"] = "cpanel_konsumsi";

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
        $arr_where["menu_url"] = "cpanel_konsumsi";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_konsumsi");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_konsumsi";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_konsumsi");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_konsumsi";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_konsumsi");
        }
    }
}
