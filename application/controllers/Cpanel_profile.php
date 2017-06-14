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
        $peserta_id = $this->input->post('peserta_id');
        $peserta_nama = trim($this->input->post('peserta_nama'));
        $peserta_sex = $this->input->post('peserta_sex');
        $peserta_tempat_lahir = trim($this->input->post('peserta_tempat_lahir'));
        $peserta_thn_lahir = $this->input->post('peserta_thn_lahir');
        $peserta_bln_lahir = $this->input->post('peserta_bln_lahir');
        $peserta_tgl_lahir = $this->input->post('peserta_tgl_lahir');
        $peserta_status_pernikahan = $this->input->post('peserta_status_pernikahan');
        $peserta_alamat = trim($this->input->post('peserta_alamat'));
        $peserta_kota = $this->input->post('peserta_kota');
        $peserta_kartu_identitas = $this->input->post('peserta_kartu_identitas');
        $peserta_no_kartu_identitas = trim($this->input->post('peserta_no_kartu_identitas'));
        $peserta_email = strtolower(trim($this->input->post('peserta_email')));
        // $peserta_website = strtolower($this->input->post('peserta_website'));
        $peserta_telepon = trim($this->input->post('peserta_telepon'));
        $peserta_hp = trim($this->input->post('peserta_hp'));
        $peserta_pendidikan = trim($this->input->post('peserta_pendidikan'));
        $peserta_jurusan = trim($this->input->post('peserta_jurusan'));
        $peserta_organisasi = trim($this->input->post('peserta_organisasi'));
        $peserta_posisi = trim($this->input->post('peserta_posisi'));
        $peserta_foto = $this->input->post('peserta_foto');
        $peserta_ktp = $this->input->post('peserta_ktp');

        // validasi tanggal lahir
        $check_date = checkdate($peserta_bln_lahir, $peserta_tgl_lahir, $peserta_thn_lahir);
        if ($check_date === FALSE)
        {
            redirect('pendaftaran');
        }
        else
        {
            $peserta_tanggal_lahir = $peserta_thn_lahir."-".$peserta_bln_lahir."-".$peserta_tgl_lahir;
        }

        $data_peserta['peserta_nama'] = $peserta_nama;
        $data_peserta['peserta_sex'] = $peserta_sex;
        $data_peserta['peserta_tempat_lahir'] = $peserta_tempat_lahir;
        $data_peserta['peserta_tanggal_lahir'] = $peserta_tanggal_lahir;
        $data_peserta['peserta_status_pernikahan'] = $peserta_status_pernikahan;
        $data_peserta['peserta_alamat'] = $peserta_alamat;
        $data_peserta['peserta_kota'] = $peserta_kota;
        $data_peserta['peserta_kartu_identitas'] = $peserta_kartu_identitas;
        $data_peserta['peserta_no_kartu_identitas'] = $peserta_no_kartu_identitas;
        $data_peserta['peserta_email'] = $peserta_email;
        $data_peserta['peserta_telepon'] = $peserta_telepon;
        $data_peserta['peserta_hp'] = $peserta_hp;
        $data_peserta['peserta_pendidikan'] = $peserta_pendidikan;
        $data_peserta['peserta_jurusan'] = $peserta_jurusan;
        $data_peserta['peserta_organisasi'] = $peserta_organisasi;
        $data_peserta['peserta_posisi'] = $peserta_posisi;
        $data_peserta['peserta_update_date'] = date('Y-m-d H:i:s');

        // update data
        if ($this->input->post('simpan') === "ubah")
        {
            $this->_cek_update();

            // proses upload
            $config_photo['file_name']            = "photo_".$peserta_id;
            $config_photo['upload_path']          = './upload/photo';
            $config_photo['allowed_types']        = 'gif|jpg|png';
            $config_photo['max_size']             = 2048;
            // $config_photo['max_width']            = 5000;
            // $config_photo['max_height']           = 5000;

            $this->load->library('upload', $config_photo);

            if ( ! $this->upload->do_upload('upload_photo'))
            {
                $id = $this->session->userdata('pesertaId');

                $data['ch'] = 'Modul Profile';
                $data['cho'] = 'Edit Data';
                $data['res_profile'] = $this->mm->get_detail_peserta("peserta_id=".$id);
                $data["res_kota"] = $this->mm->get_kota();
                $data["res_ki"] = $this->mm->get_kartu_identitas();
                $data['error'] = $this->upload->display_errors();

                $this->load->view('template/header', $data);
                $this->load->view('cpanel_profile/form', $data);
                $this->load->view('template/footer', $data);
            }
            else
            {
                // $path_photo = "./upload/photo/photo_".$peserta_id;
                // unlink($path_photo);

                $upload_data = $this->upload->data();
                $data_photo["peserta_foto"] = $upload_data["file_name"];
                $this->mm->update_peserta($peserta_id, $data_photo);
            }

            $config_ktp['file_name']            = "ktp_".$peserta_id;
            $config_ktp['upload_path']          = './upload/ktp';
            $config_ktp['allowed_types']        = 'gif|jpg|png';
            $config_photo['max_size']             = 2048;
            // $config_photo['max_width']            = 5000;
            // $config_photo['max_height']           = 5000;

            $this->load->library('upload', $config_ktp);

            if ( ! $this->upload->do_upload('upload_ktp'))
            {
                $data['ch'] = 'Modul Profile';
                $data['cho'] = 'Edit Data';
                $data['res_profile'] = $this->mm->get_detail_peserta("peserta_id=".$peserta_id);
                $data["res_kota"] = $this->mm->get_kota();
                $data["res_ki"] = $this->mm->get_kartu_identitas();
                $data['error'] = $this->upload->display_errors();

                $this->load->view('template/header', $data);
                $this->load->view('cpanel_profile/form', $data);
                $this->load->view('template/footer', $data);
            }
            else
            {
                // $path_ktp = "./upload/ktp/ktp_".$peserta_id;
                // unlink($path_ktp);

                $upload_data = $this->upload->data();
                $data_ktp["peserta_ktp"] = $upload_data["file_name"];
                $this->mm->update_peserta($peserta_id, $data_ktp);
            }

            // ubah data table profile
            $this->mm->update_peserta($peserta_id, $data_peserta);

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
        // var_dump($result);exit;
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
