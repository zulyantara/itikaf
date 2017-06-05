<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('profile_model','mm');
    }

    function index()
    {
        $this->_cek_update();

        if ( $this->session->userdata('urKet') !== "administrator")
        {
            $id = $this->session->userdata('pesertaId');
            $data['ch'] = 'Modul Profile';
            $data['cho'] = 'Edit Data';
            $data['res_profile'] = $this->mm->get_detail_peserta("peserta_id=".$id);
            $data["res_kota"] = $this->mm->get_kota();
            $data["res_ki"] = $this->mm->get_kartu_identitas();
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_profile/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
        else
        {
            redirect("auth/form");
        }
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $profile_id = $this->input->post('profile_id');
        $profile_ket = $this->input->post('profile_ket');

        $data_profile['profile_ket'] = trim($profile_ket);

        // simpan data baru
        if ($this->input->post('simpan') === "simpan")
        {
            $this->_cek_insert();

            // simpan ke table profile
            $data_profile["profile_insert_date"] = date("Y-m-d H:i:s");
            $data_profile["profile_insert_user"] = $this->session->userdata('userId');
            $this->mm->save_profile($data_profile);

            redirect('cpanel_profile');
        }
        // update data
        elseif ($this->input->post('simpan') === "ubah")
        {
            $this->_cek_update();

            // ubah data table profile
            $this->mm->update_profile($profile_id, $data_profile);

            redirect('cpanel_profile');
        }
        // access function without click the button #sok_bahasa_inggris
        else
        {
            redirect('cpanel_profile');
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
        $arr_where["menu_url"] = "cpanel_profile";

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
        $arr_where["menu_url"] = "cpanel_profile";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_profile");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_profile";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_profile");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_profile";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_profile");
        }
    }
}
