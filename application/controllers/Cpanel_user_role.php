<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_user_role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('user_role_model','mm');
        $this->load->model('master_model');
    }

    function index()
    {
        $data['ch'] = 'Modul User Role';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_user_role/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $user_role) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $user_role->ur_ket;
            $row[] = "
                <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                    <a href=\"".site_url("cpanel_user_role/edit_data/".$user_role->ur_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs btn-flat btn-sm\" onClick=\"deleteItem('".$user_role->ur_id."','".$user_role->ur_ket."');\">Delete</button>
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

        $data['ch'] = 'Modul User Role';
        $data['cho'] = 'Tambah Data';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_user_role/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul User Role';
            $data['ch'] = 'Edit Data';
            $data['res_user_role'] = $this->mm->get_detail_user_role("ur_id=".$id);
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_user_role/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table user_role
        $this->mm->delete_user_role($id);
        redirect('cpanel_user_role');
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $ur_id = $this->input->post('ur_id');
        $user_role_ket = $this->input->post('ur_ket');

        $data_user_role['ur_ket'] = trim($user_role_ket);

        // simpan data baru
        if ($this->input->post('simpan') === "simpan")
        {
            $this->_cek_insert();

            // simpan ke table user_role
            $this->mm->save_user_role($data_user_role);

            redirect('cpanel_user_role');
        }
        // update data
        elseif ($this->input->post('simpan') === "ubah")
        {
            $this->_cek_update();

            // ubah data table user_role
            $this->mm->update_user_role($ur_id, $data_user_role);

            redirect('cpanel_user_role');
        }
        // access function without click the button #sok_bahasa_inggris
        else
        {
            redirect('cpanel_user_role');
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
        $arr_where["menu_url"] = "cpanel_user_role";

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
        $arr_where["menu_url"] = "cpanel_user_role";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_user_role");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_user_role";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_user_role");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_user_role";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_user_role");
        }
    }
}
