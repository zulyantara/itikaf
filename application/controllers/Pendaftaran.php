<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pendaftaran_model', "pm");
        $this->load->model('auth_model');
    }

    function index()
    {
        $data['res_kota'] = $this->pm->get_kota();
        $data['res_ki'] = $this->pm->get_kartu_identitas();
        $data['res_konsumsi'] = $this->pm->get_konsumsi();
        $data['res_si'] = $this->pm->get_sumber_informasi();
        $data["row_logo"] = $this->pm->get_logo();
        $data["res_tm"] = $this->pm->get_tm();
        $data["res_fa"] = $this->pm->get_fa();

        $this->load->view('template/header', $data);
        if ($this->session->userdata('is_logged_in') === TRUE)
        {
            $this->load->view('pendaftaran/form_aktif', $data);
        }
        else
        {
            $this->load->view('pendaftaran/form', $data);
        }
        $this->load->view('template/footer', $data);
    }

    function proses_pendaftaran()
    {
        // var_dump($_POST);exit;
        $simpan = $this->input->post('simpan');
        $nama = trim($this->input->post('nama_lengkap'));
        $sex = $this->input->post('sex');
        $tempat_lahir = trim($this->input->post('tempat_lahir'));
        $tahun_lahir = $this->input->post('thn_lahir');
        $bulan_lahir = $this->input->post('bln_lahir');
        $tanggal_lahir = $this->input->post('tgl_lahir');
        $status_pernikahan = $this->input->post('status_pernikahan');
        $alamat = trim($this->input->post('alamat'));
        $kota = $this->input->post('kota');
        $kartu_identitas = trim($this->input->post('kartu_identitas'));
        $no_kartu_identitas = trim($this->input->post('no_kartu_identitas'));
        $username = trim($this->input->post('username'));
        $password = $this->input->post('password');
        $upload_photo = $this->input->post('upload_photo');
        $upload_ktp = $this->input->post('upload_ktp');
        $email = trim($this->input->post('email'));
        $telepon = trim($this->input->post('telepon'));
        $hp = trim($this->input->post('hp'));
        $pendidikan = trim($this->input->post('pendidikan'));
        $jurusan = trim($this->input->post('jurusan'));
        $organisasi = trim($this->input->post('organisasi'));
        $posisi = trim($this->input->post('posisi'));
        $mulai_itikaf = $this->input->post('mulai_itikaf');
        $konsumsi = $this->input->post('konsumsi');
        $sumber_informasi = $this->input->post('sumber_informasi');

        // validasi tanggal lahir
        $check_date = checkdate($bulan_lahir, $tanggal_lahir, $tahun_lahir);
        if ($check_date === FALSE)
        {
            redirect('pendaftaran');
        }
        else
        {
            $tanggal_lahir = $tahun_lahir."-".$bulan_lahir."-".$tanggal_lahir;
        }

        // harus cek terlebih dahulu apakah data peserta sudah ada?
        $wcp["peserta_nama"] = $nama;
        $wcp["peserta_sex"] = $sex;
        $wcp["peserta_tempat_lahir"] = $tempat_lahir;
        $wcp["peserta_tanggal_lahir"] = $tanggal_lahir;
        $wcp["peserta_status_pernikahan"] = $status_pernikahan;
        $cek_peserta = $this->pm->get_row_peserta($wcp);

        // jika data belum ada maka simpan data
        if ($cek_peserta === FALSE)
        {
            if ($simpan = 'simpan')
            {
                $arr_data_p['peserta_nama'] = $nama;
                $arr_data_p['peserta_sex'] = $sex;
                $arr_data_p['peserta_tempat_lahir'] = $tempat_lahir;
                $arr_data_p['peserta_tanggal_lahir'] = $tanggal_lahir;
                $arr_data_p['peserta_status_pernikahan'] = $status_pernikahan;
                $arr_data_p['peserta_alamat'] = $alamat;
                $arr_data_p['peserta_kota'] = $kota;
                $arr_data_p['peserta_kartu_identitas'] = $kartu_identitas;
                $arr_data_p['peserta_no_kartu_identitas'] = $no_kartu_identitas;
                $arr_data_p['peserta_email'] = $email;
                $arr_data_p['peserta_telepon'] = $telepon;
                $arr_data_p['peserta_hp'] = $hp;
                $arr_data_p['peserta_pendidikan'] = $pendidikan;
                $arr_data_p['peserta_jurusan'] = $jurusan;
                $arr_data_p['peserta_organisasi'] = $organisasi;
                $arr_data_p['peserta_posisi'] = $posisi;
                $arr_data_p['peserta_insert_date'] = date('Y-m-d H:i:s');

                // echo $this->db->set($arr_data_p)->get_compiled_insert('peserta');exit;
                // insert ke table peserta
                $this->pm->insert_peserta($arr_data_p);

                // mengambil peserta_id
                $where_p["peserta_nama"] = $nama;
                $where_p["peserta_sex"] = $sex;
                $where_p["peserta_tempat_lahir"] = $tempat_lahir;
                $where_p["peserta_tanggal_lahir"] = $tanggal_lahir;
                $where_p["peserta_status_pernikahan"] = $status_pernikahan;
                $row_peserta = $this->pm->get_row_peserta($where_p);

                // // proses upload
                // $config_photo['file_name']            = "photo_".$row_peserta->peserta_id;
                // $config_photo['upload_path']          = './upload/photo';
                // $config_photo['allowed_types']        = 'gif|jpg|png';
                // $config_photo['max_size']             = 5000;
                // // $config_photo['max_width']            = 5000;
                // // $config_photo['max_height']           = 5000;
                //
                // $this->load->library('upload', $config_photo);
                //
                // if ( ! $this->upload->do_upload('upload_photo'))
                // {
                //     // jika error maka hapus data peserta yang sudah tersimpan
                //     $this->pm->delete_peserta(array("peserta_id"=>$row_peserta->peserta_id));
                //
                //     $data["row_logo"] = $this->pm->get_logo();
            	// 	$data["res_tm"] = $this->pm->get_tm();
            	// 	$data["res_fa"] = $this->pm->get_fa();
                //     $data['error'] = $this->upload->display_errors();
                //
                //     $this->load->view('template/header', $data);
                //     if ($this->session->userdata('is_logged_in') === TRUE)
                //     {
                //         $this->load->view('pendaftaran/form_aktif', $data);
                //     }
                //     else
                //     {
                //         $this->load->view('pendaftaran/form', $data);
                //     }
                //     $this->load->view('template/footer', $data);
                // }
                // else
                // {
                //     // $path_photo = "./upload/photo/photo_".$row_peserta->peserta_id;
                //     // unlink($path_photo);
                //
                //     $upload_data = $this->upload->data();
                //     $where_peserta["peserta_id"] = $row_peserta->peserta_id;
                //     $data_photo["peserta_foto"] = $upload_data["file_name"];
                //     $this->pm->update_peserta($where_peserta, $data_photo);
                // }
                //
                // $config_ktp['file_name']            = "ktp_".$row_peserta->peserta_id;
                // $config_ktp['upload_path']          = './upload/ktp';
                // $config_ktp['allowed_types']        = 'gif|jpg|png';
                // $config_photo['max_size']             = 5000;
                // // $config_photo['max_width']            = 5000;
                // // $config_photo['max_height']           = 5000;
                //
                // $this->load->library('upload', $config_ktp);
                //
                // if ( ! $this->upload->do_upload('upload_ktp'))
                // {
                //     // jika error maka hapus data peserta yang sudah tersimpan
                //     $this->pm->delete_peserta(array("peserta_id"=>$row_peserta->peserta_id));
                //
                //     $data["row_logo"] = $this->pm->get_logo();
            	// 	$data["res_tm"] = $this->pm->get_tm();
            	// 	$data["res_fa"] = $this->pm->get_fa();
                //     $data['error'] = $this->upload->display_errors();
                //
                //     $this->load->view('template/header', $data);
                //     if ($this->session->userdata('is_logged_in') === TRUE)
                //     {
                //         $this->load->view('pendaftaran/form_aktif', $data);
                //     }
                //     else
                //     {
                //         $this->load->view('pendaftaran/form', $data);
                //     }
                //     $this->load->view('template/footer', $data);
                // }
                // else
                // {
                //     // $path_ktp = "./upload/ktp/ktp_".$row_peserta->peserta_id;
                //     // unlink($path_ktp);
                //
                //     $upload_data = $this->upload->data();
                //     $where_peserta["peserta_id"] = $row_peserta->peserta_id;
                //     $data_ktp["peserta_ktp"] = $upload_data["file_name"];
                //     $this->pm->update_peserta($where_peserta, $data_ktp);
                // }

                $arr_data_i['itikaf_peserta'] = $row_peserta->peserta_id;
                $arr_data_i['itikaf_tahun'] = date('Y');
                $arr_data_i['itikaf_mulai'] = $mulai_itikaf;
                $arr_data_i['itikaf_konsumsi'] = $konsumsi;
                $arr_data_i['itikaf_sumber_informasi'] = $sumber_informasi;
                $arr_data_i['itikaf_status'] = 0;
                $arr_data_i['itikaf_insert_date'] = date('Y-m-d H:i:s');

                // insert ke table itikaf
                $this->pm->insert_itikaf($arr_data_i);

                // mengambil id role peserta
                $row_ur = $this->pm->get_ur();

                $arr_data_u['user_username'] = $username;
                $arr_data_u['user_password'] = password_hash($password,PASSWORD_DEFAULT);
                $arr_data_u['user_peserta'] = $row_peserta->peserta_id;
                $arr_data_u['user_ur'] = $row_ur->ur_id;
                $arr_data_u['user_active'] = 1;

                // insert ke table user
                $this->pm->insert_user($arr_data_u);

                // kirim ke form_success
                $data['peserta_nama'] = $nama;
                $data["row_logo"] = $this->pm->get_logo();
        		$data["res_tm"] = $this->pm->get_tm();
        		$data["res_fa"] = $this->pm->get_fa();
                $this->load->view('template/header', $data);
                $this->load->view('pendaftaran/form_success', $data);
                $this->load->view('template/footer', $data);
                // redirect('pendaftaran');
            }
            else
            {
                redirect('pendaftaran');
            }
        }
        else
        {
            redirect('pendaftaran');
        }
    }

    function proses_pendaftaran_aktif()
    {
        $simpan = $this->input->post('simpan');
        $mulai_itikaf = $this->input->post('mulai_itikaf');
        $konsumsi = $this->input->post('konsumsi');
        $sumber_informasi = $this->input->post('sumber_informasi');

        // harus cek terlebih dahulu apakah data itikaf sudah ada?
        $wci["itikaf_tahun"] = date('Y');
        $cek_itikaf = $this->pm->get_row_itikaf($wci);

        // jika data belum ada maka simpan data
        if ($cek_itikaf === 0)
        {
            if ($simpan = 'simpan')
            {
                $arr_data_i['itikaf_peserta'] = $this->session->userdata('pesertaId');
                $arr_data_i['itikaf_tahun'] = date('Y');
                $arr_data_i['itikaf_mulai'] = $mulai_itikaf;
                $arr_data_i['itikaf_konsumsi'] = $konsumsi;
                $arr_data_i['itikaf_sumber_informasi'] = $sumber_informasi;
                $arr_data_i['itikaf_status'] = 0;
                $arr_data_i['itikaf_insert_date'] = date('Y-m-d H:i:s');

                // insert ke table itikaf
                $this->pm->insert_itikaf($arr_data_i);

                redirect('pendaftaran');
            }
            else
            {
                redirect('pendaftaran');
            }
        }
        else
        {
            redirect('pendaftaran');
        }
    }

    function check_email()
    {
        $email = $this->input->post('email');
        $ce = $this->pm->check_email($email);
        if ($ce > 0)
        {
            echo "Email sudah terdaftar, silahkan gunakan email yang lain";
        }
    }

    function check_username()
    {
        $username = $this->input->post('username');
        $ce = $this->pm->check_username($username);
        if ($ce > 0)
        {
            echo "Username sudah terdaftar, silahkan gunakan Usename yang lain";
        }
    }
}
