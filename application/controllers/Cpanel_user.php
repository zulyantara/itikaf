<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('user_model','mm');
        $this->load->model('master_model');
    }

    function index()
    {
        $data['ch'] = 'Modul User';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_user/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $user->user_username;
            $row[] = $user->peserta_nama;
            $row[] = $user->peserta_email;
            $row[] = $user->ur_ket;
            $row[] = $user->user_active;
            $row[] = "
                <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                    <a href=\"".site_url("cpanel_user/edit_data/".$user->user_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <a href=\"".site_url("cpanel_user/active_user/".$user->user_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Aktivasi</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs\" onClick=\"deleteItem('".$user->user_id."','".$user->user_username."');\">Delete</button>
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

        $data['ch'] = 'Modul User';
        $data['cho'] = 'Tambah Data';
        $data['res_ur'] = $this->mm->get_ur();
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_user/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul User';
            $data['cho'] = 'Edit Data';
            $data['res_user'] = $this->mm->get_detail_user("user_id=".$id);
            $data['res_ur'] = $this->mm->get_ur();
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_user/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table user
        $this->mm->delete_user($id);
        redirect('cpanel_user');
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $user_id = $this->input->post('user_id');
        $user_username = $this->input->post('user_username');
        $user_password = $this->input->post('user_password');
        $user_ur = $this->input->post('user_ur');
        $user_active = $this->input->post('user_active');

        $data_user['user_username'] = $user_username;
        $user_password === "" ? "" : $data_user['user_password'] = password_hash($user_password, PASSWORD_DEFAULT);
        $data_user['user_ur'] = $user_ur;
        $data_user['user_active'] = $user_active;

        // simpan data baru
        if ($this->input->post('simpan') === "simpan")
        {
            $this->_cek_insert();

            // simpan ke table user
            $this->mm->save_user($data_user);

            redirect('cpanel_user');
        }
        // update data
        elseif ($this->input->post('simpan') === "ubah")
        {
            $this->_cek_update();

            // ubah data table user
            $this->mm->update_user($user_id, $data_user);

            redirect('cpanel_user');
        }
        // access function without click the button #sok_bahasa_inggris
        else
        {
            redirect('cpanel_user');
        }

    }

    function active_user($id)
    {
        $this->_cek_update();

        // update table users, set user_active=1
        $data['user_active'] = 1;
        $this->mm->update_user($id,$data);
        redirect('cpanel_user');
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
        $arr_where["menu_url"] = "cpanel_user";

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
        $arr_where["menu_url"] = "cpanel_user";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_user");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_user";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_user");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_user";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_user");
        }
    }
}
